<?php

function program($x, $y): bool
{
    return $x == 15 || $y == 15 || $x + $y == 15 || abs($x - $y) == 15;
}

var_dump(program(15, 9));
var_dump(program(10, 5));
var_dump(program(1, 4));