<?php
session_start(); // Simulan ang session

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

// Kunin ang username at password mula sa form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // I-query ang database para sa user
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, kunin ang data
        $row = $result->fetch_assoc();
        // Suriin ang password
        if (password_verify($password, $row['password'])) {
            // I-set ang session variable
            $_SESSION['username'] = $username;
            header("Location: home.php"); // I-redirect sa home page
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }
}

$conn->close();
?>
