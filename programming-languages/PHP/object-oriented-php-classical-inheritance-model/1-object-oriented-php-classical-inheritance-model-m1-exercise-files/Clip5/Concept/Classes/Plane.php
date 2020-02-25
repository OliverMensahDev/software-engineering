<?php
/**
 * Plane Class
 */
class Plane extends VehicleBase
{
    protected $engineCount = 1;
    protected $operator;
    protected $country = 'Australia';

    /**
     * @param $color
     * @param $type
     * @param int $engineCount
     */
    public function __construct($type)
    {
        parent::__construct($type);
        $this->engineCount = $engineCount;
    }

    /**
     * @param $operator
     * @return $this
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * @return string
     */
    public function getOperatorData()
    {
        return "$this->operator out of $this->country.";
    }

    /**
     * @return int
     */
    public function getEngineCount()
    {
        return $this->engineCount;
    }

    /**
     * @param int $engineCount
     * @return $this
     */
    public function setEngineCount($engineCount)
    {
        $this->engineCount = $engineCount;
        return $this;
    }
}