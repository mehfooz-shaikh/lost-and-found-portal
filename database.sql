CREATE DATABASE IF NOT EXISTS lost_and_found;
USE lost_and_found;

CREATE TABLE lost_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  item_name VARCHAR(100),
  description TEXT,
  location VARCHAR(100),
  date_lost DATE,
  contact VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE found_items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  finder_name VARCHAR(100),
  item_name VARCHAR(100),
  description TEXT,
  location VARCHAR(100),
  date_found DATE,
  contact VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
