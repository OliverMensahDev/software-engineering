<?php 

namespace App\Handlers;

use DateTime;

interface IDateTimeWrapper 
{ 
  public function getNow(): DateTime;
}