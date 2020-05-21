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
  private $events = [];

  public function __construct(Position $initialPosition)
  {
    $this->position = $initialPosition;
  }

  public function moveLeft(int $steps): void 
  {
    if ($steps === 0) {
      // don't thrown an exception, but also don't record an event
      return;
    }
   $nextPosition = $this->position->toTheLeft($steps);
   $this->position = $nextPosition;
   /*
    * After moving to the left, we record an event that can
    * later be used to find out what has happened inside the
    * `Player` object.
    */
    $this->events[] = new PlayerMoved($nextPosition);
  }
  public function recordedEvents(): array
  {
    return $this->events;
  }

  public function currentPosition(): Position
  {
    return $this->position;
  }
}
// Create a new `Player` object and set an initial position for it:
  $player = new Player(new Position(10, 20));
  // Move it 4 steps to the left:
  $player->moveLeft(4);
  /*
  * We verify that the player has moved, by comparing its recorded events
  * to an expected list of events:
  */
  assertEquals(
  [
  new PlayerMoved(new Position(6, 20))
  ],
  $player->recordedEvents()
  );