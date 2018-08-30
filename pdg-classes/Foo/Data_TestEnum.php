<?php

namespace Foo;

abstract class Data_TestEnum
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = [];
    public const ONE = 1;
    public const TWO = 2;
    public const THREE = 3;
    public function __construct(array $init = [])
    {
        $this->_PDG_construct($init);
    }
}
