<?php
/**
 * Class Hidden
 */
class Hidden{
    protected $type = 'hidden';
    protected $value;
    protected $name;
    protected $validators;
    protected $valid = false;

    /**
     * @return string
     */
    public function getInput(){
        return "<input type=\"$this->type\" name=\"$this->name\" value=\"$this->value\"/>";
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $param
     * @return $this
     */
    public function setValue($param){
        $this->value = $param;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     */
    public function setType($type)
    {
        $this->type = $type;
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