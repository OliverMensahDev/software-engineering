<?php
/**
 * Hidden Input Class
 */
class Hidden extends BaseInput
{
    public function __construct(){
        $this->type = 'hidden';
    }

    /**
     * @return string
     */
    public function getInput(){
        return "<input type=\"$this->type\" name=\"$this->name\" value=\"$this->value\"/>";
    }
}