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

namespace PHPDataGen\Builder;

/**
 * File builder
 */
class FileBuilder {

    /**
     * @var string File namespace
     */
    protected $namespace = '';

    /**
     * @var string[] File uses
     */
    protected $uses = [];

    /**
     * @var ClassBuilder[] Classes contained in file
     */
    protected $classes = [];

    /**
     * Sets namespace of file
     *
     * @param string $namespace Namespace
     *
     * @return static $this
     */
    public function setNamespace(string $namespace) {
        $this->namespace = $namespace;
        return $this;
    }

    /**
     * Adds used class name in uses array
     *
     * @param string $use Used class name
     *
     * @return static $this
     */
    public function addUse(string $use) {
        // TODO
        return $this;
    }

    /**
     * Adds class builder in classes array
     *
     * @param ClassBuilder $class Class builder
     *
     * @return static $this
     */
    public function addClass(ClassBuilder $class) {
        // TODO
        return $this;
    }

    /**
     * Builds file
     */
    public function build() {
        // TODO
    }
}
