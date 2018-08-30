<?php

namespace PHPDataGen\Node;

class Enum extends \PHPDataGen\Node\ClassLike
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = ['consts' => 'Consts'];
    private $consts = [];
    public function __construct(array $init = [])
    {
        $this->_PDG_construct($init);
    }
    public function &getConsts() : array
    {
        return $this->consts;
    }
    protected function validateConsts($value) : array
    {
        return $value;
    }
    public function setConsts($value) : array
    {
        $oldValue = $this->consts;
        $this->consts = $this->validateConsts($value);
        return $oldValue;
    }
}
