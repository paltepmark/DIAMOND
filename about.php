<?php
session_start(); // Simulan ang session

// Suriin kung naka-login ang user
if (!isset($_SESSION['username'])) {
    header("Location: login.html"); // I-redirect sa login page kung hindi naka-login
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .nav {
            margin-bottom: 20px;
        }
        .nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="nav">
        <a href="home.php">Home</a>
        <a href="about.php">About</a>
        <a href="logout.php">Logout</a>
    </div>
    <h1>About Page</h1
