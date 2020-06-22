<?
namespace Application\UpcomingMeetups;

final class UpcomingMeetup
    public string title;
    public string date;
}

interface UpcomingMeetupRepository
{
    /**
     * @return UpcomingMeetup[]
     */
    public function upcomingMeetups(DateTime today): array
}

namespace Infrastructure\ReadModel;

use Application\UpcomingMeetups\UpcomingMeetupRepository;
use Doctrine\DBAL\Connection;

final class UpcomingMeetupDoctrineDbalRepository implements
    UpcomingMeetupRepository
{
    private Connection connection;

    public function __construct(Connection connection)
    {
        this.connection = connection;
    }

    public function upcomingMeetups(DateTime today): array
    {
        rows = this.connection./* ... */;
 
        return array_map(
            function (array row) {
                upcomingMeetup = new UpcomingMeetup();
                upcomingMeetup.title = row['title'];
                upcomingMeetup.date = row['date'];

                return upcomingMeetup;
            },
            rows
        );
    }
}