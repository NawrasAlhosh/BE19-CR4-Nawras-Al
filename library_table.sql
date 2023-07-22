-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2023 at 12:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BE19_CR4_NawrasAlhosh_BigLibrary.`
--

-- --------------------------------------------------------

--
-- Table structure for table `library_table`
--

CREATE TABLE `library_table` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ISBN_code` varchar(20) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `author_first_name` varchar(100) NOT NULL,
  `author_last_name` varchar(100) NOT NULL,
  `publisher_name` varchar(200) NOT NULL,
  `publisher_address` varchar(255) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_table`
--

INSERT INTO `library_table` (`id`, `title`, `image`, `ISBN_code`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status`) VALUES
(1, 'The Catcher in the Rye', 'https://cdn.pixabay.com/photo/2016/06/01/06/26/open-book-1428428_1280.jpg', '9780316769488', 'A coming-of-age novel by J.D. Salinger', 'book', 'J.D.', 'Salinger', 'Film Studios', '789 Library Lane, City, Country', '1951-07-16', 'available'),
(4, 'The Secret Garden foolish', 'https://cdn.pixabay.com/photo/2018/04/23/18/40/leaf-3345134_1280.jpg', '', 'a book that mixes fantasy with real life.', 'book', 'Frances', 'Hodgson Burnett', 'Penguin Classics', '123 Book Street, City, Country', '1998-05-01', 'available'),
(5, '1984', 'https://cdn.pixabay.com/photo/2013/07/13/10/04/big-brother-156468_1280.png', '9780451524935', 'A dystopian novel by George Orwell', 'book', 'George', 'Orwell', 'Film Studios', '456 Novel Avenue, City, Country', '1949-06-08', 'not available'),
(6, 'The Matrix', 'https://cdn.pixabay.com/photo/2018/01/17/20/22/analytics-3088958_1280.jpg', '9781234567890', 'A sci-fi action movie', 'DVD', 'Lana', 'Wachowski', 'Film Studios', '555 Cinema Avenue, City, Country', '1999-03-31', 'available'),
(7, 'Inception', 'https://cdn.pixabay.com/photo/2018/03/27/09/53/sunset-3265473_1280.jpg', '9780987654321', 'A mind-bending thriller', 'DVD', 'Christopher', 'Nolan', 'Penguin Classics', '777 Drama Street, City, Country', '2010-07-16', 'not available'),
(8, 'Jurassic Park', 'https://cdn.pixabay.com/photo/2014/03/10/16/03/tyrannosaurus-rex-284554_1280.jpg', '9785678901234', 'An adventure film with dinosaurs', 'DVD', 'Steven', 'Spielberg', 'Universal Pictures', '456 Blockbuster Road, City, Country', '1993-06-11', 'available'),
(9, 'Greatest Hits', 'https://cdn.pixabay.com/photo/2013/07/13/11/28/jewel-case-158216_1280.png', 'CD1234567890', 'A collection of popular songs', 'CD', 'Various', 'Artists', 'Universal Pictures', '789 Melody Road, City, Country', '2005-12-15', 'not available'),
(10, 'Classical Symphony', 'https://cdn.pixabay.com/photo/2012/04/18/20/36/pipe-37816_1280.png', 'CD9876543210', 'A compilation of classical compositions', 'CD', 'Various', 'Composers', 'Universal Pictures', '101 Sonata Street, City, Country', '2010-08-22', 'available'),
(29, 'To Kill a Mockingbird', 'https://cdn.pixabay.com/photo/2020/10/24/01/17/bird-5680345_1280.jpg', '9780061120084', '[A classic novel by Harper Lee', 'book', 'Harper', 'Lee', 'Penguin Classics', '101 Mockingbird Road, City, Country', '1960-07-11', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `library_table`
--
ALTER TABLE `library_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `library_table`
--
ALTER TABLE `library_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
