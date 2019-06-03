<?php 

class Score  {
    private $minimumLevel;
    public function __construct(int $minimumLevel) {
        if ($minimumLevel <= 0) {
            throw new InvalidArgumentException('Minimum alerting level should be greater than 0');
        }
        $this->minimumLevel = $minimumLevel;
    }
}

$alerting = new Score(-100);