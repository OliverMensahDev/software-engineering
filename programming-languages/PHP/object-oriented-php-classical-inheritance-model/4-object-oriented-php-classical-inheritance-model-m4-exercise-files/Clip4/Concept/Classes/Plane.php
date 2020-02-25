<?php
/**
 * Plane Class
 */
class Plane extends VehicleBase implements AircraftInterface
{
    use Jets;
    protected $engineCount;
    protected $country;

    /**
     * @param mixed $operator
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
    }

    /**
     * @return mixed
     */
    public function getOperator()
    {
        return $this->operator;
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

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }
}