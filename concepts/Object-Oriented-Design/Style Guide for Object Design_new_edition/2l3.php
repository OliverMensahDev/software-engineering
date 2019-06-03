<?php 
final class ScheduleMeetup
{
  public $title;
  public $date;

  public static function fromFormData(array $formData): ScheduleMeetup{
    $scheduleMeetup = new Self();

    $scheduleMeetup->title = $fromData['title'];
    $scheduleMeetup->date = $fromData['date'];
    return $scheduleMeetup;
  }
}

final class MeetupController
{
  public function scheduleMeetupAction(Request $request)
  {
    // Extract the form data from the request body:
    $formData = /* ... */

    // Create the command object using this data:
    $scheduleMeetup =  ScheduleMeetup::fromFormData($formData);
    $this->scheduleMeetupService->__invoke($scheduleMeetup);
  }
}