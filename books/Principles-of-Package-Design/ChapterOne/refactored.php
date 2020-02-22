<?php
class ConfirmationMailMailer
{
  private $confirmationMailFactory;
  private $mailer;
  public function __construct(ConfirmationMailFactory $confirmationMailFactory, MailerInterface $mailer) {
    $this->confirmationMailFactory = $confirmationMailFactory;
    $this->mailer = $mailer;
  }
  public function sendTo(User $user): void
  {
    $message = $this->createMessageFor($user);
    $this->sendMessage($message);
  }
  private function createMessageFor(User $user): Message
  {
    return $this->confirmationMailFactory
      ->createMessageFor($user);
  }
  private function sendMessage(Message $message): void
  {
    $this->mailer->send($message);
  }
}


class ConfirmationMailFactory
{
  private $templating;
  private $translator;
  
  public function __construct(
    TemplatingEngineInterface $templating,
    TranslatorInterface $translator
  ) {
    $this->templating = $templating;
    $this->translator = $translator;
  }
  public function createMessageFor(User $user): Message
  {
    /*
* Create an instance of Message based on the
* given User
*/
    $message;
    return $message;
  }
}
