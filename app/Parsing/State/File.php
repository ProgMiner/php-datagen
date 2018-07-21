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
 * File parsing state
 */
class File implements Parsing\State {

    /**
     * @var Builder\File Builder for cloning
     */
    protected $builder = null;

    /**
     * @var Builder\File[] Builders
     */
    protected $builders = [];

    /**
     * @var Class_ Last produced class state
     */
    protected $class = null;

    /**
     * @var int Current file parsing state
     *
     * File parsing state is not supports namespaces and uses.
     *
     * 0 - None
     * 1 - Class
     *
     */
    protected $state = 0;

    public function __construct(?Builder\File $builder = null) {
        $this->builder = $builder ?? new Builder\File();
    }

    public function getBuilders(): array {
        return $this->builders;
    }

    public function step(Parsing\Conveyor $conveyor): Parsing\State {
        if ($conveyor->length() == 0) {
            return $this;
        }

        switch ($this->state) {
        case 0:
            if (
                $conveyor->readOperator('data', false)  ||
                $conveyor->readOperator('final', false) ||
                $conveyor->readOperator('class', false)
            ) {
                $this->class = new Class_($this);
                $this->class->step($conveyor);

                $this->state = 1;
                return $this->class;
            }

            throw $conveyor->makeException('End of file expected');

        case 1:
            $builder = clone $this->builder;
            $builder->setClass($this->class->getBuilder());

            $this->builders[] = $builder;
            $this->class = null;

            $this->state = 0;
            return $this;
        }
    }
}
