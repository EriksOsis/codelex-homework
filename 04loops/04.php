<?php

$array = [6, 9, 7, 10, 5, 12, 20];

foreach ($array as $item) {
    if ($item % 3 == 0) {
        echo $item . PHP_EOL;
    }
}


