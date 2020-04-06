<?php 
interface CanBePublished
{
  public function queueName(): string;
  public function eventName(): string;
  public function eventData(): array;
}

final class RabbitMQQueue implements Queue
{
// ...
  public function publish(CanBePublished $event): void
  {
    $this->rabbitMqConnection->publish( 
      $event->queueName(),
      $event->eventName(),
      json_encode($event->eventData())
    );
  }
}