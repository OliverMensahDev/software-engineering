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


assertEquals(1, (new Counter())->incremented()->currentCount());
assertEquals(2, (new Counter())->incremented()->incremented()->currentCount());
