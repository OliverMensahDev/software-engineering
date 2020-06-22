<?php
final class Position {
  private $x;
  private $y;

  public static function fromArray(array $data){
    $position = new self();
    $position->x = $data['x'];
    $position->y = $data['y'];
    return $position;
  }
}