# 🏥 Aushad-Seva (औषध सेवा)

[![PHP Version](https://img.shields.io/badge/PHP-7.4%20|%208.x-777bb4?style=flat-square&logo=php&logoColor=white)](https://www.php.net/)
[![Database](https://img.shields.io/badge/MySQL-MariaDB-4479a1?style=flat-square&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Frontend](https://img.shields.io/badge/Frontend-HTML5%20%7C%20CSS3%20%7C%20JS-e34f26?style=flat-square&logo=html5&logoColor=white)](https://developer.mozilla.org/)
[![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)](LICENSE)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](https://github.com/Aniruddh-studio/Aushad-Seva/pulls)

> **Aushad-Seva** is a web-based healthcare portal inspired by the **Pradhan Mantri Bhartiya Janaushadhi Pariyojana (PMBJP)** initiative of the Government of India. The project aims to make high-quality generic medicines accessible and affordable to citizens by providing an intuitive online platform for browsing certified medicines, locating nearby Jan Aushadhi Kendras, and managing healthcare orders.

---

## 📑 Table of Contents

- [Overview](#-overview)
- [Key Features](#-key-features)
- [Tech Stack](#-tech-stack)
- [Project Directory Structure](#-project-directory-structure)
- [Prerequisites](#-prerequisites)
- [Installation & Setup](#-installation--setup)
- [Database Configuration](#-database-configuration)
- [Security & Environment Variables](#-security--environment-variables)
- [Roadmap & Enhancements](#-roadmap--enhancements)
- [Contributing](#-contributing)
- [License](#-license)

---

## 🌟 Overview

The Jan Aushadhi scheme is implemented by the **Ministry of Chemicals and Fertilizers** and the **Department of Pharmaceuticals** to break the barrier of high medical expenses. All medicines available through this portal follow stringent quality standards certified by accredited testing laboratories.

**Aushad-Seva** translates this mission into a digital experience, bridging the gap between consumers and affordable generic alternatives.

---

## ✨ Key Features

- **🔐 User Authentication & Sessions**
  - Registration with user validation (`register.html`, `register.php`)
  - Login system with active session management (`login.html`, `login.php`, `logout.php`)
  - Authenticated user greeting and profile menu dropdown

- **💊 Dynamic Medicine Catalog**
  - Real-time catalog populated from MySQL database (`medicine.php`)
  - Responsive product card grid with badges for new arrivals and categories
  - Detailed product views, generic salt descriptions, and transparent pricing in ₹ (INR)

- **🛒 Cart System**
  - Session-based user cart interface ready for ordering medicines (`cart.php`)

- **📍 Kendra Store Locator**
  - Interactive Google Maps integration (`location.html`) allowing users to find nearby Pradhan Mantri Jan Aushadhi Kendras

- **📖 Awareness & Workflow**
  - Educational portal highlighting government initiatives, certifications, and quality standards (`about.html`, `about.php`)
  - Informative process flow diagram (`Flowchart.png`)

- **📱 Responsive UI & Micro-interactions**
  - Sliding side-navigation drawer
  - User profile dropdown menu
  - Mobile-friendly grid layout with CSS modern styling

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| **Frontend** | HTML5, CSS3, JavaScript (Vanilla ES6), Font Awesome 6.7.2 |
| **Backend** | PHP (7.4+ / 8.x compatible) |
| **Database** | MySQL / MariaDB |
| **Server** | Apache (XAMPP / WAMP / LAMP / Nginx) |

---

## 📂 Project Directory Structure

```plaintext
Aushad-Seva/
├── .gitignore              # Git ignore rules for sensitive files and logs
├── .env.example            # Environment configuration template
├── README.md               # Project documentation
├── database.sql            # Database schema & sample seed data
│
├── index.html              # Public landing page (guest)
├── index.php               # Authenticated home dashboard
├── about.html              # Informational page (guest)
├── about.php               # Informational page (authenticated user)
├── login.html              # User login interface
├── login.php               # Login verification and session handler
├── register.html           # User registration interface
├── register.php            # Registration handler and database insert
├── logout.php              # Session destruction and logout handler
├── medicine.html           # Static medicine catalog preview
├── medicine.php            # Dynamic database-driven medicine catalog
├── cart.php                # User shopping cart interface
├── location.html           # Jan Aushadhi Kendra store locator (Google Maps)
├── error.html              # Error handling & 404 page
│
├── db.php                  # Database connection module (environment-aware)
├── script.js               # Frontend JavaScript for menu & dropdown toggles
├── style.css               # Core custom CSS styling sheet
│
└── assets/images
    ├── logo.jpg            # Website branding logo
    ├── title-logo.png      # Favicon and title icon
    ├── hero.jpg            # Hero banner artwork
    ├── about.png           # About page illustration
    ├── login.png           # Login background artwork
    ├── register.png        # Register background artwork
    ├── Flowchart.png       # Initiative workflow diagram
    ├── capsule.jpg         # Product sample image (Capsule)
    ├── tablet.jpg          # Product sample image (Tablet)
    ├── diclofenac.jpg      # Product sample image (Diclofenac)
    └── injection.jpg       # Product sample image (Injection)
```

---

## ⚙️ Prerequisites

Before running this project locally, ensure you have:

1. **Local PHP & MySQL Server**:
   - [XAMPP](https://www.apachefriends.org/) (Recommended for Windows)
   - Or [WampServer](https://www.wampserver.com/) / [MAMP](https://www.mamp.info/) / [LAMP stack](https://ubuntu.com/server/docs/lamp-applications)
2. **Web Browser**: Chrome, Firefox, Edge, or Safari
3. **Git**: Installed for version control

---

## 🚀 Installation & Setup

### Step 1: Clone the Repository
Clone the project into your local server root (for XAMPP on Windows, this is usually `C:\xampp\htdocs\`):

```bash
cd C:\xampp\htdocs
git clone https://github.com/Aniruddh-studio/Aushad-Seva.git
```

### Step 2: Start Apache and MySQL
1. Open the **XAMPP Control Panel**.
2. Click **Start** for both **Apache** and **MySQL** modules.

### Step 3: Setup the Database
1. Open your browser and navigate to **phpMyAdmin**: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. Click on the **Import** tab.
3. Choose the `database.sql` file located in the root of the cloned project.
4. Click **Go** / **Import** to execute the script.
   > This automatically creates the `miniproject` database, tables (`users`, `products`), and inserts sample medicine records.

### Step 4: Configure Database Credentials (Optional)
By default, `db.php` connects using standard local development credentials:
- **Host**: `localhost`
- **Username**: `root`
- **Password**: *(empty)*
- **Database**: `miniproject`

If you are using custom credentials or deploying to a server, copy `.env.example` to `.env` or set environment variables:
```ini
DB_HOST=localhost
DB_USER=root
DB_PASS=your_password
DB_NAME=miniproject
```

### Step 5: Launch the Application
Open your web browser and visit:
```
http://localhost/Aushad-Seva/
```

---

## 🗄️ Database Configuration

The database schema includes two primary tables:

### 1. `users` Table
| Column | Type | Constraints | Description |
|---|---|---|---|
| `id` | `INT` | `AUTO_INCREMENT`, `PRIMARY KEY` | Unique User ID |
| `name` | `VARCHAR(100)` | `NOT NULL` | Full Name of the User |
| `mobile` | `VARCHAR(20)` | `NOT NULL` | Contact Number |
| `email` | `VARCHAR(100)` | `NOT NULL`, `UNIQUE` | User Email Address |
| `password` | `VARCHAR(255)` | `NOT NULL` | User Password |
| `created_at` | `TIMESTAMP` | `DEFAULT CURRENT_TIMESTAMP` | Account Registration Date |

### 2. `products` Table
| Column | Type | Constraints | Description |
|---|---|---|---|
| `id` | `INT` | `AUTO_INCREMENT`, `PRIMARY KEY` | Product ID |
| `name` | `VARCHAR(150)` | `NOT NULL` | Generic Medicine Name |
| `category` | `VARCHAR(50)` | `NOT NULL` | Category (e.g. Pain Relief, Antibiotics) |
| `description` | `TEXT` | `NOT NULL` | Medical purpose & indications |
| `price` | `DECIMAL(10,2)` | `NOT NULL` | Price in INR (₹) |
| `image_url` | `VARCHAR(255)` | `NOT NULL` | Image asset filename or URL |
| `is_new` | `TINYINT(1)` | `DEFAULT 0` | 1 if new arrival, 0 otherwise |
| `created_at` | `TIMESTAMP` | `DEFAULT CURRENT_TIMESTAMP` | Date Added |

---

## 🔒 Security & Environment Variables

- **Sanitized Credentials**: `db.php` uses `getenv()` to read connection credentials safely from the host environment rather than exposing hardcoded passwords in version control.
- **Connection Error Obfuscation**: Production database connection errors are routed to server error logs (`error_log`) instead of leaking raw server details or internal SQL errors to web clients.
- **Git Protections**: `.gitignore` is pre-configured to block accidental commits of `.env` files, database dumps, logs, and operating system artifacts.
- **Prepared Statements**: User authentication and queries utilize parameterized prepared statements (`$stmt->bind_param(...)`) to prevent SQL Injection attacks.

---

## 🗺️ Roadmap & Enhancements

- [ ] Implement `password_hash()` and `password_verify()` (Bcrypt / Argon2) for hashed password storage.
- [ ] Prescription upload functionality (PDF / JPG).
- [ ] Live search and category filtering on the Medicines page.
- [ ] Payment gateway integration (UPI / Razorpay / Stripe).
- [ ] Automated SMS / Email order confirmation notifications.

---

## 🤝 Contributing

Contributions, bug reports, and feature requests are welcome!

1. Fork the Project (`https://github.com/Aniruddh-studio/Aushad-Seva`)
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📄 License

This project is licensed under the [MIT License](LICENSE) - feel free to use, modify, and distribute it for educational and non-commercial purposes.
