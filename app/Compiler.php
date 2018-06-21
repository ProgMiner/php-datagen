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

use PHPDataGen\Model\FileModel;
use PHPDataGen\Model\ClassModel;

/**
 * Compiler
 */
class Compiler {

    /**
     * @var array(string => string) Array of validator functions
     */
    protected $validators = [];

    public function compile(FileModel $fileModel): string {
        $result = "<?php\n";

        if (!is_null($fileModel->namespace)) {
            // TODO Custom data class location
            $result .= "namespace {$fileModel->namespace};\n";
        }

        foreach ($fileModel->classes as $class) {
            $result .= $this->compileClass($class, $fileModel)."\n";
        }

        return $result;
    }

    protected function compileClass(ClassModel $classModel, FileModel $fileModel): string {
        // TODO Custom naming
        $result = "class Data_{$classModel->name}";

        if (!is_null($classModel->extends)) {
            $result .= ' extends '.$fileModel->getClassPath($classModel->extends);
        }

        if (!empty($classModel->implements)) {
            $interfaces = [];

            foreach ($classModel->implements as $interface) {
                $interfaces[] = $fileModel->getClassPath($interface);
            }

            $result .= ' implements '.implode(', ', $interfaces);
        }

        $result .= " {\n";

        // TODO Library use disabling
        $result .= "use \\PHPDataGen\\DataClassTrait;\n";

        foreach ($classModel->fields as $fieldModel) {
            if ($fieldModel->direct) {
                $result .= 'protected';
            } else {
                $result .= 'private';
            }

            $result .= " \${$fieldModel->name} = ";

            if ($fieldModel->directDefining) {
                $result .= $fieldModel->default;
            } else {
                $result .= $fieldModel->type->getDefaultValue();
            }

            $result .=";\n";
        }

        $result .= "public function __construct(array \$init = []) {\n";

        foreach ($classModel->fields as $fieldModel) {
            if ($fieldModel->directDefining || is_null($fieldModel->default)) {
                continue;
            }

            $result .= "\$this->{$fieldModel->name} = ";

            if ($fieldModel->filterDefault) {
                $result .= "\$this->validate_{$fieldModel->name}({$fieldModel->default})";
            } else {
                $result .= $fieldModel->default;
            }

            $result .= ";\n";
        }

        $result .= <<<'EOF'
foreach ($init as $field => $value) {
    $validate = "validate_$field";
    $this->$field = $this->$validate($value);
}
}

EOF;

        foreach ($classModel->fields as $fieldModel) {
            $fieldModel->type->fixClassName($fileModel);

            $result .= "public function ";

            if ($fieldModel->editable) {
                $result .= '&';
            }

            $result .= "get_{$fieldModel->name}() { return \$this->{$fieldModel->name}; }\n";

            if (!$fieldModel->type->mixed || !empty($fieldModel->validation)) {
                $result .= "protected function validate_{$fieldModel->name}(\$value) {\n";

                $result .= $fieldModel->type->makeValidator('$value', "Field {$fieldModel->name} has type {$fieldModel->type->name}");

                foreach ($fieldModel->validators as $validator) {
                    if (!isset($this->validators[$validator])) {
                        throw new CompilationException("Validator \"{$validator}\" is not defined");
                    }

                    $result .= "\$value = {$this->validators[$validator]}(\$value);\n";
                }

                $result .= "return \$value;\n}\n";
            } else {
                $result .= "protected function validate_{$fieldModel->name}(\$value) { return \$value; }\n";
            }

            if ($fieldModel->editable) {
                $result .= "public function set_{$fieldModel->name}(\$value) { ".
                        "\$this->{$fieldModel->name} = \$this->validate_{$fieldModel->name}(\$value);".
                        "}\n";
            }
        }

        $result .= '}';

        return $result;
    }
}
