<?php
    $page =  $_SESSION['page'];
    $pageTitle = $page->getTitle();
    $pageContent = $page->getContent();
?>
<div class="game">
    <h2>Книга-игра</h2>
    <h3> <?=$pageTitle?></h3>
    <div class="content">
        <?=$pageContent?>
    </div>
</div>
