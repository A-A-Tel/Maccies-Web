<?php

require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $amount = $_POST["amount"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $sql = "INSERT INTO booking (date, amount, name, phone, email) VALUES (?, ?, ?, ?, ?)";
    $db = new db_connect();
    $conn = $db->get_connection();

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $date, $amount, $name, $phone, $email);

    if ($stmt->execute()) {
        header("Location: /booking/");
        exit;
    } else {
        die("Execution failed: " . $stmt->error);
    }
}
