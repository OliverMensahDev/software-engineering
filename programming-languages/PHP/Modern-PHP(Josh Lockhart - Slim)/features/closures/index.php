<?php
// // sample
// $closure = function ($name) {
//   return sprintf('Hello %s', $name);
// };
// echo $closure("Josh");

// //closure
// $numbersPlusOne = array_map(function ($number) {
//   return $number + 1;
// }, [1,2,3]);
// print_r($numbersPlusOne);


// // before callback came , this was how it was done.
// function incrementNumber ($number) {
//   return $number + 1;
// }
// $numbersPlusOne = array_map('incrementNumber', [1,2,3]);
// print_r($numbersPlusOne);


// //Attach State 
// function enclosePerson($name) {
//   return function ($doCommand) use ($name) {
//     return sprintf('%s, %s', $name, $doCommand);
//   };
// }
// // Enclose "Clay" string in closure
// $clay = enclosePerson('Clay');
// // Invoke closure with command
// echo $clay('get me sweet tea!');


//bindTo 
class App 
{
  protected $routes = array();
  protected $responseStatus = '200 Ok';
  protected $responseContentType  = 'text/html';
  protected $responseBody = 'Hello World';

  public function addRoute($routePath, $routeCallback){
    $this->routes[$routePath] = $routeCallback->bindTo($this, __CLASS__);
  }

  public function  dispatch($currentPath)
  {
    foreach($this->routes as $routePath => $callback){
      if($routePath === $currentPath)
      {
        $callback();
      }
    }
    header('HTTP/1.1 ' . $this->responseStatus);
    header('Content-type: ' . $this->responseContentType);
    header('Content-length: ' . mb_strlen($this->responseBody));
    echo $this->responseBody;
  }
}

$app = new App();
$app->addRoute('/users/josh', function () {
  $this->responseContentType = 'application/json;charset=utf8';
  $this->responseBody = '{
                          "name": "Josh", 
                          "sex": "Male",
                          "age" : 20
                        }';
});
$app->dispatch('/users/josh');