<?php

$n = 4513;

function getProduct($n) {
    $product = 1;

    while ($n != 0) {
        $product = $product * ( $n % 10);
        $n = intdiv($n , 10);
    }

    return $product;
}

echo getProduct($n);