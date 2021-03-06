<?php 
namespace App\Entities;

class Invoice
{
  public $id;
  public $total;
  public $isOverdue;
  public $status;
  public $lastPrintedBy;

  public function __construct($id, $total)
  {
    $this->id = $id;
    $this->total = $total;
    $this->isOverdue = false;
  }
}