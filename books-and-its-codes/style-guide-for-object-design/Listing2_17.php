<?php 

class Connection {

}

final class MeetupRepository{
    public function __construct(Connection $connection){
        $this->connection = $connection;
    }
    public function findUpcomingMeetups(string $area): array{
        /*
        * Instantiating a `DateTimeImmutable` object with no
        * arguments will implicitly ask the system what the current
        * time is:
        */
        $now = new DateTimeImmutable();
        var_dump($now);
        return $this->findMeetupsScheduledAfter($now, $area);
    }
    public function findMeetupsScheduledAfter(DateTimeImmutable $time,  string $area): array {
        return array("me"=>1);
    }
}

$meetupRepository = new MeetupRepository(new Connection());
$meetupRepository->findUpcomingMeetups('NL');