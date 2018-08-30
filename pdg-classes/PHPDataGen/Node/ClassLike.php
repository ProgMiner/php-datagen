<?php

namespace PHPDataGen\Node;

class ClassLike extends \PHPDataGen\Node
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = ['name' => 'Name', 'flags' => 'Flags'];
    private $name = null;
    private $flags = 0;
    public function __construct(array $init = [])
    {
        $this->flags = $this->validateFlags(0);
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
}
