<?php 

namespace App\Services;

interface IDatabase
{
  public function getInvoice(int $id);
}