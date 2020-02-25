<?php
/**
 * Example Final visibility
 */
class ExampleSuperClass
{
    public $something;

    final public function getSomething(){
        return $this->something;
    }
}

class ExampleSubClass extends ExampleSuperClass
{
    public function getSomething(){
        return $this->something;
    }
}