<?php

require_once("db.php");
$db = new db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datetime = $_POST['datetime'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = 'INSERT INTO contact (datetime, name, email, phone, message) VALUES (:datetime, :name, :email, :phone, :message)';

    $stmt = $db->get_connection()->prepare($sql);
    $stmt->execute([
        ':datetime' => $datetime,
        ':name' => $name,
        ':email' => $email,
        ':phone' => $phone,
        ':message' => $message
    ]);
}
header("location: /");