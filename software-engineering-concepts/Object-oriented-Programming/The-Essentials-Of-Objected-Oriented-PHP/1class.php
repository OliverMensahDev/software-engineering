<?php 
class Car 
{
  public $com;
  public $numWheels = 4;
  public $hasSunRoof = true;
  public $color = "beige";


  public function hello() 
  {
    return "Beep I am a <i> ". $this->comp . " <i> and I am ". $this->color;
  }
}