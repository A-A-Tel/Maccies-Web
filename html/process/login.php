<?php

require_once 'db.php';

$db = new db();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];
    $sql = "SELECT * FROM users WHERE username=:user";

    $stmt = $db->get_connection()->prepare($sql);
    $stmt->execute([':user' => $user]);
    $row = $stmt->fetch();

    if ($row != null && $row["password"] == $pass) {
        session_start();
        $_SESSION['valid_user'] = true;
        header("location: /admin/");
        exit;
    }
}
header("location: /");
