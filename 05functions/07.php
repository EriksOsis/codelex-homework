<?php

$person = new stdClass();
$person->name = readline("Enter name: ");
$person->cash = readline("Enter cash: ");
$person->license = ['A', 'C'];

function createWeapon(string $name, string $license, int $price): stdClass {
    $weapon = new stdClass();
    $weapon->name = $name;
    $weapon->license = $license;
    $weapon->price = $price;
    return $weapon;
}

$weapons = [
    createWeapon( 'AK47', 'C', 1000),
    createWeapon('Deagle', 'A', 500),
    createWeapon('Knife',  '',  100),
    createWeapon( 'Glock',  'A',250),
    createWeapon('M4A1',  'C',  100),
];

echo "{$person->name} has {$person->cash}$" . PHP_EOL;

$basket = [];

while (true) {
    echo "[1] Purchase" . PHP_EOL;
    echo "[2] Checkout" . PHP_EOL;
    echo "[Any] Exit" . PHP_EOL;


    $option = (int) readline("Select an option: ");

    switch ($option) {
        Case 1:
            foreach ($weapons as $index => $weapon) {
                echo "[{$index}] {$weapon->name} ({$weapon->license}) {$weapon->price}$" . PHP_EOL;
            }

            $SelectedWeaponIndex = (int) readline('Select weapon: ');


            $weapon = $weapons[$SelectedWeaponIndex] ?? null;

            if ($weapon === null) {
                echo "Weapon not found" . PHP_EOL;
                exit;
            }


            $basket[] = $weapon;

            echo "Added {$weapon->name} to basket." . PHP_EOL;
            break;
        case 2:
            $totalSum = 0;
            foreach ($basket as $weapon) {
                $totalSum += $weapon->price;
                echo "{$weapon->name}" . PHP_EOL;
            }
            echo "___________________" . PHP_EOL;
            echo "Total: $totalSum $" . PHP_EOL;


            if ($person->cash >= $totalSum) {
                echo "Successful payment." . PHP_EOL;
            } else {
                echo "Payment failed. Not enough cash." . PHP_EOL;
            }

            exit;
        default:
            exit;
    }
}