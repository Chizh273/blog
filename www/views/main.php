<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Blog</title>

    <style>
        div.container {
            width: 900px;
            margin: 0 auto;
        }

        p.header {
            width: 465px;
            margin-left: auto;
            margin-right: auto;
        }

        .header a {
            font-size: 24px;
            margin: 10px;
            text-align: center !important;
        }
    </style>

</head>
<body>
<div class="container">
    <p class="header">
        <a href="/">Index</a>
        <a href="/PanelAdmin/Add">Add</a>
        <a href="/PanelAdmin">Panel Admin</a>
        <?php
            if ( isset( $_SESSION['login'] ) ) :
                ?>
                <a href="/Auth/LogOut"><?= $_SESSION['login']; ?>[log out]</a>
                <?php
            else:
                ?>
                <a href="/Auth">Log In</a>
                <?php
            endif;
        ?>
    </p>
    <hr>

    <p>

        <?php
            include __DIR__ . "/content_" . $template . ".php";
        ?>


    </p>

</div>
</body>
</html>