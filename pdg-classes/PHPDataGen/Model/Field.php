<?php

namespace PHPDataGen\Model;

class Field
{
    use \PHPDataGen\DataClassTrait;
    private const FIELDS = ['name' => 'Name', 'editable' => 'Editable', 'direct' => 'Direct', 'type' => 'Type', 'validators' => 'Validators', 'directDefining' => 'DirectDefining', 'filterDefault' => 'FilterDefault', 'default' => 'Default'];
    private $name = '';
    private $editable = false;
    private $direct = false;
    private $type = null;
    private $validators = [];
    private $directDefining = false;
    private $filterDefault = true;
    private $default = null;
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
    public function &getEditable() : bool
    {
        return $this->editable;
    }
    protected function validateEditable(bool $value) : bool
    {
        return $value;
    }
    public function setEditable(bool $value) : bool
    {
        $oldValue = $this->editable;
        $this->editable = $this->validateEditable($value);
        return $oldValue;
    }
    public function &getDirect() : bool
    {
        return $this->direct;
    }
    protected function validateDirect(bool $value) : bool
    {
        return $value;
    }
    public function setDirect(bool $value) : bool
    {
        $oldValue = $this->direct;
        $this->direct = $this->validateDirect($value);
        return $oldValue;
    }
    public function &getType() : \PHPDataGen\Type
    {
        return $this->type;
    }
    protected function validateType(\PHPDataGen\Type $value) : \PHPDataGen\Type
    {
        return $value;
    }
    public function setType(\PHPDataGen\Type $value) : \PHPDataGen\Type
    {
        $oldValue = $this->type;
        $this->type = $this->validateType($value);
        return $oldValue;
    }
    public function &getValidators() : array
    {
        return $this->validators;
    }
    protected function validateValidators(array $value) : array
    {
        return $value;
    }
    public function setValidators(array $value) : array
    {
        $oldValue = $this->validators;
        $this->validators = $this->validateValidators($value);
        return $oldValue;
    }
    public function &getDirectDefining() : bool
    {
        return $this->directDefining;
    }
    protected function validateDirectDefining(bool $value) : bool
    {
        return $value;
    }
    public function setDirectDefining(bool $value) : bool
    {
        $oldValue = $this->directDefining;
        $this->directDefining = $this->validateDirectDefining($value);
        return $oldValue;
    }
    public function &getFilterDefault() : bool
    {
        return $this->filterDefault;
    }
    protected function validateFilterDefault(bool $value) : bool
    {
        return $value;
    }
    public function setFilterDefault(bool $value) : bool
    {
        $oldValue = $this->filterDefault;
        $this->filterDefault = $this->validateFilterDefault($value);
        return $oldValue;
    }
    public function &getDefault() : ?\PhpParser\Node\Expr
    {
        return $this->default;
    }
    protected function validateDefault(?\PhpParser\Node\Expr $value) : ?\PhpParser\Node\Expr
    {
        return $value;
    }
    public function setDefault(?\PhpParser\Node\Expr $value) : ?\PhpParser\Node\Expr
    {
        $oldValue = $this->default;
        $this->default = $this->validateDefault($value);
        return $oldValue;
    }
}
