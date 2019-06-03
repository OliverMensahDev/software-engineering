<?php 
final class EmailAddress 
{
  private $emailAddress;
  private function __construct(string $emailAddress)
  {
    if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
      throw new InvalidArgumentException(
        'Invalid email address'
      );
    }
    $this->emailAddress = $emailAddress;
  }

  public static function fromString(string $email): EmailAddress
  {
    return new self($email);
  }

}
final class Mailer 
{
  private $sentTo = [];

  public function sendConfirmationEmail(EmailAddress $recipient):void
  {
    if (in_array($recipient, $this->sentTo)) {
      // Don't send the email again:
      return;
    }
      // Send the email...
    $this->sentTo[] = $recipient;
  }
}


$mailer = new Mailer();
$recipient = EmailAddress::fromString('info@matthiasnoback.nl');
// This will send out a confirmation email:
$mailer->sendConfirmationEmail($recipient);
// The second call won't send it again:
$mailer->sendConfirmationEmail($recipient);


$a = new Mailer();
$recipient = EmailAddress::fromString('info@matthiasnoback.nl');
// This will send out a confirmation email:
$a->sendConfirmationEmail($recipient);
// The second call won't send it again:
$a->sendConfirmationEmail($recipient);


var_dump($mailer, $a);