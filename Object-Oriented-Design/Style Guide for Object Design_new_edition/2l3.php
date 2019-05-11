<?php 
final class ScheduleMeetup
{
  public $title;
  public $date;

  public static function fromFormData(array $formData): ScheduleMeetup{
    $scheduleMeetup = new Self();

    $scheduleMeetup->title = $fromFormData['title'];
    $scheduleMeetup->date = $fromFormData['date'];
    return $scheduleMeetup;
  }
}