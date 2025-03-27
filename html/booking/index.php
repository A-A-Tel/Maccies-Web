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
        <li><a href="/order/">Bestellen</a></li>
        <li class="current-page"><a href="/booking/">Reserveren</a></li>
        <li><a href="/contact/">Contact opnemen</a></li>
    </ul>
    <img class="logo hidden" src="/images/logo.png" alt="logo align image">

    <button class="login-button">Login</button>
</header>

<main>
    <h1 class="title">Wilt u reserveren?</h1>

    <form class="form-booking" action="">
        <div class="form-booking-item">
            <h2>Datum</h2>
            <input class="cursor-caret" placeholder="dd/mm/yyyy" required type="date" name="Reservation date" id="0">
        </div>
        <div class="form-booking-item">
            <h2>Aantal mensen</h2>
            <input required type="number" name="amount" id="1">
        </div>
        <div class="form-booking-item">
            <h2>Reservering naam</h2>
            <input required type="text" name="name" id="2">
        </div>
        <div class="form-booking-item">
            <h2>Telefoonnummer</h2>
            <input required type="number" name="name" id="3">
        </div>
        <div class="form-booking-item">
            <h2>Email</h2>
            <input required type="email" name="name" id="4">
        </div>

        <div class="form-booking-item">
            <input class="cursor-pointer" type="submit" value="Reserveren">
        </div>
    </form>
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