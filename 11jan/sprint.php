<?php

//definēt spēlētāju skaitu 1-4
//15 elementi
//katrs spēlētājs katrā iterācijā var pakustēties 1, 2, 3 lauciņus
//jānoskaidro uzvarētājs
//loops un iterācija, ka ja 2 sasniedz finishu vienlaicīgi, tad abiem ir 1.vieta un spēle beidzas, kad visi ir beiguši
//izveidot hipodromu
$players = 4;

$winners = [];

$run = array_fill(0, $players, array_fill(0, 15, "-"));

for ($x = 0; $x < $players; $x++) {
    $run[$x][0] = "A";
}

for ($y = 0; $y < 12; $y++) {
    foreach ($run as $index => $see) {
        echo "Player [" . $index . "]";
        foreach ($see as $seeMore) {
            echo " $seeMore";
        }
        echo PHP_EOL;
    }

    sleep(1);
    foreach ($run as $ind => $action) {
        $x = array_search("A", $action);

        if ($x == 14) {
            $winners[$y][] = $ind;
            continue;
        }
        if ($x == 13) {
            $howFarNextMove = $x + 1;
        } else {
            $howFarNextMove = $x + rand(1, 2);
        }
        $run[$ind][$howFarNextMove] = "A";
        $run[$ind][$x] = "-";
    }
}

foreach ($winners as $ind => $podium) {
    foreach ($podium as $all) {
        if ($ind == 0) {
            echo "pirmā vieta =  $all" . PHP_EOL;
        }
        if ($ind == 1) {
            echo "otrā vieta = $all" . PHP_EOL;
        }
        if ($ind == 2) {
            echo "trešā vieta = $all" . PHP_EOL;
        }
    }
}

var_dump($winners);