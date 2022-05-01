<?php


use GameBook\Classes\Common\Game;

function print_var($var) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}

function newGame() {
    $game = new Game();
    $game->newGame();
    $_POST = [];
    $_SESSION['game'] = $game;
    $_SESSION['character'] = $game->getCharacter();
    $_SESSION['page'] = $game->getStartPage();
}