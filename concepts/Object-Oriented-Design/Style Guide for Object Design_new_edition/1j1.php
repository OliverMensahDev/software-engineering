<?php 
class Alerting{
    private $minimumLevel;
    
    public function __construct(int $minimumLevel){
        $this->minimumLevel = $minimumLevel;
    }
}