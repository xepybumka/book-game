<?php

use GameBook\Classes\Hero;

function print_var($var) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

function hardResetGame() {
    $_SESSION = [];
}

function newGame() {
    $hero = new Hero();
    $_SESSION['hero'] = $hero;
}