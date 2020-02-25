<?php
/**
 * Train Class
 */
declare(strict_types=1);
class TrainEngine extends VehicleBase implements TransportInterface
{
    use Transport;
    public $carCount;

    /**
     * @param $color
     * @param $type
     * @param null $carCount
     */
    public function __construct(string $type){
        parent::__construct($type);
    }

    /**
     * @param mixed $carCount
     * @return Train
     */
    public function setCarCount(int $carCount): Train
    {
        $this->carCount = $carCount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCarCount(): int
    {
        return $this->carCount;
    }
}