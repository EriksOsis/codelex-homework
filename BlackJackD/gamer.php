<?php

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