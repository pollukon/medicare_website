-- Database: medicare_db

CREATE DATABASE IF NOT EXISTS medicare_db;
USE medicare_db;

-- Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);

-- Appointments Table
CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    doctor_id INT,
    appointment_date DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (doctor_id) REFERENCES doctors(id)
);

-- Medical Records Table
CREATE TABLE IF NOT EXISTS medical_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    record_type VARCHAR(100),
    description TEXT,
    doctor_name VARCHAR(100),
    record_date DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT,
    gender ENUM('Male', 'Female', 'Other'),
    phone VARCHAR(20),
    address VARCHAR(255)
);

-- DOCTORS TABLE
CREATE TABLE IF NOT EXISTS doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    specialization VARCHAR(100),
    phone VARCHAR(20),
    email VARCHAR(100),
    address VARCHAR(255)
);

