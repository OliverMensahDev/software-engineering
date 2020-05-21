<?php 
final class Recipients 
{
  private $emailEmailAddresses;

  public function uniqueEmailAddresses(): array
  {
    // return a de-duplicated list of of addresses
  }
}

final class Mailer
{
  public function sendConfirmationEmails(Recipients $recipients): void {
    foreach ($recipients->uniqueEmailAddresses() as $emailAddress) {
      // Send the email...
    }
  }
}
