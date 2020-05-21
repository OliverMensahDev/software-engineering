<?php 
final class Coordinates 
{
  // ...constructor here
  public function longitude(): float
  {
    return $this->longitude;
  }

  public function latitude(): float
  {
    return $this->latitude;
  }
}

$coordinates = new Coordinates(60.0, 100.0);
assertEquals(60.0, $coordinates->latitude());
assertEquals(100.0, $coordinates->longitude());