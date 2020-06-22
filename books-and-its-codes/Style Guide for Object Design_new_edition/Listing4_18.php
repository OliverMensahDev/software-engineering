<?php
$position = new Position(10, 20);
$nextPosition = $position->toTheLeft(4);
assertEquals(new Position(6, 20), $nextPosition)