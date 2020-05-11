<?php

class CommonUtils
{
  public static function countOccurrences(string $stringToSearch, $charToFind)
  {
    $count = 0;
    $length = strlen($stringToSearch);
    for ($i = 0; $i < $length; $i++) {
      if ($stringToSearch[$i] == $charToFind) {
        $count++;
      }
    }
    return $count;
  }

  public static function generateRandomNumberBetween(int $low, int $high)
  {
    return rand($high, $low);
  }

  public static function convertCurrency()
  {
    return 0;
  }

  public static function printNowNewYorkTime()
  {
    $now = new DateTime("now");
    $now->setTimezone(new DateTimeZone("America/New_York"));
    echo $now->format("Y-m-d H:i:s");
  }
}
