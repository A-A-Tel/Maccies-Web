<?php

require_once 'db.php';
$db = new db();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datetime = $_POST['datetime'];
    $amount = $_POST['amount'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = 'INSERT INTO booking (datetime, amount, name, phone, email) VALUES(:datetime, :amount, :name, :phone, :email)';

    $stmt = $db->get_connection()->prepare($sql);
    $stmt->execute([
        ':datetime' => $datetime,
        ':amount' => $amount,
        ':name' => $name,
        ':phone' => $phone,
        ':email' => $email
    ]);
}
header('location: /');