<?php
    $items = ['1', '2', '3', '4', '5', '6', '7'];
?>

<table>
    <?php foreach ($items as $key => $item) { ?>
        <tr>
            <td><?= $key + 1 ?>.  <?= $item ?></td>
        </tr>
    <?php } ?>
</table>
