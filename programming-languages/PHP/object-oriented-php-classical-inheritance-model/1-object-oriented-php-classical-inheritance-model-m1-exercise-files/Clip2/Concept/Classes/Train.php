<?php
/**
 * Train Class
 */
class Train
{
    public $color;
    public $type;
    public function __construct($color, $type){
        $this->color = $color;
        $this->type = $type;
    }
}

$train = new Train('blue', 'passenger');
echo 'The ' . strtolower(get_class($train)) . ' is ' . $train->color . ', and the type is ' . $train->type;