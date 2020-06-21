<?php

class Connection
{
}

/*
* Maybe a suitable name for this new service, that can tell us the
* current time, would simply be "Clock":
*/
interface Clock
{
  public function currentTime(): DateTime;
}
/*
* The standard implementation for this service will use the
* system's clock to return a `DateTimeImmutable` object,
* representing the current time:
*/
final class FixedClock implements Clock
{
  private $now;
  public function __construct(DateTime $now)
  {
    $this->now = $now;
  }
  public function currentTime(): DateTime
  {
    return $this->now;
  }
}
final class MeetupRepository
{
  public function __construct(Clock $clock, Connection $connection)
  {
    $this->clock = $clock;
    $this->connection = $connection;
  }
  public function findUpcomingMeetups(string $area): array
  {
    /*
        * Instead of "creating" the current time on the spot, we
        * can now ask the `Clock` service for it:
        */
    $now = $this->clock->currentTime();
    var_dump($now);
    return $this->findMeetupsScheduledAfter($now, $area);
  }
  public function findMeetupsScheduledAfter(DateTime $time,  string $area): array
  {

    return array("me" => 1);
    // ...
  }
}
$meetupRepository = new MeetupRepository(new FixedClock(new DateTime()), new Connection());
$meetupRepository->findUpcomingMeetups('NL');
