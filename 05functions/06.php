<?php

$array = [1, 4, 8, "Ēriks", 10.12];

$a = count($array);

for ($i = 0; $i < $a; $i++)  {
    echo doubleInt($array[$i]) .PHP_EOL;
}

function doubleInt($array) {
    if (is_int($array)) {
        return $array * 2;
    } else {
        return "error: not and integer" . PHP_EOL;
    }
}
