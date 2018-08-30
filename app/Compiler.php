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
use PhpParser\Node as PHPNode;

use PHPDataGen\Node;

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
     * Makes path of file for save compiled file node
     *
     * Returns array with directory and filename.
     *
     * @param Node\File $node File node that will be compiled
     * @param string     $ext   File extension (.php by default)
     *
     * @return string[] Made path
     */
    public function makePath(Node\File $node, ?string $dir = null, string $ext = '.php'): array {
        if (is_null($node->class)) {
            throw new UnexpectedValueException('File without class cannot be saved');
        }

        $dir = $dir ?? $this->baseDir;

        $path = str_replace('\\', '/', $node->namespace);
        if (!empty($path)) {
            $dir .= '/'.$path;
        }

        return [$dir, $this->makeClassName($node->class).$ext];
    }

    /**
     * Compiles file node to PHP AST
     *
     * @param Node\File $node File node
     *
     * @return array PHP AST
     */
    public function compile(Node\File $node): array {
        if (is_null($node->class)) {
            throw new UnexpectedValueException('File without class cannot be saved');
        }

        $result = $node->uses;

        $result[] = $this->compileClass($node->class);

        if (!is_null($node->namespace)) {
            $result = [new PHPNode\Stmt\Namespace_($node->namespace, $result)];
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

    protected function makeClassName(Node\Class_ $node): PHPNode\Identifier {
        $ret = '';

        if (!$this->testFlag($node, Node\Class_::FLAG_FINAL)) {
            $ret .= $this->classPrefix;
        }

        $ret .= (string) $node->name;

        return new PHPNode\Identifier($ret);
    }

    protected function convertFieldNameForMethod(string $name, string $prefix = ''): string {
        return $prefix.ucwords($name);
    }

    protected function compileClass(Node\Class_ $node): PHPNode\Stmt\Class_ {
        $factory = new BuilderFactory();

        $result = $factory->class($this->makeClassName($node));

        if ($this->testFlag($node, Node\Class_::FLAG_FINAL_FINAL)) {
            $result->makeFinal();
        }

        if (!$this->testFlag($node, Node\Class_::FLAG_FINAL)) {
            $result->makeAbstract();
        }

        if (!is_null($node->extends)) {
            $result->extend($node->extends);
        }

        if (!empty($node->implements)) {
            $result->implement(...$node->implements);
        }

        // TODO Library use disabling
        $result->addStmt(
            new PHPNode\Stmt\TraitUse([
                new PHPNode\Name\FullyQualified('PHPDataGen\\DataClassTrait')
            ])
        );

        // Fields const
        $result->addStmt($this->buildClassFieldsConst($node, $factory));

        // Constants
        $constCounter = 0;
        foreach ($node->consts as $const) {
            static $phpParserModifier = [
                0                           => 0,
                Node\Const_::FLAG_PUBLIC    => PHPNode\Stmt\Class_::MODIFIER_PUBLIC,
                Node\Const_::FLAG_PROTECTED => PHPNode\Stmt\Class_::MODIFIER_PROTECTED,
                Node\Const_::FLAG_PRIVATE   => PHPNode\Stmt\Class_::MODIFIER_PRIVATE
            ];

            static $modifiersMask =
                Node\Const_::FLAG_PUBLIC    |
                Node\Const_::FLAG_PROTECTED |
                Node\Const_::FLAG_PRIVATE
            ;

            if (!is_null($const->value) && is_a($const->value, PHPNode\Scalar\LNumber::class)) {
                $constCounter = $const->value->value + 1;
            }

            $result->addStmt(new PHPNode\Stmt\ClassConst(
                [new PHPNode\Const_($const->name, $const->value ?? $factory->val($constCounter++))],
                $phpParserModifier[$const->flags & $modifiersMask]
            ));
        }

        // Properties
        foreach ($node->fields as $field) {
            $builder = $factory->property($field->name);

            if ($this->testFlag($field, Node\Field::FLAG_DIRECT)) {
                $builder->makeProtected();
            } else {
                $builder->makePrivate();
            }

            if ($this->testFlag($field, Node\Field::FLAG_DIRECT_DEFINING)) {
                $builder->setDefault($field->default);
            } else {
                $builder->setDefault($field->type->getDefaultValue());
            }

            $result->addStmt($builder->getNode());
        }

        // Constructor
        $result->addStmt($this->buildClassConstructor($node, $factory));

        foreach ($node->fields as $field) {
            $nameForMethod = $this->convertFieldNameForMethod($field->name);

            { // Getter
                $getter = $factory->method("get$nameForMethod")->
                    makePublic();

                if (!$field->type->mixed) {
                    $getter->setReturnType($field->type->toTypeHint());
                }

                if ($this->testFlag($field, Node\Field::FLAG_EDITABLE)) {
                    $getter->makeReturnByRef();
                }

                $getter->addStmt(new PHPNode\Stmt\Return_(
                    new PHPNode\Expr\PropertyFetch(
                        new PHPNode\Expr\Variable('this'),
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

                $validator->addStmt(new PHPNode\Stmt\Return_(
                    new PHPNode\Expr\Variable('value')
                ));

                $result->addStmt($validator->getNode());
            }

            // Setter
            if ($this->testFlag($field, Node\Field::FLAG_EDITABLE)) {
                $setter = $factory->method("set$nameForMethod")->
                    makePublic()->

                    addParam($factory->param('value'));

                if (!$field->type->mixed) {
                    $setter->setReturnType($field->type->toTypeHint());
                }

                $setter->addStmt(new PHPNode\Stmt\Expression(
                    new PHPNode\Expr\Assign(
                        new PHPNode\Expr\Variable('oldValue'),
                        new PHPNode\Expr\PropertyFetch(
                            new PHPNode\Expr\Variable('this'),
                            $field->name
                        )
                    )
                ));

                $setter->addStmt(new PHPNode\Stmt\Expression(
                    new PHPNode\Expr\Assign(
                        new PHPNode\Expr\PropertyFetch(
                            new PHPNode\Expr\Variable('this'),
                            $field->name
                        ),
                        $factory->methodCall(
                            new PHPNode\Expr\Variable('this'),
                            "validate$nameForMethod",
                            [new PHPNode\Expr\Variable('value')]
                        )
                    )
                ));

                $setter->addStmt(new PHPNode\Stmt\Return_(
                    new PHPNode\Expr\Variable('oldValue')
                ));

                $result->addStmt($setter->getNode());
            }
        }

        // TODO Data class methods

        return $result->getNode();
    }

    protected function buildClassFieldsConst(Node\Class_ $node, BuilderFactory $factory): PHPNode\Stmt\ClassConst {
        $fields = [];

        foreach ($node->fields as $field) {
            $fields[(string) $field->name] = $this->convertFieldNameForMethod($field->name);
        }

        return new PHPNode\Stmt\ClassConst(
            [new PHPNode\Const_('FIELDS', $factory->val($fields))],
            PHPNode\Stmt\Class_::MODIFIER_PRIVATE
        );
    }

    protected function buildClassConstructor(Node\Class_ $node, BuilderFactory $factory): PHPNode\Stmt\ClassMethod {
        $result = $factory->method('__construct')->
            makePublic()->
            addParam(
                $factory->
                    param('init')->
                    setTypeHint('array')->
                    setDefault($factory->val([]))
                );

        // Default values
        foreach ($node->fields as $field) {
            if ($this->testFlag($field, Node\Field::FLAG_DIRECT_DEFINING) || is_null($field->default)) {
                continue;
            }

            $value = null;
            if ($this->testFlag($field, Node\Field::FLAG_FILTER_DEFAULT)) {
                $value = $factory->methodCall(
                    new PHPNode\Expr\Variable('this'),
                    $this->convertFieldNameForMethod($field->name, 'validate'),
                    [$field->default]
                );
            } else {
                $value = $field->default;
            }

            $result->addStmt(new PHPNode\Expr\Assign(
                new PHPNode\Expr\PropertyFetch(
                    new PHPNode\Expr\Variable('this'),
                    $field->name
                ),
                $value
            ));
        }

        // $this->_PDG_construct($init);
        $result->addStmt($factory->methodCall(new PHPNode\Expr\Variable('this'), '_PDG_construct', [new PHPNode\Expr\Variable('init')]));

        return $result->getNode();
    }
}
