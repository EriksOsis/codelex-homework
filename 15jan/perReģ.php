<?php

//personu reģistrs, kur ir vārds uzvārs personas kods, jāspēj objektorientētā veidā paprasīt reģistru
//vai nu pievienot vai redzēt reģistru


class Person
{

    public string $name;
    public string $surname;
    public string $code;

    public function __construct(string $name, string $surname, string $code)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->code = $code;
    }
}

class Register
{
    public array $list = [];

    public function addToList(Person $person)
    {
        $this->list[] = $person;
    }

    public function getList(): array
    {
        return $this->list;
    }
}

$register = new Register();

while (true) {
    echo "1. Add new person." . PHP_EOL;
    echo "2. Check the list." . PHP_EOL;

    $option = (int)readline("Your input: ");

    if ($option == 1) {
        $name = readline("Enter name: ");
        $surname = readline("Enter surname: ");
        $code = readline("Enter code: ");
        $person = new Person($name, $surname, $code);
        //$register = new Register();
        $register->addToList($person);
    }
    elseif ($option == 2) {
        print_r($register->getList());
    }
    else {
        echo "Must choose from the options below: " . PHP_EOL;
    }
}
