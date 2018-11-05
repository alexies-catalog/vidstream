-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 20, 2018 at 09:43 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mfi-4`
--

-- --------------------------------------------------------

--
-- Table structure for table `appearances`
--

CREATE TABLE `appearances` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appearances`
--

INSERT INTO `appearances` (`id`, `logo_url`, `about`, `fb_link`, `tw_link`, `insta_link`, `gmail_link`, `created_at`, `updated_at`) VALUES
(1, 'mfilogo.png', '<p style=\"text-align: justify;\">Since it was established in 1979, the Mowelfund Film Institute (MFI) has immensely contributed to producing quality films and educating filmmakers that cater to the constant development of local cinema. MFI is one of the major programs under Movie Workers Welfare Foundation, Inc. (MOWELFUND) that conducts trainings and workshops not just for filmmakers, but for people (actors, producers, film enthusiasts) who are interested in entering the film industry.</p>\r\n<p style=\"text-align: justify;\">Even in the early years of its operation, MFI has proudly dedicated it’s time on improving film education that brings emphasis on building the creativity and uniqueness of each of its students. Various acclaimed local and foreign lecturers are constantly invited to conduct seminars and workshops which entice filmmakers, film enthusiasts, and various students from different universities to attend.</p>\r\n<p style=\"text-align: justify;\">A number of notable alumni who have entered reputable film festivals and have taken home prestigious awards include Raymond Red, Brillante Mendoza, Lav Diaz and more.</p>\r\n<p style=\"text-align: justify;\">Aside from workshops and training in film making, MFI also has a library that keeps vital data on the Philippine movie industry and its other forms. Its archive contains the largest collection of short films, classics and other artifacts that are truly rare and beyond price.</p>\r\n<p style=\"text-align: justify;\">With the hopes of uplifting the state of the local cinema, MFI proudly teaches its students to produce films that are of relevance from which they could freely voice out their opinions on significant issues as well as to accentuate the importance of creating art through compelling stories that would turn into eye-opening films.</p>', 'https://facebook.com', 'https://twitter.com', 'https://instagram.com', 'https://google.com', '2018-09-10 20:03:31', '2018-09-18 23:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Animation', 'animation', '2018-09-10 20:03:29', '2018-09-10 20:03:29'),
(2, 'Documentary', 'documentary', '2018-09-10 20:03:29', '2018-09-10 20:03:29'),
(3, 'Features', 'features', '2018-09-10 20:03:29', '2018-09-11 22:47:59'),
(4, 'Experimental', 'experimental', '2018-09-11 22:47:48', '2018-09-11 22:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `category_film`
--

CREATE TABLE `category_film` (
  `id` int(10) UNSIGNED NOT NULL,
  `film_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_film`
--

INSERT INTO `category_film` (`id`, `film_id`, `category_id`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 3),
(4, 4, 3),
(5, 7, 3),
(6, 9, 3),
(7, 10, 2),
(8, 10, 3),
(9, 11, 3),
(10, 13, 3),
(11, 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `contactusforms`
--

CREATE TABLE `contactusforms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactusforms`
--

INSERT INTO `contactusforms` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Alexies', 'ialexies@gmail.com', 'helli', '2018-09-11 21:41:06', '2018-09-11 21:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `affiliates` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `name`, `slug`, `description`, `affiliates`, `img`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dr. Hailey Gusikowski', 'dr-hailey-gusikowski', 'Libero facere ut voluptas ducimus adipisci aperiam adipisci velit. Consequatur quae sed numquam ducimus sit hic. Nisi voluptatibus quas atque suscipit repellat. Iste numquam voluptate sunt placeat.', 'hotmail.com', 'Ayden.jpg', '2018-09-10 20:03:33', '2018-09-10 20:03:33', NULL),
(2, 'Kennith Romaguera II', 'kennith-romaguera-ii', 'A suscipit beatae voluptatem facere magnam excepturi incidunt esse. Et facere voluptatem qui sit. Totam minima consequatur non animi quo. Dolor dolorem incidunt voluptatem rerum non.', 'yahoo.com', 'Eden.jpg', '2018-09-10 20:03:33', '2018-09-10 20:03:33', NULL),
(3, 'Nadia Dickens', 'nadia-dickens', 'Iste sunt in animi velit. Atque deserunt et eaque voluptatem tempora et magnam. Recusandae ea autem nulla. Iste ab voluptas occaecati et earum libero aspernatur.', 'yahoo.com', 'Jessica.jpg', '2018-09-10 20:03:33', '2018-09-10 20:03:33', NULL),
(4, 'Crawford Gaylord', 'crawford-gaylord', 'Iure modi commodi voluptatum voluptatem ea libero. Natus nihil error explicabo exercitationem voluptatum. Molestiae maxime nulla quis animi in atque ad.', 'yahoo.com', 'Loy.jpg', '2018-09-10 20:03:34', '2018-09-10 20:03:34', NULL),
(5, 'Dr. Russ Waters Jr.', 'dr-russ-waters-jr', 'Natus sit quo tenetur unde non sed ad. Aut illo tempora magnam beatae magni consequatur.', 'hotmail.com', 'Magdalena.jpg', '2018-09-10 20:03:34', '2018-09-10 20:03:34', NULL),
(6, 'Dr. Roxanne Torp I', 'dr-roxanne-torp-i', 'Nisi sunt error autem dignissimos qui deserunt. Cupiditate porro quia sit excepturi. Quidem impedit temporibus placeat inventore et dolor. Eaque animi ullam omnis perspiciatis.', 'yahoo.com', 'Mariela.jpg', '2018-09-10 20:03:34', '2018-09-10 20:03:34', NULL),
(7, 'Dr. Wilber Cummerata', 'dr-wilber-cummerata', 'Magnam consectetur similique qui quisquam. Sit sit est dolorum alias maiores omnis. Eos vitae quo placeat. Veritatis autem corrupti voluptate dolores.', 'hotmail.com', 'Lucienne.jpg', '2018-09-10 20:03:34', '2018-09-10 20:03:34', NULL),
(8, 'Prof. Tabitha Lang', 'prof-tabitha-lang', 'Quisquam quidem autem vel ea qui eveniet sint voluptatem. Doloribus dicta ut voluptatem corrupti error voluptatem. At blanditiis quasi impedit quisquam nihil quisquam voluptatem accusantium.', 'yahoo.com', 'Edwin.jpg', '2018-09-10 20:03:34', '2018-09-10 20:03:34', NULL),
(9, 'Columbus Stroman', 'columbus-stroman', 'Expedita dolor a ea rerum aperiam qui. Quae accusamus vitae ea voluptatem eaque qui odio. Culpa et mollitia quas minus quia et in.', 'hotmail.com', 'Jillian.jpg', '2018-09-10 20:03:35', '2018-09-10 20:03:35', NULL),
(10, 'Matilda Rowe', 'matilda-rowe', 'Et voluptatem rerum natus vitae fugiat ad laudantium. Rerum voluptatibus ut dolorum quasi veritatis id. Quia quasi quia ut magni quam eum est. Facilis maiores laboriosam iste mollitia.', 'yahoo.com', 'Era.jpg', '2018-09-10 20:03:35', '2018-09-10 20:03:35', NULL),
(11, 'Rosalinda O\'Keefe', 'rosalinda-o-keefe', 'Laborum ea non aut nam et ratione ut esse. Culpa nesciunt et quibusdam ut sint perferendis. Illum sed nihil provident illum saepe voluptatem molestiae. Et consectetur iure aut natus sed qui.', 'hotmail.com', 'Alfonzo.jpg', '2018-09-10 20:03:35', '2018-09-10 20:03:35', NULL),
(12, 'Janessa Powlowski', 'janessa-powlowski', 'Voluptates doloremque nam earum neque qui vel. Ipsum magnam quaerat dolor quod. Nam soluta deserunt quia ratione nisi id. Architecto earum ut ut illum.', 'yahoo.com', 'Eloy.jpg', '2018-09-10 20:03:36', '2018-09-10 20:03:36', NULL),
(13, 'Nicholaus Tillman', 'nicholaus-tillman', 'Nihil voluptate molestiae vel repellat odit. Ea est iste accusamus nobis aliquid magnam. Nam dolores voluptates quo.', 'gmail.com', 'Tyra.jpg', '2018-09-10 20:03:36', '2018-09-10 20:03:36', NULL),
(14, 'Mustafa West', 'mustafa-west', 'Non voluptatem ut aut alias voluptatem. Corporis omnis saepe quo officiis eos. Et quod et saepe. Omnis explicabo dolore ut totam facilis nam.', 'hotmail.com', 'Gisselle.jpg', '2018-09-10 20:03:36', '2018-09-10 20:03:36', NULL),
(15, 'Mr. Keshawn Hansen IV', 'mr-keshawn-hansen-iv', 'Fugit animi voluptatum natus facere. Quia quia doloribus sunt consequatur ut. Dolor culpa perferendis est est sint eum. Nisi ratione quia beatae asperiores enim ad.', 'gmail.com', 'Ulises.jpg', '2018-09-10 20:03:36', '2018-09-10 20:03:36', NULL),
(16, 'Jeanne Ward', 'jeanne-ward', 'Voluptates vel voluptates aut voluptas fugiat ea. Minima itaque aut est ut consectetur et dolore.', 'hotmail.com', 'Afton.jpg', '2018-09-10 20:03:37', '2018-09-10 20:03:37', NULL),
(17, 'Jay Macejkovic', 'jay-macejkovic', 'Ab quia dolor deleniti. Aut earum officia ex. Doloribus commodi natus qui ut et vero porro neque.', 'gmail.com', 'Celestine.jpg', '2018-09-10 20:03:37', '2018-09-10 20:03:37', NULL),
(18, 'Lavada Berge', 'lavada-berge', 'Quisquam animi ad sed eligendi. Vero et suscipit est rerum quis totam voluptatum. Perferendis et occaecati temporibus rerum labore.', 'hotmail.com', 'Brooke.jpg', '2018-09-10 20:03:37', '2018-09-10 20:03:37', NULL),
(19, 'Hilbert Jones', 'hilbert-jones', 'Perspiciatis et nesciunt impedit saepe voluptate. Delectus eum animi minima quis nihil molestiae.', 'yahoo.com', 'Joanie.jpg', '2018-09-10 20:03:37', '2018-09-10 20:03:37', NULL),
(20, 'Lavern Boyle', 'lavern-boyle', 'Velit ea quia repellendus ipsa minima enim enim. Voluptas commodi sit ipsam rerum voluptate. Quo tempora molestiae quia voluptate odit et repudiandae.', 'gmail.com', 'Ubaldo.jpg', '2018-09-10 20:03:37', '2018-09-10 20:03:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `event_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `event_date`, `created_at`, `updated_at`) VALUES
(1, 'Birthday ni Alexies', 'magpapakatay ako ng litson', '2018-09-16', '2018-09-10 20:15:18', '2018-09-10 20:15:18'),
(2, 'MFI Alumni General Assembly', 'fkjsalfj fdskfjalfjkslfjd', '2018-09-15', '2018-09-11 21:38:27', '2018-09-11 21:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `runningtime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yearfinish` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `award` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `synopsis` text COLLATE utf8mb4_unicode_ci,
  `youtube_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `title`, `slug`, `runningtime`, `yearfinish`, `award`, `photo`, `synopsis`, `youtube_url`, `views`, `created_at`, `updated_at`) VALUES
(2, 'DOON SA KABILA NG BULKAN (TRAILER ONLY)', 'doon-sa-kabila-ng-bulkan-trailer-only', '0:00:36 seconds', '1997', '1st Prize Winner - Film Animation (GAWAD CCP 1997)', '1536722471Doon sa Kabila ng Buwan.png', NULL, 'https://youtube.com/embed/ECwFoYlxdKo', NULL, '2018-09-11 18:30:07', '2018-09-16 22:56:58'),
(3, 'AGOSTO 9', 'agosto-9', '06:00 min.', '1994', '3rd Prize, Experimental Video Category; 8th Gawad CCP Para sa Alternatibong Pelikula at Video (1994)', '1536724587AGOSTO 9.png', 'An expressionistic story of a soldier’s lament as he lies on his hospital bed 50 years after the Second World War.', 'https://youtube.com/embed/NT8FkoPjycY', NULL, '2018-09-11 18:38:03', '2018-09-16 22:56:41'),
(4, 'LUWAL, PAG-IBIG AT PAALAM', 'luwal-pag-ibig-at-paalam', '12:17 min.', '1991', 'HONORABLE MENTION, EXPERIMENTAL VIDEO CATEGORY, 5TH GAWAD CCP PARA SA ALTERNATIBONG PELIKULA AT', '1536724556Luwal.png', 'THEMES OF BIRTH, LOVE AND DEATH DIVIDED INTO THREE EQUAL PARTS. EACH ARTIST IS GIVEN FREE REIGN TO EXPLORE THE THEME ASSIGNED TO HIM, AND EACH CONNECTS A VIGNETTE FROM HIS THEME IN ANSWER TO THAT OF ANOTHER TO CREATE WHAT CAN BE TERMED AS A “VISUAL RENGA.”', 'https://youtube.com/embed/DOiyUhK9tlg', NULL, '2018-09-11 18:40:05', '2018-09-16 22:53:53'),
(5, 'UNOS', 'unos', '15:00 min.', '1995', NULL, '1536724537UNOS 1.jpg', 'A fragmentary tale of an 8-years old boy who feels the loss of his father as Martial Law is declared. Through images of macabre and violence we see the world of a child caught in war.', 'https://youtube.com/embed/RmFrWucw700', NULL, '2018-09-11 18:42:31', '2018-09-16 22:54:05'),
(6, 'MOTHER IGNACIA (ANG ULIRAN)', 'mother-ignacia-ang-uliran', '01:40:00 hr.', '1998', 'Best Screenplay: Nick Deocampo & Chuck Escasa, Young Critics Circle, 2000\r\nBest Performers: Monalisa, Sandy Andolong, Gina Alajar\r\nBest Actress Nominee (Monalisa), URIAN', '1536724519mother ignacia col.jpg', 'A community of native women in the 17th century colonial Philippines struggles to attain religious freedom during the past three hundred years. The founder of this community is Ignacia del Espiritu Santo, a Chinese mestiza from Binondo. Against the will of the King of Spain and with little support from church authorities, these women stand for what they believe in and defy any attempt to stifle their desire to serve God.', 'https://youtube.com/embed/3jmeb0uXli8', NULL, '2018-09-11 18:45:29', '2018-09-16 22:54:17'),
(7, 'MINSAN ISANG PANAHON', 'minsan-isang-panahon', '05:00 min.', '1990', 'Honorable Mention, Experimental Film Category, 4th Gawad CCP Para sa Alternatibong Pelikula at Video (1990)', '1536722318Minsan Isang Panahon.png', 'An experiment using old Super-8 home movies transferred to 16mm using an optical printer.', 'https://youtube.com/embed/Z5DN1blhdBI', NULL, '2018-09-11 18:48:43', '2018-09-16 22:54:52'),
(8, 'A STUDY FOR \"THE SKIES\"', 'a-study-for-the-skies', '08:20 min.', '1989', 'Best Short Feature Film, 13th Gawad Urian (1989)', '1536722531A STUDY FOR THE SKIES.png', 'A man’s struggle to reach the heavens.', 'https://youtube.com/embed/tjcIoU4uOQc', NULL, '2018-09-11 18:51:20', '2018-09-16 22:55:12'),
(9, 'PELIKULA', 'pelikula', '05:00 min.', '1985', 'Best 25 Super-8 Films, The Quezon City International Super-8 Film Festival (1990)', '1536722590pelikula.jpg', 'An experiment in light, sound, shadow, flicker and the “persistence of vision.”', 'https://youtube.com/embed/rNXbsMbZCkw', NULL, '2018-09-11 18:52:53', '2018-09-16 22:55:22'),
(10, 'SA MAYNILA', 'sa-maynila', '06:20 min', '1989', 'Honorable Mention, The Asean Young Cinema Festival - Tokyo, Japan (1992)\r\nBest Student Documentary, 8th FAP Awards for Distinguished Achievement During 1989 (1990).\r\nSpecial Jury Prize, Documentary Film Category, 3rd Gawad CCP Para sa Alternatibong Pelikula at Video (1989)', '1536725201sa maynila.jpg', 'An impressionistic portrait of a Philippine metropolis', 'https://youtube.com/embed/o85aCul3w5g', NULL, '2018-09-11 18:55:20', '2018-09-16 22:55:45'),
(11, 'JUAN GAPANG', 'juan-gapang', '06:00 min.', '1987', 'Best 25 Super-8 Films, The Quezon City International Super-8 Film Festival (1990)\r\nBest Experimental Film, 12th Gawad Urian (1988)\r\n3rd Prize, Experimental Film Category, 2nd CCP Independent Cinema & Video Competition (1988)', '1536722631juan gapang.jpg', 'A man performs by crawling into the streets of Metro Manila wearing only a wig, white tights, and white body paint.', 'https://youtube.com/embed/X2r11YXIRzk', NULL, '2018-09-11 18:57:17', '2018-09-16 22:55:58'),
(12, 'MIX ONE AND TWO', 'mix-one-and-two', '06:00 min.', '1990', NULL, '1536724785Untitled.png', 'A serene but critical look at what indiscriminate urbanization has done to the natural environment.', 'https://youtube.com/embed/I_Ri9tsvZWA', NULL, '2018-09-11 18:58:51', '2018-09-16 22:56:12'),
(13, 'TITO\'S WEDDING ALAMAT NG LALAKING LUMULUHA', 'tito-s-wedding-alamat-ng-lalaking-lumuluha', '10:00 min.', '1993', 'Best Short Film / Best Director / Best Technically-Produced Film, Metro-Manila Film Festival (1994)', '1536725122TITO\'S WEDDING 2.jpg', 'A young boy narrates some scenes from his uncle’s rural wedding.', 'https://youtube.com/embed/L7aq-nLvxDs', NULL, '2018-09-11 19:00:19', '2018-09-16 22:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `film_genre`
--

CREATE TABLE `film_genre` (
  `id` int(10) UNSIGNED NOT NULL,
  `film_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `film_genre`
--

INSERT INTO `film_genre` (`id`, `film_id`, `genre_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `film_member`
--

CREATE TABLE `film_member` (
  `id` int(10) UNSIGNED NOT NULL,
  `film_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `member_profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `film_member`
--

INSERT INTO `film_member` (`id`, `film_id`, `member_id`, `member_profession`, `member_name`) VALUES
(1, 1, 11, 'Director', 'Pao Santiago Pangan'),
(2, 2, 2, 'Director', 'Direk Ellen Ramos'),
(3, 3, 18, 'Director', 'Neil Daza'),
(4, 4, 18, 'Director', 'Neil Daza'),
(5, 4, 5, 'Actor', 'Roxlee'),
(6, 5, 18, 'Director', 'Neil Daza'),
(7, 6, 18, 'Director', 'Neil Daza'),
(8, 7, 3, 'Director', 'Direk Mel Bacani'),
(9, 8, 1, 'Director', 'Direk Raymond Red'),
(10, 9, 1, 'Director', 'Direk Raymond Red'),
(11, 10, 17, 'Director', 'Ricky Orellana'),
(12, 11, 5, 'Director', 'Roxlee'),
(13, 12, 5, 'Director', 'Roxlee'),
(14, 13, 5, 'Director', 'Roxlee');

-- --------------------------------------------------------

--
-- Table structure for table `film_tag`
--

CREATE TABLE `film_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `film_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `film_tag`
--

INSERT INTO `film_tag` (`id`, `film_id`, `tag_id`) VALUES
(1, 1, 2),
(2, 6, 2),
(3, 8, 2),
(4, 9, 2),
(5, 10, 2),
(6, 11, 2),
(7, 13, 2),
(8, 12, 2),
(9, 7, 2),
(10, 5, 2),
(11, 4, 2),
(12, 3, 2),
(13, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Action', 'action', '2018-09-10 20:03:30', '2018-09-10 20:03:30'),
(2, 'Adventure', 'adventure', '2018-09-10 20:03:30', '2018-09-10 20:03:30'),
(3, 'Comedy', 'comedy', '2018-09-10 20:03:30', '2018-09-10 20:03:30'),
(4, 'Drama', 'drama', '2018-09-10 20:03:31', '2018-09-10 20:03:31'),
(5, 'Horror', 'horror', '2018-09-10 20:03:31', '2018-09-10 20:03:31'),
(6, 'Fantasy', 'fantasy', '2018-09-10 20:03:31', '2018-09-10 20:03:31'),
(7, 'Sci-fi', 'sci-fi', '2018-09-10 20:03:31', '2018-09-10 20:03:31'),
(8, 'Romance', 'romance', '2018-09-10 20:03:31', '2018-09-10 20:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `awards` text COLLATE utf8mb4_unicode_ci,
  `about` text COLLATE utf8mb4_unicode_ci,
  `halloffame` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profilepic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coverphoto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workshop` text COLLATE utf8mb4_unicode_ci,
  `fb_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `li_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `slug`, `awards`, `about`, `halloffame`, `profilepic`, `coverphoto`, `workshop`, `fb_link`, `tw_link`, `ig_link`, `li_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Raymond Red', 'raymond-red', 'Cannes Film Festival\r\nPalme d\'Or - Best Short Film: Anino (2000) \r\n\r\nCinema One Originals Digital Film Festival\r\n2015 Special Honorary Award	\r\n\r\nCinemalaya Independent Film Festival\r\nSpecial Jury Prize: Directors Showcase, Kamera obskura (2012) \r\nBalanghai Trophy: Best Director - Directors Showcase, Kamera obskura (2012)\r\n\r\nCinemanila International Film Festival\r\n2000 Special Recognition\r\n\r\nGawad Urian Awards\r\nBest Cinematography, Himpapawid (2009)\r\nBest Sound : Bayani (1992) /Shared with:Larry Manda\r\nBest Short Film : A Study for the Skies (1988) \r\n\r\nYoung Critics Circle, Philippines\r\nBest Screenplay: Himpapawid (2009)\r\nBest Achievement in Cinematography and Visual Design: Himpapawid (2009)\r\nBest Achievement in Film Editing: Himpapawid (2009)\r\nBest Film: Himpapawid (2009)uj', 'Raymond Red is one of the pioneer figures of modern Filipino alternative cinema. Having a background in visual arts and photography after studying at the Philippine High School for the Arts and the University of the Philippines - College of Fine Arts, he began by making numerous experimental and narrative super-8mm and 16mm short films in the 1980s and immediately gained recognition by winning awards and citations, both locally and at the international film festivals scene. He had then begun to inspire a new generation of independent filmmakers, and has since become a regular lecturer and instructor in various film workshops and college film and fine arts, and mass communications programs, mentoring early on quite a number of the prominent Filipino independent filmmakers of today.\r\n\r\nIn 1990, he was invited to the prestigious DAAD Berlin Artists in Residence program, where he was also awarded a film production grant by ZDF 2nd German Television. He then produced his first full-length feature film \"\"Bayani\"\" (Heroes), a low-budget historical bio-pic, it was one of the first truly Filipino \"\"alternative\"\" films released in commercial cinemas and thus considered by some as the indie film that bridged the gap between the Filipino alternative and mainstream cinema. He later made two other full length features, \"\"Sakay\"\" another historical epic which won major awards at the Manila Film Festival 1993, and \"\"Kamada\"\" a television feature that won awards from the Philippine Broadcasters Association and the Asian TV Awards in 1997.\r\n\r\nRed has earned the distinction of being one of the first Filipinos to receive a Rotterdam Hubert Bals Memorial grant, one of only two Filipino filmmakers mentioned in the Oxford History of World Cinema, and the first and so far only Filipino to have won the prestigious Palme d\'Or award at the 2000 Cannes Film Festival for his short film \"\"Anino\"\". Red is also now distinguished for his technical expertise, and has served as speaker for new moving image technology launches of companies like Sony and Canon, Kodak and Fuji, and has also served as juror for both local and international film competitions.\r\n\r\nRed has also been active in television commercials and music video production, and has done a few more experimental short works. He has now done two recent award-winning full length features, entitled \"\"Himpapawid\"\" (Manila Skies) 2009, and \"\"Kamera Obskura\"\" (2012). He is in production this September 2015 for his new project \"\"Rebels With A Case\"\" due to come out November.', NULL, '1536644218479f1db85a034435e90bfb190e501bf4.jpg', '1537329232raymond-red.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-10 21:35:32', '2018-09-18 21:58:50', NULL),
(2, 'Ellen Ramos', 'ellen-ramos', 'Jogja-NETPAC Asian Film Festival\r\nSpecial Mention: Light of Asia Competition : Speci Men (2006)\r\n\r\nSoHo International Film Festival\r\nMient\'s Pick: Excellence in Cinematography : Ganap na babae (2010)\r\nBest World Showcase : Walang hanggang paalam (2009)', 'Ellen Ramos worked as a full-time architect and a Computer-Aided Design and Drafting (CADD) specialist before studying animation at the Mowelfund Film Institute in 1992.  She then joined more workshops under German experimental filmmaker Christoph Janetzko.  She was the Philippine representative at the ASEAN-COCI Film Workshop in Malaysia in 1996, and was a UNESCO-Aschberg scholar at the Cologne Academy of Media Arts in Germany in 1997.  She was a workshop facilitator and  animation lecturer at the Mowelfund Film Institute from 1993-2004, and later became its Head of Education.\r\n\r\nEllen has worked on various short film productions as director, animator, production designer, sound recordist, and editor.  A founding member of Pinoy Animagination (a group of Filipino independent animators), her work Doon sa Kabila ng Bulkan (The Other Side of the Volcano), won the First Prize for Animation at the 1997 CCP Awards for Alternative Film & Video and has been selected to compete in various international film festivals. Her short film Speci men won a Special Jury Prize at the 2007 Jogja-Netpac Asian Film Festival. \r\n\r\nAs an illustrator, Ellen was a Grand Prize winner of the 1992 Philippine Board of Books for Young People (PBBY) Illustrators Prize.  She also worked as a graphic designer for various cultural institutions, advocacy organizations, and created videos for plays staged by the Philippine Educational Theater Association (PETA).', NULL, '1537243713ellen ramos.jpg', '1537348569directors-films-06.png', NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-10 21:43:33', '2018-09-19 01:16:09', NULL),
(3, 'Mel Bacani', 'mel-bacani', NULL, 'Melchor Bacani III is a director for TV and was an active participant of the Mowelfund Film Institute (MFI) film workshops in the late 1980s and early 1990s.', NULL, '153664483012512638_10154190350198678_1122333605780094000_n.jpg', '1537348686directors-films-12.png', NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-10 21:47:11', '2018-09-19 01:18:06', NULL),
(4, 'Edgardo Vinarao', 'edgardo-vinarao', 'FAMAS Awards\r\nBest Editing: Andrea, paano ba ang maging isang ina? (1990)\r\nBest Editing: Init o lamig (1981)\r\nBest Editing: Hostage... Hanapin si Batuigas! (1977)\r\nBest Editing: Minsa\'y isang gamu-gamo (1976)\r\n\r\nFAP Awards, Philippines\r\nBest Director: Birador (1998) \r\nBest Editing: Birador (1998)\r\nBest Editing\r\nAndrea, paano ba ang maging isang ina? (1990) \r\nBest Film Editing: Kapag napagod ang puso (1988) \r\nBest Film Editing: Paradise Inn (1985) \r\nBest Film Editing: Pieta (1983) \r\nBest Film Editing: Pedring Taruc (1982)\r\n\r\nGawad Urian Awards\r\nBest Editing: Segurista (1996)\r\nBest Editing: High School Circa \'65 (1979)\r\n\r\nMetro Manila Film Festival\r\nBest Editing: Andrea, paano ba ang maging isang ina? (1990) \r\nBest Editing: Paradise Inn (1985) \r\nBest Editing: Kadete (1979) \r\nBest Editing: Minsa\'y isang gamu-gamo (1976) \r\nBest Editing: Diligin mo ng hamog ang uhaw na lupa (1975)', 'Edgardo Vinarao is an editor and director, known for Birador (1998), Andrea, paano ba ang maging isang ina? (1990) and Senswal (2000).', NULL, '1536644899492398910_1280x720.jpg', '1537348825directors-films-04.png', NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-10 21:48:19', '2018-09-19 01:20:25', NULL),
(5, 'Roxlee', 'roxlee', '2010 - Lifetime Achievement Award - Animahenasyon - Animation Council of the Philippines Incorporated (ACPI)\r\n2008 - a Tribute at .MOV Digital Film Festival\r\n2006 - Daluyan Awardee (progressive leaders and pioneers in the independent film community in the Philippines) - Philippine Independent Filmmakers\' Multi-purpose Cooperative (IFC) and Robinsons Galleria Movieworld \r\n1987 - \"Juan Gapang\" - Best Experimental Short Film - Gawad Urian Awards\r\n1988 - Best Student Film - Film Academy of the Philippines\r\n1987 to 1992 - Annually won at Gawad CCP (Cultural Center of the Phils.\' Short Film Contest)\r\n1986 - Honorable Mention - Experimental Short Film - Kelibia Short Film Festival, Tunisia\r\n1982 to 1985 - Annually won at Experimental Cinema of the Phils. (ECP)', '-Born as Roque Federizon Lee\r\n-famously known an ROXLEE\r\n-born on August 16, 1950 in Naga City, Camarines Sur\r\n-dubbed as the Father of young Filipino Filmmakers\r\n-one of the founding members of Animagination now evolved into Animahenasyon and Sinekalye, a group of filmmakers taking the films and music into the street. He is a pioneer of independent film animation in the Philippines.', NULL, '1536644988roxlee1.jpg', NULL, NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-10 21:49:48', '2018-09-10 21:49:48', NULL),
(6, 'Lav Diaz', 'lav-diaz', 'https://www.imdb.com/name/nm0225010/awards?ref_=nm_awd', 'Lav Diaz was born on December 30, 1958 in Datu Paglas, Maguindanao, Mindanao, Philippines as Lavrente Indico Diaz.', NULL, '15366451062016_02_17_9863_2538_Lav_Diaz_IMG_x900.jpg', NULL, NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-10 21:51:48', '2018-09-10 21:51:48', NULL),
(7, 'Brillante Mendoza', 'brillante-mendoza', 'Best Director for Kinatay at the 62nd Cannes Film Festival\r\n\r\nBest Film for Lola at the 6th Dubai International Film Festival \r\n\r\nSpecial Honorary Award at the Cinema One Originals 2009\r\n\r\nGolden Kinnaree Award for Serbis at Bangkok International Film Festival 2008\r\nCaligari Film Award for Tirador at the Berlin International Film Festival 2008\r\n\r\nNetpac Award for Foster Child at the Brisbane International Film Festival 2008\r\n\r\nPrize of the Ecumenical Jury - Special Mention for Taklub at the Cannes Film Festival 2015\r\n\r\nLino Brocka Award and Best Director for Manoro at the Cinemanila International Film Festival 2006\r\n\r\nBest Film for Foster Child at the Durban International Film Festival 2008\r\n\r\nBest Film for Lola at the Fajr Film Festival 2011\r\n\r\nDon Quixote Award, Ecumenical Jury Award, and Special Mention for Lola at the Fribourg International Film Festival 2010\r\n\r\nBest Production Design for Thy Womb at the Gawad Urian Award 2013\r\n\r\nBest Film of the Decade for Serbis, Kinatay, and Lola at the Gawad Urian Award 2011\r\n\r\nBest Direction for Kinatay at the Gawad Urian Award 2010\r\n\r\nBest Production Design for Lola at the Gawad Urian Award 2010\r\n\r\nBest Direction for Serbis at the Gawad Urian Award 2009\r\n\r\nBest Cinematography for Tirador at the Gawad Urian Award 2008\r\n\r\nBest Director Ma’ Rosa at the Gijón International Film Festival 2016\r\n\r\nBest Director for Kinatay at the Golden Screen Awards 2013\r\n\r\nSpecial Jury Mention for Thy Womb at the Granada Film Festival Cines del Sur 2013\r\n\r\nNetpac Award for Kaleldo at the Jeonju Film Festival 2007\r\n\r\nGolden Lady Harimaguada Award for Lola at the Las Palmas Film Festival 2010\r\nSIGNIS Award for Foster Child at the Las Palmas Film Festival 2008\r\n\r\nSpecial Jury Award for Tirador at the Marrakech International Film Festival 2007\r\n\r\nBest Director, Best Production Design, and Gatpuno Antonio J. Villegas Cultural Award for Thy Womb at the MMFF 2012\r\n\r\nGrand Jury Prize for Lola at the Miami Film Festival 2010\r\n\r\nBest Director for Serbis at the Pacific Meridian International Film Festival of Asia Pacific Countries 2008\r\n\r\nBest Asian Feature Film, Best Director-Asian Feature Film, and NETPAC Award for Tirador at the Singapore International Film Festival 2008\r\n\r\nBest Director for Kinatay at the Sitges – Catalonian International Film Festival 2009\r\n\r\nIndie Movie Production Designer of the Year for Thy Womb at the Star Awards for Movies 2013\r\n\r\nDigital Movie Production Designer of the Year for Lola at the Star Awards for Movies 2010\r\n\r\nCinemAvvenire Award for Manoro at the Torino Film Festival 2006\r\n\r\nLa Navicella Venezia Cinema Award and Nazareno Taddei Award - Special Mention for Thy Womb at the Venice Film Festival 2012\r\n\r\nBest Film for Foster Child at the Young Critics Circle 2008', 'Brillante Dante Mendoza (born 30 July 1960) is a Filipino independent film director. He was born and raised in San Fernando, Pampanga. He took advertising arts of the then College of Architecture and fine arts at the University of Santo Tomas.\r\n\r\nHe has directed sixteen films since 2005. He won the award for Best Director for his film Kinatay at the 62nd Cannes Film Festival. His 2009 film Lola won the award for Best Film at the 6th Dubai International Film Festival. His 2012 film Captive was shown in competition at the 62nd Berlin International Film Festival in February 2012.\r\n\r\nHis 2012 film Thy Womb competed for the Golden Lion at the 69th Venice International Film Festival and earned Mendoza the award for Achievement in Directing at the Asia Pacific Screen Awards in 2012. His film Taklub has been selected to be screened in the Un Certain Regard section at the 2015 Cannes Film Festival.\r\n\r\nOn 25 July 2016, he directed the first State of the Nation Address of President Rodrigo Duterte. Mendoza was again attached to direct Duterte\'s second State of the Nation Address on 24 July 2017.', NULL, '1536645187640_4_2016_09_06_17_25_30.jpg', '1537349241directors-films-02.png', NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-10 21:53:07', '2018-09-19 01:33:57', NULL),
(8, 'Michael Angelo Dagnalan', 'michael-angelo-dagnalan', 'Best Director for Layang Bilanggo at the 6th Cinema One Originals Film Festival (2010)\r\n\r\nBest Screenplay and Best Picture for Layang Bilanggo (2010) with Ma-an Asuncion-Dagñalan and Melchor DF. Escarcha.\r\n\r\nFirst Prize, Dulang Pampelikula for Isnats at the 52nd Don Carlos Palanca Memorial Awards for Literature (2002).\r\n\r\nRiver of Dreams (2009) won Best Entry for Children at the 21st Gawad CCP (Cultural Center of the Philippines).', NULL, NULL, '1536645234MV5BZjFmMzM3YTItYWVkOC00MDI5LTlhODEtNGQ0ZTJmMjczOGE0XkEyXkFqcGdeQXVyNTI5NjIyMw@@._V1_UX214_CR0,0,214,317_AL_.jpg', '1537348591directors-films-07.png', NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-10 21:53:54', '2018-09-19 01:16:31', NULL),
(9, 'Kiri Dalena', 'kiri-dalena', 'Won Jury Prize for Best Editing for The Guerilla is a Poet, CineFilipino Film Festival (2013)\r\n\r\nWon Festival Prize for Best Cinematography for Ka Oryang, Cinema One Originals Digital Film Festival (2011)\r\n\r\nWon NETPAC Award for Gikan sa Ngitngit Kinailadman, QCinema International Film Festival (2017)', '-Gabriela Krista Lluch Dalena\r\n-Born: 1975\r\n-Father: Danny Dalena (Painter)\r\n-Mother: Julie Lluch (Sculptor)\r\n-Graduated from the University of the Philippines-Los Baños with an undergraduate degree in Human Ecology\r\n-Pursued further studies in 16mm documentary filmmaking at the Mowefund Film Institute.\r\n-Has been featured in several international art events such as the Singapore Biennale (2013), Yokohama Triennale (Yokohama/JP, 2014), Fukuoka Asian Art Triennale (Fukuoka/JP, 2014), and the Asia Pacific Triennial of Contemporary Art (Brisbane/AU, 2015).\r\n-Has been invited to be part of the 2016 Busan Biennale\r\n-Her works are currently in the permanent collections of the Singapore Art Museum, Queensland Art Gallery | Gallery of Modern Art, and the Ateneo Art Gallery.\r\n-Co-founder of the film making collective Southern Tagalog Exposure.', NULL, '15366453671393646649-KiriDalena.jpg', '1537348917directors-films-08.png', NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-10 21:56:07', '2018-09-19 01:21:57', NULL),
(10, 'Ej Salcedo', 'ej-salcedo', 'Nominated for Best Film Gawad Urian for Talahib\r\n\r\nNominated for Best Screenplay for Third World Happy\r\n\r\nNominated for NETPAC Best Asian Film Award for Third World Happy', '-Advertising graduate from the University of Houston\r\n-Put up a production house called Brass Knuckles Inc. with fellow director Topel Lee', NULL, '153664542740-EJ-Salcedo.jpg', NULL, NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-10 21:56:46', '2018-09-10 21:57:07', NULL),
(11, 'Pao Santiago Pangan', 'pao-santiago-pangan', NULL, '-Film and Audio-Visual Communication graduate of the University of the Philippines\r\n\r\n-Completed a course in cinematography at Mowelfund Film Institute, and Masterclass Commercial Cinematography at the Australian Cinematographer’s Society 50th Convention\r\n\r\n-His first job was as a segment producer and then later on as a director for ABS-CBN Cinema One', NULL, NULL, NULL, NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-10 21:57:54', '2018-09-10 21:57:54', NULL),
(12, 'Dexter Macaraeg', 'dexter-macaraeg', '-Best Screenplay and Best Actor (for Kristofer King) at the New York Indie Film Festival.', NULL, NULL, '1536645513lBINDo0O.jpg', NULL, NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-10 21:58:33', '2018-09-10 21:58:33', NULL),
(13, 'Lem Lorca', 'lem-lorca', 'Lem Lorca', NULL, NULL, NULL, NULL, NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-10 21:59:35', '2018-09-10 21:59:35', NULL),
(14, 'Nick De Ocampo', 'nick-de-ocampo', 'He was named one of the Ten Outstanding Young Men of the Philippines in 1992.\r\n\r\nHe was recognized in Japan as one of the Ten Outstanding Young Persons of the World in 1993\r\n\r\nLifetime Achievement Award from the Filipino Academy of Movie Arts and Sciences Awards (FAMAS)\r\n\r\nLamberto Avellana Award from the Film Academy of the Philippines', '-Born: 1959\r\n-Birthplace: Mina, Iloilo\r\n\r\n-Multi-awarded Filipino filmmaker, film historian, film literacy advocate, film producer, author and the director of the Center for New Cinema, and currently an Associate Professor at the U.P. Film Institute College of Mass Communication at U.P. Diliman.\r\n-Graduated cum laude with a bachelor\'s degree in Theater Arts at the University of the Philippines (UP) in 1981\r\n-Under a Fulbright Scholarship Grant, Deocampo earned his Master of Arts degree in Cinema Studies at the New York University in 1989', NULL, '1536646180nick.png', '1537348894directors-films-11.png', NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-10 22:03:17', '2018-09-19 01:21:34', NULL),
(15, 'Roxlee', 'roxlee-1', NULL, NULL, NULL, '1536721326Untitled.png', NULL, NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-11 19:02:06', '2018-09-11 19:03:12', '2018-09-11 19:03:12'),
(16, 'Neil Daza', 'neil-daza', NULL, NULL, NULL, '1536721530AGOSTO 9.png', NULL, NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-11 19:05:30', '2018-09-11 19:54:02', '2018-09-11 19:54:02'),
(17, 'Ricky Orellana', 'ricky-orellana', NULL, 'He has worked variously as director, animator, film editor, sound recordist and art director on short and feature films, and documentaries. He began to make films while studying architecture at the University of Santo Tomas, and made experimental films at a workshop by German filmmaker Christoph Janetzko. His representative work is Sa Maynila, which won the Best Documentary award at the 3rd Gawad CCP para sa Alternatibong Pelikula at Video in 1989, and Best Student Film Documentary at the 8th FAP Student Motion Picture Awards in 1990. He also directed the documentary films on Philippine National Artists Arturo Rogerio Luz and Maestro Lucio San Pedro. He is a board member of the Animation Council of the Philippines (ACPI) and the Samahan ng mga Filipinong Arkivista para sa Pelikula (SOFIA). He is currently the Audiovisual Archive Head at MOWELFUND and teaches part time at the College of Saint Benilde School of Design & Arts handling Experimental Animation and Scriptwriting for Animation. \r\n \r\nHe received a SEAPAVAA Fellow award at the 21st Southeast Asia-Pacific Audiovisual Archive Association Conference held in Manila last April 2017.', NULL, '1536744903orellana cropped2.jpg', '1537348749directors-films-01.png', NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-11 19:09:53', '2018-09-19 01:19:09', NULL),
(18, 'Neil Daza', 'neil-daza', '-Best Cinematography for Ka Oryang (2011) at CinemaOne Originals Digital Film Festival with Kiri Dalena\r\n-Best Cinematography for Seroks (2006) at CinemaOne Originals Digital Film Festival\r\n CINEMALAYA INDEPENDENT FILM FESTIVAL\r\n-Best Cinematography\r\nKung paano hinihintay ang dapithapon (2018)', 'Neil Daza is a director, cinematographer and a photographer. He has lighted several notable films like Yamashita: The Tiger’s Treasure (2001), Dekada ’70 (2002), Feng Shui (2004), Emir (2010), Bwaya (2014), and top-rating television shows Maalaala Mo Kaya, Princess and I, and Be Careful With My Heart.​ Neil was one of the 20 Asian documentary photographers and filmmakers invited by the Gwangju Arts Council in South Korea to exhibit photographs and short films in a multimedia documentary exhibition, Conjunction Points in 2005.', NULL, '1536744594daza cropped.jpg', '1537349171directors-films-09.png', NULL, 'https://facebook.com', 'https://twitter.com', 'http://instagram.com', 'https://linkedin.com', '2018-09-11 19:54:25', '2018-09-19 01:26:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_profession`
--

CREATE TABLE `member_profession` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `profession_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_profession`
--

INSERT INTO `member_profession` (`id`, `member_id`, `profession_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 7, NULL, NULL),
(6, 1, 12, NULL, NULL),
(7, 1, 15, NULL, NULL),
(8, 2, 2, NULL, NULL),
(9, 2, 3, NULL, NULL),
(10, 2, 4, NULL, NULL),
(11, 2, 7, NULL, NULL),
(12, 2, 12, NULL, NULL),
(13, 2, 13, NULL, NULL),
(14, 4, 2, NULL, NULL),
(15, 4, 3, NULL, NULL),
(16, 4, 12, NULL, NULL),
(17, 5, 1, NULL, NULL),
(18, 5, 2, NULL, NULL),
(19, 5, 4, NULL, NULL),
(20, 5, 5, NULL, NULL),
(21, 5, 12, NULL, NULL),
(22, 7, 3, NULL, NULL),
(23, 8, 2, NULL, NULL),
(24, 8, 4, NULL, NULL),
(25, 9, 3, NULL, NULL),
(26, 9, 7, NULL, NULL),
(27, 9, 16, NULL, NULL),
(28, 10, 1, NULL, NULL),
(29, 10, 3, NULL, NULL),
(30, 11, 3, NULL, NULL),
(31, 11, 7, NULL, NULL),
(32, 12, 1, NULL, NULL),
(33, 12, 3, NULL, NULL),
(34, 13, 3, NULL, NULL),
(35, 14, 3, NULL, NULL),
(36, 14, 4, NULL, NULL),
(37, 15, 3, NULL, NULL),
(38, 15, 4, NULL, NULL),
(39, 5, 3, NULL, NULL),
(40, 16, 3, NULL, NULL),
(41, 16, 4, NULL, NULL),
(42, 3, 2, NULL, NULL),
(43, 3, 3, NULL, NULL),
(44, 3, 4, NULL, NULL),
(45, 17, 2, NULL, NULL),
(46, 17, 3, NULL, NULL),
(47, 17, 4, NULL, NULL),
(49, 18, 3, NULL, NULL),
(51, 18, 7, NULL, NULL),
(52, 18, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_07_31_081307_create_categories_table', 1),
(4, '2018_07_31_085217_create_genres_table', 1),
(5, '2018_08_06_075643_create_tags_table', 1),
(6, '2018_08_06_081015_create_equipment_table', 1),
(7, '2018_08_23_004641_create_appearances_table', 1),
(8, '2018_08_23_044949_create_films_table', 1),
(9, '2018_08_28_054144_create_events_table', 1),
(10, '2018_08_29_054824_create_contactusforms_table', 1),
(11, '2018_09_06_024629_create_professions_table', 1),
(12, '2018_09_06_024846_create_members_table', 1),
(13, '2018_09_06_025248_create_film_member_table', 1),
(14, '2018_09_06_025347_create_film_tag_table', 1),
(15, '2018_09_06_025833_create_film_genre_table', 1),
(16, '2018_09_06_030457_create_category_film_table', 1),
(17, '2018_09_06_073139_create_member_profession_table', 1),
(18, '2018_09_15_092319_create_stills_table', 2),
(19, '2018_09_19_053753_create_workshops_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professions`
--

CREATE TABLE `professions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professions`
--

INSERT INTO `professions` (`id`, `name`, `slug`, `main`, `created_at`, `updated_at`) VALUES
(1, 'Actor', 'actor', 'true', '2018-09-10 20:03:37', '2018-09-10 20:03:37'),
(2, 'Writer', 'writer', 'true', '2018-09-10 20:03:37', '2018-09-10 20:03:37'),
(3, 'Director', 'director', 'true', '2018-09-10 20:03:37', '2018-09-10 20:03:37'),
(4, 'Producer', 'producer', 'true', '2018-09-10 20:03:38', '2018-09-10 20:03:38'),
(5, 'Animator', 'animator', 'false', '2018-09-10 20:03:38', '2018-09-10 20:03:38'),
(6, 'Assistant Director', 'assistant-director', 'false', '2018-09-10 20:03:38', '2018-09-10 20:03:38'),
(7, 'Cinematographer', 'cinematographer', 'false', '2018-09-10 20:03:38', '2018-09-10 20:03:38'),
(8, 'Graphic Designer', 'graphic-designer', 'false', '2018-09-10 20:03:38', '2018-09-10 20:03:38'),
(9, 'Illustrator', 'illustrator', 'false', '2018-09-10 20:03:38', '2018-09-10 20:03:38'),
(10, 'Music', 'music', 'false', '2018-09-10 20:03:39', '2018-09-10 20:03:39'),
(11, 'Photographer', 'photographer', 'false', '2018-09-10 20:03:39', '2018-09-10 20:03:39'),
(12, 'Editor', 'editor', 'false', '2018-09-10 20:03:39', '2018-09-10 20:03:39'),
(13, 'Production Designer', 'production-designer', 'false', '2018-09-10 20:03:39', '2018-09-10 20:03:39'),
(14, 'Production Manager', 'production-manager', 'false', '2018-09-10 20:03:39', '2018-09-10 20:03:39'),
(15, 'Sound', 'sound', 'false', '2018-09-10 20:03:39', '2018-09-10 20:03:39'),
(16, 'Visual Artist', 'visual-artist', 'false', '2018-09-10 20:03:39', '2018-09-10 20:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `stills`
--

CREATE TABLE `stills` (
  `id` int(10) UNSIGNED NOT NULL,
  `film_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stills`
--

INSERT INTO `stills` (`id`, `film_id`, `file_name`, `created_at`, `updated_at`) VALUES
(5, 13, '1537239854TW3.png', '2018-09-17 19:04:14', '2018-09-17 19:04:14'),
(6, 13, '1537239854TW4.png', '2018-09-17 19:04:14', '2018-09-17 19:04:14'),
(7, 13, '1537239854TW5.png', '2018-09-17 19:04:14', '2018-09-17 19:04:14'),
(8, 13, '1537239854TW6.png', '2018-09-17 19:04:14', '2018-09-17 19:04:14'),
(9, 11, '1537239922Juan Gapang Still1.png', '2018-09-17 19:05:22', '2018-09-17 19:05:22'),
(10, 11, '1537239922Juan Gapang Still2.png', '2018-09-17 19:05:22', '2018-09-17 19:05:22'),
(13, 10, '1537239963sa maynila still3.png', '2018-09-17 19:06:03', '2018-09-17 19:06:03'),
(14, 10, '1537239963sa maynila still4.png', '2018-09-17 19:06:03', '2018-09-17 19:06:03'),
(15, 10, '1537239963sa maynila still5.png', '2018-09-17 19:06:03', '2018-09-17 19:06:03'),
(17, 10, '1537239963sa maynila still7.png', '2018-09-17 19:06:03', '2018-09-17 19:06:03'),
(18, 9, '1537240071pelikula still1.png', '2018-09-17 19:07:51', '2018-09-17 19:07:51'),
(20, 9, '1537240071pelikula still3.png', '2018-09-17 19:07:51', '2018-09-17 19:07:51'),
(21, 9, '1537240071pelikula still4.png', '2018-09-17 19:07:51', '2018-09-17 19:07:51'),
(22, 9, '1537240071pelikula still5.png', '2018-09-17 19:07:51', '2018-09-17 19:07:51'),
(23, 7, '1537240161mip still1.1.png', '2018-09-17 19:09:21', '2018-09-17 19:09:21'),
(24, 7, '1537240161mip still1.png', '2018-09-17 19:09:21', '2018-09-17 19:09:21'),
(25, 7, '1537240161mip still2.png', '2018-09-17 19:09:21', '2018-09-17 19:09:21'),
(26, 7, '1537240161mip still3.png', '2018-09-17 19:09:21', '2018-09-17 19:09:21'),
(27, 6, '1537240214MI still1.png', '2018-09-17 19:10:14', '2018-09-17 19:10:14'),
(28, 6, '1537240214MI still2.png', '2018-09-17 19:10:14', '2018-09-17 19:10:14'),
(29, 6, '1537240214MI still3.png', '2018-09-17 19:10:14', '2018-09-17 19:10:14'),
(30, 6, '1537240214MI still4.png', '2018-09-17 19:10:14', '2018-09-17 19:10:14'),
(32, 5, '1537240525unos still2.png', '2018-09-17 19:15:25', '2018-09-17 19:15:25'),
(33, 5, '1537240525unos still3.png', '2018-09-17 19:15:25', '2018-09-17 19:15:25'),
(34, 5, '1537240525unos still4.png', '2018-09-17 19:15:25', '2018-09-17 19:15:25'),
(35, 5, '1537240525unos still5.png', '2018-09-17 19:15:25', '2018-09-17 19:15:25'),
(37, 4, '1537240629LPP still3.png', '2018-09-17 19:17:09', '2018-09-17 19:17:09'),
(38, 4, '1537240629LPP still4.png', '2018-09-17 19:17:09', '2018-09-17 19:17:09'),
(39, 4, '1537240629LPP still5.png', '2018-09-17 19:17:09', '2018-09-17 19:17:09'),
(40, 4, '1537240629LPP still6.png', '2018-09-17 19:17:09', '2018-09-17 19:17:09'),
(41, 3, '1537240751agosto 9 still1.png', '2018-09-17 19:19:11', '2018-09-17 19:19:11'),
(43, 3, '1537240751agosto 9 still3.png', '2018-09-17 19:19:11', '2018-09-17 19:19:11'),
(44, 3, '1537240751agosto 9 still4.png', '2018-09-17 19:19:11', '2018-09-17 19:19:11'),
(45, 3, '1537240751agosto 9 still5.png', '2018-09-17 19:19:11', '2018-09-17 19:19:11'),
(46, 12, '1537241506mot still1.png', '2018-09-17 19:31:46', '2018-09-17 19:31:46'),
(47, 12, '1537241506mot still2.png', '2018-09-17 19:31:46', '2018-09-17 19:31:46'),
(49, 12, '1537241506mot still4.png', '2018-09-17 19:31:46', '2018-09-17 19:31:46'),
(50, 12, '1537241506mot still5.png', '2018-09-17 19:31:46', '2018-09-17 19:31:46'),
(51, 8, '1537241611asfts still1.png', '2018-09-17 19:33:31', '2018-09-17 19:33:31'),
(52, 8, '1537241611asfts still2.png', '2018-09-17 19:33:31', '2018-09-17 19:33:31'),
(53, 2, '1537241845dkb still1.png', '2018-09-17 19:37:25', '2018-09-17 19:37:25'),
(54, 2, '1537241845dkb still2.png', '2018-09-17 19:37:25', '2018-09-17 19:37:25'),
(55, 2, '1537241845dkb still3.png', '2018-09-17 19:37:25', '2018-09-17 19:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'kpop', 'kpop', '2018-09-10 20:03:31', '2018-09-10 20:03:31'),
(2, 'tagalog', 'tagalog', '2018-09-10 20:03:31', '2018-09-10 20:03:31'),
(3, 'english', 'english', '2018-09-10 20:03:32', '2018-09-10 20:03:32'),
(4, 'marvel', 'marvel', '2018-09-10 20:03:32', '2018-09-10 20:03:32'),
(5, 'millenials', 'millenials', '2018-09-10 20:03:32', '2018-09-10 20:03:32'),
(6, 'Christmas', 'christmas', '2018-09-10 20:03:32', '2018-09-10 20:03:32'),
(7, 'funny', 'funny', '2018-09-10 20:03:32', '2018-09-10 20:03:32'),
(8, 'Ellen Ramos', 'ellen-ramos', '2018-09-11 19:26:30', '2018-09-11 19:27:00'),
(9, 'Animation', 'animation', '2018-09-11 19:27:19', '2018-09-11 19:27:19'),
(10, '1997', '1997', '2018-09-11 19:27:46', '2018-09-11 19:28:46'),
(11, 'DOON SA KABILA NG BULKAN', 'doon-sa-kabila-ng-bulkan', '2018-09-11 19:27:46', '2018-09-11 19:27:46'),
(12, 'Neil Daza', 'neil-daza', '2018-09-12 01:56:34', '2018-09-12 01:56:34'),
(13, 'Cesar Santos Jr.', 'cesar-santos-jr', '2018-09-12 01:56:59', '2018-09-12 01:56:59'),
(14, 'Maribel Legarda', 'maribel-legarda', '2018-09-12 01:57:17', '2018-09-12 01:57:17'),
(15, 'Experimental', 'experimental', '2018-09-12 01:57:29', '2018-09-12 01:57:29'),
(16, 'Short Film', 'short-film', '2018-09-12 01:57:57', '2018-09-12 01:57:57'),
(17, '1994', '1994', '2018-09-12 01:58:10', '2018-09-12 01:58:10'),
(18, 'Agosto 9', 'agosto-9', '2018-09-12 01:58:23', '2018-09-12 01:58:23'),
(19, 'Joey Tam', 'joey-tam', '2018-09-12 01:58:50', '2018-09-12 01:58:50'),
(20, 'Robert Quebral', 'robert-quebral', '2018-09-12 01:59:10', '2018-09-12 01:59:10'),
(21, 'EXPIRED FILMMAKERS GROUP & MOWELFUND FILM INSTITUTE', 'expired-filmmakers-group-mowelfund-film-institute', '2018-09-12 01:59:57', '2018-09-12 01:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alexies Iglesia', 'ialexies@gmail.com', '$2y$10$zeP3sufgH6/VXiSNLAEYS.9HLFjtGCpfW3sr/O0ghOWauU3VoBNWK', 'uDjNTT7bkcSD0rUtIVXkVhwBN1qzY6v3AwNTxqwKzb3RB9YZ9nMPxm7ImlGx', '2018-09-10 20:03:28', '2018-09-10 20:03:28'),
(2, 'Marvin Tan', 'marvin@captivategrp.com', '$2y$10$HSoTL7jftKkon2XxaXHXTuFiFPNoO8Wqutk.lOQS989MEKhwZMliC', NULL, '2018-09-10 21:27:32', '2018-09-10 21:27:32'),
(3, 'Sam', 'samantha@captivategrp.com', '$2y$10$2Gw3BCyx/IKsIX5PE23PMeeQ4ZUFbyW08WtogkZzb0ksjsWc1X03e', NULL, '2018-09-10 21:30:23', '2018-09-10 21:30:23'),
(4, 'Sheira Man-awit', 's.cmanawit@gmail.com', '$2y$10$q26RzgwnX7b0vWTF5yQmNeITY1fLUe4TaHHrt1PHhVVBYNblIAdqi', NULL, '2018-09-10 21:45:00', '2018-09-10 21:45:00'),
(5, 'Sheira Man-awit', 's.manawit@gmail.com', '$2y$10$l3Dl0Gl3g2vxpSOvAILTSut3.ZV/bC5xOEXyg2nnakTH4AFyxRnLG', NULL, '2018-09-16 22:53:41', '2018-09-16 22:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE `workshops` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workshopimg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`id`, `name`, `slug`, `workshopimg`, `description`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'dfdfdf', 'dfdfdf', '1537410350News.jpg', '<p>ffasdf</p>', '2018-09-20 10:25:06', '2018-09-21 10:50:06', '2018-09-19 18:25:51', '2018-09-19 18:25:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appearances`
--
ALTER TABLE `appearances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_film`
--
ALTER TABLE `category_film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactusforms`
--
ALTER TABLE `contactusforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film_genre`
--
ALTER TABLE `film_genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film_member`
--
ALTER TABLE `film_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film_tag`
--
ALTER TABLE `film_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_profession`
--
ALTER TABLE `member_profession`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stills`
--
ALTER TABLE `stills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appearances`
--
ALTER TABLE `appearances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_film`
--
ALTER TABLE `category_film`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contactusforms`
--
ALTER TABLE `contactusforms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `film_genre`
--
ALTER TABLE `film_genre`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `film_member`
--
ALTER TABLE `film_member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `film_tag`
--
ALTER TABLE `film_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `member_profession`
--
ALTER TABLE `member_profession`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stills`
--
ALTER TABLE `stills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `workshops`
--
ALTER TABLE `workshops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
