<?php

require_once 'db.php';
$db = new db();
$db->validate_session();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    $sql = "UPDATE contact SET replied=1 WHERE id=$id";
    $db->get_connection()->exec($sql);

}
header('location: /admin/');