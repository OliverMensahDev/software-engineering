<?php 
final class ShoppingBasket 
{
  private $items = [];

  // This method can be removed...
  public function getItems(): array
  {
    return $this->items;
  }

  // ... the moment we provide a simple count function:
  public function itemCount(): int
  {
    return count($this->items);
  }

}

// So instead of
count($basket->getItems());

// we can now do:
$basket->itemCount();