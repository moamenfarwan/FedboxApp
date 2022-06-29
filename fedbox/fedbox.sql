-- phpMyAdmin SQL Dump

-- version 5.0.4

-- https://www.phpmyadmin.net/

--

-- Host: localhost

-- Generation Time: June 22, 2022 at 06:36 PM

-- Server version: 10.4.17-MariaDB

-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `Hamzastore`

--

-- --------------------------------------------------------

--

-- Table structure for table `orders`

--

CREATE TABLE `orders` (
    `orderID` int(5) NOT NULL,
    `mealID` int(5) NOT NULL,
    `quantity` int(5) NOT NULL,
    `orderTotal` float NOT NULL,
    `userID` int(5) NOT NULL,
    `orderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--

-- Table structure for table `meals`

--

CREATE TABLE `meals` (
    `mealID` int(11) NOT NULL,
    `mealname` varchar(100) NOT NULL,
    `description` varchar(200) NOT NULL,
    `price` float NOT NULL,
    `quantity` int(11) NOT NULL,
    `supplierID` int(11) NOT NULL,
    `image` varchar(1000) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `meals`

--

INSERT INTO
    `meals` (
        `mealID`,
        `mealname`,
        `description`,
        `price`,
        `quantity`,
        `supplierID`,
        `image`
    )
VALUES
    (
        6,
        'Nike Mask',
        'Original Nike Facemask',
        12,
        121,
        3,
        'https://m.uponpure.com/bigpic/q1/2020-05/20200522091121_30740.jpg'
    );

-- --------------------------------------------------------

--

-- Table structure for table `users`

--

CREATE TABLE `users` (
    `userID` int(11) NOT NULL,
    `email` varchar(45) DEFAULT NULL,
    `firstname` varchar(45) DEFAULT NULL,
    `lastname` varchar(45) DEFAULT NULL,
    `password` varchar(100) DEFAULT NULL,
    `address` varchar(45) DEFAULT NULL,
    `gender` varchar(6) DEFAULT NULL,
    `role` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `users`

--

INSERT INTO
    `users` (
        `userID`,
        `email`,
        `firstname`,
        `lastname`,
        `password`,
        `address`,
        `gender`,
        `role`
    )
VALUES
    (
        6,
        'admin@hamza.com',
        'Hamza',
        'Admin',
        '$2y$10$Ur6MbqwgQMze9K.6SzxkouzQfVe2h6N8ZFlKj6bx.PlWrT/.cdtIW',
        'Qatar',
        'Male',
        'admin'
    );

-- --------------------------------------------------------

--

-- Table structure for table `suppliers`

--

CREATE TABLE `suppliers` (
    `supplierID` int(120) NOT NULL,
    `suppliername` varchar(45) DEFAULT NULL,
    `address` varchar(100) DEFAULT NULL,
    `phone` varchar(20) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--

-- Dumping data for table `suppliers`

--

INSERT INTO
    `suppliers` (`supplierID`, `suppliername`, `address`, `phone`)
VALUES
    (3, 'McDonalds', 'USA', '+234234324324');

--

-- Indexes for dumped tables

--

--

-- Indexes for table `orders`

--

ALTER TABLE `orders` ADD PRIMARY KEY (`orderID`);

--

-- Indexes for table `meals`

--

ALTER TABLE `meals` ADD PRIMARY KEY (`mealID`);

--

-- Indexes for table `users`

--

ALTER TABLE `users` ADD PRIMARY KEY (`userID`);

--

-- Indexes for table `suppliers`

--

ALTER TABLE `suppliers` ADD PRIMARY KEY (`supplierID`);

--

-- AUTO_INCREMENT for dumped tables

--

--

-- AUTO_INCREMENT for table `orders`

--

ALTER TABLE
    `orders`
MODIFY
    `orderID` int(5) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 15;

--

-- AUTO_INCREMENT for table `meals`

--

ALTER TABLE
    `meals`
MODIFY
    `mealID` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 7;

--

-- AUTO_INCREMENT for table `users`

--

ALTER TABLE
    `users`
MODIFY
    `userID` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 10;

--

-- AUTO_INCREMENT for table `suppliers`

--

ALTER TABLE
    `suppliers`
MODIFY
    `supplierID` int(120) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 4;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;