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

/**
 * Compiler
 */
class Compiler {

    // TODO
    protected $validators = [];

    public function compile(FileModel $fileModel): string {
        $result = "<?php\n";

        // TODO Custom data class location
        $result .= "namespace {$fileModel->namespace};\n";

        foreach ($fileModel->classes as $class) {
            $result .= $this->compileClass($class, $fileModel)."\n";
        }

        return $result;
    }

    protected function compileClass(ClassModel $classModel, FileModel $fileModel): string {
        $result = "class {$classModel->name}";

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

        foreach ($classModel->fields as $fieldModel) {
            if ($fieldModel->direct) {
                $result .= 'protected';
            } else {
                $result .= 'private';
            }

            $result .= " {$fieldModel->name} = null;\n";
        }

        $result .= "public function __construct(array \$init = []) {\n";

        foreach ($classModel->fields as $fieldModel) {
            if (!$fieldModel->hasDefault) {
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
    $this->$field = $this->validate_$field($value);
}
}
EOF;

        foreach ($classModel->fields as $fieldModel) {
            // TODO getters, setters, validators
        }

        $result .= '}';

        return $result;
    }
}
