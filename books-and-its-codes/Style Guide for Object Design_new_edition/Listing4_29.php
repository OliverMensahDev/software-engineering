<?php 
final class Player
{
public function moveLeft(): Position
{
$this->position = $this->position->toTheLeft($steps);
return $this->position;
}
}

$player = new Player(new Position(10, 20));
$currentPosition = $player->moveLeft(4);
assertEquals(new Position(6, 20), $currentPosition);