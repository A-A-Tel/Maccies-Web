<?php
require_once "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $amount = $_POST["amount"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];

    $sql = "INSERT INTO booking (date, amount, name, phone, email) VALUES (?, ?, ?, ?, ?)";
    global $conn;

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisss", $date, $amount, $name, $phone, $email);

    if ($stmt->execute()) {
        header("Location: /booking/?success=1");
        exit;
    } else {
        die("Execution failed: " . $stmt->error);
    }
}
