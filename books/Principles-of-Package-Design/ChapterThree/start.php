<?php 
class ConcreteClass
{
  public function implementedMethod()
  {

  }
}

abstract class AbstractClass
{
  abstract public function abstractMethod();

  public function implementedMethod()
  {

  }
}

interface AnInterface
{
  public function abstractMethod();
}