<?php
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


final class User
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

$user = new User(new EmailAddress("olivermensah@gmail.com"));
var_dump($user);

$user->changeEmailAddress(new EmailAddress("pdpapd@gmail.com"));
var_dump($user);