<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_db";

// Lumikha ng koneksyon
$conn = new mysqli($servername, $username, $password, $dbname);

// Suriin ang koneksyon
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Halimbawa ng pag-insert ng user
$email = "user@example.com"; // Palitan ito ng email mula sa form
$password = password_hash("password123", PASSWORD_DEFAULT); // I-hash ang password

$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

if ($conn->query($sql)
