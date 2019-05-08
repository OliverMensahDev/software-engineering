<?php 
final class Deal{
  private $amountToFirstParty;
  private $amountToSecondParty;

  public function __construct(int $amountToFirstParty, int $amountToSecondParty) {
    if ($amountToFirstParty <= 0) {
      throw new InvalidArgumentException(/* ... */);
    }
    $this->amountToFirstParty = $amountToFirstParty;
    if ($amountToSecondParty <= 0) {
      throw new InvalidArgumentException(/* ... */);
    }   
    $this->amountToSecondParty = $amountToSecondParty;
  }

  public function totalAmount(): int{
    return $this->amountToFirstParty + $this->amountToSecondParty;
  }
}