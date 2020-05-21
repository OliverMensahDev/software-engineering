<?php 
class Car {
  private $model;
  public function __construct($model)
  {
    if(!$model)
    {
      throw new InvalidArgumentException("Model cannot be null");
    }
    $this->model = $model;
  }

  public function getCarModel()
  {
    return " The <b>" . __class__ . "</b> model is: " . $this -> model;
  }
}

$car1 = new Car('Mercedes');
echo $car1 -> getCarModel();