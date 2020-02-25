<?php
/**
 * Car Class
 */
class Car
{
    public $color;
    public $type;
    public function __construct($color, $type){
        $this->color = $color;
        $this->type = $type;
    }
}

$car = new Car('red', 'sedan');
echo 'The ' . strtolower(get_class($car)) . ' is ' . $car->color . ', and the type is ' . $car->type;