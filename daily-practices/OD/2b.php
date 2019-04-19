<?php 
final class Coordinates
{

    // public function __construct(float $latitude, float $longitude)
    // {
    //     $this->latitude = $latitude;
    //     $this->longitude = $longitude;
    // }
    public function __construct(float $latitude, float $longitude)
    {
        if ($latitude > 90 || $latitude < -90) {
            throw new InvalidArgumentException(
                'Latitude should be between -90 and 90'
            );
        }
        $this->latitude = $latitude;
        if ($longitude > 180 || $longitude < -180) {
            throw new InvalidArgumentException(
                'Longitude should be between -180 and 180'
            );
        }
        $this->longitude = $longitude;
    }
}



final class Line
{
    private $isDotted;
    private $distanceBetweenDots;
    public static function dotted(int $distanceBetweenDots): Line
    {
        if ($distanceBetweenDots <= 0) {
            throw new InvalidArgumentException(
                'Expect the distance between dots to be positive.'
            );
        }
        $line = new Line();
        $line->distanceBetweenDots = $distanceBetweenDots;
        $line->isDotted = true;
        return $line;
    }
    public static function solid(): Line
    {
        // No need to worry about `$distanceBetweenLines` here!
        $line = new self();
        $line->isDotted = false;
        return $line;
    }
}