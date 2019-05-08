<?php 
final class ScheduleMeetup
{
  public $title;
  public $date;
}

final class MeetupController
{
  public function scheduleMeetupAction(Request $request)
  {
    $scheduleMeetup = new scheduleMeetup();
    $scheduleMeetup->title = $request->title;
    $scheduleMeetup->date  = $request->date;

    $this->scheduleMeetupService->__invoke($scheduleMeetup);
  }
}