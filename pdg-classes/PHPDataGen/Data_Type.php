<?php

namespace PHPDataGen;

use PhpParser\BuilderFactory;
use PhpParser\Node;
abstract class Data_Type
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = ['name' => 'Name', 'nullable' => 'Nullable', 'mixed' => 'Mixed', 'class' => 'Class'];
    private $name = '';
    private $nullable = false;
    private $mixed = false;
    private $class = false;
    public function __construct(array $init = [])
    {
        foreach ($init as $field => $value) {
            $this->{$field} = $this->{'validate' . self::FIELDS[$field]}($value);
        }
    }
    public function &getName() : string
    {
        return $this->name;
    }
    protected function validateName(string $value) : string
    {
        return $value;
    }
    public function setName(string $value) : string
    {
        $oldValue = $this->name;
        $this->name = $this->validateName($value);
        return $oldValue;
    }
    public function &getNullable() : bool
    {
        return $this->nullable;
    }
    protected function validateNullable(bool $value) : bool
    {
        return $value;
    }
    public function setNullable(bool $value) : bool
    {
        $oldValue = $this->nullable;
        $this->nullable = $this->validateNullable($value);
        return $oldValue;
    }
    public function &getMixed() : bool
    {
        return $this->mixed;
    }
    protected function validateMixed(bool $value) : bool
    {
        return $value;
    }
    public function setMixed(bool $value) : bool
    {
        $oldValue = $this->mixed;
        $this->mixed = $this->validateMixed($value);
        return $oldValue;
    }
    public function &getClass() : bool
    {
        return $this->class;
    }
    protected function validateClass(bool $value) : bool
    {
        return $value;
    }
    public function setClass(bool $value) : bool
    {
        $oldValue = $this->class;
        $this->class = $this->validateClass($value);
        return $oldValue;
    }
}