<?
namespace Application\ScheduleMeetup;

use Domain\Model\Meetup\Meetup;
use Domain\Model\Meetup\MeetupRepository;
use Domain\Model\Meetup\ScheduleDate;
use Domain\Model\Meetup\Title;

final class ScheduleMeetupService
{
    private MeetupRepository meetupRepository;
    public function __construct(MeetupRepository meetupRepository)
    {
        this.meetupRepository = meetupRepository;
    }

    public function schedule(
        string title,
        string date,
        UserId currentUserId
    ): MeetupId {
       meetup = Meetup.schedule(
            this.meetupRepository.nextIdentity(),
            Title.fromString(title),
            ScheduledDate.fromString(date),
            currentUserId
        );

        this.meetupRepository.save(meetup);
 
        return meetup.meetupId();
    }
}