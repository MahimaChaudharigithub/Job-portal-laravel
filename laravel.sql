-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2025 at 07:23 AM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `applyjob`
--

CREATE TABLE `applyjob` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` text NOT NULL,
  `seeker_id` text NOT NULL,
  `resume` text DEFAULT NULL,
  `applied_date` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applyjob`
--

INSERT INTO `applyjob` (`id`, `job_id`, `seeker_id`, `resume`, `applied_date`, `created_at`, `updated_at`) VALUES
(1, '55', '6', NULL, NULL, '2025-08-02 04:32:20', '2025-08-02 04:32:20'),
(2, '55', '6', 'resumes/MbnyV9htpDYAw2LDUXToFTFkpKSpq7Ty6e4p1xhD.png', '2025-08-19', '2025-08-19 01:03:56', NULL),
(3, '6', '6', 'resumes/resume_6_6_1755585483.png', '2025-08-19', '2025-08-19 01:08:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `email`) VALUES
(1, 'Manish', 'Mali', 'mahima@dht.net.in');

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
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `type` enum('full-time','part-time','remote') NOT NULL,
  `salary` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `location`, `type`, `salary`, `company_name`, `created_by`) VALUES
(1, 'Electrical Drafter', 'Dolorum laboriosam aliquam sint est cum culpa. Ut fugit corporis alias dicta eaque exercitationem fuga. Ut aperiam et non harum hic id iusto occaecati.', 'Lake Louieland', 'full-time', '64838.01', 'Cormier Inc', 'gaylord.maybell641'),
(2, 'Skin Care Specialist', 'Delectus molestias qui eum minima libero necessitatibus quidem. Culpa est eos praesentium corrupti ut magni dolores. Dignissimos alias omnis eum delectus.', 'Hellerview', 'full-time', '48890.43', 'Moore Inc', 'schneider.arlo890'),
(3, 'Prepress Technician', 'Aperiam rerum vel nobis. Velit libero dolore facere iure quo. Odio cumque quidem ipsa reiciendis tempora sit. Natus quaerat nihil recusandae aut rerum. Soluta mollitia ipsum ut harum cum dolore.', 'Lake Danykaport', 'part-time', '65439.57', 'Mitchell PLC', 'econnelly844'),
(4, 'Sheet Metal Worker', 'Consequatur sit quia sit atque. Consequatur et illum harum. Fuga quo nihil nemo qui repudiandae.', 'East Estebanton', 'part-time', '59552.67', 'Walter-Hoeger', 'gwendolyn94767'),
(5, 'Park Naturalist', 'Quos excepturi dolorem id quo. Ratione expedita necessitatibus quo voluptatem aut.', 'Port Monroeborough', 'remote', '81798.03', 'Lindgren, Will and Gerlach', 'demond75314'),
(6, 'Bus Driver', 'Non esse minima aliquam eos qui. Aut quia magnam quis accusantium dolorem quod. Et quae laboriosam officia nobis voluptas laboriosam officiis. Nisi dolor architecto ex iure.', 'Jessiefurt', 'full-time', '118847.83', 'Hirthe, Yost and Wiegand', 'erick.brakus381'),
(7, 'Elevator Installer and Repairer', 'Eum aliquam veniam voluptates modi quis ratione aut. Pariatur ex ut aspernatur facilis quos nostrum et omnis. Atque illum minus perferendis dolorem.', 'South Makennachester', 'part-time', '101172.15', 'McKenzie-Steuber', 'bette.feest472'),
(8, 'Physician', 'Facilis est ut qui natus illum. Soluta odit qui enim quasi. Culpa aut fuga possimus maxime. Voluptatem iure fuga error odit.', 'Macejkovicport', 'remote', '115941.2', 'Gleason, Hill and Bechtelar', 'yosinski744'),
(9, 'Motion Picture Projectionist', 'Fuga quia possimus at excepturi mollitia adipisci. Vel aut commodi quam. Nam nemo velit aut dolor quod facere. Quas expedita aut vero sed aut possimus. Libero ut consequatur rerum quia.', 'Schulistchester', 'part-time', '93499.91', 'Fay, Bailey and Block', 'labadie.ashton696'),
(11, 'Freight Inspector', 'Ut officiis nobis fugiat officiis quidem quia. Magni natus facilis voluptates perferendis enim. Aut incidunt beatae voluptates dolorum dolorum alias sed.', 'South Wayne', 'full-time', '55800.58', 'Rau LLC', 'hprosacco231'),
(12, 'Insurance Claims Clerk', 'Soluta temporibus neque culpa. Perferendis voluptas nostrum nihil assumenda ipsa.', 'Hilarioville', 'remote', '105821.06', 'Koepp-Connelly', 'padberg.emmanuel295'),
(13, 'Recruiter', 'Ullam voluptates dolor aut minus expedita. Eum et optio sequi et odit aut. Quos et aut maiores quia porro expedita autem. Optio delectus quo quo minima eius exercitationem.', 'Lake Helenaside', 'full-time', '33062.5', 'Streich LLC', 'gislason.abagail299'),
(14, 'Casting Machine Set-Up Operator', 'Omnis commodi et ducimus adipisci. Excepturi est adipisci voluptatibus ut odio ea commodi maiores. Repellendus aperiam reprehenderit voluptas quos nobis.', 'Kuhlmanville', 'part-time', '85770.61', 'Treutel, Pacocha and Reichel', 'bette62708'),
(15, 'Market Research Analyst', 'Est vel autem omnis. Molestiae esse aliquam quisquam. Nulla consequatur ut qui aut. Sed quo in qui sed ipsa beatae in. Atque pariatur sed nihil unde. Blanditiis consequatur nostrum id sunt quia aut.', 'Rennerside', 'part-time', '71902.81', 'Farrell and Sons', 'haag.queenie555'),
(16, 'Millwright', 'Necessitatibus assumenda doloribus et pariatur quia. Animi voluptatibus ea alias ratione. Error unde corrupti aut eaque quia.', 'New Elise', 'part-time', '65328.59', 'West Group', 'oconner.mohamed980'),
(17, 'Welding Machine Tender', 'Aperiam necessitatibus quis quod minus. Qui blanditiis quibusdam harum laboriosam minima necessitatibus ex. Tenetur odit aliquid sapiente deserunt voluptas.', 'Crooksport', 'full-time', '114042.63', 'Schmidt Inc', 'tito.raynor575'),
(18, 'Retail Salesperson', 'Temporibus sint in libero minus voluptatum. Ea voluptatem minus aut ad iure odit nobis. Aliquid corporis nulla rerum.', 'Hellerburgh', 'full-time', '118938.47', 'Moen Inc', 'katrina.gerhold179'),
(19, 'Calibration Technician OR Instrumentation Technician', 'Quas delectus ab commodi sit nihil maiores excepturi nesciunt. Vel neque voluptas odit quam debitis expedita. Vel voluptatum placeat maxime neque.', 'Lake Idellabury', 'full-time', '116729.33', 'Hammes-Ebert', 'sauer.kip479'),
(20, 'Cement Mason and Concrete Finisher', 'Similique et quaerat blanditiis cupiditate commodi veritatis alias. Pariatur vel aliquid iure corporis non. Sunt sint libero reiciendis accusantium sed repellat ut adipisci.', 'Kyleighview', 'full-time', '109492.82', 'Schiller Inc', 'herman.javon680'),
(21, 'Chemical Equipment Controller', 'Delectus doloribus delectus nesciunt sapiente quibusdam et non ut. Est et molestias qui voluptate et. Maxime est cupiditate non sequi dignissimos vel aspernatur et.', 'East Tessie', 'part-time', '37017.59', 'Bechtelar and Sons', 'josianne.feeney283'),
(22, 'Nursing Instructor', 'Culpa fugiat esse dolores earum non ut. Sit beatae consectetur quia totam. Aliquam cupiditate ea dicta vitae. Officia architecto laudantium adipisci in.', 'North Thereseburgh', 'remote', '51123.98', 'Daniel Inc', 'tressa.cremin803'),
(23, 'Insurance Claims Clerk', 'Labore inventore est ea quia quis. Neque aut exercitationem quae aut. Nemo cumque quia similique reprehenderit dolorem quod.', 'North Laurel', 'full-time', '98118.51', 'Shanahan-Gerlach', 'candace62681'),
(24, 'Portable Power Tool Repairer', 'Nemo delectus voluptas facilis officiis. Labore voluptas magnam architecto accusamus ea. Nostrum dolor ut alias pariatur a ex distinctio.', 'Feeneystad', 'remote', '88619.7', 'Ullrich, Williamson and Schoen', 'dee80587'),
(25, 'Animal Breeder', 'Repellendus omnis quasi debitis iste. Aut fuga impedit sapiente et cumque aut harum. Omnis totam non libero aliquid. Repellat pariatur ullam molestiae qui voluptatem.', 'Kellychester', 'remote', '34685.04', 'Boyle-O\'Connell', 'ledner.maureen798'),
(26, 'Able Seamen', 'Voluptas similique eum voluptatum enim. Explicabo optio in modi ut voluptatem. Ipsum fugit non nisi.', 'West Orlandfurt', 'remote', '30040.21', 'DuBuque-Orn', 'tara12192'),
(27, 'Airline Pilot OR Copilot OR Flight Engineer', 'Nulla ea asperiores soluta sit. Laborum tempore nihil quos necessitatibus. Qui et nesciunt beatae natus. Qui ea non repellendus vel vitae enim libero.', 'New Janiceland', 'full-time', '100731.13', 'Bosco-Schinner', 'johann.wunsch754'),
(28, 'Welder', 'Nulla et eveniet ut perspiciatis eius. Molestiae sit sapiente expedita nihil ratione corporis unde sint. Ea sunt rem harum omnis sit repudiandae dolore.', 'Lake Eriberto', 'full-time', '105228.89', 'Krajcik Ltd', 'gerhold.ella468'),
(29, 'Multiple Machine Tool Setter', 'Ut ea veritatis ut earum. Autem similique non eligendi exercitationem. Et soluta dolor ad. Eum et ad corrupti assumenda adipisci ducimus.', 'Keanuhaven', 'part-time', '76239.84', 'Predovic, Brekke and Goodwin', 'deckow.jany173'),
(30, 'Funeral Attendant', 'Voluptates aperiam eveniet tempora magnam consequuntur sapiente. Ipsam enim ipsum et non nesciunt assumenda. Natus voluptate dolor sint alias temporibus. Sit incidunt aut ex reiciendis.', 'Gutkowskiborough', 'full-time', '42014.01', 'Hyatt PLC', 'christina76588'),
(31, 'Truck Driver', 'Accusantium asperiores eius omnis corporis possimus deleniti. Qui sit molestiae sunt sit ea. Esse voluptatem accusamus sit quibusdam. Aspernatur voluptas quasi aperiam ab et enim enim.', 'Lake Marianahaven', 'full-time', '82088.34', 'Zemlak-Stanton', 'khodkiewicz982'),
(32, 'Boiler Operator', 'Facere id sint maiores occaecati sed. Autem itaque dignissimos repudiandae vero fugit ut voluptas. Rerum quis eaque quas dolorum non odit similique.', 'Patsybury', 'full-time', '74428.1', 'Boyle Inc', 'brandon79630'),
(33, 'Machinist', 'Aliquam ut et nemo laboriosam aut quam dolores debitis. Dolorum repellendus qui est. Aut et aliquid iure excepturi sed. Temporibus perspiciatis sit cumque pariatur voluptatem.', 'Myrtleburgh', 'part-time', '65740.59', 'Collier, Rippin and Volkman', 'ankunding.luna588'),
(34, 'Musical Instrument Tuner', 'Soluta laborum est sunt et velit totam eius. Eum consequatur accusantium doloribus nemo occaecati. Molestiae magni quo facilis ipsa enim ea in.', 'Millertown', 'part-time', '51332.84', 'Hettinger, Reilly and Altenwerth', 'clifford84224'),
(35, 'Eligibility Interviewer', 'Facere facilis earum dolorem. Beatae laboriosam qui suscipit ad quasi. Quia at vitae esse.', 'Dickinsonmouth', 'remote', '58624.09', 'Hilpert PLC', 'reagan92859'),
(36, 'Pewter Caster', 'Qui eum accusamus eos voluptatem repudiandae quam rerum. Qui veniam vitae et ullam reprehenderit unde dicta. Ea voluptatem quia sapiente exercitationem in et.', 'Lake Lynn', 'part-time', '61536.51', 'Bergstrom-Cummerata', 'danial.reinger963'),
(37, 'Art Director', 'Quasi dolor quae eligendi cum fugiat consequatur iste. Quam error quis alias nesciunt. Autem explicabo dolorem facere voluptas. Dolores molestias repellat labore commodi ea sint.', 'Earlineborough', 'full-time', '105822.59', 'Keebler-Marvin', 'antonietta.wunsch471'),
(38, 'Welding Machine Setter', 'Qui quos qui voluptas. Rem porro eligendi maiores ut est. Dolores rerum quia voluptatum ut. Magnam velit quae dolores ratione. Optio vitae ea minus rem pariatur voluptatum est.', 'Port Amir', 'part-time', '80658.68', 'Konopelski Ltd', 'stephan.paucek750'),
(39, 'Purchasing Manager', 'Et et dolores tenetur accusamus. Dolores animi harum soluta ratione. Est quasi sequi libero aut beatae. Error asperiores ipsa veniam id sapiente. Et ut molestiae non nulla qui.', 'Alejandrinburgh', 'part-time', '85012.94', 'Heller, Parker and Bergnaum', 'rosamond.sawayn842'),
(40, 'Architect', 'Pariatur dolores omnis quasi qui. Ipsum illum et est. Recusandae libero in deleniti ipsa. Hic facere facilis earum numquam sunt sit.', 'Huldashire', 'full-time', '85889.34', 'Schmeler-Corwin', 'tatum57553'),
(41, 'Sculptor', 'Tempora minima saepe voluptas deserunt eum. In in molestias sunt et omnis. Eligendi eaque amet temporibus fuga quasi. Saepe ut hic sed.', 'Starkbury', 'full-time', '69579.34', 'Johnson PLC', 'sally26759'),
(42, 'Retail Salesperson', 'Natus excepturi fugiat eos odio fuga odit pariatur molestiae. Pariatur quod ipsa voluptatum reiciendis aut excepturi. Sed velit illum inventore et.', 'East Orval', 'remote', '30085.42', 'Hackett, Greenholt and Lueilwitz', 'marjorie33566'),
(43, 'Recruiter', 'Ex maiores aliquid ut quia ut nesciunt. Quia aut natus cum eius veritatis. Et quos consectetur sapiente ut. Omnis aut provident aut mollitia quidem et. Tenetur eius assumenda nam ut.', 'East Martinaside', 'part-time', '78689.14', 'Lubowitz-Kuhlman', 'hauck.edna634'),
(44, 'Packer and Packager', 'Voluptate eum quis magnam aut. Nisi unde cumque accusantium culpa quam aperiam fuga. Tempora eius in occaecati temporibus.', 'North Rhiannaside', 'part-time', '61584.81', 'Schmidt, Nader and Miller', 'bartoletti.dorthy762'),
(45, 'Actor', 'Sed blanditiis culpa iste a ut explicabo. Pariatur quia consequuntur dolore ut amet voluptatum. Aut facere deleniti totam accusantium voluptate.', 'West Josue', 'full-time', '99750.29', 'Bednar and Sons', 'upton.brennon207'),
(46, 'Mechanical Engineer', 'Nulla ipsam aut deserunt quia quia exercitationem. Eligendi vel cum doloremque ut. Est facere eius aliquam cum sunt delectus. Numquam doloremque eos id velit laborum ea totam.', 'New Bernadette', 'part-time', '101372.69', 'Cormier, Glover and Murray', 'magdalen57180'),
(47, 'Singer', 'Fuga dolor qui ut aliquid delectus. Earum voluptatem et numquam ea minus sunt rerum quia. Harum tempora et commodi et sunt ut odit. Hic atque dolorem voluptates ea incidunt odio.', 'West Winston', 'full-time', '64126.86', 'McClure Group', 'bayer.trisha334'),
(48, 'Metal-Refining Furnace Operator', 'Laborum aut fugit cumque ullam. Consequuntur perferendis vero autem qui aliquam vel tempora. Aut deserunt et necessitatibus est hic aut.', 'Javonberg', 'full-time', '32426.64', 'Jerde, Altenwerth and Schuster', 'zula37912'),
(49, 'Drycleaning Machine Operator', 'Velit autem et molestiae reprehenderit omnis. Sapiente animi et aliquam repudiandae consequatur exercitationem commodi. Ab amet unde occaecati laboriosam quo corporis.', 'Hyatthaven', 'part-time', '66144.51', 'Schroeder Group', 'connor.cremin212'),
(50, 'Office Clerk', 'Enim qui harum minus provident. Nostrum fugit non eius quia facilis facilis. Voluptates molestiae optio dolor et consequatur illo.', 'New Pearlieland', 'part-time', '96734.95', 'Price-Pfeffer', 'ioconner931'),
(52, 'Testing', 'Testing of the job', 'vadodara', 'full-time', '50000', 'company', NULL),
(55, 'Test1', 'adsf', 'vadodara', 'full-time', '50000', 'asdfsdf', 'Mahima');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_07_09_070417_create_jobs_table', 2),
(6, '2025_08_02_091511_applyjob', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
  `user_role` varchar(100) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mahima', 'mahima@dht.net.in', 'EMPLOYEE', NULL, '7c222fb2927d828af22f592134e8932480637c0d', NULL, '2025-01-27 02:23:32', '2025-01-27 02:23:32'),
(5, 'Jay', 'test@gmail.com', 'SEEKER', NULL, '$2y$10$ajrAE1GY6EslS1Y60kGB/.4vqmFeq8jrRJAhxt2BuNyBO/y8mpteq', NULL, '2025-01-27 03:44:08', '2025-01-27 03:44:08'),
(6, 'Mansi', 'test1@gmail.com', 'SEEKER', NULL, '7c222fb2927d828af22f592134e8932480637c0d', NULL, '2025-01-27 03:46:59', '2025-01-27 03:46:59'),
(7, 'MAC', 'admin@dht.net.in', 'SEEKER', NULL, '25d55ad283aa400af464c76d713c07ad', NULL, '2025-08-02 02:25:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applyjob`
--
ALTER TABLE `applyjob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
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
-- AUTO_INCREMENT for table `applyjob`
--
ALTER TABLE `applyjob`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
