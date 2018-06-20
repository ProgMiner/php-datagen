<?php
class Data_Test {
use \PHPDataGen\DataClassTrait;
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
public function __construct(array $init = []) {
$this->A2 = $this->validate_A2("Foo");
$this->A3 = "Fee";
$this->A4 = $this->validate_A4("Bar");
$this->A5 = "Baz";
$this->B2 = $this->validate_B2("Foo");
$this->B3 = "Fee";
$this->B4 = $this->validate_B4("Bar");
$this->B5 = "Baz";
$this->C2 = $this->validate_C2("Foo");
$this->C3 = "Fee";
$this->C4 = $this->validate_C4("Bar");
$this->C5 = "Baz";
$this->D2 = $this->validate_D2("Foo");
$this->D3 = "Fee";
$this->D4 = $this->validate_D4("Bar");
$this->D5 = "Baz";
foreach ($init as $field => $value) {
    $validate = "validate_$field";
    $this->$field = $this->$validate($value);
}
}
public function get_A() { return $this->A; }
protected function validate_A($value) { return $value; }
public function get_A1() { return $this->A1; }
protected function validate_A1($value) {
if (!is_string($value)) { throw new \InvalidArgumentException('Field A1 has type string'); }
return $value;
}
public function get_A2() { return $this->A2; }
protected function validate_A2($value) { return $value; }
public function get_A3() { return $this->A3; }
protected function validate_A3($value) { return $value; }
public function get_A4() { return $this->A4; }
protected function validate_A4($value) {
if (!is_string($value)) { throw new \InvalidArgumentException('Field A4 has type string'); }
return $value;
}
public function get_A5() { return $this->A5; }
protected function validate_A5($value) {
if (!is_string($value)) { throw new \InvalidArgumentException('Field A5 has type string'); }
return $value;
}
public function &get_B() { return $this->B; }
protected function validate_B($value) { return $value; }
public function set_B($value) { $this->B = $this->validate_B($value);}
public function &get_B1() { return $this->B1; }
protected function validate_B1($value) {
if (!is_string($value)) { throw new \InvalidArgumentException('Field B1 has type string'); }
return $value;
}
public function set_B1($value) { $this->B1 = $this->validate_B1($value);}
public function &get_B2() { return $this->B2; }
protected function validate_B2($value) { return $value; }
public function set_B2($value) { $this->B2 = $this->validate_B2($value);}
public function &get_B3() { return $this->B3; }
protected function validate_B3($value) { return $value; }
public function set_B3($value) { $this->B3 = $this->validate_B3($value);}
public function &get_B4() { return $this->B4; }
protected function validate_B4($value) {
if (!is_string($value)) { throw new \InvalidArgumentException('Field B4 has type string'); }
return $value;
}
public function set_B4($value) { $this->B4 = $this->validate_B4($value);}
public function &get_B5() { return $this->B5; }
protected function validate_B5($value) {
if (!is_string($value)) { throw new \InvalidArgumentException('Field B5 has type string'); }
return $value;
}
public function set_B5($value) { $this->B5 = $this->validate_B5($value);}
public function get_C() { return $this->C; }
protected function validate_C($value) { return $value; }
public function get_C1() { return $this->C1; }
protected function validate_C1($value) {
if (!is_string($value)) { throw new \InvalidArgumentException('Field C1 has type string'); }
return $value;
}
public function get_C2() { return $this->C2; }
protected function validate_C2($value) { return $value; }
public function get_C3() { return $this->C3; }
protected function validate_C3($value) { return $value; }
public function get_C4() { return $this->C4; }
protected function validate_C4($value) {
if (!is_string($value)) { throw new \InvalidArgumentException('Field C4 has type string'); }
return $value;
}
public function get_C5() { return $this->C5; }
protected function validate_C5($value) {
if (!is_string($value)) { throw new \InvalidArgumentException('Field C5 has type string'); }
return $value;
}
public function &get_D() { return $this->D; }
protected function validate_D($value) { return $value; }
public function set_D($value) { $this->D = $this->validate_D($value);}
public function &get_D1() { return $this->D1; }
protected function validate_D1($value) {
if (!is_string($value)) { throw new \InvalidArgumentException('Field D1 has type string'); }
return $value;
}
public function set_D1($value) { $this->D1 = $this->validate_D1($value);}
public function &get_D2() { return $this->D2; }
protected function validate_D2($value) { return $value; }
public function set_D2($value) { $this->D2 = $this->validate_D2($value);}
public function &get_D3() { return $this->D3; }
protected function validate_D3($value) { return $value; }
public function set_D3($value) { $this->D3 = $this->validate_D3($value);}
public function &get_D4() { return $this->D4; }
protected function validate_D4($value) {
if (!is_string($value)) { throw new \InvalidArgumentException('Field D4 has type string'); }
return $value;
}
public function set_D4($value) { $this->D4 = $this->validate_D4($value);}
public function &get_D5() { return $this->D5; }
protected function validate_D5($value) {
if (!is_string($value)) { throw new \InvalidArgumentException('Field D5 has type string'); }
return $value;
}
public function set_D5($value) { $this->D5 = $this->validate_D5($value);}
}
