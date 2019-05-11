<?php 
$player = new Player(new Position(10, 20));
$player->moveLeft(4);
assertEquals(new Position(6, 20), $player->currentPosition());

$player = new Player(new Position(10, 20));
$player->moveLeft(4);
assertEquals(new Player(new Position(6, 20)), $player);