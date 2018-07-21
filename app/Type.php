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
use PhpParser\Node;

/**pdgl

class Type {

    var name: string;

    var nullable: bool;
    var mixed:    bool;
    var class:    bool;
}
*/

/**
 * Type representation
 */
class Type extends Data_Type {

    const TYPES = ['mixed', 'array', 'bool', 'callable', 'float', 'int', 'iterable', 'string'];

    /**
     * @param string $type Type name of class
     */
    public function __construct(string $type, bool $nullable = false) {
        $fields = [
            'name'     => $type,

            'nullable' => $nullable,
            'mixed'    => false,
            'class'    => false,
        ];

        $type = strtolower($type);

        if ($type === 'mixed') {
            $fields['mixed'] = true;
        } else if (!in_array($type, self::TYPES)) {
            $fields['class'] = true;
        }

        if (!$fields['class']) {
            $fields['name'] = $type;
        }

        parent::__construct($fields);
    }

    /**
     * Returns default value for this type
     *
     * @return Node\Expr
     */
    public function getDefaultValue(): Node\Expr {
        $factory = new BuilderFactory();

        if ($this->nullable || $this->mixed || $this->class) {
            return $factory->val(null);
        }

        switch ($this->name) {
        case 'array':
            return $factory->val([]);

        case 'bool':
            return $factory->val(false);

        case 'float':
            return $factory->val(0.0);

        case 'int':
            return $factory->val(0);

        case 'string':
            return $factory->val('');

        default:
            return $factory->val(null);
        }
    }

    /**
     * Makes typehint from Type
     *
     * @return string
     */
    public function toTypeHint(): string {
        if ($this->mixed) {
            throw new LogicException('Cannot make typehint for mixed type');
        }

        if ($this->nullable) {
            return '?'.$this->name;
        }

        return $this->name;
    }
}
