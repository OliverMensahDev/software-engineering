<?php

class Utilis{
  static public $numCars = 0;
  
  static function addToNumCars($int)
  {
    self::$numCars += $int;
  }
}

echo Utilis::$numCars;
Utilis::addToNumCars(3);
echo Utilis::$numCars;
Utilis::addToNumCars(-1);
echo Utilis::$numCars;