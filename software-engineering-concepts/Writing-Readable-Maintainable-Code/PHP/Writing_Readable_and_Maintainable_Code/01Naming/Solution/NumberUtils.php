<?php

class NumberUtils
{
  public static function generateRandomNumberBetween(int $low, int $high)
  {
    return rand($high, $low);
  }

  public static function convertCurrency()
  {
    return 0;
  }
}
