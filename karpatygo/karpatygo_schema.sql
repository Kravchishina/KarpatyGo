-- Створення бази даних
CREATE DATABASE IF NOT EXISTS karpatygo DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE karpatygo;

-- Таблиця ролей
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    permissions JSON
);

-- Таблиця гідів
CREATE TABLE guides (
    guides_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    contact_info VARCHAR(255),
    description TEXT
);

-- Таблиця користувачів
CREATE TABLE users (
    users_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    profile_photo VARCHAR(255),
    phone VARCHAR(30),
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

-- Таблиця маршрутів
CREATE TABLE routes (
    routes_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    difficulty ENUM('easy', 'medium', 'hard') NOT NULL,
    available_seats INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    start_date DATETIME,
    end_date DATETIME,
    guides_id INT,
    FOREIGN KEY (guides_id) REFERENCES guides(guides_id)
);

-- Таблиця бронювань
CREATE TABLE booking (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    tour_id INT,
    seats_booked INT NOT NULL,
    status ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(users_id),
    FOREIGN KEY (tour_id) REFERENCES routes(routes_id)
);

-- Таблиця відгуків
CREATE TABLE reviews (
    reviews_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    tour_id INT,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(users_id),
    FOREIGN KEY (tour_id) REFERENCES routes(routes_id)
);

-- Таблиця оплат
CREATE TABLE payments (
    payments_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    booking_id INT,
    amount DECIMAL(10,2) NOT NULL,
    payment_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    payment_status ENUM('pending', 'completed', 'failed') DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(users_id),
    FOREIGN KEY (booking_id) REFERENCES booking(booking_id)
);

-- Таблиця чатів
CREATE TABLE Chats (
    chat_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    subject VARCHAR(255),
    message TEXT,
    status ENUM('open', 'closed') DEFAULT 'open',
    date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(users_id)
);
