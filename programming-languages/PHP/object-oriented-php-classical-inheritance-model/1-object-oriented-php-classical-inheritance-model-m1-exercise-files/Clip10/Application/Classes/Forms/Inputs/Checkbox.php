<?php
/**
 * Class InputCheckbox
 */
class Checkbox{
    protected $label;
    protected $type = 'checkbox';
    protected $name;
    protected $value = true;
    protected $valueString;
    protected $required = false;
    protected $validators;
    protected $valid = false;

    /**
     * @return string
     */
    public function getInput(){
        return "<input type=\"checkbox\" name=\"$this->name\" value=\"$this->value\"> $this->valueString";
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValueString()
    {
        return $this->valueString;
    }

    /**
     * @param mixed $valueString
     * @return $this
     */
    public function setValueString($valueString)
    {
        $this->valueString = $valueString;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @param boolean $required
     * @return $this
     */
    public function setRequired($required)
    {
        $this->required = $required;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLabelTag()
    {
        return "<label for=\"". strtolower($this->label) . "\">" . ucwords($this->label) . "</label>";
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @param mixed $param
     * @return $this
     */
    public function setValidators($param)
    {
        if(is_array($param)){
            foreach($param as $key => $value){
                if(is_string($key)){
                    require_once CLASSES . 'Validators/' . ucfirst($key) . '.php';
                    $validator = new $key;
                    if(is_array($value)){
                        $validator->setValues($value);
                    }
                    $this->validators[] = $validator;
                } elseif (is_numeric($key)){
                    require_once CLASSES . 'Validators/' . ucfirst($value) . '.php';
                    $this->validators[] = new $value;
                }
            }
        } else {
            require_once CLASSES . 'Validators/' . ucfirst($param) . '.php';
            $this->validators[] = new $param;
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValidators()
    {
        return $this->validators;
    }

    /**
     * @return boolean
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @return $this
     */
    public function setValid()
    {
        $this->valid = true;
        return $this;
    }
}