-- Database schema for Aushad-Seva (miniproject)
-- Compatible with MySQL / MariaDB (e.g., via XAMPP, WAMP, or standalone MySQL)

CREATE DATABASE IF NOT EXISTS `miniproject` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `miniproject`;

-- --------------------------------------------------------
-- Table structure for table `users`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `mobile` VARCHAR(20) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Table structure for table `products`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `products` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(150) NOT NULL,
  `category` VARCHAR(50) NOT NULL,
  `description` TEXT NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `image_url` VARCHAR(255) NOT NULL,
  `is_new` TINYINT(1) DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Seed initial product data matching available asset images
-- --------------------------------------------------------
INSERT INTO `products` (`name`, `category`, `description`, `price`, `image_url`, `is_new`) VALUES
('Diclofenac Sodium 50mg', 'Pain Relief', 'Effective nonsteroidal anti-inflammatory drug (NSAID) for pain and inflammation management.', 18.50, 'diclofenac.jpg', 1),
('Amoxicillin 500mg Capsules', 'Antibiotics', 'Broad-spectrum antibiotic used to treat various bacterial infections safely and affordably.', 45.00, 'capsule.jpg', 0),
('Paracetamol 650mg Tablets', 'Analgesic & Antipyretic', 'Standard fever reducer and mild to moderate pain reliever at generic pricing.', 12.00, 'tablet.jpg', 1),
('Ceftriaxone 1g Injection', 'Injectables', 'Quality generic cephalosporin antibiotic injection for severe bacterial infections.', 75.00, 'injection.jpg', 0)
ON DUPLICATE KEY UPDATE `name`=VALUES(`name`);
