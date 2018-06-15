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

namespace PHPDataGen\Parsing;

use PHPDataGen\Building\FieldBuilder;

/**
 * Field parsing state
 */
class FieldState implements State {

    /**
     * @var State Parent state
     */
    protected $parent = null;

    /**
     * @var FieldBuilder Builder
     */
    protected $builder = null;

    /**
     * @var int Current file parsing state
     *
     * 0 - Direct
     * 1 - Val/var
     * 2 - Field name
     * 3 - After field name
     * 4 - Type name
     * 5 - After type name
     * 6 - Validator
     * 7 - Default value
     *
     */
    protected $state = 0;

    /**
     * @param State $parent Parent state
     */
    public function __construct(State $parent) {
        $this->builder = new FieldBuilder();
        $this->parent = $parent;
    }

    public function getBuilder(): FieldBuilder {
        return $this->builder;
    }

    public function step(Conveyor $conveyor): State {
        switch ($this->state) {
        case 0:
            if ($conveyor->readOperator('direct')) {
                $this->builder->setDirect(true);

                return $this;
            }

            $this->state = 1;
            return $this;

        case 1:
            $this->state = 2;

            if ($conveyor->readOperator('val')) {
                return $this;
            }

            if ($conveyor->readOperator('var')) {
                $this->builder->setEditable(true);

                return $this;
            }

            throw $conveyor->makeException('val/var operator expected');

        case 2:
            $this->builder->setName($conveyor->readName());

            $this->state = 3;
            return $this;

        case 3:
            if ($conveyor->readOperator('=')) {
                $this->state = 7;
                return $this;
            }

            if ($conveyor->readOperator(':=')) {
                $this->builder->setFilterDefault(false);

                $this->state = 7;
                return $this;
            }

            if ($conveyor->readOperator(':')) {
                $this->state = 4;
                return $this;
            }

            $conveyor->readSemicolon();

            $this->parent->step($conveyor);
            return $this->parent;

        case 4:
            $this->builder->setType($conveyor->readExtendedClassname());

            $this->state = 5;
            return $this;

        case 5:
            if ($conveyor->readOperator(',')) {
                $this->state = 6;
                return $this;
            }

            $this->state = 3;
            return $this;

        case 6:
            $this->builder->addValidator($conveyor->readName());

            $this->state = 5;
            return $this;

        case 7:
            $matches = [];

            $fail = false;
            if ($conveyor->readOperator('```')) {
                if (preg_match('/^([\\s\\S]*?)```/', $conveyor, $matches) !== 1) {
                    $fail = true;
                }
            } elseif ($conveyor->readOperator('`')) {
                if (preg_match('/^(.*?)`/', $conveyor, $matches) !== 1) {
                    $fail = true;
                }
            } else {
                if (preg_match('/^(.*?);/', $conveyor, $matches) !== 1) {
                    $fail = true;
                } else {
                    $matches[0] = substr($matches[0], 0, strlen($matches[1]));
                }
            }

            if ($fail) {
                throw $conveyor->makeException('Error occured while default value parsing');
            }

            $conveyor->move(strlen($matches[0]));
            $this->builder->setDefault($matches[1]);

            $this->state = 3;
            return $this;
        }
    }
}
