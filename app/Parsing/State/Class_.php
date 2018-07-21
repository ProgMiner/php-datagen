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

namespace PHPDataGen\Parsing\State;

use PHPDataGen\Parsing;
use PHPDataGen\Builder;

/**
 * Class parsing state
 */
class Class_ implements Parsing\State {

    /**
     * @var Parsing\State Parent state
     */
    protected $parent = null;

    /**
     * @var Builder\Class_ Builder
     */
    protected $builder = null;

    /**
     * @var Field Last produced field state
     */
    protected $field = null;

    /**
     * @var int Current file parsing state
     *
     * 0 - final/final!/data
     * 1 - Class
     * 2 - Class name
     * 3 - After class name
     * 4 - Extends
     * 5 - Implements
     * 6 - After implement
     * 7 - Fields
     * 8 - Field
     *
     */
    protected $state = 0;

    /**
     * @param Parsing\State $parent Parent state
     */
    public function __construct(Parsing\State $parent) {
        $this->builder = new Builder\Class_();
        $this->parent = $parent;
    }

    public function getBuilder(): Builder\Class_ {
        return $this->builder;
    }

    public function step(Parsing\Conveyor $conveyor): Parsing\State {
        switch ($this->state) {
        case 0:
            if ($conveyor->readOperator('final')) {
                $this->builder->setFinal();

                if ($conveyor->readOperator('!')) {
                    $this->builder->setFinalFinal();
                }

                return $this;
            }

            if ($conveyor->readOperator('data')) {
                $this->builder->setData();

                return $this;
            }

            $this->state = 1;
            return $this;

        case 1:
            $conveyor->readOperator('class', true, true);

            $this->state = 2;
            return $this;

        case 2:
            $this->builder->setName($conveyor->readName());

            $this->state = 3;
            return $this;

        case 3:
            if ($conveyor->readOperator('extends')) {
                $this->state = 4;

                return $this;
            }

            if ($conveyor->readOperator('implements')) {
                $this->state = 5;

                return $this;
            }

            if ($conveyor->readOperator('{')) {
                $this->state = 7;

                return $this;
            }

            throw $conveyor->makeException('Open bracket expected');

        case 4:
            $this->builder->setExtends($conveyor->readExtendedClassname());

            $this->state = 3;
            return $this;

        case 5:
            $this->builder->addImplement($conveyor->readExtendedClassname());

            $this->state = 6;
            return $this;

        case 6:
            if ($conveyor->readOperator(',')) {
                $this->state = 5;

                return $this;
            }

            $this->state = 3;
            return $this;

        case 7:
            if (
                    $conveyor->readOperator('direct', false) ||
                    $conveyor->readOperator('val',    false) ||
                    $conveyor->readOperator('var',    false)
            ) {
                $this->field = new Field($this);
                $this->field->step($conveyor);

                $this->state = 8;
                return $this->field;
            }

            if ($conveyor->readOperator('}')) {
                $this->parent->step($conveyor);

                return $this->parent;
            }

            throw $conveyor->makeException('Close bracket expected');

        case 8:
            $this->builder->addField($this->field->getBuilder());
            $this->field = null;

            $this->state = 7;
            return $this;
        }
    }
}
