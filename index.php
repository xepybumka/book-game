<?php

session_start();
ini_set('display_errors', true);
$filePath = __DIR__ . DIRECTORY_SEPARATOR;
$srcPath = $filePath . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
$templatePath = $srcPath . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR;
$classesPath = $srcPath . 'classes' . DIRECTORY_SEPARATOR;
require_once($templatePath . "main.php");
require_once($srcPath . "App.php");

$app = App::get();
?>
