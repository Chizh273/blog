<style>
    form.add table td {
        vertical-align: top;
    }
</style>

<form action="/PanelAdmin/SaveToDB" method="post" class="add">
    <input type="hidden" name="id" value="<?= $item->id ?>">
    <table>
        <tr>
            <td>Title</td>
            <td>
                <input type="text" name="title" value="<?= $item->title ?>">
            </td>
        </tr>
        <tr>
            <td>
                Text
            </td>
            <td>
                <textarea name="text" id="" cols="100" rows="20"><?= $item->text ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                Author
            </td>
            <td>
                <input type="text" name="author" value="<?= $item->author ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">Send</button>
            </td>
        </tr>
    </table>
</form>

