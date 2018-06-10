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
class ClassState extends State {

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

    public function step(string &$next): State {
        switch ($this->state) {
        case 0:
            $this->builder->setName(Parser::readClassname($next));

            $this->state = 1;
            return $this;

        case 1:
            if (strpos($next, 'extends') === 0) {
                $this->state = 2;

                $next = substr($next, 7);
                return $this;
            }

            if (strpos($next, 'implements') === 0) {
                $this->state = 3;

                $next = substr($next, 10);
                return $this;
            }

            if (strpos($next, '{') === 0) {
                $this->state = 5;

                $next = substr($next, 1);
                return $this;
            }

            throw new \Exception('Open bracket not found');

        case 2:
            $this->builder->setExtends(Parser::readExtendedClassname($next));

            $this->state = 1;
            return $this;

        case 3:
            $this->builder->addImplement(Parser::readExtendedClassname($next));

            $this->state = 4;
            return $this;

        case 4:
            if (strpos($next, ',') === 0) {
                $this->state = 3;

                $next = substr($next, 1);
                return $this;
            }

            $this->state = 1;
            return $this;

        case 5:
            if (
                    strpos($next, 'direct') === 0 ||
                    strpos($next, 'val')    === 0 ||
                    strpos($next, 'var')    === 0
            ) {
                $this->state = 6;

                $this->field = new FieldState($this);
                return $this->field;
            }

            if (strpos($next, '}') === 0) {
                $next = substr($next, 1);

                return $this->parent;
            }

            throw new \Exception('Close bracket not found');
        }
    }
}
