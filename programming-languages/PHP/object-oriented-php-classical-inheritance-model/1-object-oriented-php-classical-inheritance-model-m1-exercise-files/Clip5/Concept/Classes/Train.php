<?php
/**
 * Train Class
 */
class Train extends VehicleBase
{
    public $carCount;
    protected $operator;

    /**
     * @param $color
     * @param $type
     * @param null $carCount
     */
    public function __construct($color, $type, $carCount = null){
        parent::__construct($color, $type);
        $this->carCount = $carCount;
    }

    /**
     * @param $operator
     */
    public function setOperator($operator){
        $this->operator = $operator;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperator(){
        return $this->operator;
    }
}