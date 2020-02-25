<?php
/**
 * Train Class
 */

class Train extends VehicleBase
{
    public $carCount;

    /**
     * @param $color
     * @param $type
     * @param null $carCount
     */
    public function __construct($color, $type, $carCount = null){
        parent::__construct($color, $type);
        $this->carCount = $carCount;
    }
}