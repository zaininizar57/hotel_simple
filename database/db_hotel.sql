-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2022 at 07:18 AM
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
-- Table structure for table `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id` bigint(20) NOT NULL,
  `kamar_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id`, `kamar_id`, `title`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(1, 4, 'TV 32 Inc', 'TV LED 32 Inci tersedia', 'fabio-silva-nmTm7knUnqs-unsplash.jpg', '2022-03-08 06:05:23', '2022-03-08 06:05:23'),
(2, 4, 'Air Conditioner', 'Lorem Ipsum dolor sit amet', 'alvaro-bernal-_Ib-JulMgzo-unsplash.jpg', '2022-03-08 06:08:40', '2022-03-08 06:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_umum`
--

CREATE TABLE `fasilitas_umum` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_umum`
--

INSERT INTO `fasilitas_umum` (`id`, `title`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(3, 'Kolam Renang', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia obcaecati vitae quas natus assumenda et quidem nisi. Ipsa, perspiciatis blanditiis. Error fugiat recusandae aperiam, corrupti ab vel iste ducimus? Delectus accusantium minus ab non, natus accusamus doloremque sit voluptates nihil?\r\n', 'edvin-johansson-rlwE8f8anOc-unsplash.jpg', '2022-03-08 02:10:58', '2022-03-08 02:10:58'),
(4, 'Lapangan Golf', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia obcaecati vitae quas natus assumenda et quidem nisi. Ipsa, perspiciatis blanditiis. Error fugiat recusandae aperiam, corrupti ab vel iste ducimus? Delectus ', 'ystallonne-alves-U_g9ZCqKAPA-unsplash.jpg', '2022-03-08 02:38:29', '2022-03-08 02:38:29'),
(5, 'Mini soccer field', 'It is 100 to 130 yards (90-120m) long and 50 to 100 yards (45-90m) wide. In international play the field dimensions are a bit stricter in that the length must be 110 to 120 yards (100 - 110m) long and 70 to 80 yards (64 - 75m) wide.', 'jonathan-petersson-ARU18GpF6QQ-unsplash.jpg', '2022-03-08 02:52:28', '2022-03-08 02:52:28'),
(6, 'Aestetic View', 'Aesthetic View also offers free vector illustrations and artwork that you can use in your designs. You can also download high-quality', 'vidar-nordli-mathisen-9HGqJq3vglc-unsplash.jpg', '2022-03-08 02:57:21', '2022-03-08 02:57:21');

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
(4, 'Superior Room', 2500000, 'boxed-water-is-better-X5UrOwSCYYI-unsplash (1).jpg', 'Pada dasarnya, superior room adalah tipe kamar yang sedikit lebih baik dari tipe standard room. Perbedaannya dapat berupa dari fasilitas yang diberikan, interior kamar, atau pemandangan dari kamar.', '2022-02-26 05:32:13', '2022-02-26 05:32:13'),
(5, 'Deluxe Room', 1700000, 'chastity-cortijo-M8iGdeTSOkg-unsplash.jpg', 'Di atas tipe kamar hotel superior room adalah deluxe room. Kamar ini tentu memiliki kamar yang lebih besar', '2022-02-26 05:33:11', '2022-02-26 05:33:11'),
(6, 'Junior Suite Room', 400000, '4.-Junior-Suite-Room-sumber-gambar-Pixabay.jpg', 'Tipe kamar hotel junior suite room ditandai dengan adanya ruang tamu. Namun, ruang tamu tersebut masih berada satu ruangan dengan tempat tidur.', '2022-02-26 05:34:03', '2022-02-26 05:34:03');

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
(9626, 3, 4, 2, 1, 5000000, 0, '2022-03-07 22:19:03', NULL, '2022-03-08 04:19:03', '2022-03-08 04:19:03'),
(9842, 3, 4, 2, 3, 15000000, 0, '2022-03-07 22:18:52', NULL, '2022-03-08 04:18:52', '2022-03-08 04:18:52');

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
-- Indexes for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kamar_id` (`kamar_id`);

--
-- Indexes for table `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fasilitas_umum`
--
ALTER TABLE `fasilitas_umum`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9843;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD CONSTRAINT `fasilitas_kamar_ibfk_1` FOREIGN KEY (`kamar_id`) REFERENCES `kamar` (`id`) ON DELETE CASCADE;

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
