<?php
    $templatePath = 'src/templates/';
    $heroListPath = $templatePath . "hero_list/";

    $dexterity = 0;
    $power = 0;
    $maxPower = 0;
    $charisma = 0;
    $money = 0;
    $food = 0;
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
            <th>В заплечном мешке</th>
            <th>Информация</th>
        </tr>
        <tr>
            <td class="item-list">
                <?php require_once ($heroListPath . "bag.php")?>
            </td>
            <td class="info">
                <?php require_once ($heroListPath . "information.php")?>
            </td>
        </tr>
    </table>

    <div class="hero-list-buttons">
        <button class="button">Восполнить здоровье (Еда: <?= $food ?>)</button>
    </div>
</div>
