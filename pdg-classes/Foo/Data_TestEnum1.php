<?php

namespace Foo;

abstract class Data_TestEnum1
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = ['A' => 'A'];
    public const ONE = 0;
    public const TWO = 2;
    public const THREE = 3;
    private const CONSTS = ['ONE' => 0, 'TWO' => 2, 'THREE' => 3];
    private $A = null;
    public function __construct(array $init = [])
    {
        $this->_PDG_construct($init);
    }
    public function getA()
    {
        return $this->A;
    }
    protected function validateA($value)
    {
        return $value;
    }
}
