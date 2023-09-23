-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 08:39 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_teknologi2`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `created_at`, `image_path`) VALUES
(6, 'Ada Kebakaran', 'Tidak ada', '2023-08-22 08:34:42', 'article_images/1692693282_boy.png'),
(7, 'Kebanjiran', 'Ada kebanjiran di suatu tempat', '2023-08-30 06:51:17', 'article_images/1693378277_5.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` int(10) NOT NULL,
  `instance` varchar(255) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `schedule_start` time(5) NOT NULL,
  `schedule_end` time(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `number`, `instance`, `profession`, `schedule_start`, `schedule_end`) VALUES
(0, '1', 1, '12', 'Firefighter', '02:39:00.00000', '04:44:00.00000');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `id_report` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id_notes` int(11) NOT NULL,
  `title` varchar(255) DEFAULT '(Tanpa judul)',
  `content` longtext DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `self_test`
--

CREATE TABLE `self_test` (
  `id_question` int(11) NOT NULL,
  `question` text NOT NULL,
  `option` enum('Iya, lebih dari biasanya','Sama saja seperti biasanya','Kurang dari biasanya','Sangat berkurang dari biasanya','Sangat berkurang dari biasanya') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `self_test`
--

INSERT INTO `self_test` (`id_question`, `question`, `option`) VALUES
(1, 'Dalam satu bulan terakhir, apakah kamu merasa tidak sanggup mengatasi kesulitan?', 'Iya, lebih dari biasanya'),
(2, 'Dalam satu bulan terakhir, apakah kamu merasa tidak bahagia dan tertekan?', 'Iya, lebih dari biasanya'),
(3, 'Dalam satu bulan terakhir, apakah kamu merasa sulit untuk mengambil keputusan?', 'Iya, lebih dari biasanya'),
(4, 'Dalam satu bulan terakhir, kamu merasa mampu melakukan hal-hal yang bermanfaat dalam hidup?', 'Iya, lebih dari biasanya'),
(5, 'Dalam satu bulan terakhir, apakah kamu bisa menikmati kegiatan atau pekerjaan sehari-harimu?', 'Iya, lebih dari biasanya'),
(6, 'Dalam satu bulan terakhir, apakah kamu merasa sulit untuk mengambil keputusan?', 'Iya, lebih dari biasanya'),
(7, 'Dalam satu bulan terakhir, apakah kamu susah tidur karena khawatir?', 'Iya, lebih dari biasanya'),
(8, 'Dalam satu bulan terakhir, apakah kamu bisa berkonsentrasi pada hal-hal yang sedang kamu kerjakan', 'Iya, lebih dari biasanya'),
(9, 'Dalam satu bulan terakhir, apakah kamu bisa menghadapi masalah-masalah yang ada?', 'Iya, lebih dari biasanya'),
(10, 'Dalam satu bulan terakhir, seberapa sering Anda merasa telah menjadi orang yang bahagia?', 'Iya, lebih dari biasanya');

-- --------------------------------------------------------

--
-- Table structure for table `sos_report`
--

CREATE TABLE `sos_report` (
  `id_report` int(11) NOT NULL,
  `outgoing_id` int(11) NOT NULL,
  `story` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `place` varchar(255) NOT NULL,
  `perpetrator` varchar(255) NOT NULL,
  `evidence` text NOT NULL,
  `incoming_id` int(11) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `NIS` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT '''siswa''',
  `status` varchar(20) NOT NULL DEFAULT '''pending''',
  `acc_status` varchar(30) DEFAULT '''Non-active''',
  `photo` text NOT NULL DEFAULT '\'dafault-profile.jpg\'',
  `password` varchar(255) DEFAULT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `NIS`, `name`, `gender`, `role`, `status`, `acc_status`, `photo`, `password`, `gambar`) VALUES
(109, '1', 'admin', 'male', 'admin', 'approved', 'Online', 'default-profile.jpg', '$2y$10$d7TwI9gXU42DVGP7GRi.3eNfpvJ67X2ukJk/y/yZ1.4wLdlvylvYy', ''),
(110, '2', 'proffesional2', 'female', 'professional', 'approved', 'Online', 'default-profile.jpg', '$2y$10$U5iPr6mQ7hwJxyyH1XJVW.fxWOYT/QHZcMPoukCu/pEuOWV5GfWoy', ''),
(112, '3', 'pasien3', 'female', 'siswa', 'approved', 'Online', 'default-profile.jpg', '$2y$10$VEjPnVYGQYbM4nqropFZ.O2frF/Z5RtTv9n2HEFgi7ZMRoJe6q3ZW', ''),
(113, '6', 'pasien2', 'male', 'siswa', 'approved', 'Offline', 'default-profile.jpg', '$2y$10$kWHOFnOLTYklTQVx6Hs99eW6mzYbBk9OjCwTb3GQHTPXB/xHTGVtq', ''),
(115, '40', 'proffesional', 'male', 'professional', 'approved', 'Online', 'default-profile.jpg', '$2y$10$K57j5w/m.FN/7SDwcGlv5OA13zndQ4Y1rNljQcbtC50XW0qLECyF2', ''),
(118, '4', 'pasien4', 'female', 'siswa', 'pending', '\'Non-active\'', 'default-profile.jpg', '$2y$10$j0rtS319icIbD2xegNuGnuNfXIsnubAn6KiADR9.sgpx2ujpzZkvy', 'user_64eef8e888dd9.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_notes`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `self_test`
--
ALTER TABLE `self_test`
  ADD PRIMARY KEY (`id_question`);

--
-- Indexes for table `sos_report`
--
ALTER TABLE `sos_report`
  ADD PRIMARY KEY (`id_report`),
  ADD KEY `id` (`outgoing_id`),
  ADD KEY `id_psikolog` (`incoming_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id_notes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `self_test`
--
ALTER TABLE `self_test`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sos_report`
--
ALTER TABLE `sos_report`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `sos_report`
--
ALTER TABLE `sos_report`
  ADD CONSTRAINT `sos_report_ibfk_1` FOREIGN KEY (`outgoing_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `sos_report_ibfk_2` FOREIGN KEY (`incoming_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
