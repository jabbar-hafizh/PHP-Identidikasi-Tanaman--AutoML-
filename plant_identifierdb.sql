-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2019 at 04:29 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plant_identifierdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `manfaat_tanaman`
--

CREATE TABLE `manfaat_tanaman` (
  `id` int(11) NOT NULL,
  `id_tanaman_fk` int(11) NOT NULL,
  `manfaat` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manfaat_tanaman`
--

INSERT INTO `manfaat_tanaman` (`id`, `id_tanaman_fk`, `manfaat`) VALUES
(1, 1, 'Meremajakan Kulit'),
(2, 1, 'Membantu diet'),
(3, 1, 'mencegah kangker'),
(4, 1, 'menurunkan gula darah'),
(6, 2, 'Menjaga kesehatan mata.'),
(7, 2, 'AntiRadang'),
(23, 15, 'Meningkatkan kesehatan tulang'),
(24, 15, 'mengatasi sembelit'),
(25, 15, 'melegakan tenggorokan'),
(26, 16, 'meningkatkan kekebalan tubuh'),
(27, 16, 'mengurangi nyeri di gusi dan gigi'),
(28, 16, 'mengobati tukak lambung'),
(29, 17, 'menyehatkan jantung'),
(30, 17, 'menjaga kadar gula darah'),
(31, 17, 'mengurangi resiko kangker'),
(32, 17, 'meningkatkan kekebalan tubuh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `id` int(5) NOT NULL,
  `nama_tanaman` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`id`, `nama_tanaman`) VALUES
(1, 'Jeruk Nipis'),
(2, 'Kangkung'),
(15, 'Bawang Merah'),
(16, 'Cengkeh'),
(17, 'Delima');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `namadep` varchar(100) NOT NULL,
  `namabel` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `username` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `namadep`, `namabel`, `email`, `password`, `status`, `username`) VALUES
(2, 'wahyu', 'nur arizky', 'wahyu@gmail.com', '1234', 'mahasiswa', 'wahyu'),
(3, 'dosen', 'web', 'dosen@gmail.com', '1234', 'dosen', 'dosen'),
(14, 'muhammad', 'samiaji', 'msamiaji@asdas.asda', '1234', 'admin', 'aji'),
(15, 'dosen', 'kedua', 'dosen2@gmail.com', '1234', 'dosen', 'dosen2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manfaat_tanaman`
--
ALTER TABLE `manfaat_tanaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manfaat_tanaman`
--
ALTER TABLE `manfaat_tanaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
