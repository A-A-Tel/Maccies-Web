<?php

require_once 'db_connect.php';
require_once 'data_booking.php';

class db_retrieve
{
    private mysqli $conn;

    public function __construct() {
        $db = new db_connect();
        $this->conn = $db->get_connection();
    }

    public function get_bookings() : array {
        $sql = "SELECT * FROM booking ORDER BY date DESC";
        $query_result = $this->conn->query($sql);

        $bookings = array();

        if ($query_result->num_rows > 0) {
            while ($row = $query_result->fetch_assoc()) {
                $date = $row["date"];
                $amount = $row["amount"];
                $name = $row["name"];
                $phone = $row["phone"];
                $email = $row["email"];
                $bookings[] = new data_booking($date, $amount, $name, $phone, $email);
            }
        }
        return $bookings;
    }
}
