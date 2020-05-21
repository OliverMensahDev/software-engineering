<?php 
interface Shape {
  public function  calcArea();
}

class Circle implements Shape
{
  private $radius;

  public function __construct($radius)
  {
    $this->radius = $radius;
  }

  public function calcArea()
  {
    return $this->radius * $this->radius;
  }
}


class Rectangle implements Shape
{
  private $width;
  private $height;

  public function __construct($width, $height)
  {
    $this->width = $width;
    $this->height = $height;
  }

  public function calcArea()
  {
    return $this->width * $this->height;
  }
}

$circ = new Circle(3);
$rect = new Rectangle(3,4);
echo $circ -> calcArea();
echo $rect -> calcArea();