-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 09:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u327081214_gov`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_date` timestamp NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  `role` enum('ADMIN','USER') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_number` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`, `email`, `full_name`, `registration_date`, `last_login`, `active`, `role`, `admin_number`, `region`, `img`, `bio`, `language`, `contact`, `date_time`) VALUES
(9, 'Toptech WEB3', '$2b$08$K8xaspGs8orsKtwaK26CE.CkYaLCIDS9n6X4oTkhpg9EoGvXrD5Wm', 'dukegift101@gmail.com', 'Toptech WEB3', '2024-02-16 11:07:54', NULL, 0, 'ADMIN', '70639', 'Lagos ', '????\0JFIF\0\0\0H\0H\0\0??)YExif\0\0MM\0*\0\0\0\0\0\0\0\0\0\0\0\Z\0\0\0\0\0\0\0V\0\0\0\0\0\0\0^(\0\0\0\0\0\0\0\0\0\0\0\0\0\0?i\0\0\0\0\0\0\0f\0\0\0?\0\0\0H\0\0\0\0\0\0H\0\0\0\0?\0\0\0\0\00221?\0\0\0\0\0?\0\0\0\0\00100?\0\0\0\0\0\0\0?\0\0\0\0\0\0M?\0\0\0\0\0\0M?\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\Z\0\0\0\0\0\0\0\0\0\0', 'An embedded engineer ', 'English ', '', '2024-05-28 03:51:17'),
(0, NULL, '$2y$10$.dt23PvFh/52DpnDoukB1OwWAiPw/37WpB9UtmmbtioITF89FrG8q', 'Futminna101', 'Duke Gift', '2024-05-24 18:32:18', NULL, 1, 'ADMIN', '23412', 'Lagos', '1.png', 'Pipeline Admin', 'English', '00719907251', '2024-05-28 03:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `blockchain`
--

CREATE TABLE `blockchain` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `log` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gas_fee` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_fee` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blockchain`
--

INSERT INTO `blockchain` (`id`, `timestamp`, `log`, `gas_fee`, `transaction_fee`, `block`) VALUES
(19, '2024-04-09 10:27:18', 'dfe853e190a3b36233c200f761930f5e4f8d99571f1fe2caffd43e234be07580', '813', '56', '23'),
(20, '2024-04-09 10:27:19', '08180cc06d0153ec2454b351a8a7a45a4d8d95b403b9a45e2a5cef0a91d1414c', '759', '237', '12'),
(21, '2024-04-09 14:54:51', '504370afa01b5bec143a333b6eebf8649da808ab475aec41d49efffa6bf69dcd', '372', '319', '19'),
(22, '2024-04-09 14:55:29', 'd0fd7550088cce252eb31a5b9d52343f0d3b6b45dc22e915d6a81bef03b372f3', '998', '459', '29'),
(23, '2024-04-09 14:56:05', 'cec29b9d74c6692c5a126b0938efdc6a519a33113e1d22bb9da0dbc2ef0ef3ec', '470', '173', '37'),
(24, '2024-04-09 14:56:47', '3b209a72ba258794b40ff93ed0e2b744fb3c1414b1827cc2cbcad920cc89725c', '698', '135', '21'),
(25, '2024-04-09 14:57:23', 'a4c47d7829c9389816f40f5ab0dd5539fcc9f83b7a641bf7363cdb76dbd63c57', '823', '116', '29'),
(26, '2024-04-09 14:58:01', '570211f01865477dbd312a820ccb0e361260564e98d3a9e6128c32922f6d68be', '596', '204', '94'),
(27, '2024-04-09 14:58:42', '6e4f948f88f4f9d0ed9b29f8dd1d2fbdd827505eaf7cde99449a60108b7256c8', '269', '480', '59'),
(28, '2024-04-09 14:59:18', '35ce453da90e1529ef96eef702f471b41a8f18e66effd5bc543fcfb4bbc35faa', '669', '219', '67'),
(29, '2024-04-09 14:59:55', 'e418213cf36d75270ca4b5a1f8022bf677667c9200fdd7f14bf4a1be84f5e288', '105', '300', '7'),
(30, '2024-04-09 15:00:31', '68808c3873d41b1c5cf6f38ce1d3d638235cfdf610cbce0cf4695818c098226e', '618', '455', '72'),
(31, '2024-04-09 15:01:07', 'f3b0360d17b819f37f3f6fd51d6068cf59bb922dc623a84923954ab4673ee5e1', '398', '293', '75'),
(32, '2024-04-09 15:01:43', '05c0b2d3e01a5708bb15a6489ee4ed0b805b37888e95d5ecc5e14a29c2350d89', '834', '153', '71'),
(33, '2024-04-09 15:02:20', 'a9b623e0199d60e5ef28df825c71bcd96bcf5612474a5190f5702156686d432d', '823', '338', '28'),
(34, '2024-04-09 15:02:57', '2d93863d12975a161442943585e186f82e7aeb5a301084e311f91a14dd292be5', '740', '373', '79'),
(35, '2024-04-09 15:03:34', 'f9e0ef7ce8c05668e66cba5845b0b8a1acdbe6ea5fee290f91b4bcc48248f5c0', '584', '159', '22'),
(36, '2024-04-09 15:04:11', 'e9e5614b3fd0b956d57a489fc6f799f14a2091354a0b2afb288f64dd7dae8301', '543', '219', '68'),
(37, '2024-04-09 15:04:47', 'a97be694fed9ff40ca6d75974c33c7e2b53059df0e7a459ef006bd29a2635e40', '277', '241', '45'),
(38, '2024-04-09 15:05:26', '08593861c3ca11d0c91465ac10772660013f993ff776cf53dd2108f0c378bc38', '529', '168', '69'),
(39, '2024-04-09 15:06:02', '9af100358824d599568e990313e930526de03cf41dc18001c024452e3ad848f2', '451', '430', '95'),
(40, '2024-04-09 15:06:38', '45456ee80dcd9346a625e347583b6c613acc81c8cc32b41bd6239c36af2c4ad4', '337', '401', '8'),
(41, '2024-04-09 15:07:16', 'c8849185b2e696c2326c90ed6e8226783fca73d51a13ccf1fa1be35ef313a773', '329', '480', '28'),
(42, '2024-04-09 15:08:01', '7336c030f897666a3f9757494a4279deaafab847d2f38b9aac06c83332e73afe', '447', '385', '52'),
(43, '2024-04-09 15:08:41', '2d476b621878fcff2f9936bab61ccb055097f3bb6e210c91048915e191e0bd8f', '906', '78', '88'),
(44, '2024-04-09 15:09:17', '0bb4bec1b16eef09e13d0331645d968eaa8f6bc0988735f407250a4000bc7444', '504', '458', '47'),
(45, '2024-04-09 15:09:53', '494868df2d36efa636a06e98824e7a44582aae90566ce84ab7a72d93c6ee2648', '706', '426', '68'),
(46, '2024-04-09 15:10:31', 'a9d843e945764127775551c3dfd153b8dcf0b89dc4e130989ecc1b2b8a1d14c6', '457', '285', '77'),
(47, '2024-04-09 15:11:07', '3812c27df6486652beb4ebaae0dfbfeee7618800312a087b3d83c75a2bff7b3d', '276', '81', '82'),
(48, '2024-04-09 15:11:43', 'b32194f46fe0def0dc04a01a8f5ee556049e58ca0af9af68aa6a6807fb7d1e63', '781', '495', '29'),
(49, '2024-04-09 15:12:30', '7d3146f9192c5bd15d21dfee880584f87c8d9faaa86208d44e5238d0989f87c8', '656', '238', '19'),
(50, '2024-04-09 15:13:06', '1394ba7b4409ba22f4e6bfbfd8db4f8451ea58e635824d6195ff822da6da2fc6', '379', '209', '87'),
(51, '2024-04-09 15:13:42', '47431a21dd666488d705efdda04e38c904f103ac8570716f56cca37eed73440c', '457', '353', '67'),
(52, '2024-04-09 15:14:18', '242cd16e4792dd265c4948fc9e3ba27f5dac55fc6d707631730984d18ec24cec', '586', '232', '92'),
(53, '2024-04-09 15:14:54', '280503b60a0927834cac3e48913dea04989d92fe6d61fde9e81eca9069080c7a', '206', '152', '22'),
(54, '2024-04-09 15:15:31', '15727ae67a08e0a833c530a8221945f4260861e3c8510bd005f75e0d4995054e', '998', '186', '35'),
(55, '2024-04-09 15:16:07', '67fd815bec26e41c431588994b54ea3d735d1ec88b071eefe1d3fde283fd1004', '392', '142', '67'),
(56, '2024-04-09 15:16:43', '18505bdb6c0a9ed7ee857dc48109ca09fdaf331bf336551d0cbbab711cb6075a', '574', '273', '80'),
(57, '2024-04-09 15:17:20', 'ecb3ac66bc27386df8cc21e8cc16116b8344d9f465bfcef8d84a4196598938a9', '273', '58', '41'),
(58, '2024-04-09 15:17:56', 'e65daed6280bff0ace19c3cfa8527eae99ff0e7d2ccabcc5a0a2cee296d414f2', '292', '137', '12'),
(59, '2024-04-09 15:18:32', '17d28f11eeafa984a2e88e80943260724337603cb62268d6c5eb6857159929ad', '993', '399', '100'),
(60, '2024-04-09 15:19:08', '42f877129fe241a243bf712cd00a598cc975d2f618547d70f193093ef39055fe', '404', '432', '88'),
(61, '2024-04-09 15:19:44', 'a9b2ed3b570801996ef4d61c64694e992d2ef9a71b121ee085248abea0be36e8', '938', '119', '16'),
(62, '2024-04-09 15:20:22', 'b3aeb86169c62aaf7771c25c0de319885eed879379058a8a92e24fbb70ae6669', '103', '434', '43'),
(63, '2024-04-09 15:21:04', 'eeea12ca0f33160ac45c810de6bc2c9c87d6b04d882ba74c08bd8589fc89a677', '965', '104', '69'),
(64, '2024-04-09 15:21:41', '6b3cb45724afc61cdc05160c224cb0dd171916730e2f9f710a13c76bf6b4dbdd', '270', '252', '67'),
(65, '2024-04-09 15:22:18', '8454e9348f2ca92674ef86f97d3a8092e1cc9585ea1251e4775b71f4222980e5', '480', '204', '63'),
(66, '2024-04-09 15:22:54', '2058afecf03b2b9c6e6131f86842766a71b1c574e3c0c273b705669fbe3ecde1', '121', '280', '15'),
(67, '2024-04-09 15:23:30', '5047618347ee8795d31abf2576811a76cd646f3660cb4871eccb186d1cc0fb6f', '202', '452', '11'),
(68, '2024-04-09 15:24:25', '53eeb5095b3024b570db4ca07a4bf6a613461e0ee121eb268c4abb043c89110d', '713', '416', '17'),
(69, '2024-04-09 15:24:53', 'ced3d38542c5923b82a06f7afb72a3eb788db4e1fc0c37a5a7ab019f4016af96', '397', '126', '91'),
(70, '2024-04-09 15:25:32', 'b542b3d1189ee5b0e734df0f5911889a05cec7f6b0d9adc40ef94cbeae92a35c', '116', '330', '53'),
(71, '2024-04-09 15:26:15', '8a6d74d0b97b81cbb2337361293e6ca7a0d6d602bcaa0bc21988e77c4d0b0fd3', '616', '85', '30'),
(72, '2024-04-09 15:26:51', '5f1267a318e569bf84bdf270d0468de25e197d5dfef2a459c5e72df7334a47e6', '707', '366', '21'),
(73, '2024-04-09 15:27:27', '97f3d8902e395964d965088653091e2b96c6e93a70e09e6a47667066f1db1a89', '626', '471', '27'),
(74, '2024-04-09 15:28:04', '043c2061b28d0194988ec9d549b66cf737d3bbbf0ac276e36ba7ce0d01acc07b', '395', '155', '52'),
(75, '2024-04-09 15:28:40', '78c7244880c274ce1594421d723735f16a81ba623d953edaf3a048170f54545c', '671', '112', '26'),
(76, '2024-04-09 15:29:17', '2b56e8aaa66fe6538bc01595baf90e0d255765b3ea42ba609312a43b6722e3c2', '345', '244', '64'),
(77, '2024-04-09 15:29:54', '1525388c7dd2af96c23bd7e94a4c78aea4812df75551596ae5d4b25aaa0b401a', '134', '467', '34'),
(78, '2024-04-09 15:30:38', 'a5c6f78aebae42a2832b4c2598fabf01ed2f707ac74c86ffc3e96713d356acce', '996', '190', '6'),
(79, '2024-04-09 15:31:14', '38b588cbea1017842cb3418d2ecb76e47248b2b84196967ea643644dc0e90364', '929', '459', '45'),
(80, '2024-04-09 15:31:59', 'bd13f109112fcd7d82fd0c6449c55a11c7ef53a20a19eef72b240de774fd83f4', '817', '133', '11'),
(81, '2024-04-09 15:33:23', 'f0a2a11b98b8961a555522fee837116e571aa5cf1eb84b038ad7de432ca3729e', '952', '384', '26'),
(82, '2024-04-09 15:35:52', '3ad9b5c45fcd936c974ae564b3afb63ba7b61c58777c009cae94531ad341331e', '195', '329', '56'),
(83, '2024-04-09 15:36:24', '47b9fbbc1b2569e4d1f5543085cace1b4886c3c4b4c0ec155258bde9f06f2e70', '459', '439', '83'),
(84, '2024-04-09 15:37:05', '9dcfa0b0a94b3ec90cbef411bad002104e198d0c8198eeb40d69801621b00011', '924', '51', '73'),
(85, '2024-04-09 15:37:48', '211d02e987391bc2b7df46767a1d6478d6eda082829f5e0ac00a06c7ebb3fb65', '222', '251', '90'),
(86, '2024-04-09 15:38:24', '36a3089485f7f1ceea2f56babf77acd6e3f9dd08ba640b084b76c3acde53cb79', '904', '74', '77'),
(87, '2024-04-09 15:39:00', 'a4cb97f381020eeca31596a7a56a5846d2a3b1ecd370543500793f6eafd5a0fc', '489', '243', '96'),
(88, '2024-04-09 15:39:36', '5d169ad1b283db55012f39e1b3b14ba256755f64f4e2030e2191312ffc500569', '1000', '287', '15'),
(89, '2024-04-12 12:02:39', '0870da004f2d743dda6341bfcd0ea1548ca3c31d98ab3e1b1e9c59dbc3352917', '940', '76', '29'),
(90, '2024-04-12 12:03:25', 'fbbff6094682565233c3640024974e7e227ff87721e43345e0b369bfc6d88ced', '794', '455', '2'),
(91, '2024-04-12 12:05:10', 'd9888cf4eda6dbf7710f8ec4d0ffdd8c1809a8f51e8f27fac430f22dd2cce18f', '413', '252', '41'),
(92, '2024-04-12 12:08:47', 'd572650b2bf92a16bb4a4c1f0cc67055ea9ce1ce0c5634431987f136a64bd8b3', '308', '390', '97'),
(93, '2024-04-12 12:10:08', '569da5b0ff81f635b18c4e63223e20cd90feb393b5fc3ff4b6ff31017e21eb1f', '534', '369', '88'),
(94, '2024-04-12 12:10:46', 'b90c28df12e9525ba963fc1ee1f545af119dee2fb18b83170a8cb9925b6a36dd', '444', '188', '2'),
(95, '2024-04-12 12:13:44', 'e15fadfac8700281206353500245834bfdbd7f4e5c0b1fbbf829649dd40312b7', '657', '277', '7'),
(96, '2024-04-12 12:16:10', 'b7c83c695128d87b2aa9516ffbafb33c09f375195f8c09b9c9c6edc3e25673fe', '370', '271', '74'),
(97, '2024-04-12 12:16:47', 'a7443c4f37204b95c04612d2ad6d6f85870b8f96469263386b3cc1e9b7be7387', '869', '51', '71'),
(98, '2024-04-12 12:17:27', '94959cd504f42596dc855626b767adef13dbc171aaf3d856afaf6a3dd05186d9', '147', '388', '71'),
(99, '2024-04-12 12:18:04', '6d52478a2ae15566fb15a3f0c0e803eb99649a82d7eeda48f1f681f92a7664c0', '904', '467', '40'),
(100, '2024-04-12 12:18:44', 'b6baf718ffd9bdd7e88a0c37a003ba94012fc2f0913c1d735a23f7487f0c1d91', '780', '113', '67'),
(101, '2024-04-12 12:19:27', '545d8a8624aa9df4b81a4daae140efbe7819239f5d55e10320bd18dbe86c5c4d', '394', '360', '78'),
(102, '2024-04-12 12:20:08', '51faf114e93f326143d43719bbd2718b887d748ed5445ac073e44d8b0cb5641f', '237', '433', '97'),
(103, '2024-04-12 15:06:12', '8c20529011cde9b67e2b354b19d8ca9d42cfddcb8410f204639d9ae7e4fc8b83', '284', '332', '13'),
(104, '2024-04-12 15:06:52', '9e28fbd41aa311dd6dbfdf89f2c3b67827f11ac94dcf2389bd0c34044f0b8897', '404', '389', '40'),
(105, '2024-04-12 15:07:29', 'e6ff24d3c2b578c5f55876c44b94c422e7db9c25c799193f7adf3b9bf6d65d40', '701', '274', '48'),
(106, '2024-04-12 15:08:14', 'e333f315feff98ded62610f4232cb6bc740711a4c6f2ae646fa6f46099767589', '839', '64', '15'),
(107, '2024-04-12 15:08:54', '4615213955be6fc8b668a710d5d0300392938af32553cedaa4e6d19d81f8bc1c', '773', '241', '59'),
(108, '2024-04-12 15:09:34', 'f945bb37ef0621ad2808716cabc14c4e4770694970786efc4fc072c80ccaa42a', '669', '139', '4'),
(109, '2024-04-12 15:09:51', '344d894ac5b9a54a3e7432a385034aacab0740c7e9c7bcce847cf8ffe3348466', '778', '312', '42'),
(110, '2024-04-12 15:10:30', 'd53522c3b0d4adc97468ad86e8a620ab4d41e6d6b7e74fb25bcdc3b2700dbe11', '675', '219', '62'),
(111, '2024-04-12 15:11:09', '93c8cdf6eafec8c026121f80e76d3d7b03ad501e9685e7192b01ae2e923da83a', '525', '179', '44'),
(112, '2024-04-12 15:11:47', 'fc467e70ce553bb83ceacbd5beed18c356bf93fe6fda6df05b2a9a13ef3ac375', '946', '381', '84'),
(113, '2024-04-12 15:12:25', 'ebb605a0faa10559342e361d68b6a7b32160be57bf3aa12908d9337c7e7c8b11', '931', '487', '17'),
(114, '2024-04-12 15:13:04', '18ac446aa7ed439de69385fd6d38fbd3afcdabb29975b09dfe7b0442fd58c47c', '521', '110', '76'),
(115, '2024-04-12 15:13:52', '6fccca4f13f6095b089ba0de4835e3b5d2638647e19333999726f7298267c2b5', '850', '147', '54'),
(116, '2024-04-12 15:15:14', '5bee7abbcb4a1ee0d5a913b5c89a84f56d717b20396c82ba1622ea36d16f0ad7', '109', '91', '94'),
(117, '2024-04-12 15:15:53', 'a3b0233d296ddf2fb7ea23a09fc9dc50f033308244f4673ecb1cb30034b6cdb5', '263', '127', '3'),
(118, '2024-04-12 15:16:31', 'f7df5a5e4d49efbc2e56138ac4e07477621979d7d1658920cb73276eec8a635a', '308', '194', '83'),
(119, '2024-04-12 15:17:08', '984f79f85f78e1c4d53f8e358fe47d4c722cd5b4c9666be525ea0da4fb1d5a7d', '998', '208', '38'),
(120, '2024-04-12 15:17:46', '3a7cb42473c64968b04b0c10a9372822d3f6f1837d250a6d516f676d56c2886f', '239', '111', '79'),
(121, '2024-04-12 15:18:23', 'e73377c3faba9c8f5fcb7a4ba85d32791c7b3643e75162dcdf1229814c3b488d', '834', '479', '40'),
(122, '2024-04-12 15:18:59', '342637aa6a59e50ecfd63bdfb56794c45adb13a5c1c99c1315653bd224bd6ebc', '962', '415', '25'),
(123, '2024-04-12 15:19:36', 'c2f134504ec3e02db4b092b27916e364a83c06be4fafe1e9465d2f813b5c74fe', '294', '357', '47'),
(124, '2024-04-12 15:20:13', 'f2f68aebd0d61f12998a3b2b7a9c1b2010ffbd3d90e4397b0c0a776759f6ec5e', '646', '213', '30'),
(125, '2024-04-12 15:20:49', 'e3e8e895d911b05fa7fecc37bac81d96d18c7985d774619d1882674dcc47822d', '649', '483', '75'),
(126, '2024-04-12 15:21:28', '586c883b0a22cc7878a4b2917d843c418bfa9d16ad00fa150f9a623578668aca', '204', '250', '52'),
(127, '2024-04-12 15:22:05', '5343f366328d192d72d1fac4641e6efb85545d091b45ee9ff5bd3603c2139e78', '603', '316', '3'),
(128, '2024-04-12 15:22:42', '5f493a35068905a61ecd0ec9663e6dcbbf949a7d37c679a9bc42270e8132907e', '959', '119', '81'),
(129, '2024-04-12 15:23:19', '41df45c075e06951b0cf217d77b82f5c00d4750106ecfce0b9af538bc6a3fcc0', '291', '230', '35'),
(130, '2024-04-12 15:23:56', '38be6569be68b8d83e0d8ae3b2fc480a073351beaec447a96d4d672564520454', '639', '135', '5'),
(131, '2024-04-12 15:24:37', 'db1ec3b3ff097890713277376c57a628fa409e5be9fe351ab33e4918948cbf9c', '310', '348', '65'),
(132, '2024-04-12 15:25:16', 'aca66068ccc6f52819ee50662172d4b250f766af7395fb70eba5072c8d08dc8f', '182', '278', '70'),
(133, '2024-04-12 15:25:53', '1270c3603edc51ee6faa7aa459dbe893dd8c399082524f16078f1724011f95e8', '515', '318', '65'),
(134, '2024-04-12 15:26:31', '4eb0774f41c3a2c3f56beab2a109af4ffab8f5fe9650166256fbb20cf0126e33', '998', '63', '7'),
(135, '2024-04-12 15:27:09', 'a1f51b3f8c669d33b89bbdb03e0381e5e646bc89f0a156d1eb9cd7a8d191e4e2', '504', '217', '40');

-- --------------------------------------------------------

--
-- Table structure for table `map_location_name`
--

CREATE TABLE `map_location_name` (
  `id` int(11) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `map_location_name`
--

INSERT INTO `map_location_name` (`id`, `lat`, `lng`, `location_name`, `time`) VALUES
(1, 9.53215, 6.45162, 'SICT building', '2024-05-27 17:35:30'),
(2, 9.53288, 6.45221, 'S.A.A.T Building', '2024-05-27 17:35:30'),
(3, 9.53406, 6.45291, 'Senate Building, FUT', '2024-05-27 17:45:26'),
(4, 9.53386, 6.45124, 'Garatu', '2024-05-27 17:45:26'),
(5, 9.53514, 6.45291, 'IBB Library Complex', '2024-05-27 17:49:36'),
(6, 9.53456, 6.45055, 'S.E.T Building', '2024-05-27 17:49:36'),
(7, 9.53588, 6.45139, 'NITDA IT HUB', '2024-05-27 17:52:39'),
(8, 9.53614, 6.45535, 'Futminna Bus Park', '2024-05-27 17:52:39'),
(9, 9.53314, 6.44659, 'Football field', '2024-05-27 17:57:10'),
(10, 9.53535, 6.44815, 'Union Bank', '2024-05-27 17:57:10'),
(11, 9.53551, 6.44396, 'Chapel of Grace', '2024-05-27 18:00:12'),
(12, 9.53669, 6.44466, 'Futminna Transmission station', '2024-05-27 18:00:12'),
(13, 9.53749, 6.44916, 'PGS Futminna', '2024-05-27 18:03:34'),
(14, 9.53213, 6.44815, 'Water Station ', '2024-05-27 18:03:34'),
(15, 9.53191, 6.44377, 'School Hostel ', '2024-05-27 18:07:21'),
(16, 9.53277, 6.44249, 'Hostel', '2024-05-27 18:07:21'),
(17, 9.53143, 6.44182, 'Male Hostel Block A', '2024-05-27 18:09:54'),
(18, 9.53737, 6.45494, 'Club 923', '2024-05-27 18:09:54'),
(19, 9.53697, 6.46477, 'Futminna School Gate', '2024-05-27 18:11:21'),
(20, 9.53778, 6.46792, '', '2024-05-27 18:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `movement`
--

CREATE TABLE `movement` (
  `id` int(11) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `pms` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movement`
--

INSERT INTO `movement` (`id`, `origin`, `destination`, `pms`) VALUES
(1, 'Minna', 'Lagos', '255');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `message`, `timestamp`, `location`) VALUES
(1, 'tanker 2140 PMS level is 135 ms now', '2024-05-24 13:49:14', '9.355344 6.4534345');

