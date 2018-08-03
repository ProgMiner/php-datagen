<?php

/* MIT License

Copyright (c) 2018 Eridan Domoratskiy

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE. */

namespace PHPDataGen;

use PhpParser\BuilderFactory;
use PhpParser\BuilderHelpers;
use PhpParser\Node;

use PHPDataGen\Model;

/**
 * Compiler
 *
 * @author Eridan Domoratskiy <eridan200@mail.ru>
 */
class Compiler {

    /**
     * @var string Base directory of compiled files
     */
    protected $baseDir = 'pdg-classes';

    /**
     * @var string Prefix for name of not final classes
     */
    protected $classPrefix = 'Data_';

    public function getBaseDir(): string {
        return $this->baseDir;
    }

    public function setBaseDir(string $baseDir) {
        $this->baseDir = $baseDir;
    }

    public function getClassPrefix(): string {
        return $this->classPrefix;
    }

    public function setClassPrefix(string $classPrefix) {
        $this->classPrefix = $classPrefix;
    }

    /**
     * Makes path of file for save compiled file model
     *
     * Returns array with directory and filename.
     *
     * @param Model\File $model File model that will be compiled
     * @param string     $ext   File extension (.php by default)
     *
     * @return string[] Made path
     */
    public function makePath(Model\File $model, ?string $dir = null, string $ext = '.php'): array {
        if (is_null($model->class)) {
            throw new UnexpectedValueException('File without class cannot be saved');
        }

        $dir = $dir ?? $this->baseDir;

        $path = str_replace('\\', '/', $model->namespace);
        if (!empty($path)) {
            $dir .= '/'.$path;
        }

        return [$dir, $this->makeClassName($model->class).$ext];
    }

    /**
     * Compiles file model to PHP AST
     *
     * @param Model\File $model File model
     *
     * @return array PHP AST
     */
    public function compile(Model\File $model): array {
        if (is_null($model->class)) {
            throw new UnexpectedValueException('File without class cannot be saved');
        }

        $result = $model->uses;

        $result[] = $this->compileClass($model->class);

        if (!is_null($model->namespace)) {
            $result = [new Node\Stmt\Namespace_($model->namespace, $result)];
        }

        return $result;
    }

    protected function testFlag($flags, int $flag) {
        if (!is_int($flags)) {
            if (!isset($flags->flags)) {
                throw new \InvalidArgumentException('Flags is not int and has not flags property');
            }

            $flags = $flags->flags;
        }

        return ($flags & $flag) === $flag;
    }

    protected function makeClassName(Model\Class_ $model): Node\Identifier {
        $ret = '';

        if (!$this->testFlag($model, Model\Class_::FLAG_FINAL)) {
            $ret .= $this->classPrefix;
        }

        $ret .= (string) $model->name;

        return new Node\Identifier($ret);
    }

    protected function convertFieldNameForMethod(string $name, string $prefix = ''): string {
        return $prefix.ucwords($name);
    }

