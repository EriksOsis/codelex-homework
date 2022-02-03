<?php

$employees = [];

$employee1 = new stdClass();
$employee1 -> basePay = 7.50;
$employee1 -> hoursWorked = 35;

$employee2 = new stdClass();
$employee2 -> basePay = 8.20;
$employee2 -> hoursWorked = 47;

$employee3 = new stdClass();
$employee3 -> basePay = 10.00;
$employee3 -> hoursWorked = 73;

$employees[0] = $employee1;
$employees[1] = $employee2;
$employees[2] = $employee3;

function getPayed(int $basePay, int $hoursWorked): string {
    if ($basePay < 8.00 || $hoursWorked > 60) {
        return "Error!" . PHP_EOL;
    } else {
        return ($hoursWorked - 40) * ($basePay * 1.5) + (40 * $basePay) . " Is you salary this month" . PHP_EOL;
    }
}

for ($e = 0; $e < count($employees); $e++) {
    echo getPayed($employees[$e]->basePay, $employees[$e]->hoursWorked);
}