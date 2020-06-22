<?php
final class Position
{
  private $x;
  private $y;

  public function __construct(int $x, int $y){
    $this->x = $x;
    $this->y = $y;
  }

  public function toTheLeft(int $steps): Position
  {
    $copy = clone $this;
    $copy->x = $copy->x  - $steps;
    return $copy;
  }

}

$position = new Position(10, 20);
$nextPosition = $position->withX(6);
var_dump($position, $nextPosition, $position);
