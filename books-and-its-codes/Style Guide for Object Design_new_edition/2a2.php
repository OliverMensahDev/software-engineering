<?php 
final class Position{
  private $x;
  private $y;

  public function __construct(int $x, int $y){
    $this->x = $x;
    $this->y = $y;
  }

  public function distanceTo(Position $other): float{
    return sqrt(($other->x - $this->x) ** 2 + ($other->y - $this->y) ** 2);
  }
}

/*
* `x` and `y` have to be provided, or you won't be able to get an
* instance of `Position`
*/

$position = new Position(45, 6);
$another =  new Position(43, 6);

echo $position->distanceTo($another);