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
}
$student= Student::create()->setFirstName("John")->setLastName("Doe");

//2 func_get_args
class myClass {
  public function __construct() {
      $get_arguments       = func_get_args();
      $number_of_arguments = func_num_args();

      if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
          call_user_func_array(array($this, $method_name), $get_arguments);
      }
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
$object1 = new myClass('BUET');
$object2 = new myClass('BUET', 'is');
$object3 = new myClass('BUET', 'is', 'Best.');


//3 
class Student
{
    public function __construct() {
        // allocate your stuff
    }

    public static function withID( $id ) {
        $instance = new self();
        $instance->loadByID( $id );
        return $instance;
    }

    public static function withRow( array $row ) {
        $instance = new self();
        $instance->fill( $row );
        return $instance;
    }

    protected function loadByID( $id ) {
        // do query
        // $row = my_awesome_db_access_stuff( $id );
        $this->fill( [] );
    }

    protected function fill( array $row ) {
        // fill all properties from array
    }
}

