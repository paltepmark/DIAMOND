<?php
$servername = "localhost"; // o ang iyong server
$username = "root"; // ang iyong database username
$password = ""; // ang iyong database password
$dbname = "user_db"; // ang pangalan ng database

// Lumikha ng koneksyon
$conn = new mysqli($servername, $username, $password, $dbname);

// Suriin ang koneksyon
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Halimbawa ng pag-save ng user
$username = "testuser";
$password = "password123"; // Dapat ay i-hash ito

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// I-save sa database
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
