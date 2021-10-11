<?php

use GameBook\Classes\Hero;
use GameBook\Classes\Items\Item;

/** @var Hero $hero */
$hero = $_SESSION['hero'];
$bag = $hero->getBag();
?>

<table>
    <?php /** @var Item $item */
    foreach ($bag->getItems() as $key => $item) { ?>
        <tr>
            <td><?= $key ?>.  <?= $item->getName() ?></td>
        </tr>
    <?php } ?>
</table>
