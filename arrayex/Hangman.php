<?php

$words = ['codelex', 'code', 'computer', 'socks', 'latvia', 'gitendorfs', 'mouse', 'game', 'sandris', 'sleep', 'biceps', 'pump', 'protein', 'food'];

shuffle($words);
$word = $words[0];
$letters = str_split($word);

$displayedLetters = [];

foreach ($letters as $letter) {
    $displayedLetters[] = '_';
}

$displayedWord = implode(' ', $displayedLetters);

echo PHP_EOL . " $displayedWord " . PHP_EOL . PHP_EOL;

$wrongs = [];

while (true) {
    if (strpos($displayedWord, '_') === false){
        echo "You guessed the word!" . PHP_EOL;
        break;
    }

    $guess = readline('Guess a letter: ');

    $counter = 0;

    for ($i = 0; $i < count($letters); $i++) {
        if ($guess === $letters[$i]){
            $displayedLetters[$i] = $guess;
            $counter += 1;
        }
        if ($counter === 0) {
            $wrongs = $guess;
        }
        /*echo "Wrongs: " . implode(" ", $wrongs) . PHP_EOL; //vajag help
    */}

    $displayedWord = implode(' ', $displayedLetters);

    echo PHP_EOL . " $displayedWord " . PHP_EOL . PHP_EOL;
}