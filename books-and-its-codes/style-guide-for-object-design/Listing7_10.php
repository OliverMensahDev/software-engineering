<?php
/*
* `Queue` is the abstraction:
*/
interface Queue
{
  public function publishUserPasswordChangedEvent(UserPasswordChanged $event): void;
}
/*
* The standard `Queue` implementation is `RabbitMQQueue`, which
Performing tasks 178
* contains the code we already had:
*/
final class RabbitMQQueue implements Queue
{
// ...
  public function publishUserPasswordChangedEvent(UserPasswordChanged $event): void {
    $this->rabbitMqConnection->publish(
      'user_events',
      'user_password_changed',
      json_encode([
        'user_id' => (string)$event->userId()
      ])
  );
  }
}
/*
* The event listener which is supposed to publish a message to the
* queue whenever a `UserPasswordChanged` event has occurred, will
* use the new abstraction as a dependency:
*/
final class SendMessageToRabbitMQ
{
  private $queue;
  public function __construct(Queue $queue)
  {
    $this->queue = $queue;
  }
  public function whenUserPasswordChanged(UserPasswordChanged $event): void 
  {
    $this->queue->publishUserPasswordChangedEvent($event);
  }
}