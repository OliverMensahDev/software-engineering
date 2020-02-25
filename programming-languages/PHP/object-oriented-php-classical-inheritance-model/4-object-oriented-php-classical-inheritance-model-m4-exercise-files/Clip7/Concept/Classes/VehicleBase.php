<?php
/**
 * Abstract Vehicle Base Class
 */
declare(strict_types = 1);
abstract class VehicleBase
{
    protected $color;
    protected $type;
    protected $colorNumber;
    protected $make;
    protected $model;

    /**
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return object|VehicleBase
     */
    public function setColor(string $color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param mixed $colorNumber
     * @return object|VehicleBase
     */
    public function setColorNumber(string $colorNumber)
    {
        $this->colorNumber = $colorNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getColorNumber()
    {
        return $this->colorNumber;
    }

    /**
     * @param mixed $make
     * @return object|VehicleBase
     */
    public function setMake(string $make)
    {
        $this->make = $make;
        return $this;
    }

    /**
     * @return string
     */
    public function getMake(): string
    {
        return $this->make;
    }

    /**
     * @param object $model
     * @return object|VehicleBase
     */
    public function setModel(string $model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return object|Model
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return mixed|string
     */
    public function getColorInfo()
    {
        if ($this->color && $this->colorNumber){
            return "$this->color: $this->colorNumber";
        }
        return false;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return object|VehicleBase
     */
    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }
}