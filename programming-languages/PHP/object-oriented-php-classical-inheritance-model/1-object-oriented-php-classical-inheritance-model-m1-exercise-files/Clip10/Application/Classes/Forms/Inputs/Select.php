<?php
//A limited text input field
class Select{
    protected $label;
    protected $name;
    protected $type = 'select';
    protected $required = false;
    protected $multiple = false;
    protected $options = [];
    protected $validators;
    protected $valid = false;

    /**
     * @return string
     */
    public function getInput(){
        $select = "<select";
        $select .= $this->name ? " name=\"$this->name\"":null;
        $select .= $this->required ? " required":null;
        $select .= $this->multiple ? " multiple":null;
        $select .= ">";
        foreach($this->options as $option){
            $select .= $option->getOption();
        }
        $select .= "</select>";
        return $select;
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
     * @return boolean
     */
    public function isMultiple()
    {
        return $this->multiple;
    }

    /**
     * @param boolean $multiple
     * @return $this
     */
    public function setMultiple($multiple)
    {
        $this->multiple = $multiple;
        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions($options)
    {
        foreach ($options as $value) {
            $option = new Option;
            $value = ucwords($value);
            $option->setOptionString($value);
            $option->setValue($value);
            $option->setOption();
            $this->options[] = $option;
        }
        return $this;
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
     * @param $values
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

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}