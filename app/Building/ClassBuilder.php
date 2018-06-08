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

namespace PHPDataGen\Building;

/**
 * Class builder
 */
class ClassBuilder {

    /**
     * @var string Class name
     */
    protected $name = null;

    /**
     * @var string Extended class name
     */
    protected $extends = null;

    /**
     * @var string[] Implemented interface names
     */
    protected $implements = [];

    /**
     * @var FieldBuilder[] Fields contained in file
     */
    protected $fields = [];

    /**
     * Sets class name
     *
     * @param string $name New class name
     *
     * @return static $this
     */
    public function setName(string $name): ClassBuilder {
        $this->name = $name;
        return $this;
    }

    /**
     * Sets extended class name
     *
     * @param string $name New extended class name
     *
     * @return static $this
     */
    public function setExtends(string $extends): ClassBuilder {
        $this->extends = $extends;
        return $this;
    }

    /**
     * Adds interface name in implements array
     *
     * @param string $interface Interface name
     *
     * @return static $this
     */
    public function addImplements(string $interface): ClassBuilder {
        // TODO
        return $this;
    }

    /**
     * Adds field builder in fields array
     *
     * @param FieldBuilder $field Field builder
     *
     * @return static $this
     */
    public function addField(FieldBuilder $field): ClassBuilder {
        // TODO
        return $this;
    }

    /**
     * Builds class
     */
    public function build() {
        // TODO
    }
}
