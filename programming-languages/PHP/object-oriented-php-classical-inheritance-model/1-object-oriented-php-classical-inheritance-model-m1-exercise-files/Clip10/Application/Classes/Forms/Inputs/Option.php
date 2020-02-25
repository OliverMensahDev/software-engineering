<?php
/**
 * Class Option
 */
class Option
{
    protected $disabled = false;
    protected $selected = false;
    protected $value;
    protected $option;
    protected $optionString;

    /**
     * @return $this
     */
    public function setOption()
    {
        $this->option = "<option ";
        $this->option .= " value=\"$this->value\"";
        $this->option .= $this->disabled ? " disabled" : null;
        $this->option .= $this->selected ? " selected" : null;
        $this->option .= ">";
        $this->option .= $this->optionString;
        $this->option .= "</option>";
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * @param $param
     * @return $this
     */
    public function setOptionString($param)
    {
        $this->optionString = $param;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOptionString()
    {
        return $this->optionString;
    }

    /**
     * @param boolean $disabled
     * @return $this
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisabled()
    {
        return $this->disabled;
    }

    /**
     * @return boolean
     */
    public function isSelected()
    {
        return $this->selected;
    }

    /**
     * @param boolean $selected
     * @return $this
     */
    public function setSelected($selected)
    {
        $this->selected = $selected;
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
}