<?php

require_once 'db.php';

$db = new db();
$db->validate_session();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $image = $_FILES["image"];

    $sql = "INSERT INTO menu (name, description, price) VALUES (:name, :description, :price)";
    $stmt = $db->get_connection()->prepare($sql);

    $succeeded = $stmt->execute([
        ":name" => $name,
        ":description" => $description,
        ":price" => $price
    ]);

    if ($succeeded) {
        $sql = "SELECT * FROM menu ORDER BY id DESC LIMIT 1";
        $query = $db->get_connection()->query($sql);
        $row = $query->fetch();
        $id = $row["id"];

        $image['name'] = $id;
        move_uploaded_file($image["tmp_name"], "../images/items/" . basename($image["name"]));
    }
}
header("location: /admin/");