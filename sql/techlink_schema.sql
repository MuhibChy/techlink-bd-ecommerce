-- Database schema for TechLink Bangladesh starter
CREATE DATABASE IF NOT EXISTS techlink_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE techlink_db;

-- products
CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sku VARCHAR(80) DEFAULT NULL,
  name VARCHAR(255) NOT NULL,
  brand VARCHAR(120) DEFAULT NULL,
  category VARCHAR(80) DEFAULT NULL,
  price DECIMAL(10,2) NOT NULL DEFAULT 0,
  stock INT DEFAULT 0,
  image VARCHAR(255) DEFAULT 'placeholder.png',
  short_desc VARCHAR(255) DEFAULT NULL,
  description TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- orders
CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(255),
  phone VARCHAR(60),
  address TEXT,
  total DECIMAL(10,2) DEFAULT 0,
  payment_method VARCHAR(50),
  status VARCHAR(50) DEFAULT 'pending',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS order_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  order_id INT NOT NULL,
  product_id INT NOT NULL,
  price DECIMAL(10,2) DEFAULT 0,
  qty INT DEFAULT 1,
  FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- users
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) UNIQUE,
  phone VARCHAR(60) UNIQUE,
  password VARCHAR(255),
  name VARCHAR(255),
  role VARCHAR(40) DEFAULT 'customer',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- posts (blog)
CREATE TABLE IF NOT EXISTS posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  excerpt VARCHAR(512),
  content TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- sample data
INSERT INTO products (name,brand,category,price,stock,image,short_desc,description) VALUES
('Gaming Laptop XYZ','BrandA','Laptops',85000.00,5,'laptop1.jpg','High performance gaming laptop','Full description...'),
('SSD 1TB','BrandB','Components',7500.00,20,'ssd1.jpg','Fast NVMe SSD','Full description...'),
('Wireless Headphones','BrandC','Gadgets',3500.00,15,'headphones1.jpg','Noise-cancelling','Full description...');

INSERT INTO posts (title,excerpt,content) VALUES
('How to choose a gaming laptop','Short guide on choosing gaming laptop','Full article...'),
('SSD vs HDD: Which to pick?','Understanding storage options','Full article...');
