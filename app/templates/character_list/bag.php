<?php

use GameBook\Common\Character;
use GameBook\Classes\Items\Item;

/** @var Character $character */
$character = $_SESSION['character'];
$bag = $character->getBag();
?>

<table>
    <?php /** @var Item $item */
    foreach ($bag->getItems() as $key => $item) { ?>
        <tr>
            <td><?= $key ?>.  <?= $item->getName() ?></td>
        </tr>
    <?php } ?>
</table>
