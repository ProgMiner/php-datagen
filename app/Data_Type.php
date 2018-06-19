<?php
namespace PHPDataGen;
class Data_Type {
use \PHPDataGen\DataClassTrait;
protected $name = null;
private $nullable = null;
private $mixed = null;
private $class = null;
public function __construct(array $init = []) {
foreach ($init as $field => $value) {
    $validate = "validate_$field";
    $this->$field = $this->$validate($value);
}
}
public function get_name() { return $this->name; }
protected function validate_name($value) {
if (!is_null($expr) && !is_string($value)) { throw new \InvalidArgumentException('Field name has type string'); }
return $value;
}
public function get_nullable() { return $this->nullable; }
protected function validate_nullable($value) {
if (!is_null($expr) && !is_bool($value)) { throw new \InvalidArgumentException('Field nullable has type bool'); }
return $value;
}
public function get_mixed() { return $this->mixed; }
protected function validate_mixed($value) {
if (!is_null($expr) && !is_bool($value)) { throw new \InvalidArgumentException('Field mixed has type bool'); }
return $value;
}
public function get_class() { return $this->class; }
protected function validate_class($value) {
if (!is_null($expr) && !is_bool($value)) { throw new \InvalidArgumentException('Field class has type bool'); }
return $value;
}
}
