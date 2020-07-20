<?php

class Square
{
  public $side;
}

class Rectangle
{
  public $height;
  public $width;
}
class Circle
{
  public $radius;
}

class Geometry
{
  public function area(object $shape)
  {
    if ($shape instanceof Square) {
      return $shape->side * $shape->side;
    }
    if ($shape instanceof Rectangle) {
      return $shape->height * $shape->width;
    }
    if ($shape instanceof Circle) {
      return $shape->radius * $shape->radius * 3.14;
    }
    throw new Exception("No such Shape");
  }

  public function paint(object $shape)
  {
    if ($shape instanceof Square) {
      return $shape->side * $shape->side;
    }
    if ($shape instanceof Rectangle) {
      return $shape->height * $shape->width;
    }
    if ($shape instanceof Circle) {
      return $shape->radius * $shape->radius * 3.14;
    }
    throw new Exception("No such Shape");
  }
}

$geo = new Geometry();
$circle = new Circle();
$circle->radius = 5;
echo $geo->area($circle);
