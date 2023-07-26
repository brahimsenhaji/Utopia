-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jul 22, 2023 at 09:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utopia_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(6) UNSIGNED NOT NULL,
  `property_id` int(6) UNSIGNED NOT NULL,
  `image_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `property_id`, `image_url`) VALUES
(154, 39, 'IMG-647b76de7af539.54096539.jpg'),
(155, 39, 'IMG-647b76de82da20.60572310.jpg'),
(156, 39, 'IMG-647b76de87bd31.46750109.jpg'),
(157, 39, 'IMG-647b76de8c7297.60292623.jpg'),
(158, 39, 'IMG-647b76de8de6b4.31737710.jpg'),
(159, 40, 'IMG-647cc42546a3c7.78913299.jpg'),
(160, 40, 'IMG-647cc42571b940.84873883.jpg'),
(161, 40, 'IMG-647cc4257f2386.94006092.jpg'),
(162, 40, 'IMG-647cc425c07c24.54996458.jpg'),
(163, 40, 'IMG-647cc426166076.61035227.jpg'),
(164, 41, 'IMG-6481e1a63c76e4.36747140.jpg'),
(165, 41, 'IMG-6481e1a63e08b2.21188113.jpg'),
(166, 41, 'IMG-6481e1a63f2ef1.11529232.jpg'),
(167, 41, 'IMG-6481e1a6405342.12837765.jpg'),
(168, 41, 'IMG-6481e1a6437377.13399187.jpg'),
(169, 42, 'IMG-64bad9e9676937.01669145.jpg'),
(170, 42, 'IMG-64bad9e974dd03.20619251.jpg'),
(171, 42, 'IMG-64bad9e9853cf3.22602358.jpg'),
(172, 42, 'IMG-64bad9e9928584.83281943.jpg'),
(173, 42, 'IMG-64bad9e9b324f7.01548890.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(6) UNSIGNED NOT NULL,
  `receiver_id` int(6) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_id`, `receiver_id`, `content`, `timestamp`, `is_read`) VALUES
