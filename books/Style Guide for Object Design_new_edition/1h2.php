<?php 
final class EventDispatcher {
  private  $listeners = [];
  // You can add a new event listener for the given type of event:
  public function addListener(string $event,callable $listener): void {
      $this->listeners[$event][] = $listener;
  }
  // You can also remove it again:
  public function removeListener(string $event,callable $listener): void {
      $listeners = $this->listeners[$event] ?? [];
      foreach ($listeners as $key => $callable) {
          if ($callable === $listener) {
              unset($this->listeners[$event][$key]);
          }
      }
  }

  public function dispatch(object $event): void {
      /*
      * Any listener that hasn't been removed yet, will be
      * called:
      */
      $listeners = $this->listeners[get_class($event)] ?? [];
      foreach ($listeners as $callable) {
          $callable($event);
      }
  }
}