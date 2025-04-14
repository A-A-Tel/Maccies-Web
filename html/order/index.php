<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
</head>
<body>

<header>
    <a href="/"><img class="logo" src="/images/logo.png" alt="logo image"></a>

    <ul class="menu">
        <li><a href="/">Home</a></li>
        <li class="current-page"><a href="/order/">Bestellen</a></li>
        <li><a href="/booking/">Reserveren</a></li>
        <li><a href="/contact/">Contact opnemen</a></li>
    </ul>
    <img class="logo hidden" src="/images/logo.png" alt="logo align image">

    <button onclick="showModal('/modals/login.html')" class="login-button">Login</button>
</header>

<main>
    <h1 class="title">Waar heeft u vandaag zin in?</h1>
    <div class="cart">
        <img src="/images/cart.svg" alt="cart image">
        <div class="cart-amount">X</div>
    </div>
    <div class="category-bar">
        <form action="index.php" class="search" method="POST">
            <input placeholder="Zoeken" type="text" name="search">
        </form>
    </div>

    <div class="item-list">
        <?php

        require_once '../php/db.php';

        $db = new db();
        $template = '
        <div class="item-container">
            <div id="%s" price="€%s" class="item"></div>
            <h2>%s</h2>
            <p>%s</p>
            <button class="button-remove"></button>
            <button class="button-add"></button>
        </div>
        ';

        $sql = "SELECT * FROM menu";

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $search = $_POST['search'];
            $sql .= " WHERE name LIKE '%" . $search . "%'";
        }
        $sql .= " ORDER BY id ASC";


        $query = $db->get_connection()->query($sql);

        foreach ($query as $row) {
            echo sprintf($template, $row['id'], $row['price'], $row['name'], $row['description']);
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