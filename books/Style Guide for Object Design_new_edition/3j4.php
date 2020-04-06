<?php
final class Position
{
  private $x;
  private $y;

  public static function startAt(int $x, int $y){
    $object = new self();
    $object->x = $x;
    $object->y = $y;
    return $object;
  }

  public function toTheLeft(int $steps): Position
  {
    $copy = clone $this;
    $copy->x = $copy->x  - $steps;
    return $copy;
  }

  public function toTheRight(int $steps): Position
  {
    $copy = clone $this;
    $copy->y = $copy->y  - $steps;
    return $copy;
  }
}

$position = Position::startAt(10, 5)
->toTheLeft(4)
->toTheRight(2);

var_dump($position);

