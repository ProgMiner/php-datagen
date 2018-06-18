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
 * Type representation
 *
 * TODO Not nullable
 */
class Type {

    const TYPES = ['mixed', 'array', 'bool', 'callable', 'float', 'int', 'iterable', 'string'];

    /**
     * @var string Type name
     */
    protected $name = '';

    /**
     * @var bool Is field nullable?
     */
    protected $nullable = true;

    /**
     * @var bool Is type mixed?
     */
    protected $mixed = false;

    /**
     * @var bool Is type class?
     */
    protected $class = false;

    /**
     * @param string $type Type name of class
     */
    public function __construct(string $type) {
        $this->name = $type;

        $type = strtolower($type);

        if ($type === 'mixed') {
            $this->mixed = true;
        } else if (!in_array($type, self::TYPES)) {
            $this->class = true;
        }

        if (!$this->class) {
            $this->name = $type;
        }
    }

    /**
     * Returns default value for this type
     *
     * @return string
     */
    public function getDefaultValue(): string {
        if ($this->nullable || $this->mixed || $this->class) {
            return 'null';
        }

        switch ($this->name) {
        case 'array':
            return '[]';

        case 'bool':
            return 'false';

        case 'float':
            return '0.0';

        case 'int':
            return '0';

        case 'string':
            return '""';

        }

        return 'null';
    }

    /**
     * If type is a class and is represented by short class name
     * fixes to full by FileModel::getClassPath.
     *
     * @param FileModel File model
     */
    public function fixClassName(FileModel $fileModel) {
        if (!$this->class) {
            return;
        }

        if ($this->name[0] === '\\') {
            return;
        }

        $this->name = '\\'.$fileModel->getClassPath($this->name);
    }

    /**
     * Makes validation code for this type
     *
     * If type is mixed returns empty string
     *
     * @param string $expr      Expression for validating
     * @param string $exception Message for exception
     *
     * @return string Type tip prefixed by ": " or empty
     */
    public function makeValidator(string $expr, string $exception = 'Invalid type'): string {
        if ($this->mixed) {
            return '';
        }

        $result = 'if (!is_';

        if ($this->class) {
            $result .= "a($expr, {$this->name}::class)";
        } else {
            $result .= "{$this->name}($expr)";
        }

        $result .= " && !is_null($expr)) { throw new \InvalidArgumentException('$exception'); }";

        return "$result\n";
    }

    public function getName(): string {
        return $this->name;
    }

    public function isMixed(): bool {
        return $this->mixed;
    }

    public function isClass(): bool {
        return $this->class;
    }
}
