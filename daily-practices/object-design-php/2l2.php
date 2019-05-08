<?php 
final class ScheduleMeetup 
{
  public $title;
  public $date;

  public function validate(): array
  {
    $errors = [];
    if($this->title == ''){
      $errors['title'][] = 'validation.empty_title';
    }
    if($this->date == ''){
      $errors['date'][] = 'validation.empty_date';
    }
    \DateTimeImmutable::createFromFormat('d/m/Y', $this->date);
    $errors = \DateTime::getLastErrors();
    if ($errors['error_count'] > 0) {
      $errors['date'][] = 'validation.invalid_date_format';
    }
    return $errors;
  }
}