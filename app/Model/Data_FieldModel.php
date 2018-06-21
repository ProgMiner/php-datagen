<?php
namespace PHPDataGen\Model;
class Data_FieldModel {
use \PHPDataGen\DataClassTrait;
private $name = '';
private $editable = false;
private $direct = false;
private $type = null;
private $validators = [];
private $directDefining = false;
private $filterDefault = true;
private $default = null;
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
public function get_editable() { return $this->editable; }
protected function validate_editable($value) {
if (!is_bool($value)) { throw new \InvalidArgumentException('Field editable has type bool'); }
return $value;
}
public function get_direct() { return $this->direct; }
protected function validate_direct($value) {
if (!is_bool($value)) { throw new \InvalidArgumentException('Field direct has type bool'); }
return $value;
}
public function get_type() { return $this->type; }
protected function validate_type($value) {
if (!is_a($value, \PHPDataGen\Type::class)) { throw new \InvalidArgumentException('Field type has type \PHPDataGen\Type'); }
return $value;
}
public function get_validators() { return $this->validators; }
protected function validate_validators($value) {
if (!is_array($value)) { throw new \InvalidArgumentException('Field validators has type array'); }
return $value;
}
public function get_directDefining() { return $this->directDefining; }
protected function validate_directDefining($value) {
if (!is_bool($value)) { throw new \InvalidArgumentException('Field directDefining has type bool'); }
return $value;
}
public function get_filterDefault() { return $this->filterDefault; }
protected function validate_filterDefault($value) {
if (!is_bool($value)) { throw new \InvalidArgumentException('Field filterDefault has type bool'); }
return $value;
}
public function get_default() { return $this->default; }
protected function validate_default($value) {
if (!is_null($value) && !is_string($value)) { throw new \InvalidArgumentException('Field default has type string'); }
return $value;
}
}
