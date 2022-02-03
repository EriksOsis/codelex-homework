<?php


$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;
$purchased_number_total = 0;
$prefer_citrus_drinks_total = 0;

function calculate_energy_drinkers(int $surveyed, float $purchased_energy_drinks, int $purchased_number_total)
{
    $purchased_number_total += $surveyed * $purchased_energy_drinks;
    //throw new LogicException(";(");
    return round($purchased_number_total);
}

function calculate_prefer_citrus(int $surveyed, float $purchased_energy_drinks, int $prefer_citrus_drinks_total, float $prefer_citrus_drinks)
{
    $prefer_citrus_drinks_total += ($surveyed * $purchased_energy_drinks) * $prefer_citrus_drinks;
    //throw new LogicException(";(");
    return round($prefer_citrus_drinks_total);
}


echo "Total number of people surveyed " . $surveyed . PHP_EOL;
echo "Approximately " . calculate_energy_drinkers(12467, 0.14, 0) . " bought at least one energy drink" . PHP_EOL;
echo calculate_prefer_citrus(12467, 0.14, 0, 0.64) . " of those prefer citrus flavored energy drinks." . PHP_EOL;
