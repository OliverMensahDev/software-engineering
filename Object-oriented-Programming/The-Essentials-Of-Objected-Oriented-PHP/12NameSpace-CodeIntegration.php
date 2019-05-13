<?php 
namespace Acme\Car;
class CarIntro {
  public function sayHello()
  {
    return "beep!";
  }
}


// 1. Require the namespaced file
require "src/Car/CarIntro.php";

// 2. Import the namespace
use Acme\Car\CarIntro;


// 3. Call the class from the context of the namespace, this time by using only the class name
$carIntro = new CarIntro();
echo $carIntro -> sayHello();

// 3. Use the class from the context of the namespace
$carIntro = new Acme\Car\CarIntro();
echo $carIntro -> sayHello();



//alias 
// 1. Require the file
require "src/Car/CarIntro.php";
// 2. Import the namespace and give it a friendly name
use Acme\Car\CarIntro as Intro;
// 3. Call the class from the namespace with the friendly name
$carIntro = new Intro();
echo $carIntro -> sayHello();