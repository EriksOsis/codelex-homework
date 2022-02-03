<?php

abstract class Fruit
{
    private string $name;
    private string $color;

    public function __construct(string $name, string $color)
{
    $this->name = $name;
    $this->color = $color;
}

    public function getName(): string
    {
        return $this->name;
    }

    public function size(): int
    {
        return 10 * 5 / 4 + $this->base();
    }

    protected function base(): int
    {
        return 10;
    }
}

class Citrus extends Fruit
{
    protected function base(): int
    {
        return 20;
    }

    public function size(): int
    {
        return 20 * 2 + $this->base();
    }

    public function getName(): string
    {
        $name = parent::getName();
        return "CITRUS: " . $name;
    }
}

class Berries extends Fruit {

}

$apple = new Fruit("Apple", "red");
$orange = new Citrus("Orange", "Orange");

echo $apple->getName() . "size" . $apple->size() . PHP_EOL;
echo $orange->getName() . "size" . $orange->size() . " Color: " . $orange->getColor() . PHP_EOL;

//ja klase ir abstract, tad klase ir domāta tikai mantošanai