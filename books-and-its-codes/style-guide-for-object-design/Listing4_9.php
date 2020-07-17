<?php
final class Year
{
  public $year;

  public function __construct(int $year)
  {
    $this->year = $year;
  }

  public function next(): Year
  {
    return new self($this->year + 1);
  }
}

$year = new Year(2018);

echo $year->year;

echo $year->next()->year;

echo $year->year;
