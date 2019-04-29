<?php

// class Car {
//     private $model = '';
//     // The constructor
//     public function __construct($model = null){
//         if($model){
//             $this -> model = $model;
//         }
//     }
//     public function getCarModel(){
//         return ' The car model is: ' . $this -> model;
//     }
// }


// $car = new Car();
// echo $car->getCarModel();
// $car1 = new Car("BMW");

// echo $car->getCarModel();


//default value solution

// class Car {
//     private $model = '';
//     // The constructor
//     public function __construct($model = "Mercedes"){
//         $this -> model = $model;
//     }
//     public function getCarModel(){
//         return ' The car model is: ' . $this -> model;
//     }
// }


// $car = new Car();
// echo $car->getCarModel();

// $car1 = new Car("BMW");
// echo $car->getCarModel();



// required dependency solution 
// 
// class Car {
//     private $model = '';
//     // The constructor
//     public function __construct(string $model){
//         $this -> model = $model;
//     }
//     public function getCarModel(){
//         return ' The car model is: ' . $this -> model;
//     }
// }


// $car = new Car();
// echo $car->getCarModel();

// $car1 = new Car("BMW");
// echo $car->getCarModel();


//null object 

interface CarModel{
    public function getCarModel(): string;
}

class NullCarModel implements CarModel{
    public function getCarModel(): string{
        return ' The car model is: ';
    }
}

class MercedesCarModel implements CarModel{
    public function getCarModel(): string{
        return ' The car model is: is Mercedes';
    }
}

class Car {
    private $model = '';
    // The constructor
    public function __construct(CarModel $carModel){
        $this->carModel = $carModel;
    }
    public function getCarModel(){
        return  $this->carModel->getCarModel();
    }
}


$car = new Car(new NullCarModel);
echo $car->getCarModel();

$car1 = new Car(new MercedesCarModel);
echo $car1->getCarModel();
