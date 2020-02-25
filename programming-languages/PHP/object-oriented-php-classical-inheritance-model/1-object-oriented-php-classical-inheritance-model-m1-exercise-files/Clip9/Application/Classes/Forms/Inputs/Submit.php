<?php
//A Submit input field
class Submit{
    protected $type = 'submit';
    protected $name = 'submit';
    protected $value = 'Submit';

    /**
     * @return string
     */
    public function getInput(){
        return "<input type=\"$this->type\" name =\"$this->name\" value=\"$this->value\"/>";
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
    public function setType($param){
        $this->type = $param;
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}