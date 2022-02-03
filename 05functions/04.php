<?php

/*$persons = [[$person = new stdClass(),
             $person->name = 'John',
             $person->surname = 'Doe',
             $person->age = 50],
            [$person2 = new stdClass(),
             $person2->name = 'Anna',
             $person2->surname = 'Doe',
             $person2->age = 49],
            [$person3 = new stdClass(),
             $person3->name = 'Marrie',
             $person3->surname = 'Doe',
             $person3->age = 9],
            [$person4 = new stdClass(),
             $person4->name = 'Olaf',
             $person4->surname = 'Doe',
             $person4->age = 19]
];

Foreach ($persons as $person){
    Foreach ($person as $p) {
        if ($p->age >= 18) {
            echo "Person is an adult" . PHP_EOL;
        } else {
                echo "Person is underage" . PHP_EOL;
                }
            }
        }

*/
$persons = [];

$person = new stdClass();
$person->name = 'John';
$person->surname = 'Doe';
$person->age = 50;

$person1 = new stdClass();
$person1->name = 'Anna';
$person1->surname = 'Doe';
$person1->age = 48;

$person2 = new stdClass();
$person2->name = 'Marrie';
$person2->surname = 'Doe';
$person2->age = 9;

$person3 = new stdClass();
$person3->name = 'Olaf';
$person3->surname = 'Doe';
$person3->age = 19;

$persons[0] = $person;
$persons[1] = $person1;
$persons[2] = $person2;
$persons[3] = $person3;

for ($p = 0; $p < count($persons); $p++) {
    echo checkAge($persons[$p]->age);
}

function  checkAge(int $age): string {
    if ($age >= 18) {
        return "Person is adult" . PHP_EOL;
    } else {
        return "Person is underage" . PHP_EOL;
    }
}