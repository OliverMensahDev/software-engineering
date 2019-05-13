<?php
class Car {

  private $model;

  public function setModel($model)
  {
    $this -> model = $model;
  }
  public function getModel()
  {
    return "The car model is " . $this -> model;
  }
  }
  $mercedes = new Car();
  $mercedes -> setModel("Mercedes");
  echo $mercedes -> getModel();