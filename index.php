<?php

use GameBook\Classes\Config\Config;
use GameBook\Classes\Hero;

session_start();
ini_set('display_errors', true);

require_once 'vendor/autoload.php';

$fileDirPath = __DIR__ . DIRECTORY_SEPARATOR;
$srcDirPath = $fileDirPath . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
$configDirPath = $srcDirPath . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR;
$templateDirPath = $srcDirPath . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR;
$classesDirPath = $srcDirPath . 'classes' . DIRECTORY_SEPARATOR;

$_SESSION = [];

$config = new Config();

if (empty($_SESSION)) {
    newGame();
}
//TODO::хранение состояния игры и обработка входящих данных происходит через отдельный класс и паттерн
if (!empty($_POST['newGame'])) {
    if ($_POST['newGame']) {
        newGame();
    }
}

/**
 * @var Hero
 */
$hero = $_SESSION['hero'];

require_once 'src/templates/main.php';
?>
