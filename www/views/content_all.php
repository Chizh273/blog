<?php
    foreach ($items as $item):
        ?>
        <p>
            <a href="/News/<?= $item->id ?>"><h1><?= $item->title ?></h1></a>
            <p><?= $item->text ?></p>
            <p>Author: <?= $item->author ?></p>
        </p>
        <hr width="800" align="left">
        <?php
    endforeach;