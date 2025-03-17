<?php
$host = 'localhost';
$user = 'root'; // default username ng XAMPP
$password = ''; // default password ng XAMPP
$dbname = 'login_system';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
