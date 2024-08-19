-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2024 at 08:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Accountant', 1, '2024-08-15 04:23:23', '2024-08-15 04:23:23'),
(2, 'IT/Computer', 1, '2024-08-15 04:23:23', '2024-08-15 04:23:23'),
(3, 'Telecom', 1, '2024-08-15 04:23:23', '2024-08-15 04:23:23'),
(4, 'Social Media', 1, '2024-08-15 04:23:23', '2024-08-15 04:23:23'),
(5, 'Construction & Engineering', 1, '2024-08-15 04:23:23', '2024-08-15 04:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `job_type_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vacancy` int(11) NOT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `benefits` text DEFAULT NULL,
  `responsibility` text DEFAULT NULL,
  `qualification` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `experience` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `isFeatured` int(11) NOT NULL DEFAULT 0,
  `company_location` varchar(255) DEFAULT NULL,
  `company_website` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `category_id`, `job_type_id`, `user_id`, `vacancy`, `salary`, `location`, `description`, `benefits`, `responsibility`, `qualification`, `keywords`, `experience`, `company_name`, `status`, `isFeatured`, `company_location`, `company_website`, `created_at`, `updated_at`) VALUES
(6, 'Website Developer', 2, 1, 3, 3, '35k', 'Charsadda', 'Need website developer with 2 year of experience.', 'Benefits', 'Responsibility', 'Graduation', 'PHP, Laravel, HTML, CSS, Bootstrap & JavaScript', '2', 'Webspires', 1, 1, 'Charsadda', 'website.com', '2024-08-16 12:03:29', '2024-08-17 11:24:43'),
(12, 'Shanel Buckridge', 4, 3, 6, 2, NULL, 'Mauricemouth', 'Rerum velit hic corporis consequatur perspiciatis autem. Debitis dolores consequatur illo ullam. Aut libero voluptas vitae quidem voluptatem animi hic expedita.', NULL, NULL, NULL, NULL, '8', 'Prof. Lourdes Emard Sr.', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(13, 'Halie Schiller', 1, 1, 6, 4, NULL, 'Tyshawnland', 'Ducimus magni nisi qui ut sed. Omnis autem modi est omnis voluptatum temporibus. Perferendis deleniti dignissimos voluptatum ea quaerat earum iusto dolor. Quae dolorem et quidem id tempore.', NULL, NULL, NULL, NULL, '4', 'Sydney Reilly', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(14, 'Lelia Jones III', 3, 5, 4, 5, NULL, 'Emardberg', 'Voluptate molestiae tenetur qui similique doloribus. Excepturi dolor ipsa qui eum ea aut. Sequi nesciunt et fugit perferendis nihil. Qui et quas facilis non sit.', NULL, NULL, NULL, NULL, '7', 'Jane Gibson', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(15, 'Lennie Kunze', 4, 2, 6, 2, NULL, 'Schmelerborough', 'Autem sint voluptatem maxime ut non. Non qui dolorem nihil animi qui doloribus assumenda quia. Fuga et voluptas placeat unde quam. Saepe nihil pariatur et aliquam delectus beatae laboriosam.', NULL, NULL, NULL, NULL, '10', 'Ms. Glenda Gusikowski', 1, 1, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(16, 'Jedidiah Koss V', 5, 3, 5, 2, NULL, 'Laurenceburgh', 'Quia sunt nostrum qui et. Dolore tempora sed aperiam amet harum. Assumenda sequi consectetur cumque iure rem vitae. Sit doloremque est beatae.', NULL, NULL, NULL, NULL, '2', 'Dr. Claudine Conroy', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(19, 'Arjun O\'Kon', 2, 3, 4, 3, NULL, 'Riceton', 'Maxime veritatis ducimus quam eos et et. Ipsa aut eaque fugit perspiciatis explicabo. Temporibus tempore consequatur esse incidunt enim voluptas eveniet. Aliquid et aspernatur magni vel ipsum.', NULL, NULL, NULL, NULL, '1', 'Rebecca Bode', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(20, 'Prof. Amari Becker I', 2, 3, 5, 1, NULL, 'Lelandstad', 'Aut ut autem cum voluptatem repudiandae suscipit qui. Eaque enim at non quos aut deserunt voluptatem. Sed tempore eveniet odit architecto. Recusandae impedit rerum voluptas molestias.', NULL, NULL, NULL, NULL, '8', 'Dr. Dena Hayes', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(21, 'Stella Jenkins', 2, 4, 5, 5, NULL, 'West Rae', 'Dolorem itaque eos ipsum autem nihil natus. Et suscipit est quo molestiae iure. Blanditiis iure qui saepe id et ut.', NULL, NULL, NULL, NULL, '6', 'Miss Bert Keeling', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(22, 'Dr. Wilber Adams II', 3, 3, 5, 4, NULL, 'Gayside', 'Est earum et non voluptas. Voluptates et in ut nam quia voluptatem autem. Quae ab voluptates blanditiis ea dicta saepe quas.', NULL, NULL, NULL, NULL, '3', 'Janessa Quitzon', 1, 1, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(24, 'Mr. Colten Grimes', 3, 3, 5, 3, NULL, 'New Hilbertland', 'Facere facilis eaque dolores ut cumque illum voluptatem. Qui esse iure temporibus quia adipisci qui et. Deleniti similique est beatae fugit officiis. Autem id suscipit voluptatem ut dignissimos.', NULL, NULL, NULL, NULL, '5', 'Alvis Weissnat', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(26, 'Zita', 2, 2, 3, 5, NULL, 'Rubenchester', 'Aut non quia eveniet. A tempore facere minus quos et. Laborum cupiditate et est repellat repellat nisi sed.', NULL, NULL, NULL, NULL, '2', 'Dr. Kassandra Erdman', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-18 22:12:34'),
(27, 'Mrs. Fatima Lockman V', 2, 5, 5, 5, NULL, 'Corwinland', 'Suscipit ut explicabo voluptates sint nisi dicta amet repudiandae. Rerum vitae rerum consequatur. Aperiam enim consequatur nesciunt numquam accusamus modi.', NULL, NULL, NULL, NULL, '4', 'Telly Konopelski III', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(28, 'Miss Emmy Hirthe IV', 4, 2, 6, 2, NULL, 'Lake Germaine', 'Facere quos doloribus dolor et. Nulla accusamus quis et nulla sit autem officia iure. Rem aut dolor nisi quae voluptas voluptatem esse. Rerum similique excepturi sequi sit.', NULL, NULL, NULL, NULL, '3', 'Dr. Jessie Ullrich MD', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(29, 'Dr. Tyrell Hudson DVM', 1, 4, 6, 4, NULL, 'Conorton', 'Illo voluptas reiciendis expedita quia. Labore modi in dolorem. Autem ea consequatur nobis ea nulla quia.', NULL, NULL, NULL, NULL, '1', 'Mr. Jarvis Bayer I', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(30, 'Ebba Murray', 2, 4, 3, 5, NULL, 'Fritschtown', 'Corrupti qui facilis ea tempore ducimus. Sapiente officiis non ipsum minima qui. Et tenetur sunt voluptatem aliquam in aut eum.', NULL, NULL, NULL, NULL, '7', 'Antwon Wisozk', 1, 1, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(31, 'Kasandra Raynor', 2, 2, 6, 5, NULL, 'South Tiaramouth', 'Quia voluptas autem sed error illum consequuntur. Rerum mollitia eos inventore perferendis explicabo porro. Optio harum eum quisquam beatae voluptatem quaerat.', NULL, NULL, NULL, NULL, '3', 'Brennon Rowe', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(32, 'Devonte Kemmer', 1, 4, 6, 1, NULL, 'Schmelerhaven', 'Sed dolor ratione distinctio dolore. Molestias qui fugiat sed saepe. Laboriosam praesentium esse sit aut fuga est aperiam.', NULL, NULL, NULL, NULL, '8', 'Allan O\'Kon I', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(33, 'Mark Moore', 2, 4, 3, 1, NULL, 'South Jedediahton', 'Asperiores voluptatibus necessitatibus doloribus minus assumenda. Adipisci alias quia voluptas magni itaque est commodi.', NULL, NULL, NULL, NULL, '9', 'Teagan Hessel', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(34, 'Augustine Berge', 3, 2, 3, 5, NULL, 'Iciechester', 'Quibusdam tenetur rerum quo voluptate. Dolores ut id sed quaerat molestias ea aliquid. Voluptates aperiam voluptatem aperiam eligendi odit vel. Rem quis ad ut aut rerum sapiente enim fugit.', NULL, NULL, NULL, NULL, '1', 'Emmie Feil DVM', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(35, 'Katelynn Nikolaus IV', 1, 2, 4, 1, NULL, 'Brianneside', 'Nihil quia dolorem aut quos laboriosam non nulla. Vel omnis sit fuga aliquam dignissimos reiciendis pariatur. Rerum unde qui consequatur et commodi perspiciatis rerum. Est voluptate optio dolorum.', NULL, NULL, NULL, NULL, '6', 'Dennis Schulist', 1, 0, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(36, 'Mellie Cartwright', 2, 5, 4, 5, NULL, 'West Emmitt', 'Incidunt nihil ratione error quas necessitatibus. Assumenda qui nihil sit magnam excepturi aut. Sit ullam repudiandae id praesentium. Possimus et repudiandae et eaque fugit.', NULL, NULL, NULL, NULL, '9', 'Anastacio Barton Jr.', 1, 1, NULL, NULL, '2024-08-16 12:41:40', '2024-08-16 12:41:40'),
(37, 'Dr. Kailyn Kassulke', 3, 1, 3, 5, NULL, 'Austinmouth', 'Repudiandae soluta quasi est dolor nisi nemo. Non reprehenderit quia aspernatur harum ratione itaque itaque. Consequatur repellendus quis quisquam nam ab. Deserunt et nisi voluptate quia.', NULL, NULL, NULL, NULL, '5', 'Brandi Kiehn', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(38, 'Lula Legros I', 3, 5, 3, 5, NULL, 'South Catherineborough', 'Optio itaque ipsa id impedit est. Aut ipsa inventore quia rerum eveniet incidunt. Vero sed aliquid voluptatem vitae. Voluptatem cum et corporis possimus voluptatem esse id.', NULL, NULL, NULL, NULL, '2', 'Prof. Madisyn Rutherford DVM', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(39, 'Prof. Jerome Jacobi Sr.', 1, 5, 3, 2, NULL, 'South Alanatown', 'Nisi quas molestias molestiae ad rerum quaerat iste tempore. Eaque ut voluptatum unde placeat et ipsum officiis. Omnis iusto rerum iure architecto sunt ut qui.', NULL, NULL, NULL, NULL, '10', 'Susana Skiles MD', 1, 1, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(40, 'Raphael Brekke', 2, 2, 3, 1, NULL, 'New Celinehaven', 'Totam et quam et velit in suscipit. Quod molestiae nesciunt sed magnam beatae cumque dolor.', NULL, NULL, NULL, NULL, '2', 'Dorris Mraz', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(41, 'Lawson Kshlerin', 4, 5, 3, 1, NULL, 'North Luciousview', 'Reprehenderit corporis illum ratione aspernatur dolores architecto. Eos non corporis illo. Voluptatem aliquam labore eos reprehenderit.', NULL, NULL, NULL, NULL, '6', 'Micheal Sipes IV', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(42, 'Dr. Camilla Olson Sr.', 5, 2, 3, 5, NULL, 'Krisville', 'Aut in sequi inventore voluptates minus qui sit. Ipsum fugit ut ea incidunt sit provident. Dolor est qui laudantium eum fugiat.', NULL, NULL, NULL, NULL, '8', 'Karolann Cormier', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(43, 'Ms. Katlyn Willms', 4, 2, 3, 1, NULL, 'Lilyanfurt', 'Minima eos quisquam tenetur temporibus. Odio qui blanditiis atque consequatur deserunt. Aut eius consequuntur beatae earum eos. Nihil ducimus ut excepturi ea inventore.', NULL, NULL, NULL, NULL, '3', 'Maeve Kuvalis', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(44, 'Luis Dickinson', 1, 5, 3, 3, NULL, 'Araville', 'Totam est corporis quod facilis. Vitae maiores sit aspernatur tempora.', NULL, NULL, NULL, NULL, '2', 'Trisha Schiller', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(45, 'Ms. Leta Will', 3, 4, 3, 1, NULL, 'Jenniferfort', 'Id dicta eos cumque sint. Delectus necessitatibus iure voluptatem aut nesciunt. Necessitatibus ipsum natus quos autem natus voluptates aliquam libero.', NULL, NULL, NULL, NULL, '6', 'Emmalee Wolff V', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(46, 'Mr. Darrick Pagac', 5, 5, 3, 2, NULL, 'Port Isaichester', 'Doloremque porro voluptatem ducimus earum quod. Et deserunt et ea blanditiis nisi. Aliquam iure rerum laborum magni esse dolores dolorem. Ut molestias est autem fugiat.', NULL, NULL, NULL, NULL, '7', 'Ms. Amaya Altenwerth', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(47, 'Samir Johnston', 4, 3, 3, 3, NULL, 'Hermistonton', 'Consequatur beatae animi ut vel modi. Quia nihil qui dolore reprehenderit. Nihil dolor esse quae consequuntur et.', NULL, NULL, NULL, NULL, '3', 'Lizeth Abernathy', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(48, 'Mrs. Antoinette Funk', 1, 4, 3, 4, NULL, 'Port Wendell', 'Quidem blanditiis nihil saepe blanditiis minima quibusdam commodi explicabo. Maxime ducimus quis omnis tenetur rerum maxime. Labore ea quae totam porro. Praesentium non non expedita laudantium a.', NULL, NULL, NULL, NULL, '6', 'Beau Roberts Sr.', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(49, 'Amalia Hintz III', 2, 4, 3, 5, NULL, 'East Arthur', 'Et saepe fugiat voluptatem sunt. Odio enim nihil in perspiciatis dignissimos. Deserunt ut laborum et ut iusto quidem eum. Illum et harum sit cupiditate.', NULL, NULL, NULL, NULL, '8', 'Shannon Cruickshank', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(50, 'Lauriane Jenkins', 4, 2, 3, 1, NULL, 'South Carlos', 'Voluptatem quidem exercitationem voluptatem fuga perferendis. Quo sit neque minus. Ex sed officiis quae quasi ut eum qui. Non et nemo atque et molestias molestiae in et.', NULL, NULL, NULL, NULL, '7', 'Hardy Gerlach', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(51, 'Cecile Denesik', 5, 4, 3, 1, NULL, 'East Marisa', 'Nihil aperiam eius dignissimos quaerat odit ut unde. Dolores corporis enim animi iure aut tempore ad. Impedit dolor ut laborum aspernatur. Aut ratione harum molestiae adipisci quo et fuga repellat.', NULL, NULL, NULL, NULL, '2', 'Louie Abshire', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(52, 'Mrs. Lura Tromp', 1, 1, 3, 1, NULL, 'Willieview', 'Corrupti et perferendis voluptatem occaecati sed. Occaecati tenetur assumenda nihil nihil. Sit deleniti hic neque rem.', NULL, NULL, NULL, NULL, '9', 'Maxie Heathcote Sr.', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(53, 'Alejandra Deckow', 4, 1, 3, 5, NULL, 'Skylarmouth', 'Nam ea perferendis et molestiae nisi et consequatur. Sit necessitatibus quisquam voluptatibus nihil reprehenderit facilis ut deserunt. Esse id quas soluta qui nihil.', NULL, NULL, NULL, NULL, '1', 'Dereck Hessel', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(54, 'Dr. Frieda Rogahn IV', 5, 3, 3, 4, NULL, 'South Hortense', 'Illo optio aut autem placeat et nihil nemo. Quis sit aliquam quasi nisi. Voluptas non corrupti quia ullam.', NULL, NULL, NULL, NULL, '1', 'Keanu Wintheiser', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(55, 'Shawna Wuckert', 4, 2, 3, 1, NULL, 'New Herta', 'Ipsum facilis veniam ducimus occaecati facere officia perspiciatis. Dolor autem eos rerum. Dignissimos cupiditate officia ducimus voluptatibus quasi quisquam et qui.', NULL, NULL, NULL, NULL, '7', 'Prof. Rahsaan Stiedemann', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(56, 'Kayla Kemmer', 1, 3, 3, 5, NULL, 'East Marjorymouth', 'Illo impedit nam sit. Dicta voluptatem debitis enim nihil rerum. Ea ducimus nostrum exercitationem culpa excepturi quam voluptas.', NULL, NULL, NULL, NULL, '1', 'Dr. Matteo Rath', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(57, 'Kenny Schultz', 2, 1, 3, 1, NULL, 'Carmenville', 'Quia non ab molestiae fugit voluptatibus. Sit voluptas saepe molestias quae consequatur quis. Quisquam quidem nobis labore similique.', NULL, NULL, NULL, NULL, '7', 'Iliana Hoppe', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(58, 'Shaylee Schultz', 3, 1, 3, 3, NULL, 'Lake Cordia', 'Molestiae voluptas voluptatem ducimus deleniti. Voluptatem dolores voluptates et est et. Consequuntur aliquid corrupti omnis qui error.', NULL, NULL, NULL, NULL, '3', 'Miss Alvera Lehner Sr.', 1, 0, NULL, NULL, '2024-08-16 12:43:51', '2024-08-16 12:43:51'),
(64, 'Web Developer', 2, 1, 3, 10, '100K', 'Peshawar', 'Not Available', NULL, NULL, NULL, NULL, '3', 'No Company', 1, 1, NULL, NULL, '2024-08-18 23:03:38', '2024-08-18 23:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Full Time', 1, '2024-08-15 04:23:23', '2024-08-15 04:23:23'),
(2, 'Part Time', 1, '2024-08-15 04:23:23', '2024-08-15 04:23:23'),
(3, 'Remote', 1, '2024-08-15 04:23:23', '2024-08-15 04:23:23'),
(4, 'Freelance', 1, '2024-08-15 04:23:23', '2024-08-15 04:23:23'),
(5, 'Individual', 1, '2024-08-15 04:23:23', '2024-08-15 04:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_15_082249_create_categories_table', 2),
(6, '2024_08_15_082310_create_job_types_table', 2),
(7, '2024_08_15_082359_create_jobs_table', 2),
(8, '2024_08_15_174935_alter_jobs_table', 3),
(9, '2024_08_16_164951_alter_jobs_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `designation`, `mobile`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Akif Ullah', 'akifullah0317@gmail.com', NULL, '$2y$10$5ppW0c/aGe8VQ9DWvyfGAO8pwcl8rADvomivys7jmeTGkhcuyCw7W', '', 'Web Developer', '03176186273', NULL, '2024-08-08 11:47:39', '2024-08-15 03:19:18'),
(4, 'Ms. Lavinia Hauck', 'robin.luettgen@example.net', '2024-08-15 04:23:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'svzmRSOvT5', '2024-08-15 04:23:23', '2024-08-15 04:23:23'),
(5, 'Verner Stamm', 'hintz.della@example.com', '2024-08-15 04:23:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'QhWpEnBAMv', '2024-08-15 04:23:23', '2024-08-15 04:23:23'),
(6, 'Elenora Barton', 'eliane.armstrong@example.org', '2024-08-15 04:23:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'ts3E9ALcZm', '2024-08-15 04:23:23', '2024-08-15 04:23:23'),
(7, 'Oswald Wyman', 'zetta.hansen@example.com', '2024-08-15 04:23:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'bbPB95z9aZ', '2024-08-15 04:23:23', '2024-08-15 04:23:23'),
(8, 'Adalberto Torphy', 'leonie.bode@example.net', '2024-08-15 04:23:23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 'nfUEfcJ5YM', '2024-08-15 04:23:23', '2024-08-15 04:23:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_category_id_foreign` (`category_id`),
  ADD KEY `jobs_job_type_id_foreign` (`job_type_id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_job_type_id_foreign` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
