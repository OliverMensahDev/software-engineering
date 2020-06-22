<?
namespace Application\ScheduleMeetup;

final class ScheduleMeetup
{
    public string title;
    public string date;
}

final class ScheduleMeetupService
{
    // ...

    public function schedule(
        ScheduleMeetup command,
        UserId currentUserId
    ): MeetupId {
        meetup = Meetup.schedule(
            this.meetupRepository.nextIdentity(),
            Title.fromString(command.title),
            ScheduledDate.fromString(command.date),
            currentUserId
        );

        // ...
    }
}