<?php

namespace Foo;

abstract class Data_TestEmpty
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = [];
    protected static function getFields() : array
    {
        return array_merge(parent::getFields(), self::FIELDS);
    }
    public function __construct(array $init = [])
    {
        foreach ($init as $field => $value) {
            $this->{$field} = $this->{'validate' . self::FIELDS[$field]}($value);
        }
    }
}
