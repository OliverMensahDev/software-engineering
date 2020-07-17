<?php 
final class EventDispatcherSpy implements EventDispatcher
{
    private array events = [];

    public function dispatch(object event): void
    {
        this.events[] = event;
    }

    public function dispatchedEvents(): array
    {
        return this.events;
    }
}

/**
 * @test
 */
public function it_dispatches_a_user_password_changed_event(): void
{
    // ...
    eventDispatcher = new EventDispatcherSpy();
    service = new ChangePasswordService(eventDispatcher, /* ... */);

    service.changeUserPassword(userId, /* ... */);

    assertEquals(
        [
            new UserPasswordChanged(userId)
        ],
        eventDispatcher.dispatchedEvents()
    );
}

