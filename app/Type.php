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
 */
class Type {

    const TYPES = ['mixed', 'array', 'bool', 'callable', 'float', 'int', 'iterable', 'string'];

    /**
     * @var string Type name
     */
    protected $name = '';

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
        $type = strtolower($type);

        $this->name = $type;

        if ($type === 'mixed') {
            $this->mixed = true;
        } else if (!in_array($type, self::TYPES)) {
            $this->class = true;
        }
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

        $this->name = $fileModel->getClassPath($this->name);
    }

    /**
     * Makes type tip for return
     *
     * If type is mixed returns empty string
     *
     * @return string Type tip prefixed by ": " or empty
     */
    public function makeReturnTypeTip(): string {
        if ($this->mixed) {
            return '';
        }

        return ': '.$this->name;
    }

    /**
     * Makes type tip for argument
     *
     * If type is mixed returns empty string
     *
     * @return string Type tip suffixed by " " or empty
     */
    public function makeArgumentTypeTip(): string {
        if ($this->mixed) {
            return '';
        }

        return $this->name.' ';
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
