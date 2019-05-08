<?php 
final class Line{
  private $isDottedLine;
  private $isSolidLine;
  public function __construct(bool $isDotted = false, int $distanceBetweenDots = 0) {
    /*
    * We only care about the distance if the line is a
    * dotted line. For solid lines, there's no distance to
    * be dealt with.
    */
    if ($isDotted && $distanceBetweenDots <= 0) {
      throw new InvalidArgumentException('Expect the distance between dots to be positive.');
    }else if($isDotted && $distanceBetweenDots > 0) {
      $this->isDottedLine = true;
    }else{
      $this->isSolidLine = true;
    }
  }

  public function getLineType(){
    if($this->isDottedLine) return 'Dotted Line';
    else return "Solid Line";
  }
}

$line = new Line();
echo $line->getLineType();

$line = new Line(true, 4);
echo $line->getLineType();

