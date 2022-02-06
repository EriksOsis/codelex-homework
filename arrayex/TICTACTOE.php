<?php

$board = [
    ['-', '-', '-'],
    ['-', '-', '-'],
    ['-', '-', '-'],
];

$player1 = readline("Enter player 1: ");
$player2 = readline("Enter player 2: ");

$activePlayer = $player1;

$combinations = [
    [
        [0, 0], [0, 1], [0, 2],
    ],
    [
        [1, 0], [1, 1], [1, 2]
    ],
    [
        [2, 0], [2, 1], [2, 2]
    ],
    [
        [0, 0], [1, 1], [2, 2]
    ],
    [
        [0, 2], [1, 2], [2, 2],
    ],
    [
        [0, 1], [1, 1], [2, 1]
    ],
    [
        [0, 0], [0, 1], [0, 2]
    ],
    [
        [2, 0], [1, 1], [0, 2]
    ]
];

function winnerWinnerChickenDinner(array $combinations, array $board, string $activePlayer): bool
{
    foreach ($combinations as $combination) {
        foreach ($combination as $item) {
            [$row, $column] = $item;
            if ($board[$row][$column] !== $activePlayer) {
                break;
            }

            if (end($combination) === $item) {
                return true;
            }
        }
    }

    return false;
}

function isBoardFull(array $board): bool
{
    foreach ($board as $row) {
        if (in_array('-', $row)) return false;
    }
    return true;
}

function drawBoard(array $board): void
{
    foreach ($board as $item) {
        foreach ($item as $value) {
            echo "  $value  ";
        }
        echo PHP_EOL;
    }
}

// X
// $board[0][0] = X
while (!isBoardFull($board) && !winnerWinnerChickenDinner($combinations, $board, $activePlayer)) {
    drawBoard($board);
    $position = readline("Enter position ({$activePlayer}): ");
    [$row, $column] = explode(', ', $position);

    if ($board[$row][$column] !== '-') {
        echo 'Invalid position. its taken!' . PHP_EOL;
        continue;
    }

    $board[$row][$column] = $activePlayer;

    if (winnerWinnerChickenDinner($combinations, $board, $activePlayer)) {
        echo 'Winner is ' . $activePlayer;
        echo PHP_EOL;
        exit;
    }

    $activePlayer = $player1 === $activePlayer ? $player2 : $player1;
}

echo 'The game was tied.';
echo PHP_EOL;