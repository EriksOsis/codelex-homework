<?php

class Helper
{
    static function read_cli($prompt)
    {
        while (!isset($input)) {
            echo $prompt;
            $input = strtolower(trim(fgets(STDIN)));
        }
        return $input;
    }

}