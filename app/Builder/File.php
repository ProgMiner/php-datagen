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

use PhpParser\Node;

use PHPDataGen\Model;

/**
 * File builder
 */
class File {

    /**
     * @var string File namespace
     */
    protected $namespace = null;

    /**
     * @var Node\Stmt\Use_[] File uses
     */
    protected $uses = [];

    /**
     * @var Class_ Class contained in file
     */
    protected $class = null;

    /**
     * Sets namespace of file
     *
     * @param string $namespace Namespace
     *
     * @return static $this
     */
    public function setNamespace(string $namespace): File {
        if (!is_null($this->namespace)) {
            throw new \RuntimeException('Namespace is already specified');
        }

        $this->namespace = $namespace;
        return $this;
    }

    /**
     * Adds use statement
     *
     * @param Node\Stmt\Use_ $use Use statement
     *
     * @return static $this
     */
    public function addUse(Node\Stmt\Use_ $use): File {
        if (in_array($use, $this->uses, true)) {
            throw new \RuntimeException('Use is already added');
        }

        $this->uses[] = $use;
        return $this;
    }

    /**
     * Sets class builder of file
     *
     * @param Class_ $class Class builder
     *
     * @return static $this
     */
    public function setClass(Class_ $class): File {
        if (!is_null($this->class)) {
            throw new \RuntimeException('Class is already specified');
        }

        $this->class = $class;
        return $this;
    }

    /**
     * Builds file model
     *
     * @return Model\File
     */
    public function build(): Model\File {
        $model = new Model\File([
            'namespace' => $this->namespace ?? '',
            'uses'      => $this->uses,
            'class'     => $this->class->build()
        ]);

        return $model;
    }
}
