<?php

use GameBook\Classes\Helpers\PathHelper;
use GameBook\Classes\Hero;

$templatePath = PathHelper::getTemplateDirPath();
$heroListPath = $templatePath . "hero_list/";

/** @var Hero $hero */
$hero = $_SESSION['hero'];
$dexterity = $hero->getDexterity();
$power = $hero->getPower();
//TODO::Максимальное кол-во сил
$maxPower = $power;
$charisma = $hero->getCharisma();
$money = $hero->getMoney();
$food = $hero->getFood();
?>

<div class="hero-list">
    <h2>Листок персонажа</h2>
    <div class="line-table-separator"></div>
    <table>
        <tr>
            <th>Ловкость</th>
            <th>Сила</th>
            <th>Обаяние</th>
        </tr>
        <tr>
            <td><?=$dexterity?></td>
            <td><?=$power?> / <?=$maxPower?></td>
            <td><?=$charisma?></td>
        </tr>
    </table>

    <div class="line-table-separator"></div>
    <table>
        <tr>
            <th>Деньги</th>
            <th>Еда</th>
        </tr>
        <tr>
            <td><?=$money?></td>
            <td><?=$food?></td>
        </tr>
    </table>

    <div class="line-table-separator"></div>
    <table>
        <tr>
            <th style="width: 35%;">В заплечном мешке</th>
            <th style="width: 65%;">Информация</th>
        </tr>
        <tr>
            <td style="width: 35%;" class="item-list" >
                <?php require_once ($heroListPath . "bag.php")?>
            </td>
            <td style="width: 65%;" class="info">
                <?php require_once ($heroListPath . "notes.php")?>
            </td>
        </tr>
    </table>

    <div class="game-buttons">
        <button class="button">Восполнить здоровье (Еда: <?= $food ?>)</button>
    </div>
</div>
