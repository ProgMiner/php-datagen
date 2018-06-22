<?php
namespace PHPDataGen\Model;
abstract class Data_FileModel {
use \PHPDataGen\DataClassTrait;
private $namespace = null;
private $uses = [];
private $classes = [];
public function __construct(array $init = []) {
foreach ($init as $field => $value) {
    $validate = "validate_$field";
    $this->$field = $this->$validate($value);
}
}
public function get_namespace() { return $this->namespace; }
protected function validate_namespace($value) {
if (!is_null($value) && !is_string($value)) { throw new \InvalidArgumentException('Field namespace has type string'); }
return $value;
}
public function get_uses() { return $this->uses; }
protected function validate_uses($value) {
if (!is_array($value)) { throw new \InvalidArgumentException('Field uses has type array'); }
return $value;
}
public function &get_classes() { return $this->classes; }
protected function validate_classes($value) {
if (!is_array($value)) { throw new \InvalidArgumentException('Field classes has type array'); }
return $value;
}
public function set_classes($value) { $this->classes = $this->validate_classes($value);}
}
