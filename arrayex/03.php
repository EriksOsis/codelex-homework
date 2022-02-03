<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

//echo "Enter the value to search for: ";

//todo check if an array contains a value user entered

$a = readline("Enter the value to search for: ");

if (in_array($a, $numbers)) {
    echo 'Value IS in this array!';
} else {
    echo 'Value is NOT in this array.';
}
