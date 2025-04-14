<?php

require_once "db.php";

$db = new db();
$db->validate_session();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table = $_POST["table"];
    $id = $_POST["id"];

    $sql = "DELETE FROM " . $table . " WHERE id=" . $id;
    $db->get_connection()->prepare($sql)->execute();
}
header("location: /admin/");
