<?php
ini_set('display_errors', true);

use GameBook\Classes\Config\Config;
use GameBook\Classes\Helpers\PathHelper;
use GameBook\Classes\Hero;

require_once 'vendor/autoload.php';
session_start();
$config = new Config();

if (empty($_SESSION)) {
    newGame();
}

//TODO::хранение состояния игры и обработка входящих данных происходит через отдельный класс и паттерн
if (!empty($_POST)) {
    if (isset($_POST['restart'])) {
        newGame();
    }
}

/**
 * @var Hero
 */
$hero = $_SESSION['hero'];
require_once (PathHelper::getTemplateDirPath() . 'main.php');
?>
