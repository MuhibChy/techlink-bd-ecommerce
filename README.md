# 🛍️ TechLink Bangladesh E-commerce

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-8892BF.svg)](https://php.net/)
[![MySQL Version](https://img.shields.io/badge/MySQL-5.7%2B-4479A1.svg)](https://www.mysql.com/)

A modern, responsive e-commerce platform built with PHP and MySQL, designed specifically for the Bangladeshi market.

![TechLink E-commerce Preview](https://via.placeholder.com/1200x600/1a1a1a/ffffff?text=TechLink+Bangladesh+E-commerce)

## ✨ Features

### 🚀 Core Features
- 🛒 **E-commerce Essentials**
  - Product catalog with categories
  - Shopping cart functionality
  - Secure checkout process
  - Order tracking

- 🎨 **Modern UI/UX**
  - Responsive design for all devices
  - Glassmorphism design with dark theme
  - Smooth animations and transitions
  - Intuitive navigation

- 👨‍💼 **Admin Dashboard**
  - Product management
  - Order processing
  - Customer management
  - Sales analytics

- 🔒 **Security**
  - Secure authentication
  - CSRF protection
  - SQL injection prevention
  - XSS protection

### 🛠 Technical Stack
- **Backend**: PHP 7.4+
- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Database**: MySQL 5.7+
- **Server**: Apache/Nginx
- **Design**: Custom CSS with Glassmorphism

## 🚀 Getting Started

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- Composer (for dependency management)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/techlink-bd-ecommerce.git
   cd techlink-bd-ecommerce
   ```

2. **Configure Environment**
   - Copy `.env.example` to `.env`
   - Update database credentials and other settings

3. **Install Dependencies**
   ```bash
   composer install
   ```

4. **Database Setup**
   - Import the SQL file from `database/techlink_bd.sql`
   - Or run migrations: `php database/migrate.php`

5. **Start Development Server**
   ```bash
   php -S localhost:8000 -t public
   ```

## 📦 Project Structure

```
├── assets/           # Static assets (CSS, JS, images)
├── includes/         # Core PHP classes and functions
├── admin/            # Admin panel
├── config/           # Configuration files
├── database/         # Database migrations and seeds
├── public/           # Publicly accessible files
└── vendor/           # Composer dependencies
```

## 🤝 Contributing

Contributions are welcome! Please read our [contributing guidelines](CONTRIBUTING.md) before submitting pull requests.

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📞 Contact

For any inquiries, please contact [your-email@example.com](mailto:your-email@example.com)

---

<div align="center">
  Made with ❤️ by Your Name | © 2023 TechLink Bangladesh
</div>
- Production hardening (CSRF tokens, rate limiting) - recommended next steps in README

Quickstart (XAMPP on Windows)
1. Install XAMPP and start Apache + MySQL.
2. Copy the project folder into XAMPP htdocs: c:\xampp\htdocs\MRSecurity
3. Create a MySQL database named `techlink_db` and import `sql/techlink_schema.sql`.
4. Edit `config.php` to set DB credentials.
5. Open http://localhost/MRSecurity in your browser.

Recommended hosting (Bangladesh):
- Hostinger Bangladesh
- Exonhost
- WebHostBD
- DigitalOcean (for more control)

Security notes
- Change default admin credentials after first login.
- Use HTTPS in production and secure DB credentials.

License
MIT
