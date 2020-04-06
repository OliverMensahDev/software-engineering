<?php 

final class Line
{
    private $isDotted;
    private $distanceBetweenDots;
    public static function dotted(int $distanceBetweenDots): Line
    {
        if ($distanceBetweenDots <= 0) {
            throw new InvalidArgumentException(
                'Expect the distance between dots to be positive.'
            );
        }
        $line = new Line();
        $line->distanceBetweenDots = $distanceBetweenDots;
        $line->isDotted = true;
        return $line;
    }

    public static function solid(): Line
    {
        // No need to worry about `$distanceBetweenLines` here!
        $line = new self();
        $line->isDotted = false;
        return $line;
    }

    public function getType(){
      return $this->isDotted ? "Dotted Line": "Solid Line";
    }
}

$line =  Line::dotted(5);
echo $line->getType();

$line = Line::solid();
echo $line->getType();