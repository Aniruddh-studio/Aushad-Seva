<?php
    session_start(); // Start session to store user information

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'miniproject');

        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        // Check if user exists
        $stmt = $conn->prepare("SELECT * FROM register WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Check if password matches (plaintext comparison)
            if ($password === $row['password']) {
                $_SESSION['user'] = $row['name']; // Store user session
                echo "<script>alert('Login successful!'); window.location.href='index.html';</script>";
            } else {
                echo "<script>alert('Invalid password!'); window.location.href='login.html';</script>";
            }
        } else {
            echo "<script>alert('User not found! Please register.'); window.location.href='register.html';</script>";
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Invalid Request!";
    }
?>
