<?php

$impMet = readline();
$weight = readline();
$height = readline();

function bodyMassIndex($weight, $height): string {

    $bmi = round($weight * 703/($height * $height) , 1);
    if ($bmi <= 25 && $bmi >= 18) {
        return "$bmi - optimal weight";
    } elseif ($bmi > 25) {
        return "$bmi - overweight";
    } else {
        return "$bmi - underweight";
    }
}

if ($impMet === "imperial") {
    echo bodyMassIndex($weight, $height);
} else if ($impMet === "metric") {
    $weight * 2.2;
    $height * 0.393700787;
    echo bodyMassIndex($weight, $height);
} else {
    echo "imperial or metric?";
}