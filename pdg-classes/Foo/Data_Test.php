<?php

namespace Foo;

abstract class Data_Test
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = ['A' => 'A', 'A1' => 'A1', 'A2' => 'A2', 'A3' => 'A3', 'A4' => 'A4', 'A5' => 'A5', 'B' => 'B', 'B1' => 'B1', 'B2' => 'B2', 'B3' => 'B3', 'B4' => 'B4', 'B5' => 'B5', 'C' => 'C', 'C1' => 'C1', 'C2' => 'C2', 'C3' => 'C3', 'C4' => 'C4', 'C5' => 'C5', 'D' => 'D', 'D1' => 'D1', 'D2' => 'D2', 'D3' => 'D3', 'D4' => 'D4', 'D5' => 'D5'];
    private $A = null;
    private $A1 = '';
    private $A2 = null;
    private $A3 = null;
    private $A4 = '';
    private $A5 = '';
    private $B = null;
    private $B1 = '';
    private $B2 = null;
    private $B3 = null;
    private $B4 = '';
    private $B5 = '';
    protected $C = null;
    protected $C1 = '';
    protected $C2 = null;
    protected $C3 = null;
    protected $C4 = '';
    protected $C5 = '';
    protected $D = null;
    protected $D1 = '';
    protected $D2 = null;
    protected $D3 = null;
    protected $D4 = '';
    protected $D5 = '';
    public function __construct(array $init = [])
    {
        $this->A2 = $this->validateA2("Foo");
        $this->A3 = "Fee";
        $this->A4 = $this->validateA4("Bar");
        $this->A5 = "Baz";
        $this->B2 = $this->validateB2("Foo");
        $this->B3 = "Fee";
        $this->B4 = $this->validateB4("Bar");
        $this->B5 = "Baz";
        $this->C2 = $this->validateC2("Foo");
        $this->C3 = "Fee";
        $this->C4 = $this->validateC4("Bar");
        $this->C5 = "Baz";
        $this->D2 = $this->validateD2("Foo");
        $this->D3 = "Fee";
        $this->D4 = $this->validateD4("Bar");
        $this->D5 = "Baz";
        foreach ($init as $field => $value) {
            $this->{$field} = $this->{'validate' . self::FIELDS[$field]}($value);
        }
    }
    public function getA()
    {
        return $this->A;
    }
    protected function validateA($value)
    {
        return $value;
    }
    public function getA1() : string
    {
        return $this->A1;
    }
    protected function validateA1(string $value) : string
    {
        return $value;
    }
    public function getA2()
    {
        return $this->A2;
    }
    protected function validateA2($value)
    {
        return $value;
    }
    public function getA3()
    {
        return $this->A3;
    }
    protected function validateA3($value)
    {
        return $value;
    }
    public function getA4() : string
    {
        return $this->A4;
    }
    protected function validateA4(string $value) : string
    {
        return $value;
    }
    public function getA5() : string
    {
        return $this->A5;
    }
    protected function validateA5(string $value) : string
    {
        return $value;
    }
    public function &getB()
    {
        return $this->B;
    }
    protected function validateB($value)
    {
        return $value;
    }
    public function setB($value)
    {
        $oldValue = $this->B;
        $this->B = $this->validateB($value);
        return $oldValue;
    }
    public function &getB1() : string
    {
        return $this->B1;
    }
    protected function validateB1(string $value) : string
    {
        return $value;
    }
    public function setB1(string $value) : string
    {
        $oldValue = $this->B1;
        $this->B1 = $this->validateB1($value);
        return $oldValue;
    }
    public function &getB2()
    {
        return $this->B2;
    }
    protected function validateB2($value)
    {
        return $value;
    }
    public function setB2($value)
    {
        $oldValue = $this->B2;
        $this->B2 = $this->validateB2($value);
        return $oldValue;
    }
    public function &getB3()
    {
        return $this->B3;
    }
    protected function validateB3($value)
    {
        return $value;
    }
    public function setB3($value)
    {
        $oldValue = $this->B3;
        $this->B3 = $this->validateB3($value);
        return $oldValue;
    }
    public function &getB4() : string
    {
        return $this->B4;
    }
    protected function validateB4(string $value) : string
    {
        return $value;
    }
    public function setB4(string $value) : string
    {
        $oldValue = $this->B4;
        $this->B4 = $this->validateB4($value);
        return $oldValue;
    }
    public function &getB5() : string
    {
        return $this->B5;
    }
    protected function validateB5(string $value) : string
    {
        return $value;
    }
    public function setB5(string $value) : string
    {
        $oldValue = $this->B5;
        $this->B5 = $this->validateB5($value);
        return $oldValue;
    }
    public function getC()
    {
        return $this->C;
    }
    protected function validateC($value)
    {
        return $value;
    }
    public function getC1() : string
    {
        return $this->C1;
    }
    protected function validateC1(string $value) : string
    {
        return $value;
    }
    public function getC2()
    {
        return $this->C2;
    }
    protected function validateC2($value)
    {
        return $value;
    }
    public function getC3()
    {
        return $this->C3;
    }
    protected function validateC3($value)
    {
        return $value;
    }
    public function getC4() : string
    {
        return $this->C4;
    }
    protected function validateC4(string $value) : string
    {
        return $value;
    }
    public function getC5() : string
    {
        return $this->C5;
    }
    protected function validateC5(string $value) : string
    {
        return $value;
    }
    public function &getD()
    {
        return $this->D;
    }
    protected function validateD($value)
    {
        return $value;
    }
    public function setD($value)
    {
        $oldValue = $this->D;
        $this->D = $this->validateD($value);
        return $oldValue;
    }
    public function &getD1() : string
    {
        return $this->D1;
    }
    protected function validateD1(string $value) : string
    {
        return $value;
    }
    public function setD1(string $value) : string
    {
        $oldValue = $this->D1;
        $this->D1 = $this->validateD1($value);
        return $oldValue;
    }
    public function &getD2()
    {
        return $this->D2;
    }
    protected function validateD2($value)
    {
        return $value;
    }
    public function setD2($value)
    {
        $oldValue = $this->D2;
        $this->D2 = $this->validateD2($value);
        return $oldValue;
    }
    public function &getD3()
    {
        return $this->D3;
    }
    protected function validateD3($value)
    {
        return $value;
    }
    public function setD3($value)
    {
        $oldValue = $this->D3;
        $this->D3 = $this->validateD3($value);
        return $oldValue;
    }
    public function &getD4() : string
    {
        return $this->D4;
    }
    protected function validateD4(string $value) : string
    {
        return $value;
    }
    public function setD4(string $value) : string
    {
        $oldValue = $this->D4;
        $this->D4 = $this->validateD4($value);
        return $oldValue;
    }
    public function &getD5() : string
    {
        return $this->D5;
    }
    protected function validateD5(string $value) : string
    {
        return $value;
    }
    public function setD5(string $value) : string
    {
        $oldValue = $this->D5;
        $this->D5 = $this->validateD5($value);
        return $oldValue;
    }
}
