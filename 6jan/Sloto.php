<?php
$symbols = ["A", "B", "C"];

$rows = ["-", "-", "-"];

$columns = 3;

$combinations = [
    [0, 0, 0],
    [1, 1, 1],
    [2, 2, 2],
    [0, 1, 2],
    [2, 1, 0]
];

$board = [];

for ($i = 0; $i < $columns; $i++) {
    array_push($board, $rows);
}

$balance = readline("Enter balance: ");

function spin(array $board, array $symbols, array $columnsCount): array
{
    $fields = count($columnsCount);
    $row = [];
    $column = [];
    foreach ($board as $spot) {
        for ($i = 0; $i < count($spot); $i++) {
            $spot[$i] = $symbols[array_rand($symbols)];
            array_push($row, $spot[$i]);
        }
    }
    $showBoard = array_chunk($row, $fields);
    return $showBoard;
}

function displayBoard(array $board, array $field): void
{
    $count = count($field);
    foreach ($board as $field) {
        for ($i = 0; $i < $count; $i++) {
            echo "  $field[$i]  ";
        }
        echo PHP_EOL;
    }
}

function slotMachine(array $combinations, array $board, array $symbols, int $cost): int
{
    $sum = 0;

    for ($i = 0; $i < count($symbols); $i++) {
        $letter = $symbols[$i];

        foreach ($combinations as $combination) {
            foreach ($combination as $index => $item) {
               // [$index, $column] = $item;

                if ($board[$index][$item] !== $letter) {
                    break;
                }
                if (end($combination) === $item) {
                    $multiplier = array_search($letter, $symbols) + 2;
                    echo "Multiplier: $multiplier" . PHP_EOL;
                    $sum += $multiplier * $cost;
                    echo "+ " . $sum . PHP_EOL;
                }
            }
        }
    }
    return $sum;

}

while (true) {
    $spinCost = readline("Enter spin cost: ");

    if ($balance > $spinCost) {
        while ($balance > $spinCost) {
            echo "[1] Test your luck?" . PHP_EOL;
            echo "[2] Go home..." . PHP_EOL;
            $choice = readline();

            switch ($choice) {
                case 1:
                    $balance -= $spinCost;
                    echo $balance . PHP_EOL;
                    $board = spin($board, $symbols, $rows);
                    displayBoard($board, $rows);
                    $balance += slotMachine($combinations, $board, $symbols, $spinCost);
                    echo $balance;
                    echo PHP_EOL;
                    break;
                case 2:
                    exit;
            }
        }
    }
}