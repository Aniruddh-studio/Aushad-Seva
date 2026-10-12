<?php
/**
 * Database Connection Configuration for Aushad-Seva
 *
 * Credentials can be set via environment variables (recommended for production)
 * or will fallback to default local development values (e.g., standard XAMPP setup).
 */

$host     = getenv('DB_HOST') !== false ? getenv('DB_HOST') : 'localhost';
$user     = getenv('DB_USER') !== false ? getenv('DB_USER') : 'root';
$password = getenv('DB_PASS') !== false ? getenv('DB_PASS') : '';
$database = getenv('DB_NAME') !== false ? getenv('DB_NAME') : 'miniproject';

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection safely without leaking sensitive server details
if ($conn->connect_error) {
    error_log("AushadSeva Database connection failed: " . $conn->connect_error);
    die("Database connection error. Please ensure the database server is running and configured correctly.");
}
?>
