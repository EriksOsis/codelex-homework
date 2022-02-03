<?php

echo "Geometry Calculator\n";
echo "1. Calculate the Area of a Circle\n";
echo "2. Calculate the Area of a Rectangle\n";
echo "3. Calculate the Area of a Triangle\n";
echo "4. Quit\n";
echo "Enter your choice (1-4) : ";

$choice = readline();
if($choice < 1 || $choice > 4) {
    echo "1-4 only";
} elseif ($choice == 1) {
    echo geometryClass:: circle(1);
} elseif ($choice == 2) {
    echo geometryClass:: rectangle(6, 10);
} elseif ($choice == 3) {
    echo geometryClass:: triangle(7, 15);
} elseif ($choice == 4) {
    exit;
}

class geometryClass {
    public static function circle($radius) {
        if ($radius > 0) {
            return pi() * ($radius * $radius);
        } else {
            return "number must be positive!";
        }
    }
    public static function rectangle($length, $width) {
        if ($length > 0 && $width > 0) {
            return $length *$width;
        } else {
            return "number must be positive";
        }
    }
    public static function triangle($base, $tHeight) {
        if ($base > 0 && $tHeight > 0) {
            return $base * $tHeight * 0.5;
        } else {
            return "numbers must be positive";
        }
    }
}


/*function circle(int $circle) {
    $radius = readline("Enter radius of a circle: ");
    return $circle = pi() * $radius * 2;
}
function rectangle(int $length, int $width) {
    $length = readline("Enter length of a rectangle: ");
    $width = readline("Enter width of a rectangle: ");
    return $length * $width;
}
function triangle(int $triangle) {
    $base = readline("Enter length of a triangle`s base: ");
    $height = readline("Enter length of a triangle`s height: ");
    return $base * $height * 0.5;
}
function quit(string) {
    exit();
}
*/
