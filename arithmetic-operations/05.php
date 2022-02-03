<?php

$number = readline("Guess: ");
$randomNumber = rand(1, 100);

if ($number > $randomNumber) {
    echo "too high";
}
if ($number < $randomNumber) {
    echo "too low";
}
if ($number == $randomNumber) {
    "Correct!";
}