<?php

class Lights
{
    private int $power = 100;
    private string $name;

    public function __construct(string $name, int $power = 100)
    {
        $this->name = $name;
        $this->power = $power;
    }

    public function lowerPower(int $percent): void
    {
        $this->power -= $percent;
    }

    public function getPower(): int
    {
        return $this->power;
    }
}