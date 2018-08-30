<?php

namespace PHPDataGen\Node;

class File extends \PHPDataGen\Node
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = ['namespace' => 'Namespace', 'uses' => 'Uses', 'class' => 'Class'];
    private $namespace = null;
    private $uses = [];
    private $class = null;
    public function __construct(array $init = [])
    {
        $this->_PDG_construct($init);
    }
    public function &getNamespace() : ?\PhpParser\Node\Name
    {
        return $this->namespace;
    }
    protected function validateNamespace($value) : ?\PhpParser\Node\Name
    {
        return $value;
    }
    public function setNamespace($value) : ?\PhpParser\Node\Name
    {
        $oldValue = $this->namespace;
        $this->namespace = $this->validateNamespace($value);
        return $oldValue;
    }
    public function &getUses() : array
    {
        return $this->uses;
    }
    protected function validateUses($value) : array
    {
        return $value;
    }
    public function setUses($value) : array
    {
        $oldValue = $this->uses;
        $this->uses = $this->validateUses($value);
        return $oldValue;
    }
    public function &getClass() : ?\PHPDataGen\Node\Class_
    {
        return $this->class;
    }
    protected function validateClass($value) : ?\PHPDataGen\Node\Class_
    {
        return $value;
    }
    public function setClass($value) : ?\PHPDataGen\Node\Class_
    {
        $oldValue = $this->class;
        $this->class = $this->validateClass($value);
        return $oldValue;
    }
}
