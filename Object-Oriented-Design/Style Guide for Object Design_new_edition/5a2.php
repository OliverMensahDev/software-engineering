<?php 
final class Counter
{
  private $count = 0;
  public function incremented(): Counter
  {
    $copy = clone $this;
    $copy->count++;
    return $copy;
  }
  public function currentCount(): int
  {
    return $this->count;
  }
}