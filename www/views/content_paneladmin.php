<style>
    .panelAdmin {
        width: 900px;
        border-collapse: collapse;
    }

    .panelAdmin td {
        text-align: center;
    }

    .panelAdmin td:nth-child(1) {
        width: 30px;
    }

    .panelAdmin td:nth-child(2) {
        width: 500px;
    }

    .panelAdmin td:nth-child(3) {
        width: 100px;
    }

    .panelAdmin td:nth-child(4), .panelAdmin td:nth-child(5) {
        width: 60px;
    }

</style>

<table border="1" class="panelAdmin">
    <tr>
        <td>Id</td>
        <td>Title</td>
        <td>Author</td>
        <td>Update</td>
        <td>Delete</td>
    </tr>

    <?php
        foreach ( $items as $item ):
            ?>
            <tr>
                <td><?= $item->id ?></td>
                <td><?= $item->title ?></td>
                <td><?= $item->author ?></td>
                <td><a href="/PanelAdmin/Update/<?= $item->id ?>">Update</a></td>
                <td><a href="/PanelAdmin/Delete/<?= $item->id ?>">Delete</a></td>
            </tr>
            <?php
        endforeach;
    ?>
</table>

<style>
    .log {
        margin-top: 40px;
        width: 900px;
        height: 200px;
        overflow: auto;
    }

    h1 {
        text-align: center;
    }

    .itemLog {
        font-size: 15px;
    }

    .itemLog b, .itemLog i {
        font-size: 17px;
    }
</style>


<h1>Log Error</h1>
<div class="log">
    <?php

        foreach ( $log as $value ):
            ?>
            <p class="itemLog">
                <?= $value ?>
            </p>
            <?php
        endforeach;
    ?>
</div>


