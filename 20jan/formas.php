<?php

abstract class Figure
{
    private string $name;

    protected function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name . "`s area is: ";
    }
}

class Circle extends Figure
{
    private string $radius;

    public function __construct(string $name, string $radius)
    {
        parent::__construct($name);
        $this->radius = $radius;
    }

    public function getArea(): int
    {
        return M_PI * $this->radius * 2;
    }
}


class Triangle extends Figure
{
    private int $base;
    private int $height;

    public function __construct(string $name, int $base, int $height)
    {
        parent::__construct($name);
        $this->base = $base;
        $this->height = $height;
    }

    public function getArea(): int
    {
        return .5 * $this->base * $this->height;

    }
}

class Square extends Figure
{
    private int $side1;
    private int $side2;

    public function __construct(string $name, int $side1, int $side2)
    {
        parent::__construct($name);
        $this->side1 = $side1;
        $this->side2 = $side2;
    }

    public function getArea(): int
    {
        return $this->side1 * $this->side2;
    }
}

/*class All
{
    private array $list = [];

    public function addToList(Figure $circle, $triangle, $square)
    {
        $this->list[] = $circle;
        $this->list[] = $triangle;
        $this->list[] = $square;
    }

    public function getList(): array
    {
        return $this->list;
    }
}
*/
//$all = new All();
//$all->addToList($circle, $triangle, $square);
//print_r($all->getList());

class Calculator
{
    public array $figures = [];

    public function add(int $figure)
    {
        $this->figures[] = $figure;
    }

    public function calcArea(): int
    {
        $zero = 0;

        foreach ($this->figures as $figure) {
            $zero += $figure->getArea();
        }
        return $zero;
    }
}

$allAreas = new Calculator();

echo "The sum of all areas is: " . $allAreas->calcArea() . PHP_EOL;

echo "Choose which figures area would you like to calculate: " . PHP_EOL;
echo "[1] Circle" . PHP_EOL;
echo "[2] Triangle" . PHP_EOL;
echo "[3] Square" . PHP_EOL;
echo "[4] Calculate all areas" . PHP_EOL;
$option = readline("Select: ");

switch ($option) {
    case 1:
        $askRadius = readline("What is the radius of the circle: ");
        $circle = new Circle("Circle", "{$askRadius}");
        echo "Area of circle is: " . $circle->getArea() . PHP_EOL;
        $allAreas->add($circle->getArea());
        break;
    case 2:
        $askBase = readline("What is the base of the triangle: ");
        $askHeight = readline("What is the height of the triangle: ");
        $triangle = new Triangle("Triangle", "{$askBase}", "{$askHeight}");
        echo "Area of triangle is: " . $triangle->getArea() . PHP_EOL;
        $allAreas->add($triangle->getArea());
        break;
    case 3:
        $askSide1 = readline("What is 1st side of the square: ");
        $askSide2 = readline("What is 2nd side of the square: ");
        $square = new Square("Square", "{$askSide1}", "{$askSide2}");
        echo "Area of square is: " . $square->getArea() . PHP_EOL;
        $allAreas->add($square->getArea());
        break;
    case 4:
        foreach ($allAreas as $item) {
            foreach ($item as $shape) {
               $sum = +$item->getArea();
            }
        }
        echo $sum;
        break;
}

//izveidot izvēli, izveidot formu, ierakstīt parametrus, ievietot formu, aizpilda nepieciešamo info, kas tiek
//pieglabāta lielajā objektā......opcija pievienot saskaitīt, ievietot info un tad izdrukājās aprēķins
//jauna opcija vēlos pievienot vai aprēķināt visu