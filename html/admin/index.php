<?php

set_error_handler(function () {});

session_start();
$isLoggedIn = (bool) $_SESSION["valid_session"];

if (!$isLoggedIn) {
    header("location: /");
    exit;
}

restore_error_handler();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
</head>
<body class="admin">

<header>
    <a href="/"><img class="logo" src="/images/logo.png" alt="logo image"></a>

    <ul class="menu">
        <li><a href="/">Home</a></li>
        <li><a href="/order/">Bestellen</a></li>
        <li><a href="/booking/">Reserveren</a></li>
        <li><a href="/contact/">Contact opnemen</a></li>
    </ul>
    <img class="logo hidden" src="/images/logo.png" alt="logo align image">

    <button onclick="window.location.href='/php/logout.php'" class="login-button">Logout</button>
</header>

<main>
    <div class="item-list">
        <?php

        require_once '../php/data_menu.php';
        require_once '../php/db.php';

        $db = new db();
        $template = '
        <div class="item-container">
            <div id="%s" price="€%s" class="item"></div>
            <h2>%s</h2>
            <p>%s</p>
            <button class="button-delete"></button>
            <button class="button-edit"></button>
        </div>
        ';

        foreach ($db->get_menus() as $menu) {
            $id = $menu->get_id();
            $name = $menu->get_name();
            $description = $menu->get_description();
            $price = $menu->get_price();

            echo sprintf($template, $id, $price, $name, $description);
        }

        ?>
    </div>
</main>

<footer>
    <a id="credit" target="_blank" class="icons-credit" href="https://www.icons8.com">Icons by Icons8</a>
    <span class="copyright">Takeaway & McDonald's &copy; 2025</span>
    <div id="socials" class="socials">
        <a href="https://www.youtube.com/channel/UCRI5ZedBs0_BYY4PlxD6m7w" target="_blank">
            <img src="/images/youtube.svg" alt="youtube image">
        </a>
        <a href="https://www.snapchat.com/add/mcdonalds" target="_blank">
            <img src="/images/snapchat.svg" alt="snapchat image">
        </a>
        <a href="https://www.linkedin.com/company/mcdonald's-corporation" target="_blank">
            <img src="/images/linkedin.svg" alt="linkedin image">
        </a>
        <a href="https://www.facebook.com/McDonalds" target="_blank">
            <img src="/images/facebook.svg" alt="facebook image">
        </a>
        <a href="https://www.instagram.com/mcdonalds/" target="_blank">
            <img src="/images/instagram.svg" alt="instagram image">
        </a>
        <a href="https://twitter.com/McDonalds" target="_blank">
            <img src="/images/twitter.svg" alt="twitter image">
        </a>
    </div>
</footer>
<script src="/js/main.js"></script>

</body>
</html>