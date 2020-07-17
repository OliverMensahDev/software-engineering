<?php 
final class Coordinates
{
    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
}

$meaningfulCoordinates = new Coordinates(45.0, -60.0);
/*
* There's nothing that stops us from creating a `Coordinates`
* object that doesn't make any sense at all:
*/
$offThePlanet = new Coordinates(1000.0, -20000.0);
