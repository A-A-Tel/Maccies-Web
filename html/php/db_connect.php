<?php

$servername = "db";
$username = "user";
$password = "password";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: ".$conn->connect_error);
}
