-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 25, 2026 at 12:38 PM
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
-- Database: `mama-africa`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vision_title_ar` varchar(255) DEFAULT NULL,
  `vision_title_en` varchar(255) DEFAULT NULL,
  `vision_desc_ar` text DEFAULT NULL,
  `vision_desc_en` text DEFAULT NULL,
  `vision_image` varchar(255) DEFAULT NULL,
  `value_title_ar` varchar(255) DEFAULT NULL,
  `value_title_en` varchar(255) DEFAULT NULL,
  `value_image` varchar(255) DEFAULT NULL,
  `value_participation_ar` varchar(255) DEFAULT NULL,
  `value_participation_en` varchar(255) DEFAULT NULL,
  `value_participation_desc_ar` text DEFAULT NULL,
  `value_participation_desc_en` text DEFAULT NULL,
  `value_integrity_ar` varchar(255) DEFAULT NULL,
  `value_integrity_en` varchar(255) DEFAULT NULL,
  `value_integrity_desc_ar` text DEFAULT NULL,
  `value_integrity_desc_en` text DEFAULT NULL,
  `value_transparency_ar` varchar(255) DEFAULT NULL,
  `value_transparency_en` varchar(255) DEFAULT NULL,
  `value_transparency_desc_ar` text DEFAULT NULL,
  `value_transparency_desc_en` text DEFAULT NULL,
  `value_accountability_ar` varchar(255) DEFAULT NULL,
  `value_accountability_en` varchar(255) DEFAULT NULL,
  `value_accountability_desc_ar` text DEFAULT NULL,
  `value_accountability_desc_en` text DEFAULT NULL,
  `mission_title_ar` varchar(255) DEFAULT NULL,
  `mission_title_en` varchar(255) DEFAULT NULL,
  `mission_desc_ar` text DEFAULT NULL,
  `mission_desc_en` text DEFAULT NULL,
  `mission_image` varchar(255) DEFAULT NULL,
  `history_title_ar` varchar(255) DEFAULT NULL,
  `history_title_en` varchar(255) DEFAULT NULL,
  `history_desc_ar` text DEFAULT NULL,
  `history_desc_en` text DEFAULT NULL,
  `history_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `goal_title_ar` varchar(255) DEFAULT NULL,
  `goal_title_en` varchar(255) DEFAULT NULL,
  `goal_desc_ar` text DEFAULT NULL,
  `goal_desc_en` text DEFAULT NULL,
  `goal_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `vision_title_ar`, `vision_title_en`, `vision_desc_ar`, `vision_desc_en`, `vision_image`, `value_title_ar`, `value_title_en`, `value_image`, `value_participation_ar`, `value_participation_en`, `value_participation_desc_ar`, `value_participation_desc_en`, `value_integrity_ar`, `value_integrity_en`, `value_integrity_desc_ar`, `value_integrity_desc_en`, `value_transparency_ar`, `value_transparency_en`, `value_transparency_desc_ar`, `value_transparency_desc_en`, `value_accountability_ar`, `value_accountability_en`, `value_accountability_desc_ar`, `value_accountability_desc_en`, `mission_title_ar`, `mission_title_en`, `mission_desc_ar`, `mission_desc_en`, `mission_image`, `history_title_ar`, `history_title_en`, `history_desc_ar`, `history_desc_en`, `history_image`, `created_at`, `updated_at`, `goal_title_ar`, `goal_title_en`, `goal_desc_ar`, `goal_desc_en`, `goal_image`) VALUES
(1, 'رؤيتنا', 'Our Vision', 'إقامة مجتمع متكامل وموحد يعيش فيه الأفراد في وئام، متحدين باللغة والثقافة.', 'To establish an integrated and unified society where individuals live in harmony, unity where everyone\'s dignity should be respected irrespective of their language, color, ethnicity, or nationality\r\n\r\nTo establish an integrated and unified society where individuals live in harmony, united by language, culture,', NULL, 'قيمنا', 'OUR VALUE', NULL, 'المشاركة', 'Participation', 'نؤمن بالعمل مع المجتمعات والشركاء والمتطوعين لإحداث تأثير إيجابي ودائم.', 'To promote peaceful coexistence among community members.\r\nTo encourage participation in building and developing a humane and inclusive society.\r\nTo enhance the community\'s capabilities in serving its members.', 'النزاهة', 'Integrity', 'التصرف بصدق وشفافية ومساءلة في كل ما نقوم به.', 'Acting with honesty, transparency, and accountability in all we do.', 'الشفافية', 'Transparency', 'نلتزم بالانفتاح من خلال مشاركة معلومات دقيقة عن أنشطتنا وقراراتنا واستخدام الموارد.', 'We are committed to openness by sharing accurate information about our activities, decisions, and use of resources.', 'المساءلة', 'Accountability', 'نأخذ كامل المسؤولية عن أفعالنا ونتأكد من تقديم خدماتنا بطريقة أخلاقية وفعالة لمن نخدمهم.', 'We take full responsibility for our actions and ensure that we deliver our services ethically and effectively to those we serve.', 'مهمتنا', 'Our Mission', 'بناء مجتمعات قوية متجذرة في الحضارة الإنسانية، يحكمها النظام، وتقوم على احترام كرامة الإنسان', 'To build strong communities rooted in human civilization, governed by order, and founded on respect for human dignity', NULL, 'تاريخنا', 'Our History', 'منظمة ماما أفريكاهي منظمة وطنية سودانية غير حكومية تطوعية مسجلة تحت رمز T 1232 بتاريخ ديسمبر 2022، وتم تجديدها حتى 20/03/2024. تأسست بواسطة 36 عضوًا في ولاية شمال دارفور، وأنشأت مكتبًا رئيسيًا في الفاشر. لديها مكاتب فرعية في كتم. تتعاون مع Autash وTabashir وDAID والجمعية الطبية المشتركة وNRC. وهي عضو في مجموعات عمل WASH والتغذية والصحة والتعليم وFSL وحماية الطفل وبناء السلام.', 'Mama Africa is a Sudanese National Non-Governmental voluntary organization registered under code T 1232, dated December 2022, renewed to 20/03/2024. Founded by 36 members in North Darfur state, it established a head office in El Fasher. It has sub-offices in Kutum. It engages in partnership with Autash, Tabashir, DAID, Common Medical Association, and NRC. It is a cluster member of WASH, Nutrition, Health, Education, FSL, Child Protection, and Peacebuilding working group.', 'about_images/69f378077170f.jpeg', '2026-02-27 04:21:55', '2026-05-24 06:06:05', 'هدفنا', 'Our Goal', 'استيعاب التنمية الاجتماعية للناس والخدمات الأساسية من خلال توفير بناء السلام والأمن الغذائي والحماية والصرف الصحي والتنمية الثقافية', 'To comprehend people social development and basic services by providing peace building, food security, protection. WASH and cultural development', 'about_images/6a0b047815019.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `impact_desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `tiktok_url` varchar(255) DEFAULT NULL,
  `whatsapp_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `telegram_url` varchar(255) DEFAULT NULL,
  `x_url` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `location_ar` varchar(255) DEFAULT NULL,
  `location_en` varchar(255) DEFAULT NULL,
  `footer_desc_ar` text DEFAULT NULL,
  `footer_desc_en` text DEFAULT NULL,
  `developer_name_ar` varchar(255) DEFAULT NULL,
  `developer_name_en` varchar(255) DEFAULT NULL,
  `developer_link` varchar(255) DEFAULT NULL,
  `developer_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `phone_number`, `facebook_url`, `tiktok_url`, `whatsapp_url`, `instagram_url`, `created_at`, `updated_at`, `linkedin_url`, `telegram_url`, `x_url`, `email`, `location_ar`, `location_en`, `footer_desc_ar`, `footer_desc_en`, `developer_name_ar`, `developer_name_en`, `developer_link`, `developer_logo`) VALUES
