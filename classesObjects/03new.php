<?php

class Accumulator
{

}


require_once 'tire.php';
require_once 'fuelGauge.php';
require_once 'lights.php';
require_once 'odometer.php';
require_once 'car.php';

$name = readline('Car name: ');
$fuelGaugeAmount = (int)readline('Fuel Gauge amount: ');
$driveDistance = (int)readline('Drive distance: ');

$car = new Car($name, $fuelGaugeAmount);

echo "------ " . $car->getName() . " ------";
echo PHP_EOL;

while ($car->getFuel() > 0 || $car->hasValidTires() || $car->hasValidLights()) {
    echo "Fuel: " . $car->getFuel() . "l" . PHP_EOL;
    echo "Mileage: " . $car->getMileage() . "km" . PHP_EOL;

    foreach ($car->getTires() as $tire) {
        echo "Tire ({$tire->getName()}): " . $tire->getCondition() . "%" . PHP_EOL;

    }

    foreach ($car->getLights() as $light) {
        echo "{$light->getName()}: " . $light->getPower() . "%" . PHP_EOL;

    }

    $car->drive($driveDistance);

    sleep(1);
}