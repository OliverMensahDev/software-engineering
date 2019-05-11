<?php 
final class Date{
  private const FORMAT = "d/m/Y";
  private $date;

  private function __construct(){
    //do nothing here
  }

  public static function fromString(string $date): Date{
    $object = new self();
    $dateTimeImmutable = DateTimeImmutable::createFromFormat(
      self::FORMAT,
      $date
    );
    $object->date = $dateTimeImmutable;
    return $object;
  }
}

$date = Date::fromString('1/4/2019');
var_dump($date);