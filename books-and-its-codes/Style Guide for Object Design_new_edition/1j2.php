<?php 
class Alerting{
    private $minimumLevel;
    
    public function __construct(int $minimumLevel){
        if($minimumLevel <= 0){
            throw new InvalidArgumentException("Min");
        }
        $this->minimumLevel = $minimumLevel;
    }
}
