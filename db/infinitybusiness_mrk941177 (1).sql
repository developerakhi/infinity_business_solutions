-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 04, 2023 at 04:04 PM
-- Server version: 8.0.34-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infinitybusiness_mrk941177`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int NOT NULL,
  `title1` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `title2` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `srt` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `link` text,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `activity` varchar(255) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title1`, `title2`, `srt`, `link`, `img1`, `img2`, `date`, `activity`) VALUES
(2, 'Cold Process Organic', 'BEST SELLER', ' Bringing Fashion FWD until we are climate positive, fair for all and circular by design. Get the chance to learn, grow and tailor your future career a\r\n\r\n      ', '#', 'thumb3-thumb2-untitled-design-1602920572-1602959318.png', 'thumb2-thumb2-untitled-design-1602920572-1602959318.png', '20-08-2020', '1'),
(3, NULL, NULL, NULL, 'http://localhost/giftmasterbd/index.php', 'thumb3-banner-2-1597962198.jpg', 'thumb2-banner-2-1597962198.jpg', '20-08-2020', '1'),
(4, NULL, NULL, NULL, 'http://localhost/giftmasterbd/index.php', 'thumb3-banner-2-1597962177.jpg', 'thumb2-banner-2-1597962177.jpg', '20-08-2020', '1');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `short_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `visitor` varchar(255) DEFAULT '0',
  `activity` int DEFAULT '1',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `name`, `photo`, `short_title`, `description`, `visitor`, `activity`, `create_at`, `update_at`) VALUES
(2, 'Benchmarks for Evaluating Outsourced Creative Partnerships', 'Sharif Hasan', '64ddb9db561231692252635.png', 'Actively assessing the performance of your outsourcing partner’s creative efforts is a critical component of any outsourcing partnership. By measuring the success of your campaigns, you can ensure your outsourced team is helping you make informed decision', '<p>Actively assessing the performance of your outsourcing partner&rsquo;s creative efforts is a critical component of any outsourcing partnership. By measuring the success of your campaigns, you can ensure your outsourced team is helping you make informed decisions, optimizing your resources, and enhancing your overall marketing performance.</p>\r\n\r\n<p><strong>How can clients measure the success/performance of their outsourcing partner&rsquo;s creative services?</strong></p>\r\n\r\n<p>Because design is subjective, measuring your outsourcing partner&rsquo;s success can be complex. To begin, it is important to fully understand what your main business objectives are when measuring success rates, as those can be subjective, too. Here are a few tricks to nail down concrete design checkpoints:&nbsp;</p>\r\n\r\n<p>&ldquo;You can create your designs based on color theory, best practices, or even manual data, But in the long run, it really comes down to the number of clicks each designed ad gets.&rdquo;&nbsp;</p>\r\n', '0', 1, '2023-08-17 06:10:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carrer`
--

CREATE TABLE `carrer` (
  `id` int NOT NULL,
  `position` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `present_address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `permanent_address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `mobile` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `expectation_salary` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carrer`
--

INSERT INTO `carrer` (`id`, `position`, `name`, `present_address`, `permanent_address`, `mobile`, `expectation_salary`, `image`) VALUES
(12, '', '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `menushow` int NOT NULL DEFAULT '0',
  `type` int NOT NULL DEFAULT '1',
  `activity` int NOT NULL DEFAULT '1',
  `date` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `message` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `company_name`, `name`, `email`, `message`) VALUES
(4, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `cID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `email`, `password`, `salt`, `cID`) VALUES
(9, 'infiniteBusiness', 'admin@sarkarit.com', '046ebc6a0a7683b8ba799af0709cf926556a897225b3a5a09c58b9cee8880cbb1b8e5b782a5bb98c38bb8a6550a33712c3c7f53f050162b716eef1c68b20eec2', 'f03238cff399729e6cc2984d050ec8e6ed11b310a4eaa3757598b651faf72acedbf823eefd57fcac0376c2246a073a86ceea3e042ae84dd9b7bdd7e38576be8d', 'be714720153b250');

-- --------------------------------------------------------

--
-- Table structure for table `our_process`
--

CREATE TABLE `our_process` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `process_color` varchar(255) DEFAULT NULL,
  `short_title` varchar(255) DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `activity` int DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `our_process`
--

