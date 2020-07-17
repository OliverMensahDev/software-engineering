<?
final class ChangeUserPassword
{
    private EventDispatcher eventDispatcher;

    public function __construct(
        /* ... */,
        EventDispatcher eventDispatcher
    ) {
        // ...
    }
    public function changeUserPassword(
        UserId userId,
        string plainTextPassword
    ): void {
        encodedPassword = this.passwordEncoder.encode(
            newPassword
        );

        // Store the new password

        this.eventDispatcher.dispatch(
            new UserPasswordChanged(userId)
        );
    }
}

listener = new SendUserPasswordChangedNotification(/* ... */);
eventDispatcher = new EventDispatcher([
    UserPasswordChanged.className => [
        listener,
        'whenUserPasswordChanged'
    ]
]);

service = new ChangeUserPassword(/* ... */, eventDispatcher);

service.changeUserPassword(new UserId(/* ... */), 'Test123');