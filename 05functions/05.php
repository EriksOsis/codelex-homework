<?php

$fruits = [
    ["fruit" => "apples",
        "weight" => 12],

    ["fruit" => "oranges",
        "weight" => 15],

    ["fruit" => "pears",
        "weight" => 8],

    ["fruit" => "bananas",
        "weight" => 11],

    ["fruit" => "kiwis",
        "weight" => 5]
];

$shipping = [
    [ "cost" => 2,
    "weights" => "over 11"],

    ["cost" => 0.5,
        "weights" => "under 11"],
];

function fruitWeight($fruits, $shipping): string {
    if ($fruits["weight"] > 10) {
        return $shipping[0]["cost"] . PHP_EOL;
    } else {
        return $shipping[1]["cost"] . PHP_EOL;
    }
}

foreach ($fruits as $item) {
    echo $item["fruit"] . " weigh " . $item["weight"] . " kilograms and shipping costs " . fruitWeight($item, $shipping) . " euros." . PHP_EOL;
}
