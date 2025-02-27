CREATE DATABASE IF NOT EXISTS project_dashboard;
USE project_dashboard;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (name, email, password)
VALUES
('John Doe', 'john@example.com', 'hashed_password_here'),
('Jane Smith', 'jane@example.com', 'hashed_password_here');
