<?php


class Car
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

$bmw = new Car("BMW");
$tesla = new Car("Tesla");
$lambo = new Car("Lambo");

class Salon
{
    public array $salon = [];
    public array $reserved = [];

    public function add(Car $car)
    {
        return $this->salon[] = $car;
    }

    public function print()
    {
        foreach ($this->salon as $key => $value) {
            echo $key . " ";
            foreach ($value as $item) {
                echo $item . " ";
            }
            echo PHP_EOL;
        }
    }

    public function reserve()
    {
        $which = readline("Which car would you like to take: ");
        $this->reserved[] = $this->salon[$which];
        unset($this->salon[$which]);

        echo "Available cars: " . PHP_EOL;
    }
}

$a = new Salon();
$a->add($bmw);
$a->add($tesla);
$a->add($lambo);

while ($a->salon) {
    $a->print();
    $a->reserve();
}