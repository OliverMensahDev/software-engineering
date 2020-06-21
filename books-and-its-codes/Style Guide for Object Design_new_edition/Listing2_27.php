<?php
// By allowing event listeners to be added and removed on-the-fly, the behavior of
// EventDispatcher will be quite unpredictable; it can even change over time. In this
// case, we should turn the array of event listeners into a constructor argument, and
// remove the addListener() and removeListener() methods:


final class EventDispatcher {
  private  $listeners;
  public function __construct(array $listenersByEventName){
      $this->listeners = $listenersByEventName;
  }
}