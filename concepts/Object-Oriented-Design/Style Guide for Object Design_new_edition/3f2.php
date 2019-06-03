<?php

final class Position
{
  // ...
  public function equals(Position $other)
  {
    return $this->x === $other->x && $this->y === $other->y;
  }
}