<?php 

class TimeUtils
{
  public static function printNowNewYorkTime()
  {
    $now = new DateTime("now");
    $now->setTimezone(new DateTimeZone("America/New_York"));
    echo $now->format("Y-m-d H:i:s");
  }
}