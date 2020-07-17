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

final class Player 
{
  private $position;
  public function __construct(Position $initialPosition)
  {
    $this->position = $initialPosition;
  }

  public function moveLeft(int $steps): void 
  {
    $this->position = $this->position->toTheLeft($steps);
  }

  public function currentPosition(): Position
  {
    return $this->position;
  }
}

$initialPosition = new Position(10, 20);
$player = new Player($initialPosition);
/*
* We can get away with using `assertSame()` here - the
* `Position` object is still the _same_ object we injected:
*/
assertSame($initialPosition, $player->currentPosition());
$player->moveLeft(4);

/*
* Here we have to use `assertEquals()`:
*/
assertEquals(new Position(6, 20), $player->currentPosition());