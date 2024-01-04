<?php
// Database configuration
$servername = "localhost"; // Replace with your database server name
$username = "your_username"; // Replace with your database username
$password = "your_password"; // Replace with your database password
$dbname = "rooms"; // Replace with your database name

// Create a new MySQLi instance
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Connection successful, you can perform database operations here

// Close the connection when done
$conn->close();
?>