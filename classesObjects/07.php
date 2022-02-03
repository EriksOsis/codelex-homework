<?php

class Dog
{
    public string $name;
    public string $sex;
    public string $mother;
    public string $father;

    public function __construct(string $name, string $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }

    public function fathersName(string $father): string
    {
        if ($father == null) {
            return "Unknown";
        } else return $this->father = $father;
    }

    public function hasSameMother($mother): string
    {
        if ($this->getMother() == $mother->getMother()) {
            return "true";
        } else return 'false';
    }
}

class DogTest extends Dog
{
    public function printDog(): string
    {
        return $this->name . " " . $this->sex;
    }

    public function setMother(string $mother): void
    {
        $this->mother = $mother;
    }

    public function getMother(): string
    {
        return $this->mother;
    }
}

$max = new DogTest('Max', 'Male');
$rocky = new DogTest('Rocky', 'Male');
$sparky = new DogTest('Sparky', 'Male');
$buster = new DogTest('Buster', 'Male');
$sam = new DogTest('Sam', 'Male');
$lady = new DogTest('Lady', 'Female');
$molly = new DogTest('Molly', 'Female');
$coco = new DogTest('Coco', 'Female');

$max->setMother('Lady');
$coco->setMother('Molly');
$rocky->setMother('Molly');
$buster->setMother('Lady');
$sparky->setMother('');
$sam->setMother('');
$lady->setMother('');
$molly->setMother('');

echo $max->printDog()." ".$max->getMother()." ".$max->fathersName('Rocky')." ".$max->hasSameMother($coco).PHP_EOL;
