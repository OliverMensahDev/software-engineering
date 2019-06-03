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
    // Extract the form data from the request body:
    $formData = /* ... */

    // Create the command object using this data:
    $scheduleMeetup = new scheduleMeetup();
    $scheduleMeetup->title = $formData['title'];
    $scheduleMeetup->date  = $formData['date'];

    $this->scheduleMeetupService->__invoke($scheduleMeetup);
  }
}