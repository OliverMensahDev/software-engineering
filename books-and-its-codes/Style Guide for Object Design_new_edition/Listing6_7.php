<?php 
final class Events 
{
  public function eventListnersForEvent(string $eventName): array 
  {
    if(!isset($this->listeners[$eventName])){
      /*
      * Instead of return `null`, return an empty list
      */
      return [];
    }
    return $this->listeners[$eventName];
  }
}