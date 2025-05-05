<?php

class db {
// Hele mooie DB class of niet?

    private PDO $pdo;

    public function __construct()
    {
        $host = "db";
        $dbname = "mydatabase";
        $user = "user";
        $password = "password";

        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    }

    public function get_connection(): PDO
    {
        return $this->pdo;
    }

    public function validate_session(): void
    {

        if (session_status() == PHP_SESSION_NONE) session_start();
        if (!isset($_SESSION['valid_user'])) $_SESSION['valid_user'] = false;

        if (!$_SESSION["valid_user"]) {
            header("location: /");
            exit;
        }
    }
}