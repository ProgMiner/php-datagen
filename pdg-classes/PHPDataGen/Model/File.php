<?php

namespace PHPDataGen\Model;

class File
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = ['namespace' => 'Namespace', 'uses' => 'Uses', 'class' => 'Class'];
    private $namespace = '';
    private $uses = [];
    private $class = null;
    public function __construct(array $init = [])
    {
        foreach ($init as $field => $value) {
            $this->{$field} = $this->{'validate' . self::FIELDS[$field]}($value);
        }
    }
    public function &getNamespace() : string
    {
        return $this->namespace;
    }
    protected function validateNamespace(string $value) : string
    {
        return $value;
    }
    public function setNamespace(string $value) : string
    {
        $oldValue = $this->namespace;
        $this->namespace = $this->validateNamespace($value);
        return $oldValue;
    }
    public function &getUses() : array
    {
        return $this->uses;
    }
    protected function validateUses(array $value) : array
    {
        return $value;
    }
    public function setUses(array $value) : array
    {
        $oldValue = $this->uses;
        $this->uses = $this->validateUses($value);
        return $oldValue;
    }
    public function &getClass() : Class_
    {
        return $this->class;
    }
    protected function validateClass(Class_ $value) : Class_
    {
        return $value;
    }
    public function setClass(Class_ $value) : Class_
    {
        $oldValue = $this->class;
        $this->class = $this->validateClass($value);
        return $oldValue;
    }
}
