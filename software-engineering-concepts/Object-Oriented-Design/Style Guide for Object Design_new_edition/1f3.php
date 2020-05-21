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

// solution 1 

/*
* Maybe a suitable name for this new service, that can tell us the
* current time, would simply be "Clock":
*/
interface Clock{
    public function currentTime(): DateTimeImmutable;
}
/*
* The standard implementation for this service will use the
* system's clock to return a `DateTimeImmutable` object,
* representing the current time:
*/
final class SystemClock implements Clock{
    public function currentTime(): DateTimeImmutable{
        return new DateTimeImmutable();
    }
}
final class MeetupRepository1{
    public function __construct(Clock $clock, Connection $connection) {
        $this->clock = $clock;
        $this->connection = $connection;
    }
    public function findUpcomingMeetups(string $area): array{
        /*
        * Instead of "creating" the current time on the spot, we
        * can now ask the `Clock` service for it:
        */
        $now = $this->clock->currentTime();
        var_dump($now);
        return $this->findMeetupsScheduledAfter($now, $area);
    }
    public function findMeetupsScheduledAfter(DateTimeImmutable $time,  string $area): array {

        return array("me"=>1);
    // ...
    }
}
$meetupRepository = new MeetupRepository1(new SystemClock(), new Connection());
$meetupRepository->findUpcomingMeetups('NL');

//solution two: 

final class MeetupRepository2{
    public function __construct(){
        // `Clock` is no longer needed
    }
    public function findUpcomingMeetups(string $area,DateTimeImmutable $now): array {
        /*
        * The current time will be provided by clients of this
        * method.
        */
        var_dump($now);
        return $this->findMeetupsScheduledAfter($now, $area);
    }
    public function findMeetupsScheduledAfter(DateTimeImmutable $time,  string $area): array {
        return array("me"=>1);
    }
}
$meetupRepository = new MeetupRepository2();
$meetupRepository->findUpcomingMeetups('NL', new DateTimeImmutable());