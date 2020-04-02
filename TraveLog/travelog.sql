-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2020 at 07:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelog`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `verification_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created`, `modified`, `active`, `verification_hash`) VALUES
(11, 'Clouse', '$2y$10$YI/NBdIn7QQ5pbcu/hlol.Rq3cKnJ/andwe9SEClO4bwJJ8Afw2Wy', 'vilius.grimalauskas@gmail.com', '2020-04-02 02:32:21', '2020-04-02 02:32:21', 0, 'cd00692c3bfe59267d5ecfac5310286c'),
(13, 'd', '$2y$10$aukPe0vo7uzZzTGT7w4/1.kCaAt/yITfjPB4bACFE.efNVlFiU716', 'test@test.com', '2020-04-02 02:56:08', '2020-04-02 02:56:08', 0, 'e5f6ad6ce374177eef023bf5d0c018b6'),
(14, 'dasdas', '$2y$10$ZUYJDb5yybsZvmlUzKHaQuduNvN701uQ6LBDDT0sTwygP17wIccQS', 'ddd@fff.com', '2020-04-02 16:23:35', '2020-04-02 16:23:35', 0, '632cee946db83e7a52ce5e8d6f0fed35'),
(15, 'tomas123', '$2y$10$bRgH2BNmQ1bjzfhJDDJTTOWWvX6USTeJknb7YqK.tEZOoIai2OqkC', 'tomas@gmail.com', '2020-04-02 17:15:07', '2020-04-02 17:15:07', 0, '6c524f9d5d7027454a783c841250ba71'),
(16, 'vilius112', '$2y$10$JZwl8/m66Qeihzbc0ma4meyGu.fOPkoBvZp5w4iEqmYQ2IQwuZrC.', 'vilius@gmail.com', '2020-04-02 18:19:50', '2020-04-02 18:19:50', 0, 'c3e878e27f52e2a57ace4d9a76fd9acf'),
(17, 'labas', '$2y$10$H19ygnD/vDdTkaJAtuRm6OcSK20feYXpVouD5BRSwbPVAVe/kV4y2', 'bbb@dsag.com', '2020-04-02 20:25:30', '2020-04-02 20:25:30', 0, 'e744f91c29ec99f0e662c9177946c627');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
