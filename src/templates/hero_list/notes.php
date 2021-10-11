<?php

use GameBook\Classes\Hero;

    /** @var Hero $hero */
    $hero = $_SESSION['hero'];
    $note = $hero->getNote();
?>

<table>
    <?php
    foreach ($note->getNotes() as $key => $fact) { ?>
        <tr>
            <td><?= $key + 1 ?>.  <?= $fact->getText() ?></td>
        </tr>
    <?php } ?>
</table>
