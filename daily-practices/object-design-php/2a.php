<?php
final class Position
{
    private $x;
    private $y;
    public function __construct()
    { }
    public function setX(int $x): void
    {
        $this->x = $x;
    }
    public function setY(int $y): void
    {
        $this->y = $y;
    }
    public function distanceTo(Position $other): float
    {
        return sqrt(
            ($other->x - $this->x) ** 2 +
            ($other->y - $this->y) ** 2
        );
    }
}
$a = new Position();
// $a->setX(45);
// $a->setY(60);

$b = new Position();
// $b->setX(60);
// $b->setY(80);
echo $a->distanceTo($b);


///set constructor and remove settors
// public function __construct(int $x, int $y)
// {
// $this->x = $x;
// $this->y = $y;
// }