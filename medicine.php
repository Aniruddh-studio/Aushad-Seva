<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AushadSeva</title>
    <link rel="icon" href="title-logo.png" type="image/icon type">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
   <style>
        .page-title {
          font-size: 1.875rem;
          font-weight: 700;
          margin-bottom: 2rem;
          color: #111;
          text-align: center;
          padding-top: 20px;
        }
        /* Product grid */
        .product-grid {
          display: grid;
          grid-template-columns: repeat(1, 1fr);
          gap: 1.5rem;
          margin-left: 20px; /* Spacing from the left */
          margin-right: 20px;
        }

        @media (min-width: 640px) {
          .product-grid {
            grid-template-columns: repeat(2, 1fr);
          }
        }

        @media (min-width: 768px) {
          .product-grid {
            grid-template-columns: repeat(3, 1fr);
          }
        }

        @media (min-width: 1024px) {
          .product-grid {
            grid-template-columns: repeat(4, 1fr);
          }
        }

        /* Product card */
        .product-card {
          background-color: #fff;
          border-radius: 6px;
          border: 1px solid #e5e7eb;
          overflow: hidden;
          transition: all 0.3s ease;
          display: flex;
          flex-direction: column;
        }

        .product-card:hover {
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
          transform: translateY(-2px);
        }

        /* Product image */
        .product-image-container {
          position: relative;
          aspect-ratio: 1 / 1;
          overflow: hidden;
        }

        .product-image {
          width: 100%;
          height: 100%;
          object-fit: cover;
          transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
          transform: scale(1.05);
        }

        /* Product content */
        .product-content {
          padding: 1rem;
          flex-grow: 1;
        }

        .product-title {
          font-size: 1.125rem;
          font-weight: 600;
          margin-bottom: 0.25rem;
          white-space: nowrap;
          overflow: hidden;
          text-overflow: ellipsis;
        }

        .product-description {
          font-size: 0.875rem;
          color: #6b7280;
          display: -webkit-box;
          -webkit-box-orient: vertical;
          overflow: hidden;
          margin-bottom: 0.5rem;
        }

        /* Product footer */
        .product-footer {
          padding: 1rem;
          display: flex;
          justify-content: space-between;
          align-items: center;
          border-top: 1px solid #f3f4f6;
        }

        /* Badge styles */
        .badge {
          position: absolute;
          top: 10px;
          right: 10px;
          background-color: #10b981;
          color: white;
          padding: 0.25rem 0.5rem;
          border-radius: 9999px;
          font-size: 0.75rem;
          font-weight: 500;
        }

        .category-badge {
          display: inline-block;
          background-color: #f3f4f6;
          color: #4b5563;
          padding: 0.25rem 0.5rem;
          border-radius: 9999px;
          font-size: 0.75rem;
          font-weight: 500;
          margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
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

    // Fetch products from the database
    $products_sql = "SELECT * FROM products";
    $products_result = $conn->query($products_sql);
    
    $conn->close();
    ?>
    
    <script src="script.js"></script>
    <header>
        <div class="navbar">
        
        <div class="nav-menu" onclick="toggleMenu()">☰ Menu</div>
    <ul class="menu" id="menu">
        <li><a href="index.php"><i class="fa-solid fa-house"></i> Home</i></a></li>
        <li><a href="about.php"><i class="fa-solid fa-info"></i>  About</a></li>
        <li><a href="medicine.php"><i class="fa-solid fa-truck-medical"></i> Medicines</a></li>
        <li><a href="location.html"><i class="fa-solid fa-location-dot"></i> Location</a></li>
        <li><a href=""><i class="fa-solid fa-cart-plus"></i> Cart</a></li>
    </ul>
            
            <div class="home" onclick="home()">
            <i class="fa-solid fa-house"></i>
            
        </div>
            <div class="line">
                <p>|</p>
            </div>
            <div class="medicine" onclick="medicine()">
                <i class="fa-solid fa-truck-medical"></i>
            </div>
            
            <div class="line">
                <p>|</p>
            </div>
            <div class="loc" onclick="loc()">
                <i class="fa-solid fa-map-location-dot"></i>
            </div>

            <div class="line">
                <p>|</p>
            </div>
            <div class="loc" onclick="cart()">
            <i class="fa-solid fa-cart-plus"></i>
            </div>
        </div>
        </div>



        <div class="panel">
            <div class="panel-logo" onclick="home()">
                <div class="logo">
                </div>
            </div>
            <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</h2>
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
    </header>

    <h1 class="page-title">AVAILABLE PRODUCTS</h1>

    <div class="product-grid">
        <?php if ($products_result && $products_result->num_rows > 0): ?>
            <?php while($product = $products_result->fetch_assoc()): ?>
                <div class="product-card">
                    <div class="product-image-container">
                        <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image">
                        <?php if (isset($product['is_new']) && $product['is_new'] == 1): ?>
                            <span class="badge">New</span>
                        <?php endif; ?>
                    </div>
                    <div class="product-content">
                        <span class="category-badge"><?php echo htmlspecialchars($product['category']); ?></span>
                        <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                        <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                    </div>
                    <div class="product-footer">
                        <span class="product-price">₹<?php echo htmlspecialchars($product['price']); ?></span>
                        <a href="#" class="view-details">View details</a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <!-- Fallback product if no products in database -->
            <div class="product-card">
                <div class="product-image-container">
                    <img src="medicine.jpg" alt="Product Name" class="product-image">
                    <span class="badge">New</span>
                </div>
                <div class="product-content">
                    <span class="category-badge">trial</span>
                    <h3 class="product-title">trial</h3>
                    <p class="product-description">trial</p>
                </div>
                <div class="product-footer">
                    <span class="product-price">trial</span>
                    <a href="#" class="view-details">View details</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>