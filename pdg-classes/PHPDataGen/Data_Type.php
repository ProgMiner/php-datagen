<?php

namespace PHPDataGen;

abstract class Data_Type
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = ['name' => 'Name', 'nullable' => 'Nullable', 'mixed' => 'Mixed', 'class' => 'Class'];
    private $name = '';
    private $nullable = false;
    private $mixed = false;
    private $class = false;
    public function __construct(array $init = [])
    {
        $this->_PDG_construct($init);
    }
    public function &getName() : string
    {
        return $this->name;
    }
    protected function validateName($value) : string
    {
        return $value;
    }
    public function setName($value) : string
    {
        $oldValue = $this->name;
        $this->name = $this->validateName($value);
        return $oldValue;
    }
    public function &getNullable() : bool
    {
        return $this->nullable;
    }
    protected function validateNullable($value) : bool
    {
        return $value;
    }
    public function setNullable($value) : bool
    {
        $oldValue = $this->nullable;
        $this->nullable = $this->validateNullable($value);
        return $oldValue;
    }
    public function &getMixed() : bool
    {
        return $this->mixed;
    }
    protected function validateMixed($value) : bool
    {
        return $value;
    }
    public function setMixed($value) : bool
    {
        $oldValue = $this->mixed;
        $this->mixed = $this->validateMixed($value);
        return $oldValue;
    }
    public function &getClass() : bool
    {
        return $this->class;
    }
    protected function validateClass($value) : bool
    {
        return $value;
    }
    public function setClass($value) : bool
    {
        $oldValue = $this->class;
        $this->class = $this->validateClass($value);
        return $oldValue;
    }
}
