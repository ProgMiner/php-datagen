<?php
namespace PHPDataGen\Model;
class ClassModel {
use \PHPDataGen\DataClassTrait;
private $name = '';
private $final = false;
private $finalFinal = false;
private $extends = null;
private $implements = [];
private $fields = [];
public function __construct(array $init = []) {
foreach ($init as $field => $value) {
    $validate = "validate_$field";
    $this->$field = $this->$validate($value);
}
}
public function get_name() { return $this->name; }
protected function validate_name($value) {
if (!is_string($value)) { throw new \InvalidArgumentException('Field name has type string'); }
return $value;
}
public function &get_final() { return $this->final; }
protected function validate_final($value) {
if (!is_bool($value)) { throw new \InvalidArgumentException('Field final has type bool'); }
return $value;
}
public function set_final($value) { $this->final = $this->validate_final($value);}
public function &get_finalFinal() { return $this->finalFinal; }
protected function validate_finalFinal($value) {
if (!is_bool($value)) { throw new \InvalidArgumentException('Field finalFinal has type bool'); }
return $value;
}
public function set_finalFinal($value) { $this->finalFinal = $this->validate_finalFinal($value);}
public function get_extends() { return $this->extends; }
protected function validate_extends($value) {
if (!is_null($value) && !is_string($value)) { throw new \InvalidArgumentException('Field extends has type string'); }
return $value;
}
public function &get_implements() { return $this->implements; }
protected function validate_implements($value) {
if (!is_array($value)) { throw new \InvalidArgumentException('Field implements has type array'); }
return $value;
}
public function set_implements($value) { $this->implements = $this->validate_implements($value);}
public function &get_fields() { return $this->fields; }
protected function validate_fields($value) {
if (!is_array($value)) { throw new \InvalidArgumentException('Field fields has type array'); }
return $value;
}
public function set_fields($value) { $this->fields = $this->validate_fields($value);}
}
