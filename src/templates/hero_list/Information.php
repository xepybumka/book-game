<?php
    $info = [
        'Бла бла',
        'Бле бле',
        'Смурфики - синие',
        'Валентин - гей',
        'Факт 5',
        'Факт 6',
        'Факт 7'
    ];
?>

<table>
    <?php foreach ($info as $key => $fact) { ?>
        <tr>
            <td><?= $key ?>.  <?= $fact ?></td>
        </tr>
    <?php } ?>
</table>
