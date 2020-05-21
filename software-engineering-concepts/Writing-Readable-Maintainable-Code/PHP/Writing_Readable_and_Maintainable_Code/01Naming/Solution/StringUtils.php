<?php

class StringUtils
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
}
