<?php 
class Model
{
  // Store the data
  private $carPrice;
  // Set the data
  public function setPrice($price)
  {
    $this -> carPrice = $price;
  }
  // Get the data
  public function getPrice()
  {
    return $this -> carPrice;
  }
}

class Controller {
  private $model;
  private $limit = 30000;
  // Set the model so we can use its data
  public function __construct(Model $model)
  {
    $this -> model = $model;
  }
  // Set the data in the module
  public function setPrice($price)
  {
    $this->model->setPrice((int)$price);
  }
  // Some logic to check if the price is expensive
  public function expensiveOrNot()
  {
    if($this->model->getPrice() > $this->limit) return "expensive";
    return "not expensive";
  }
}
class View {
  private $controller;
  // Set the controller so we can use it
  public function __construct(Controller $controller)
  {
    $this->controller = $controller;
  }
  // Output the data after processing it by the controller
  public function output()
  {
    return $this->controller->expensiveOrNot();
  }
}

// The data can come from the database
$priceToCheck = 31000;
// The data is retrieved by the model
$model1 = new Model();
$model1 -> setPrice($priceToCheck);
// We need the controller in order to process the data
$controller1 = new Controller($model1);
// We need the view in order to output the processed data
$view1 = new View($controller1);
echo $output = $view1 -> output();



// The data can come from the user
// e.g. through a post request
$priceToCheck = $_POST['price'] = 29900;
// We need the model to store the data
$model2 = new Model();
// We need the controller in order to get the user data
// and process it before passing it to the Model
$controller2 = new Controller($model2);
$controller2 -> setPrice($_POST['price']);
// We need the view in order to output the processed data
$view2 = new View($controller2);
echo $output = $view2 -> output();