    protected function compileClass(Model\Class_ $model): Node\Stmt\Class_ {
        $factory = new BuilderFactory();

        $result = $factory->class($this->makeClassName($model));

        if ($this->testFlag($model, Model\Class_::FLAG_FINAL_FINAL)) {
            $result->makeFinal();
        }

        if (!$this->testFlag($model, Model\Class_::FLAG_FINAL)) {
            $result->makeAbstract();
        }

        if (!is_null($model->extends)) {
            $result->extend($model->extends);
        }

        if (!empty($model->implements)) {
            $result->implement(...$model->implements);
        }

        // TODO Library use disabling
        $result->addStmt(
            new Node\Stmt\TraitUse([
                new Node\Name\FullyQualified('PHPDataGen\\DataClassTrait')
            ])
        );

        // Fields const
        $result->addStmt($this->buildClassFieldsConst($model, $factory));

        // Properties
        foreach ($model->fields as $field) {
            $builder = $factory->property($field->name);

            if ($this->testFlag($field, Model\Field::FLAG_DIRECT)) {
                $builder->makeProtected();
            } else {
                $builder->makePrivate();
            }

            if ($this->testFlag($field, Model\Field::FLAG_DIRECT_DEFINING)) {
                $builder->setDefault($field->default);
            } else {
                $builder->setDefault($field->type->getDefaultValue());
            }

            $result->addStmt($builder->getNode());
        }

        // Constructor
        $result->addStmt($this->buildClassConstructor($model, $factory));

        foreach ($model->fields as $field) {
            $nameForMethod = $this->convertFieldNameForMethod($field->name);

            { // Getter
                $getter = $factory->method("get$nameForMethod")->
                    makePublic();

                if (!$field->type->mixed) {
                    $getter->setReturnType($field->type->toTypeHint());
                }

                if ($this->testFlag($field, Model\Field::FLAG_EDITABLE)) {
                    $getter->makeReturnByRef();
                }

                $getter->addStmt(new Node\Stmt\Return_(
                    new Node\Expr\PropertyFetch(
                        new Node\Expr\Variable('this'),
                        $field->name
                    )
                ));

                $result->addStmt($getter->getNode());
            }

            { // Validator
                $validator = $factory->method("validate$nameForMethod")->
                    makeProtected()->

                    addParam($factory->param('value'));

                if (!$field->type->mixed) {
                    $validator->setReturnType($field->type->toTypeHint());
                }

                $validator->addStmt(new Node\Stmt\Return_(
                    new Node\Expr\Variable('value')
                ));

                $result->addStmt($validator->getNode());
            }

            // Setter
            if ($this->testFlag($field, Model\Field::FLAG_EDITABLE)) {
                $setter = $factory->method("set$nameForMethod")->
                    makePublic()->

                    addParam($factory->param('value'));

                if (!$field->type->mixed) {
                    $setter->setReturnType($field->type->toTypeHint());
                }

                $setter->addStmt(new Node\Stmt\Expression(
                    new Node\Expr\Assign(
                        new Node\Expr\Variable('oldValue'),
                        new Node\Expr\PropertyFetch(
                            new Node\Expr\Variable('this'),
                            $field->name
                        )
                    )
                ));

                $setter->addStmt(new Node\Stmt\Expression(
                    new Node\Expr\Assign(
                        new Node\Expr\PropertyFetch(
                            new Node\Expr\Variable('this'),
                            $field->name
                        ),
                        $factory->methodCall(
                            new Node\Expr\Variable('this'),
                            "validate$nameForMethod",
                            [new Node\Expr\Variable('value')]
                        )
                    )
                ));

                $setter->addStmt(new Node\Stmt\Return_(
                    new Node\Expr\Variable('oldValue')
                ));

                $result->addStmt($setter->getNode());
            }
        }

        // TODO Data class methods

        return $result->getNode();
    }

    protected function buildClassFieldsConst(Model\Class_ $model, BuilderFactory $factory): Node\Stmt\ClassConst {
        $fields = [];

        foreach ($model->fields as $field) {
            $fields[(string) $field->name] = $this->convertFieldNameForMethod($field->name);
        }

        return new Node\Stmt\ClassConst(
            [new Node\Const_('FIELDS', $factory->val($fields))],
            Node\Stmt\Class_::MODIFIER_PRIVATE
        );
    }

    protected function buildClassConstructor(Model\Class_ $model, BuilderFactory $factory): Node\Stmt\ClassMethod {
        $result = $factory->method('__construct')->
            makePublic()->
            addParam(
                $factory->
                    param('init')->
                    setTypeHint('array')->
                    setDefault($factory->val([]))
                );

        // Default values
        foreach ($model->fields as $field) {
            if ($this->testFlag($field, Model\Field::FLAG_DIRECT_DEFINING) || is_null($field->default)) {
                continue;
            }

            $value = null;
            if ($this->testFlag($field, Model\Field::FLAG_FILTER_DEFAULT)) {
                $value = $factory->methodCall(
                    new Node\Expr\Variable('this'),
                    $this->convertFieldNameForMethod($field->name, 'validate'),
                    [$field->default]
                );
            } else {
                $value = $field->default;
            }

            $result->addStmt(new Node\Expr\Assign(
                new Node\Expr\PropertyFetch(
                    new Node\Expr\Variable('this'),
                    $field->name
                ),
                $value
            ));
        }

        // foreach ($init as $field => $value) {
        //     $this->{$field} = $this->{'validate' . self::FIELDS[$field]}($value);
        // }
        $result->addStmt(new Node\Stmt\Foreach_(
            new Node\Expr\Variable('init'),
            new Node\Expr\Variable('value'),
            [
                'keyVar' => new Node\Expr\Variable('field'),
                'stmts' => [new Node\Stmt\Expression(
                    new Node\Expr\Assign(
                        new Node\Expr\PropertyFetch(
                            new Node\Expr\Variable('this'),
                            new Node\Expr\Variable('field')
                        ),
                        $factory->methodCall(
                            new Node\Expr\Variable('this'),
                            $factory->concat('validate', new Node\Expr\ArrayDimFetch(
                                $factory->classConstFetch('self', 'FIELDS'),
                                new Node\Expr\Variable('field')
                            )),
                            [new Node\Expr\Variable('value')]
                        )
                    )
                )]
            ]
        ));

        return $result->getNode();
    }
}
