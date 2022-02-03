<?php

$number = 51;

if ($number < 50) {
    echo "low";
} elseif ($number > 50 && $number < 100) {
    echo "medium";
} elseif ($number > 100) {
    echo "high";
}