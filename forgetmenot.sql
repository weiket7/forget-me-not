-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2020 at 12:54 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forgetmenot`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopt`
--

DROP TABLE IF EXISTS `adopt`;
CREATE TABLE IF NOT EXISTS `adopt` (
  `adoptId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stat` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `breed` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colour` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `microchip` tinyint(1) DEFAULT NULL,
  `vaccinate` tinyint(1) DEFAULT NULL,
  `sterilise` tinyint(1) DEFAULT NULL,
  `hdb` tinyint(1) NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `health` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behaviour` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `history` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`adoptId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adopt`
--

INSERT INTO `adopt` (`adoptId`, `stat`, `name`, `slug`, `gender`, `birthday`, `breed`, `colour`, `microchip`, `vaccinate`, `sterilise`, `hdb`, `image`, `health`, `behaviour`, `history`, `desc`) VALUES
(1, 'A', 'Alpha', 'alpha', 'M', '2020-01-01', 'Cross Breed', NULL, NULL, NULL, NULL, 1, 'alpha.png', NULL, NULL, NULL, 'The loyal fluff is the rarest gem. Just like the royal flush. He values you (& his wife Buffy) more than anything else. He\'s the greatest companion one could ever have.'),
(2, 'A', 'Bravo', 'bravo', 'M', '2020-01-01', 'Cross Breed', NULL, NULL, NULL, NULL, 1, 'bravo.png', NULL, NULL, NULL, 'The loyal fluff is the rarest gem. Just like the royal flush. He values you (& his wife Buffy) more than anything else. He\'s the greatest companion one could ever have.'),
(3, 'A', 'Charlie', 'charlie', 'M', '2020-01-01', 'Cross Breed', NULL, NULL, NULL, NULL, 1, 'charlie.png', NULL, NULL, NULL, 'The loyal fluff is the rarest gem. Just like the royal flush. He values you (& his wife Buffy) more than anything else. He\'s the greatest companion one could ever have.'),
(4, 'A', 'Delta', 'delta', 'F', '2020-01-01', 'Cross Breed', NULL, NULL, NULL, NULL, 1, 'delta.png', NULL, NULL, NULL, 'The loyal fluff is the rarest gem. Just like the royal flush. He values you (& his wife Buffy) more than anything else. He\'s the greatest companion one could ever have.');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `blogId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isFeatured` tinyint(1) NOT NULL DEFAULT '0',
  `shortDesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `postedOn` datetime NOT NULL,
  PRIMARY KEY (`blogId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blogId`, `type`, `title`, `slug`, `image`, `isFeatured`, `shortDesc`, `content`, `postedOn`) VALUES
(1, 'N', 'Fundraising Merchandise - 2020', 'fundraising-merchandise-2020', 'merch1.jpg', 1, '\"Yes, I am a dog lover.\r\n            Just cos life is too short to miss out REAL true love.\"\r\n            Does this caption speak your heart like how it speak of ours?\r\n            So… (Drums rolling🥁🥁🥁) today, we are presenting our long awaited FMN Version 3.0 tee-shirt to pass the heartfelt message!\r\n            Together with our group of dedicated volunteers, we have designed our very own #HYPEBEAST inspired tee.\r\n            Your support in the purchase of the tee is very crucial to us, to help us tide through this difficult period. The COVID-19 outbreak has not only impacted the economy badly, but has also hit us negatively, both operationally and financially.\r\n            ', '\"Yes, I am a dog lover.\r\nJust cos life is too short to miss out REAL true love.\"\r\nDoes this caption speak your heart like how it speak of ours?\r\nSo… (Drums rolling🥁🥁🥁) today, we are presenting our long awaited FMN Version 3.0 tee-shirt to pass the heartfelt message!\r\nTogether with our group of dedicated volunteers, we have designed our very own #HYPEBEAST inspired tee.\r\nYour support in the purchase of the tee is very crucial to us, to help us tide through this difficult period. The COVID-19 outbreak has not only impacted the economy badly, but has also hit us negatively, both operationally and financially.\r\nWe have not been able to partake in any adoption events since the beginning of the year, while facing visitors’ restrictions at the shelter for social responsibility reasons. This means lesser opportunities for our furkids to see their potential adopters. We look towards continuing to provide and caring for our existing furkids the best we can but it is definitely not without financial stress.\r\nYour purchase will aid us in our March’s rental and expenses towards the livelihood of 40 dogs in and outside of shelter. We thank you in advance for even considering to tide us through this difficult period.\r\n            ', '2020-05-16 12:50:53'),
(2, 'N', 'Rusty', 'rusty', 'rusty.png', 0, 'Our role here is solely focused on the wellness of Rusty.', 'Our role here is solely focused on the wellness of Rusty.', '2020-05-16 12:50:53'),
(3, 'N', 'Lola with her incredible Mommies', 'lola-with-her-incredible-mommies', 'lola.png', 0, '', '', '2020-05-16 12:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sentOn` datetime NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `contentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`contentId`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`contentId`, `name`, `key`, `content`, `page`) VALUES
(1, 'Main Email', 'mainEmail', 'fmndogshelter@gmail.com', 'home'),
(2, '', 'content', 'Today, despite the gloomy skies, we received warm sunshine from the volunteers who came to us! With more hands and legs today, more of our pooches were out of their kennels for their sunbathing!\n\n            We want to thank the new faces today. Thank you for your precious time on a Sunday, strolling the furries and giving them a showering good time. We hope we had also taken the opportunity to let you see the beautiful side of these little animals we love so much.\n            \n            To have made this happened, we want to show appreciation to Audrey for organizing it up so well with us. Woof-you!', 'about'),
(3, '', 'image', 'group.jpg', 'about'),
(4, '', 'image', 'sponsor-feb-2020.jpg', 'sponsor'),
(5, '', 'title', 'Sponsor-A-Dog FEBRUARY\'20 update.', 'sponsor'),
(6, 'Content', 'content', '• Once again, our Brownie Boy managed to charm his way to another heart. He is very fortunate to have another superhero coming forward to sponsor him for the month. 🐾\n            \n            • Our very sweet princess Violet made her first stand forward and joined some of her fur-buddies to be partially sponsored.\n            \n            • This month is the final month of Buzz’s sponsorship program, so he is now on a mission in search for his new superhero! With the newly revised size criteria for Project Adore, Buzz is now HDB APPROVED!🥳 Calling all HDB owners who love big dogs, Buzz Buzz Maybe?\n            \n            • Saving the best for the last! Bali is FINALLY adopted! We are extremely delighted that he has a home of his own, after waiting for 8 long years! We cannot express our thanks enough to his superheroes for having his back all these while. ❤ Woof-you Nova & Maya! ❤\n            \n            We managed to gather all our superdoggos in this update. More than half of them are still looking for their superhero. Before they are rehome-able, they need shelter and food. They need time to learn how to trust again. Sadly, time is money.😭😭\n            \n            Even though these dogs were born at the wrong place, they too deserve to live and be loved. You can make a difference in the lives of others. Be a doer - don\'t only be a hearer. To us and to our doggos, doers are true heroes⚡. These doggos need you. Are you a hero?\n            \n            All you need to do is PM us:\n            • The dog you would like to sponsor\n            • The amount - $50 / $100 / $150 / $200 / $250\n            • The duration of sponsorship - 1 /3 / 6 / 9 / 12 months / infinity\n            \n            For sponsorships in other amounts / duration, feel free to reach out to us!\n            \n            For more information on Sponsor-A-Dog:\n            https://www.facebook.com/1710154292620566/posts/2241349379501052/\n            \n            Our Super-doggos list below!\n            \n            1) Fufu\n            https://bit.ly/37Axqgd\n            2) Buffy\n            https://bit.ly/35kCMKI\n            3) Alfa\n            https://bit.ly/2uG2j4C\n            4) Brownie Boy\n            https://bit.ly/2OSaO2D\n            5) Snoopy\n            https://bit.ly/2wZq3S5\n            6) Katniss\n            https://bit.ly/2OQi9jo\n            7) Buzz\n            8) Bali\n            9) Mandy\n            10) Marco\n            11) Mario\n            12) Ashley\n            13) Woodina\n            14) Indigo\n            15) Violet\n            16) Nikki\n            17) Duke\n            18) JayLin', 'sponsor');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

DROP TABLE IF EXISTS `donation`;
CREATE TABLE IF NOT EXISTS `donation` (
  `donation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stat` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_date` datetime NOT NULL,
  `donated_on` datetime NOT NULL,
  PRIMARY KEY (`donation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donation_id`, `stat`, `name`, `email`, `mobile`, `amount`, `payment_method`, `ref_no`, `transfer_date`, `donated_on`) VALUES
(1, 'P', 'David', 'david@gmail.com', '9123 4567', '10', 'B', '123', '2020-05-16 12:50:53', '2020-05-16 12:50:53'),
(2, 'R', 'Dakota', 'dakota@gmail.com', '9123 4567', '1200', 'N', '456', '2020-05-16 12:50:53', '2020-05-16 12:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2018_05_27_064003_adopt_table', 1),
(12, '2018_05_27_064051_volunteer_table', 1),
(13, '2018_05_28_081634_donation_table', 1),
(14, '2019_01_27_073734_blog_table', 1),
(15, '2019_03_17_075225_setting_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2020_05_16_065257_contact_table', 1),
(18, '2020_05_16_065306_content_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `settingId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`settingId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`settingId`, `key`, `value`) VALUES
(1, 'mainEmail', 'fmndogshelter@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

DROP TABLE IF EXISTS `volunteer`;
CREATE TABLE IF NOT EXISTS `volunteer` (
  `volunteer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stat` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` datetime NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preferred_dog_size` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_no_of_dogs` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publicity_area` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `desc` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`volunteer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`volunteer_id`, `stat`, `name`, `email`, `mobile`, `birthday`, `gender`, `occupation`, `availability`, `vehicle`, `preferred_dog_size`, `current_no_of_dogs`, `publicity_area`, `created_on`, `desc`) VALUES
(1, 'P', 'Vivien', 'vivien@gmail.com', '9123 6666', '2002-05-16 12:50:53', 'F', '', '', NULL, NULL, NULL, NULL, '2020-05-16 12:50:53', NULL),
(2, 'A', 'Valora', 'valora@gmail.com', '9876 6666', '1990-05-16 12:50:53', 'F', '', '', NULL, NULL, NULL, NULL, '2020-05-16 12:50:53', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
