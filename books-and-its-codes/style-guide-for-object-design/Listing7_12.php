<?php
final class ChangePasswordService
{
    private EventDispatcher eventDispatcher;
    // ...

    public function __construct(
        EventDispatcher eventDispatcher,
        // ...
    ) {
        this.eventDispatcher = eventDispatcher;

        // ...
    }

    public function changeUserPassword(
        UserId userId,
        string plainTextPassword
    ): void {
        // ...

        this.eventDispatcher.dispatch(
            new UserPasswordChanged(userId)
        );
    }
}

/**
 * @test
 */
public function it_dispatches_a_user_password_changed_event(): void
{
    userId = /* ... */;

    eventDispatcherMock = this.createMock(EventDispatcher.className);
    eventDispatcherMock
        .expects(this.once())
        .method('dispatch')
        .with(new UserPasswordChanged(userId));

    service = new ChangePasswordService(eventDispatcherMock, /* ... */);

    service.changeUserPassword(userId, /* ... */);
}

