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
        echo "Maligayang pagdating, " . $email;
        // Dito, maaari kang mag-redirect sa ibang page
        // header("Location: home.php"); // Halimbawa ng redirection
    } else {
        echo "Maling email o password.";
    }
} else {
    echo "Maling email o password.";
}

$conn->close();
?>
