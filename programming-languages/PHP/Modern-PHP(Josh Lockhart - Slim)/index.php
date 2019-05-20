<?php 
/**
 * features
 */
include "features/namespaces/1-declaration.php";
include "features/namespaces/2-function.php";
include "features/namespaces/3-constant.php";
include "features/namespaces/4-global.php";

 // namespaces 1 without alias
 $app = new \OliverVendor\features\namespaces\MyApp();
 echo $app->doSomething();

 //namespace 2 with alias
 use OliverVendor\features\namespaces\MyApp;
 $app = new MyApp();
 echo $app->doSomething();

  //namespace 3 with custom alias
  use OliverVendor\features\namespaces\MyApp as App;
  $app = new App();
  echo $app->doSomething();

  //function  - does not work here for me
  // use func OliverVendor\features\namespaces\eat;
  // eat();

  //constant does not work here for me
  // use constant OliverVendor\features\namespaces\ONE;
  // echo ONE;

  //global 
  use OliverVendor\features\namespaces\Foo;
  $foo = new Foo();
  echo $foo->doSomething();




