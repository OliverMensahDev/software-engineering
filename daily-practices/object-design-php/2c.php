<?php
final class User
{
    private $emailAddress;
    public function __construct(string $emailAddress)
    {
        /*
        * Validate that the provided email address is valid:
        */
        if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
            'Invalid email address'
        );
        }
        $this->emailAddress = $emailAddress;

    }
    // ...
    public function changeEmailAddress(string $emailAddress): void
    {
        /*
        * Validate it again, if it's going to be updated:
        */
        if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                'Invalid email address'
            );  
        }
        $this->emailAddress = $emailAddress;
    }
}
$email = "dafasf";
// $user = new User($email);
// $user->changeEmailAddress($email);


    
//better
final class EmailAddress
{
    private $emailAddress;
    public function __construct(string $emailAddress)
    {
        if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                'Invalid email address'
            );
        }
        $this->emailAddress = $emailAddress;
    }
}


final class User1
{
    private $emailAddress;
    public function __construct(EmailAddress $emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    public function changeEmailAddress(EmailAddress $emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }
}
$emailAddress = new EmailAddress($email);
$user = new User1($emailAddress);
$user->changeEmailAddress($emailAddress);