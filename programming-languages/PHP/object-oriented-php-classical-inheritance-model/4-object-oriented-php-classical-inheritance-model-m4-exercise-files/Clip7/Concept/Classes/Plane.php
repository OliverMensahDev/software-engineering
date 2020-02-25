<?php
/**
 * Plane Class
 */
declare(strict_types=1);
class Plane extends VehicleBase implements TransportInterface
{
    use Jets, Transport;
    protected $engineCount;
    protected $country;

    /**
     * @return string
     */
    public function getOperatorData(): string
    {
        return "$this->operator out of $this->country.";
    }

    /**
     * @return int
     */
    public function getEngineCount(): int
    {
        return $this->engineCount;
    }

    /**
     * @param int $engineCount
     * @return object|Plane
     */
    public function setEngineCount(int $engineCount): Plane
    {
        $this->engineCount = $engineCount;
        return $this;
    }
}