INSERT INTO `our_process` (`id`, `title`, `photo`, `process_color`, `short_title`, `description`, `activity`, `created_at`, `updated_at`) VALUES
(6, ' Developmental Planning', '64ed9292d4bc81693291154.jpg', NULL, ' Developmental Planning', '<p>Infinity Business Solution creates a customized implementation plan for you following a thorough discovery process with your team. This road map ensures a successful launch and ongoing growth since it includes specific strategies for effectively integrating resources to fulfill both short-term requirements and long-term objectives.</p>\r\n', 1, NULL, '2023-08-29 06:39:14'),
(7, 'Comprehensive Documentation', '64ed9c5f9e72e1693293663.jpeg', NULL, 'Comprehensive Documentation', '<p>To make sure Infinity Business Solution and our clients are on the same page and that all documents are up to date, we maintain track of all operations. We are aware that as our collaboration develops, there will be new needs as well as changes to the ones we already have. In order to succeed, both parties must operate from a single, reliable source.</p>\r\n', 1, NULL, '2023-08-29 07:21:03'),
(8, 'Repetitive Training Method', '64ed9ccf951451693293775.jpeg', NULL, 'Repetitive Training Method', '<p>The team members at Infinity Business Solution have experience using a variety of platforms for creative production and Data Analysis. Even though the technology may be identical, we understand that each customer uses these platforms in a unique way. For the purpose of developing a precise, repeatable training procedure, Infinity Business Solution collaborates with our client&#39;s unique requirements. This guarantees that all workers are familiar with the subtleties of client operations.</p>\r\n', 1, NULL, '2023-08-29 07:22:55'),
(9, 'Process Management', '64ed9d07b17931693293831.png', NULL, 'Process Management', '<p>The core of Infinity Business Solution&#39;s activities is process governance. Reliability, openness, ongoing input, and regular delivery, in our opinion, produce lasting and fruitful cooperation. A Client Success Manager monitors and oversees Infinity Business Solution Teams to guarantee that these values are reflected in each partnership. This crucial function facilitates team management, discussions, and training to guarantee the timely delivery of high-quality products with consistent outcomes.</p>\r\n', 1, NULL, '2023-08-29 07:23:52'),
(10, 'Review of Business', '64ed9d339216c1693293875.jpeg', NULL, 'Review of Business', '<p>The cornerstones of Infinity Business Solution business reviews are dedication, responsibility, adaptability, and transparency. Regarding general satisfaction, quality, communication, timeliness, and other critical KPIs that affect the overall health and welfare of our partnerships, we often solicit input from our clients.</p>\r\n', 1, NULL, '2023-08-29 07:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `type` int NOT NULL DEFAULT '1',
  `activity` int DEFAULT '1',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`, `photo`, `type`, `activity`, `create_at`, `update_date`) VALUES
(3, 'About', '<p>Infinity Business Solution started it&#39;s journey in Recently. Its a costeffective <strong>B</strong>usiness<strong> P</strong>rocess <strong>O</strong>utsourcing Information Technology company.We started with 4 employees providing small back office support services to a few businesses . Since then we have come a long way. Currently, the company employs 30+ highly skilled professionals. Many of the most renowned media, technology, and advertising firms in the world have relied on Infinity Business Solution as a premier worldwide outsourcing partner. Our sole goal is to support our client&#39;s growth and success by offering outstanding service and outsourced support.</p>\r\n\r\n<p>The art is personal to us. You join the Infinity Business Solution family when you become a partner. You will know each other by first name whether you are working with a team member in Atlanta or Bangladesh,&nbsp; You are one of our people. They are all very good at what they do. We have experience in the fields we support. We have an understanding of the difficulties and take a consultative approach. We understand how productivity can increase because we&#39;ve been in your shoes, so your</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '64ec299eccf511693198750.jpg', 2, 1, NULL, '2023-08-29 11:46:57:am'),
(8, 'TERMS AND CONDITIONS', '<p>Despite how simple they appear, terms and conditions are meant to meet incredibly complex and highly specific scenarios. Because each terms and conditions document is a legally binding contract that is meant to protect you, the business owner,&nbsp;it&rsquo;s imperative that the document matches your specific business processes, model, and remains up-to-date with the various laws referenced in its contents.&nbsp;Templates&nbsp;simply cannot do this, therefore, we strongly suggest that you avoid using templates. Read our extended answer to this question&nbsp;here.They are such an important and legally-binding document that you should make sure they are professional and respect your business situation.<br />\r\nWithout any legal background, it&rsquo;s very complicated to write them on your own. That&rsquo;s why it&rsquo;s best to seek legal advice. Another strong and probably easier alternative, you can use a Terms and Conditions Generator. It allows you to build and generate your own document in a few clicks, and then install it on your website. Learn how to do this here.Terms of Use vs. Terms of Service: what&rsquo;s the difference between Terms and Conditions, Terms of Service and Terms of Use?<br />\r\nIn general, there is no legal difference. Terms and conditions, terms of service and terms of use are names all used to refer to the same document. The particular name used at any point in time is simply a matter of preference.<br />\r\nPrivacy Policy vs. Terms and Conditions: what&rsquo;s the difference between these two legal documents?<br />\r\nPrivacy policy and terms and conditions are both legally binding agreements, but:<br />\r\nPrivacy policies are legally required under most countries&rsquo; legislations. They protect and inform your users and declare your compliance with applicable privacy laws in a legally binding way. While they do give you some leeway in terms of stating things such as how you handle &ldquo;do not track&rdquo; requests, they are generally aimed at protecting the user (more in our Legal Requirements Overview).<br />\r\nTerms and conditions are aimed at protecting the business (you). They give business owners the opportunity to set their rules (within applicable law) of how their service or product may be used including, but not limited to, things like copyright conditions, age limits, and the governing law of the contract. While terms are generally not legally required (like the privacy policy), it is essential for protecting your interests as a business owner.</p>\r\n', '', 2, 1, NULL, '2023-08-19 15:41:09:pm'),
(10, 'Privacy policy', '<p>Thank you for visiting [Infinity Business Solution]. Your privacy is important to us, and we are committed to protecting your personal information. This Privacy Policy outlines how we collect, use, disclose, and safeguard your information. By using our services, you consent to the practices described in this policy.</p>\r\n\r\n<p><strong>Information We Collect</strong></p>\r\n\r\n<p>We may collect personal information such as your name, email address, phone number, and job title when you interact with our website, products, or services. We also gather non-personal information like IP addresses, browser type, and device identifiers for analytical purposes.</p>\r\n\r\n<p><strong>How We Use Your Information</strong></p>\r\n\r\n<p>We use the information collected to provide and improve our services, personalize your experience, communicate with you, and send you updates about our products and promotions. We may share your information with third-party service providers to facilitate these activities, but we do not sell your data to third parties.</p>\r\n\r\n<p><strong>Cookies and Tracking Technologies</strong></p>\r\n\r\n<p>We use cookies and similar tracking technologies to enhance your browsing experience, analyze usage patterns, and gather demographic information. You can control how cookies are used through your browser settings.</p>\r\n\r\n<p><strong>Data Security</strong></p>\r\n\r\n<p>We employ industry-standard security measures to protect your information from unauthorized access, alteration, or disclosure. However, please note that no method of transmission over the internet or electronic storage is entirely secure.</p>\r\n\r\n<p><strong>Your Choices</strong></p>\r\n\r\n<p>You have the right to access, correct, and delete your personal information. You can also choose to opt out of receiving marketing communications from us at any time.</p>\r\n\r\n<p><strong>Children&#39;s Privacy</strong></p>\r\n\r\n<p>Our services are not intended for individuals under the age of 13. We do not knowingly collect personal information from children. If you believe your child has provided us with personal information, please contact us to have it removed.</p>\r\n\r\n<p><strong>Changes to this Privacy Policy</strong></p>\r\n\r\n<p>We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new policy on our website.</p>\r\n\r\n<p><strong>Contact Us</strong></p>\r\n\r\n<p>If you have any questions or concerns about our Privacy Policy, please contact us at [contact email/phone number].</p>\r\n\r\n<p>This privacy policy is provided as an example. Companies should tailor their privacy policies to their specific practices, applicable laws, and business operations. It&#39;s recommended to consult legal professionals when creating or updating privacy policies.</p>\r\n', '', 2, 1, NULL, '2023-08-29 11:50:39:am'),
(11, 'Publishers', '<p>We leverage industry best practices that meet publisher-specific needs and provide unparalleled process governance to ensure success. This allows you to control and scale costs without compromising on quality.</p>\r\n', '', 2, 1, NULL, '2023-09-10 10:24:44:am'),
(16, 'Agencies', '<p>As agencies grow, internal staffing and training become a significant hurdle. Infinity Business Solution Teams function as an extension of your internal team. We allow you to focus on strategy, creativity, and mission-critical assignments while avoiding the headaches that come with staffing, training, and retaining top talent.</p>\r\n', '64821b5d38e591686248285.png', 2, 1, NULL, '2023-08-28 16:49:51:pm'),
(17, 'Data Entry', '<p>Companies experience growth at a pace so rapid, it&rsquo;s challenging to meet resourcing demands. We work with you to provide fast, effective scalability and flexibility without sacrificing quality.</p>\r\n', '648217328b5311686247218.png', 1, 1, NULL, '2023-09-04 18:42:42:pm'),
(18, 'INFINITY  BUSINESS SOLUTION : WHY', '<p>We are the fastest rising outsourcing company that goes beyond simply carrying out duties; instead, we try to comprehend and improve your company&#39;s operations so you may grow, save money, and thrive. Many of the biggest names in data entry, digital advertising, and organizations rely on Infinity Business Solution to perform time-consuming chores in the background so you and your team can concentrate on your mission-critical operations.<br />\r\n&nbsp;</p>\r\n', '6478e9ca45f871685645770.php', 2, 1, NULL, '2023-09-13 21:21:56:pm'),
(19, 'How We Work', '<p>We do more than just provide expert support; we build relationships. We are here to solve the problems you face today and tomorrow. Our partnerships typically span years, even decades. Why? Because we make it a priority to learn the ins and outs of your business, so we can provide the highest level of expertise and support. We work tirelessly to become a seamless expansion of your internal team. We utilize the same platforms, procedures, and processes as you do, allowing you to quickly and easily flex up or down to match the ebb and flow of your business. It&#39;s our mission to relieve the stress of the day-to-day demands, so you can focus more on what matters most for your clients and your business.</p>\r\n', '', 2, 1, '2023-08-17 06:00:44', '2023-08-29 11:41:29:am'),
(20, 'About Us footer', '<p>Because we make it a priority to learn the ins and outs of your business, so we can provide the highest level of expertise and support. We work tirelessly to become a seamless expansion of your internal team. We utilize the same platforms, procedures, and processes</p>\r\n', '', 2, 1, '2023-08-17 06:03:47', '2023-09-10 10:24:24:am'),
(21, 'Mission & Vision', '<table border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" src=\"https://infinitybusinesssolution.org/admin/upload/16932209291324920755.jpg\" style=\"border-style:solid; border-width:0px; height:100%; width:100%\" /></td>\r\n			<td>\r\n			<p><span style=\"font-size:22px\"><strong>Mission</strong></span></p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp;&nbsp;<a href=\"https://en.wikipedia.org/wiki/File:U%2B2192.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/U%2B2192.svg/25px-U%2B2192.svg.png\" style=\"height:14px; width:25px\" /></a>To offer personalized IT and BPO services worldwide</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp;&nbsp;<a href=\"https://en.wikipedia.org/wiki/File:U%2B2192.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/U%2B2192.svg/25px-U%2B2192.svg.png\" style=\"height:14px; width:25px\" /></a>To ensure 100% client satisfaction by providing high-quality services</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp;&nbsp;<a href=\"https://en.wikipedia.org/wiki/File:U%2B2192.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/U%2B2192.svg/25px-U%2B2192.svg.png\" style=\"height:14px; width:25px\" /></a>To develop a vast team of skilled IT professionals&nbsp;</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp;&nbsp;<a href=\"https://en.wikipedia.org/wiki/File:U%2B2192.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/U%2B2192.svg/25px-U%2B2192.svg.png\" style=\"height:14px; width:25px\" /></a>To provide personalized and holistic solutions</p>\r\n\r\n			<p><span style=\"font-size:22px\"><strong>Vision</strong></span></p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp;&nbsp;<a href=\"https://en.wikipedia.org/wiki/File:U%2B2192.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/U%2B2192.svg/25px-U%2B2192.svg.png\" style=\"height:14px; width:25px\" /></a>To become a trusted name in the global tech industry through our services</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp;&nbsp;<a href=\"https://en.wikipedia.org/wiki/File:U%2B2192.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/U%2B2192.svg/25px-U%2B2192.svg.png\" style=\"height:14px; width:25px\" /></a>To adopt newer technologies and platforms efficiently</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp;&nbsp;<a href=\"https://en.wikipedia.org/wiki/File:U%2B2192.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/U%2B2192.svg/25px-U%2B2192.svg.png\" style=\"height:14px; width:25px\" /></a>To revolutionize businesses with game-changing solutions</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp; <a href=\"https://en.wikipedia.org/wiki/File:U%2B2192.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/U%2B2192.svg/25px-U%2B2192.svg.png\" style=\"height:14px; width:25px\" /></a>To become a sustainable and responsible IT and BPO service provider</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<h2><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:22px\"><strong>Core Values</strong></span></span></h2>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/File:U%2B2192.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/U%2B2192.svg/25px-U%2B2192.svg.png\" style=\"height:14px; width:25px\" /></a>&nbsp;&nbsp;<span style=\"color:#000000\"><strong>Trust</strong></span></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; We never take back our word and do what we say. We take full responsibility for all our actions and back every word with strong determination.</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/File:U%2B2192.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/U%2B2192.svg/25px-U%2B2192.svg.png\" style=\"height:14px; width:25px\" /></a><span style=\"font-size:20px\">&nbsp;</span><span style=\"color:#000000\"><strong>Respect</strong></span></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; We respect each person as we believe each person is unique. We respect other organizations and help them bring out their full potential.</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/File:U%2B2192.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/U%2B2192.svg/25px-U%2B2192.svg.png\" style=\"height:14px; width:25px\" /></a>&nbsp;<span style=\"color:#000000\"><strong>Commitment</strong></span></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;The dedication of our team extends beyond the good of the company, to the betterment and success of our clients by allocating the required resources and training to exceed your goals.</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/File:U%2B2192.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/U%2B2192.svg/25px-U%2B2192.svg.png\" style=\"height:14px; width:25px\" /></a>&nbsp;<span style=\"color:#000000\"><strong>Quality</strong></span></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Everything we do is to be of the highest quality. Quality will not just be about service delivery. The business practices we employ, the people we hire, the facilities we operate, and the technology we use will be innovative and best-in-class. We insist on having the highest standards.</p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/File:U%2B2192.svg\"><img src=\"https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/U%2B2192.svg/25px-U%2B2192.svg.png\" style=\"height:14px; width:25px\" /></a>&nbsp;<span style=\"color:#000000\"><strong>Teamwork</strong></span></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Organizations are as successful as their employees and we owe all our success to the collective efforts, dedication, and hard work of our teams. We strive to be a great place to work where people are inspired to be the best they can be.</p>\r\n', '64ec7e87c69d01693220487.jpg', 2, 1, '2023-08-28 07:53:28', '2023-08-28 17:56:02:pm');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `show_web` varchar(255) DEFAULT '1',
  `activity` int NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `name`, `photo`, `link`, `type`, `show_web`, `activity`, `create_at`) VALUES
(1, 'FNRBCCI', NULL, 'http://fnrbcci.org/  ', 'ecommerce', '1', 1, '2023-06-14 16:18:43'),
(2, 'Dhaka Bazaar', NULL, 'http://dhakabazar24.com  ', 'ecommerce', '1', 1, '2023-06-14 16:20:28'),
(3, 'Salambd', NULL, ' http://www.salambd.com/ ', 'ecommerce', '1', 1, '2023-06-14 16:23:27'),
(4, 'Amader Somoy', NULL, 'http://amadershomoy24.com/ ', 'newsportal', '1', 1, '2023-06-14 16:23:43'),
(5, 'Anosbd', NULL, 'https://www.anosbd.com/  ', 'newsportal', '1', 1, '2023-06-14 16:24:06'),
(6, 'DML71', NULL, 'http://www.dml71.com/ ', 'ecommerce', '1', 1, '2023-06-14 16:24:26'),
(7, 'ZYLISHPARK', NULL, ' http://www.zylishpark.com/', 'ecommerce', '1', 1, '2023-06-14 16:24:43'),
(8, 'ATRUMPOWER', NULL, 'http://www.atrumpower.com/  ', 'ecommerce', '1', 1, '2023-06-14 16:25:13'),
(9, 'MAHAFUZEXPRESS', NULL, 'http://www.mahfuzexpress.com/index.php  ', 'ecommerce', '1', 1, '2023-06-14 16:25:31'),
(10, 'MSSANSAD', NULL, 'http://mssangsad.com/index.php?actionID=home  ...', 'corporate', '1', 1, '2023-06-14 16:25:57'),
(11, 'ROYELENERGY', NULL, 'http://www.royalenergy.uk.com/ ', 'corporate', '1', 1, '2023-06-14 16:26:12'),
(12, 'AKASHBANI24', NULL, 'http://www.akashbani24.com/ ', 'newsportal', '1', 1, '2023-06-14 16:28:24'),
(13, 'CPINEWS24', NULL, 'http://www.cpinews24.com/', 'newsportal', '1', 1, '2023-06-14 16:28:50'),
(14, 'Lightbreeze', NULL, 'http://lightbreeze.net/   ', 'corporate', '1', 1, '2023-06-14 16:29:14'),
(15, 'Protidinkhobor', NULL, 'http://www.protidinkhobor.com/   ', 'ecommerce', '1', 1, '2023-06-14 16:29:32'),
(16, 'Brandimagedesigner', NULL, 'http://brandimagedesigner.com/   ', 'corporate', '1', 1, '2023-06-14 16:29:50'),
(17, 'BURBD', NULL, 'http://www.burbd.com/', 'corporate', '1', 1, '2023-06-14 16:30:29'),
(18, 'Shohoz Group', NULL, 'http://www.shohozgroup.com/', 'corporate', '1', 1, '2023-06-14 16:30:57'),
(19, 'Cinefirerecords', NULL, 'http://www.cinefirerecords.com/', 'newsportal', '1', 1, '2023-06-14 16:31:53'),
(20, 'IHRJS', NULL, 'http://www.ihrjs.org/', 'corporate', '1', 1, '2023-06-14 16:32:22'),
(21, 'Gafargaon Govt College', NULL, 'http://www.gafargaongovtcollege.edu.bd', 'corporate', '1', 1, '2023-06-14 16:33:01'),
(22, 'Bpicc-Poultry', NULL, 'http://www.bpicc-poultry.com/ ', 'ecommerce', '1', 1, '2023-06-14 16:34:00'),
(23, 'Xport Channel Ltd.', NULL, 'http://www.xportchannel.com/', 'corporate', '1', 1, '2023-06-14 16:34:21'),
(24, 'Shoesbazarbd', NULL, 'http://www.shoesbazarbd.com/', 'ecommerce', '1', 1, '2023-06-14 16:34:54'),
(25, 'Mymarketbd', NULL, 'http://www.mymarketbd.com/', 'ecommerce', '1', 1, '2023-06-14 16:35:09'),
(26, 'Zerohour24', NULL, 'https://www.zerohour24.com/', 'newsportal', '1', 1, '2023-06-14 16:35:31'),
(27, 'Jafru.com.bd', NULL, 'http://www.jafru.com.bd/', 'ecommerce', '1', 1, '2023-06-14 16:35:51'),
(28, 'Reddotsourcing', NULL, 'http://www.reddotsourcing.com/ ', 'ecommerce', '1', 1, '2023-06-14 16:36:13'),
(29, 'Unityglobalnetwork', NULL, 'http://www.unityglobalnetwork.com/', 'corporate', '1', 1, '2023-06-14 16:36:32'),
(30, 'Darulhabibmadrasa', NULL, 'http://darulhabibmadrasa.com/', 'corporate', '1', 1, '2023-06-14 16:36:59'),
(31, 'আমার জনতা', NULL, 'http://www.amarjanata.com', 'ecommerce', '1', 1, '2023-06-14 16:37:33'),
(32, 'Ruplagiherbalcosmetics', NULL, 'http://www.ruplagiherbalcosmetics.com/', 'ecommerce', '1', 1, '2023-06-14 16:37:55'),
(33, 'Oportobd', NULL, 'http://www.oportobd.com/', 'ecommerce', '1', 1, '2023-06-14 16:38:45'),
(34, 'Safelifecsl', NULL, 'https://www.safelifecsl.com/', 'ecommerce', '1', 1, '2023-06-14 16:39:02'),
(35, 'আশুলিায় সংবাদ', NULL, 'http://www.ashuliasongbad.com/', 'newsportal', '1', 1, '2023-06-14 16:39:35'),
(36, 'USBD SHOPPING', NULL, 'https://usbdshopping.com/', 'ecommerce', '1', 1, '2023-06-14 16:40:02'),
(37, 'Barnamalacomputer', NULL, 'http://www.barnamalacomputer.com', 'corporate', '1', 1, '2023-06-14 16:40:32'),
(38, 'Multiplan Computer City', NULL, 'http://www.mpcictbazar.com', 'ecommerce', '1', 1, '2023-06-14 16:40:47'),
(39, 'Yashinair', NULL, 'http://yashinair.com/', 'corporate', '1', 1, '2023-06-14 16:41:17'),
(40, 'Skybangla TV', NULL, 'http://skybangla.tv/', 'newsportal', '1', 1, '2023-06-14 16:41:56'),
(41, 'Adbshopping', NULL, 'https://www.adbshopping.com/', 'ecommerce', '1', 1, '2023-06-14 16:42:15'),
(42, 'আমাদরে আইন', NULL, 'http://amaderain.org/', 'corporate', '1', 1, '2023-06-14 16:43:06'),
(43, 'Sellmarket', NULL, 'http://sellmarket.com.bd/', 'ecommerce', '1', 1, '2023-06-14 16:43:21'),
(44, 'CriticalStop', NULL, 'https://www.criticalstopbd.com/', 'corporate', '1', 1, '2023-06-14 16:43:44'),
(45, 'EkBillion', NULL, 'https://ekbillion.com/', 'ecommerce', '1', 1, '2023-06-14 16:44:10'),
(46, 'H & R Business LTD.', NULL, 'https://hrbusinesslimited.com/', 'ecommerce', '1', 1, '2023-06-14 16:44:34'),
(47, 'Giftmasterbd', NULL, 'http://www.giftmasterbd.com/', 'ecommerce', '1', 1, '2023-06-14 16:45:40'),
(48, 'Zerodegreeentertainment', NULL, 'http://zerodegreeentertainment.com/', 'ecommerce', '1', 1, '2023-06-14 16:46:00'),
(49, 'Banglamail', NULL, 'https://banglamail.com.bd/', 'corporate', '1', 1, '2023-06-14 16:46:19'),
(50, 'Hemonto TV', NULL, 'http://hemonto.tv/', 'corporate', '1', 1, '2023-06-14 16:46:38'),
(51, 'Sabushopltd', NULL, 'http://sabushopltd.com/', 'ecommerce', '1', 1, '2023-06-14 16:47:30'),
(52, 'Stallfy', NULL, 'http://stallfy.com/', 'ecommerce', '1', 1, '2023-06-14 16:47:47'),
(53, 'Universalefood', NULL, 'http://universalefood.com/', 'ecommerce', '1', 1, '2023-06-14 16:48:16'),
(54, 'Affanbeauty', NULL, 'http://affanbeauty.com/', 'ecommerce', '1', 1, '2023-06-14 16:48:43'),
(55, 'Elegancebdshop', NULL, 'http://elegancebdshop.com/', 'ecommerce', '1', 1, '2023-06-14 16:49:09'),
(56, 'Mrshopper', NULL, 'https://mrshopper.com.bd/', 'ecommerce', '1', 1, '2023-06-14 16:49:50'),
(57, 'Timdil', NULL, 'http://timdil.com.bd/', 'ecommerce', '1', 1, '2023-06-14 16:50:03'),
(58, 'PlayLearnDesign', NULL, 'http://playlearndesign.com/', 'corporate', '1', 1, '2023-06-14 16:50:33'),
(59, 'Janatarishtehar', NULL, 'https://janatarishtehar.com/', 'newsportal', '1', 1, '2023-06-14 16:51:02'),
(60, 'Privatefans', NULL, 'https://www.privatefans.com/', 'newsportal', '1', 1, '2023-06-14 16:51:22'),
(61, 'Differenttouch', NULL, 'https://differenttouch-usa.com/', 'ecommerce', '1', 1, '2023-06-14 16:52:13'),
(62, 'ECPL-BD', NULL, 'https://ecpl-bd.com/', 'corporate', '1', 1, '2023-06-14 16:52:40'),
(63, 'Digital Union Software', NULL, 'https://union.mrkbd.com/', 'corporate', '1', 1, '2023-06-14 16:53:16'),
(64, 'GoBuy', NULL, 'https://gobuy.com.bd/', 'ecommerce', '1', 1, '2023-06-14 16:53:51'),
(65, 'eKin', NULL, 'http://ekinbd.cyou/', 'ecommerce', '1', 1, '2023-06-14 16:54:12'),
(66, 'Jagrotabangla', NULL, 'http://jagrotabangla.com/', 'newsportal', '1', 1, '2023-06-14 16:54:31'),
(67, 'Ashuliabarta', NULL, 'https://ashuliabarta.com/', 'newsportal', '1', 1, '2023-06-14 16:55:02'),
(68, 'Bengolnews', NULL, 'https://bengolnews.com/', 'newsportal', '1', 1, '2023-06-14 16:55:24'),
(69, 'Turbinebd', NULL, 'https://www.turbinebd.com/', 'newsportal', '1', 1, '2023-06-14 16:55:42'),
(70, 'ShopLover', NULL, 'https://shoplover.com/', 'ecommerce', '1', 1, '2023-06-14 16:55:59'),
(71, 'Videoconbd', NULL, 'https://videoconbd.com/', 'ecommerce', '1', 1, '2023-06-14 16:56:19'),
(72, 'Wholesalecityzone', NULL, 'https://wholesalecityzone.com/', 'ecommerce', '1', 1, '2023-06-14 16:56:34'),
(73, 'Osudkini', NULL, 'https://osudkini.com/', 'ecommerce', '1', 1, '2023-06-14 16:56:52'),
(74, 'Redcodeinc', NULL, 'https://v2.redcodeinc.com', 'corporate', '1', 1, '2023-06-14 16:58:01'),
(75, 'Doctor Link', NULL, 'https://doctorlink.in/', 'corporate', '1', 1, '2023-06-14 16:58:22'),
(76, 'Buildtechliving', NULL, 'https://buildtechliving.com/', 'corporate', '1', 1, '2023-06-14 16:58:45'),
(77, 'Femininebykabir', NULL, 'https://femininebykabir.com/', 'ecommerce', '1', 1, '2023-06-14 16:59:01'),
(78, 'Faceve', NULL, 'https://faceve.com.bd/', 'ecommerce', '1', 1, '2023-06-14 16:59:21'),
(79, 'Frilly', NULL, 'http://frilly.com.bd/', 'ecommerce', '1', 1, '2023-06-14 16:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `service_color` varchar(255) DEFAULT NULL,
  `short_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `activity` int DEFAULT '1',
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `photo`, `service_color`, `short_title`, `description`, `activity`, `create_at`, `update_date`) VALUES
(4, 'Web & Apps Development', '64ec39585f7981693202776.jpg', NULL, 'Centered on the Specifics. So that you may concentrate on what is truly important, our specialists handle time-consuming trafficking, reporting, billing, and ad operations responsibilities.and ad operations id.hello', '<p>You ask ...We Build</p>\r\n\r\n<ul>\r\n	<li>Static Web Apps.</li>\r\n	<li>Dynamic Web Apps.</li>\r\n	<li>Single Page Apps.</li>\r\n	<li>Multiple Page Apps.</li>\r\n	<li>Animated Web Apps.</li>\r\n	<li>Content Management Systems.</li>\r\n	<li>E-commerce Web Apps.</li>\r\n	<li>Portal Apps.</li>\r\n</ul>\r\n', 1, '2023-08-16 08:37:34', NULL),
(5, 'Back-Office Support', '64e996188f04c1693029912.jpg', NULL, 'Streamline your operations. Leverage our experts to execute and optimize your administrative processes so you can focus on the big picture.', '<h2><strong><strong>Turn painful processes into productivity</strong></strong></h2>\r\n\r\n<p>At <strong><strong><strong>Infinity Business Solution</strong></strong></strong>, executing repetitive task work is what we do best. We can orchestrate and streamline administrative tasks so you and your team can focus on the revenue-generating areas of your business. Our years of expertise, in-depth platform knowledge, and proven governance methodologies are a cost-effective combination that will rid your business of back-office backlog. A dedicated <strong><strong><strong>Infinity Business Solution&nbsp;</strong></strong></strong>Team empowers your organization to focus on strategy, all while keeping costs low and productivity high.</p>\r\n\r\n<h2><strong><strong><strong>Why Choose Infinity Business Solution for Your Back-Office Needs?</strong></strong></strong></h2>\r\n\r\n<hr />\r\n<h3><strong><strong>Leverage an <strong>Infinity Business Solution&nbsp;</strong>Back-Office Team to:</strong></strong></h3>\r\n\r\n<ul>\r\n	<li>Remove business risks with rigorous compliance standards</li>\r\n	<li>Use technology to reduce time spent on routine tasks</li>\r\n	<li>Reduce the overhead associated with additional internal headcount</li>\r\n	<li>Receive actionable recommendations to achieve operational efficiency&nbsp;</li>\r\n	<li>Enhance your data management with our extensive platform knowledge&nbsp;</li>\r\n	<li>Gain visibility into each task for future improvement with thorough reporting</li>\r\n</ul>\r\n\r\n<h3>Our Success Metrics</h3>\r\n\r\n<ul>\r\n	<li>Accuracy: 99.79%</li>\r\n</ul>\r\n\r\n<h3>Services and Specializations</h3>\r\n\r\n<ul>\r\n	<li>Accounts management</li>\r\n	<li>Billing reconciliations</li>\r\n	<li>Customer support</li>\r\n	<li>Claims management</li>\r\n	<li>Data aggregation and entry&nbsp;</li>\r\n	<li>Fulfillment management</li>\r\n	<li>Order processing</li>\r\n	<li>Records maintenance</li>\r\n	<li>Reports consolidation</li>\r\n</ul>\r\n\r\n<h3>Technology</h3>\r\n\r\n<p><strong><strong>Seamless Tech Stack Integration</strong></strong></p>\r\n\r\n<p>Our teams are experts on hundreds of major back-end platforms. Our onboarding process is optimized to quickly and effectively train our employees on your proprietary platforms. These methodologies also empower our teams to analyze your processes and recommend ways technology can help you achieve your organizational goals faster.<br />\r\n<br />\r\nNo matter which tools and resources you use, our teams are in place to allow your company to reach new heights.</p>\r\n\r\n<h3>Looking for inspiration on how to successfully implement an <strong><strong><strong>Infinity Business Solution&nbsp;</strong></strong></strong>Team?</h3>\r\n', 1, '2023-08-16 08:39:18', NULL),
(6, 'Creative Services', '64ec39c55b6461693202885.jpg', NULL, 'Creativity at scale. We build and assemble heavy volumes of ads, campaigns, and creative materials. Our experts reduce turnaround times without sacrificing attention to detail.', '<h2>Expert Support for Your In-House or Agency Creatives</h2>\r\n\r\n<p>An Infinity Business Solution Creative Services Team provides access to world-class designers and developers who provide you with the bandwidth to accomplish a greater volume of creative tasks while helping to reduce turnaround times. Our dedicated, flexible, and rapidly scalable teams can operate 24/7/365, allowing you to adapt to changing needs quickly. Our teams are experts with virtually every major creative platform, including Adobe Illustrator, Photoshop, InDesign, and Figma, and can expertly manage and execute work throughout the entire campaign lifecycle.</p>\r\n\r\n<p>Infinity Business Solution ensures flawless delivery for even the most complex executions.</p>\r\n\r\n<h2><strong>What can an Infinity Business Solution</strong>&nbsp;<strong>Creative Team do for you?</strong></h2>\r\n\r\n<hr />\r\n<h3>Leverage a Infinity Business Solution Creative Services Team to:</h3>\r\n\r\n<ul>\r\n	<li>Access advanced skills for complex projects</li>\r\n	<li>Add bandwidth to internal teams</li>\r\n	<li>Ensure flawless delivery</li>\r\n	<li>Keep operating costs low</li>\r\n	<li>Reduce turnaround times and increase output</li>\r\n	<li>Utilize the industry&rsquo;s top creative platforms</li>\r\n</ul>\r\n\r\n<h3>Our Success Metrics</h3>\r\n\r\n<ul>\r\n	<li>SLA Creative Services Accuracy Percentage: 99.70%</li>\r\n	<li>Creative Services SLA Achievement Percentage: 99.72%</li>\r\n</ul>\r\n\r\n<h3>Services and Specializations</h3>\r\n\r\n<ul>\r\n	<li>Ad development</li>\r\n	<li>Creative development</li>\r\n	<li>Creative quality assurance</li>\r\n	<li>Custom, standard, and native ad design</li>\r\n	<li>Creative-level targeting implementation&nbsp;&nbsp;</li>\r\n	<li>Landing page design and development</li>\r\n	<li>Asset modification</li>\r\n	<li>Resizing and relabeling</li>\r\n	<li>Static, rich media and DCO builds</li>\r\n	<li>Website development</li>\r\n</ul>\r\n\r\n<h3>Technology</h3>\r\n\r\n<p><strong>Seamless Tech Stack Integration</strong></p>\r\n\r\n<p>Our teams are experts on hundreds of major back-end platforms. Our onboarding process is optimized to quickly and effectively train our employees on your proprietary platforms. These methodologies also empower our teams to analyze your processes and recommend ways technology can help you achieve your organizational goals faster.</p>\r\n\r\n<p>No matter which tools and resources you use, our teams are in place to allow your company to reach new heights.</p>\r\n', 1, '2023-08-16 08:40:08', NULL),
(7, 'Virtual  Assistant', '64e9970dce8ac1693030157.jpg', NULL, 'Stay committed to your customers. Provide your customers with the highest level of support and a reason to trust your brand.', '<h4><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:16px\">Virtual Assistance Service Provided by Infinity Business Solution</span></span></h4>\r\n\r\n<ul>\r\n	<li>\r\n	<h4><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:28px\"><sub><sup>Real Estate Virtual Assistant </sup></sub></span></span></h4>\r\n	</li>\r\n	<li>\r\n	<h4><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:28px\"><sub><sup>Administrative Virtual Asistant</sup></sub></span></span></h4>\r\n	</li>\r\n	<li>\r\n	<h4><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:28px\"><sub><sup>Data Entry Virtual Assistant</sup></sub></span></span></h4>\r\n	</li>\r\n	<li>\r\n	<h4><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:28px\"><sub><sup>Website Management Virtual Assistant</sup></sub></span></span></h4>\r\n	</li>\r\n	<li>\r\n	<h4><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:28px\"><sub><sup>Research Virtual Assistant</sup></sub></span></span></h4>\r\n	</li>\r\n	<li>\r\n	<h4><span style=\"font-family:Arial,Helvetica,sans-serif\"><span style=\"font-size:28px\"><sub><sup>Digital Marketing Virtual Assistant</sup></sub></span></span></h4>\r\n	</li>\r\n</ul>\r\n', 1, '2023-08-16 08:41:04', NULL),
(8, 'Research  (Web & Others)', '64ec3aaac8ea21693203114.jpg', NULL, 'Knowledge is power. Data Professionals quickly aggregate and analyze data at any scale, sorting through volumes of information to make it organized and actionable.', '<h2>Minimize Risk and Gain Greater Insight</h2>\r\n\r\n<p>At Infinity Business Solution, we know that the ability to accurately and reliably source, sort, and analyze data is crucial to your business. You need insights you can trust. Our experts are well-educated with backgrounds in risk, compliance, and data analytics. Your Infinity Business Solution Data Solutions Teams can provide 24/7/365 support to meet your specific requirements.</p>\r\n\r\n<h2>Why Choose an Infinity Business Solution Research (Web &amp; Others) Team?</h2>\r\n\r\n<hr />\r\n<h3>Leverage an Infinity Business Solution Data Solutions Team to:</h3>\r\n\r\n<ul>\r\n	<li>Achieve business confidence</li>\r\n	<li>Aggregate and analyze data</li>\r\n	<li>Gain valuable insight</li>\r\n	<li>Meet project deadlines reliably</li>\r\n	<li>Move data quickly</li>\r\n	<li>Scale teams easily</li>\r\n</ul>\r\n\r\n<h3>Our Success Metrics</h3>\r\n\r\n<ul>\r\n	<li>Data Solutions Accuracy: 99.37%</li>\r\n</ul>\r\n\r\n<h3>Services and Specializations</h3>\r\n\r\n<ul>\r\n	<li>Capturing risk-relevant data</li>\r\n	<li>Comprehensive summaries</li>\r\n	<li>Data aggregation</li>\r\n	<li>Data analysis</li>\r\n	<li>Data quality assurance</li>\r\n	<li>Enhanced due diligence</li>\r\n	<li>Platform migrations</li>\r\n	<li>Specialized reporting</li>\r\n	<li>Other data and analytics tasks as required</li>\r\n</ul>\r\n\r\n<h3>Technology</h3>\r\n\r\n<p><strong>Seamless Tech Stack Integration</strong></p>\r\n\r\n<p>Our teams are experts on hundreds of major back-end platforms. Our onboarding process is optimized to quickly and effectively train our employees on your proprietary platforms. These methodologies also empower our teams to analyze your processes and recommend ways technology can help you achieve your organizational goals faster.</p>\r\n\r\n<p>No matter which tools and resources you use, our teams are in place to allow your company to reach new heights.</p>\r\n', 1, '2023-08-16 08:41:53', NULL),
(9, 'Social Media Marketing', '64ec3b978bed51693203351.webp', NULL, 'Maximize campaign ROI. Our experts work as an extension of your team to provide experience-based insights. Leverage our teams to plan, review, and update media spending.', '<h2>Helping You Optimize and Maximize Your Social Media Marketing Spend</h2>\r\n\r\n<p>Media planning requires specialized skills and expertise. Partnering with Infinity Business Solution gives your advertising campaigns a strategic edge with access to industry experts and a thorough understanding of the media planning landscape. Our expertise empowers you to create campaigns based on data and insights right from the start to consistently achieve the highest ROI.</p>\r\n\r\n<p>Our Media Planning Professionals work as an extension of your team, allowing you to spend your time most productively.</p>\r\n\r\n<h2>Why Use Infinity Business Solution to Build Out Your Social Media Marketing Team?</h2>\r\n\r\n<hr />\r\n<h3>Leverage an Infinity Business Solution Media Planning Team to:</h3>\r\n\r\n<ul>\r\n	<li>Create customized media pricing plans</li>\r\n	<li>Manage media buys and execute campaigns</li>\r\n	<li>Organize ad specifications</li>\r\n	<li>Provide audience insights</li>\r\n	<li>Review supplier contracts</li>\r\n</ul>\r\n\r\n<h3>Our Success Metrics</h3>\r\n\r\n<ul>\r\n	<li>Media Planning Accuracy: 99.81%</li>\r\n</ul>\r\n\r\n<h3><strong>Services and Specializations</strong></h3>\r\n\r\n<ul>\r\n	<li>Create customized media pricing proposals</li>\r\n	<li>Manage media buys and execute campaigns&nbsp;</li>\r\n	<li>Build out custom plans&nbsp;</li>\r\n	<li>Organize ad specifications&nbsp;</li>\r\n	<li>Provide audience insights&nbsp;</li>\r\n	<li>Review supplier contracts&nbsp;</li>\r\n	<li>Create working target lists&nbsp;</li>\r\n	<li>Identify media opportunities&nbsp;</li>\r\n	<li>Craft omnichannel planning tactics&nbsp;</li>\r\n	<li>Submit bids in real-time&nbsp;</li>\r\n	<li>Ad trafficking tracking</li>\r\n</ul>\r\n\r\n<h3>Technology</h3>\r\n\r\n<p><strong>Seamless Tech Stack Integration</strong></p>\r\n\r\n<p>Our teams are experts on hundreds of major back-end platforms. Our onboarding process is optimized to quickly and effectively train our employees on your proprietary platforms. These methodologies also empower our teams to analyze your processes and recommend ways technology can help you achieve your organizational goals faster.</p>\r\n', 1, '2023-08-16 08:42:45', NULL),
(10, 'Data Entry & Data Analysis', '64ec3c46ea9011693203526.avif', NULL, 'Quality is everything. Teams use a process-driven approach to ensure your projects are executed to perfection. Test, validate, and audit anything – at scale.', '<p>Our goal is seamless integration; our teams work within your current process and will design custom solutions for nearly any Quality Assurance need.</p>\r\n\r\n<h2><strong>Services Infinity Business Solution Provides</strong></h2>\r\n\r\n<hr />\r\n<h3>Data Entry :</h3>\r\n\r\n<ul>\r\n	<li>Mortgage, Cargo, Medical, telecom Projects</li>\r\n	<li>All Kind of certificate digitization</li>\r\n	<li>KYC</li>\r\n	<li>Hand written documents in to soft copies</li>\r\n	<li>Copy-paste</li>\r\n	<li>Bank, Health sector Form filling and billing</li>\r\n	<li>Image to Excel, pdf to Excel Book and E-Book writing.</li>\r\n	<li>Proof reading.</li>\r\n	<li>Voice and video to scriptwriting and Transcription</li>\r\n	<li>Web research</li>\r\n	<li>Database Management</li>\r\n	<li>Data Mining</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Our Success Metrics</h3>\r\n\r\n<ul>\r\n	<li>Quality Assurance Accuracy: 100%</li>\r\n</ul>\r\n\r\n<h3>Specializations</h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Legal documents data entry&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>Insurance claims data entry&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>Offline data entry&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>Online data entry&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p>Image data entry<strong> </strong></p>\r\n	</li>\r\n</ul>\r\n\r\n<h3>Technology</h3>\r\n\r\n<p><strong>Seamless Tech Stack Integration</strong></p>\r\n\r\n<p>Our teams are experts on hundreds of major back-end platforms. Our onboarding process is optimized to quickly and effectively train our employees on your proprietary platforms. These methodologies also empower our teams to analyze your processes and recommend ways technology can help you achieve your organizational goals faster.</p>\r\n\r\n<p>No matter which tools and resources you use, our teams are in place to allow your company to reach new heights.</p>\r\n', 1, '2023-08-16 08:43:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `link` text,
  `type` int NOT NULL DEFAULT '1',
  `activity` int NOT NULL DEFAULT '1',
  `date` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `photo`, `link`, `type`, `activity`, `date`, `create_at`) VALUES
