<?php

namespace Foo;

abstract class Data_TestExtending extends \Foo\Data_Test
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = [];
    public function __construct(array $init = [])
    {
        $this->_PDG_construct($init);
    }
}
