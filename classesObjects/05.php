<?php

class Date
{
    private string $day;
    private string $month;
    private string $year;

    public function __construct(string $day, string $month, string $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    public function displayDate()
    {
        return $this->day . "/" . $this->month . "/" . $this->year;
    }
}

$birthday = new Date("29", "april", "2002");
$nameDay = new Date("18", "may", "2022");
$loveDay = new Date("27", "november", "2021");

echo $birthday->displayDate() . PHP_EOL;
echo $nameDay->displayDate() . PHP_EOL;
echo $loveDay->displayDate() . PHP_EOL;
