<?php

/*class Symbols
{
    public string $symbol;

    public function __construct(string $symbol)
    {
        $this->symbol = $symbol;
    }
}

$symbolA = new Symbols("A");
$symbolB = new Symbols("B");
$symbolC = new Symbols("C");
$symbolD = new Symbols("D");*/

class Board
{
    public array $board = [];

    public function displayBoard(array $board): void
    {
        foreach ($board as $value) {
            foreach ($value as $item)
                echo "$item ";
            echo PHP_EOL;
        }
    }
}
// todo array_fill(0, $boardRowSize, array_fill(0, $boardColumnSize, '-'))
/*function display_board(array $board): void
{
    foreach ($board as $value) {
        foreach ($value as $item)
            echo "$item ";
        echo PHP_EOL;
    }
}*/

/*$chanceToWinAmount =
    [
        "A" => 5,
        "B" => 10,
        "C" => 20,
    ];*/

/*$combinations = [
    [0, 0, 0],
    [1, 1, 1],
    [2, 2, 2],
    [0, 1, 2],
    [2, 1, 0]
];*/

/*function checkWinnerCombinationOptions(array $combinations, array $board): array
{
    $combinationBoard = [];
    foreach ($combinations as $index => $combination) {


        foreach ($combination as $i => $item) {
            [$row, $column] = $item;
            $combinationBoard[$index][$i] = $board[$row][$column];
        }
    }
    $winnerOptions = [];
    foreach ($combinationBoard as $combination) {
        if ((count(array_unique($combination)) === 1)) {
            $winnerOptions[] = $combination[0];
        }
    }
    return $winnerOptions;
}*/

/*function calculateWinningAmount(array $weHaveWinnerLines, array $chanceToWinAmount, int $spinCoast): int
{
    $wonAmount = 0;
    foreach ($weHaveWinnerLines as $item) {
        switch ($item) {
            case "A":
                $wonAmount += $chanceToWinAmount["A"] * $spinCoast;
                break;
            case "B":
                $wonAmount += $chanceToWinAmount["B"] * $spinCoast;
                break;
            case "C":
                $wonAmount += $chanceToWinAmount["C"] * $spinCoast;
                break;
            default:
                break;
        }
    }
    return $wonAmount;
}*/

/*while (true) {
    echo "You have {$moneyOnHand} $" . PHP_EOL;
    echo "[1] Play the slot machine" . PHP_EOL;
    echo "[2] Change spin cost" . PHP_EOL;
    echo "[3] Exit" . PHP_EOL;
    $playerChoice = readline();

    switch ($playerChoice) {

        case 1:

            if ($spinCoast <= $moneyOnHand) {
                foreach ($board as $rowIndex => $item) {
                    foreach ($item as $columnIndex => $value) {
                        $board[$rowIndex][$columnIndex] = $options[array_rand($options)];
                    }
                }

                display_board($board);
                $moneyOnHand -= $spinCoast;

                $weHaveWinnerLines = checkWinnerCombinationOptions($combinations, $board);


                if (sizeof($weHaveWinnerLines) > 0) {
                    $playerWonAmount = calculateWinningAmount($weHaveWinnerLines, $chanceToWinAmount, $spinCoast);
                    $moneyOnHand += $playerWonAmount;
                    echo "You won {$playerWonAmount} $" . PHP_EOL;
                } else {
                    echo "You did not have any combinations" . PHP_EOL;
                }
            } else {
                echo "You do not have that much money, if You want you can change spin cost or exit" . PHP_EOL;
            }
            break;
        case 2:
            echo "You have {$moneyOnHand} $" . PHP_EOL;
            $chanceToChangeSpinCost = readline("Enter your chosen spin cost (multiplier)");
            if ($chanceToChangeSpinCost <= $moneyOnHand) {
                $spinCoast = $chanceToChangeSpinCost;
                echo "Your spin cost is changed to {$spinCoast}" . PHP_EOL;
            } else {
                echo "Sorry, you don`t have that much money" . PHP_EOL;
            }

            break;
        default:
            echo "Thank you for playing. Exiting" . PHP_EOL;
            break;
    }
}*/