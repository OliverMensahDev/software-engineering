<?php 

namespace App\Entities;

class Invoice
{
  public $id;
  public $total;

  public function __construct($id, $total)
  {
    $this->id     = $id;
    $this->total  = $total;
  }

  // public function getId()
  // {
  //   return $this->id;
  // }

  // public function getTotal()
  // {
  //   return $this->total;
  // }
}