(8, '+256791746656', 'https://www.facebook.com/people/Mama-africa-organisation/61584199986358/', 'https://www.tiktok.com/@.digital.age?_r=1&_t=ZS-94Jzi31sAh0', 'https://wa.me/256790655747', 'https://www.instagram.com/digital_age2026?igsh=N3Npenk2bXJlMzZ6', '2026-03-01 05:58:04', '2026-05-01 08:11:57', 'https://www.linkedin.com/in/ahmed-ali-elhag', 'https://www.linkedin.com/in/ahmed-ali-elhag', 'https://www.linkedin.com/in/ahmed-ali-elhag', 'info@mamaafricahumanitarian.org', 'كيرياندنغو,أوغندا+الفاشر, السودان', 'Kiryandongo, Uganda + AL-Fashir ,Sudan', 'تقدم المساعدات الأساسية والمياه النظيفة والتعليم والأمل للمجتمعات في أفريقيا. معًا يمكننا إعادة بناء الحياة.', 'Bringing essential aid, clean water, education, and hope to communities in Africa. Together, we can rebuild lives.', 'ديجتال أيج للحلول التقنية', 'Digital Age  Tech Solutions', 'https://www.digitalage-sd.com', 'contacts/6Ew9SJDGaVfh03uLkQ99FPJGXg1GMlrcwLz7rf8b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `donor_name` varchar(255) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `frequency` enum('one-time','monthly') NOT NULL DEFAULT 'one-time',
  `donor_email` varchar(255) DEFAULT NULL,
  `currency` varchar(3) NOT NULL DEFAULT 'USD',
  `payment_method_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transaction_reference` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` enum('pending','confirmed','failed','refunded') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `created_at`, `updated_at`, `project_id`, `donor_name`, `amount`, `frequency`, `donor_email`, `currency`, `payment_method_id`, `transaction_reference`, `message`, `status`) VALUES
(1, '2026-03-06 08:11:27', '2026-03-06 08:11:27', NULL, 'Ahmed Ali', 50.00, 'one-time', 'ahmedaliusit@gmail.com', 'USD', 1, '09876543', 'i hope to see you soon achieving your gools', 'pending'),
(2, '2026-03-16 08:27:39', '2026-03-16 08:27:39', NULL, 'Verification Test', 50.00, 'monthly', 'test@example.com', 'USD', 1, 'VERIFY-MONTHLY-TEST', NULL, 'pending'),
(3, '2026-03-16 08:48:49', '2026-03-16 08:48:49', NULL, 'ففف', 50.00, 'one-time', NULL, 'USD', 2, '-098', NULL, 'pending'),
(4, '2026-03-16 08:53:29', '2026-03-16 08:53:29', NULL, 'Test Donor', 50.00, 'one-time', 'test@example.com', 'USD', 2, 'REF-SUCCESS-123', NULL, 'pending'),
(5, '2026-03-16 08:54:48', '2026-03-16 08:54:48', NULL, 'Ahmed Ali', 25.00, 'monthly', 'ahmedaliusit@gmail.com', 'USD', 2, '09876543', NULL, 'pending'),
(6, '2026-03-16 09:00:15', '2026-03-16 09:00:15', NULL, 'Ahmed Ali', 25.00, 'one-time', 'ahmedaliusit@gmail.com', 'USD', 2, '09876543', NULL, 'pending'),
(7, '2026-03-16 09:07:22', '2026-03-16 09:07:22', NULL, 'Test Donor', 100.00, 'one-time', 'ahmed@gmail.com', 'USD', 2, 'REF12345', NULL, 'pending'),
(8, '2026-03-25 18:23:23', '2026-03-25 18:23:23', NULL, 'Final Test', 50.00, 'one-time', 'finaltest@example.com', 'USD', 1, 'REF-OK-123', NULL, 'pending'),
(9, '2026-03-25 18:24:42', '2026-03-25 18:33:16', NULL, 'Ahmed Ali', 50.00, 'one-time', 'ahmedaliusit@gmail.com', 'USD', 1, '09876543', 'ytr', 'confirmed'),
(10, '2026-03-30 11:49:33', '2026-03-30 11:49:33', NULL, 'Ahmed Ali', 10.00, 'one-time', 'ahmedaliusit@gmail.com', 'USD', 1, '09876543', 'razan', 'pending'),
(11, '2026-04-01 18:42:34', '2026-04-01 18:42:34', NULL, 'Ahmed Ali', 50.00, 'monthly', 'ahmedaliusit@gmail.com', 'USD', 1, '09876543', 'ytytsre', 'pending');

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
-- Table structure for table `heroes`
--

CREATE TABLE `heroes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `org_name_ar` varchar(255) DEFAULT NULL,
  `org_name_en` varchar(255) DEFAULT NULL,
  `tagline_ar` varchar(255) DEFAULT NULL,
  `tagline_en` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `heroes`
--

INSERT INTO `heroes` (`id`, `title_ar`, `title_en`, `description_ar`, `description_en`, `image`, `created_at`, `updated_at`, `org_name_ar`, `org_name_en`, `tagline_ar`, `tagline_en`, `logo`) VALUES
(1, 'معاً من أجل الإنسانية', 'A simple meal can mean everything.', 'في المجتمعات التي تواجه المصاعب، تُذكّرنا لحظات كهذه بقوة التعاطف والعمل الجماعي. يتكاتف المتطوعون والقادة المحليون ليس فقط لتقديم الطعام، بل لاستعادة الكرامة والأمل والتواصل الإنساني.', 'In communities facing hardship, moments like these remind us of the power of compassion and collective action. Volunteers and local leaders come together not just to serve food, but to restore dignity, hope, and human connection.', 'hero_images/69f355c12eb66.jpeg', '2026-02-27 03:44:36', '2026-04-30 15:36:54', 'ماما أفريكا', 'Mama Africa', 'نمكين المجتمعات في جميع أنحاء أفريقيا', 'Empowering Communities Across Africa', 'hero_images/69f377161295b.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `full_name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'razan hassan', 'razanhassanrakhi@gmail.com', 'i wamde', '2026-02-16 09:29:22', '2026-02-16 09:29:22'),
(2, 'mona', 'mona@gmail.com', 'tdfeyhfkj,df', '2026-02-16 10:09:51', '2026-02-16 10:09:51'),
(3, 'mam', 'razanhassan003@gmail.com', 'fuhroi', '2026-02-17 05:46:32', '2026-02-17 05:46:32'),
(4, 'اا', 'ahmedaliusit@gmail.com', 'نتا', '2026-03-23 21:55:41', '2026-03-23 21:55:41'),
(5, 'عمران', 'OMRAN@GMAIL.COM', 'JL', '2026-03-23 21:56:25', '2026-03-23 21:56:25'),
(6, 'عثما', 'osman@gmail.com', 'عثمان تجريبي', '2026-03-23 22:09:26', '2026-03-23 22:09:26'),
(7, 'عمران', 'ahmedaliustit@gmail.com', 'oiuy', '2026-03-23 22:09:57', '2026-03-23 22:09:57'),
(8, 'أحمد علي الحاج عبد الرحمن', 'ahmedaliustit2025@gmail.com', 'Hi Mama Africa I want to be part of you as volunteer', '2026-03-23 22:15:38', '2026-03-23 22:15:38'),
(9, 'John', 'john@avail.zone', 'Hey there,\r\n\r\nIt looks like mamaafricahumanitarian.org recently launched — congrats.\r\n\r\nJust a quick question: have you thought about promotion partnerships with other businesses nearby?\r\n\r\nIt’s pretty simple — you promote a complementary business to your audience, and they promote your business to theirs. Customers flow both ways. No ad spend needed.\r\n\r\nI made a map of businesses near you that could be great trade partners.\r\n\r\nInterested in taking a look? It only takes 30 seconds:\r\nhttps://start.avail.zone/promotion-exchange?website=mamaafricahumanitarian.org\r\n\r\nEither way, good luck as you get things rolling.\r\n\r\n– John', '2026-03-24 09:31:47', '2026-03-24 09:31:47'),
(10, 'Georgia', 'georgia@getonglobe.com', 'Hi [mamaafricahumanitarian.org],\r\n\r\nI was checking your website and find out you have a good design and it looks awesome, but it’s not ranking on Google and other major search engines.\r\n\r\nWe can place your website on Google\'s 1st page. Yahoo, Facebook, LinkedIn, YouTube, Instagram, Pinterest etc.\r\n\r\nI would be pleased to provide you with \"charges,\" \"Proposals,\" details of past work!\r\n\r\nThank you\r\nGeorgia | Founder & Marketing Director \r\nToll Free: +1 800 240 2815\r\nhttp://wa.me/917042524727 \r\n\r\n\r\n\r\n\r\n\r\nNote: - If you’re not Interested in our Services, send us NO.', '2026-03-24 09:41:07', '2026-03-24 09:41:07'),
(11, 'Dianna', 'domains@search-mamaafricahumanitarian.org', 'Dear Sir/Madam\r\n\r\nEnlist mamaafricahumanitarian.org in Google Search Index so it can be appear in google search results!\r\n\r\nRegister mamaafricahumanitarian.org at  https://searchregister.net', '2026-03-24 19:36:43', '2026-03-24 19:36:43'),
(12, 'Stuart', 'domains@search-mamaafricahumanitarian.org', 'Hi\r\n\r\nSubmit mamaafricahumanitarian.org in Google Search Index to show up  in web search results!\r\n\r\nRegister mamaafricahumanitarian.org at  https://searchregister.org', '2026-03-25 18:03:53', '2026-03-25 18:03:53'),
(13, 'Mollie', 'molliehanson.vgo@gmail.com', 'Hi there,\r\n\r\nAre you looking to grow your YouTube channel with real, engaged subscribers?\r\n\r\nWe offer a YouTube growth service designed to help you consistently expand your audience in a safe and effective way.\r\n\r\nHere’s what you can expect:\r\n\r\n- Gain approximately 300–500 new subscribers every month\r\n- Attract viewers who are genuinely interested in your content\r\n- Increase engagement with more likes, comments, and interactions\r\n- 100% manual promotion — no bots, no shortcuts\r\n\r\nOur service is simple and affordable at just $60/month, and we can get started right away.\r\n\r\nIf you’d like to see examples of our past results or learn more, just reply to this email — we’d be happy to share details.\r\n\r\nBest regards,\r\n\r\nMollie\r\n\r\nTo unsubscribe, simply reply with “unsubscribe” in the subject line.', '2026-04-10 15:17:14', '2026-04-10 15:17:14'),
(14, 'Adolph', 'domains@search-mamaafricahumanitarian.org', 'Dear Sir/Madam\r\n\r\nRegister mamaafricahumanitarian.org in GoogleSearchIndex to appear in online search results!\r\n\r\nInsert mamaafricahumanitarian.org now: https://searchregister.info', '2026-04-15 16:19:10', '2026-04-15 16:19:10'),
(15, 'Toni', 'domains@search-mamaafricahumanitarian.org', 'Greetings\r\n\r\nAdd mamaafricahumanitarian.org in GoogleSearchIndex and have it be visible in online search results!\r\n\r\nEnlist mamaafricahumanitarian.org now: https://searchregister.org', '2026-05-01 16:40:38', '2026-05-01 16:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `legal_contents`
--

CREATE TABLE `legal_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_type` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `intro_ar` text DEFAULT NULL,
  `intro_en` text DEFAULT NULL,
  `privacy_intro_long_ar` text DEFAULT NULL,
  `privacy_intro_long_en` text DEFAULT NULL,
  `s1_title_ar` varchar(255) DEFAULT NULL,
  `s1_title_en` varchar(255) DEFAULT NULL,
  `s1_content_ar` text DEFAULT NULL,
  `s1_content_en` text DEFAULT NULL,
  `s2_title_ar` varchar(255) DEFAULT NULL,
  `s2_title_en` varchar(255) DEFAULT NULL,
  `s2_content_ar` text DEFAULT NULL,
  `s2_content_en` text DEFAULT NULL,
  `s3_title_ar` varchar(255) DEFAULT NULL,
  `s3_title_en` varchar(255) DEFAULT NULL,
  `s3_content_ar` text DEFAULT NULL,
  `s3_content_en` text DEFAULT NULL,
  `s4_title_ar` varchar(255) DEFAULT NULL,
  `s4_title_en` varchar(255) DEFAULT NULL,
  `s4_content_ar` text DEFAULT NULL,
  `s4_content_en` text DEFAULT NULL,
  `s5_title_ar` varchar(255) DEFAULT NULL,
  `s5_title_en` varchar(255) DEFAULT NULL,
  `s5_content_ar` text DEFAULT NULL,
  `s5_content_en` text DEFAULT NULL,
  `s6_title_ar` varchar(255) DEFAULT NULL,
  `s6_title_en` varchar(255) DEFAULT NULL,
  `s6_content_ar` text DEFAULT NULL,
  `s6_content_en` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `legal_contents`
--

INSERT INTO `legal_contents` (`id`, `page_type`, `phone`, `email`, `title_ar`, `title_en`, `intro_ar`, `intro_en`, `privacy_intro_long_ar`, `privacy_intro_long_en`, `s1_title_ar`, `s1_title_en`, `s1_content_ar`, `s1_content_en`, `s2_title_ar`, `s2_title_en`, `s2_content_ar`, `s2_content_en`, `s3_title_ar`, `s3_title_en`, `s3_content_ar`, `s3_content_en`, `s4_title_ar`, `s4_title_en`, `s4_content_ar`, `s4_content_en`, `s5_title_ar`, `s5_title_en`, `s5_content_ar`, `s5_content_en`, `s6_title_ar`, `s6_title_en`, `s6_content_ar`, `s6_content_en`, `created_at`, `updated_at`) VALUES
(1, 'privacy', '+256762354246', 'mamaafricamao@gmail.com', 'سياسة الخصوصية', 'Privacy Policy', 'نحن في منظمة ماما أفريكا نولي أهمية كبرى لخصوصيتك. توضح هذه السياسة كيفية جمعنا واستخدامنا وحمايتنا لمعلوماتك الشخصية.', 'At Mama Africa, we take your privacy seriously. This policy explains how we collect, use, and protect your personal information.', 'تلتزم المنظمة بحماية بيانات جميع المتبرعين والشركاء والمستفيدين.', 'The organization is committed to protecting the data of all donors, partners, and beneficiaries.', 'جمع المعلومات', 'Information Collection', 'نقوم بجمع المعلومات التي تقدمها لنا مباشرة عند التسجيل أو التبرع.', 'We collect information you provide directly to us when registering or donating.', 'استخدام المعلومات', 'Use of Information', 'نستخدم معلوماتك لتحسين خدماتنا ومعالجة التبرعات والتواصل معك.', 'We use your information to improve our services, process donations, and communicate with you.', 'أمن البيانات', 'Data Security', 'نحن نطبق إجراءات أمنية صارمة لحماية بياناتك من الوصول غير المصرح به.', 'We implement strict security measures to protect your data from unauthorized access.', 'الأطراف الثالثة', 'Third Party', 'لا نقوم ببيع أو مشاركة بياناتك مع أطراف ثالثة لأغراض تسويقية.', 'We do not sell or share your data with third parties for marketing purposes.', 'ملفات التعرّيف (Cookies)', 'Cookies', 'نستخدم ملفات تعريف الارتباط لتحسين تجربة المستخدم على موقعنا.', 'We use cookies to enhance the user experience on our website.', 'اتصل بنا', 'Contact Us', 'إذا كان لديك أي سؤال أو استفسار، يمكنك التواصل معنا عبر البريد الإلكتروني.', 'If you have any question, you can contact us via email.', '2026-03-16 05:27:51', '2026-03-16 06:32:50'),
(2, 'terms', NULL, NULL, 'شروط الخدمة', 'Terms of Service', 'باستخدامك لموقعنا، فإنك توافق على الالتزام بالشروط والأحكام التالية.', 'By using our website, you agree to comply with the following terms and conditions.', NULL, NULL, 'اتفاقية المستخدم', 'User Agreement', 'يجب استخدام الموقع للأغراض القانونية فقط وبما لا ينتهك حقوق الآخرين.', 'The site must be used for lawful purposes only and in a way that does not violate the rights of others.', 'سياسة الخصوصية', 'Privacy Policy', 'تخضع جميع البيانات التي تقدمها لسياسة الخصوصية الخاصة بنا.', 'All data you provide is subject to our privacy policy.', 'أمن الحساب', 'Account Security', 'أنت مسؤول عن الحفاظ على سرية معلومات حسابك وكلمة المرور.', 'You are responsible for maintaining the confidentiality of your account information and password.', 'الملكية الفكرية', 'Intellectual Property', 'جميع محتويات الموقع مملوكة للمنظمة ومحمية بموجب قوانين الملكية الفكرية.', 'All content on the site is owned by the organization and protected under intellectual property laws.', 'تحديد المسؤولية', 'Limitation of Liability', 'المنظمة ليست مسؤولة عن أي أضرار ناتجة عن استخدام أو عدم القدرة على استخدام الموقع.', 'The organization is not liable for any damages resulting from the use or inability to use the site.', NULL, NULL, NULL, NULL, '2026-03-16 05:27:52', '2026-03-16 05:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `location_audit_logs`
--

CREATE TABLE `location_audit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_setting_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location_audit_logs`
--

INSERT INTO `location_audit_logs` (`id`, `location_setting_id`, `file_path`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(3, 2, 'audit_logs/4blv6nn4EM1FVT0yIZdOq8CvJ37JOBpPezqRSi6X.pdf', '2026-03-01', '2026-03-14', '2026-03-15 16:02:15', '2026-03-15 16:02:15'),
(4, 2, 'audit_logs/dDo3QlOwL40zz6oMewra04ZNgjg1gqwMXl3i61uC.pdf', '2026-01-01', '2026-03-02', '2026-03-15 18:05:46', '2026-03-15 18:05:46'),
(5, 2, 'audit_logs/GyE38CUKO8JHS9OITlveZnQP5uT0fhcZFZbt0xal.pdf', '2023-01-02', '2023-12-31', '2026-03-15 18:30:16', '2026-03-15 18:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `location_settings`
--

CREATE TABLE `location_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `audit_pdf` varchar(255) DEFAULT NULL,
  `activity_description_ar` text DEFAULT NULL,
  `activity_description_en` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `location_settings`
--

INSERT INTO `location_settings` (`id`, `name_ar`, `name_en`, `latitude`, `longitude`, `start_date`, `end_date`, `audit_pdf`, `activity_description_ar`, `activity_description_en`, `created_at`, `updated_at`) VALUES
(2, 'معسكر كيرياندونغو (معسكر لاجئين)', 'Kiryandongo Rufegee Camp', 1.88440000, 32.06200000, '2026-03-01', '2026-03-10', 'audit_logs/DHUD1XomNo1EF8pAPvpamneMz4snFmtHWjSr1Ua9.pdf', '📍 معسكر كيرياندنقو للاجئين – نبذة\r\n\r\nمعسكر كيرياندنقو للاجئين يُعد من أكبر مواقع استضافة اللاجئين في منطقة كيرياندنقو غرب أوغندا.\r\nيستضيف المعسكر لاجئين بشكل رئيسي من جنوب السودان، إضافة إلى أعداد أقل من دول مجاورة متأثرة بالنزاعات.\r\n📌 الموقع\r\nيقع في مقاطعة كيرياندنقو شمال غرب كمبالا بحوالي 220 كلم.\r\nعلى امتداد طريق كمبالا – جولو.\r\nالإحداثيات التقريبية: 2.02° شمالًا، 32.08° شرقًا\r\nفي بيئة ريفية شبه جافة.\r\n👥 الخلفية\r\nأُنشئ المعسكر في تسعينيات القرن الماضي، وتوسّع بشكل كبير بعد اندلاع النزاع في جنوب السودان عام 2013، حيث استقبل موجات متتالية من اللاجئين.\r\nتتبنى أوغندا سياسة لجوء متقدمة تتيح للاجئين حرية الحركة والحصول على أراضٍ للزراعة والوصول إلى الخدمات العامة.\r\n🏕️ الأوضاع والخدمات\r\nيُمنح اللاجئون قطع أراضٍ لبناء مساكنهم وممارسة الزراعة البسيطة، ويتم تقديم خدمات أساسية بالتنسيق بين الحكومة الأوغندية والشركاء الإنسانيين، تشمل:\r\nالمساعدات الغذائية ودعم سبل كسب العيش\r\nخدمات المياه والصرف الصحي\r\nالتعليم الأساسي والثانوي\r\nالرعاية الصحية\r\nبرامج الحماية والدعم المجتمعي', '📍 Kiryandongo Refugee Settlement – Overview\r\n\r\nKiryandongo Refugee Settlement is one of the largest refugee settlements in Kiryandongo District, located in western Uganda.\r\nThe settlement hosts refugees primarily from South Sudan, as well as smaller populations from other neighboring countries affected by conflict and instability.\r\n📌 Location\r\nLocated in Kiryandongo District, approximately 220 km northwest of Kampala.\r\nSituated along the Kampala–Gulu highway corridor.\r\nGeographic coordinates (approximate): 2.02°N, 32.08°E\r\nSet in a rural, semi-arid environment.\r\n👥 Background\r\nEstablished in the early 1990s and later expanded following renewed conflict in South Sudan (from 2013 onward), Kiryandongo Refugee Settlement has received multiple waves of refugees fleeing violence and insecurity.\r\nUganda’s progressive refugee policy allows refugees access to land for cultivation, freedom of movement, and access to public services.\r\n🏕️ Living Conditions & Services\r\nRefugees are allocated plots of land for shelter and small-scale farming. Humanitarian actors and the Government of Uganda provide essential services, including:\r\nFood assistance and livelihood support\r\nWater, sanitation, and hygiene (WASH)\r\nPrimary and secondary education\r\nHealthcare services\r\nProtection and community-based programs\r\nThe settlement operates under coordination with the Office of the Prime Minister (OPM) and international humanitarian partners.', '2026-03-01 02:47:47', '2026-03-15 11:23:57'),
(13, 'طويلة', 'Tawilah', 13.51386800, 24.86122900, NULL, NULL, NULL, NULL, NULL, '2026-05-06 14:23:41', '2026-05-06 14:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `position` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `role` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `position`, `role`, `message`, `image`, `created_at`, `updated_at`) VALUES
(7, '{\"ar\":\"عادل عارض إبراهيم\",\"en\":\"ADEL ADRESS IBRAHIM\"}', '{\"ar\":\"مسؤول المشروع\",\"en\":\"Project Manager\"}', '{\"ar\":\"المسؤول الأول عن قيادة الفريق لتحقيق أهداف المشروع ضمن القيود المحددة (الوقت، التكلفة، والجودة).\",\"en\":\"mamaafrica\"}', '{\"en\":null}', 'members/69ef6c3c0e96f.jpeg', '2026-02-19 06:45:49', '2026-04-30 13:25:13'),
(8, '{\"ar\":\"منى أحمد إسحق\",\"en\":\"Mona Ahmed I shag\"}', '{\"ar\":\"منسق\",\"en\":\"Coordinator\"}', '{\"ar\":\"دور حيوي يربط بين التخطيط والتنفيذ،\",\"en\":\"mamaafrica\"}', '{\"en\":null}', 'members/69ef6b6425299.jpeg', '2026-02-22 12:24:11', '2026-04-30 13:25:33'),
(9, '{\"ar\":\"سلافة محمد أحمد\",\"en\":\"SULAFA MOHAMED AHMED\"}', '{\"ar\":\"مسؤول الاعلام\",\"en\":\"Media Officer\"}', '{\"ar\":\"الإعلام والعلاقات العامة\",\"en\":\"mamaafrica\"}', '{\"en\":null}', 'members/69ef66bf686f1.jpeg', '2026-02-22 12:38:27', '2026-04-30 13:25:55'),
(10, '{\"ar\":\"آدم عبد العزيز أبكر\",\"en\":\"ADAM ABDU ALAZIZ ABKER\"}', '{\"ar\":\"مسؤول مجلس الأمناء\",\"en\":\"Chairperson of the Board of Trustees\"}', '{\"ar\":\"المسؤول الأول عن قيادة المجلس وضمان تحقيق المنظمة\",\"en\":\"mamaafrica\"}', '{\"en\":null}', 'members/69ef6592e8690.jpeg', '2026-02-25 21:15:53', '2026-04-30 13:26:16'),
(11, '{\"ar\":\"مصطفى سليمان  محمد\",\"en\":\"MUSTAFA SLEIMAN MOHAMED\"}', '{\"ar\":\"المدير التنفيذي\",\"en\":\"EXECUTIVE DIRECTOR\"}', '{\"ar\":\"الإشراف المباشر  لكل الأعمال التنفيذية\",\"en\":\"mamaafrica\"}', '{\"en\":null}', 'members/69a476fd2c837.jpeg', '2026-02-27 06:12:56', '2026-04-30 13:26:36'),
(12, '{\"ar\":\"خالد عبدالعزيز إسحاق\",\"en\":\"Khalid Abdalaziz ISHAQ\"}', '{\"ar\":\"مسؤول البرامج\",\"en\":\"Program Officer\"}', '{\"ar\":\"المسؤول عن البرامج في ماما افريكان\",\"en\":\"mamaafrica\"}', '{\"en\":null}', 'members/69ef6d76ce03e.jpeg', '2026-04-27 14:06:46', '2026-04-30 13:26:53'),
(13, '{\"ar\":\"أدومة محمد حامد\",\"en\":\"Adouma Mohamed HAMED\"}', '{\"ar\":\"مسؤول الماليه\",\"en\":\"Finance Officer\"}', '{\"ar\":\"المسؤول عن المسائل المالية في المنظمة\",\"en\":\"mamaafrica\"}', '{\"en\":null}', 'members/69f3580b7d187.jpeg', '2026-04-27 14:10:55', '2026-04-30 13:24:27');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_02_09_094232_create_categories_table', 1),
(5, '2026_02_09_095256_create_news_table', 1),
(7, '2026_02_09_111403_create_testimonials_table', 3),
(8, '2026_02_09_114132_create_members_table', 3),
(9, '2026_02_09_115859_create_projects_table', 3),
(10, '2026_02_09_120210_create_donations_table', 3),
(11, '2026_02_09_120743_remove_category_id_from_donations', 4),
(12, '2026_02_09_120913_remove_category_id_from_news', 4),
(13, '2026_02_09_121530_update_news_table_remove_category_add_project', 4),
(14, '2026_02_09_122717_drop_categories_table', 5),
(15, 'nnn2026_02_09_120539_drop_categories_table', 6),
(16, '2026_02_09_123952_add_project_id_to_news_table', 7),
(17, '2026_02_09_173839_create_waters_table', 8),
(18, '2026_02_09_110205_create_contacts_table', 9),
(19, '2026_02_16_111307_create_inquiries_table', 10),
(20, '2026_02_18_041439_add_youtube_link_to_news_table', 11),
(21, '2026_02_21_185542_create_users_table', 12),
(22, '2026_02_21_190038_add_role_to_users_table', 12),
(23, '2026_02_26_090205_add_security_questions_to_users_table', 13),
(25, '2026_02_26_092001_add_more_security_questions_to_users_table', 14),
(26, '2026_02_26_104021_add_original_password_to_users_table', 15),
(27, '2026_02_27_063120_create_heroes_table', 16),
(28, '2026_02_27_064801_create_abouts_table', 17),
(29, '2026_02_27_064801_create_statistics_table', 17),
(30, '2026_02_27_070138_add_image_columns_to_abouts_table', 18),
(31, '2026_02_28_113727_create_transparencies_table', 19),
(32, '2026_02_28_115637_add_report_file_to_transparencies_table', 20),
(33, '2026_03_01_000001_create_location_settings_table', 21),
(34, '2026_03_01_051149_add_name_to_location_settings_table', 22),
(35, '2026_03_01_062114_add_coordinates_to_location_settings_table', 23),
(36, '2026_03_01_082932_add_instagram_whatsapp_to_contacts_table', 24),
(37, '2026_03_01_100213_add_linkedin_telegram_to_contacts_table', 25),
(38, '2026_03_01_104044_add_x_url_to_contacts_table', 26),
(39, '2026_03_01_105003_add_email_and_location_to_contacts_table', 27),
(40, '2026_03_01_111020_add_footer_desc_to_contacts_table', 28),
(41, '2026_03_01_152240_create_team_settings_table', 29),
(42, '2026_03_01_154205_add_message_to_members_table', 30),
(44, '2026_03_06_071223_create_payment_methods_table', 31),
(45, '2026_03_06_071441_update_donations_table', 32),
(46, '2026_03_06_081612_create_settings_table', 33),
(47, '2026_03_06_222705_add_branding_to_heroes_table', 34),
(48, '2026_03_07_103312_add_developer_info_to_contacts_table', 35),
(49, '2026_03_10_142651_create_beneficiaries_table', 36),
(50, '2026_03_13_115117_add_financial_fields_to_transparencies_table', 37),
(51, '2026_03_13_115225_create_transparency_reports_table', 37),
(52, '2026_03_15_141000_add_audit_pdf_to_location_settings_table', 38),
(53, '2026_03_15_130530_add_dates_to_location_settings_table', 39),
(54, '2026_03_15_135632_create_location_audit_logs_table', 40),
(55, '2026_03_15_135959_migrate_existing_audit_logs_to_new_table', 41),
(56, '2026_03_16_112000_create_legal_contents_table', 42),
(57, '2026_03_16_114500_add_contact_to_legal_contents_table', 43),
(58, '2026_03_16_112431_add_frequency_to_donations_table', 44),
(59, '2026_03_16_145413_add_program_percentages_to_transparencies_table', 45),
(60, '2026_03_16_191835_add_video_link_to_testimonials_table', 46),
(61, '2026_03_17_065415_add_show_counter_values_to_transparencies_table', 47),
(62, '2026_03_23_194503_add_logo_and_translations_to_payment_methods_table', 48),
(63, '2026_03_24_000000_fix_auto_increment_issues', 48),
(64, '2026_03_30_000000_fix_auto_increment_for_location_settings', 48),
(65, '2026_03_30_000001_fix_all_missing_auto_increments', 49),
(66, '2026_03_31_000001_add_published_at_to_news_table', 50),
(67, '2026_03_31_000002_fix_location_settings_auto_increment', 51),
(68, '2026_04_10_190130_add_counter7_to_transparencies_table', 52),
(69, '2026_05_18_121455_add_goal_fields_to_abouts_table', 53),
(70, '2026_05_24_103201_create_profile_management_tables', 54),
(71, '2026_05_24_094157_create_transparency_funding_sources_table', 55),
(72, '2026_05_24_200000_create_transparency_partnerships_table', 56),
(73, '2026_05_24_111845_add_contact_photo_to_profile_settings_table', 57),
(74, '2026_05_25_095300_add_icon_to_projects_table', 58),
(75, '2026_05_25_095311_create_project_activities_table', 58);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `challange` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `pay` text NOT NULL,
  `published_at` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `project_id`, `title`, `details`, `challange`, `pay`, `published_at`, `image`, `created_at`, `updated_at`, `youtube_link`) VALUES
(32, 38, '{\"ar\":\"تم افتتاح الساحة الصديقه للأطفال بمعسكر رواندا للنازحين بشمال دارفور\",\"en\":\"The friendly playground for children was opened at the Rwanda camp for displaced persons in North Darfur.\"}', '{\"ar\":\"هذه الساحات ليست مجرد مكان للعب، بل هي \\\"ملاذ آمن\\\" يهدف إلى:\\r\\n\\r\\nاستعادة الشعور بالوضع الطبيعي للأطفال وسط ظروف النزوح.\\r\\n\\r\\nتوفير بيئة محمية تمنع تعرضهم للمخاطر في المعسكر.\\r\\n\\r\\nاكتشاف الأطفال الذين يحتاجون لدعم نفسي خاص.\",\"en\":\"These spaces are not just a place to play, but a \'safe haven\' designed to:\\r\\n\\r\\nRestore a sense of normalcy for children amid displacement.\\r\\nProvide a protected environment that prevents them from encountering risks in the camp.\\r\\nIdentify children who need specialized psychological support.\"}', '{\"ar\":\"الأعداد الهائلة: عدد الأطفال النازحين في المعسكر عادة ما يكون أكبر بكثير من القدرة الاستيعابية للساحة، مما يخلق ضغطاً كبيراً على المنظمين للسيطرة على الحشود وضمان سلامة الجميع.\\r\\n\\r\\nتصنيف الفئات العمرية: صعوبة تنفيذ أنشطة تناسب الطفل ذو الـ 5 سنوات والمراهق ذو الـ 14 سنة في آن واحد وفي مكان محدود.\",\"en\":\"The huge numbers: The number of displaced children in the camp is usually much higher than the capacity of the area, creating significant pressure on organizers to control the crowds and ensure everyone\'s safety.\\r\\n\\r\\nAge group classification: Difficulty in implementing activities suitable for a 5-year-old child and a 14-year-old teenager at the same time and in a limited space.\"}', '10', '2026-04-05', 'news_images/69f1a68be399a.jpeg', '2026-02-22 07:44:25', '2026-04-29 06:34:51', NULL),
(33, 39, '{\"ar\":\"مشروع الوجبة الجماعية للاجئين في كرياندانقو\",\"en\":\"The communal meal project for refugees in Kiryandongo\"}', '{\"ar\":\"الهدف العام:\\r\\nتحسين الأمن الغذائي للأسر اللاجئة في مستوطنات كرياندانقو من خلال توفير وجبة جماعية متكاملة وغنية بالعناصر الغذائية.\\r\\nهدف المشروع:\\r\\n-\\tتوفير وجبة غذائية متكاملة لـ 400 أسرة من اللاجئين.\\r\\n-\\tتعزيز التماسك الاجتماعي من خلال الوجبة الجماعية.\\r\\n-\\tإدخال الفرح والسرور على قلوب الأسر المستفيدة.\\r\\n-\\tتقديم نموذج للتكافل الاجتماعي والعمل الإنساني.\",\"en\":\"General Objective:\\r\\nImproving food security for refugee families in Kiryandongo settlements by providing a communal meal that is complete and rich in nutrients.\\r\\nProject Objective:\\r\\n- Provide a complete nutritional meal for 400 refugee families.\\r\\n- Enhance social cohesion through the communal meal.\\r\\n- Bring joy and happiness to the hearts of the beneficiary families.\\r\\n- Present a model of social solidarity and humanitarian work.\"}', '{\"ar\":\"تعيش مئات الأسر من اللاجئين في مستوطنات كريانداقو بأوغندا في ظروف معيشية صعبة، حيث يواجهون نقصاً حاداً في الغذاء والاحتياجات الأساسية.\",\"en\":\"Hundreds of refugee families live in the Kiryandongo settlements in Uganda in difficult living conditions, where they face a severe shortage of food and basic necessities.\"}', '2000', '2026-04-28', 'news_images/69f0e06ab18bf.jpeg', '2026-02-22 07:51:31', '2026-04-28 16:29:30', NULL),
(34, 43, '{\"ar\":\"عقد اجتماع  بمكتب  الميداني  للمنظمة ماما افريكا للخدمات الإنسانية  مع  رواسي\",\"en\":\"A meeting was held at the field office of the Mama Africa Organization for Humanitarian Services with Ruwasi\"}', '{\"ar\":\"رنامج  مبادرة التنوير  المجتمعي  ودار  الاجتماع  الأخ  الكريم راشد  مصطفى في إطار  خطة العمل  من خلال  ٢٦.      الي  ٢٠٢٨ ومن  أهم  التوصيات هي  تعليم اللغة الانجليزية  والحاسوب بالإضافة إلى قيام ندوات  تعبر عن  السلام  والتوعية  المجتمعية  وتخفيف معانا  اللاجئين  عبر  مركز  نجوم الغد للتنمية وبناء القدرات  ومنظمة ماما أفريكا للخدمات الإنسانية والاجتماعية  باعتباره  شركاء  في تنفيذ الاستجابة  والخدمات  والله المستعان\",\"en\":\"The Social Enlightenment Initiative Program and the gathering house, dear brother Rasheed Mustafa, within the framework of the work plan from 2026 to 2028. Among the most important recommendations are teaching the English language and computer skills, in addition to holding seminars that express peace and social awareness, and alleviating the suffering of refugees through the Stars of Tomorrow Center for Development and Capacity Building and Mama Africa Organization for Humanitarian and Social Services, considering them partners in implementing the response and services. And God is the helper.\"}', '{\"ar\":\"تواجه المجتمعات الضعيفة في دارفور تحديات كبيرة في الحصول على خدمات الرعاية الصحية الأساسية. نقص المستشفيات والمراكز الطبية، قلة الأطباء والممرضين المؤهلين، وارتفاع تكاليف العلاج يجعل العديد من الأسر غير قادرة على الوصول إلى خدمات صحية كافية. كما تزيد النزاعات والتهجير من صعوبة توفير الرعاية الصحية للأطفال، النساء، وكبار السن، ما يؤدي إلى انتشار الأمراض وضعف الصحة العامة.\",\"en\":\"Vulnerable communities in Darfur face significant challenges in accessing essential healthcare services. The shortage of hospitals and medical centers, lack of qualified doctors and nurses, and high treatment costs prevent many families from receiving adequate care. Conflicts and displacement further complicate access to healthcare for children, women, and the elderly, leading to the spread of diseases and weakened public health.\"}', '0', '2026-04-26', 'news_images/69f077324cc66.jpeg', '2026-02-22 07:54:48', '2026-04-28 09:00:34', NULL),
(38, 37, '{\"ar\":\"افتتاح دار العمل الانساني\",\"en\":\"Opening of the Humanitarian Work House\"}', '{\"ar\":\"تهدف إلى تطوير وتحسين الخدمات الإنسانية في كيرياندرغو، لخدمة كل من اللاجئين والمجتمع المضيف من خلال تعزيز بناء السلام، والصرف الصحي والمياه والنظافة (WASH)، والحماية من خلال التدريبات في دعم الدورة الاجتماعية، والتعليم.\",\"en\":\"It aims to develop and improve humanitarian services in Kiryandongo, to serve both refugees and the host community through promoting peacebuilding, sanitation and water hygiene (WASH), protection through social support training, and education.\"}', '{\"ar\":\"تكية\",\"en\":\"Takia\"}', '0', '2026-04-16', 'news_images/69f0732f6cdb2.jpeg', '2026-03-30 18:19:10', '2026-04-28 08:43:27', NULL),
(41, 38, '{\"ar\":\"اختتام الأسبوع الأول من أنشطة منظمة خدمات الأطفال لأم أفريقيا الإنسانية.\",\"en\":\"The conclusion of the first week of activities of the Organization of Children\'s Services for Um Africa Humanitarian.\"}', '{\"ar\":\"نجحت منظمة خدمات الأطفال لأم أفريقيا الإنسانية في اختتام الأسبوع الأول من الأنشطة في المساحة الصديقة للطفل. خلال هذه الفترة، زار فريق مكتب الحماية الموقع، وراقب الأنشطة الجارية، واستمع إلى التحديات التي تواجه إدارة المساحة.   كما شمل الزيارة مناقشات حول طرق تحسين البرامج، بالإضافة إلى عرض خطة الأنشطة المستقبلية. تهدف هذه البرامج إلى تعزيز حماية الطفل، وتطوير مهارات الأطفال، وتقديم الدعم النفسي والاجتماعي. تمثل هذه الزيارة خطوة مهمة نحو تعزيز جودة الخدمات وضمان بيئة آمنة وداعمة للأطفال.\",\"en\":\"Children of Mama Africa Humanitarian Services Organization successfully concluded the first week of activities at the Child-Friendly Space. During this period, the Protection Office team visited the site, observed the ongoing activities, and listened to the challenges faced in managing the space.\\r\\nThe visit also included discussions on ways to improve the programs, as well as a presentation of the future activity plan. These programs aim to strengthen child protection, develop children\'s skills, and provide psychosocial support. This visit represents an important step toward enhancing the quality of services and ensuring a safe and supportive environment for children.\"}', '{\"ar\":\"ز\",\"en\":\"خ\"}', '0', '2026-04-08', 'news_images/69f075fc21d18.jpeg', '2026-04-10 13:24:11', '2026-04-28 08:55:24', NULL),
(42, 36, '{\"ar\":\"منظمة \\\"ماما أفريكا\\\" بدعم من \\\"اليونيسف\\\" يوم المياه العالمي بمعسكر رواندا عبر توزيع مستلزمات النظافة والكلور لـ 1,490\",\"en\":\"\\\"Mama Africa\\\" organization, with the support of UNICEF, marked World Water Day in the Rwanda camp by distributing hygiene supplies and chlorine to 1,490.\"}', '{\"ar\":\"\\\"في إطار السعي المستمر لتعزيز الاستجابة الإنسانية وتحسين صحة المجتمعات النازحة، نفذت منظمة ماما أفريكا للخدمات الإنسانية (MAOHS)، بالتعاون المثمر مع منظمة اليونيسف، فعالية توعوية وتوزيعات ميدانية شاملة بمناسبة يوم المياه العالمي بمعسكر رواندا للنازحين بمحلية طويلة؛ بهدف تزويد العائلات بالمواد الأساسية والمهارات الضرورية لضمان أمان المياه والنظافة الشخصية في ظل الظروف الصعبة.\\\"رفع وعي النازحين بأهمية المياه الصالحة للشرب وتدريبهم عملياً على طرق تعقيمها باستخدام الكلور.\\r\\n\\r\\nترسيخ ممارسات النظافة الشخصية وغسل الأيدي بالصابون للوقاية من الأمراض والأوبئة داخل المعسكر.\\r\\n\\r\\nتوفير دعم مادي لـ 1,490 مستفيداً بتوزيع الجركانات وحقائب الكرامة، مع التركيز على النساء والأطفال وذوي الإعاقة.\\r\\n\\r\\nتقييم الفجوات الميدانية ورصد احتياجات النازحين من خدمات الإيواء والحماية والدعم النفسي لتوجيه التدخلات المستقبلية.\",\"en\":\"As part of the continuous effort to enhance humanitarian response and improve the health of displaced communities, Mama Africa Organization for Humanitarian Services (MAOHS), in fruitful cooperation with UNICEF, carried out an awareness campaign and comprehensive field distributions on the occasion of World Water Day at Rwanda Camp for displaced persons in Longa locality; aiming to provide families with essential materials and necessary skills to ensure water safety and personal hygiene under difficult circumstances. Raising awareness among displaced persons about the importance of drinking water and practically training them on ways to disinfect it using chlorine.\\r\\n\\r\\nConsolidating personal hygiene practices and handwashing with soap to prevent diseases and epidemics within the camp.\\r\\n\\r\\nProviding material support to 1,490 beneficiaries through the distribution of jerrycans and dignity kits, focusing on women, children, and persons with disabilities.\\r\\n\\r\\nAssessing field gaps and monitoring the displaced persons\' needs for shelter, protection, and psychosocial support to guide future interventions.\"}', '{\"ar\":\"ضعف البنية التحتية للمياه: وجود فجوة كبيرة في \\\"تناكر\\\" نقل المياه (Water Trucking)، مما يجعل توعية الناس بالكلور صعبة إذا لم تتوفر كميات مياه كافية أصلاً.\\r\\n\\r\\nنقص مرافق الإصحاح: عدم توفر مراحيض كافية (Latrines) بالمعسكر يقلل من فعالية استخدام الصابون والنظافة الشخصية في الحد من الأمراض.\\r\\n\\r\\nتزايد الطلب مقابل الموارد: الإقبال الكبير من النازحين فاق كميات \\\"حقائب الكرامة\\\" وأدوات النظافة المتاحة، مما كشف عن فجوة في تغطية جميع المحتاجين.\\r\\n\\r\\nالحاجة الماسة للإيواء: مطالبة الأطفال والنساء بمواد \\\"الستر\\\" والمشمعات (Shelter) شكلت ضغطاً على المنفذين لأن البرنامج كان مركزاً فقط على المياه والنظافة.\",\"en\":\"Weak water infrastructure: There is a significant gap in water trucking, making it difficult to raise awareness about chlorine if sufficient quantities of water are not available in the first place.\\r\\n\\r\\nLack of sanitation facilities: The insufficient availability of latrines in the camp reduces the effectiveness of using soap and personal hygiene in preventing diseases.\\r\\n\\r\\nIncreasing demand versus resources: The high number of displaced people exceeded the available \'dignity kits\' and hygiene items, revealing a gap in coverage for all those in need.\\r\\n\\r\\nUrgent need for shelter: The demand from children and women for covering materials and tarpaulins (shelter) placed pressure on implementers because the program was focused solely on water and hygiene.\"}', '0', '2026-04-26', 'news_images/69f1a97c9bb7b.jpeg', '2026-04-29 06:47:24', '2026-04-29 06:47:24', NULL),
(43, 34, '{\"ar\":\"مشروع الحماية ودعم سبل العيش، مساحة آمنة للنساء والفتيات في محلية الفاشر\",\"en\":\"Protection and Livelihood Support Project, Safe Space for Women and Girls, in El Fasher locality\"}', '{\"ar\":\"حماية وتمكين المرأة: التركيز على النساء والفئات الهشة عبر إشراك \\\"إدارة المرأة\\\" وشبكات الحماية في التخطيط والتوزيع.\\r\\nضمان استمرارية الإغاثة: كسر العزلة الأمنية والتقنية لضمان وصول المساعدات لمستحقيها رغم تحديات النزاع.\",\"en\":\"Protection and empowerment of women: Focusing on women and vulnerable groups by involving the \'Women\'s Department\' and protection networks in planning and distribution. \\r\\nEnsuring continuity of relief: Breaking security and technical isolation to ensure aid reaches those entitled to it despite conflict challenges.\"}', '{\"ar\":\"1. زيادة انعدام الأمن بسبب النزاع المسلح\\r\\n2. انقطاعات في الإنترنت والاتصالات تؤثر على التنسيق مع الشركاء والمستفيدين\\r\\n3. نقص شديد في السلع والخدمات بسبب الحصار على الفاشر\",\"en\":\"1. Escalating insecurity due to armed conflict\\r\\n2. Internet and communication outages, affecting coordination with partners and beneficiaries\\r\\n3. Severe shortages of goods and services due to the siege on El Fasher\"}', '0', '2025-07-05', 'news_images/69f1fdc1b488f.jpeg', '2026-04-29 12:46:57', '2026-04-29 12:50:42', NULL),
(44, 34, '{\"ar\":\"سلال الخير\",\"en\":\"Baskets of Goodness\"}', '{\"ar\":\"تم تنفيذ مشروع توزيع السلال الغذائية الطارئة بنجاح واستهدف عدد 250 مستفيداً في منطقة طويلة بولاية شمال دارفور.\\r\\nتم صرف جميع المبالغ وفقاً للميزانية المعتمدة مسبقاً. تمت عملية الشراء من موردين محليين معتمدين، وجميع الفواتير مختومة ومرفقة كمستندات داعمة.\",\"en\":\"The emergency food basket distribution project was successfully implemented, targeting 250 beneficiaries in the Tawila area of ​​North Darfur State.\\r\\n\\r\\nAll funds were disbursed according to the pre-approved budget. Purchases were made from approved local suppliers, and all invoices are stamped and attached as supporting documentation.\"}', '{\"ar\":\". تحديات لوجستية وبيئية (مرتبطة بالموقع)\\r\\nصعوبة الوصول إلى منطقة طويلة: تقع المنطقة في شمال دارفور، وهي منطقة تعاني من ضعف البنية التحتية للطرق، خاصة خلال موسم الأمطار (حتى لو كان التقرير في فبراير، قد تكون الطرق وعرة). هذا يزيد من تكلفة الترحيل ويعرض عملية النقل للتأخير أو التلف.\\r\\n\\r\\nتحديات التخزين: ارتفاع تكلفة الأكياس (260,000 ج.س) وتخصيص بند للترحيل فقط دون مستودعات يشير إلى احتمال نقص في مرافق تخزين مناسبة لحماية المواد الغذائية من الرطوبة والحشرات والسرقة.\\r\\n\\r\\nانعدام الأمن: شمال دارفور منطقة تشهد نزاعات قبلية وحركات مسلحة. تأمين فريق التنفيذ والمساعدات أثناء النقل والتوزيع يمثل تحدياً كبيراً لم يُذكر صراحة في التقرير.\\r\\n\\r\\n2. تحديات مالية واقتصادية\\r\\nتقلب أسعار الصرف والتضخم: العملة المذكورة هي الجنيه السوداني (SDG) الذي يعاني من انخفاض حاد وقيمته غير مستقرة. الميزانية المعتمدة (20 مليار ج.س) ربما تكون قد تقلصت قيمتها الفعلية بين وقت الاعتماد ووقت الشراء، مما يهدد القدرة على شراء الكميات المخططة.\\r\\n\\r\\nارتفاع تكاليف الإعاشة مقارنة بحجم المساعدات: لفت النظر أن تكلفة إعاشة 5 أفراد لمدة 5 أيام فقط (1,995,080 ج.س) تقارب تكلفة الدخن والدقيق معاً (2.5 مليون ج.س). هذا قد يعكس صعوبة تأمين احتياجات الفريق الأساسية في منطقة نائية، مما يستهلك جزءاً كبيراً من الميزانية كان يمكن توجيهه للغذاء.\\r\\n\\r\\nالاعتماد على موردين محليين محدودين: تم الشراء من موردين محليين معتمدين، لكن في المناطق المتأثرة بالأزمات، قد يكون عدد الموردين قليلاً وقدرتهم على توفير كميات كبيرة محدودة، مما يرفع الأسعار أو يؤخر التسليم.\\r\\n\\r\\n3. تحديات إدارية وتنفيذية\\r\\nتعدد فئات المستفيدين واحتياجاتهم غير المحددة: التقرير يذكر فقط “250 مستفيداً” دون تفصيل (أسر، أطفال، مسنون). معرفة التركيبة الأسرية والاحتياجات الخاصة (مثل أغذية للأطفال أو مرضى مزمنين) كانت ستُمثل تحدياً لو تم تضمينها.\\r\\n\\r\\nغياب آلية رصد وشكاوى المستفيدين: لم تذكر أي عملية رصد ما بعد التوزيع أو خط ساخن للشكاوى. في بيئة معقدة مثل دارفور، قد تنشأ تحديات تتعلق بالعدالة في التوزيع أو محاباة، مما قد يؤدي إلى توترات مجتمعية.\\r\\n\\r\\nتوثيق المستفيدين: على الرغم من ذكر بند “توثيق” (400,000 ج.س)، لم يتم تفصيل طريقة التحقق من هوية المستفيدين (بطائق، سجلات محلية). تحديات انتحال الهوية أو ازدواجية التسجيل شائعة في مخيمات النازحين.\\r\\n\\r\\n4. تحديات تتعلق بالاستدامة والمتابعة\\r\\nمشروع طارئ لمرة واحدة: التوزيع استمر 5 أيام فقط، وهذا يعني أن تأثير المساعدة مؤقت. التحدي الأكبر هو أن هؤلاء المستفيدين سيعودون إلى نفس مستوى انعدام الأمن الغذائي بعد نفاد السلال، دون وجود برنامج متابعة.\\r\\n\\r\\nغياب التنسيق مع السلطات المحلية أو الأمم المتحدة: لم يُذكر أي تنسيق مع مفوضية العون الإنساني أو برنامج الأغذية العالمي. في دارفور، عدم التنسيق قد يؤدي إلى ازدواجية الجهود أو ترك فجوات، أو حتى إلى عرقلة المشروع من قبل جهات محلية.\\r\\n\\r\\nملاحظة مهمة:\\r\\nالتقرير يظهر نجاحاً مالياً وإدارياً من حيث الالتزام بالميزانية ووجود فواتير. لكن التحديات الحقيقية لا تظهر في الأرقام بقدر ما تظهر في السياق التشغيلي للمنطقة (غرب السودان)، أبرزها: انعدام الأمن، وتدهور قيمة العملة، ونقص البنية التحتية، وارتفاع كلفة إبقاء الفريق في الميدان.\\r\\n\\r\\nإذا كنت ترغب في تحسين تقاريرك المستقبلية، يمكنني اقتراح إضافة قسم خاص بـ “التحديات التي تم تجاوزها” و”التوصيات للمشاريع القادمة”. هل تريد ذلك؟\",\"en\":\"Logistical and Environmental Challenges (Location-Related)\\r\\nDifficulty in Accessing the Long Area: The area is located in North Darfur, a region with poor road infrastructure, especially during the rainy season (even if the report is dated February, roads may still be rough). This increases transportation costs and exposes the transport process to delays or spoilage.\\r\\n\\r\\nStorage Challenges: The high cost of bags (260,000 SDG) and the allocation of funds solely for transportation without warehouses suggest a potential lack of suitable storage facilities to protect food from moisture, insects, and theft.\\r\\n\\r\\nInsecurity: North Darfur is an area experiencing tribal conflicts and armed movements. Securing the implementation team and aid during transport and distribution presents a significant challenge that is not explicitly mentioned in the report.\\r\\n\\r\\n2. Financial and Economic Challenges\\r\\nExchange Rate Volatility and Inflation: The currency mentioned is the Sudanese Pound (SDG), which is experiencing a sharp decline and unstable value. The approved budget (20 billion SDG) may have decreased in real value between the time of approval and the time of purchase, jeopardizing the ability to procure the planned quantities.\\r\\n\\r\\nHigh living costs compared to the amount of aid received: It is noteworthy that the cost of feeding five people for just five days (1,995,080 EGP) is nearly equivalent to the combined cost of millet and flour (2.5 million EGP). This may reflect the difficulty of securing the team\'s basic needs in a remote area, consuming a significant portion of the budget that could have been allocated to food.\\r\\n\\r\\nReliance on limited local suppliers: Purchases were made from approved local suppliers, but in crisis-affected areas, the number of suppliers may be limited, and their capacity to provide large quantities may be restricted, leading to higher prices or delivery delays.\\r\\n\\r\\n3. Administrative and implementation challenges: The diverse categories of beneficiaries and their undefined needs: The report only mentions \\\"250 beneficiaries\\\" without specifying (families, children, elderly). Identifying family structures and specific needs (such as food for children or chronically ill individuals) would have been a challenge if this information had been included.\\r\\n\\r\\nLack of a beneficiary monitoring and complaints mechanism: No post-distribution monitoring process or complaints hotline was mentioned. In a complex environment like Darfur, challenges related to equitable distribution or favoritism may arise, potentially leading to community tensions.\\r\\n\\r\\nBeneficiary Documentation: Although a “documentation” item (400,000 SDG) is mentioned, the method for verifying beneficiary identities (cards, local records) is not detailed. Identity theft or double registration is a common problem in IDP camps.\\r\\n\\r\\n4. Sustainability and Follow-up Challenges\\r\\nOne-Time Emergency Project: The distribution lasted only 5 days, meaning the impact of the assistance was temporary. The biggest challenge is that these beneficiaries will revert to the same level of food insecurity once the food baskets are exhausted, without a follow-up program.\\r\\n\\r\\nLack of Coordination with Local Authorities or the UN: No coordination with the Humanitarian Aid Commission or the World Food Programme was mentioned. In Darfur, a lack of coordination can lead to duplication of efforts, gaps in the process, or even project obstruction by local actors.\\r\\n\\r\\nImportant Note: The report demonstrates financial and administrative success in terms of budget adherence and the availability of invoices. But the real challenges aren\'t so much reflected in the numbers as they are in the operational context of the region (western Sudan), most notably: insecurity, currency devaluation, lack of infrastructure, and the high cost of maintaining a team in the field.\\r\\n\\r\\nIf you\'d like to improve your future reports, I can suggest adding a section on “Challenges Overcome” and “Recommendations for Future Projects.” Would you like that?\"}', '00000', '2026-05-02', 'news_images/69f59c7e75224.jpeg', '2026-05-02 06:41:02', '2026-05-02 06:41:02', NULL);

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('bank','mobile_money','online','crypto') NOT NULL DEFAULT 'bank',
  `icon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `instructions` longtext DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `type`, `icon`, `logo`, `description`, `instructions`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Stanbic Bank\",\"ar\":\"Stanbic Bank\"}', 'bank', 'fas fa-university', NULL, '{\"en\":\"Direct transfer to our Stanbic Bank\",\"ar\":\"Direct transfer to our Stanbic Bank\"}', '{\"en\":\"<strong>Bank Name:</strong> Stanbic Bank<br><strong>Account Name:</strong> Mama Africa<br><strong>Account No:</strong> 111111<br><br>Please use your full name as the payment reference.\",\"ar\":\"<strong>Bank Name:</strong> Stanbic Bank<br><strong>Account Name:</strong> Mama Africa<br><strong>Account No:</strong> 111111<br><br>Please use your full name as the payment reference.\"}', 1, '2026-03-06 07:55:55', '2026-03-25 18:15:02'),
(2, '{\"en\":\"Mobile Money - M-Pesa\",\"ar\":\"Mobile Money - M-Pesa\"}', 'mobile_money', 'fas fa-mobile-alt', NULL, '{\"en\":\"Pay via Safaricom M-Pesa\",\"ar\":\"Pay via Safaricom M-Pesa\"}', '{\"en\":\"<strong>Paybill No:</strong> 54321<br><strong>Account No:</strong> MamaAfrica<br><br>Enter the M-Pesa transaction code below after making the payment.\",\"ar\":\"<strong>Paybill No:</strong> 54321<br><strong>Account No:</strong> MamaAfrica<br><br>Enter the M-Pesa transaction code below after making the payment.\"}', 1, '2026-03-06 07:55:55', '2026-03-25 18:15:02'),
(3, '{\"en\":\"Stripe\",\"ar\":\"Stripe\"}', 'online', 'fab fa-stripe', NULL, '{\"en\":\"Credit / Debit Card\",\"ar\":\"Credit / Debit Card\"}', NULL, 0, '2026-03-06 08:29:17', '2026-03-25 18:15:02'),
(4, '{\"en\":\"Flutterwave\",\"ar\":\"Flutterwave\"}', 'online', 'fas fa-money-check-alt', NULL, '{\"en\":\"Card / Mobile Money\",\"ar\":\"Card / Mobile Money\"}', NULL, 0, '2026-03-06 08:29:17', '2026-03-25 18:15:02'),
(5, '{\"en\":\"Paystack\",\"ar\":\"Paystack\"}', 'online', 'fas fa-credit-card', NULL, '{\"en\":\"Secure Online Payment\",\"ar\":\"Secure Online Payment\"}', NULL, 0, '2026-03-06 08:29:17', '2026-03-25 18:15:02'),
(6, '{\"en\":\"Stripe\"}', 'online', 'fab fa-stripe', NULL, '{\"en\":\"Credit / Debit Card\"}', NULL, 0, '2026-03-25 19:21:43', '2026-03-25 19:21:43'),
(7, '{\"en\":\"Flutterwave\"}', 'online', 'fas fa-money-check-alt', NULL, '{\"en\":\"Card / Mobile Money\"}', NULL, 0, '2026-03-25 19:21:43', '2026-03-25 19:21:43'),
(8, '{\"en\":\"Paystack\"}', 'online', 'fas fa-credit-card', NULL, '{\"en\":\"Secure Online Payment\"}', NULL, 0, '2026-03-25 19:21:43', '2026-03-25 19:21:43'),
(9, '{\"en\":\"Stripe\"}', 'online', 'fab fa-stripe', NULL, '{\"en\":\"Credit / Debit Card\"}', NULL, 0, '2026-03-25 19:25:09', '2026-03-25 19:25:09'),
(10, '{\"en\":\"Flutterwave\"}', 'online', 'fas fa-money-check-alt', NULL, '{\"en\":\"Card / Mobile Money\"}', NULL, 0, '2026-03-25 19:25:09', '2026-03-25 19:25:09'),
(11, '{\"en\":\"Paystack\"}', 'online', 'fas fa-credit-card', NULL, '{\"en\":\"Secure Online Payment\"}', NULL, 0, '2026-03-25 19:25:09', '2026-03-25 19:25:09'),
(12, '{\"ar\":\"بنك الخرطوم\",\"en\":\"bank of khartoum\"}', 'bank', NULL, 'payment_logos/69ca9c852c4f8.jpeg', '{\"ar\":\"بنك الخرطوم\",\"en\":\"bankak\"}', '{\"ar\":\"تأكد من أن رقم اسم الحساب -(بنك الخرطو-ماما أفريكا)\\r\\nلا تنسي ادخال رقم العملية -\\r\\nارسال بيتاناتك الشخصية-\\r\\nارسال رسالة اذا تحب-\",\"en\":\"<strong>Bank Name:</strong> Bank of khartuom <br><strong>Account Name:</strong> Mama Africa<br><strong>Account No:</strong> 2222<br><br>Please use your full name as the payment reference.\\r\\n<br><br>\\r\\n-send massege (optional)\"}', 1, '2026-03-30 12:53:42', '2026-03-30 14:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `profile_items`
--

CREATE TABLE `profile_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` text NOT NULL,
  `icon` text DEFAULT NULL,
  `title_ar` text DEFAULT NULL,
  `title_en` text DEFAULT NULL,
  `value_ar` text DEFAULT NULL,
  `value_en` text DEFAULT NULL,
  `extra_value_ar` text DEFAULT NULL,
  `extra_value_en` text DEFAULT NULL,
  `number_value` int(11) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_items`
--

INSERT INTO `profile_items` (`id`, `type`, `icon`, `title_ar`, `title_en`, `value_ar`, `value_en`, `extra_value_ar`, `extra_value_en`, `number_value`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'objective', 'fas fa-hand-holding-heart', NULL, NULL, 'تقديم خدمات التنمية الاجتماعية والإنسانية.', 'Provide social development and humanitarian services.', NULL, NULL, NULL, 1, '2026-05-24 04:34:22', '2026-05-24 06:10:18'),
(2, 'objective', 'fas fa-dove', NULL, NULL, 'تعزيز بناء السلام والتنمية الثقافية والحماية العامة (العنف القائم على النوع).', 'Promote peace building, Culture development and general protection (GBV).', NULL, NULL, NULL, 2, '2026-05-24 04:34:22', '2026-05-24 04:34:22'),
(3, 'objective', 'fas fa-seedling', NULL, NULL, 'تحسين الأمن الغذائي وتخفيف المعاناة والمخاوف بين النازحين واللاجئين.', 'Improve Food security and Alleviate suffering and fears among the IDPs and Refugees.', NULL, NULL, NULL, 3, '2026-05-24 04:34:22', '2026-05-24 04:34:22'),
(4, 'objective', 'fas fa-hands-wash', NULL, NULL, 'الاستجابة لخدمات المياه والصرف الصحي (WASH) والخدمات الصحية.', 'Response WASH and health services.', NULL, NULL, NULL, 4, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(5, 'timeline', NULL, 'التأسيس في السودان', 'Established in Sudan', NULL, NULL, '22 ديسمبر 2022', '22Dec 2022', NULL, 1, '2026-05-24 04:34:23', '2026-05-24 06:18:28'),
(6, 'timeline', NULL, 'بدء العمل الفعلي في السودان', 'Started work in Sudan', NULL, NULL, '31 ديسمبر 2022', '31 Dec 2022', NULL, 2, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(7, 'timeline', NULL, 'تجديد التسجيل القانوني', 'Registration renewed', NULL, NULL, '20 مارس 2024', '20 Mar 2024', NULL, 3, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(8, 'timeline', NULL, 'التسجيل رسمياً في أوغندا', 'Registered in Uganda', NULL, NULL, '23 مايو 2025', '23 May 2025', NULL, 4, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(9, 'timeline', NULL, 'توسيع التواجد إلى كمبالا وبيالي', 'Expanded presence to Kampala and Bweyale', NULL, NULL, '2025', '2025', NULL, 5, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(10, 'journey_pos_step', NULL, 'مدينة الفاشر', 'El Fasher City', NULL, NULL, NULL, NULL, NULL, 1, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(11, 'journey_pos_step', NULL, 'أرياف الفاشر', 'Rural El Fasher', NULL, NULL, NULL, NULL, NULL, 2, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(12, 'journey_pos_step', NULL, 'طويلة', 'Taweela', NULL, NULL, NULL, NULL, NULL, 3, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(13, 'journey_pos_step', NULL, 'قزان جديد', 'Gazan Jadeed', NULL, NULL, NULL, NULL, NULL, 4, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(14, 'journey_neg_step', NULL, NULL, NULL, 'فقدان المكتب الإداري وفريق العمل في الفاشر بسبب ظروف الحرب.', 'Loss of office and staff in El Fasher due to the war.', NULL, NULL, NULL, 1, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(15, 'journey_neg_step', NULL, NULL, NULL, 'صعوبات وتحديات في الحفاظ على استمرارية العمليات الميدانية.', 'Difficulties maintaining operational continuity.', NULL, NULL, NULL, 2, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(16, 'journey_neg_step', NULL, NULL, NULL, 'عدم استقرار التمويل والشراكات خلال فترات الأزمات المتتالية.', 'Funding and partnership instability during crisis periods.', NULL, NULL, NULL, 3, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(17, 'capacity_internal', 'fas fa-chart-line', 'الاستقرار المالي', 'Financial Stability', NULL, NULL, 'حالة الاستقرار: عدم استقرار معتدل', 'Status: Moderate instability', 65, 1, '2026-05-24 04:34:23', '2026-05-24 07:22:27'),
(18, 'capacity_internal', 'fas fa-users', 'الموارد البشرية', 'Human Resources', NULL, NULL, 'حالة التوفر: توفر قوي', 'Status: Strong availability', 85, 2, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(19, 'capacity_internal', 'fas fa-sitemap', 'البيئة المؤسسية', 'Institutional Environment', NULL, NULL, 'الحالة: داعمة بشكل كبير', 'Status: Highly supportive', 90, 3, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(20, 'capacity_internal', 'fas fa-cogs', 'القدرة المؤسسية', 'Organizational Capacity', NULL, NULL, 'الحالة: قدرة تشغيلية قوية', 'Status: Strong operational capacity', 85, 4, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(21, 'capacity_external', 'fas fa-hands-helping', 'البيئة الاجتماعية', 'Social Environment', NULL, NULL, 'الحالة: مرنة', 'Status: Flexible', 65, 1, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(22, 'capacity_external', 'fas fa-balance-scale', 'البيئة السياسية', 'Political Environment', NULL, NULL, 'الحالة: مرنة باعتدال', 'Status: Moderately flexible', 55, 2, '2026-05-24 04:34:23', '2026-05-24 07:16:51'),
(23, 'capacity_external', 'fas fa-shield-virus', 'الوضع الأمني', 'Security Situation', NULL, NULL, 'الحالة: بيئة تشغيلية حساسة', 'Status: Sensitive operational environment', 55, 3, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(24, 'snapshot', 'fas fa-file-signature', 'الحالة القانونية', 'Legal  Status', 'مسجلة في السودان وأوغندا', 'Registered in Sudan and Uganda', NULL, NULL, NULL, 1, '2026-05-24 04:34:23', '2026-05-24 07:31:51'),
(25, 'snapshot', 'fas fa-map-marked-alt', 'التغطية الجغرافية', 'Geographic Coverage', 'السودان (دارفور) - أوغندا (كمبالا - بويالي)', 'Sudan – Darfur, Uganda – Kampala – Bweyale', NULL, NULL, NULL, 2, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(26, 'snapshot', 'fas fa-user-tie', 'فريق العمل', 'Staff Members', '14', '14', NULL, NULL, NULL, 3, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(27, 'snapshot', 'fas fa-users-cog', 'النساء في الأدوار القيادية', 'Women in leadership roles', '7', '7', NULL, NULL, NULL, 4, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(28, 'snapshot', 'fas fa-female', 'النساء في فريق العمل', 'Women in staff', '7', '7', NULL, NULL, NULL, 5, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(29, 'snapshot', 'fas fa-hands-helping', 'مجالات التدخل', 'Intervention Areas', 'التنمية والمساعدات', 'Development & Relief', NULL, NULL, NULL, 6, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(60, 'methodology_grant', 'fas fa-coins', 'منح صغيرة', 'Micro grant', 'دعم الأفراد والمبادرات المجتمعية المباشرة.', 'Supporting individuals and direct community initiatives.', NULL, NULL, NULL, 1, '2026-05-24 04:34:23', '2026-05-24 08:14:21'),
(61, 'methodology_grant', 'fas fa-store', 'منح المشاريع', 'Enterprise grant', 'توفير الدعم للأعمال ومشاريع التنمية المستدامة.', 'Support for businesses and sustainable development projects.', NULL, NULL, NULL, 2, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(62, 'methodology_me', 'fas fa-map-marked-alt', 'الزيارات الميدانية', 'Physical visits', 'تقييمات على أرض الواقع لضمان جودة الأداء.', 'On-site assessments to ensure performance quality.', NULL, NULL, NULL, 1, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(63, 'methodology_me', 'fas fa-laptop-house', 'التحقق الإلكتروني', 'Online verifications', 'استخدام أنظمة رقمية للتحقق والمتابعة عن بُعد.', 'Using digital systems for remote verification.', NULL, NULL, NULL, 2, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(64, 'cross_cutting', 'fas fa-shield-alt', 'حساسية ديناميكيات النزاع', 'Conflict dynamics sensitivity', NULL, NULL, NULL, NULL, NULL, 1, '2026-05-24 04:34:23', '2026-05-24 08:13:34'),
(65, 'cross_cutting', 'fas fa-venus-mars', 'مراعاة النوع الاجتماعي والفئات الضعيفة', 'Gender & vulnerable group’s consideration', NULL, NULL, NULL, NULL, NULL, 2, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(66, 'cross_cutting', 'fas fa-leaf', 'حماية البيئة وتغير المناخ', 'Environment and climate change protection', NULL, NULL, NULL, NULL, NULL, 3, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(67, 'cross_cutting', 'fas fa-network-wired', 'التنسيق والتعاون', 'Coordination & collaboration', NULL, NULL, NULL, NULL, NULL, 4, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(68, 'cross_cutting', 'fas fa-hands-helping', 'المبادئ الإنسانية', 'Humanitarian principles', NULL, NULL, NULL, NULL, NULL, 5, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(69, 'serve_audience', 'fas fa-handshake', 'الشركاء', 'Partners', 'التعاون مع المنظمات الدولية والمحلية لتوسيع نطاق التأثير الإيجابي.', 'Collaborating with international and local organizations to scale impact.', NULL, NULL, NULL, 1, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(70, 'serve_audience', 'fas fa-landmark', 'المؤسسات الحكومية', 'Government Institutions', 'التنسيق مع السلطات المحلية والوطنية لضمان التوافق وتسهيل العمليات الإنسانية.', 'Coordinating with local and national authorities to ensure alignment.', NULL, NULL, NULL, 2, '2026-05-24 04:34:23', '2026-05-24 08:15:39'),
(71, 'serve_audience', 'fas fa-users-cog', 'القادة المحليون', 'Local Leaders', 'إشراك قادة المجتمع المحلي بفاعلية في صنع القرار وتصميم البرامج.', 'Engaging community leaders in decision-making and program design.', NULL, NULL, NULL, 3, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(72, 'serve_audience', 'fas fa-campground', 'النازحون واللاجئون', 'IDPs & Refugees', 'توفير الحماية والمساعدات الإنسانية الطارئة للمهجرين قسراً واللاجئين.', 'Providing protection and emergency humanitarian aid for displaced persons.', NULL, NULL, NULL, 4, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(73, 'serve_audience', 'fas fa-house-damage', 'المجتمعات المتأثرة بالحرب', 'War-Affected Communities', 'إعادة التأهيل والدعم النفسي والاجتماعي الشامل للسكان المتضررين من النزاعات.', 'Rehabilitation and psychosocial support for conflict-affected populations.', NULL, NULL, NULL, 5, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(74, 'serve_audience', 'fas fa-home', 'الأسر والمستفيدون غير المباشرين', 'Households & Indirect Beneficiaries', 'الوصول للعائلات بأكملها لخلق تنمية مستدامة تحسن سبل العيش للجميع.', 'Reaching entire families to create sustainable development and better livelihoods.', NULL, NULL, NULL, 6, '2026-05-24 04:34:23', '2026-05-24 04:34:23'),
(78, 'timeline', NULL, 'الأمن الغذائي وسبل كسب العيش', 'Food Security &Livelihoods', NULL, NULL, '22 يناير2026', '22 jan2026', NULL, 6, '2026-05-24 06:17:04', '2026-05-24 06:17:04'),
(84, 'swot_strength', NULL, NULL, NULL, 'التسجيل الرسمي المعتمد في السودان وأوغندا', 'Official registration in Sudan & Uganda', NULL, NULL, NULL, 1, '2026-05-24 07:40:39', '2026-05-24 07:40:39'),
(85, 'swot_strength', NULL, NULL, NULL, 'الولاية والنهج التنموي والإنساني الواضح', 'Clear mandate and humanitarian/developmental approach', NULL, NULL, NULL, 2, '2026-05-24 07:40:39', '2026-05-24 07:40:39'),
(86, 'swot_strength', NULL, NULL, NULL, 'مجالات التدخل المتنوعة (التنمية والإغاثة)', 'Diverse intervention areas (Development & Relief)', NULL, NULL, NULL, 3, '2026-05-24 07:40:39', '2026-05-24 07:40:39'),
(87, 'swot_strength', NULL, NULL, NULL, 'قاعدة واسعة من أصحاب المصلحة والمستفيدين', 'Broad network of stakeholders & beneficiaries', NULL, NULL, NULL, 4, '2026-05-24 07:40:39', '2026-05-24 07:40:39'),
(88, 'swot_strength', NULL, NULL, NULL, 'التغطية الجغرافية الواسعة (دارفور، كمبالا، بويالي)', 'Extensive geographic coverage (Darfur, Kampala, Bweyale)', NULL, NULL, NULL, 5, '2026-05-24 07:40:39', '2026-05-24 07:40:39'),
(89, 'swot_strength', NULL, NULL, NULL, 'مكاتب فعلية قائمة وتواجد ميداني مستمر', 'Active physical offices & continuous field presence', NULL, NULL, NULL, 6, '2026-05-24 07:40:39', '2026-05-24 07:40:39'),
(90, 'swot_strength', NULL, NULL, NULL, 'قيادة شابة ومؤهلة مع تمثيل نسائي قوي', 'Qualified leadership with strong women representation', NULL, NULL, NULL, 7, '2026-05-24 07:40:39', '2026-05-24 07:40:39'),
(91, 'swot_strength', NULL, NULL, NULL, 'قنوات اتصال رسمية وفعالة ومتاحة للجميع', 'Official, active, and accessible contact channels', NULL, NULL, NULL, 8, '2026-05-24 07:40:39', '2026-05-24 07:40:39'),
(92, 'swot_strength', NULL, NULL, NULL, 'فريق عمل محلي مؤهل ومكرس للعمل الإنساني', 'Dedicated local staff with technical expertise', NULL, NULL, NULL, 9, '2026-05-24 07:40:39', '2026-05-24 07:40:39'),
(93, 'swot_strength', NULL, NULL, NULL, 'نظام مالي وحسابات بنكية رسمية وشفافة', 'Official, transparent bank accounts and financial systems', NULL, NULL, NULL, 10, '2026-05-24 07:40:39', '2026-05-24 07:40:39'),
(94, 'swot_strength', NULL, NULL, NULL, 'خبرات ميدانية سابقة ونجاحات متراكمة في الميدان', 'Proven track record and accumulated field experiences', NULL, NULL, NULL, 11, '2026-05-24 07:40:39', '2026-05-24 07:40:39'),
(95, 'swot_strength', NULL, NULL, NULL, 'شراكات وثيقة مع المجتمعات المحلية والجهات الفاعلة', 'Strong partnerships with local communities and actors', NULL, NULL, NULL, 12, '2026-05-24 07:40:39', '2026-05-24 07:40:39'),
(97, 'swot_weakness', NULL, NULL, NULL, 'تحديات البنية التحتية للموقع الإلكتروني والتكنولوجيا', 'Website and IT technology limitations', NULL, NULL, NULL, 1, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(98, 'swot_weakness', NULL, NULL, NULL, 'محدودية الشراكات الإستراتيجية الحالية', 'Limited strategic partnerships', NULL, NULL, NULL, 2, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(99, 'swot_weakness', NULL, NULL, NULL, 'الاعتماد على مصادر تمويل محدودة وغير متنوعة', 'Dependency on limited and non-diversified funding sources', NULL, NULL, NULL, 3, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(100, 'swot_weakness', NULL, NULL, NULL, 'الحاجة إلى توسيع وتفعيل قاعدة العضوية والانتساب', 'Need to expand and activate organizational membership', NULL, NULL, NULL, 4, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(102, 'swot_opportunity', NULL, NULL, NULL, 'السمعة الممتازة والموثوقية العالية في الميدان', 'Excellent reputation and high field reliability', NULL, NULL, NULL, 1, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(103, 'swot_opportunity', NULL, NULL, NULL, 'العلاقات الممتدة والقوية مع الشركاء المحليين', 'Extended and strong relationships with local partners', NULL, NULL, NULL, 2, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(104, 'swot_opportunity', NULL, NULL, NULL, 'بناء شبكات تواصل وتنسيق فعالة مع الجهات الفاعلة', 'Effective networking and coordination with key actors', NULL, NULL, NULL, 3, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(105, 'swot_opportunity', NULL, NULL, NULL, 'القبول والترحيب المجتمعي الكبير بالمنظمة وتدخلاتها', 'Strong community acceptance and trust in interventions', NULL, NULL, NULL, 4, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(106, 'swot_opportunity', NULL, NULL, NULL, 'فرص التوسع الجغرافي لمناطق عمل جديدة محلياً وإقليمياً', 'Potential for geographic expansion to new operational areas', NULL, NULL, NULL, 5, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(107, 'swot_opportunity', NULL, NULL, NULL, 'روح المبادرة والابتكار في إيجاد حلول للمشاكل المجتمعية', 'Strong spirit of initiative and innovation in community solutions', NULL, NULL, NULL, 6, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(108, 'swot_need', NULL, NULL, NULL, 'بناء القدرات الفنية والتقنية للموظفين', 'Technical capacity building for staff', NULL, NULL, NULL, 1, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(109, 'swot_need', NULL, NULL, NULL, 'تنويع الشراكات ومصادر التمويل المستدام', 'Diversification of partnerships & funding sources', NULL, NULL, NULL, 2, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(110, 'swot_need', NULL, NULL, NULL, 'تطوير الموقع الإلكتروني وتكنولوجيا المعلومات', 'Development of the website & IT infrastructure', NULL, NULL, NULL, 3, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(111, 'swot_need', NULL, NULL, NULL, 'إنشاء منصة إعلامية متكاملة للمنظمة', 'Establishing a comprehensive organizational media platform', NULL, NULL, NULL, 4, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(112, 'swot_need', NULL, NULL, NULL, 'تفعيل قنوات وصفحات التواصل الاجتماعي', 'Activating social media pages & digital outreach', NULL, NULL, NULL, 5, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(113, 'swot_need', NULL, NULL, NULL, 'تعزيز أنظمة الحوكمة واللوائح المؤسسية الداخلية', 'Enhancing institutional governance & internal regulations', NULL, NULL, NULL, 6, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(114, 'swot_need', NULL, NULL, NULL, 'تفعيل البريد الإلكتروني الرسمي لجميع الأقسام', 'Activating official institutional email for all departments', NULL, NULL, NULL, 7, '2026-05-24 07:40:39', '2026-05-24 08:17:04'),
(115, 'swot_need', NULL, NULL, NULL, 'تطوير خطة استراتيجية شاملة للمستقبل', 'Developing a comprehensive long-term strategic plan', NULL, NULL, NULL, 8, '2026-05-24 07:40:39', '2026-05-24 08:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `profile_settings`
--

CREATE TABLE `profile_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hero_title_ar` text DEFAULT NULL,
  `hero_title_en` text DEFAULT NULL,
  `hero_subtitle_ar` text DEFAULT NULL,
  `hero_subtitle_en` text DEFAULT NULL,
  `hero_pill1_icon` text DEFAULT NULL,
  `hero_pill1_text_ar` text DEFAULT NULL,
  `hero_pill1_text_en` text DEFAULT NULL,
  `hero_pill2_icon` text DEFAULT NULL,
  `hero_pill2_text_ar` text DEFAULT NULL,
  `hero_pill2_text_en` text DEFAULT NULL,
  `hero_pill3_icon` text DEFAULT NULL,
  `hero_pill3_text_ar` text DEFAULT NULL,
  `hero_pill3_text_en` text DEFAULT NULL,
  `objectives_title_ar` text DEFAULT NULL,
  `objectives_title_en` text DEFAULT NULL,
  `timeline_title_ar` text DEFAULT NULL,
  `timeline_title_en` text DEFAULT NULL,
  `journey_title_ar` text DEFAULT NULL,
  `journey_title_en` text DEFAULT NULL,
  `journey_pos_title_ar` text DEFAULT NULL,
  `journey_pos_title_en` text DEFAULT NULL,
  `journey_pos_desc_ar` text DEFAULT NULL,
  `journey_pos_desc_en` text DEFAULT NULL,
  `journey_pos_pill_icon` text DEFAULT NULL,
  `journey_pos_pill_ar` text DEFAULT NULL,
  `journey_pos_pill_en` text DEFAULT NULL,
  `journey_neg_title_ar` text DEFAULT NULL,
  `journey_neg_title_en` text DEFAULT NULL,
  `journey_neg_desc_ar` text DEFAULT NULL,
  `journey_neg_desc_en` text DEFAULT NULL,
  `capacity_title_ar` text DEFAULT NULL,
  `capacity_title_en` text DEFAULT NULL,
  `capacity_desc_ar` text DEFAULT NULL,
  `capacity_desc_en` text DEFAULT NULL,
  `capacity_summary_title_ar` text DEFAULT NULL,
  `capacity_summary_title_en` text DEFAULT NULL,
  `capacity_summary_desc_ar` text DEFAULT NULL,
  `capacity_summary_desc_en` text DEFAULT NULL,
  `capacity_internal_title_ar` text DEFAULT NULL,
  `capacity_internal_title_en` text DEFAULT NULL,
  `capacity_external_title_ar` text DEFAULT NULL,
  `capacity_external_title_en` text DEFAULT NULL,
  `snapshot_title_ar` text DEFAULT NULL,
  `snapshot_title_en` text DEFAULT NULL,
  `swot_title_ar` text DEFAULT NULL,
  `swot_title_en` text DEFAULT NULL,
  `swot_strengths_title_ar` text DEFAULT NULL,
  `swot_strengths_title_en` text DEFAULT NULL,
  `swot_strengths_icon` text DEFAULT NULL,
  `swot_weaknesses_title_ar` text DEFAULT NULL,
  `swot_weaknesses_title_en` text DEFAULT NULL,
  `swot_weaknesses_icon` text DEFAULT NULL,
  `swot_opportunities_title_ar` text DEFAULT NULL,
  `swot_opportunities_title_en` text DEFAULT NULL,
  `swot_opportunities_icon` text DEFAULT NULL,
  `swot_needs_title_ar` text DEFAULT NULL,
  `swot_needs_title_en` text DEFAULT NULL,
  `swot_needs_icon` text DEFAULT NULL,
  `methodology_title_ar` text DEFAULT NULL,
  `methodology_title_en` text DEFAULT NULL,
  `methodology_subtitle_ar` text DEFAULT NULL,
  `methodology_subtitle_en` text DEFAULT NULL,
  `methodology_grants_title_ar` text DEFAULT NULL,
  `methodology_grants_title_en` text DEFAULT NULL,
  `methodology_grants_icon` text DEFAULT NULL,
  `methodology_me_title_ar` text DEFAULT NULL,
  `methodology_me_title_en` text DEFAULT NULL,
  `methodology_me_icon` text DEFAULT NULL,
  `methodology_cross_title_ar` text DEFAULT NULL,
  `methodology_cross_title_en` text DEFAULT NULL,
  `methodology_cross_desc_ar` text DEFAULT NULL,
  `methodology_cross_desc_en` text DEFAULT NULL,
  `serve_title_ar` text DEFAULT NULL,
  `serve_title_en` text DEFAULT NULL,
  `serve_subtitle_ar` text DEFAULT NULL,
  `serve_subtitle_en` text DEFAULT NULL,
  `serve_desc_ar` text DEFAULT NULL,
  `serve_desc_en` text DEFAULT NULL,
  `contact_title_ar` text DEFAULT NULL,
  `contact_title_en` text DEFAULT NULL,
  `contact_subtitle_ar` text DEFAULT NULL,
  `contact_subtitle_en` text DEFAULT NULL,
  `contact_desc_ar` text DEFAULT NULL,
  `contact_desc_en` text DEFAULT NULL,
  `contact_name_ar` text DEFAULT NULL,
  `contact_name_en` text DEFAULT NULL,
  `contact_position_ar` text DEFAULT NULL,
  `contact_position_en` text DEFAULT NULL,
  `contact_email` text DEFAULT NULL,
  `contact_phone` text DEFAULT NULL,
  `contact_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_settings`
--

INSERT INTO `profile_settings` (`id`, `hero_title_ar`, `hero_title_en`, `hero_subtitle_ar`, `hero_subtitle_en`, `hero_pill1_icon`, `hero_pill1_text_ar`, `hero_pill1_text_en`, `hero_pill2_icon`, `hero_pill2_text_ar`, `hero_pill2_text_en`, `hero_pill3_icon`, `hero_pill3_text_ar`, `hero_pill3_text_en`, `objectives_title_ar`, `objectives_title_en`, `timeline_title_ar`, `timeline_title_en`, `journey_title_ar`, `journey_title_en`, `journey_pos_title_ar`, `journey_pos_title_en`, `journey_pos_desc_ar`, `journey_pos_desc_en`, `journey_pos_pill_icon`, `journey_pos_pill_ar`, `journey_pos_pill_en`, `journey_neg_title_ar`, `journey_neg_title_en`, `journey_neg_desc_ar`, `journey_neg_desc_en`, `capacity_title_ar`, `capacity_title_en`, `capacity_desc_ar`, `capacity_desc_en`, `capacity_summary_title_ar`, `capacity_summary_title_en`, `capacity_summary_desc_ar`, `capacity_summary_desc_en`, `capacity_internal_title_ar`, `capacity_internal_title_en`, `capacity_external_title_ar`, `capacity_external_title_en`, `snapshot_title_ar`, `snapshot_title_en`, `swot_title_ar`, `swot_title_en`, `swot_strengths_title_ar`, `swot_strengths_title_en`, `swot_strengths_icon`, `swot_weaknesses_title_ar`, `swot_weaknesses_title_en`, `swot_weaknesses_icon`, `swot_opportunities_title_ar`, `swot_opportunities_title_en`, `swot_opportunities_icon`, `swot_needs_title_ar`, `swot_needs_title_en`, `swot_needs_icon`, `methodology_title_ar`, `methodology_title_en`, `methodology_subtitle_ar`, `methodology_subtitle_en`, `methodology_grants_title_ar`, `methodology_grants_title_en`, `methodology_grants_icon`, `methodology_me_title_ar`, `methodology_me_title_en`, `methodology_me_icon`, `methodology_cross_title_ar`, `methodology_cross_title_en`, `methodology_cross_desc_ar`, `methodology_cross_desc_en`, `serve_title_ar`, `serve_title_en`, `serve_subtitle_ar`, `serve_subtitle_en`, `serve_desc_ar`, `serve_desc_en`, `contact_title_ar`, `contact_title_en`, `contact_subtitle_ar`, `contact_subtitle_en`, `contact_desc_ar`, `contact_desc_en`, `contact_name_ar`, `contact_name_en`, `contact_position_ar`, `contact_position_en`, `contact_email`, `contact_phone`, `contact_photo`, `created_at`, `updated_at`) VALUES
(1, 'الملف المؤسسي للمنظمة', 'Institutional  Profile', 'تعرف على هويتنا، أهدافنا، مسيرتنا التنموية وبناء قدراتنا من أجل مجتمع أفضل.', 'Discover our identity, goals, developmental journey, and capacity building for a better society.', 'fas fa-calendar-alt', 'تأسست  في 22 ديسمبر 2022', 'Founded 22 of December 2022', 'fas fa-globe-africa', 'مسجلة في السودان وأوغندا', 'Registered in Sudan & Uganda', 'fas fa-users', '14 عضو من فريق العمل', '14 Staff Members', 'أهدافنا الاستراتيجية', 'Our Strategic Objectives', 'تاريخنا ومسيرتنا', 'Our History & Journey', 'رحلتنا المؤسسية', 'Organizational Journey', 'أهم التجارب في الفترة 2022-2025', 'Most Important Experience in 2022-2025', 'بدأت المنظمة نشاطها بتدخلات صغيرة ومناطق جغرافية صغيرة وتوسعت تدريجياً إلى مناطق كبيرة:\r\n• مدينة الفاشر\r\n• أرياف الفاشر\r\n• شمال دارفور', 'The organization began its activities with small interventions and small geographical areas and gradually expanded into large:\r\n• El Fasher city\r\n• El Fasher rural areas\r\n• North Darfur', 'fas fa-globe-africa', 'التسجيل الرسمي في كمبالا، أوغندا', 'Registration in Kampala, Uganda', 'التجارب السلبية والتحديات', 'Negative Experience & Challenges', 'فشل في الحفاظ على بعض الشراكات ومصادر التمويل والموظفين والمناطق الجغرافية بسبب حرب 15 أبريل 2023\r\nبيتوبلا', 'Failure to maintain some partnerships and funding sources, employees and geographic areas due to 15 April 2023 war', 'القدرة المؤسسية والبيئة التشغيلية', 'Organizational Capacity & Operational Environment', 'تقييم الجاهزية التشغيلية، القوة المؤسسية، وبيئة العمل الإنساني للمنظمة.', 'Assessing the organization’s operational readiness, institutional strength, and humanitarian working environment.', 'نظرة عامة (ملخص تنفيذي)', 'Executive Summary', 'رغم التحديات الخارجية والوضع الأمني الحساس، تُظهر المنظمة بنية مؤسسية صلبة وقدرات بشرية ممتازة.', 'Despite external challenges and a sensitive security situation, the organization demonstrates solid institutional strength and excellent human resources.', 'القدرات الداخلية', 'Internal Capacities', 'البيئة التشغيلية', 'Operational Environment', 'الملف المؤسسي (لمحة سريعة)', 'Institutional Snapshot', 'نقاط القوة والقدرات', 'Strengths & Capacity', 'نقاط القوة', 'Strengths', 'fas fa-dumbbell', 'نقاط الضعف الرئيسية', 'Main Weaknesses', 'fas fa-exclamation-triangle', 'الفرص', 'Opportunities', 'fas fa-lightbulb', 'الاحتياجات', 'Capacity Needs', 'fas fa-tools', 'منهجيات المنظمة وآلية التنفيذ', 'Methodologies of the organization', 'آلية التنفيذ والعمل', 'Execution Framework', 'دعم المنح', 'Grants support', 'fas fa-hand-holding-heart', 'المراقبة والتقييم', 'Monitoring and evaluation', 'fas fa-chart-line', 'القضايا المتقاطعة (الشاملة)', 'Cross cutting issues', 'نعتمد في جميع تدخلاتنا على أسس ثابتة تضمن الشمولية والاستدامة.', 'We rely on steadfast foundations in all our interventions to ensure inclusivity and sustainability.', 'من نخدم؟', 'Who We Serve', 'المستفيدون والشركاء المستهدفون', 'Target Audience', 'دعم المجتمعات الضعيفة والتعاون مع أصحاب المصلحة الرئيسيين لخلق أثر إنساني مستدام.', 'Supporting vulnerable communities and collaborating with key stakeholders to create sustainable humanitarian impact.', 'جهة الاتصال الرسمية للمنظمة', 'Official Contact Person', 'للتواصل والاستفسارات الرسمية', 'Get in Touch', 'للاستفسارات الخاصة بالشراكات، التنسيق، والتواصل المؤسسي الفعال.', 'For partnership inquiries, coordination, and organizational communication.', 'الدومة محمد حامد أحمد', 'Aldouma Mohamed Hamid Ahmed', 'مسؤول المشروع', 'Project Officer', 'adoumamohamed013@gmail.com', '+256 744 198 110', NULL, '2026-05-24 04:34:22', '2026-05-24 08:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `challange` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `challange`, `image`, `icon`, `created_at`, `updated_at`) VALUES
(36, '{\"ar\":\"الرعاية الصحية\",\"en\":\"Healthcare\"}', '{\"ar\":\"برنامج تحسين الصرف البيئي والصحة العامة\\r\\nيُعد الحفاظ على بيئة نظيفة أمرًا أساسيًا للعيش بصحة وكرامة. من خلال برنامج تحسين الصرف البيئي والصحة العامة، تعمل منظمة ماما أفريقيا على تعزيز ظروف معيشية آمنة ونظيفة ومستدامة للمجتمعات الضعيفة. يركز البرنامج على تحسين ممارسات إدارة النفايات، ودعم حملات تنظيف المجتمع، وتشجيع سلوكيات الصرف الصحي الصحيحة، وتوزيع المواد الأساسية للنظافة.\\r\\n\\r\\nكما يشمل البرنامج جلسات توعية حول الوقاية من الأمراض، والتعامل الآمن مع المياه، وحماية البيئة. من خلال إشراك القادة المحليين والمتطوعين والأسر، تعزز المنظمة مسؤولية المجتمع نحو الحفاظ على بيئة صحية. هذه المبادرة لا تقلل فقط من المخاطر الصحية، بل تبني أيضًا وعيًا طويل الأمد وقدرة على الصمود داخل المجتمع.\",\"en\":\"Environmental Sanitation and Public Health Improvement Program\\r\\nA clean environment is essential for healthy and dignified living. Through the Environmental Sanitation and Public Health Improvement Program, Mama Africa Organization works to promote safe, clean, and sustainable living conditions for vulnerable communities. The program focuses on improving waste management practices, supporting community clean-up campaigns, promoting proper sanitation behaviors, and distributing essential hygiene materials. It also includes awareness sessions on disease prevention, safe water handling, and environmental protection. By engaging local leaders, volunteers, and families, the organization strengthens community responsibility toward maintaining a healthy environment. This initiative not only reduces health risks but also builds long-term awareness and resilience within the community.\"}', '{\"ar\":\"فهم المخاطر البيئية والصرف الصحي\\r\\nتواجه العديد من المجتمعات الضعيفة تحديات بيئية خطيرة، بما في ذلك ضعف أنظمة التخلص من النفايات، ونقص المرافق الصحية، وتلوث مصادر المياه، وازدحام ظروف المعيشة. تؤدي هذه العوامل إلى زيادة كبيرة في انتشار الأمراض المعدية مثل الكوليرا والإسهال والأمراض المنقولة عن طريق المياه.\\r\\n\\r\\nكما أن قلة الوعي بممارسات النظافة والصحة البيئية تزيد الوضع سوءًا، خاصة بين الأطفال والأسر النازحة التي تعيش في ملاجئ مؤقتة. وبدون بنية تحتية سليمة للصرف الصحي والتعليم، تستمر المخاطر الصحية العامة في التزايد.\\r\\n\\r\\nمعًا، يمكننا تغيير هذا الواقع. من خلال جهود منسقة ومشاركة المجتمع، تهدف منظمة ماما أفريقيا إلى تحسين ظروف الصرف الصحي، وتعزيز ممارسات الصحة الوقائية، وخلق بيئات أكثر أمانًا يمكن للأسر العيش فيها بكرامة وأمان.\",\"en\":\"Understanding Environmental and Sanitation Risks\\r\\nMany vulnerable communities face serious environmental challenges, including poor waste disposal systems, lack of sanitation facilities, contaminated water sources, and overcrowded living conditions. These factors significantly increase the spread of communicable diseases such as cholera, diarrhea, and other waterborne infections.\\r\\n\\r\\nLimited awareness about hygiene practices and environmental health further worsens the situation, especially among children and displaced families living in temporary shelters. Without proper sanitation infrastructure and education, public health risks continue to grow.\\r\\n\\r\\nTogether, we can change this. Through coordinated efforts and community participation, Mama Africa Organization aims to improve sanitation conditions, strengthen preventive health practices, and create safer environments where families can live with dignity and security.\"}', 'projects_images/doibQedNnhjUGTIUFmUlPPcJ7X4B1uT2axO3iU3k.png', NULL, '2026-02-21 18:03:14', '2026-04-10 16:19:00'),
(37, '{\"ar\":\"إصحاح المياه\",\"en\":\"Water Sanitation\"}', '{\"ar\":\"مبادرة المياه النظيفة\\r\\nيستحق كل طفل الوصول إلى مياه شرب نظيفة وآمنة. تجلب مبادرة المياه النظيفة الأمل إلى المجتمعات التي تعاني من ندرة المياه، محوِّلةً الحياة قطرةً قطرة.\",\"en\":\"مبادرة المياه النظيفة\\r\\nيستحق كل طفل الوصول إلى مياه شرب نظيفة وآمنة. تجلب مبادرة المياه النظيفة الأمل إلى المجتمعات التي تعاني من ندرة المياه، محوِّلةً الحياة قطرةً قطرة.\"}', '{\"ar\":\"فهم أزمة المياه\\r\\nيفتقر ملايين الأشخاص حول العالم إلى مياه شرب نظيفة. في المجتمعات الريفية، غالبًا ما تمشي الأسر أميالًا يوميًا لجمع المياه من مصادر غير آمنة، مما يعرضهم لأمراض تهدد حياتهم.\\r\\n\\r\\nيفوّت الأطفال، وخاصة الفتيات، المدرسة لمساعدة أسرهم في جمع المياه. وتقضي النساء ما معدله 200 مليون ساعة يوميًا حول العالم في جمع المياه. هذه الأزمة تعمّق الفقر وتحد من الفرص أمام المجتمعات بأكملها.\\r\\n\\r\\nمعًا، يمكننا تغيير هذا الواقع. بدعمكم، نبني حلول مياه مستدامة تمكّن المجتمعات وتحقق تغييرًا دائمًا.\",\"en\":\"Understanding the Water Crisis\\r\\nMillions of people around the world lack access to clean drinking water. In rural communities, families often walk miles each day to collect water from unsafe sources, exposing themselves to life-threatening diseases.\\r\\n\\r\\nChildren, especially girls, miss school to help collect water. Women spend an average of 200 million hours each day gathering water globally. This crisis perpetuates poverty and limits opportunities for entire communities.\\r\\n\\r\\nTogether, we can change this. With your support, we\'re building sustainable water solutions that empower communities and create lasting change.\"}', 'projects_images/zIekQO7IbJzJremd0i4HnGLZRl8n49gj6S5KyCm1.png', NULL, '2026-02-21 18:05:24', '2026-04-10 16:19:00'),
(38, '{\"ar\":\"الحماية\",\"en\":\"Protection\"}', '{\"ar\":\"برنامج الحماية المجتمعية في دارفور\\r\\nتعد الحماية حجر الأساس في تعزيز كرامة الإنسان وضمان سلامته في ظل الظروف الصعبة التي تمر بها مجتمعات دارفور. تسعى منظمتنا الخيرية إلى تقديم خدمات الحماية لجميع أفراد المجتمع—نساءً، أطفالًا، ورجالًا—من خلال توفير مساحات آمنة، ودعم نفسي واجتماعي، وتعزيز حقوقهم الأساسية. من خلال برامجنا المتكاملة، نُمكّن المستفيدين من استعادة ثقتهم بأنفسهم، حماية حقوقهم، وبناء مستقبل أكثر أمانًا واستقرارًا.\",\"en\":\"Community Protection Program in Darfur\\r\\nProtection is the cornerstone of human dignity and safety, especially in the challenging conditions faced by communities in Darfur. Our humanitarian organization provides protection services to all members of the community—women, children, and men—through safe spaces, psychosocial support, and the promotion of fundamental rights. Through our comprehensive programs, beneficiaries are empowered to regain self-confidence, safeguard their rights, and build a safer and more stable future.\"}', '{\"ar\":\"تواجه مجتمعات دارفور تحديات كبيرة تؤثر على سلامة الأفراد وحقوقهم، بما في ذلك النزوح، والصراعات المحلية، والفقر، والتهديدات المستمرة للعنف والاستغلال. هذه الظروف تجعل الأطفال والنساء والرجال أكثر عرضة للخطر وتحد من قدرتهم على المشاركة في الأنشطة الاقتصادية والاجتماعية.\\r\\nمن خلال فهم هذه التحديات، تصمم منظمتنا برامج حماية شاملة تتضمن جلسات توعية، ودعم نفسي واجتماعي، وتدريب عملي يمكّن المستفيدين من مواجهة المخاطر، استعادة كرامتهم، وبناء مستقبل أفضل لهم ولأسرهم.\",\"en\":\"Communities in Darfur face significant challenges that affect individual safety and rights, including displacement, local conflicts, poverty, and ongoing risks of violence and exploitation. These conditions make children, women, and men more vulnerable and limit their ability to participate in social and economic activities.\\r\\nBy understanding these challenges, our organization designs comprehensive protection programs that include awareness sessions, psychosocial support, and practical training, enabling beneficiaries to face risks, restore their dignity, and build a better future for themselves and their families.\"}', 'projects_images/0n6XMEW1SBuwMxEjsaCmfVaiORWnMRAnoxnrSAEE.png', NULL, '2026-02-21 18:12:22', '2026-02-21 18:12:22'),
(39, '{\"ar\":\"الأمن الغذائي\",\"en\":\"Food Security\"}', '{\"ar\":\"مشروع التغذية المجتمعية ودعم الوجبات\\r\\nيُعد الحصول على غذاء كافٍ ومغذي حقًا أساسيًا من حقوق الإنسان. من خلال مشروع التغذية المجتمعية ودعم الوجبات، تقدم منظمة ماما أفريقيا وجبات منتظمة، ساخنة ومتوازنة للنازحين واللاجئين والأسر الضعيفة التي تواجه انعدام الأمن الغذائي. يركز المشروع على تقديم وجبات مُعدة جيدًا تلبي الاحتياجات الغذائية الأساسية، خاصة للأطفال والنساء وكبار السن.\\r\\n\\r\\nبمساعدة المتطوعين وأعضاء المجتمع، يتم توزيع الوجبات بطريقة آمنة ومنظمة وكريمة لضمان العدالة واحترام جميع المستفيدين. هذه المبادرة ليست مجرد توفير للطعام — بل هي وسيلة لاستعادة القوة، وحماية الصحة، والحفاظ على كرامة الإنسان في أوقات الأزمات.\",\"en\":\"Understanding Food Insecurity and Malnutrition Displacement, conflict, and economic instability have left many families without reliable sources of income. As a result, thousands struggle daily to secure enough food to survive. Rising food prices and limited access to markets further worsen the situation. Children and vulnerable groups are especially at risk of malnutrition, which can lead to long-term health complications, weakened immunity, and developmental challenges. For many families, skipping meals or reducing portion sizes has become a coping mechanism. Together, we can change this. Together, we can address this urgent need. By providing nutritious meals and strengthening community support systems, we help families regain stability, improve their health, and rebuild hope for a better future.\"}', '{\"ar\":\"فهم انعدام الأمن الغذائي وسوء التغذية\\r\\nأدى النزوح والصراعات وعدم الاستقرار الاقتصادي إلى فقدان العديد من الأسر لمصادر دخل موثوقة. ونتيجة لذلك، تكافح آلاف العائلات يوميًا لتأمين ما يكفي من الغذاء للبقاء على قيد الحياة. كما أن ارتفاع أسعار الغذاء وقلة الوصول إلى الأسواق يزيدان الوضع سوءًا.\\r\\n\\r\\nالأطفال والفئات الضعيفة معرضون بشكل خاص لسوء التغذية، مما قد يؤدي إلى مضاعفات صحية طويلة الأمد، وضعف المناعة، ومشاكل في النمو والتطور. بالنسبة للعديد من الأسر، أصبح تفويت الوجبات أو تقليل حجمها وسيلة للتكيف مع الظروف الصعبة.\\r\\n\\r\\nمعًا، يمكننا تغيير هذا الواقع. من خلال توفير وجبات مغذية وتقوية أنظمة الدعم المجتمعي، نساعد الأسر على استعادة الاستقرار، وتحسين صحتها، وبناء أمل لمستقبل أفضل.\",\"en\":\"Understanding Food Insecurity and Malnutrition Displacement, conflict, and economic instability have left many families without reliable sources of income. As a result, thousands struggle daily to secure enough food to survive. Rising food prices and limited access to markets further worsen the situation. Children and vulnerable groups are especially at risk of malnutrition, which can lead to long-term health complications, weakened immunity, and developmental challenges. For many families, skipping meals or reducing portion sizes has become a coping mechanism. Together, we can change this. Together, we can address this urgent need. By providing nutritious meals and strengthening community support systems, we help families regain stability, improve their health, and rebuild hope for a better future.\"}', 'projects_images/FfLyy2Cmr0bjNjP1ivyxAM8k3VblkjSa7kVVodLv.png', NULL, '2026-02-21 18:17:01', '2026-04-10 16:19:00'),
(40, '{\"ar\":\"التعليم\",\"en\":\"Education\"}', '{\"ar\":\"نسعى لمواجهة الجهل والأمية من خلال برامج تعليمية شاملة تستهدف كافة الأعمار:\\r\\n\\r\\nالأطفال: توفير تعليم أساسي وبيئات تعلم آمنة لحمايتهم من الضياع وبناء مستقبلهم.\\r\\n\\r\\nالنساء: فصول لمحو الأمية وتعليم المهارات الحياتية لتعزيز دورهن في الأسرة والمجتمع.\\r\\n\\r\\nالرجال: برامج تعليمية وتوعوية تساعدهم على تطوير قدراتهم ومواكبة متطلبات الحياة.\\r\\n\\r\\nهدفنا: سلاح العلم لكل فرد، لضمان مجتمع واعٍ وقادر على النهوض بدارفور من جديد.\",\"en\":\"We strive to confront ignorance and illiteracy through comprehensive educational programs targeting all ages:\\r\\n\\r\\nChildren: Providing basic education and safe learning environments to protect them from being lost and to build their future.\\r\\n\\r\\nWomen: Literacy classes and life skills education to enhance their role in the family and society.\\r\\n\\r\\nMen: Educational and awareness programs that help them develop their abilities and keep up with life’s requirements.\\r\\n\\r\\nOur goal: Knowledge as a weapon for every individual, to ensure an aware society capable of revitalizing Darfur once again.\"}', '{\"ar\":\"1. التحديات الأمنية والنزوح\\r\\nتدمير البنية التحتية: تعرض الكثير من المدارس والمراكز التعليمية للدمار أو التحول لمراكز إيواء.\\r\\n\\r\\nانعدام الأمان: يصعب على الطلاب والمعلمين الوصول إلى أماكن الدراسة بسبب مخاطر النزاع المستمر.\\r\\n\\r\\n2. التحديات الاقتصادية\\r\\nالفقر الحاد: تضطر العائلات لإرسال أطفالها للعمل بدلاً من الدراسة لتأمين لقمة العيش.\\r\\n\\r\\nنقص التمويل: تعاني المنظمات المحلية من شح الموارد اللازمة لتوفير الكتب، القرطاسية، ورواتب المعلمين.\\r\\n\\r\\n3. التحديات الاجتماعية والثقافية\\r\\nالأمية المتفشية: خاصة بين الكبار والنساء، مما يقلل من الوعي بأهمية التعليم للأجيال الناشئة.\\r\\n\\r\\nالتسرب الدراسي: ارتفاع معدلات ترك الدراسة بين الفتيات بسبب الزواج المبكر أو الأعباء المنزلية.\\r\\n\\r\\n4. التحديات التقنية واللوجستية\\r\\nالعزلة التقنية: ضعف شبكات الإنترنت والكهرباء يمنع الاستفادة من حلول \\\"التعليم عن بُعد\\\".\\r\\n\\r\\nنقص الكوادر: هجرة المعلمين المؤهلين بحثاً عن مناطق أكثر أماناً أو سبل عيش أفضل.\",\"en\":\"1. Security Challenges and Displacement\\r\\nDestruction of infrastructure: Many schools and educational centers have been destroyed or converted into shelters.\\r\\n\\r\\nLack of safety: Students and teachers find it difficult to access study places due to the ongoing conflict risks.\\r\\n\\r\\n2. Economic Challenges\\r\\nSevere poverty: Families are forced to send their children to work instead of studying to secure a livelihood.\\r\\n\\r\\nLack of funding: Local organizations suffer from scarce resources needed to provide books, stationery, and teachers\' salaries.\\r\\n\\r\\n3. Social and Cultural Challenges\\r\\nWidespread illiteracy: Especially among adults and women, which reduces awareness of the importance of education for emerging generations.\\r\\n\\r\\nSchool dropout: High rates of school leaving among girls due to early marriage or household burdens.\\r\\n\\r\\n4. Technical and Logistical Challenges\\r\\nTechnical isolation: Weak internet and electricity networks prevent the utilization of \\\"remote learning\\\" solutions.\\r\\n\\r\\nLack of staff: Qualified teachers migrate in search of safer areas or better livelihood opportunities.\"}', 'projects_images/69ee45a18a29b.jpeg', NULL, '2026-02-21 18:20:51', '2026-04-26 17:07:41'),
(43, '{\"ar\":\"بناء السلام\",\"en\":\"Peace Building\"}', '{\"ar\":\"يعمل برنامج بناء السلام في منظمة ماما أفريكا على تعزيز التماسك المجتمعي والتعايش السلمي من خلال مبادرات شاملة تستهدف اللاجئين والمجتمعات المضيفة في يوغندا. يشمل البرنامج تنظيم جلسات الحوار المجتمعي، وتوفير الدعم النفسي والاجتماعي للمتأثرين بالنزاعات، بالإضافة إلى تمكين الشباب والنساء اقتصادياً لتقليل حدة التوترات الناتجة عن التنافس على الموارد. يسعى البرنامج إلى تحويل النزاعات إلى فرص للتعاون المشترك وبناء أسس متينة للاستقرار المستدام.\",\"en\":\"Mama Africa\'s Peacebuilding Program works to enhance social cohesion and peaceful coexistence through comprehensive initiatives targeting both refugees and host communities in Uganda. The program includes organizing community dialogue sessions, providing psychosocial support to conflict-affected individuals, and economically empowering youth and women to reduce tensions arising from resource competition. Our goal is to transform conflicts into opportunities for collaboration and to build a solid foundation for sustainable stability.\"}', '{\"ar\":\"يتمثل التحدي في سد الفجوة بين الإغاثة الطارئة وبناء السلام المستدام، حيث يعاني اللاجئون من صدمات نفسية عميقة ونقص في سبل العيش، مما يجعلهم عرضة للهشاشة الأمنية والنزاعات المجتمعية في بيئات النزوح.\",\"en\":\"The challenge lies in bridging the gap between emergency relief and sustainable peacebuilding. Refugees suffer from deep psychological trauma and a lack of livelihoods, leaving them vulnerable to security fragility and community conflicts within displacement settings.\"}', 'projects_images/69ee3d1d7bb45.jpeg', NULL, '2026-04-07 11:06:01', '2026-04-26 16:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `project_activities`
--

CREATE TABLE `project_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `detail` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `funded_by` text DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `status` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_activities`
--

INSERT INTO `project_activities` (`id`, `project_id`, `title`, `description`, `detail`, `location`, `date`, `funded_by`, `amount`, `status`, `icon`, `created_at`, `updated_at`) VALUES
(1, 36, '{\"ar\":\"تقييم الصحة العامة للنازحين بالفاشر\",\"en\":\"Public Health Assessment for IDPs\"}', '{\"ar\":\"إجراء التقييم الشامل للصحة العامة للنازحين في الفاشر بتمويل من منظمة الطب الشمولي للشؤون الاجتماعية.\",\"en\":\"Conducted a public health assessment for IDPs in El Fasher to identify urgent medical needs.\"}', '{\"ar\":\"بتمويل من مؤسسة الطب الشمولي للشؤون الاجتماعية بقيمة 3,000 دولار.\",\"en\":\"Funded by Holistic Medicine social affairs with amount of 3,000 USD.\"}', '{\"ar\":\"الفاشر\",\"en\":\"El Fasher\"}', '{\"ar\":\"أبريل – مايو 2024\",\"en\":\"Apr – May 2024\"}', '{\"ar\":\"الطب الشمولي للشؤون الاجتماعية\",\"en\":\"Holistic Medicine Social Affairs\"}', '3,000 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-notes-medical', '2026-05-25 07:14:56', '2026-05-25 07:17:18'),
(2, 37, '{\"ar\":\"توزيع المياه النقية بريف الفاشر (الشجرة)\",\"en\":\"Distribution of Pure Water in Rural El Fasher (SHAGARA)\"}', '{\"ar\":\"توزيع مياه شرب نقية وصالحة للأسر النازحة بريف الفاشر (منطقة الشجرة) لتأمين الحصول على مياه نظيفة وصحية.\",\"en\":\"WASH distributed pure water to the rural El fasher (SHAGARA) to ensure access to clean drinking water.\"}', '{\"ar\":\"بتمويل من منظمة بحر الجود للسلام والتنمية بمبلغ إجمالي قدره 500 دولار.\",\"en\":\"Funded by Jael Sea Organization for peace development with total 500 USD.\"}', '{\"ar\":\"ريف الفاشر (الشجرة)، شمال دارفور، السودان\",\"en\":\"Rural El Fasher (SHAGARA), North Darfur, Sudan\"}', '{\"ar\":\"مارس – أبريل 2024\",\"en\":\"March – April 2024\"}', '{\"ar\":\"منظمة بحر الجود للسلام والتنمية\",\"en\":\"Jael Sea Organization for Peace and Development\"}', '500 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-tint', '2026-05-25 07:14:56', '2026-05-25 07:25:57'),
(3, 37, '{\"ar\":\"حملات النظافة العامة والإصحاح البيئي\",\"en\":\"Environmental Clean-up & Sanitation Campaigns\"}', '{\"ar\":\"إجراء دورات تدريبية وإطلاق حملات تنظيف بيئية مجتمعية لتعزيز الوعي الصحي والإصحاح البيئي بمراكز الإيواء.\",\"en\":\"WASH conducted training sessions and launched environmental clean-up campaigns to promote hygiene.\"}', '{\"ar\":\"تدريب وبناء قدرات المجتمع على الإصحاح البيئي ومكافحة التلوث.\",\"en\":\"WASH conducted training through environmental clean-up campaigns.\"}', '{\"ar\":\"مراكز الإيواء وأحياء الفاشر، السودان\",\"en\":\"Shelter centers and neighborhoods in El Fasher, Sudan\"}', '{\"ar\":\"2024 – 2025\",\"en\":\"2024 – 2025\"}', '{\"ar\":\"متطوعون ومساهمات مجتمعية\",\"en\":\"Community Volunteers\"}', 'Voluntary', '{\"ar\":\"مستمر\",\"en\":\"Ongoing\"}', 'fas fa-tint', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(4, 38, '{\"ar\":\"حماية النساء والفتيات عبر الدعم النفسي والاجتماعي\",\"en\":\"Women & Girls Protection through Psychosocial Support\"}', '{\"ar\":\"تقديم خدمات الدعم النفسي والاجتماعي المتكامل لتعزيز حماية النساء والفتيات في مراكز إيواء الفاشر.\",\"en\":\"Women & Girls Protection through psychosocial support services to build resilience.\"}', '{\"ar\":\"بتمويل من مركز مستقبل النجم بمبلغ إجمالي قدره 5,000 دولار.\",\"en\":\"Funded by Star Future Center during May to July 2024 with total amount 5,000 USD.\"}', '{\"ar\":\"مركز الإيواء بالفاشر، شمال دارفور، السودان\",\"en\":\"El Fasher shelter center, North Darfur, Sudan\"}', '{\"ar\":\"مايو – يوليو 2024\",\"en\":\"May – July 2024\"}', '{\"ar\":\"مركز مستقبل النجم\",\"en\":\"Star Future Center\"}', '5,000 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-shield-alt', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(5, 38, '{\"ar\":\"تدريب وبناء القدرات في الحماية والدعم النفسي\",\"en\":\"Protection Training & Psychosocial Support\"}', '{\"ar\":\"بناء قدرات المجتمع والعاملين المحليين حول آليات تقديم الدعم النفسي والاجتماعي لتعزيز الحماية بمراكز الإيواء بالفاشر.\",\"en\":\"Protection training conducted through psychosocial support at shelter centers.\"}', '{\"ar\":\"بتمويل من منظمة أوتاش للتنمية والسلام بقيمة إجمالية بلغت 900 دولار.\",\"en\":\"Funded by Otash organization for development and peace with total amount 900 USD.\"}', '{\"ar\":\"مركز الإيواء بالفاشر، شمال دارفور، السودان\",\"en\":\"El Fasher shelter center, North Darfur, Sudan\"}', '{\"ar\":\"أكتوبر 2024\",\"en\":\"October 2024\"}', '{\"ar\":\"منظمة أوتاش للتنمية والسلام\",\"en\":\"Otash Organization for Development and Peace\"}', '900 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-shield-alt', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(6, 38, '{\"ar\":\"دعم الحماية والخدمات النفسية والاجتماعية للنازحين\",\"en\":\"Protection through Psychosocial Support\"}', '{\"ar\":\"توفير آليات الحماية والدعم النفسي والاجتماعي للأسر النازحة بمراكز الإيواء بالفاشر.\",\"en\":\"Protection through psychosocial support services to support families.\"}', '{\"ar\":\"بتمويل كريم من منظمة أبناء دارفور في سويسرا بمبلغ 1,000 دولار.\",\"en\":\"Funded by Sons of Darfur organization in Switzerland with total amount 1,000 USD.\"}', '{\"ar\":\"مركز الإيواء بالفاشر، السودان\",\"en\":\"El Fasher shelter center, Sudan\"}', '{\"ar\":\"ديسمبر 2024\",\"en\":\"December 2024\"}', '{\"ar\":\"منظمة أبناء دارفور في سويسرا\",\"en\":\"Sons of Darfur Organization in Switzerland\"}', '1,000 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-shield-alt', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(7, 38, '{\"ar\":\"تعزيز الحماية والدعم النفسي في منطقة غزن جديد\",\"en\":\"Protection through Psychosocial Support\"}', '{\"ar\":\"تقديم برامج حماية متكاملة وخدمات الدعم النفسي والاجتماعي بمناطق الفاشر (غزن جديد).\",\"en\":\"Protection through psychosocial support program for displaced communities.\"}', '{\"ar\":\"بتمويل من منظمة سيفروورلد بقيمة إجمالية قدرها 11,000 دولار.\",\"en\":\"Funded by Safer World at El Fasher (Ghazan Jadeed) with amount 11,000 USD.\"}', '{\"ar\":\"الفاشر - غزن جديد - شمال دارفور، السودان\",\"en\":\"El Fasher – Ghazan Jadeed – North Darfur, Sudan\"}', '{\"ar\":\"يناير – فبراير 2025\",\"en\":\"Jan – Feb 2025\"}', '{\"ar\":\"منظمة سيفروورلد\",\"en\":\"Safer World\"}', '11,000 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-shield-alt', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(8, 38, '{\"ar\":\"الدعم النفسي والاجتماعي بريف ومراكز إيواء الفاشر\",\"en\":\"Protection through Psychosocial Support Services\"}', '{\"ar\":\"تسيير وإطلاق جلسات وأنشطة حماية مجتمعية ودعم نفسي في ريف الفاشر ومراكز الإيواء.\",\"en\":\"Protection through psychosocial support conducted in rural areas and shelters.\"}', '{\"ar\":\"بدعم من منظمة ماما أفريقيا للخدمات الإنسانية بمبلغ إجمالي قدره 1,000 دولار.\",\"en\":\"Conducted by MAMA Africa organization for humanitarian services with total amount 1,000 USD.\"}', '{\"ar\":\"ريف الفاشر ومراكز الإيواء، السودان\",\"en\":\"El Fasher Rural area and shelter center, Sudan\"}', '{\"ar\":\"مارس 2025\",\"en\":\"March 2025\"}', '{\"ar\":\"منظمة ماما أفريقيا للخدمات الإنسانية\",\"en\":\"MAMA Africa Organization for Humanitarian Services\"}', '1,000 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-shield-alt', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(9, 38, '{\"ar\":\"الحماية والخدمات الاجتماعية للنازحين بالفاشر\",\"en\":\"Protection & Social Services Support\"}', '{\"ar\":\"تعزيز وتنسيق أنشطة الحماية والدعم النفسي والاجتماعي للنازحين داخل مراكز الإيواء بالفاشر.\",\"en\":\"Protection through psychosocial support conducted at shelter centers.\"}', '{\"ar\":\"بدعم من وزارة الشؤون الاجتماعية بقيمة إجمالية بلغت 2,000 دولار.\",\"en\":\"Conducted by the Ministry of Social Affairs with total amount 2,000 USD.\"}', '{\"ar\":\"مركز الإيواء بالفاشر، شمال دارفور، السودان\",\"en\":\"El Fasher Shelter center, North Darfur, Sudan\"}', '{\"ar\":\"مايو 2025\",\"en\":\"May 2025\"}', '{\"ar\":\"وزارة الشؤون الاجتماعية\",\"en\":\"Ministry of Social Affairs\"}', '2,000 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-shield-alt', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(10, 38, '{\"ar\":\"مشروع المساحات الآمنة للحماية ودعم سبل العيش للنساء والفتيات\",\"en\":\"Protection & Livelihood Support: Safe Space for Women & Girls\"}', '{\"ar\":\"تأسيس وتشغيل مساحات آمنة لتقديم برامج حماية متكاملة ودعم سبل كسب العيش للنساء والفتيات بالفاشر.\",\"en\":\"Protection and livelihood support project: safe space for women and girls.\"}', '{\"ar\":\"بتمويل من DTI بقيمة إجمالية قدرها 19,982 دولار.\",\"en\":\"Funded by DTI with total 19,982 USD from April to July 2025.\"}', '{\"ar\":\"الفاشر، شمال دارفور، السودان\",\"en\":\"El Fasher, North Darfur, Sudan\"}', '{\"ar\":\"أبريل – يوليو 2025\",\"en\":\"April – July 2025\"}', '{\"ar\":\"مبادرة الانتقال الديمقراطي (DTI)\",\"en\":\"Democratic Transition Initiative (DTI)\"}', '19,982 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-shield-alt', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(11, 39, '{\"ar\":\"توفير مواد الأمن الغذائي (المطابخ المشتركة والسلال الغذائية) للنازحين\",\"en\":\"Provision of Food Security Materials (Communal Kitchen & Food Baskets) to IDPs\"}', '{\"ar\":\"توفير وتوزيع مواد الأمن الغذائي بما في ذلك المطابخ المشتركة وسلال الغذاء للأسر النازحة بمراكز الإيواء بالفاشر.\",\"en\":\"Provision of food security materials (communal kitchen, foods baskets) to the IDPs.\"}', '{\"ar\":\"بتمويل من منظمة بلان السودان بقيمة إجمالية قدرها 2,000 دولار.\",\"en\":\"Funded by Plan Sudan with total of 2,000 USD.\"}', '{\"ar\":\"مركز الإيواء بالفاشر، شمال دارفور، السودان\",\"en\":\"El Fasher - Shelters center, North Darfur, Sudan\"}', '{\"ar\":\"مارس – أبريل 2024\",\"en\":\"March – April 2024\"}', '{\"ar\":\"منظمة بلان السودان\",\"en\":\"Plan Sudan\"}', '2,000 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-utensils', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(12, 39, '{\"ar\":\"تشغيل المطبخ المشترك لتعزيز الأمن الغذائي\",\"en\":\"Food Security through Communal Kitchen\"}', '{\"ar\":\"تشغيل المطابخ المشتركة لتوفير الوجبات اليومية للنازحين في مراكز الإيواء بالفاشر.\",\"en\":\"Conducted Food security through communal kitchen for displaced people in shelters.\"}', '{\"ar\":\"بتمويل من منظمة أوتاش للتنمية والسلام بقيمة إجمالية بلغت 900 دولار.\",\"en\":\"Funded by Otash organization for development and peace during Oct 2024.\"}', '{\"ar\":\"مركز الإيواء بالفاشر، شمال دارفور، السودان\",\"en\":\"El Fasher shelter center - North Darfur, Sudan\"}', '{\"ar\":\"أكتوبر 2024\",\"en\":\"October 2024\"}', '{\"ar\":\"منظمة أوتاش للتنمية والسلام\",\"en\":\"Otash Organization for Development and Peace\"}', '900 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-utensils', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(13, 39, '{\"ar\":\"المطبخ المشترك بتمويل من منظمة أبناء دارفور في سويسرا\",\"en\":\"Communal Kitchen Food Security Support\"}', '{\"ar\":\"تأمين الغذاء وتوفير الوجبات من خلال المطابخ المشتركة لدعم الأسر في مراكز الإيواء بالفاشر.\",\"en\":\"Conducted Food Security through communal kitchen at El Fasher shelter center.\"}', '{\"ar\":\"بتمويل كريم من منظمة أبناء دارفور في سويسرا بمبلغ 1,000 دولار.\",\"en\":\"Funded by sons of Darfur organization in Switzerland with total amount 1,000 USD.\"}', '{\"ar\":\"مركز الإيواء بالفاشر، السودان\",\"en\":\"El Fasher Shelter center, Sudan\"}', '{\"ar\":\"ديسمبر 2024\",\"en\":\"December 2024\"}', '{\"ar\":\"منظمة أبناء دارفور في سويسرا\",\"en\":\"Sons of Darfur Organization in Switzerland\"}', '1,000 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-utensils', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(14, 39, '{\"ar\":\"توزيع المواد الغذائية وغير الغذائية لدعم الأمن الغذائي\",\"en\":\"Distribution of Food and Non-Food Items\"}', '{\"ar\":\"تعزيز الأمن الغذائي من خلال توزيع سلال غذائية ومواد غير غذائية للنازحين في الفاشر (غزن جديد).\",\"en\":\"Reinforce Food Security through distributions of food and non-food items.\"}', '{\"ar\":\"بتمويل من منظمة سيفروورلد بقيمة إجمالية قدرها 11,000 دولار.\",\"en\":\"Funded by Safer World with total amount 11,000 USD.\"}', '{\"ar\":\"الفاشر - غزن جديد - شمال دارفور، السودان\",\"en\":\"El Fasher – Ghazan Jadeed – North Darfur, Sudan\"}', '{\"ar\":\"يناير – فبراير 2025\",\"en\":\"Jan – Feb 2025\"}', '{\"ar\":\"منظمة سيفروورلد\",\"en\":\"Safer World\"}', '11,000 USD', '{\"ar\":\"مستمر\",\"en\":\"Ongoing\"}', 'fas fa-box-open', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(15, 39, '{\"ar\":\"برنامج الدعم النقدي مقابل الغذاء\",\"en\":\"Cash for Food Assistance\"}', '{\"ar\":\"تقديم مساعدات مالية مباشرة لدعم قدرة الأسر النازحة على شراء وتأمين احتياجاتها الغذائية.\",\"en\":\"Conducted Food Security by cash for food to support displaced families.\"}', '{\"ar\":\"بدعم من منظمة ماما أفريقيا للخدمات الإنسانية بمبلغ 1,000 دولار.\",\"en\":\"Supported by MAMA Africa Organization for humanitarian services.\"}', '{\"ar\":\"مركز الإيواء بالفاشر، شمال دارفور، السودان\",\"en\":\"El Fasher Shelter center, North Darfur, Sudan\"}', '{\"ar\":\"فبراير 2025\",\"en\":\"February 2025\"}', '{\"ar\":\"منظمة ماما أفريقيا للخدمات الإنسانية\",\"en\":\"MAMA Africa Organization for Humanitarian Services\"}', '1,000 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-hand-holding-usd', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(16, 39, '{\"ar\":\"تعزيز الأمن الغذائي عبر المطابخ المشتركة بالفاشر\",\"en\":\"Reinforce Food Security through Communal Kitchen\"}', '{\"ar\":\"تعزيز الأمن الغذائي للنازحين بمراكز الإيواء بالفاشر من خلال تشغيل ودعم المطابخ المشتركة.\",\"en\":\"Reinforce Food Security through communal kitchen at El Fasher shelters.\"}', '{\"ar\":\"بتمويل من وزارة الشؤون الاجتماعية بقيمة 2,000 دولار.\",\"en\":\"Funded by Ministry of social affairs with amount of 2,000 USD.\"}', '{\"ar\":\"مركز الإيواء بالفاشر، شمال دارفور، السودان\",\"en\":\"El Fasher Shelter center, North Darfur, Sudan\"}', '{\"ar\":\"مايو – يونيو 2025\",\"en\":\"May – June 2025\"}', '{\"ar\":\"وزارة الشؤون الاجتماعية\",\"en\":\"Ministry of Social Affairs\"}', '2,000 USD', '{\"ar\":\"مستمر\",\"en\":\"Ongoing\"}', 'fas fa-utensils', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(17, 40, '{\"ar\":\"إعادة تأهيل وصيانة المدارس\",\"en\":\"School Rehabilitation & Renovation\"}', '{\"ar\":\"صيانة الفصول الدراسية المتضررة وبناء مرافق صحية للطلاب والطالبات.\",\"en\":\"Renovating damaged classrooms and building sanitation facilities for students.\"}', '{\"ar\":\"ترميم البنية التحتية التعليمية في المناطق المتضررة من النزاعات.\",\"en\":\"Restoring educational infrastructure in conflict-affected zones.\"}', '{\"ar\":\"مدارس الفاشر\",\"en\":\"El Fasher Schools\"}', '{\"ar\":\"يناير – مايو 2025\",\"en\":\"Jan – May 2025\"}', '{\"ar\":\"اليونيسف والطب الشمولي\",\"en\":\"UNICEF & Holistic Medicine\"}', '14,000 USD', '{\"ar\":\"مستمر\",\"en\":\"Ongoing\"}', 'fas fa-school', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(18, 40, '{\"ar\":\"توزيع المستلزمات والحقائب المدرسية\",\"en\":\"Educational Supplies Distribution\"}', '{\"ar\":\"توفير الحقائب المدرسية والكتب والقرطاسية والوسائل التعليمية للأطفال النازحين.\",\"en\":\"Providing school bags, books, stationery, and learning aids to displaced children.\"}', '{\"ar\":\"تجهيز الأطفال المحرومين بالحقائب والأدوات التعليمية اللازمة.\",\"en\":\"Equipping underprivileged children with necessary educational tools.\"}', '{\"ar\":\"مراكز إيواء النازحين\",\"en\":\"Displacement Centers\"}', '{\"ar\":\"سبتمبر 2024\",\"en\":\"Sep 2024\"}', '{\"ar\":\"رعاية الطفولة\",\"en\":\"Save the Children\"}', '5,800 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-book-reader', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(19, 40, '{\"ar\":\"تدريب المعلمين والتطوير المهني\",\"en\":\"Teacher Training & Professional Development\"}', '{\"ar\":\"تدريب المعلمين المحليين على أساليب التدريس التفاعلية والدعم النفسي للطلاب.\",\"en\":\"Training local educators on interactive teaching methods and psychosocial support for kids.\"}', '{\"ar\":\"رفع جودة التعليم وتقديم الرعاية الداعمة للنفسية داخل الفصول.\",\"en\":\"Enhancing educational quality and classroom trauma-informed care.\"}', '{\"ar\":\"المقر الإقليمي\",\"en\":\"Regional HQ\"}', '{\"ar\":\"أكتوبر – ديسمبر 2024\",\"en\":\"Oct – Dec 2024\"}', '{\"ar\":\"اليونسكو\",\"en\":\"UNESCO\"}', '3,200 USD', '{\"ar\":\"مستمر\",\"en\":\"Ongoing\"}', 'fas fa-chalkboard-teacher', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(20, 43, '{\"ar\":\"بناء السلام والتعايش السلمي عبر التدريب بالفاشر\",\"en\":\"Peacebuilding through Community Training\"}', '{\"ar\":\"تيسير دورات تدريبية لبناء السلام وحل النزاعات في مخيمات النازحين ومراكز الإيواء وريف الفاشر.\",\"en\":\"Conducted peacebuilding through training at IDPs camps, shelter center, and El Fasher rural area.\"}', '{\"ar\":\"بتمويل من منظمة جبل سسي للسلام والتنمية بقيمة إجمالية بلغت 500 دولار.\",\"en\":\"Funded by Jabal Sesae organization for peace and development with total of 500 USD.\"}', '{\"ar\":\"مخيمات النازحين وريف الفاشر ومراكز الإيواء، السودان\",\"en\":\"IDPs camps, shelter center, and El Fasher rural area, Sudan\"}', '{\"ar\":\"مارس 2024\",\"en\":\"March 2024\"}', '{\"ar\":\"منظمة جبل سسي للسلام والتنمية\",\"en\":\"Jabal Sesae Organization for Peace and Development\"}', '500 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-dove', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(21, 43, '{\"ar\":\"مبادرة بناء السلام وتمكين النساء والفتيات بمراكز الإيواء\",\"en\":\"Peacebuilding Promotion Initiative for Women & Girls\"}', '{\"ar\":\"إطلاق مبادرة بناء السلام وتدريب النساء والفتيات على حل النزاعات والوساطة بمراكز إيواء الفاشر.\",\"en\":\"Conducted peacebuilding promotion initiative training of women and girls in shelter centers.\"}', '{\"ar\":\"بدعم من منظمة بركتيكال أكشن بمبلغ 500 دولار.\",\"en\":\"Supported by Practical Action with amount of 500 USD.\"}', '{\"ar\":\"مركز الإيواء بالفاشر، شمال دارفور، السودان\",\"en\":\"El Fasher shelter center, North Darfur, Sudan\"}', '{\"ar\":\"أبريل 2024\",\"en\":\"April 2024\"}', '{\"ar\":\"منظمة بركتيكال أكشن (عمل عملي)\",\"en\":\"Practical Action\"}', '500 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-dove', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(22, 43, '{\"ar\":\"تدريب متطوعي بناء السلام حول مدونة السلوك\",\"en\":\"Peacebuilding Training for Volunteers (Code of Conduct)\"}', '{\"ar\":\"تدريب متطوعي بناء السلام وتأهيلهم حول مدونات السلوك وأسس العمل الإنساني والتعايش بمراكز إيواء الفاشر.\",\"en\":\"Conducted peacebuilding training for volunteers on the humanitarian code of conduct.\"}', '{\"ar\":\"بدعم من منظمة الساحل السوداني بمبلغ إجمالي قدره 500 دولار.\",\"en\":\"Supported by Sahil Sudani organization with total of 500 USD.\"}', '{\"ar\":\"مركز الإيواء بالفاشر، شمال دارفور، السودان\",\"en\":\"El Fasher shelter center, North Darfur, Sudan\"}', '{\"ar\":\"2024\",\"en\":\"2024\"}', '{\"ar\":\"منظمة الساحل السوداني\",\"en\":\"Sahil Sudani Organization\"}', '500 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-dove', '2026-05-25 07:14:56', '2026-05-25 07:14:56'),
(23, 43, '{\"ar\":\"تعزيز بناء السلام عبر الأنشطة الثقافية والاجتماعية بالفاشر\",\"en\":\"Promoting Peacebuilding through Culture & Social Activities\"}', '{\"ar\":\"تعزيز التعايش السلمي والتماسك الاجتماعي من خلال تنظيم فعاليات ثقافية وأنشطة اجتماعية بمراكز الإيواء بالفاشر.\",\"en\":\"Promoted peacebuilding and social cohesion through cultural events and social activities.\"}', '{\"ar\":\"بدعم من مركز نجوم المستقبل بقيمة إجمالية بلغت 900 دولار.\",\"en\":\"Supported by Future Stars Center with total amount of 900 USD.\"}', '{\"ar\":\"مركز الإيواء بالفاشر، شمال دارفور، السودان\",\"en\":\"El Fasher shelter center, North Darfur, Sudan\"}', '{\"ar\":\"2024\",\"en\":\"2024\"}', '{\"ar\":\"مركز نجوم المستقبل (Future Stars)\",\"en\":\"Future Stars Center\"}', '900 USD', '{\"ar\":\"مكتمل\",\"en\":\"Completed\"}', 'fas fa-dove', '2026-05-25 07:14:56', '2026-05-25 07:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Mama Africa NGO', '2026-03-06 06:51:26', '2026-03-06 06:51:26'),
(2, 'default_currency', 'USD', '2026-03-06 06:51:27', '2026-03-06 06:51:27'),
(3, 'donation_message', 'Your contribution makes a difference in the lives of many', '2026-03-06 06:51:27', '2026-03-09 00:31:38'),
(4, 'donation_hero_title_en', 'Support Our Mission', '2026-03-06 06:51:27', '2026-03-06 06:51:27'),
(5, 'donation_hero_subtitle_en', 'Your contribution directly empowers communities across Africa. Every donation makes a lasting impact.', '2026-03-06 06:51:27', '2026-03-06 06:51:27'),
(6, 'donation_form_title_en', 'Select Donation Amount', '2026-03-06 06:51:27', '2026-03-25 19:25:09'),
(7, 'donation_form_details_en', 'Your Details', '2026-03-06 06:51:27', '2026-03-25 19:25:09'),
(8, 'donation_form_payment_en', 'Select Payment Method', '2026-03-06 06:51:27', '2026-03-25 19:25:09'),
(9, 'donation_hero_title_ar', 'ادعم مهمتنا', '2026-03-06 06:51:27', '2026-03-06 06:51:27'),
(10, 'donation_hero_subtitle_ar', 'مساهمتك تمكن المجتمعات في جميع أنحاء أفريقيا بشكل مباشر. كل تبرع يحدث تأثيراً دائماً.', '2026-03-06 06:51:27', '2026-03-06 06:51:27'),
(11, 'donation_form_title_ar', 'اختر قيمة التبرع', '2026-03-06 06:51:27', '2026-03-25 19:25:09'),
(12, 'donation_form_details_ar', 'بياناتك', '2026-03-06 06:51:27', '2026-03-25 19:25:09'),
(13, 'donation_form_payment_ar', 'اختر طريقة الدفع', '2026-03-06 06:51:27', '2026-03-25 19:25:09'),
(14, 'enable_stripe', '0', '2026-03-06 08:03:28', '2026-03-09 00:31:38'),
(15, 'stripe_secret', '09876543', '2026-03-06 08:03:28', '2026-03-06 08:03:28'),
(16, 'flutterwave_secret', NULL, '2026-03-06 08:03:28', '2026-03-06 08:03:28'),
(17, 'enable_paystack', '0', '2026-03-06 08:03:28', '2026-03-09 00:31:38'),
(18, 'paystack_secret', '0987654', '2026-03-06 08:03:28', '2026-03-06 08:03:28'),
(19, 'enable_flutterwave', '0', '2026-03-06 08:29:17', '2026-03-06 08:29:17'),
(20, 'site_name_en', 'Mama Africa NGO', '2026-03-25 19:13:25', '2026-03-25 19:13:25'),
(21, 'site_name_ar', 'Mama Africa Arabic', '2026-03-25 19:13:25', '2026-03-25 19:13:25'),
(22, 'donation_message_en', 'Your contribution makes a difference in the lives of many', '2026-03-25 19:13:25', '2026-03-25 19:13:25'),
(23, 'donation_message_ar', 'Thank you for your donation Arabic', '2026-03-25 19:13:25', '2026-03-25 19:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cleanwater_value` varchar(255) DEFAULT NULL,
  `cleanwater_text_ar` varchar(255) DEFAULT NULL,
  `cleanwater_text_en` varchar(255) DEFAULT NULL,
  `education_value` varchar(255) DEFAULT NULL,
  `education_text_ar` varchar(255) DEFAULT NULL,
  `education_text_en` varchar(255) DEFAULT NULL,
  `villages_value` varchar(255) DEFAULT NULL,
  `villages_text_ar` varchar(255) DEFAULT NULL,
  `villages_text_en` varchar(255) DEFAULT NULL,
  `funds_value` varchar(255) DEFAULT NULL,
  `funds_text_ar` varchar(255) DEFAULT NULL,
  `funds_text_en` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `cleanwater_value`, `cleanwater_text_ar`, `cleanwater_text_en`, `education_value`, `education_text_ar`, `education_text_en`, `villages_value`, `villages_text_ar`, `villages_text_en`, `funds_value`, `funds_text_ar`, `funds_text_en`, `created_at`, `updated_at`) VALUES
(1, '16,000+', 'أشخاص تم توفير مياه نظيفة لهم', 'People Provided Clean Water', '8,500+', 'أطفال يتلقون التعليم', 'Children Receiving Education', '42+', 'قرى تم دعمها', 'Villages Supported', '$2.1M+', 'تم توجيه الأموال إلى دارفور', 'Funds Deployed to Darfur', '2026-03-26 12:55:53', '2026-03-26 12:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `team_settings`
--

CREATE TABLE `team_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `desc_en` text DEFAULT NULL,
  `desc_ar` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_settings`
--

INSERT INTO `team_settings` (`id`, `title_en`, `title_ar`, `desc_en`, `desc_ar`, `created_at`, `updated_at`) VALUES
(1, 'Our Team Members', 'أعضاء فريقنا', 'Dedicated organizers and team members of Mama African, supporting communities through humanitarian work.', 'منظمون وأعضاء فريق متفانون في ماما أفريكا، يدعمون المجتمعات من خلال العمل الإنساني.', '2026-03-01 12:32:25', '2026-03-01 12:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `comment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `comment`, `image`, `video_link`, `created_at`, `updated_at`) VALUES
(9, '{\"ar\":\"إسحق أبكر هارون\",\"en\":\"Isaac Abkar Harun\"}', '{\"ar\":\"\\\"لم نكن نعرف الطريقة الصحيحة لاستخدام أقراص الكلور لتنقية المياه بالكمية المحددة (0.33)، والآن أصبحنا مطمئنين أكثر لصحة أسرنا بعد هذه التجربة العملية.\\\"\",\"en\":\"We did not know the correct way to use chlorine tablets to purify water in the specified amount (0.33), and now we feel more reassured about the health of our families after this practical experience.\"}', 'testimonials/69f1aeb523667.jpeg', NULL, '2026-02-19 08:10:41', '2026-04-29 07:09:41'),
(10, '{\"ar\":\"كلتوم محمد أبكر\",\"en\":\"Kaltoum Mohamed Abkar\"}', '{\"ar\":\"\\\"غنينا أغاني من تراثنا في دارفور، وهذا جعلنا نشعر بالأمان والارتباط بمكاننا. الغناء هو الذي جعل اليوم الترفيهي مميزاً.\\\"\",\"en\":\"We sang songs from our heritage in Darfur, and this made us feel safe and connected to our place. Singing is what made the recreational day special.\"}', 'testimonials/69f1ade66dc25.jpeg', NULL, '2026-02-22 12:48:47', '2026-04-29 07:06:14'),
(11, '{\"ar\":\"حواء أدم سليمان.\",\"en\":\"Eve Adam Suleiman.\"}', '{\"ar\":\"\\\"هذه الجركانات والصابون جاءت في وقتها تماماً، لكننا نحتاج لمصادر مياه قريبة، فرحلتنا لجلب المياه شاقة جداً ونأمل أن تتوفر صهاريج مياه مستمرة داخل المعسكر.\",\"en\":\"These jerrycans and soap arrived at the perfect time, but we need nearby water sources; our trip to fetch water is very exhausting, and we hope that continuous water tankers will be available inside the camp.\"}', 'testimonials/69f1abc30acea.jpeg', NULL, '2026-02-25 21:14:15', '2026-04-29 06:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `transparencies`
--

CREATE TABLE `transparencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(255) NOT NULL DEFAULT 'Transparency & Impact',
  `title_ar` varchar(255) NOT NULL DEFAULT 'الشفافية والأثر',
  `desc_en` text DEFAULT NULL,
  `desc_ar` text DEFAULT NULL,
  `show_counter_values` tinyint(1) NOT NULL DEFAULT 1,
  `report_url` varchar(255) DEFAULT NULL,
  `report_file` varchar(255) DEFAULT NULL,
  `report_mode` enum('download','view') NOT NULL DEFAULT 'download',
  `counter1_value` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `counter1_label_en` varchar(255) NOT NULL DEFAULT 'Program 1',
  `counter1_label_ar` varchar(255) NOT NULL DEFAULT 'برنامج 1',
  `counter2_value` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `counter2_label_en` varchar(255) NOT NULL DEFAULT 'Program 2',
  `counter2_label_ar` varchar(255) NOT NULL DEFAULT 'برنامج 2',
  `counter3_value` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `counter3_label_en` varchar(255) NOT NULL DEFAULT 'Program 3',
  `counter3_label_ar` varchar(255) NOT NULL DEFAULT 'برنامج 3',
  `counter4_value` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `counter4_label_en` varchar(255) NOT NULL DEFAULT 'Program 4',
  `counter4_label_ar` varchar(255) NOT NULL DEFAULT 'برنامج 4',
  `counter5_value` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `counter5_label_en` varchar(255) NOT NULL DEFAULT 'Program 5',
  `counter5_label_ar` varchar(255) NOT NULL DEFAULT 'برنامج 5',
  `counter6_value` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `counter6_label_en` varchar(255) NOT NULL DEFAULT 'Program 6',
  `counter6_label_ar` varchar(255) NOT NULL DEFAULT 'برنامج 6',
  `counter7_value` int(11) NOT NULL DEFAULT 0,
  `counter7_label_en` varchar(255) DEFAULT NULL,
  `counter7_label_ar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `financial_programs` int(11) NOT NULL DEFAULT 85,
  `financial_operations` int(11) NOT NULL DEFAULT 10,
  `financial_admin` int(11) NOT NULL DEFAULT 5,
  `percentage_clean_water` int(11) NOT NULL DEFAULT 30,
  `percentage_training` int(11) NOT NULL DEFAULT 30,
  `percentage_nutrition` int(11) NOT NULL DEFAULT 20,
  `percentage_environment` int(11) NOT NULL DEFAULT 12,
  `percentage_peace_building` int(11) NOT NULL DEFAULT 0,
  `percentage_healthcare` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transparencies`
--

INSERT INTO `transparencies` (`id`, `title_en`, `title_ar`, `desc_en`, `desc_ar`, `show_counter_values`, `report_url`, `report_file`, `report_mode`, `counter1_value`, `counter1_label_en`, `counter1_label_ar`, `counter2_value`, `counter2_label_en`, `counter2_label_ar`, `counter3_value`, `counter3_label_en`, `counter3_label_ar`, `counter4_value`, `counter4_label_en`, `counter4_label_ar`, `counter5_value`, `counter5_label_en`, `counter5_label_ar`, `counter6_value`, `counter6_label_en`, `counter6_label_ar`, `counter7_value`, `counter7_label_en`, `counter7_label_ar`, `created_at`, `updated_at`, `financial_programs`, `financial_operations`, `financial_admin`, `percentage_clean_water`, `percentage_training`, `percentage_nutrition`, `percentage_environment`, `percentage_peace_building`, `percentage_healthcare`) VALUES
(1, 'report 2026', 'تقرير 2026', 'comperhansive', 'شامل', 0, NULL, 'reports/fPyRcVj1jY7C76Or8g3TNMQpcMyONep0dObXc5UR.pdf', 'view', 11, 'Education', 'التعليم', 22, 'Water Sanitation', 'إصحاح المياه', 33, 'Protection', 'الحماية', 44, 'Livelihoods', 'سبل كسب العيش', 55, 'Healthcare', 'الرعاية الصحية', 66, 'Food Security', 'الأمن الغذائي', 120, 'Peace Building', 'بناء السلام', '2026-03-01 06:10:32', '2026-05-06 14:21:56', 90, 4, 6, 25, 20, 15, 10, 10, 15);

-- --------------------------------------------------------

--
-- Table structure for table `transparency_funding_sources`
--

CREATE TABLE `transparency_funding_sources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_en` varchar(255) NOT NULL,
  `category_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transparency_funding_sources`
--

INSERT INTO `transparency_funding_sources` (`id`, `category_en`, `category_ar`, `name_en`, `name_ar`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'UN Agencies', 'وكالات الأمم المتحدة', 'UNICEF', 'اليونيسف (UNICEF)', 'fa-child-reaching', '2026-05-24 06:42:12', '2026-05-24 06:50:37'),
(2, 'UN Agencies', 'وكالات الأمم المتحدة', 'WHO', 'منظمة الصحة العالمية (WHO)', 'fa-hand-holding-medical', '2026-05-24 06:42:12', '2026-05-24 06:42:12'),
(3, 'INGOs', 'المنظمات غير الحكومية الدولية', 'Plan International', 'منظمة بلان إنترناشيونال', 'fa-hands-holding', '2026-05-24 06:42:12', '2026-05-24 06:42:12'),
(4, 'INGOs', 'المنظمات غير الحكومية الدولية', 'COOPI', 'منظمة كوبر (COOPI)', 'fa-handshake-angle', '2026-05-24 06:42:12', '2026-05-24 06:42:12'),
(5, 'INGOs', 'المنظمات غير الحكومية الدولية', 'Save the Children', 'منظمة رعاية الطفولة', 'fa-children', '2026-05-24 06:42:12', '2026-05-24 06:42:12'),
(6, 'INGOs', 'المنظمات غير الحكومية الدولية', 'Safer World', 'سيفروورلد', 'fa-shield-heart', '2026-05-24 06:42:12', '2026-05-24 06:42:12'),
(7, 'Membership Support', 'دعم الأعضاء', 'Sons of Darfur in Switzerland', 'أبناء دارفور في سويسرا', 'fa-people-group', '2026-05-24 06:42:12', '2026-05-24 06:42:12'),
(8, 'Membership Support', 'دعم الأعضاء', 'MAO Membership', 'عضوية منظمة ماما أفريكا', 'fa-id-card', '2026-05-24 06:42:12', '2026-05-24 06:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `transparency_partnerships`
--

CREATE TABLE `transparency_partnerships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_en` varchar(255) NOT NULL,
  `category_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transparency_partnerships`
--

INSERT INTO `transparency_partnerships` (`id`, `category_en`, `category_ar`, `name_en`, `name_ar`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Local NGOs', 'المنظمات غير الحكومية المحلية', 'Jabal  Sae Organization for Peace and Development', 'منظمة جبل ساعي للسلام والتنمية', 'fa-dove', '2026-05-24 07:26:49', '2026-05-24 08:46:43'),
(2, 'Local NGOs', 'المنظمات غير الحكومية المحلية', 'Future Stars Centre', 'مركز نجوم المستقبل', 'fa-star', '2026-05-24 07:26:49', '2026-05-24 07:26:49'),
(3, 'Local NGOs', 'المنظمات غير الحكومية المحلية', 'Holistic Medicine Social Affairs', 'شؤون الطب الشمولي الاجتماعية', 'fa-notes-medical', '2026-05-24 07:26:49', '2026-05-24 07:26:49'),
(4, 'Local NGOs', 'المنظمات غير الحكومية المحلية', 'Tabasheer', 'تباشير', 'fa-sun', '2026-05-24 07:26:49', '2026-05-24 07:26:49'),
(5, 'Government & Local Institutions', 'المؤسسات الحكومية والمحلية', 'Ministry of Social Affairs', 'وزارة الشؤون الاجتماعية', 'fa-users', '2026-05-24 07:26:49', '2026-05-24 07:26:49'),
(6, 'Government & Local Institutions', 'المؤسسات الحكومية والمحلية', 'Ministry of Health', 'وزارة الصحة', 'fa-hospital', '2026-05-24 07:26:49', '2026-05-24 07:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `transparency_reports`
--

CREATE TABLE `transparency_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transparency_reports`
--

INSERT INTO `transparency_reports` (`id`, `title_en`, `title_ar`, `year`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'Report 2023', 'تقرير 2023', 2023, 'reports/8x7EXyUWD0e9RGz1hXJ0H15uth7MG0WOoW5a8jk2.pdf', '2026-03-13 09:25:51', '2026-03-26 13:43:15'),
(2, 'report 2024', 'تقرير 2024', 2024, 'reports/UQ0KmcunOGtjEIMtdjDqOKk6edbphQ0nPsZe2OaN.pdf', '2026-03-26 13:42:14', '2026-03-26 13:42:14');

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
  `original_password` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'employee',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `security_question` varchar(255) DEFAULT NULL,
  `security_answer` varchar(255) DEFAULT NULL,
  `security_question_2` varchar(255) DEFAULT NULL,
  `security_answer_2` varchar(255) DEFAULT NULL,
  `security_question_3` varchar(255) DEFAULT NULL,
  `security_answer_3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `original_password`, `role`, `remember_token`, `created_at`, `updated_at`, `security_question`, `security_answer`, `security_question_2`, `security_answer_2`, `security_question_3`, `security_answer_3`) VALUES
(1, 'admin', 'admin@test.com', NULL, '$2y$12$Yak8nKDN6AqdBaZycuJAQ.P0T0Q2YlhgYErVwclQkYXUTauI9R9oi', '123456@7', 'admin', NULL, '2026-02-21 17:21:43', '2026-03-26 17:11:16', 'first_pet', '$2y$12$Kb4bCs84Xi5UYmmegNpboOFcLcGah23j/1I/RIiJEA23yuMWySdPS', 'childhood_hero', '$2y$12$S9HJsc.IdjlVz.aWAaB3yOInXtoHgtHFTInMibdoyYiDIF7/WqoPW', 'favorite_teacher', '$2y$12$tBa/oRgbrMAi8wSpsR..HuJ5HOyVZhxrjXAlPLeELUedDG.T4D2Pa'),
(2, 'Rayan', 'ryanhazem27@gmail.com', NULL, '$2y$12$Fa3VDFDjK8gx.ETUvb3nguEydYovP/39EdinA/3auVv48/vVLurqS', 'Rayan123', 'employee', NULL, '2026-02-21 17:24:10', '2026-04-25 06:50:11', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Ahmed Ali', 'ahmedaliustit@gmail.com', NULL, '$2y$12$poGmTbmqfcuTk1J9hQJPwe6kKiYJ3QNb8CtOomB31I/uYfvSYXING', 'password', 'employee', NULL, '2026-02-26 05:46:21', '2026-02-26 08:06:39', 'first_pet', '$2y$12$0C4kA3s0NTJVrfB3k3RXo.WCHD8za7I35fatETnz3i1Gi5uq9miSu', 'mother_maiden', '$2y$12$.Wd4uacmssgnraf23hC03.woEaIa2t4RsT33SV6DC.SGA7Lgbk/J.', 'first_car', '$2y$12$IgFRem4s1sGhpH8HHDClCu.7sKPfk6CRfHt3vWkvJsmdHkWZGL.xm'),
(4, 'Qasim', 'qasim@gmail.com', NULL, '$2y$12$wB0nR2OSMGa16QvBwZZZ7uofOfs/9MKScaaiP/BuChoNQSxrXRXNS', 'Qasim$20£20', 'employee', NULL, '2026-04-25 06:58:27', '2026-04-25 06:58:27', 'first_pet', '$2y$12$NyD69mhoEj6A6PxmAuFmrOeLwCgpWHJBfmiJwHG0Sew5keW8yPCAq', 'mother_maiden', '$2y$12$Pwu3XeafMa0J4KU3mPfP4uUwrnYQ2yD2HWDuSmAYUz7.if0WbTIbO', 'childhood_hero', '$2y$12$k/.TLwSez/D9JbHnkxeJBeIwYt9pnE8zUltSXTGYUfLdqAmO080/G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legal_contents`
--
ALTER TABLE `legal_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_audit_logs`
--
ALTER TABLE `location_audit_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_settings`
--
ALTER TABLE `location_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_items`
--
ALTER TABLE `profile_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_settings`
--
ALTER TABLE `profile_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_activities`
--
ALTER TABLE `project_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_activities_project_id_foreign` (`project_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_settings`
--
ALTER TABLE `team_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transparencies`
--
ALTER TABLE `transparencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transparency_funding_sources`
--
ALTER TABLE `transparency_funding_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transparency_partnerships`
--
ALTER TABLE `transparency_partnerships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transparency_reports`
--
ALTER TABLE `transparency_reports`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `location_settings`
--
ALTER TABLE `location_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profile_items`
--
ALTER TABLE `profile_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `profile_settings`
--
ALTER TABLE `profile_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `project_activities`
--
ALTER TABLE `project_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transparency_funding_sources`
--
ALTER TABLE `transparency_funding_sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transparency_partnerships`
--
ALTER TABLE `transparency_partnerships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transparency_reports`
--
ALTER TABLE `transparency_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_activities`
--
ALTER TABLE `project_activities`
  ADD CONSTRAINT `project_activities_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
