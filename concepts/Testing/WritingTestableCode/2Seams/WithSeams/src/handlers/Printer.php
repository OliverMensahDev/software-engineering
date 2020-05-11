<?php 

namespace App\Handlers;

class Printer implements IPrinter
{
  public function print($data)
  {
    echo $data;
  }
}