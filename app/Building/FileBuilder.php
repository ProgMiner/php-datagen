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

use PHPDataGen\Model\FileModel;

/**
 * File builder
 */
class FileBuilder {

    /**
     * @var string File namespace
     */
    protected $namespace = '';

    /**
     * @var array(string => string) File uses (class name => full class name)
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
        $className = explode('\\', $use);
        $className = array_pop($className);

        if (is_null($className)) {
            throw new \UnexpectedValueException("Invalid use \"$use\"");
        }

        if (isset($this->uses[$className])) {
            throw new \Exception("Class name \"$className\" is already used");
        }

        $this->uses[$className] = $use;

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
        if (!in_array($class, $this->classes)) {
            $this->classes[] = $class;
        }

        return $this;
    }

    /**
     * Builds file model
     *
     * @return FileModel
     */
    public function build(): FileModel {
        $model = new FileModel();

        $model->namespace = $this->namespace;
        $model->uses = $this->uses;

        $model->classes = [];
        foreach ($this->classes as $class) {
            $model->classes[] = $class->build();
        }

        return $model;
    }
}