(4, 'Welcome to Infinity Business Solution', '64f5d7200a66d1693832992.jpg', '#', 1, 1, '2023-09-04 07:10:52pm', '2023-09-04 13:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `activity` int NOT NULL DEFAULT '1',
  `date` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `designation`, `photo`, `activity`, `date`, `create_at`) VALUES
(3, 'Ashan Morshed Nidol', 'Co-Founder & Managing Director', '64e982f4906c91693025012.jpg', 1, '2023-08-26 10:43:00am', '2023-06-19 16:14:43'),
(4, 'Mosharaf Hossain', 'Co-Founder & Assistant Managing Director', '64f30218b34541693647384.jpg', 1, '2023-09-02 03:36:11pm', '2023-06-19 16:22:51'),
(5, 'Abid Rahman Ankit', 'Co-Founder & Chief Executive Officer ', '64e983437bb5b1693025091.jpg', 1, '2023-08-26 10:44:30am', '2023-06-19 16:23:03'),
(6, 'Mahmodul Hasan', 'Co-Founder & Chief Financial Officer', '64f30225de4c11693647397.jpg', 1, '2023-09-02 03:36:29pm', '2023-06-19 16:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `upload_files`
--

CREATE TABLE `upload_files` (
  `id` int NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `pro_id` varchar(255) DEFAULT NULL,
  `files` varchar(255) NOT NULL,
  `type` int NOT NULL DEFAULT '0',
  `activity` int NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_files`
--

INSERT INTO `upload_files` (`id`, `user_id`, `pro_id`, `files`, `type`, `activity`, `create_at`) VALUES
(1, '9', '7', '6307f53913d621661465913.webp', 1, 1, '2022-08-25 16:18:33'),
(2, '9', '7', '6307f539220db1661465913.jpg', 1, 1, '2022-08-25 16:18:33'),
(3, '9', '7', '6307f5393048e1661465913.webp', 1, 1, '2022-08-25 16:18:33'),
(4, '9', '7', '6307f5393e84a1661465913.png', 1, 1, '2022-08-25 16:18:33'),
(5, '9', '7', '6307f53954fa91661465913.png', 1, 1, '2022-08-25 16:18:33'),
(6, '9', '7', '6307f53986b911661465913.webp', 1, 1, '2022-08-25 16:18:33'),
(7, '9', '7', '6307f53993ed11661465913.webp', 1, 1, '2022-08-25 16:18:33'),
(8, '9', '7', '6307f539a1b571661465913.jpg', 1, 1, '2022-08-25 16:18:33'),
(9, '9', '8', '6307ffec1f1961661468652.jpg', 1, 1, '2022-08-25 17:04:12'),
(10, '9', '8', '6307ffec3367c1661468652.png', 1, 1, '2022-08-25 17:04:12'),
(11, '9', '8', '6307ffec41a721661468652.png', 1, 1, '2022-08-25 17:04:12'),
(12, '9', '8', '6307ffec493bb1661468652.png', 1, 1, '2022-08-25 17:04:12'),
(24, NULL, '12', '6377ca149036e1668794900.jpg', 1, 1, '2022-11-18 12:08:20'),
(25, NULL, '12', '6377ca693780f1668794985.jpg', 1, 1, '2022-11-18 12:09:45'),
(26, NULL, '12', '6377ca7c9a4741668795004.jpg', 1, 1, '2022-11-18 12:10:04'),
(27, NULL, '12', '6377ca90b00c51668795024.jpg', 1, 1, '2022-11-18 12:10:24'),
(30, '9', '21', '638b6ca58f0d81670081701.jpeg', 1, 1, '2022-12-03 09:35:01'),
(31, '9', '22', '63b04a2742d841672497703.jpg', 1, 1, '2022-12-31 08:41:43'),
(32, '9', '22', '63b04a27434b61672497703.jpg', 1, 1, '2022-12-31 08:41:43'),
(33, '9', '22', '63b04a2743a3d1672497703.jpg', 1, 1, '2022-12-31 08:41:43'),
(34, '9', '22', '63b04a2743f0e1672497703.jpg', 1, 1, '2022-12-31 08:41:43'),
(35, '9', '22', '63b04a27444fe1672497703.jpg', 1, 1, '2022-12-31 08:41:43'),
(36, '9', '22', '63b04a2744a381672497703.jpg', 1, 1, '2022-12-31 08:41:43'),
(37, '9', '23', '63b04e776dc4c1672498807.jpg', 1, 1, '2022-12-31 09:00:07'),
(38, '9', '23', '63b04e776e18f1672498807.jpg', 1, 1, '2022-12-31 09:00:07'),
(39, '9', '23', '63b04e776e4c51672498807.jpg', 1, 1, '2022-12-31 09:00:07'),
(40, '9', '23', '63b04e776e7391672498807.jpg', 1, 1, '2022-12-31 09:00:07'),
(41, '9', '23', '63b04e776eb2a1672498807.jpg', 1, 1, '2022-12-31 09:00:07'),
(42, '9', '23', '63b04e776ed691672498807.jpeg', 1, 1, '2022-12-31 09:00:07'),
(43, '9', '23', '63b04e776eef91672498807.jpg', 1, 1, '2022-12-31 09:00:07'),
(44, '9', '23', '63b04e776f18d1672498807.jpeg', 1, 1, '2022-12-31 09:00:07'),
(45, '9', '23', '63b04e776f33f1672498807.jpg', 1, 1, '2022-12-31 09:00:07'),
(46, '9', '23', '63b04e776f6a41672498807.jpg', 1, 1, '2022-12-31 09:00:07'),
(47, '9', '23', '63b04e776f9931672498807.jpg', 1, 1, '2022-12-31 09:00:07'),
(48, '9', '24', '63b411d9ef1eb1672745433.jpg', 1, 1, '2023-01-03 05:30:33'),
(49, '9', '27', '63be6c93608941673424019.webp', 1, 1, '2023-01-11 02:00:19'),
(50, '9', '117', '63e4dbc161f8a1675942849.jpg', 1, 1, '2023-02-09 05:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `mobile` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `photo` varchar(255) DEFAULT NULL,
  `type` int NOT NULL DEFAULT '1',
  `activity` int NOT NULL DEFAULT '1',
  `date` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `user_type`, `name`, `mobile`, `email`, `password`, `salt`, `address`, `photo`, `type`, `activity`, `date`, `create_at`) VALUES
(1, '', 'customer', 'মনির আহেমদ পাটওয়ারী', '01625804712', 'admin@gmail.com', '5c9476e8fabf4305270fa99bd016990637cabe44b87a606ba8e2424a6c28e26646796deffcea6fc3ab31b5bf45496b0129a2f911405fc550b8dd9883db73221d', '3274f44fcfc2f530fcf2f28dab092c7409a2b0c04a58ef77221d32cb45816b082f2663f870672a2da5e14992afd9f35f28a951eb05a8a3bd1ec6093799eb5d53', 'Dhaka, Bangladesh', 'photo.png', 1, 1, '2022-11-22', '2022-11-21 12:38:17'),
(2, '', 'customer', 'NIGUR SULTANA', '01712510240', 'ddd@gasf.com', '6adcf1c54722068325ae44ebbf265985d5ba41ed1289613011dff39a1d08bfb01f4e253224468fe2c9d03a040be2b488e57c8dc0b7814a85e2ac71dc0d900171', '49cf6b0b384823e2e8cbe63ca35cb76a4fe6819c96536e6ccc2377682aac6efc5c1be302b36b53d19e900119f2b097d03514252ca10d082ea7b2dee2a93125e8', 'House # 12, Road # 2, Nandipara, Basaboo Khilgoan', NULL, 1, 1, '2022-11-22', '2022-11-21 12:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `website_setting`
--

CREATE TABLE `website_setting` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `admin` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `google` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instgram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `update_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `website_setting`
--

INSERT INTO `website_setting` (`id`, `name`, `admin`, `url`, `mobile`, `email`, `address`, `logo`, `copyright`, `facebook`, `google`, `twitter`, `instgram`, `linkedin`, `update_at`) VALUES
(1, 'infiniteBusiness', 'https://infinitybusinesssolution.org/admin/', 'https://infinitybusinesssolution.org/', '+8801603796000', 'info@infinitybusinesssolution.org', '21/4/A Jigatola, Dhanmondi, Dhaka-1209', '64dc896d1a85a1692174701.png', 'Copyright © 2023 infinitybusinesssolution All Right Reserved Developed by', 'https://www.facebook.com/mrkbd1', '#', 'https://twitter.com/home', '#', 'https://www.linkedin.com/company/infinity-business-solution-bd', '2023-09-04 07:15:34pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrer`
--
ALTER TABLE `carrer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_process`
--
ALTER TABLE `our_process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upload_files`
--
ALTER TABLE `upload_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `website_setting`
--
ALTER TABLE `website_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carrer`
--
ALTER TABLE `carrer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `our_process`
--
ALTER TABLE `our_process`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `upload_files`
--
ALTER TABLE `upload_files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `website_setting`
--
ALTER TABLE `website_setting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
