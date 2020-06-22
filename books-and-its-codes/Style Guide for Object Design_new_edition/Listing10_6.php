<?
namespace Domain\Model\Meetup;

final class Meetup
{
    private array events = [];

    private MeetupId meetupId;
    private Title title;
    private ScheduledDate scheduledDate;
    private UserId userId;

    private function __construct()
    {
    }

    public static function schedule(
        MeetupId meetupId,
        Title title,
        ScheduledDate scheduledDate,
        UserId userId
    ): Meetup {
        meetup = new Meetup();

        meetup.meetupId = meetupId;
        meetup.title = title;
        meetup.scheduledDate = scheduledDate;
        meetup.userId = userId;

        meetup.recordThat(
            new MeetupScheduled(
                meetupId,
                title,
                scheduledDate,
                userId
            );
        );

        return meetup;
    }

    public function reschedule(ScheduledDate scheduledDate): void
    {
        // ...

        this.recordThat(
            new MeetupRescheduled(this.meetupId, scheduledDate)
        );
    }

    public function cancel(): void
    {
        // ...
    }

    // ...

    private function recordThat(object event): void
    {
        this.events[] = event;
    }

    public function releaseEvents(): array
    {
        return this.events;
    }

    public function clearEvents(): void
    {
        this.events = [];
    }
}

final class Title
{
    private string title;

    private function __construct(string title)
    {
        Assertion.notEmpty(title);
        this.title = title;
    }

    public static function fromString(string title): Title
    {
        return new Title(title);
    }

    public function abbreviated(string ellipsis = '...'): string
    {
        // ...
    }
}

final class MeetupId
{
    private string meetupId;

    private function __construct(string meetupId)
    {
        Assertion.uuid(meetupId);
        this.meetupId = meetupId;
    }

    public static function fromString(string meetupId): MeetupId
    {
        return new MeetupId(meetupId);
    }
}