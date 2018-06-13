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

/**
 * Parser
 */
class Parser {

    /**
     * @var Conveyor Parsing conveyor
     */
    protected $conveyor = null;

    /**
     * @var State Parser state
     */
    protected $state = null;

    public function __construct(string $source) {
        $this->conveyor = new Conveyor($source);
        $this->state = new FileState();
    }

    /**
     * Runs full parsing
     */
    public function parse() {
        while($this->conveyor->length() > 0) {
            $this->step();
        }
    }

    /**
     * Runs one step of parsing
     */
    public function step() {
        $this->conveyor->skipSpaces();
        $this->state = $this->state->step($this->conveyor);

        $this->conveyor->skipSpaces();
        $this->conveyor->skipComment();
    }

    /**
     * Returns parser conveyor
     *
     * @return Conveyor
     */
    public function getConveyor(): Conveyor {
        return $this->conveyor;
    }

    /**
     * Returns current parser state
     *
     * @return State
     */
    public function getCurrentState(): State {
        return $this->state;
    }
}