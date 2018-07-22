<?php

abstract class Data_ExplTest
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = ['foo' => 'Foo'];
    private $foo = \null;
    public function __construct(array $init = [])
    {
        foreach ($init as $field => $value) {
            $this->{$field} = $this->{'validate' . self::FIELDS[$field]}($value);
        }
    }
    public function &getFoo() : \Foo
    {
        return $this->foo;
    }
    protected function validateFoo($value) : \Foo
    {
        static $castable = \is_a(\Foo::class, \PHPDataGen\Castable::class, \true);
        if (!$value instanceof \Foo && $castable) {
            $value = \Foo::castFrom($value, $this->foo);
        }
        return $value;
    }
    public function setFoo($value) : \Foo
    {
        $oldValue = $this->foo;
        $this->foo = $this->validateFoo($value);
        return $oldValue;
    }
}
