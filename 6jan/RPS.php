<?php

$selections = ['rock', 'paper', 'scissors', 'lizard', 'spock'];

$player = readline("Choose a weapon: ");
$computer= $selections[array_rand($selections)];

echo "$player VS $computer";
echo PHP_EOL;

if($player === $computer) {
    echo "Draw" . PHP_EOL;
    exit;
}

$combinations = [
    'rock' => ['scissors', 'lizard'],
    'scissors' => ['paper', 'lizard'],
    'paper' => ['rock', 'spock'],
    'lizard' => ['spock', 'paper'],
    'spock' => ['scissors', 'spock']
];

if ($combinations[$player] == $computer) {
    echo 'Player wins' .PHP_EOL;
} else {
    echo 'Computer wins';
}
