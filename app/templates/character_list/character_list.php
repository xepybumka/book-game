<?php

use GameBook\Classes\Helpers\PathHelper;
use GameBook\Common\Character;

$templatePath = PathHelper::getTemplateDirPath();
$characterListPath = $templatePath . "character_list/";

/** @var Character $character */
$character = $_SESSION['character'];
$dexterity = $character->getDexterity();
$power = $character->getPower();
$maxPower = $character->getMaxPower();
$charisma = $character->getCharisma();
$money = $character->getMoney();
$food = $character->getFood();
?>

<div class="character-list">
    <h2>Листок персонажа</h2>
    <div class="line-table-separator"></div>
    <table class="character-list-table">
        <tr><th>Ловкость</th></tr>
        <tr><td><?=$dexterity?></td></tr>

        <tr><th>Сила</th></tr>
        <tr><td><?=$power?> / <?=$maxPower?></td></tr>

        <tr><th>Обаяние</th></tr>
        <tr><td><?=$charisma?></td></tr>
    </table>

    <div class="line-table-separator"></div>
    <table class="character-list-table">
        <tr><th>Деньги</th></tr>
        <tr><td><?=$money?></td></tr>

        <tr><th>Еда</th></tr>
        <tr><td><?=$food?></td></tr>
    </table>

    <div class="line-table-separator"></div>
    <table class="character-list-table">
        <tr><th>В заплечном мешке</th></tr>
        <tr><td class="item-list" ><?php require_once ($characterListPath . "bag.php")?></td></tr>
    </table>
    <table class="character-list-table">
        <tr><th>Информация</th></tr>
        <tr><td class="item-list" ><?php require_once ($characterListPath . "notes.php")?>
            </td></tr>
    </table>
    <div class="character-list-buttons">
        <button class="button">Открыть игровые правила </button>
        <button class="button">Восполнить здоровье (Еда: <?= $food ?>)</button>
    </div>
</div>
