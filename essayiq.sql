-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2026 at 02:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `essayiq`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `instructions` text DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `max_score` int(11) NOT NULL DEFAULT 100,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `instructor_id`, `title`, `description`, `instructions`, `due_date`, `max_score`, `created_at`) VALUES
(1, 2, 'try1', 'try1', 'not req', '2026-10-23 22:10:00', 100, '2026-10-23 13:11:11'),
(2, 2, 'try2', 'try2', 'try', '2026-10-23 16:14:00', 100, '2026-10-23 13:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token_hash` varchar(64) NOT NULL,
  `expires_at` datetime NOT NULL,
  `used_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `attempts` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `user_id`, `token_hash`, `expires_at`, `used_at`, `created_at`, `attempts`) VALUES
(4, 1, 'f38f5ed19f6f4a13640e1d68e09df54a35aa2f732ffd6db29d46b150addede8c', '2026-10-22 23:18:00', '2026-10-22 23:08:33', '2026-10-22 20:03:00', 0),
(5, 1, 'a892191bc6c01941e8a8941b1cfeb011bedce8a1981992ede4d05a5d2ba52fee', '2026-10-22 23:13:33', '2026-10-22 23:14:24', '2026-10-22 20:08:33', 0),
(6, 1, '482a3ca14609b6affc99aa2346668c757fe6e1c2a9844811fcea0f842c74c5a9', '2026-10-22 23:19:24', '2026-10-22 23:15:25', '2026-10-22 20:14:24', 0),
(7, 1, '765722a3783f32bf038a961586ba088510e4fd3870d26b209e104ba3bcc172c6', '2026-10-22 23:20:25', '2026-10-22 23:17:26', '2026-10-22 20:15:25', 0),
(8, 1, 'fd5b3f080b45455840690083b190a0ef0a6fc3231bc1bcbd813e054587b99a50', '2026-10-22 23:22:26', '2026-10-22 23:17:30', '2026-10-22 20:17:26', 0),
(9, 1, '9553663317fa7b5ade72adb35241b5a6923d94fc9e2d44fa4f4ee491db68420f', '2026-10-22 23:22:30', '2026-10-22 23:18:10', '2026-10-22 20:17:30', 0),
(10, 1, '260ce49db9c3e4ac78fd1e1007a7a21f853b306de6d9fb2a99c89cb5ca26e287', '2026-10-22 23:24:38', '2026-10-22 23:21:21', '2026-10-22 20:19:38', 0),
(11, 1, 'a022b5d27241086a241ed2936f20172fb9e2e82304bfe777748902a65182eaa7', '2026-10-22 23:26:21', '2026-10-22 23:21:28', '2026-10-22 20:21:21', 0),
(12, 1, 'ee7f5b82719b96605cc33a0afc43363496f109c7ad856626cba693919c36c05e', '2026-10-22 23:26:28', '2026-10-22 23:21:52', '2026-10-22 20:21:28', 0),
(13, 1, '1fb1cc936af7665baec4bcad1320c19563181d5f9aa64dd6bf11b287412a1870', '2026-10-22 23:32:17', '2026-10-22 23:27:37', '2026-10-22 20:27:17', 0),
(14, 1, 'a98a5253b4983ad9401d973846049a9c2d61ecaa0440e128e3cd31fe091d2f9b', '2026-10-22 23:33:56', '2026-10-22 23:29:19', '2026-10-22 20:28:56', 0),
(15, 1, '43646a93254773ae2e04ec002d298a37f50157dfe16dd47e0d5fd53de5a6fb86', '2026-10-22 23:39:47', '2026-10-22 23:35:37', '2026-10-22 20:34:47', 0),
(16, 1, '6b690c78c2d527bbb1a453115165c342dc3d05014395274336df3f362092ad84', '2026-10-24 15:03:45', '2026-10-24 15:01:06', '2026-10-24 11:58:45', 0),
(17, 1, '3f08142cc47ce81b9bcbe3fa85f373fabe739b0072360bd0d055d0422a95f561', '2026-10-24 15:32:22', NULL, '2026-10-24 12:27:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `essay_text` longtext NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL DEFAULT 'Pending',
  `grade` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(190) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','instructor','admin') NOT NULL DEFAULT 'student',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'user1', 'user1@gmail.com', '$2y$10$ck4e3Crq7UKd88tb5kOKEu4Ebf1N5aNxH38b9T1.QqPIjs.R.2S2y', 'student', '2026-10-22 18:29:33'),
(2, 'user2', 'user2@gmail.com', '$2y$10$9VZhqfSMZYEIJGkp/h.5peurp9q34A9Ex0J66D6M3ncIEbJkgXn7G', 'instructor', '2026-10-22 19:00:38'),
(3, 'user3', 'user3@gmail.com', '$2y$10$e1QrzweFf/rVr0c1pThdqu84t2wM2Od6xh.9fgtZWkhYZFPbq4bbm', 'instructor', '2026-10-24 09:36:26'),
(4, 'EssayIQ Admin', 'admin@essayiq.com', '$2y$10$hLx2NesUm9kEh8GKLk80CuqfedRFpNU2IofmCCQIlmR.jjJD6mlKC', 'admin', '2026-10-24 12:32:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token_hash` (`token_hash`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `assignment_id` (`assignment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
