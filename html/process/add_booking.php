<?php

require_once 'db.php';
$db = new db();

$alert = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datetime = $_POST['datetime'];
    $amount = $_POST['amount'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $valid =
        preg_match('/^[0-9]{10}$/', $phone) &&

        preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/', $datetime) &&

        preg_match('/^[0-9]*$/', $amount) &&

        preg_match('/\b[\w.%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}\b/', $email) &&

        preg_match('/^[a-zA-Z0-9\s]+$/', $name);

    if ($valid) {

        $sql = 'INSERT INTO booking (datetime, amount, name, phone, email) VALUES(:datetime, :amount, :name, :phone, :email)';

        $stmt = $db->get_connection()->prepare($sql);
        $stmt->execute([
            ':datetime' => $datetime,
            ':amount' => $amount,
            ':name' => $name,
            ':phone' => $phone,
            ':email' => $email
        ]);
        $alert = "Successfully made booking";
    }
    else {
        $alert = "Invalid input";
    }
}
echo "<script type='text/javascript'>
    alert('$alert');
    window.location.href = '/';
</script>";