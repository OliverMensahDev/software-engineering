<?
final class UserPasswordChanged
{
    private UserId userId;
    public function __construct(UserId userId)
    {
        this.userId = userId;
    }
}
final class SendUserPasswordChangedNotification
{
    // ...
    public function whenUserPasswordChanged(
        UserPasswordChanged event
    ): void {
        // Send the email...
    }
}