<?php 
final class Appointment 
{
  private $time;
  
  public function __construct(DateTime $time)
  {
    $this->time = $time;
  }

  public function time(): string
  {
    return $this->time->format('h:s');
  }

  public function reminderTime(): string 
  {
    $oneHourBefore = '-1 hour';
    $reminderTime = $this->time->modify($oneHourBefore);
    return $reminderTime->format('h:s');
  }
}

$appointment = new Appointment(new DateTime('12:00'));
// First, we get the time of the appointment:
$time = $appointment->time();

echo $time;

// Then we get the time for sending a reminder:
$reminderTime = $appointment->reminderTime();
echo $reminderTime; 

// Finally, we get the time of the appointment again:
$time = $appointment->time(); 
echo $time;



//not part
final class Appointment1
{
  private $time;
  
  public function __construct(DateTimeImmutable $time)
  {
    $this->time = $time;
  }

  public function time(): string
  {
    return $this->time->format('h:s');
  }

  public function reminderTime(): string 
  {
    $oneHourBefore = '-1 hour';
    $reminderTime = $this->time->modify($oneHourBefore);
    return $reminderTime->format('h:s');
  }
}


$appointment = new Appointment1(new DateTimeImmutable('12:00'));
// First, we get the time of the appointment:
$time = $appointment->time();

echo $time;

// Then we get the time for sending a reminder:
$reminderTime = $appointment->reminderTime();
echo $reminderTime; 

// Finally, we get the time of the appointment again:
$time = $appointment->time(); 
echo $time;