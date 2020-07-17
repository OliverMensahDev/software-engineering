<?php

final class Journal
{
  private $currentYear;
  public function closeTheFinancialYear(): void
  {
    // ...
    $this->currentYear = $this->currentYear->next();
  }
}
