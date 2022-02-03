<?php

class Card
{
    public $key;
    public $value;
    public $suite;

    public function __construct($key, $value, $suite)
    {
        $this->key = $key;
        $this->value = $value;
        $this->suite = $suite;
    }
}

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

abstract class Gamer
{
    public function calc_points($cards)
    {
        foreach ($cards as $key_cards => $card) {
            $card_value[] = ($card->value);
        }

        return array_sum($card_value);
    }

    public function check_sum($sum)
    {
        return ($sum >= Game::MAX_ALLOWED_POINT) ? false : true;
    }

    public function scoreSum($gamer_value)
    {
        $response_string = '';
        $sum = 0;
        foreach ($gamer_value->currentCards as $value) {
            if ($value->key == "A" && ($sum + $value->value > 21)) {
                $value->value = 1;
            }
            $response_string .= $value->suite . '#' . $value->key . '(' . $value->value . ") , ";
            $sum += $value->value;
        }
        return [$sum, $response_string];

    }

    public function stand()
    {
        return false;
    }

    abstract public function hit(Deck $deck, $kind);
}

class Dealer extends Gamer
{

    public $status;
    private $deck;

    const MAX_ALLOWED_POINT_HIT = 17;

    public $currentCards = [];


    public function hit(Deck $deck, $dealer)
    {
        $this->deck = $deck;
        if (count($this->deck->cards) > 0) {
            $dealer->currentCards[] = $this->deck->popCards();
            return true;
        } else {
            echo("\n Deck is Empty!!!\n");
            return false;
        }
    }


    public function hitOrStand(Deck $deck, Dealer $dealer)
    {
        if (count($deck->cards) > 0) {

            list($dealer_sum, $dealer_string) = $this->scoreSum($dealer);
            if ($dealer_sum <= Game::MAX_ALLOWED_POINT) {
                if ($dealer_sum >= self::MAX_ALLOWED_POINT_HIT) {
                    return false;
                } else {
                    if ($this->hit($deck, $dealer)) {
                        $dealer_sum = $this->calc_points($this->currentCards);
                        $result = $this->check_sum($dealer_sum);
                    } else {
                        $result = false;
                    }

                    if (!$result) {
                        echo $dealer_string;
                    }
                    return $result;
                }
            } else {
                echo "\n Dealer point is $dealer_sum BUST! $dealer_string \n";
                return false;
            }

        } else {
            echo("\n Deck is Empty!!!\n");
            return false;

        }

    }
}

class Player extends Gamer
{

    public $currentCards = [];

    private $deck;

    public function hit(Deck $deck, $player)
    {
        $this->deck = $deck;
        if (count($this->deck->cards) > 0) {
            $player->currentCards[] = $this->deck->popCards();
            return true;
        } else {
            echo("\n Deck is Empty!\n");
            return false;
        }
    }


    public function hitOrStand(Deck $deck, Dealer $dealer, $playerKey, $playerValue, $dealerString)
    {
        if (count($deck->cards) > 0) {
            list($sum, $playerString) = $this->scoreSum($playerValue);
            if ($this->check_sum($sum)) {

                $user_response = Helper::read_cli("\n ####### \n Player#" . $playerKey . " : " . rtrim($playerString,
                        ',') . " sum => $sum \n" . ' Dealer:' . $dealerString . "\n ####### \n you have $sum please enter s(stand) OR h(hit): ");

                if (in_array($user_response, ['stand', 's', 'S'])) {

                    $this->stand();

                } elseif (in_array($user_response, ['hit', 'h', 'H'])) {


                    if ($this->hit($deck, $playerValue)) {
                        list($sum, $playerString) = $this->scoreSum($playerValue);
                        $result = $this->check_sum($sum);
                    } else {
                        $result = false;
                    }

                    if (!$result) {
                        echo $playerString;
                    }
                    return $result;

                } else {
                    Helper::read_cli(' please enter just stand OR hit: ');
                }
            } else {

                echo "\n your point is $sum  ".rtrim($playerString, ',') ."\n";
                return false;
            }
        } else {

            echo("\n Deck is Empty!!!\n");
            return false;
        }


    }

}

$deck = new Deck;
$dealer = new Dealer;

$game = new Game($deck, $dealer);
$game->run();