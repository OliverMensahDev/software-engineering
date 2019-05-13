<?php 
final class Recipients
{
  /**
  * @var EmailAddress[]
  */
  private $emailAddresses;
  private function __construct(array $emailAddresses)
  {
    $this->emailAddresses = $emailAddresses;
  }
  // Start with an empty list...
  public static function emptyList(): Recipients
  {
    return new self([]);
  }


    /*
  * Any time a client wants to add an email address to it,
  * it will only be added it it's not already on the list:
  */
  public function with(EmailAddress $emailAddress): Recipients
  {
    if (in_array($emailAddress, $this->emailAddresses)) {
      // no need to add it again
      return $this;
    }
    return new self(array_merge($this->emailAddresses), [$emailAddress]);
  }

  // There's no need for a `uniqueEmailAddresses()` method anymore
  public function emailAddresses(): array
  {
    return $this->emailAddresses;
  }
}

final class Mailer
{
  public function sendConfirmationEmails(Recipients $recipients): void {
    foreach ($recipients->emailAddresses() as $emailAddress) {
      // Send the email...
    }
  }
}
