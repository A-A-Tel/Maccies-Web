<?php

require_once 'db.php';
require_once 'data_booking.php';
require_once 'data_contact.php';
require_once 'data_menu.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new db();
    $type = $_POST["type"];

    if ($type == "booking") {
        $datetime = $_POST["datetime"];
        $amount = $_POST["amount"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $data = new data_booking(0, $datetime, $amount, $name, $phone, $email, false);

        $db->insert_booking($data);
        header("location: /");

    } else if ($type == "contact") {
        $datetime = $_POST["datetime"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $message = $_POST["message"];
        $data = new data_contact(0, $datetime, $name, $email, $phone, $message, false);

        $db->insert_contact($data);
        header("location: /");

    } else if ($type == "add-menu") {
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $image = $_FILES["image"];

        $data = new data_menu(0, $name, $description, $price);
        $db->insert_menu($data, $image);
        header("location: /admin/");

    } else if ($type == "login") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if ($username == "admin" && $password == "admin") {
            session_start();
            $_SESSION["valid_session"] = true;
            header("location: /admin/");
        } else {
            header("location: /");
        }
    } else {
        header("location: /");
    }
}
