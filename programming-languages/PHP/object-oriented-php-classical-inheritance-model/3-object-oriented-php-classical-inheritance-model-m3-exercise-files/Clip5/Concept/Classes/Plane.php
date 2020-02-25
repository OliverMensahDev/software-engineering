<?php
/**
 * Plane Class
 */
class Plane extends VehicleBase
{
    use Airliner, BusinessJet {
        BusinessJet::setOperator insteadof Airliner;
        Airliner::setOperator as setOp;
    }
    protected $engineCount;
    protected $country;

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