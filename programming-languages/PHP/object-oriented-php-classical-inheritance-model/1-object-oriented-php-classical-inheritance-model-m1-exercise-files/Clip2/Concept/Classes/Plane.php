<?php
/**
 * Plane Class
 */
class Plane
{
    public $color;
    public $type;
    public function __construct($color, $type){
        $this->color = $color;
        $this->type = $type;
    }
}

$airliner = new Plane('silver', 'airliner');
echo 'The ' . strtolower(get_class($airliner)) . ' is ' . $airliner->color . ', and the type is ' . $airliner->type;