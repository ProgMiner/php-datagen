<?php

namespace PHPDataGen\Model;

abstract class Data_Class_ extends \PHPDataGen\Model
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = ['name' => 'Name', 'flags' => 'Flags', 'extends' => 'Extends', 'implements' => 'Implements', 'fields' => 'Fields'];
    private $name = '';
    private $flags = 0;
    private $extends = '';
    private $implements = [];
    private $fields = [];
    public function __construct(array $init = [])
    {
        $this->flags = $this->validateFlags(0);
        foreach ($init as $field => $value) {
            $this->{$field} = $this->{'validate' . self::FIELDS[$field]}($value);
        }
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
    public function &getFlags() : int
    {
        return $this->flags;
    }
    protected function validateFlags($value) : int
    {
        return $value;
    }
    public function setFlags($value) : int
    {
        $oldValue = $this->flags;
        $this->flags = $this->validateFlags($value);
        return $oldValue;
    }
    public function &getExtends() : string
    {
        return $this->extends;
    }
    protected function validateExtends($value) : string
    {
        return $value;
    }
    public function setExtends($value) : string
    {
        $oldValue = $this->extends;
        $this->extends = $this->validateExtends($value);
        return $oldValue;
    }
    public function &getImplements() : array
    {
        return $this->implements;
    }
    protected function validateImplements($value) : array
    {
        return $value;
    }
    public function setImplements($value) : array
    {
        $oldValue = $this->implements;
        $this->implements = $this->validateImplements($value);
        return $oldValue;
    }
    public function &getFields() : array
    {
        return $this->fields;
    }
    protected function validateFields($value) : array
    {
        return $value;
    }
    public function setFields($value) : array
    {
        $oldValue = $this->fields;
        $this->fields = $this->validateFields($value);
        return $oldValue;
    }
}
