-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2023 at 05:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friendzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `author_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created_at`, `author_id`, `content`) VALUES
(4, '2023-01-05 12:36:51', 11, 'This is my first post!'),
(5, '2023-01-05 12:37:09', 11, 'This is my second post!'),
(11, '2023-01-05 21:32:21', 12, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ipsum dolores facilis, voluptates quos nemo aperiam eius accusantium eos, ex totam nostrum velit praesentium corporis corrupti voluptatum fugit deleniti ratione.\r\nQuisquam labore accusantium nihil molestias voluptatibus dolores voluptatum nemo velit, animi beatae facere recusandae error, atque quas necessitatibus omnis reiciendis nam neque cumque possimus voluptas laboriosam? Quis ipsum maiores esse.\r\nMaiores, error, ipsam fuga quo pariatur quisquam mollitia provident quas, animi modi omnis at unde ad doloribus dicta nemo quod illum iste fugiat necessitatibus ut? Tempora quod fugiat harum pariatur.\r\nRecusandae, impedit culpa laudantium est amet accusantium nisi ea quibusdam quidem exercitationem, earum, minima non consequuntur nobis optio assumenda magni sit ipsam ipsum commodi neque debitis? Deleniti voluptatem obcaecati dolorum?'),
(12, '2023-01-05 21:32:38', 12, 'Quis ipsum maiores esse. Maiores, error, ipsam fuga quo pariatur quisquam mollitia provident quas, animi modi omnis at unde ad doloribus dicta nemo quod illum iste fugiat necessitatibus ut? Tempora quod fugiat harum pariatur.'),
(14, '2023-01-05 21:44:15', 13, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci neque blanditiis enim tempora quis, laudantium vero esse quia, doloribus ut eius aspernatur eos quaerat sapiente minima explicabo consectetur laborum suscipit?'),
(15, '2023-01-05 21:44:23', 13, 'This is my second post!!!!!!'),
(16, '2023-01-05 21:45:04', 12, 'jQuery is a fast, small, and feature-rich JavaScript library. It makes things like HTML document traversal and manipulation, event handling, animation, and Ajax much simpler with an easy-to-use API that works across a multitude of browsers. With a combination of versatility and extensibility, jQuery has changed the way that millions of people write JavaScript.'),
(25, '2023-01-07 13:19:58', 15, 'Ruff waggy wags ruff noodle horse borkdrive long water shoob, h*ck very hand that feed shibe doing me a frighten porgo. Heckin good boys and girls shooberino such treat extremely cuuuuuute you are doing me a frighten lotsa pats, long bois many pats he made many woofs borkdrive. Super chub porgo big ol heck, puggorino pupper.  Pupper waggy wags thicc lotsa pats, he made many woofs stop it fren. Noodle horse heck pupper borkdrive thicc waggy wags, heckin porgo heckin good boys. Shooberino borkdrive sub woofer borking doggo extremely cuuuuuute, yapper floofs.  Yapper floofs smol heckin good boys, shoob ruff.\r\n'),
(26, '2023-01-07 13:21:01', 18, 'Hellooooooooo!!!! ^^');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `biography` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `biography`) VALUES
(11, 'Thomas', 'Buckley', 'buckleythomas92@gmail.com', '$2y$10$hmdQV3Of8.IF7Bp8N78bdOBbbkwRBa7NVl.JaPNpxb.4W4L8SsoJ.', '07764998447', 'My name is Tomas, I am 30 years old and I am studying computer science!!!'),
(12, 'Hannah', 'Smith', 'hannah@test.com', '$2y$10$4pWDUtCQg/dRFnfUFkeg9uRntOsEfDVW5tT.HeXS/KKispHygJibW', '07432421286', 'Hello my name is Hannah!'),
(13, 'Ki', 'Na', 'nagajuda@test.com', '$2y$10$FwpM6e71rII7ROOFMFBMx.0jmiYbyBm7NZUACYOCb17r.Et2.keSm', '010748364827', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci neque blanditiis enim tempora quis, laudantium vero esse quia, doloribus ut eius aspernatur eos quaerat sapiente minima explicabo consectetur laborum suscipit?'),
(14, 'r332r32r32', 'r332rr2332r', 'hannah@test.32r', '$2y$10$rcGvIx9gmPs2rSdFKaY.Au9lBrFQOhNeegedOdaoyvFAU6Jr4dmvy', 'r3223r32r3r2', '3rr32r323r2'),
(15, 'Toffee', 'Oakes', 'toffee@test.com', '$2y$10$snKg.VriqlY5Yh8vX2fUZu7K.IRZBPqC/54.aU.HLf1z.SwkYSVdu', '01093844857', 'I am a dog woof woof!'),
(16, 'Andrew', 'Kim', 'andrew@test.com', '$2y$10$dLYQGF7ubXnTJYleZdlKMOQZzcxHOLoiky9DYv1TFufIsb6UsCGM.', '01074857383', 'I am Andrew, nice to meet you!'),
(17, 'Snow', 'White', 'snow@test.com', '$2y$10$osa8tAO2YR9ygw3uwiGPUON84bzNg3Nb48q8ZD0VSck.qnpDyamHW', '019384756', 'I am snow white'),
(18, 'Laura', 'Bux', 'laura@test.com', '$2y$10$tIFNapSB3pav/4J1SdBapuzWM3VaCgId3pSDU.JVmzem073jtKiU.', '0778654665', 'Hello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
