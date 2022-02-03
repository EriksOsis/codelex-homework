<?php

class Point
{
    public int $x;
    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function swapPoints(Point &$point1, Point &$point2)
    {
        $temporary = $point1;
        $point1 = $point2;
        $point2 = $temporary;
    }

    public function returnX()
    {
        return $this->x;
    }

    public function returnY()
    {
        return $this->y;
    }
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

$p1->swapPoints($p1, $p2);

echo "(" . $p1->returnX() . ", " . $p1->returnY() . ")" . PHP_EOL;
echo "(" . $p2->returnX() . ", " . $p2->returnY() . ")" . PHP_EOL;