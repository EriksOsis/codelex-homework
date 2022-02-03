<?php

class Game
{
    private $playerCount = 1;
    private $player = [];
    private $dealer;
    private $deck;
    private $dealerString = '';
    private $dealerFlag = false;
    private $playerFlag = false;
    const INIT_CARDS_COUNT = 2;
    const MAX_ALLOWED_POINT = 21;

    public function __construct(Deck $deck, Dealer $dealer)
    {
        $this->dealer = $dealer;
        $this->deck = $deck;
    }


    public function run()
    {
        $this->playerCount = Helper::read_cli('Press 1 to play: ');

        for ($initCardCounter = 0; $initCardCounter < self::INIT_CARDS_COUNT; $initCardCounter++) {
            for ($playerCounter = 0; $playerCounter < $this->playerCount; $playerCounter++) {

                if ($initCardCounter == 0) {
                    $this->player[$playerCounter] = new Player;
                }
                $this->player[$playerCounter]->currentCards[] = $this->deck->popCards();
            }

            $dealerValue[] = $this->dealer->currentCards[] = $this->deck->popCards();

            if ($initCardCounter == 0) {
                $this->dealerString = " ? - ";
            } elseif ($initCardCounter == 1) {
                $this->dealerString .= $dealerValue[$initCardCounter]->suite . ' ' . $dealerValue[$initCardCounter]->value;
            }

        }

        foreach ($this->player as $playerKey => $playerValue) {
            do {

                if (count($this->deck->cards) == 0) {
                    $this->deck = new Deck;
                }

                $this->playerFlag = $this->player[$playerKey]->hitOrStand($this->deck, $this->dealer, $playerKey,
                    $playerValue, $this->dealerString);
                if (!$this->playerFlag) {
                    break;
                }
            } while ($this->playerFlag);
        }


        do {
            $this->dealerFlag = $this->dealer->hitOrStand($this->deck, $this->dealer);
            if (!$this->dealerFlag) {
                break;
            }
        } while ($this->dealerFlag);


        list($dealerSum, $this->dealerString) = $this->dealer->scoreSum($this->dealer);
        foreach ($this->player as $playerKey => $playerValue) {

            echo $this->winner($playerKey);
        }
    }

    public function winner($playerKey)
    {

        list($playerSum, $playerString) = $this->player[$playerKey]->scoreSum($this->player[$playerKey]);

        list($dealerSum) = $this->dealer->scoreSum($this->dealer);

        if ($playerSum <= self::MAX_ALLOWED_POINT) {
            if ($dealerSum <= self::MAX_ALLOWED_POINT) {
                if ($playerSum > $dealerSum) {
                    $result = 'WIN';
                } elseif ($playerSum == $dealerSum) {
                    $result = 'PUSH';
                } else {
                    $result = 'LOSE';
                }
            } else {
                $result = 'WIN';
            }
        } else {
            $result = 'LOSE';
        }

        return "
        \n============================================================================
        \n  Dealer : $this->dealerString
        \n  Player#" . $playerKey . " : $playerString
        \n  Player#" . $playerKey . " has " . $playerSum . " ,  Dealer has " . $dealerSum . " => You " . $result . "
        \n============================================================================
        \n";

    }
}