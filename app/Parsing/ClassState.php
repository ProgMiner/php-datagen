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

use PHPDataGen\Building\ClassBuilder;

/**
 * Class parsing state
 */
class ClassState implements State {

    /**
     * @var State Parent state
     */
    protected $parent = null;

    /**
     * @var ClassBuilder Builder
     */
    protected $builder = null;

    /**
     * @var FieldState Last produced field state
     */
    protected $field = null;

    /**
     * @var int Current file parsing state
     *
     * 0 - Class name
     * 1 - After class name
     * 2 - Extends
     * 3 - Implements
     * 4 - After implement
     * 5 - Fields
     * 6 - Field
     *
     */
    protected $state = 0;

    /**
     * @param State $parent Parent state
     */
    public function __construct(State $parent) {
        $this->builder = new ClassBuilder();
        $this->parent = $parent;
    }

    public function getBuilder(): ClassBuilder {
        return $this->builder;
    }

    public function step(Conveyor $conveyor): State {
        switch ($this->state) {
        case 0:
            $this->builder->setName($conveyor->readName());

            $this->state = 1;
            return $this;

        case 1:
            if ($conveyor->readOperator('extends')) {
                $this->state = 2;

                return $this;
            }

            if ($conveyor->readOperator('implements')) {
                $this->state = 3;

                return $this;
            }

            if ($conveyor->readOperator('{')) {
                $this->state = 5;

                return $this;
            }

            throw $conveyor->makeException('Open bracket expected');

        case 2:
            $this->builder->setExtends($conveyor->readExtendedClassname());

            $this->state = 1;
            return $this;

        case 3:
            $this->builder->addImplement($conveyor->readExtendedClassname());

            $this->state = 4;
            return $this;

        case 4:
            if ($conveyor->readOperator(',')) {
                $this->state = 3;

                return $this;
            }

            $this->state = 1;
            return $this;

        case 5:
            if (
                    $conveyor->readOperator('direct', false) ||
                    $conveyor->readOperator('val',    false) ||
                    $conveyor->readOperator('var',    false)
            ) {
                $this->field = new FieldState($this);
                $this->field->step($conveyor);

                $this->state = 6;
                return $this->field;
            }

            if ($conveyor->readOperator('}')) {
                $this->parent->step($conveyor);

                return $this->parent;
            }

            throw $conveyor->makeException('Close bracket expected');

        case 6:
            $this->builder->addField($this->field->getBuilder());
            $this->field = null;

            $this->state = 5;
            return $this;
        }
    }
}
