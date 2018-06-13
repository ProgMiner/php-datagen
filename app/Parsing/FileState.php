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

use PHPDataGen\Building\FileBuilder;

/**
 * File parsing state
 */
class FileState implements State {

    /**
     * @var FileBuilder Builder
     */
    protected $builder = null;

    /**
     * @var ClassState Last produced class state
     */
    protected $class = null;

    /**
     * @var string Buffer for use-as construction
     */
    protected $useBuffer = null;

    /**
     * @var int Current file parsing state
     *
     * 0 - None
     * 1 - Namespace
     * 2 - Namespace end
     * 3 - Use
     * 4 - Use-as
     * 5 - Use end
     * 6 - Class
     *
     */
    protected $state = 0;

    public function __construct() {
        $this->builder = new FileBuilder();
    }

    public function getBuilder(): FileBuilder {
        return $this->builder;
    }

    public function step(Conveyor $conveyor): State {
        switch ($this->state) {
        case 0:
            if ($conveyor->readOperator('namespace')) {
                $this->state = 1;

                return $this;
            }

            if ($conveyor->readOperator('use')) {
                $this->state = 3;

                return $this;
            }

            if ($conveyor->readOperator('class')) {
                $this->class = new ClassState($this);

                $this->state = 6;
                return $this->class;
            }

            return $this;

        case 1:
            $this->builder->setNamespace($conveyor->readNamespace());

            $this->state = 2;
            return $this;

        case 2:
            $conveyor->readSemicolon();

            $this->state = 0;
            return $this;

        case 3:
            $this->useBuffer = $conveyor->readNamespace();

            $this->state = 5;
            return $this;

        case 4:
            $this->builder->addUse($this->useBuffer, $conveyor->readClassname());
            $this->useBuffer = null;

            $this->state = 5;
            return $this;

        case 5:
            if (is_null($this->useBuffer)) {
                $conveyor->readSemicolon();

                $this->state = 0;
                return $this;
            }

            if ($conveyor->readOperator('as')) {
                $this->state = 4;
            } else {
                $this->builder->addUse($this->useBuffer);
                $this->useBuffer = null;
            }

            return $this;

        case 6:
            $this->builder->addClass($this->class->getBuilder());
            $this->class = null;

            $this->state = 0;
            return $this;
        }
    }
}
