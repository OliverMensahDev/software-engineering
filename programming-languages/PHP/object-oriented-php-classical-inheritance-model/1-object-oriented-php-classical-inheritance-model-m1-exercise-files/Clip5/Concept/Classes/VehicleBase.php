<?php
/**
 * Vehicle Base Class
 */
class VehicleBase
{
    protected $color;
    public $type;
    protected $colorNumber;

    /**
     * @param $color
     * @param $type
     */
    public function __construct($type){
        $this->type = $type;
    }

    /**
     * @param mixed $color
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param $number
     * @return $this
     */
    public function setColorNumber($number){
        $this->colorNumber = $number;
        return $this;
    }

    /**
     * @return bool|string
     */
    public function getColorInfo(){
        if($this->color && $this->colorNumber){
            return "$this->color: $this->colorNumber";
        }
        return false;
    }
}