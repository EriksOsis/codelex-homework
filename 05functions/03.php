<?php

$person = new stdClass();
$person->name = "John";
$person->surname = "Doe";
$person->age = 50;

function  checkAge(int $age): string {
    if ($age >= 18) {
        return "Person is adult";
    } else {
        return "Person is underage";
    }
}

echo checkAge($person->age);

//kaut kas nav pareizi