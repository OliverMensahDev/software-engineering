<?php

namespace app\entities;

class Phone
{
  private $fullNumber;

  public function __construct(string $number)
  {
    $this->fullNumber = $number;
  }

  public function getInternationalFormat()
  {
    return $this->getInternationalPrefix() +
      $this->getPrefix() +
      $this->getNumber();
  }

  public function getInternationalPrefix()
  {
    return "00";
  }
  
  public function getAreaCode()
  {
    return substr($this->fullNumber, 0, 3);
  }
  public function getPrefix()
  {
    return substr($this->fullNumber, 3, 6);
  }
  public function getNumber()
  {
    return substr($this->fullNumber, 6, 10);
  }
}
