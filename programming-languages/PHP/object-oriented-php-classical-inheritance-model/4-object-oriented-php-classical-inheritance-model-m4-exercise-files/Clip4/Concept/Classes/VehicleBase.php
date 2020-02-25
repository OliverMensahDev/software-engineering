<?php
/**
 * Abstract Vehicle Base Class
 */
abstract class VehicleBase
{
    protected $color;
    protected $type;
    protected $colorNumber;
    protected $make;
    protected $model;
    protected $operator;

    /**
     * @param $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param mixed $colorNumber
     * @return VehicleBase
     */
    public function setColorNumber($colorNumber)
    {
        $this->colorNumber = $colorNumber;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getColorNumber()
    {
        return $this->colorNumber;
    }

    /**
     * @param mixed $make
     * @return VehicleBase
     */
    public function setMake($make)
    {
        $this->make = $make;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * @param mixed $model
     * @return VehicleBase
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return bool|string
     */
    public function getColorInfo()
    {
        if ($this->color && $this->colorNumber) {
            return "$this->color: $this->colorNumber";
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

}