<?php 
final class Coordinates
{
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

// Latitude can't be more than 90.0
expectException(
  InvalidArgumentException::class,
  function() {
    new Coordinates(90.1, 0.0);
  }
);

// Latitude can't be less than -90.0
expectException(
  InvalidArgumentException::class,
  function() {
    new Coordinates(-90.1, 0.0);
  }
);

// Longitude can't be more than 180.0
expectException(
  InvalidArgumentException::class,
  function() {
      new Coordinates(-90.1, 180.1);
  }
);

//better for differentiation
expectException(
  InvalidArgumentException::class,
  // This word is supposed to be in the exception message:
  'Longitude',
  function() {
    new Coordinates(-90.1, 180.1);
  }
);