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
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, kunin ang data
    $row = $result->fetch_assoc();
    
    // Suriin ang password gamit ang password_verify
    if (password_verify($password, $row['password'])) {
        // Kung tama ang email at password, magre-redirect
        header("Location: https://paltepmark.github.io/DIAMOND/home.html");
        exit(); // Tiyakin na wala nang ibang output pagkatapos ng redirection
    } else {
        // Kung mali ang password, magre-redirect sa login page na may error message
        header("Location: https://paltepmark.github.io/DIAMOND/login.html?error=1");
        exit();
    }
} else {
    // Kung walang user na natagpuan, magre-redirect sa login page na may error message
    header("Location: https://paltepmark.github.io/DIAMOND/login.html?error=1");
    exit();
}

$conn->close();
?>
