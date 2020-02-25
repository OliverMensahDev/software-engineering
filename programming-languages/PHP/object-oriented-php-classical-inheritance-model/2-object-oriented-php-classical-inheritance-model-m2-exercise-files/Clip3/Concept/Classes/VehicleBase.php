<?php
/**
 * Vehicle Base Class
 */
class VehicleBase
{
    protected $color;
    protected $type;
    protected $colorNumber;

    /**
     * @param $color
     * @param $type
     */
    public function __construct($type){
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
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
     * @return mixed
     */
    public function getColorNumber()
    {
        return $this->colorNumber;
    }

    /**
     * @param $number
     * @return $this
     */
    private function setColorNumber($number){
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

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
}