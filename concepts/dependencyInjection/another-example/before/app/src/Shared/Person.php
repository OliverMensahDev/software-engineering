<?php 
namespace App\Shared;

final class Person 
{
  public $id;
  public $givenName;
  public $familyName;
  public $startDate;
  public $rating;

  public function __construct($id, $givenName, $familyName, $startDate, $rating)
  {
    $this->id = $id;
    $this->givenName = $givenName;
    $this->familyName = $familyName;
    $this->startDate = $startDate;
    $this->rating = $rating;
  }
}