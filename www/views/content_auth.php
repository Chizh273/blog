<form action="/Auth/LogIn" method="post">
    <table>
        <tr>
            <td>Login:</td>
            <td><input type="text" name="login"></td>
        </tr>

        <tr>
            <td>Password:</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit">Log in</button>
            </td>
        </tr>
    </table>
</form>

<style>

    table {
        width: 255px;
        margin: 100px auto;
    }

    form input, form button {
        margin: 3px;
    }

    button{
        width: 56px;
        margin: 0 99px !important;
    }

</style>