<?php
$host = "localhost"; // Check if MySQL is running on localhost
$user = "root"; // Your MySQL username (default is 'root' for XAMPP)
$password = ""; // Your MySQL password (empty for XAMPP by default)
$database = "miniproject"; // Ensure this database exists in MySQL

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connected successfully!";
}
?>
