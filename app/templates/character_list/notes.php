<?php

use GameBook\Common\Character;

    /** @var Character $character */
    $character = $_SESSION['character'];
    $note = $character->getNote();
?>

<table>
    <?php
    foreach ($note->getNotes() as $key => $fact) { ?>
        <tr>
            <td><?= $key + 1 ?>.  <?= $fact->getText() ?></td>
        </tr>
    <?php } ?>
</table>
