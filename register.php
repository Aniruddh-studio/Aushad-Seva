<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password']; // Storing password as plain text (Not Recommended)

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'miniproject');

        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        } else {
            // Prepare SQL statement
            $stmt = $conn->prepare("INSERT INTO register(name, email, mobile, password) VALUES(?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $mobile, $password);

            if ($stmt->execute()) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        }
    } else {
        echo "Invalid Request!";
    }
?>
