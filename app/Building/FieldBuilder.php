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

use PHPDataGen\Type;

use PHPDataGen\Model\FieldModel;

/**
 * Field builder
 */
class FieldBuilder {

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
     * @var string[] Validators
     */
    protected $validators = [];

    /**
     * @var bool Apply validators to default value?
     */
    protected $filterDefault = true;

    /**
     * @var string Default value expression
     */
    protected $default = null;

    /**
     * Sets field name
     *
     * @param string $name New field name
     *
     * @return static $this
     */
    public function setName(string $name): FieldBuilder {
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
    public function setEditable(): FieldBuilder {
        if ($this->editable) {
            throw new \RuntimeException('Field is already setted editable');
        }

        $this->editable = true;
        return $this;
    }

    /**
     * Sets field direct
     *
     * @return static $this
     */
    public function setDirect(): FieldBuilder {
        if ($this->direct) {
            throw new \RuntimeException('Field is already setted direct');
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
    public function setType(string $type): FieldBuilder {
        $this->type = $type;
        return $this;
    }

    /**
     * Sets field not filters default value
     *
     * @return static $this
     */
    public function setNotFilterDefault(): FieldBuilder {
        if (!$this->filterDefault) {
            throw new \RuntimeException('Field is already setted not filters default');
        }

        $this->filterDefault = false;
        return $this;
    }

    /**
     * Sets default value expression
     *
     * @param string $default New default field value expression
     *
     * @return static $this
     */
    public function setDefault(string $default): FieldBuilder {
        if (isset($this->default)) {
            throw new \RuntimeException('Default value is already specified');
        }

        $this->default = $default;
        return $this;
    }

    /**
     * Adds validator name in validators array
     *
     * @param string $validator Validator name
     *
     * @return static $this
     */
    public function addValidator(string $validator): FieldBuilder {
        if (in_array($validator, $this->validators)) {
            throw new \RuntimeException("Validator \"$validator\" is already added");
        }

        $this->validators[] = $validator;

        return $this;
    }

    /**
     * Builds field model
     *
     * @return FieldModel
     */
    public function build(): FieldModel {
        $model = new FieldModel([
            'name'          => $this->name,
            'editable'      => $this->editable,
            'direct'        => $this->direct,
            'type'          => new Type($this->type),
            'validators'    => $this->validators,
            'filterDefault' => $this->filterDefault,
            'default'       => $this->default,
        ]);

        return $model;
    }
}
