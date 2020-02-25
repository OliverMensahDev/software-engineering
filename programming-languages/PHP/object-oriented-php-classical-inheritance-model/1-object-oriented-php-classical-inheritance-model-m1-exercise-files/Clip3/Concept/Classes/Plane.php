<?php
/**
 * Plane Class
 */

class Plane extends VehicleBase
{
    public $engineCount;

    /**
     * @param $color
     * @param $type
     * @param int $engineCount
     */
    public function __construct($color, $type, $engineCount = 1){
        parent::__construct($color, $type);
        $this->engineCount = $engineCount;
    }
}