(195, 2, 1, 'salam brahim', '2023-06-04 15:37:09', 1),
(197, 1, 2, 'salam hamza', '2023-06-04 15:39:54', 1),
(198, 2, 1, 'ana brahim', '2023-06-04 15:40:18', 1),
(199, 1, 2, 'ana hamza', '2023-06-04 15:40:30', 1),
(200, 2, 1, 'salam brahim ana hamza', '2023-06-04 16:14:47', 1),
(201, 2, 1, 'salam brahim ana hamza', '2023-06-04 16:15:14', 1),
(202, 2, 1, 'salam brahim', '2023-06-04 16:16:46', 1),
(203, 2, 1, 'hamza khray', '2023-06-04 16:47:39', 1),
(204, 2, 1, 'brahimaaaaaaaaaa', '2023-06-04 16:49:36', 1),
(205, 1, 2, 'hada nta', '2023-06-04 17:05:14', 1),
(206, 1, 2, 'salam', '2023-06-04 17:07:10', 1),
(207, 2, 1, 'jsfhhksajdfkasdgas 77', '2023-06-04 17:21:59', 1),
(208, 2, 1, 'jsfhhksajdfkasdgas 77', '2023-06-04 17:23:03', 1),
(209, 2, 1, 'salam brahim', '2023-06-04 17:23:16', 1),
(210, 2, 1, 'salam brahim ana hamza', '2023-06-04 17:24:10', 1),
(211, 2, 1, 'salam brahim ana hamza', '2023-06-04 17:25:32', 1),
(212, 1, 2, 'dffddgdfgdf', '2023-06-04 17:26:18', 1),
(213, 1, 2, '6566644', '2023-06-04 17:26:55', 1),
(214, 1, 2, '6566644', '2023-06-04 17:27:23', 1),
(215, 1, 2, '6566644', '2023-06-04 17:27:53', 1),
(216, 2, 1, 'salam brahim ana hamza', '2023-06-04 17:28:41', 1),
(217, 2, 1, 'salam brahim', '2023-06-04 17:30:00', 1),
(218, 2, 1, 'salam brahim', '2023-06-04 17:30:12', 1),
(219, 2, 1, 'salam brahim', '2023-06-04 17:30:20', 1),
(220, 2, 1, 'salam brahim', '2023-06-04 17:30:50', 1),
(221, 2, 1, 'salam brahim ana hamza', '2023-06-04 17:31:04', 1),
(222, 2, 1, '123456', '2023-06-04 17:32:41', 1),
(223, 2, 1, '123456', '2023-06-04 17:32:56', 1),
(224, 2, 1, '098765', '2023-06-04 17:33:04', 1),
(225, 2, 1, '098765', '2023-06-04 17:33:40', 1),
(226, 2, 1, 'r555erehd ', '2023-06-04 17:34:22', 1),
(227, 2, 1, 'salam brahim ana hamza', '2023-06-04 17:34:55', 1),
(228, 2, 1, '123456', '2023-06-04 17:37:19', 1),
(229, 2, 1, '0', '2023-06-04 17:38:40', 1),
(230, 2, 1, '1', '2023-06-04 17:39:58', 1),
(231, 2, 1, '1', '2023-06-04 17:40:40', 1),
(232, 2, 1, '2', '2023-06-04 17:41:52', 1),
(233, 2, 1, 'salam brahim', '2023-06-04 17:43:05', 1),
(234, 2, 2, 'dgdfgdfgdgf', '2023-06-04 17:43:15', 1),
(235, 2, 1, 'dgdfgdfgdgf', '2023-06-04 17:43:34', 1),
(236, 2, 1, 'vvvv', '2023-06-04 17:44:07', 1),
(237, 2, 1, 'vvvv', '2023-06-04 17:44:14', 1),
(238, 2, 1, 'vvvv', '2023-06-04 17:45:33', 1),
(239, 2, 1, 'salam brahim', '2023-06-04 17:45:50', 1),
(240, 2, 1, 'salam brahim', '2023-06-04 17:46:11', 1),
(241, 2, 1, 'dgdfgdfgdgf', '2023-06-04 17:46:18', 1),
(242, 2, 1, 'dgdfgdfgdgf', '2023-06-04 17:46:23', 1),
(243, 2, 1, 'dgdfgdfgdgf', '2023-06-04 17:49:19', 1),
(244, 2, 1, 'vvvv', '2023-06-04 17:50:46', 1),
(245, 2, 1, 'ssdsgfg', '2023-06-04 17:51:06', 1),
(246, 2, 1, 'ssdsgfg', '2023-06-04 17:51:16', 1),
(247, 2, 1, '9', '2023-06-04 17:55:17', 1),
(248, 2, 1, '9', '2023-06-04 17:55:25', 1),
(249, 2, 1, '2', '2023-06-04 17:57:05', 1),
(250, 2, 1, '', '2023-06-04 17:57:14', 1),
(251, 2, 1, '', '2023-06-04 17:57:17', 1),
(252, 2, 1, '7', '2023-06-04 17:57:23', 1),
(253, 2, 1, '', '2023-06-04 17:57:28', 1),
(254, 2, 1, '', '2023-06-04 17:58:17', 1),
(255, 2, 1, '', '2023-06-04 17:59:58', 1),
(256, 2, 1, '7', '2023-06-04 18:00:20', 1),
(257, 2, 1, 'salam hamza ana brahim', '2023-06-04 18:00:26', 1),
(258, 2, 1, '', '2023-06-04 18:00:29', 1),
(259, 2, 1, '4', '2023-06-04 18:00:35', 1),
(260, 2, 1, '12', '2023-06-04 18:00:56', 1),
(261, 2, 1, '12', '2023-06-04 18:01:29', 1),
(262, 2, 1, '0', '2023-06-04 18:02:29', 1),
(263, 2, 1, 'salam brahim ana hamza', '2023-06-04 18:03:12', 1),
(264, 2, 1, 'ssdsgfg', '2023-06-04 18:03:18', 1),
(265, 2, 1, 'vvvv', '2023-06-04 18:03:25', 1),
(266, 2, 1, 'ssdsgfg', '2023-06-04 18:03:55', 1),
(267, 2, 1, 'ssdsgfg', '2023-06-04 18:04:02', 1),
(268, 2, 1, 'salam brahim', '2023-06-04 18:04:08', 1),
(269, 2, 1, 'salam brahim', '2023-06-04 18:04:37', 1),
(270, 2, 1, 'salam brahim ana hamza', '2023-06-05 12:35:32', 1),
(271, 2, 1, 'salam brahim ana hamza', '2023-06-05 12:36:02', 1),
(272, 2, 1, 'dgdfgdfgdgf', '2023-06-05 12:36:08', 1),
(273, 2, 1, 'salam brahim', '2023-06-05 12:36:17', 1),
(274, 2, 1, 'salam brahim', '2023-06-05 12:36:24', 1),
(275, 2, 1, 'ssdsgfg', '2023-06-05 12:38:31', 1),
(276, 2, 1, 'ssdsgfg', '2023-06-05 12:39:00', 1),
(277, 2, 1, 'vvvv', '2023-06-05 12:40:11', 1),
(278, 2, 1, '1', '2023-06-05 12:41:09', 1),
(279, 2, 1, '4', '2023-06-05 12:46:54', 1),
(280, 2, 1, '2', '2023-06-05 12:47:42', 1),
(281, 2, 1, '1', '2023-06-05 12:51:03', 1),
(282, 2, 1, '4', '2023-06-05 12:51:12', 1),
(283, 2, 1, 'salam brahim', '2023-06-05 12:52:03', 1),
(284, 2, 1, '12898193891891731938', '2023-06-05 12:54:21', 1),
(285, 2, 1, 'dgdfgdfgdgf', '2023-06-05 12:56:26', 1),
(286, 2, 1, '1', '2023-06-05 12:56:56', 1),
(287, 2, 1, '1', '2023-06-05 12:57:11', 1),
(288, 2, 1, 'ssdsgfg', '2023-06-05 12:58:35', 1),
(289, 2, 1, 'ssdsgfg', '2023-06-05 12:59:36', 1),
(290, 2, 1, 'ssdsgfg', '2023-06-05 12:59:54', 1),
(291, 2, 1, '', '2023-06-05 13:00:09', 1),
(292, 2, 1, '', '2023-06-05 13:00:18', 1),
(293, 2, 1, '1', '2023-06-05 13:00:28', 1),
(294, 2, 1, '', '2023-06-05 13:01:29', 1),
(296, 2, 1, 'dgdfgdfgdgf', '2023-06-05 13:03:49', 1),
(297, 2, 1, '1314', '2023-06-05 13:07:37', 1),
(298, 2, 1, 'dgdfgdfgdgf', '2023-06-05 13:12:20', 1),
(299, 2, 1, 'dgdfgdfgdgf', '2023-06-05 13:13:18', 1),
(300, 2, 1, 'salam brahim ana hamza', '2023-06-05 13:13:59', 1),
(301, 2, 1, 'salam hamza ana brahim', '2023-06-05 13:16:16', 1),
(302, 2, 1, 'ssdsgfg', '2023-06-05 13:18:27', 1),
(303, 2, 1, 'ssdsgfg', '2023-06-05 13:18:32', 1),
(304, 1, 2, 'ok', '2023-06-05 14:10:56', 1),
(305, 3, 1, 'salam brahim ana sara', '2023-06-07 15:26:18', 1),
(306, 3, 1, 'hhhhhhh', '2023-06-07 15:26:53', 1),
(307, 1, 2, '123456', '2023-06-07 17:41:55', 1),
(308, 1, 2, '123456', '2023-06-07 17:42:21', 1),
(309, 1, 2, '123456', '2023-06-07 17:42:24', 1),
(310, 1, 2, 'salam brahim ana hamza', '2023-06-07 17:42:29', 1),
(311, 1, 2, 'salam brahim ana hamza', '2023-06-07 17:42:53', 1),
(312, 1, 2, 'salam brahim ana hamza', '2023-06-07 17:43:14', 1),
(313, 1, 2, '123456', '2023-06-07 17:43:19', 1),
(314, 1, 2, '098765', '2023-06-07 17:43:30', 1),
(315, 1, 2, '098765', '2023-06-07 17:43:55', 1),
(316, 1, 2, '098765000000000000000000000', '2023-06-07 17:44:07', 1),
(317, 1, 2, 'salam hamza ana brahim', '2023-06-07 17:52:53', 1),
(318, 1, 2, '', '2023-06-07 17:53:02', 1),
(319, 1, 2, '', '2023-06-07 17:53:26', 1),
(320, 1, 2, 'ssdsgfg', '2023-06-07 17:53:34', 1),
(321, 1, 2, 'salam hamza ana brahim', '2023-06-07 17:53:43', 1),
(322, 1, 2, 'salam hamza ana brahim', '2023-06-07 17:54:06', 1),
(323, 1, 2, '098765000000000000000000000', '2023-06-07 17:54:40', 1),
(324, 1, 2, 'salam brahim', '2023-06-07 17:54:44', 1),
(325, 1, 2, '', '2023-06-07 17:54:47', 1),
(326, 1, 2, '', '2023-06-07 17:54:50', 0),
(327, 1, 2, 'salam hamza ana brahim', '2023-06-07 17:55:16', 0),
(328, 1, 2, 'salam hamza ana brahim', '2023-06-07 17:55:37', 0),
(329, 1, 2, 'salam hamza ana brahim', '2023-06-07 17:55:58', 0),
(330, 1, 2, 'salam hamza ana brahim', '2023-06-07 17:56:58', 0),
(331, 1, 2, '', '2023-06-07 17:57:07', 0),
(332, 1, 2, '', '2023-06-07 18:02:55', 0),
(333, 1, 2, 'salam brahim ana hamza', '2023-06-07 18:04:33', 0),
(334, 1, 2, 'vvvv', '2023-06-07 18:04:39', 0),
(335, 1, 2, 'vvvv', '2023-06-07 18:05:03', 0),
(336, 1, 2, 'kkkkkkk', '2023-06-07 18:10:02', 0),
(337, 1, 2, 'vvvv', '2023-06-07 18:14:58', 0),
(338, 1, 2, 'salam brahim ana hamza', '2023-06-07 18:15:06', 0),
(339, 2, 1, 'salam brahim', '2023-06-07 18:15:42', 1),
(340, 2, 1, 'salam brahim', '2023-06-07 18:17:14', 1),
(341, 2, 1, 'salam brahim', '2023-06-07 18:17:36', 1),
(342, 2, 1, 'vvvv', '2023-06-07 18:17:44', 1),
(343, 2, 1, '', '2023-06-07 18:17:48', 1),
(344, 1, 1, 'hhhhhhhhhh', '2023-06-07 18:18:47', 1),
(345, 1, 1, '123456', '2023-06-07 18:19:06', 1),
(346, 2, 1, '', '2023-06-07 18:19:48', 0),
(347, 2, 1, 'salam brahim', '2023-06-07 18:19:52', 1),
(348, 2, 1, '', '2023-06-07 18:20:00', 0),
(349, 2, 1, '', '2023-06-07 18:20:26', 0),
(350, 2, 1, '', '2023-06-07 18:21:12', 0),
(351, 2, 1, '', '2023-06-07 18:27:00', 0),
(352, 2, 1, '', '2023-06-07 18:27:44', 0),
(353, 2, 1, '', '2023-06-07 18:27:55', 0),
(354, 2, 1, '', '2023-06-07 18:29:06', 0),
(355, 2, 1, 'ssdsgfg', '2023-06-07 18:29:10', 0),
(356, 2, 1, '', '2023-06-07 18:29:12', 0),
(357, 2, 1, '', '2023-06-07 18:29:20', 0),
(358, 2, 1, '', '2023-06-07 18:29:43', 0),
(359, 2, 1, 'ssdsgfg', '2023-06-07 18:29:58', 0),
(360, 2, 1, 'ssdsgfg', '2023-06-07 18:30:22', 0),
(361, 2, 1, 'ssdsgfg', '2023-06-07 18:30:40', 0),
(362, 2, 1, '', '2023-06-07 18:30:49', 0),
(363, 2, 1, '', '2023-06-07 18:31:40', 0),
(364, 2, 1, '', '2023-06-07 18:31:55', 0),
(365, 2, 1, '', '2023-06-07 18:32:45', 0),
(366, 2, 1, '', '2023-06-07 18:33:39', 0),
(367, 2, 1, 'vvvv', '2023-06-07 18:33:44', 0),
(368, 2, 1, 'vvvv', '2023-06-07 18:34:09', 0),
(369, 2, 1, 'salam brahim', '2023-06-07 18:34:16', 0),
(370, 2, 1, 'vvvv', '2023-06-07 18:34:35', 0),
(371, 2, 1, 'dgdfgdfgdgf', '2023-06-07 18:34:56', 0),
(372, 2, 1, '', '2023-06-07 18:34:59', 0),
(373, 2, 1, 'vvvv', '2023-06-07 18:35:03', 0),
(374, 2, 1, 'vvvv', '2023-06-07 18:36:57', 0),
(375, 2, 1, 'salam brahim', '2023-06-07 18:37:11', 0),
(376, 2, 1, 'vvvv', '2023-06-07 18:38:30', 0),
(377, 2, 1, 'dgdfgdfgdgf', '2023-06-07 18:43:10', 0),
(378, 2, 1, 'ssdsgfg', '2023-06-07 18:43:16', 0),
(379, 3, 2, 'salam hamza', '2023-06-07 18:52:28', 0),
(380, 2, 3, 'salam sara', '2023-06-07 20:41:07', 1),
(381, 3, 2, 'hhhhhhhhhh', '2023-06-07 21:39:01', 0),
(382, 3, 1, '123456', '2023-06-07 21:39:08', 0),
(383, 1, 3, 'cv sara ', '2023-07-01 15:06:16', 0),
(384, 1, 2, 'hhhhhh ok ', '2023-07-01 15:06:28', 0),
(385, 4, 3, 'salam sara ana salah baghi nakrii had dar ', '2023-07-21 19:10:06', 1),
(386, 3, 4, 'salam salah mr7ba bik', '2023-07-21 19:12:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(6) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `floors` int(2) NOT NULL,
  `rooms` int(2) NOT NULL,
  `kitchen` int(2) NOT NULL,
  `bathroom` int(2) NOT NULL,
  `price` int(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `street_name` varchar(50) NOT NULL,
  `house_number` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `disruption` longtext DEFAULT NULL,
  `latitude` decimal(20,15) DEFAULT NULL,
  `longitude` decimal(20,15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `title`, `category`, `floors`, `rooms`, `kitchen`, `bathroom`, `price`, `city`, `street_name`, `house_number`, `created_at`, `disruption`, `latitude`, `longitude`) VALUES
(39, 1, 'House for sell', 'House', 2, 8, 2, 2, 10000000, 'Sidi Slimane', 'qt ghoumarynne rue 54', '37', '2023-06-03 18:22:38', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ducimus quisquam ullam quod quis, assumenda similique in odio, aut modi exercitationem blanditiis sequi vel nisi illo iusto, explicabo delectus voluptatum alias.', '34.254003948421460', '-5.932602171302135'),
(40, 2, 'House for rent', 'House', 1, 4, 1, 1, 15000, 'Sidi Slimane', 'qt goumarrynne rue 26', '36', '2023-06-04 18:04:37', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae excepturi repudiandae ab minus aperiam, consequatur suscipit temporibus blanditiis nisi sed. Fuga reprehenderit minima praesentium debitis qui impedit nostrum aut deserunt?\r\n', '34.254192492927120', '-5.932188141747895'),
(41, 3, 'Apartment for rent', 'House', 1, 4, 1, 1, 2500, 'Sidi Slimane', 'ghoummaryne rue 04', '67', '2023-06-08 15:11:50', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque quis nisi aspernatur ea deserunt accusamus dolor adipisci aliquam, molestias amet dolores recusandae! Possimus consectetur eos corrupti laboriosam, explicabo amet ut.\r\n', '34.253667752593950', '-5.929528028876577'),
(42, 4, 'House for rent', 'House', 2, 4, 2, 2, 4000, 'Kénitra', 'mimosa N610', '56', '2023-07-21 20:18:01', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque quis nisi aspernatur ea deserunt accusamus dolor adipisci aliquam, molestias amet dolores recusandae! Possimus consectetur eos corrupti laboriosam, explicabo amet ut.', '34.254030702953564', '-6.592134616267853');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `region` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id`, `region`) VALUES
(1, 'Tanger-Tétouan-Al Hoceïma'),
(2, 'l\'Oriental'),
(3, 'Fès-Meknès'),
(4, 'Rabat-Salé-Kénitra'),
(5, 'Béni Mellal-Khénifra'),
(6, 'Casablanca-Settat'),
(7, 'Marrakech-Safi'),
(8, 'Drâa-Tafilalet'),
(9, 'Souss-Massa'),
(10, 'Guelmim-Oued Noun'),
(11, 'Laâyoune-Sakia El Hamra'),
(12, 'Dakhla-Oued Ed Dahab');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) UNSIGNED NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` longtext NOT NULL,
  `user_phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_phone`) VALUES
(1, 'Ibrahim senhaji', 'brahimsenhaji33@gmail.com', '$2y$10$n8q8WCY.ek9D2Gkib5VHGeJpDMEopIlSBds.yH4b13jLLuAvkawDK', '0690488279'),
(2, 'hamza senhaji', 'brahimsenhaji36@gmail.com', '$2y$10$hBaAymR2UOfXEgq4EuTj2unqbqljRM2U55Cyu6EOpD6rQui8AxI4O', '0690488276'),
(3, 'sara senhaji', 'brahimsenhaji32@gmail.com', '$2y$10$bCCOBvEjgyGbivXjaKagb.GiRyNUhTnFU.T4T8TQCfKXV3VlKyia2', '0690488279'),
(4, 'Salah Elallai', 'salahelallali1@gmail.com', '$2y$10$MlK3UhcgTvEVx8g0cOr5k.X1rVsNfGuKBGqSLF9vPEhnOysRo2aBC', '0693775859');

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

CREATE TABLE `ville` (
  `id` int(11) NOT NULL,
  `ville` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`id`, `ville`, `region`) VALUES
(1, 'Aïn Harrouda', 6),
(2, 'Ben Yakhlef', 6),
(3, 'Bouskoura', 6),
(4, 'Casablanca', 6),
(5, 'Médiouna', 6),
(6, 'Mohammadia', 6),
(7, 'Tit Mellil', 6),
(8, 'Ben Yakhlef', 6),
(9, 'Bejaâd', 5),
(10, 'Ben Ahmed', 6),
(11, 'Benslimane', 6),
(12, 'Berrechid', 6),
(13, 'Boujniba', 5),
(14, 'Boulanouare', 5),
(15, 'Bouznika', 6),
(16, 'Deroua', 6),
(17, 'El Borouj', 6),
(18, 'El Gara', 6),
(19, 'Guisser', 6),
(20, 'Hattane', 5),
(21, 'Khouribga', 5),
(22, 'Loulad', 6),
(23, 'Oued Zem', 5),
(24, 'Oulad Abbou', 6),
(25, 'Oulad H\'Riz Sahel', 6),
(26, 'Oulad M\'rah', 6),
(27, 'Oulad Saïd', 6),
(28, 'Oulad Sidi Ben Daoud', 6),
(29, 'Ras El Aïn', 6),
(30, 'Settat', 6),
(31, 'Sidi Rahhal Chataï', 6),
(32, 'Soualem', 6),
(33, 'Azemmour', 6),
(34, 'Bir Jdid', 6),
(35, 'Bouguedra', 7),
(36, 'Echemmaia', 7),
(37, 'El Jadida', 6),
(38, 'Hrara', 7),
(39, 'Ighoud', 7),
(40, 'Jamâat Shaim', 7),
(41, 'Jorf Lasfar', 6),
(42, 'Khemis Zemamra', 6),
(43, 'Laaounate', 6),
(44, 'Moulay Abdallah', 6),
(45, 'Oualidia', 6),
(46, 'Oulad Amrane', 6),
(47, 'Oulad Frej', 6),
(48, 'Oulad Ghadbane', 6),
(49, 'Safi', 7),
(50, 'Sebt El Maârif', 6),
(51, 'Sebt Gzoula', 7),
(52, 'Sidi Ahmed', 7),
(53, 'Sidi Ali Ban Hamdouche', 6),
(54, 'Sidi Bennour', 6),
(55, 'Sidi Bouzid', 6),
(56, 'Sidi Smaïl', 6),
(57, 'Youssoufia', 7),
(58, 'Fès', 3),
(59, 'Aïn Cheggag', 3),
(60, 'Bhalil', 3),
(61, 'Boulemane', 3),
(62, 'El Menzel', 3),
(63, 'Guigou', 3),
(64, 'Imouzzer Kandar', 3),
(65, 'Imouzzer Marmoucha', 3),
(66, 'Missour', 3),
(67, 'Moulay Yaâcoub', 3),
(68, 'Ouled Tayeb', 3),
(69, 'Outat El Haj', 3),
(70, 'Ribate El Kheir', 3),
(71, 'Séfrou', 3),
(72, 'Skhinate', 3),
(73, 'Tafajight', 3),
(74, 'Arbaoua', 4),
(75, 'Aïn Dorij', 1),
(76, 'Dar Gueddari', 4),
(77, 'Had Kourt', 4),
(78, 'Jorf El Melha', 4),
(79, 'Kénitra', 4),
(80, 'Khenichet', 4),
(81, 'Lalla Mimouna', 4),
(82, 'Mechra Bel Ksiri', 4),
(83, 'Mehdia', 4),
(84, 'Moulay Bousselham', 4),
(85, 'Sidi Allal Tazi', 4),
(86, 'Sidi Kacem', 4),
(88, 'Sidi Taibi', 4),
(89, 'Sidi Yahya El Gharb', 4),
(90, 'Souk El Arbaa', 4),
(91, 'Akka', 9),
(92, 'Assa', 10),
(93, 'Bouizakarne', 10),
(94, 'El Ouatia', 10),
(95, 'Es-Semara', 11),
(96, 'Fam El Hisn', 9),
(97, 'Foum Zguid', 9),
(98, 'Guelmim', 10),
(99, 'Taghjijt', 10),
(100, 'Tan-Tan', 10),
(101, 'Tata', 9),
(102, 'Zag', 10),
(103, 'Marrakech', 7),
(104, 'Ait Daoud', 7),
(115, 'Amizmiz', 7),
(116, 'Assahrij', 7),
(117, 'Aït Ourir', 7),
(118, 'Ben Guerir', 7),
(119, 'Chichaoua', 7),
(120, 'El Hanchane', 7),
(121, 'El Kelaâ des Sraghna', 7),
(122, 'Essaouira', 7),
(123, 'Fraïta', 7),
(124, 'Ghmate', 7),
(125, 'Ighounane', 8),
(126, 'Imintanoute', 7),
(127, 'Kattara', 7),
(128, 'Lalla Takerkoust', 7),
(129, 'Loudaya', 7),
(130, 'Lâattaouia', 7),
(131, 'Moulay Brahim', 7),
(132, 'Mzouda', 7),
(133, 'Ounagha', 7),
(134, 'Sid L\'Mokhtar', 7),
(135, 'Sid Zouin', 7),
(136, 'Sidi Abdallah Ghiat', 7),
(137, 'Sidi Bou Othmane', 7),
(138, 'Sidi Rahhal', 7),
(139, 'Skhour Rehamna', 7),
(140, 'Smimou', 7),
(141, 'Tafetachte', 7),
(142, 'Tahannaout', 7),
(143, 'Talmest', 7),
(144, 'Tamallalt', 7),
(145, 'Tamanar', 7),
(146, 'Tamansourt', 7),
(147, 'Tameslouht', 7),
(148, 'Tanalt', 9),
(149, 'Zeubelemok', 7),
(150, 'Meknès‎', 3),
(151, 'Khénifra', 5),
(152, 'Agourai', 3),
(153, 'Ain Taoujdate', 3),
(154, 'MyAliCherif', 8),
(155, 'Rissani', 8),
(156, 'Amalou Ighriben', 5),
(157, 'Aoufous', 8),
(158, 'Arfoud', 8),
(159, 'Azrou', 3),
(160, 'Aïn Jemaa', 3),
(161, 'Aïn Karma', 3),
(162, 'Aïn Leuh', 3),
(163, 'Aït Boubidmane', 3),
(164, 'Aït Ishaq', 5),
(165, 'Boudnib', 8),
(166, 'Boufakrane', 3),
(167, 'Boumia', 8),
(168, 'El Hajeb', 3),
(169, 'Elkbab', 5),
(170, 'Er-Rich', 5),
(171, 'Errachidia', 8),
(172, 'Gardmit', 8),
(173, 'Goulmima', 8),
(174, 'Gourrama', 8),
(175, 'Had Bouhssoussen', 5),
(176, 'Haj Kaddour', 3),
(177, 'Ifrane', 3),
(178, 'Itzer', 8),
(179, 'Jorf', 8),
(180, 'Kehf Nsour', 5),
(181, 'Kerrouchen', 5),
(182, 'M\'haya', 3),
(183, 'M\'rirt', 5),
(184, 'Midelt', 8),
(185, 'Moulay Ali Cherif', 8),
(186, 'Moulay Bouazza', 5),
(187, 'Moulay Idriss Zerhoun', 3),
(188, 'Moussaoua', 3),
(189, 'N\'Zalat Bni Amar', 3),
(190, 'Ouaoumana', 5),
(191, 'Oued Ifrane', 3),
(192, 'Sabaa Aiyoun', 3),
(193, 'Sebt Jahjouh', 3),
(194, 'Sidi Addi', 3),
(195, 'Tichoute', 8),
(196, 'Tighassaline', 5),
(197, 'Tighza', 5),
(198, 'Timahdite', 3),
(199, 'Tinejdad', 8),
(200, 'Tizguite', 3),
(201, 'Toulal', 3),
(202, 'Tounfite', 8),
(203, 'Zaouia d\'Ifrane', 3),
(204, 'Zaïda', 8),
(205, 'Ahfir', 2),
(206, 'Aklim', 2),
(207, 'Al Aroui', 2),
(208, 'Aïn Bni Mathar', 2),
(209, 'Aïn Erreggada', 2),
(210, 'Ben Taïeb', 2),
(211, 'Berkane', 2),
(212, 'Bni Ansar', 2),
(213, 'Bni Chiker', 2),
(214, 'Bni Drar', 2),
(215, 'Bni Tadjite', 2),
(216, 'Bouanane', 2),
(217, 'Bouarfa', 2),
(218, 'Bouhdila', 2),
(219, 'Dar El Kebdani', 2),
(220, 'Debdou', 2),
(221, 'Douar Kannine', 2),
(222, 'Driouch', 2),
(223, 'El Aïoun Sidi Mellouk', 2),
(224, 'Farkhana', 2),
(225, 'Figuig', 2),
(226, 'Ihddaden', 2),
(227, 'Jaâdar', 2),
(228, 'Jerada', 2),
(229, 'Kariat Arekmane', 2),
(230, 'Kassita', 2),
(231, 'Kerouna', 2),
(232, 'Laâtamna', 2),
(233, 'Madagh', 2),
(234, 'Midar', 2),
(235, 'Nador', 2),
(236, 'Naima', 2),
(237, 'Oued Heimer', 2),
(238, 'Oujda', 2),
(239, 'Ras El Ma', 2),
(240, 'Saïdia', 2),
(241, 'Selouane', 2),
(242, 'Sidi Boubker', 2),
(243, 'Sidi Slimane', 2),
(244, 'Talsint', 2),
(245, 'Taourirt', 2),
(246, 'Tendrara', 2),
(247, 'Tiztoutine', 2),
(248, 'Touima', 2),
(249, 'Touissit', 2),
(250, 'Zaïo', 2),
(251, 'Zeghanghane', 2),
(252, 'Rabat', 4),
(253, 'Salé', 4),
(254, 'Ain El Aouda', 4),
(255, 'Harhoura', 4),
(256, 'Khémisset', 4),
(257, 'Oulmès', 4),
(258, 'Rommani', 4),
(259, 'Sidi Allal El Bahraoui', 4),
(260, 'Sidi Bouknadel', 4),
(261, 'Skhirate', 4),
(262, 'Tamesna', 4),
(263, 'Témara', 4),
(264, 'Tiddas', 4),
(265, 'Tiflet', 4),
(266, 'Touarga', 4),
(267, 'Agadir', 9),
(268, 'Agdz', 8),
(269, 'Agni Izimmer', 9),
(270, 'Aït Melloul', 9),
(271, 'Alnif', 8),
(272, 'Anzi', 9),
(273, 'Aoulouz', 9),
(274, 'Aourir', 9),
(275, 'Arazane', 9),
(276, 'Aït Baha', 9),
(277, 'Aït Iaâza', 9),
(278, 'Aït Yalla', 8),
(279, 'Ben Sergao', 9),
(280, 'Biougra', 9),
(281, 'Boumalne-Dadès', 8),
(282, 'Dcheira El Jihadia', 9),
(283, 'Drargua', 9),
(284, 'El Guerdane', 9),
(285, 'Harte Lyamine', 8),
(286, 'Ida Ougnidif', 9),
(287, 'Ifri', 8),
(288, 'Igdamen', 9),
(289, 'Ighil n\'Oumgoun', 8),
(290, 'Imassine', 8),
(291, 'Inezgane', 9),
(292, 'Irherm', 9),
(293, 'Kelaat-M\'Gouna', 8),
(294, 'Lakhsas', 9),
(295, 'Lakhsass', 9),
(296, 'Lqliâa', 9),
(297, 'M\'semrir', 8),
(298, 'Massa (Maroc)', 9),
(299, 'Megousse', 9),
(300, 'Ouarzazate', 8),
(301, 'Oulad Berhil', 9),
(302, 'Oulad Teïma', 9),
(303, 'Sarghine', 8),
(304, 'Sidi Ifni', 10),
(305, 'Skoura', 8),
(306, 'Tabounte', 8),
(307, 'Tafraout', 9),
(308, 'Taghzout', 1),
(309, 'Tagzen', 9),
(310, 'Taliouine', 9),
(311, 'Tamegroute', 8),
(312, 'Tamraght', 9),
(314, 'Taourirt ait zaghar', 8),
(315, 'Taroudannt', 9),
(316, 'Temsia', 9),
(317, 'Tifnit', 9),
(318, 'Tisgdal', 9),
(319, 'Tiznit', 9),
(320, 'Toundoute', 8),
(321, 'Zagora', 8),
(322, 'Afourar', 5),
(323, 'Aghbala', 5),
(324, 'Azilal', 5),
(325, 'Aït Majden', 5),
(326, 'Beni Ayat', 5),
(327, 'Béni Mellal', 5),
(328, 'Bin elouidane', 5),
(329, 'Bradia', 5),
(330, 'Bzou', 5),
(331, 'Dar Oulad Zidouh', 5),
(332, 'Demnate', 5),
(333, 'Dra\'a', 8),
(334, 'El Ksiba', 5),
(335, 'Foum Jamaa', 5),
(336, 'Fquih Ben Salah', 5),
(337, 'Kasba Tadla', 5),
(338, 'Ouaouizeght', 5),
(339, 'Oulad Ayad', 5),
(340, 'Oulad M\'Barek', 5),
(341, 'Oulad Yaich', 5),
(342, 'Sidi Jaber', 5),
(344, 'Zaouïat Cheikh', 5),
(345, 'Tanger‎', 1),
(346, 'Tétouan‎', 1),
(347, 'Akchour', 1),
(348, 'Assilah', 1),
(349, 'Bab Berred', 1),
(350, 'Bab Taza', 1),
(351, 'Brikcha', 1),
(352, 'Chefchaouen', 1),
(353, 'Dar Bni Karrich', 1),
(354, 'Dar Chaoui', 1),
(355, 'Fnideq', 1),
(356, 'Gueznaia', 1),
(357, 'Jebha', 1),
(358, 'Karia', 3),
(359, 'Khémis Sahel', 1),
(360, 'Ksar El Kébir', 1),
(361, 'Larache', 1),
(362, 'M\'diq', 1),
(363, 'Martil', 1),
(364, 'Moqrisset', 1),
(365, 'Oued Laou', 1),
(366, 'Oued Rmel', 1),
(367, 'Ouazzane', 1),
(368, 'Point Cires', 1),
(369, 'Sidi Lyamani', 1),
(371, 'Zinat', 1),
(372, 'Ajdir‎', 1),
(373, 'Aknoul‎', 3),
(374, 'Al Hoceïma‎', 1),
(375, 'Aït Hichem‎', 1),
(376, 'Bni Bouayach‎', 1),
(377, 'Bni Hadifa‎', 1),
(378, 'Ghafsai‎', 3),
(379, 'Guercif‎', 2),
(380, 'Imzouren‎', 1),
(381, 'Inahnahen‎', 1),
(382, 'Issaguen (Ketama)‎', 1),
(383, 'Karia (El Jadida)‎', 6),
(384, 'Karia Ba Mohamed‎', 3),
(385, 'Oued Amlil‎', 3),
(386, 'Oulad Zbair‎', 3),
(387, 'Tahla‎', 3),
(388, 'Tala Tazegwaght‎', 1),
(389, 'Tamassint‎', 1),
(390, 'Taounate‎', 3),
(391, 'Targuist‎', 1),
(392, 'Taza‎', 3),
(393, 'Taïnaste‎', 3),
(394, 'Thar Es-Souk‎', 3),
(395, 'Tissa‎', 3),
(396, 'Tizi Ouasli‎', 3),
(397, 'Laayoune‎', 11),
(398, 'El Marsa‎', 11),
(399, 'Tarfaya‎', 11),
(400, 'Boujdour‎', 11),
(401, 'Awsard', 12),
(402, 'Oued-Eddahab', 12),
(403, 'Stehat', 1),
(404, 'Aït Attab', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region` (`region`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=387;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`region`) REFERENCES `region` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
