<?php

final class SendMessageToRabbitMQ
{
  // ...
  public function whenUserChangedPassword(UserPasswordChanged $event): void {
    $this->rabbitMqConnection->publish(
      'user_events',
      'user_password_changed',
      json_encode([
        'user_id' => (string)$event->userId()
      ])
    );
  }
}
