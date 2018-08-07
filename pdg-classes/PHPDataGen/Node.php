<?php

namespace PHPDataGen;

class Node
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = ['attributes' => 'Attributes'];
    private $attributes = [];
    public function __construct(array $init = [])
    {
        foreach ($init as $field => $value) {
            $this->{$field} = $this->{'validate' . self::FIELDS[$field]}($value);
        }
    }
    public function &getAttributes() : array
    {
        return $this->attributes;
    }
    protected function validateAttributes($value) : array
    {
        return $value;
    }
    public function setAttributes($value) : array
    {
        $oldValue = $this->attributes;
        $this->attributes = $this->validateAttributes($value);
        return $oldValue;
    }
}
