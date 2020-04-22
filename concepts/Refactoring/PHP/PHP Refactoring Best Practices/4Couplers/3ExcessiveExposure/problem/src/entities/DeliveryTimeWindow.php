<?php 

namespace app\entities;

class DeliveryTimeWindow
{
  private $start;
  private $end;

  public function __construct($start, $end)
  {
    $this->start = $start;
    $this->end = $end;
  }

  public function setStart($start)
  {
    $this->start = $start;
  }

  public function getStart()
  {
    return $this->start;
  }

  public function setEnd($end)
  {
    $this->end = $end;
  }

  public function getEnd()
  {
    return $this->end;
  }
}