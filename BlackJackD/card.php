<?php

class Card
{
    public $key;
    public $value;
    public $suite;

    public function __construct($key, $value, $suite)
    {
        $this->key = $key;
        $this->value = $value;
        $this->suite = $suite;
    }
}