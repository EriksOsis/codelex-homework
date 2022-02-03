<?php

class Animal
{
    protected static int $number = 10;

    private static function additionalNumber(): int
    {
        return 200;
    }
}

class Ape extends Animal
{
    public static function number(): int{
        return parent::$number + parent::additionalNumber();
    }
}

echo Ape::number();