<?php

require_once 'card.php';
require_once 'deck.php';
require_once 'game.php';
require_once 'gamer.php';
require_once 'dealer.php';
require_once 'player.php';
require_once 'helper.php';

$deck = new Deck;
$dealer = new Dealer;

$game = new Game($deck, $dealer);
$game->run();