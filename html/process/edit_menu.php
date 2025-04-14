<?php

require_once 'db.php';

$db = new db();
$db->validate_session();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "UPDATE menu SET name=:name, description=:description, price=:price WHERE id=:id";
    $stmt = $db->get_connection()->prepare($sql);

    $stmt->execute([
        ':name' => $name,
        ':description' => $description,
        ':price' => $price,
        ':id' => $id
    ]);
}
header("location: /admin/");