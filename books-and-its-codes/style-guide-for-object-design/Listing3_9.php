<?php
final class Deal{
  public function __construct(int $totalAmount, int $amountToFirstParty,int $amountToSecondParty) {
    if ($amountToFirstParty + $amountToSecondParty    !== $totalAmount) {
        throw new InvalidArgumentException("");
    }
  }
}