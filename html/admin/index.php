<?php

require_once "../php/db.php";

$db = new db();
$db->validate_session();
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
    <a href="/admin/"><img class="logo" src="/images/logo.png" alt="logo image"></a>

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

    <div class="booking-contact-container">
        <div class="booking-contact">
            <?php

            $template = '
            <div class="item-container">
                <h2>Naam: %s</h2>
                <p>
                    Datum en Tijd: %s
                    <br>
                    Aantal mensen: %s
                    <br>
                    Telefoonnummer: %s
                    <br>
                    Email-Adres: %s
                </p>
                <form action="/php/delete.php" method="POST">
                    <input type="hidden" name="table" value="booking">
                    <input type="hidden" name="id" value="%s">
                    <input type="submit" class="button-delete" value="">
                </form>
            </div>';

            $sql = "SELECT * FROM booking ORDER BY datetime ASC";
            $query = $db->get_connection()->query($sql);

            foreach ($query as $row) {
                echo sprintf($template, $row['name'], $row['datetime'], $row['amount'], $row['phone'], $row['email'], $row['id']);
            }
            ?>
        </div>

        <div class="booking-contact">
            <?php

            $template = '<div class="item-container">
                <h2>Naam: %s</h2>
                <p>
                    Verstuurdatum: %s
                    <br>
                    Email-Adres: %s
                    <br>
                    Telefoonnummer: %s
                    <br>
                    Bericht: %s
                </p>
                <form action="/php/delete.php" method="POST">
                    <input type="hidden" name="table" value="contact">
                    <input type="hidden" name="id" value="%s">
                    <input type="submit" class="button-delete" value="">
                </form>
                <form action="/php/reply_contact.php" method="POST">
                    <input type="hidden" name="id" value="%s">
                    <input type="submit" class="button-accept" value="">
                </form>
            </div>';

            $sql = "SELECT * FROM contact WHERE replied=0 ORDER BY datetime ASC";
            $query = $db->get_connection()->query($sql);

            foreach ($query as $row) {
                echo sprintf($template, $row['name'], $row['datetime'], $row['email'], $row['phone'], $row['message'], $row['id'], $row['id']);
            }
            ?>
        </div>
    </div>

    <div class="category-bar">

        <form action="index.php" class="search" method="POST">
            <input placeholder="Zoeken" type="text" name="search">
        </form>
    </div>

    <div class="item-list">

        <div class="item-container">
            <div id="placeholder" class="item"></div>
            <h2>Item toevoegen</h2>
            <p>----</p>
            <button onclick="showModal('/modals/add-item.php');" class="button-add"></button>
        </div>

        <?php
        $template = '
        <div class="item-container">
            <div id="%s" price="€%s" class="item"></div>
            <h2>%s</h2>
            <p>%s</p>
            <form action="/php/delete.php" method="POST">
                <input type="hidden" name="table" value="menu">
                <input type="hidden" name="id" value="%s">
                <input type="submit" class="button-delete" value="">
            </form>
            <button class="button-edit" onclick="showModal(\'/modals/add-item.php\', true, [\'%s\', \'%s\', \'%s\', \'%s\'])"></button>
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

            echo sprintf($template, $row['id'], $row['price'], $row['name'], $row['description'], $row['id'], $row['id'], $row['name'], $row['description'], $row['price']);
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