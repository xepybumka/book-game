<?php
ini_set('display_errors', true);

use GameBook\Classes\Config\Config;
use GameBook\Classes\Hero;

require_once 'vendor/autoload.php';
session_start();

$fileDirPath = __DIR__ . DIRECTORY_SEPARATOR;
$srcDirPath = $fileDirPath . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
$configDirPath = $srcDirPath . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR;
$templateDirPath = $srcDirPath . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR;
$classesDirPath = $srcDirPath . 'classes' . DIRECTORY_SEPARATOR;
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
require_once 'src/templates/main.php';
?>
