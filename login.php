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

// Kunin ang email at password mula sa form
$email = $_POST['email'];
$password = $_POST['password'];

// Suriin ang user credentials
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found
    echo "Maligayang pagdating, " . $email;
} else {
    // User not found
    echo "Maling email o password.";
}

$conn->close();
?>
