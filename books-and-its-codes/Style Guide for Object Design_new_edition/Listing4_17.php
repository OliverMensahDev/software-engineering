<?php
$position = new Position(10, 20);
$position->moveLeft(4);
assertSame(6, $position->x());


;

