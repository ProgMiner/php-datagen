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
use PHPDataGen\Type;

/**
 * Field builder
 *
 * @author Eridan Domoratskiy <eridan200@mail.ru>
 */
class Field {

    /**
     * @var string Field name
     */
    protected $name = null;

    /**
     * @var bool Is editable
     */
    protected $editable = false;

    /**
     * @var bool Has direct access from self class
     */
    protected $direct = false;

    /**
     * @var Type Type
     */
    protected $type = null;

    /**
     * @var bool Is field defined directly in declaration?
     */
    protected $directDefining = false;

    /**
     * @var bool Validate default value?
     */
    protected $filterDefault = true;

    /**
     * @var Node\Expr Default value expression
     */
    protected $default = null;

    public function __construct() {
        $this->type = new Type('mixed');
    }

    /**
     * Sets field name
     *
     * @param string $name New field name
     *
     * @return static $this
     */
    public function setName(string $name): Field {
        if (isset($this->name)) {
            throw new \RuntimeException('Field name is already specified');
        }

        $this->name = $name;
        return $this;
    }

    /**
     * Sets field editable
     *
     * @return static $this
     */
    public function setEditable(): Field {
        if ($this->editable) {
            throw new \RuntimeException('Field is already set editable');
        }

        $this->editable = true;
        return $this;
    }

    /**
     * Sets field direct
     *
     * @return static $this
     */
    public function setDirect(): Field {
        if ($this->direct) {
            throw new \RuntimeException('Field is already set direct');
        }

        $this->direct = true;
        return $this;
    }

    /**
     * Sets type name
     *
     * @param string $type New field type name
     *
     * @return static $this
     */
    public function setType(Type $type): Field {
        $this->type = $type;
        return $this;
    }

    /**
     * Sets field directly defined in declaration
     *
     * @return static $this
     */
    public function setDirectDefining(): Field {
        if ($this->directDefining) {
            throw new \RuntimeException('Field is already set directly defined');
        }

        $this->directDefining = true;
        return $this;
    }

    /**
     * Sets field not filters default value
     *
     * @return static $this
     */
    public function setNotFilterDefault(): Field {
        if (!$this->filterDefault) {
            throw new \RuntimeException('Field is already set not filters default');
        }

        $this->filterDefault = false;
        return $this;
    }

    /**
     * Sets default value expression
     *
     * @param Node\Expr $default New default field value expression
     *
     * @return static $this
     */
    public function setDefault(Node\Expr $default): Field {
        if (isset($this->default)) {
            throw new \RuntimeException('Default value is already specified');
        }

        $this->default = $default;
        return $this;
    }

    /**
     * Builds field model
     *
     * @return Model\Field
     */
    public function build(): Model\Field {
        $model = new Model\Field([
            'name'           => $this->name,
            'editable'       => $this->editable,
            'direct'         => $this->direct,
            'type'           => $this->type,
            'directDefining' => $this->directDefining,
            'filterDefault'  => $this->filterDefault,
            'default'        => $this->default,
        ]);

        return $model;
    }
}
