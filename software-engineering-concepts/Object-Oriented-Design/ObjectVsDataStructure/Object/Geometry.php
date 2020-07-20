<?php
interface Shape
{
  public function area();
}
class Square implements shape
{
  private $side;
  public function __construct($side)
  {
    $this->side = $side;
  }
  public function area()
  {
    return $this->side * $this->side;
  }
}


class Rectangle implements shape
{
  private $height;
  private $width;
  public function __construct($height, $width)
  {+
    $this->height = $height;
    $this->width = $width;
  }
  public function area()
  {
    return $this->height * $this->width;
  }
}

class Circle implements shape
{
  private $radius;
  public function __construct($radius)
  {
    $this->radius = $radius;
  }
  public function area()
  {
    return $this->radius * $this->radius * 3.14;
  }
}

class Geometry
{
  public function area(Shape $shape)
  {
    return $shape->area();
  }
}

$geo = new Geometry();
$circle = new Circle(5);
echo $geo->area($circle);
