<?php

namespace Foo;

abstract class Data_TestEmpty
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = [];
    public function __construct(array $init = [])
    {
        $this->_PDG_construct($init);
    }
}
