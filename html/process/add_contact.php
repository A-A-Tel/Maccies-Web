<?php

require_once("db.php");
$db = new db();

$alert = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datetime = $_POST['datetime'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $valid =
        preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/', $datetime) &&

        preg_match('/^[a-zA-Z0-9\s]+$/', $name) &&

        preg_match('/\b[\w.%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}\b/', $email) &&

        preg_match('/^[0-9]*$/', $phone) &&

        preg_match('/^[\p{L}\p{N}\p{P}\p{S}\p{Z}]+$/u', $message);

    if ($valid) {
        $sql = 'INSERT INTO contact (datetime, name, email, phone, message) VALUES (:datetime, :name, :email, :phone, :message)';

        $stmt = $db->get_connection()->prepare($sql);
        $stmt->execute([
            ':datetime' => $datetime,
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':message' => $message
        ]);
        $alert = "Successfully sent message";
    } else {
        $alert = "Invalid input";
    }
}
echo "<script type='text/javascript'>
    alert('$alert');
    window.location.href = '/';
</script>";