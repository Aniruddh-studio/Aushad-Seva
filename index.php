<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html"); // Redirect to login if not logged in
    exit();
}

include 'db.php';

// Fetch user details from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT name FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AushadSeva</title>
    <link rel="icon" href="title-logo.png" type="image/icon type">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="nav-menu" onclick="toggleMenu()">☰ Menu</div>
            <ul class="menu" id="menu">
                <li><a href="index.html"> ☰ Menu</a></li>
                <li><a href="about.html"><i class="fa-solid fa-info"></i> About</a></li>
                <li><a href="location.html"><i class="fa-solid fa-location-dot"></i> Location</a></li>
                <li><a href="login.html"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a></li>
            </ul>
            
            <div class="home" onclick="home()">
                <i class="fa-solid fa-house"></i>
            </div>
            <div class="line">
                <p>|</p>
            </div>
            <div class="medicine" onclick="loc()">
                <i class="fa-solid fa-location-dot"></i>
            </div>
            
            <div class="line">
                <p>|</p>
            </div>
            <div class="loc" onclick="log()">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
            </div>
        </div>

        <div class="panel">
            <div class="panel-logo" onclick="home()">
                <div class="logo"></div>
            </div>
            <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h1>
            <!-- Fixed user icon dropdown -->
            <div class="panel-search">
                <div class="user-icon" onclick="toggleUserDropdown()">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <div class="user-dropdown" id="userDropdown">
                    <a href="logout.php" class="dropdown-item">Logout</a>
                    
                </div>
            </div>
        </div>

        <div class="herosection">
            <div class="hero-bgphoto">
                <div class="bgphoto"></div>
            </div>
        </div>
    </header>
    
    <script src="script.js"></script>
</body>
</html>

