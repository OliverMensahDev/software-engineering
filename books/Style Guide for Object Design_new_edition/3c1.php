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

$player = new Player(new Position(10, 5));
$player->moveLeft(2);
var_dump($player->currentPosition());