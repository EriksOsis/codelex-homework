<?php

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