<?php

class Weapon
{
    public string $name;
    public string $power;

    public function __construct(string $name, int $power)
    {
        $this->name = $name;
        $this->power = $power;
    }
}

$x = new Weapon("AK47", 200);
$y = new Weapon("AWP", 450);
$z = new Weapon("Uzi", 100);

class Inventory
{
    public array $inventory = [];

    public function add(Weapon $weapon)
    {
        return $this->inventory[] = $weapon;
    }

    public function print()
    {
        foreach ($this->inventory as $item) {
            foreach ($item as $value) {
                echo $value . " ";
            }
            echo PHP_EOL;
        }
    }
}

$a = new Inventory();
$a->add($x);
$a->add($y);
$a->add($z);
$a->print();

