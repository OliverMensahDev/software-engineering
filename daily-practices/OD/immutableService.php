<?php
// When we use the `Importer` now, it will ignore errors...
// When we use it now, it won't ignore errors any
final class Importer {
    
    public function ignoreErrors(bool $ignoreErrors): void{
        $this->ignoreErrors = $ignoreErrors;
    }
    public function print(){
        if($this->ignoreErrors) {
            echo "Error ignored";
        }
        else{
            echo "Errors not ignored";
        }
    }
// ...
}
$importer = new Importer();
$importer->ignoreErrors(false);
$importer->print();




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