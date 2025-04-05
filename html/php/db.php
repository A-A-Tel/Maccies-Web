<?php

include 'data_booking.php';
include 'data_contact.php';

class db {
    private PDO $pdo;

    public function __construct() {

        $host = "db";
        $username = "user";
        $password = "password";
        $database = "mydatabase";

        $this->pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    }

    public function insert_booking(data_booking $data) : void {
        $sql = "INSERT INTO booking (id, datetime, amount, name, phone, email, accepted) VALUES (:id, :datetime, :amount, :name, :phone, :email, :accepted)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ":id" => $this->get_next_id("booking"),
            ":datetime" => $data->get_datetime(),
            ":amount" => $data->get_amount(),
            ":name" => $data->get_name(),
            ":phone" => $data->get_phone(),
            ":email" => $data->get_email(),
            ":accepted" => (int) $data->is_accepted()
        ]);
    }

    public function insert_contact(data_contact $data) : void {
        $sql = "INSERT INTO contact (id, datetime, name, phone, email, message, replied) VALUES (:id, :datetime, :name, :phone, :email, :message, :replied)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ":id" => $this->get_next_id("contact"),
            ":datetime" => $data->get_datetime(),
            ":name" => $data->get_name(),
            ":phone" => $data->get_phone(),
            ":email" => $data->get_email(),
            ":message" => $data->get_message(),
            ":replied" => (int) $data->is_replied()
        ]);
    }

    public function insert_menu(data_menu $data, array $image) : void {

        $sql = "INSERT INTO menu (id, name, description, price) VALUES (:id, :name, :description, :price)";
        $stmt = $this->pdo->prepare($sql);
        $id = $this->get_next_id("menu");


        $image["name"] = "$id.png";
        move_uploaded_file($image['tmp_name'], '../images/items/' . basename($image['name']));

        $stmt->execute([
            ":id" => $id,
            ":name" => $data->get_name(),
            ":description" => $data->get_description(),
            ":price" => $data->get_price()
        ]);
    }

    public function get_bookings() : array {
        $sql = "SELECT * FROM booking ORDER BY datetime DESC";
        $query_result = $this->pdo->query($sql);

        $bookings = array();

        foreach ($query_result as $row) {
            $id = $row["id"];
            $datetime = $row["datetime"];
            $amount = $row["amount"];
            $name = $row["name"];
            $phone = $row["phone"];
            $email = $row["email"];
            $replied = (bool) $row["replied"];
            $bookings[] = new data_booking($id, $datetime, $amount, $name, $phone, $email, $replied);
        }
        return $bookings;
    }

    public function get_contacts() : array {
        $sql = "SELECT * FROM contact ORDER BY datetime DESC";
        $query_result = $this->pdo->query($sql);
        
        $contacts = array();
        
        foreach ($query_result as $row) {
            $id = $row["id"];
            $datetime = $row["datetime"];
            $name = $row["name"];
            $phone = $row["phone"];
            $email = $row["email"];
            $message = $row["message"];
            $accepted = $row["accepted"];
            $contacts[] = new data_contact($id, $datetime, $name, $phone, $email, $message, $accepted);
        }
        return $contacts;
    }

    public function get_menus() : array {
        $sql = "SELECT * FROM menu ORDER BY id DESC";
        $query_result = $this->pdo->query($sql);

        $menus = array();

        foreach ($query_result as $row) {
            $id = $row["id"];
            $name = $row["name"];
            $description = $row["description"];
            $price = $row["price"];
            $menus[] = new data_menu($id, $name, $description, $price);
        }

        return $menus;
    }

    private function get_next_id(string $table) : int{
        $sql = "SELECT * FROM $table ORDER BY id DESC LIMIT 1";
        $query_result = $this->pdo->query($sql);
        $row = $query_result->fetch();
        if ($row == null) return 0;
        return $row["id"] + 1;
    }
}