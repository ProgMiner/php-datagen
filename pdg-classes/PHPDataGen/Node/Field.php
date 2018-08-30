<?php

namespace PHPDataGen\Node;

class Field extends \PHPDataGen\Node
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = ['name' => 'Name', 'flags' => 'Flags', 'type' => 'Type', 'default' => 'Default'];
    public const FLAG_EDITABLE = 1;
    public const FLAG_DIRECT = 2;
    public const FLAG_FILTER_DEFAULT = 4;
    public const FLAG_DIRECT_DEFINING = 8;
    private $name = null;
    private $flags = 4;
    private $type = null;
    private $default = null;
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
    public function &getType() : \PHPDataGen\Type
    {
        return $this->type;
    }
    protected function validateType($value) : \PHPDataGen\Type
    {
        return $value;
    }
    public function setType($value) : \PHPDataGen\Type
    {
        $oldValue = $this->type;
        $this->type = $this->validateType($value);
        return $oldValue;
    }
    public function &getDefault() : ?\PhpParser\Node\Expr
    {
        return $this->default;
    }
    protected function validateDefault($value) : ?\PhpParser\Node\Expr
    {
        return $value;
    }
    public function setDefault($value) : ?\PhpParser\Node\Expr
    {
        $oldValue = $this->default;
        $this->default = $this->validateDefault($value);
        return $oldValue;
    }
}
