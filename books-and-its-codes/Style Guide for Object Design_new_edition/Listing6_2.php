<?php
final class Counter
{
  private $count = 0;
  public function incremented(): int
  {
    $this->count++;
    return $this->count;
  }
  public function currentCount(): int
  {
    return $this->count;
  }
}


assertEquals(1, (new Counter())->incremented());
assertEquals(2, (new Counter())->incremented());
