<?php 
class Car {
  private $model;
  
  public function setModel($model)
  {
    $this->model = $model;
  }

  public function hello(){
    return __class__;
  }
}


class SportCar extends Car{
  
}

$sportsCar1 = new Car();
echo $sportsCar1 -> hello();



