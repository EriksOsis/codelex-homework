<?php

class Person
{
    public static string $name = "Jānis";

    public static function setName()
    {
        self::$name = $name;
    }

    public static function hello(): string
    {
        return "world";
    }

    public static function name(): string
    {
        return self::$name;
    }
}

//echo Person::name();
$a = new Person;
$b = new Person;

echo $a::name();
$a::setName("Ilze");
echo $b::name();

var_dump($a instanceof Person);

//statiskām lieto neizmanto konstruktoru
//STSTISKS NOZĪMĒ VIENS