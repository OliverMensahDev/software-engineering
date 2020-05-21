<?php

namespace App\Handlers;

use App\Handlers\IDateTimeWrapper;
use DateTime;

class DateTimeWrapper implements IDateTimeWrapper
{
  public function getNow(): DateTime
  {
    return new DateTime("NOW");
  }
}
