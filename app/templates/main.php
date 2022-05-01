<?php

use GameBook\Classes\Helpers\PathHelper;

$templatePath = PathHelper::getTemplateDirPath();
$characterListPath = $templatePath . "character_list/";
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="author" content="Михаил Благодастких">
    <link rel="stylesheet" href="/css/styles.css">
    <script type="text/javascript" src="src/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Книга игра 1.0</title>
</head>
<body>
<div class="content">
    <?php require_once($templatePath . "header.php")?>
    <div class="container">
        <?php require_once ($characterListPath . "character_list.php");?>
        <?php require_once ($templatePath . "game.php");?>
    </div>
    <?php require_once ($templatePath . "footer.php"); ?>
</div>
</body>
</html>
