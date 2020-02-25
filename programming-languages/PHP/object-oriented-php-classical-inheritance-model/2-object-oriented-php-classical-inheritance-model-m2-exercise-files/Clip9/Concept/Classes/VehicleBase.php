<?php
/**
 * Vehicle Base Class
 */
class VehicleBase
{
    protected $color;
    protected $type;
    protected $colorNumber;

    /**
     * @param $color
     * @param $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     *
     */
    public function __clone(){
        $this->setType('SUV');
    }

    /**
     * @return array
     */
    public function __invoke(){
        return get_class_methods(get_class($this));
    }

    /**
     *
     */
    public function __wakeup(){
        //Code to do something prior to object restoration ...
        return true;
    }

    /**
     *
     */
    public function __sleep()
    {
        //code as needed prior to serializing
        return [
            'color',
            'type',
            'colorNumber',
            'hasTrunk',
            'owner',
            'colorHex',
            'model',
        ];
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        if ($this->$name) return true;
    }

    /**
     * @param $name
     */
    public function __unset($name)
    {
        unset($this->$name);
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * @param $value
     * @return mixed
     */
    public function __get($value)
    {
        return $this->$value;
    }

    /**
     * Call magic method
     */
    public function __call($arg, $args)
    {
        switch (true) {
            case ($this instanceof Car):
                require 'CarDiagnostic.php';
                $diagnostic = new CarDiagnostic($arg, $args);
                return $diagnostic->$arg($args);
            case ($this instanceof Train):
                require 'TrainDiagnostic.php';
                $diagnostic = new TrainDiagnostic($arg, $args);
                return $diagnostic->$arg($args);
            case ($this instanceof Plane):
                require 'PlaneDiagnostic.php';
                $diagnostic = new PlaneDiagnostic($arg, $args);
                return $diagnostic->$arg($args);
        }
        return false;
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
     * @return mixed
     */
    public function getColorNumber()
    {
        return $this->colorNumber;
    }

    /**
     * @param $number
     * @return $this
     */
    private function setColorNumber($number)
    {
        $this->colorNumber = $number;
        return $this;
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