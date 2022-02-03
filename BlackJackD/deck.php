<?php

class Deck
{
    public array $cards = [];


    function __construct()
    {
        $suites = ['Spade', 'Club', 'Diamond', 'Heart'];
        $numbers = [
            'A' => 1,  '2' => 2,  '3' => 3,
            '4' => 4,  '5' => 5,  '6' => 6,
            '7' => 7,  '8' => 8,  '9' => 9,
            '10' => 10, 'J' => 11, 'Q' => 12,
            'K' => 13
        ];

        foreach ($suites as $suite) {
            foreach ($numbers as $key => $number) {
                array_push($this->cards, new Card($key , $number, $suite));
            }
        }

        $this->shuffle();


    }

    public function getCards()
    {
        return $this->cards;
    }


    public function popCards()
    {
        return array_pop($this->cards);
    }

    private function shuffle()
    {
        shuffle($this->cards);

        $this->burnTop();

    }

    private function burnTop()
    {
        array_shift($this->cards);
    }

}