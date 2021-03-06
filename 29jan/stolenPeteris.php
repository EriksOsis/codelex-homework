<?php

class Card
{
    private array $cards = ["2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A"];
    private array $suit = ["♠", "♥", "♦", "♣"];
    public array $deck;

    public function Construct() {
        foreach ($this->cards as $index=> $make) {
            foreach ($this->suit as $ind=> $construct) {
                if($index == 9 && $ind == 1 || $index == 9 && $ind == 2 || $index == 9 && $ind == 3) {
                    continue;
                } else $this->deck[] =  "[$make $construct]";
            }
        }
    }
    public function shuffle() {
        shuffle($this->deck);
    }

    public function getCards(): array {
        return $this->cards;
    }

}

class PlayerNewGame {

    private array $cards;

    function showCards(): array {
        return $this->cards;
    }

    public function declareCards($card) {
        $this->cards[] = $card;
    }
    public function removeCardAndAdd($card, $nextPlayer) {
        $nextPlayer->declareCards($this->cards[$card]);
        unset($this->cards[$card]);
    }

}

function dropCards($player, $deck, $middleDeck)
{
    foreach ($deck->getCards() as $check) {
        $twoSameReds = false;
        $twoSameBlacks = false;

        if (in_array("[$check ♥]", $player->showCards()) && in_array("[$check ♦]", $player->showCards())){
            $twoSameReds = true;
        }
        if (in_array("[$check ♣]", $player->showCards()) && in_array("[$check ♠]", $player->showCards())){
            $twoSameBlacks = true;
        }

        if ($twoSameReds == true) {
            $player->removeCardAndAdd(array_search("[$check ♥]", $player->showCards()), $middleDeck);
            $player->removeCardAndAdd(array_search("[$check ♦]", $player->showCards()), $middleDeck);
        }
        if ($twoSameBlacks == true) {
            $player->removeCardAndAdd(array_search("[$check ♣]", $player->showCards()), $middleDeck);
            $player->removeCardAndAdd(array_search("[$check ♠]", $player->showCards()), $middleDeck);
        }
    }
}
function showCards($playerOne, $playerTwo, $playerThree, $playerFour) {
    echo "\n";
    echo "Player 1: " . implode(" ", $playerOne->showCards()) . "\n";
    echo "Player 2: " . implode(" ", $playerTwo->showCards()) . "\n";
    echo "Player 3: " . implode(" ", $playerThree->showCards()) . "\n";
    echo "Player 4: " . implode(" ", $playerFour->showCards()) . "\n";
}

$deck = new Card();

$deck->Construct();
$deck->shuffle();

$middleTable = new PlayerNewGame();

$playerOne = new PlayerNewGame();
$playerTwo = new PlayerNewGame();
$playerThree = new PlayerNewGame();
$playerFour = new PlayerNewGame();

$players = [$playerOne, $playerTwo, $playerThree, $playerFour];

for($i = 0; $i < 25; $i++) {
    if(empty($deck->deck)) {
        break;
    }
    $playerOne->declareCards(array_pop($deck->deck));

    if(empty($deck->deck)) {
        break;
    }
    $playerTwo->declareCards(array_pop($deck->deck));
    if(empty($deck->deck)) {
        break;
    }
    $playerThree->declareCards(array_pop($deck->deck));
    if(empty($deck->deck)) {
        break;
    }
    $playerFour->declareCards(array_pop($deck->deck));

}

foreach ($players as $allDrop) {
    dropCards($allDrop, $deck, $middleTable);
}

while(true) {
    foreach ($players as $index=>$see) {
        if($index + 1 !== count($players)) {
            $see->removeCardAndAdd(array_rand($see->showCards()), $players[$index + 1]);
            dropCards($players[$index + 1], $deck, $middleTable);
        } else {
            $see->removeCardAndAdd(array_rand($see->showCards()), $players[$index - count($players) + 1]);
            dropCards($players[$index - count($players) + 1], $deck, $middleTable);
        }
        showCards($playerOne, $playerTwo, $playerThree, $playerFour);

        if(count($middleTable->showCards()) == 48) {

            foreach ($players as $i=> $whoIsBlackPeteris) {
                if (in_array("[J ♠]", $whoIsBlackPeteris->showCards())) {
                    echo "Melains Pēteris ir: Spēlētājs " . ($i + 1) . "!\n";
                    return false;
                }
            }
        }
        sleep(1);
    }
}