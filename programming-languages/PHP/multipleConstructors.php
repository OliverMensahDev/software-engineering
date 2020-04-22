<?php
//Fluent Approach
class Student
{

    protected $firstName;
    protected $lastName;
    public function __construct() {
        // allocate your stuff
    }
    /**
     * Static constructor / factory
     */
    public static function create() {
        $instance = new self();
        return $instance;
    }
    public function setFirstName( $firstName) {
        $this->firstName = $firstName;
        return $this;
    }
    public function setLastName( $lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    public function getName()
    {
        echo $this->firstName . " ". $this->lastName . "\n";
    }
}
$student= Student::create()->setFirstName("John")->setLastName("Doe");
$student->getName();

//2 func_get_args
class myClass {
  public function __construct() {
      $get_arguments       = func_get_args();
      $number_of_arguments = func_num_args();

      if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
          call_user_func_array(array($this, $method_name), $get_arguments);
      }
      echo "constructor with no parameter \n";

  }

  public function __construct1($argument1) {
      echo 'constructor with 1 parameter ' . $argument1 . "\n";
  }

  public function __construct2($argument1, $argument2) {
      echo 'constructor with 2 parameter ' . $argument1 . ' ' . $argument2 . "\n";
  }

  public function __construct3($argument1, $argument2, $argument3) {
      echo 'constructor with 3 parameter ' . $argument1 . ' ' . $argument2 . ' ' . $argument3 . "\n";
  }
}
$object = new myClass();
$object1 = new myClass('BUET');
$object2 = new myClass('BUET', 'is');
$object3 = new myClass('BUET', 'is', 'Best.');

