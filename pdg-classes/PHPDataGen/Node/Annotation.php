<?php

namespace PHPDataGen\Node;

class Annotation extends \PHPDataGen\Node
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = ['name' => 'Name', 'arguments' => 'Arguments', 'attributes' => 'Attributes'];
    private $name = null;
    private $arguments = [];
    private $attributes = [];
    public function __construct(array $init = [])
    {
        foreach ($init as $field => $value) {
            $this->{$field} = $this->{'validate' . self::FIELDS[$field]}($value);
        }
    }
    public function &getName() : \PhpParser\Node\Name
    {
        return $this->name;
    }
    protected function validateName($value) : \PhpParser\Node\Name
    {
        return $value;
    }
    public function setName($value) : \PhpParser\Node\Name
    {
        $oldValue = $this->name;
        $this->name = $this->validateName($value);
        return $oldValue;
    }
    public function &getArguments() : array
    {
        return $this->arguments;
    }
    protected function validateArguments($value) : array
    {
        return $value;
    }
    public function setArguments($value) : array
    {
        $oldValue = $this->arguments;
        $this->arguments = $this->validateArguments($value);
        return $oldValue;
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
