<?php
session_start();

set_error_handler(function () {});

session_start();
$isLoggedIn = (bool) $_SESSION["valid_session"];

if (!$isLoggedIn) {
    header("location: /");
    exit;
}

restore_error_handler();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div id="modal" class="modal add-modal">
        <form action="/php/submit.php" method="POST" enctype='multipart/form-data'>
            <input required type="hidden" name="type" value="add-menu">
            <div class="add-column">
                <input required class="add-input" type="text" name="name" placeholder="Item naam">
                <textarea required class="add-textarea" name="description" placeholder="Item beschrijving"></textarea>
                <input required class="add-input" type="number" name="price" placeholder="Prijs">
            </div>

            <div class="add-column">
                <input placeholder="Upload item afbeelding" class="add-image" type="file" name="image" accept="image/png, image/gif, image/jpeg" />
                <input class="add-submit" type="submit" value="Toevoegen">
            </div>
        </form>
    </div>
</body>
</html>