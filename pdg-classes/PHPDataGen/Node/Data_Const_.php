<?php

namespace PHPDataGen\Node;

abstract class Data_Const_ extends \PHPDataGen\Node
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = ['name' => 'Name', 'flags' => 'Flags', 'value' => 'Value'];
    private $name = null;
    private $flags = 0;
    private $value = null;
    public function __construct(array $init = [])
    {
        $this->_PDG_construct($init);
    }
    public function &getName() : \PhpParser\Node\Identifier
    {
        return $this->name;
    }
    protected function validateName($value) : \PhpParser\Node\Identifier
    {
        return $value;
    }
    public function setName($value) : \PhpParser\Node\Identifier
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
    public function &getValue() : \PhpParser\Node\Expr
    {
        return $this->value;
    }
    protected function validateValue($value) : \PhpParser\Node\Expr
    {
        return $value;
    }
    public function setValue($value) : \PhpParser\Node\Expr
    {
        $oldValue = $this->value;
        $this->value = $this->validateValue($value);
        return $oldValue;
    }
}