-- --------------------------------------------------------

--
-- Table structure for table `pipelines`
--

CREATE TABLE `pipelines` (
  `id` int(11) NOT NULL,
  `sn` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pipelines`
--

INSERT INTO `pipelines` (`id`, `sn`, `timestamp`) VALUES
(1, 2137, '2024-02-15 00:31:39'),
(2, 2138, '2024-05-24 06:40:47'),
(3, 2139, '2024-05-24 06:40:47'),
(4, 2140, '2024-05-24 06:40:47'),
(5, 2141, '2024-05-24 06:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `pipeline_2137`
--

CREATE TABLE `pipeline_2137` (
  `id` int(11) NOT NULL,
  `pi_id` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `velocity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flowrate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vibration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pipeline_2137`
--

INSERT INTO `pipeline_2137` (`id`, `pi_id`, `latitude`, `longitude`, `velocity`, `flowrate`, `vibration`, `timestamp`) VALUES
(1, 1, 9.53033, 6.45236, '4343', '5454', '1046.00', '2024-04-12 15:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `pipeline_2138`
--

CREATE TABLE `pipeline_2138` (
  `id` int(11) NOT NULL,
  `pi_id` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `velocity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flowrate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vibration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pipeline_2138`
--

INSERT INTO `pipeline_2138` (`id`, `pi_id`, `latitude`, `longitude`, `velocity`, `flowrate`, `vibration`, `timestamp`) VALUES
(1, 2, 9.53033, 6.45236, '90', '45434', '23', '2024-04-12 15:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `pipeline_2139`
--

CREATE TABLE `pipeline_2139` (
  `id` int(11) NOT NULL,
  `pi_id` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `velocity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flowrate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vibration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pipeline_2139`
--

INSERT INTO `pipeline_2139` (`id`, `pi_id`, `latitude`, `longitude`, `velocity`, `flowrate`, `vibration`, `timestamp`) VALUES
(1, 3, 9.53033, 6.45236, '334', '122', '1046.00', '2024-04-12 15:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `pipeline_2140`
--

CREATE TABLE `pipeline_2140` (
  `id` int(11) NOT NULL,
  `pi_id` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `velocity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flowrate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vibration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pipeline_2140`
--

INSERT INTO `pipeline_2140` (`id`, `pi_id`, `latitude`, `longitude`, `velocity`, `flowrate`, `vibration`, `timestamp`) VALUES
(1, 4, 9.53033, 6.45236, '34534', '34545', '1046.00', '2024-04-12 15:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `pipeline_2141`
--

CREATE TABLE `pipeline_2141` (
  `id` int(11) NOT NULL,
  `pi_id` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `velocity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flowrate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vibration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pipeline_2141`
--

INSERT INTO `pipeline_2141` (`id`, `pi_id`, `latitude`, `longitude`, `velocity`, `flowrate`, `vibration`, `timestamp`) VALUES
(1, 5, 9.53033, 6.45236, '4554', '545', '1046.00', '2024-04-12 15:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `tankers`
--

CREATE TABLE `tankers` (
  `id` int(11) NOT NULL,
  `sn` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tankers`
--

INSERT INTO `tankers` (`id`, `sn`, `origin`, `destination`, `timestamp`) VALUES
(1, '2137', 'minna', 'iilorin', '2024-02-15 00:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `tanker_2137`
--

CREATE TABLE `tanker_2137` (
  `id` int(11) NOT NULL,
  `sn` int(11) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `speed` int(11) NOT NULL,
  `pms_level` float NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tanker_2137`
--

INSERT INTO `tanker_2137` (`id`, `sn`, `lat`, `lng`, `speed`, `pms_level`, `origin`, `destination`, `location`, `Timestamp`) VALUES
(1, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(2, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(3, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(4, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(5, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(6, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(7, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(8, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(9, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(10, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(11, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(12, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(13, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(14, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(15, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(16, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(17, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(18, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(19, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(20, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(21, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(22, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(23, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(24, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(25, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(26, 2137, 9.53203, 6.45165, 0, 15.81, '', '', '', '2024-02-29 10:24:15'),
(27, 1, 9.53217, 6.45165, 80, 50, 'Minna', 'Lagos', 'S.A.A.T Building', '2024-05-27 17:56:17'),
(28, 1, 9.53217, 6.45165, 80, 50, 'Minna', 'Lagos', 'S.A.A.T Building', '2024-05-27 17:56:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blockchain`
--
ALTER TABLE `blockchain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `map_location_name`
--
ALTER TABLE `map_location_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movement`
--
ALTER TABLE `movement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pipelines`
--
ALTER TABLE `pipelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pipeline_2137`
--
ALTER TABLE `pipeline_2137`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pipeline_2138`
--
ALTER TABLE `pipeline_2138`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pipeline_2139`
--
ALTER TABLE `pipeline_2139`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pipeline_2140`
--
ALTER TABLE `pipeline_2140`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pipeline_2141`
--
ALTER TABLE `pipeline_2141`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tankers`
--
ALTER TABLE `tankers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanker_2137`
--
ALTER TABLE `tanker_2137`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blockchain`
--
ALTER TABLE `blockchain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `map_location_name`
--
ALTER TABLE `map_location_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `movement`
--
ALTER TABLE `movement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pipeline_2137`
--
ALTER TABLE `pipeline_2137`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pipeline_2138`
--
ALTER TABLE `pipeline_2138`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pipeline_2139`
--
ALTER TABLE `pipeline_2139`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pipeline_2140`
--
ALTER TABLE `pipeline_2140`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pipeline_2141`
--
ALTER TABLE `pipeline_2141`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tankers`
--
ALTER TABLE `tankers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanker_2137`
--
ALTER TABLE `tanker_2137`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
