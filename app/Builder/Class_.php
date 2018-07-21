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

use PHPDataGen\Model;

/**
 * Class builder
 */
class Class_ {

    /**
     * @var string Class name
     */
    protected $name = null;

    /**
     * @var bool Is class data?
     */
    protected $data = false;

    /**
     * @var bool Is class final?
     */
    protected $final = false;

    /**
     * @var bool Is class final final?
     */
    protected $finalFinal = false;

    /**
     * @var string Extended class name
     */
    protected $extends = null;

    /**
     * @var string[] Implemented interface names
     */
    protected $implements = [];

    /**
     * @var Field[] Fields contained in file
     */
    protected $fields = [];

    /**
     * Sets class name
     *
     * @param string $name New class name
     *
     * @return static $this
     */
    public function setName(string $name): Class_ {
        if (!is_null($this->name)) {
            throw new \RuntimeException('Class name is already specified');
        }

        $this->name = $name;
        return $this;
    }

    /**
     * Sets class data
     *
     * @return static $this
     */
    public function setData(): Class_ {
        if ($this->data) {
            throw new \RuntimeException('Class is already set data');
        }

        $this->data = true;
        return $this;
    }

    /**
     * Sets class final
     *
     * @return static $this
     */
    public function setFinal(): Class_ {
        if ($this->final) {
            throw new \RuntimeException('Class is already set final');
        }

        $this->final = true;
        return $this;
    }

    /**
     * Sets class final final
     *
     * @return static $this
     */
    public function setFinalFinal(): Class_ {
        if ($this->finalFinal) {
            throw new \RuntimeException('Class is already set final final');
        }

        $this->finalFinal = true;
        return $this;
    }

    /**
     * Sets extended class name
     *
     * @param string $name New extended class name
     *
     * @return static $this
     */
    public function setExtends(string $extends): Class_ {
        if (!is_null($this->extends)) {
            throw new \RuntimeException('Class extending is already specified');
        }

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
    public function addImplement(string $interface): Class_ {
        if (in_array($interface, $this->implements)) {
            throw new \RuntimeException("Class implementing \"$interface\" is already added");
        }

        $this->implements[] = $interface;

        return $this;
    }

    /**
     * Adds field builder in fields array
     *
     * @param Field $field Field builder
     *
     * @return static $this
     */
    public function addField(Field $field): Class_ {
        if (in_array($field, $this->fields)) {
            throw new \RuntimeException('Field is already added');
        }

        $this->fields[] = $field;

        return $this;
    }

    /**
     * Builds class model
     *
     * @return Model\Class_
     */
    public function build(): Model\Class_ {
        $model = new Model\Class_([
            'name'       => $this->name,
            'data'       => $this->data,
            'final'      => $this->final,
            'finalFinal' => $this->finalFinal,
            'extends'    => $this->extends,
            'implements' => $this->implements,
            'fields'     => []
        ]);

        foreach ($this->fields as $field) {
            $model->fields[] = $field->build();
        }

        return $model;
    }
}
