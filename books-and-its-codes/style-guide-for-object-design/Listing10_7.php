<?
final class RescheduleMeetupService
{
    private EventDispatcher dispatcher;

    public function __construct(
        // ...
        EventDispatcher dispatcher
    ) {
        this.dispatcher = dispatcher
    }

    public function reschedule(MeetupId meetupId, /* ... */): void
    {
        meetup = /* ... */;

        meetup.reschedule(/* ... */);

        this.dispatcher.dispatchAll(meetup.recordedEvents());
    }
}