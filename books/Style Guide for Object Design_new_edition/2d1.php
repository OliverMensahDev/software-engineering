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
$user = new User($email);
$user->changeEmailAddress($email);

// The constructor will catch invalid email addresses
expectException(
    InvalidArgumentException::class,
    'email',
    function () {
        new User('not-a-valid-email-address');
    }
);

// create a valid `User` object first
$user = new User('valid@emailaddress.com');
// `changeEmailAddress()` will also catch invalid email addresses
expectException(
    InvalidArgumentException::class,
    'email',
    function () use ($user) {
        $user->changeEmailAddress('not-a-valid-email-address');
    }
);