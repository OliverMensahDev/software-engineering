<?php 
final class UserId 
{
 public function __construct(int $id)
 {
   $this->id = $id;
 }
}

/*
* The fact that a user has changed their password can be
* represented by a `UserPasswordChanged` event object:
*/
final class UserPasswordChanged
{
  private $userId;
  public function __construct(UserId $userId)
  {
    $this->userId = $userId;
  }
  public function userId(): UserId
  {
    return $this->userId;
  }
}


/*
* `SendEmail` is an event listener for the `UserPasswordChanged`
* event. When notified of the event, this listener will actually
* send the email:
*/
final class SendEmail
{
  public function whenUserPasswordChanged(UserPasswordChanged $event): void 
  {
    
    // $this->mailer->sendPasswordChangedEmail($event->userId());
    echo "Emulate sending email";
  }
  
}

final class EventDispatcher
{
  private $listeners;
  public function __construct(array $listenersByType)
  {
    // foreach ($listenersByType as $eventType => $listeners) {
    //   Assertion::string($eventType);
    //   Assertion::allIsCallable($listeners);
    // }
    $this->listeners = $listenersByType;
  }

  public function dispatch(object $event): void
  {
    $listeners = $this->listeners[get_class($event)] ?: [];
    $object = $listeners[0];
    $method = $listeners[1];
    $object->$method($event);
  }
}

final class User 
{ 

  private $eventDispatcher;

  public function __construct(EventDispatcher  $eventDispatcher)
  {
    $this->eventDispatcher = $eventDispatcher;
  }

  public function changeUserPassword(UserId $userId, string $plainTextPassword): void 
  {
    // $user = $this->repository->getById($userId);
    // $hashedPassword = //...;
    // $user->changePassword($hashedPassword);
    // $this->repository->save($user);
    echo "emulating changing password";
    /*
    * After actually changing the password, dispatch a
    * `UserPasswordChanged` event, so other services can respond to
    * it:
    */
    $this->eventDispatcher->dispatch(new UserPasswordChanged($userId)
    );
  }
}


$dispatcher = new EventDispatcher(
  [
    UserPasswordChanged::class => [ new SendEmail(), 'whenUserPasswordChanged']
  ]
);

$user =  new User($dispatcher);
$user->changeUserPassword(new UserId(1), "adafdsfdsaf");




