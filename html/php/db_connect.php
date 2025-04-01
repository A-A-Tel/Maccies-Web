<?php

class db_connect {
    private string $host;
    private string $username;
    private string $password;
    private string $database;

    public function __construct() {

        $env = parse_ini_file(__DIR__ . "/.ini");

        $this->host = $env["DB_HOST"];
        $this->username = $env["DB_USERNAME"];
        $this->password = $env["DB_PASSWORD"];
        $this->database = $env["DB_NAME"];
    }

    public function get_connection() : mysqli
    {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}
