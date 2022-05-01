<?php

use GameBook\Common\Character;
use GameBook\Common\Game;
use GameBook\Common\Page;
use GameBook\Classes\Helpers\PathHelper;

require_once __DIR__ . '/vendor/autoload.php';

session_start();

if (empty($_SESSION)) {
    newGame();
}

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'restart':
            newGame();
    }
}

/** @var Game $game */
$game = $_SESSION['game'];
/** @var Character $character */
$character = $_SESSION['character'];
/** @var Page $page */
$page = $_SESSION['page'];

if (isset ($_GET)) {
    if (isset($_GET['page'])) {
        $_SESSION['page'] = $game->getPage($_GET['page']);
    }
}

require_once (PathHelper::getTemplateDirPath() . 'main.php');
?>
