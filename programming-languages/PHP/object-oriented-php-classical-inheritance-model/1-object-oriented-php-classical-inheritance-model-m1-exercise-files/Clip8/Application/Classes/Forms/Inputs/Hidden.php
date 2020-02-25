<?php
/**
 * Class Hidden
 */
class Hidden{
    public $type = 'hidden';
    public $value;
    public $name;
    public $validator;

    /**
     * @return string
     */
    public function getInput(){
        return "<input type=\"$this->type\" value=\"$this->value\"/>";
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
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param mixed $param
     * @return $this
     */
    public function setValidator($param)
    {
        if(!$param) return false;
        require_once CLASSES . 'Validators/' . $param . '.php';
        $this->validator = new $param;
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
}