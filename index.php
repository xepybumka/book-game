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

$config = new Config();
require_once 'src/templates/main.php';
?>
