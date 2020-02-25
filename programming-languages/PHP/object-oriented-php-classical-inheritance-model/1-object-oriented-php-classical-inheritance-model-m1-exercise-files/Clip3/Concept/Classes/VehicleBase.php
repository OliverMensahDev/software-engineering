<?php
/**
 * Vehicle Base
 */
class VehicleBase
{
    public $color;
    public $type;

    /**
     * @param $color
     * @param $type
     */
    public function __construct($color, $type){
        $this->color = $color;
        $this->type = $type;
    }
}