<?php

namespace PHPDataGen\Model;

class Class_
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = ['name' => 'Name', 'data' => 'Data', 'final' => 'Final', 'finalFinal' => 'FinalFinal', 'extends' => 'Extends', 'implements' => 'Implements', 'fields' => 'Fields'];
    private $name = '';
    private $data = false;
    private $final = false;
    private $finalFinal = false;
    private $extends = null;
    private $implements = [];
    private $fields = [];
    public function __construct(array $init = [])
    {
        foreach ($init as $field => $value) {
            $this->{$field} = $this->{'validate' . self::FIELDS[$field]}($value);
        }
    }
    public function &getName() : string
    {
        return $this->name;
    }
    protected function validateName(string $value) : string
    {
        return $value;
    }
    public function setName(string $value) : string
    {
        $oldValue = $this->name;
        $this->name = $this->validateName($value);
        return $oldValue;
    }
    public function &getData() : bool
    {
        return $this->data;
    }
    protected function validateData(bool $value) : bool
    {
        return $value;
    }
    public function setData(bool $value) : bool
    {
        $oldValue = $this->data;
        $this->data = $this->validateData($value);
        return $oldValue;
    }
    public function &getFinal() : bool
    {
        return $this->final;
    }
    protected function validateFinal(bool $value) : bool
    {
        return $value;
    }
    public function setFinal(bool $value) : bool
    {
        $oldValue = $this->final;
        $this->final = $this->validateFinal($value);
        return $oldValue;
    }
    public function &getFinalFinal() : bool
    {
        return $this->finalFinal;
    }
    protected function validateFinalFinal(bool $value) : bool
    {
        return $value;
    }
    public function setFinalFinal(bool $value) : bool
    {
        $oldValue = $this->finalFinal;
        $this->finalFinal = $this->validateFinalFinal($value);
        return $oldValue;
    }
    public function &getExtends() : ?string
    {
        return $this->extends;
    }
    protected function validateExtends(?string $value) : ?string
    {
        return $value;
    }
    public function setExtends(?string $value) : ?string
    {
        $oldValue = $this->extends;
        $this->extends = $this->validateExtends($value);
        return $oldValue;
    }
    public function &getImplements() : array
    {
        return $this->implements;
    }
    protected function validateImplements(array $value) : array
    {
        return $value;
    }
    public function setImplements(array $value) : array
    {
        $oldValue = $this->implements;
        $this->implements = $this->validateImplements($value);
        return $oldValue;
    }
    public function &getFields() : array
    {
        return $this->fields;
    }
    protected function validateFields(array $value) : array
    {
        return $value;
    }
    public function setFields(array $value) : array
    {
        $oldValue = $this->fields;
        $this->fields = $this->validateFields($value);
        return $oldValue;
    }
}
