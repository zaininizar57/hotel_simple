-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 08:51 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id`, `title`, `price`, `foto`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 'Special adsfsa', 400000, '1.-standard-room-sumber-gambar-Pixabay.jpg', 'lorem ipsum dolor sit amet consecteture\r\n', '2022-02-26 05:23:07', '2022-02-26 05:23:07'),
(3, 'Standard Room', 1500000, '2.-Superior-Room-sumber-gambar-Pixabay.jpg', ' jenis kamar standard room adalah tipe kamar hotel yang paling dasar di hotel.', '2022-02-26 05:30:28', '2022-02-26 05:30:28'),
(4, 'Superior Room', 2500000, 'boxed-water-is-better-X5UrOwSCYYI-unsplash (1).jpg', 'Pada dasarnya, superior room adalah tipe kamar yang sedikit lebih baik dari tipe standard room. Perbedaannya dapat berupa dari fasilitas yang diberikan, interior kamar, atau pemandangan dari kamar.', '2022-02-26 05:32:13', '2022-02-26 05:32:13'),
(5, 'Deluxe Room', 1700000, 'chastity-cortijo-M8iGdeTSOkg-unsplash.jpg', 'Di atas tipe kamar hotel superior room adalah deluxe room. Kamar ini tentu memiliki kamar yang lebih besar', '2022-02-26 05:33:11', '2022-02-26 05:33:11'),
(6, 'Junior Suite Room', 400000, 'Asam_pedas_ikan_laut-removebg-preview.png', 'Tipe kamar hotel junior suite room ditandai dengan adanya ruang tamu. Namun, ruang tamu tersebut masih berada satu ruangan dengan tempat tidur.', '2022-02-26 05:34:03', '2022-02-26 05:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `kamar_id` bigint(20) NOT NULL,
  `day_total` int(11) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `price_total` double NOT NULL,
  `payed_status` tinyint(1) DEFAULT 0,
  `check_in` timestamp NULL DEFAULT NULL,
  `check_out` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `kamar_id`, `day_total`, `jumlah_kamar`, `price_total`, `payed_status`, `check_in`, `check_out`, `created_at`, `updated_at`) VALUES
(3454, 10, 2, 2, 3, 2400000, 0, '2022-03-07 00:32:38', NULL, '2022-03-07 06:32:38', '2022-03-07 06:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL DEFAULT 3,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `nama_lengkap`, `email`, `password`, `created_at`, `updated_at`) VALUES
(3, 2, 'Ahmad Zaini Nijar', 'zaininizar7610@gmail.com', '$2y$10$qklHXY8kLW/YEdOWXIVbm.BN0tAw570mESH88TptHVCuf7QVxZOMy', '2022-02-24 01:32:05', '2022-02-24 01:32:05'),
(10, 3, 'Suwandi', 'wandi123@gmail.com', '$2y$10$cWt9I/JCaCUTtMaBqv9tQ.zXeY.9DoDHD3Sap/GwvDgKwfN.FnZu6', '2022-02-24 01:42:00', '2022-02-24 01:42:00'),
(11, 1, 'admin', 'admin123@gmail.com', '$2y$10$d3pW0joNvLNgj540glimSu9NnYt.sCogv.ADXsKWmyHTAUQ39e6MK', '2022-02-24 03:19:39', '2022-02-24 03:19:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `kamar_id` (`kamar_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9140;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`kamar_id`) REFERENCES `kamar` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
