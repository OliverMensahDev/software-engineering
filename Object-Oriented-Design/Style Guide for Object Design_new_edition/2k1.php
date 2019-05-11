<?php 
final class Coordinates
{
  public function __construct(float $latitude, float $longitude)
  {
    if($latitude> 90 || $latitude < -90)
    {
      throw new InvalidArgumentException("Latitude should be between 90 and -90");
    }
    $this->latitude = $latitude;

    if($longitude> 180 || $longitude < -180)
    {
      throw new InvalidArgumentException("Longitude should be between 180 and -180");
    }
    $this->longitude = $longitude;
  }
}


$coordinates = new Coordinates(60.0, 100.0);
assetIsInstanceOf(Coordinates::class, $coordinates);