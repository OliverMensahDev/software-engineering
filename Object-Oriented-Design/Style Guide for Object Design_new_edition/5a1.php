<?php 

final class Counter
{
  private $count = 0;
  public function increment(): void 
  {
    $this->count++;
  }
  public function currentCount(): int 
  {
    return $this->count;
  }
}