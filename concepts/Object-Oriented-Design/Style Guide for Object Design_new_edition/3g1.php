<?php 
final class TotalDistaceTraveled 
{
  private $totalDistance = 0;

  public function add(int $distance):  TotalDistaceTraveled {
    Assertion::greaterOrEqual($distance, 0, "You cannot add a negative distance");
    $copy = clone $this;
    $copy->totalDistance += $distance;
    return $copy;
  }
}

$totalDistanceTravelled = new TotalDistanceTraveled();
expectException(
  InvalidArgumentException::class,
  'distance',
  function () use ($totalDistanceTravelled) {
    $totalDistanceTravelled->add(-10);
  }
);