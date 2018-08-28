<?php

namespace Foo;

abstract class Data_TestEmpty
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = [];
    public function __construct(array $init = [])
    {
        foreach ($init as $field => $value) {
            $this->{$field} = $this->{'validate' . self::FIELDS[$field]}($value);
        }
    }
}
