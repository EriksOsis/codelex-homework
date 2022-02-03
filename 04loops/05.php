<?php

$draudzini = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50,
            "birthday" => "12.June"
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41,
            "birthday" => "28.May"
        ],
        [
            "name" => "Olaf",
            "surname" => "Oak",
            "age" => 19,
            "birthday" => "19.June"
        ],
        [
            "name" => "Daniela",
            "surname" => "Putane",
            "age" => 21,
            "birthday" => "10.May"
        ],
        [
            "name" => "Eriks",
            "surname" => "Osis",
            "age" => 19,
            "birthday" => "29.April"
        ]
    ]
];

foreach ($draudzini as $item) {
    foreach ($item as $data => $draudzins) {
        print_r($draudzins) . PHP_EOL;
    }
}