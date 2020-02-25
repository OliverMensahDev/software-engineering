<?php
/**
 * Car Class
 */

class Car extends VehicleBase
{
    public $hasTrunk;

    /**
     * @param $color
     * @param $type
     * @param null $hasTrunk
     */
    public function __construct($color, $type, $hasTrunk = null){
        parent::__construct($color, $type);
        $this->hasTrunk = $hasTrunk;
    }
}