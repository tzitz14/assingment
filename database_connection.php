<?php
// database_connection.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate_ads";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
