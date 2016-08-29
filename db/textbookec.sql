-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2016 at 12:41 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `textbookec`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `username` varchar(255) NOT NULL,
  `textbookId` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `faculty` text NOT NULL,
  `department` text NOT NULL,
  `facultyJap` text NOT NULL,
  `departmentJap` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `faculty`, `department`, `facultyJap`, `departmentJap`) VALUES
(1, 'Humanities', 'ChristianStudies', 'äººæ–‡å­¦éƒ¨', 'ã‚­ãƒªã‚¹ãƒˆæ•™å­¦ç§‘'),
(2, 'Humanities', 'AnthropologyAndPhilosophy', 'äººæ–‡å­¦éƒ¨', 'äººé¡žæ–‡åŒ–å­¦ç§‘'),
(3, 'Humanities', 'PsychologyAndHumanRelations', 'äººæ–‡å­¦éƒ¨', 'å¿ƒç†äººé–“å­¦ç§‘'),
(4, 'Humanities', 'JapaneseStudies', 'äººæ–‡å­¦éƒ¨', 'æ—¥æœ¬æ–‡åŒ–å­¦ç§‘'),
(5, 'Economics', 'Economics', 'çµŒæ¸ˆå­¦éƒ¨', 'çµŒæ¸ˆå­¦ç§‘'),
(6, 'Law', 'Law', 'æ³•å­¦éƒ¨', 'æ³•å¾‹å­¦ç§‘'),
(7, 'ForeignStudies', 'BritishAndAmericanStudies', 'å¤–å›½èªžå­¦éƒ¨', 'è‹±ç±³å­¦ç§‘'),
(8, 'ForeignStudies', 'SpanishAndLatinAmericanStudies', 'å¤–å›½èªžå­¦éƒ¨', 'ã‚¹ãƒšã‚¤ãƒ³ãƒ»ãƒ©ãƒ†ãƒ³ã‚¢ãƒ¡ãƒªã‚«å­¦ç§‘'),
(9, 'ForeignStudies', 'FrenchStudies', 'å¤–å›½èªžå­¦éƒ¨', 'ãƒ•ãƒ©ãƒ³ã‚¹å­¦ç§‘'),
(10, 'ForeignStudies', 'GermanStudies', 'å¤–å›½èªžå­¦éƒ¨', 'ãƒ‰ã‚¤ãƒ„å­¦ç§‘'),
(11, 'ForeignStudies', 'AsianStudies', 'å¤–å›½èªžå­¦éƒ¨', 'ã‚¢ã‚¸ã‚¢å­¦ç§‘'),
(12, 'BusinessAdministration', 'BusinessAdministration', 'çµŒå–¶å­¦éƒ¨', 'çµŒå–¶å­¦ç§‘'),
(13, 'ScienceAndEngineering', 'Mechatronics', 'ç†å·¥å­¦éƒ¨', 'æ©Ÿæ¢°é›»å­åˆ¶å¾¡å·¥å­¦ç§‘'),
(14, 'ScienceAndEngineering', 'SoftwareEngineering', 'ç†å·¥å­¦éƒ¨', 'ã‚½ãƒ•ãƒˆã‚¦ã‚§ã‚¢å·¥å­¦ç§‘'),
(15, 'ScienceAndEngineering', 'SystemAndMathmaticalScience', 'ç†å·¥å­¦éƒ¨', 'ã‚·ã‚¹ãƒ†ãƒ æ•°ç†å­¦ç§‘'),
(16, 'JuniorCollege', 'English', 'çŸ­æœŸå¤§å­¦éƒ¨', 'è‹±èªžç§‘'),
(17, 'PolicyStudies', 'PolicyStudies', 'ç·åˆæ”¿ç­–å­¦éƒ¨', 'ç·åˆæ”¿ç­–å­¦ç§‘');

-- --------------------------------------------------------

--
-- Table structure for table `guestpurchase`
--

CREATE TABLE `guestpurchase` (
  `id` int(11) NOT NULL,
  `purchaser` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `textbookId` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `seller` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unread',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`sender`, `receiver`, `text`, `status`, `date`) VALUES
('masafumi', 'masa1209', 'what are your doing? How are you?', 'read', '2016-07-19 21:34:00'),
('masafumi', 'masa1209', 'this is a test message', 'read', '2016-07-20 07:49:59'),
('masa1209', 'masafumi', 'hello world', 'unread', '2016-07-20 08:10:21'),
('masa1209', 'masafumi', 'hello from india', 'unread', '2016-07-20 19:15:51'),
('masa1209', 'masafumi', 'hello from india', 'unread', '2016-07-20 19:17:47'),
('masa1209', 'masa1209', '(2016-07-20 16-17-12)ã«masa1209æ§˜ã®å•†å“ã§ã‚ã‚‹ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ‘ã‚¹ æˆæžœã‚’å‡ºã™ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®é€²ã‚æ–¹ (800å††)ã®è³¼å…¥ã‚’masa1209æ§˜ãŒå¸Œæœ›ã™ã‚‹ãŸã‚è‡ªå‹•ã§é€£çµ¡ã—ã¦ãŠã‚Šã¾ã™ã€‚ã“ã“ã‹ã‚‰å—ã‘å–ã‚Šå ´æ‰€ã€æ—¥æ™‚ãªã©ã®é€£çµ¡ã‚’ãŠé¡˜ã„ã„ãŸã—ã¾ã™', 'read', '2016-07-20 19:47:12'),
('masa1209', 'masa1209', 'äº†è§£ã§ã™ã€‚å ´æ‰€ã¯å—å±±å¤§å­¦æ­£é–€ã€‚æ™‚é–“ã¯åˆå‰11æ™‚ã€‚æ—¥ç¨‹ã¯12æœˆ9æ—¥ã¯ã„ã‹ãŒã§ã—ã‚‡ã†ã‹ï¼Ÿ', 'read', '2016-07-20 19:52:53'),
('masa1209', 'masa1209', 'äº†è§£ã§ã™ã€‚å ´æ‰€ã¯å—å±±å¤§å­¦æ­£é–€ã€‚æ™‚é–“ã¯åˆå‰11æ™‚ã€‚æ—¥ç¨‹ã¯12æœˆ9æ—¥ã¯ã„ã‹ãŒã§ã—ã‚‡ã†ã‹ï¼Ÿ', 'read', '2016-07-20 19:54:51'),
('masa1209', 'masafumi', 'ç¾åœ¨ã®æ™‚åˆ»ã¯date(D)ã§ã™', 'unread', '2016-07-20 19:55:12'),
('masa1209', 'masa1209', 'äº†è§£ã§ã™ã€‚å ´æ‰€ã¯å—å±±å¤§å­¦æ­£é–€ã€‚æ™‚é–“ã¯åˆå‰11æ™‚ã€‚æ—¥ç¨‹ã¯12æœˆ9æ—¥ã¯ã„ã‹ãŒã§ã—ã‚‡ã†ã‹ï¼Ÿ', 'read', '2016-07-20 19:55:47'),
('masa1209', 'masa1209', 'äº†è§£ã§ã™ã€‚å ´æ‰€ã¯å—å±±å¤§å­¦æ­£é–€ã€‚æ™‚é–“ã¯åˆå‰11æ™‚ã€‚æ—¥ç¨‹ã¯12æœˆ9æ—¥ã¯ã„ã‹ãŒã§ã—ã‚‡ã†ã‹ï¼Ÿ', 'read', '2016-07-20 20:01:14'),
('åŠ è—¤å°†æ–‡', 'masa1209', 'masa1209æ§˜ã®å•†å“ã§ã‚ã‚‹ã€Œã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ‘ã‚¹ æˆæžœã‚’å‡ºã™ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®é€²ã‚æ–¹ ã€(800å††)ã®è³¼å…¥ã‚’åŠ è—¤å°†æ–‡æ§˜ãŒç¾åœ¨å¸Œæœ›ã•ã‚Œã¾ã—ãŸã®ã§è‡ªå‹•ã§é€£çµ¡ã—ã¦ãŠã‚Šã¾ã™ã€‚ãªãŠã€åŠ è—¤å°†æ–‡æ§˜ã¯ãƒ¦ãƒ¼ã‚¶ãƒ¼ç™»éŒ²ã•ã‚Œã¦ã„ãªã„ãŸã‚ãƒ¡ãƒ¼ãƒ«ã§ã®ã‚„ã‚Šå–ã‚Šã«ãªã‚Šã¾ã™ã€‚ãã®ãŸã‚ã“ã®ãƒ¡ãƒƒã‚»ãƒ¼ã‚¸ã«è¿”ä¿¡ã§ã¯ãªãã€masa@yahoo.co.jpã«å—ã‘å–ã‚Šã®è©³ç´°ã‚’è¨˜è¼‰ã®ä¸Šé€£çµ¡ã—ã¦ãã ã•ã„ã€‚å®œã—ããŠé¡˜ã„è‡´ã—ã¾ã™ã€‚', 'read', '2016-07-23 10:01:10'),
('åŠ è—¤å°†æ–‡', 'masa1209', 'masa1209æ§˜ã®å•†å“ã§ã‚ã‚‹ã€Œã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ‘ã‚¹ æˆæžœã‚’å‡ºã™ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®é€²ã‚æ–¹ ã€(800å††)ã®è³¼å…¥ã‚’åŠ è—¤å°†æ–‡æ§˜ãŒç¾åœ¨å¸Œæœ›ã•ã‚Œã¾ã—ãŸã®ã§è‡ªå‹•ã§é€£çµ¡ã—ã¦ãŠã‚Šã¾ã™ã€‚ãªãŠã€åŠ è—¤å°†æ–‡æ§˜ã¯ãƒ¦ãƒ¼ã‚¶ãƒ¼ç™»éŒ²ã•ã‚Œã¦ã„ãªã„ãŸã‚ãƒ¡ãƒ¼ãƒ«ã§ã®ã‚„ã‚Šå–ã‚Šã«ãªã‚Šã¾ã™ã€‚ãã®ãŸã‚ã“ã®ãƒ¡ãƒƒã‚»ãƒ¼ã‚¸ã«è¿”ä¿¡ã§ã¯ãªãã€masa@yahoo.co.jpã«å—ã‘å–ã‚Šã®è©³ç´°ã‚’è¨˜è¼‰ã®ä¸Šé€£çµ¡ã—ã¦ãã ã•ã„ã€‚å®œã—ããŠé¡˜ã„è‡´ã—ã¾ã™ã€‚', 'read', '2016-07-23 10:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `purchaser` varchar(255) NOT NULL,
  `seller` varchar(255) NOT NULL,
  `textbookId` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `purchaser`, `seller`, `textbookId`, `title`, `price`, `date`) VALUES
(1, 'masafumi', 'masa1209', 10, 'ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ‘ã‚¹ æˆæžœã‚’å‡ºã™ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®é€²ã‚æ–¹ ', 800, '2016-07-24 19:00:39'),
(8, 'masafumi', 'masa1209', 10, 'ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ‘ã‚¹ æˆæžœã‚’å‡ºã™ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®é€²ã‚æ–¹ ', 800, '2016-07-24 19:00:39'),
(9, 'masa1209', 'masa1209', 10, 'ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ‘ã‚¹ æˆæžœã‚’å‡ºã™ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®é€²ã‚æ–¹ ', 800, '2016-07-24 19:00:39'),
(10, 'masa1209', 'masa1209', 10, 'ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ‘ã‚¹ æˆæžœã‚’å‡ºã™ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®é€²ã‚æ–¹ ', 800, '2016-07-24 19:00:39'),
(11, 'masa1209', 'masa1209', 10, 'ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ‘ã‚¹ æˆæžœã‚’å‡ºã™ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®é€²ã‚æ–¹ ', 800, '2016-07-24 19:00:39'),
(12, 'masa1209', 'masa1209', 10, 'ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ‘ã‚¹ æˆæžœã‚’å‡ºã™ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®é€²ã‚æ–¹ ', 800, '2016-07-24 19:00:39'),
(13, 'masa1209', 'masa1209', 10, 'ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ‘ã‚¹ æˆæžœã‚’å‡ºã™ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®é€²ã‚æ–¹ ', 800, '2016-07-24 19:00:39'),
(14, 'masa1209', 'masa1209', 10, 'ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ‘ã‚¹ æˆæžœã‚’å‡ºã™ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®é€²ã‚æ–¹ ', 800, '2016-07-24 19:00:39'),
(15, 'masa1209', 'masa1209', 10, 'ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ‘ã‚¹ æˆæžœã‚’å‡ºã™ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®é€²ã‚æ–¹ ', 800, '2016-07-24 19:00:39'),
(16, 'åŠ è—¤å°†æ–‡', 'masa1209', 10, 'ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ‘ã‚¹ æˆæžœã‚’å‡ºã™ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®é€²ã‚æ–¹ ', 800, '2016-07-24 19:00:39'),
(17, 'åŠ è—¤å°†æ–‡', 'masa1209', 10, 'ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ‘ã‚¹ æˆæžœã‚’å‡ºã™ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®é€²ã‚æ–¹ ', 800, '2016-07-24 19:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `textbook` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `textbooks`
--

CREATE TABLE `textbooks` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `explanation` text NOT NULL,
  `image` text NOT NULL,
  `class` varchar(255) NOT NULL,
  `professor` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `exhibitor` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `situation` varchar(255) NOT NULL DEFAULT 'selling'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `textbooks`
--

INSERT INTO `textbooks` (`id`, `title`, `author`, `publisher`, `price`, `state`, `explanation`, `image`, `class`, `professor`, `faculty`, `department`, `exhibitor`, `date`, `situation`) VALUES
(1, 'ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ‘ã‚¹ æˆæžœã‚’å‡ºã™ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®é€²ã‚æ–¹ ', 'æ¨ªç”°å¹¸ä¿¡', 'æ—¥çµŒBPç¤¾', 1000, 'éžå¸¸ã«è‰¯ã„', '', 'upload/management.jpg', 'çµŒå–¶å­¦', 'ã‚¹ãƒ†ã‚£ãƒ¼ãƒ–ãƒ»ã‚¸ãƒ§ãƒ–ã‚¹', '????', 'business', 'testing account', '2016-07-16 09:02:27', 'selling'),
(2, 'å…¥é–€çµŒæ¸ˆå­¦ã€€ç¬¬ï¼”ç‰ˆ', 'ä¼Šè—¤å…ƒé‡', 'æ—¥æœ¬è©•è«–ç¤¾', 1500, 'å¤šå°‘å‚·ã‚ã‚Š', '', 'upload/economy.jpg', 'çµŒæ¸ˆå­¦', 'è©åŽŸé”å¤«', 'economics', 'economics', 'testing account', '2016-07-16 09:07:46', ''),
(3, 'äººæ–‡å­¦æ¦‚è«–', 'å®‰é…¸æ•çœž', 'çŸ¥æ³‰æ›¸é¤¨', 500, 'éžå¸¸ã«æ‚ªã„', '', 'upload/humanity.jpg', 'äººæ–‡å­¦', 'ãƒ˜ãƒ¬ãƒ³ãƒ»ã‚µã‚¤ãƒ³', 'humanities', 'anthropology', 'testing account', '2016-07-16 09:11:07', ''),
(4, 'ãƒªã‚¹ã‚¯ã‚’é£Ÿã¹ã‚‹:é£Ÿã¨ç§‘å­¦ã®ç¤¾ä¼šå­¦', 'æŸ„æœ¬ç¾Žä»£å­', 'é’å¼“ç¤¾', 1000, 'éžå¸¸ã«è‰¯ã„', '', 'upload/socioligy.jpg', 'ç¤¾ä¼šå­¦æ¦‚è«–', 'æ¾æˆ¸æ˜Žäºº', 'policy', 'policy', 'testing account', '2016-07-16 09:15:15', ''),
(5, 'æƒ…å ±ç†å·¥å­¦â€•æ±å¤§ç ”ç©¶è€…ãŒæãæœªæ¥', 'è©å°¾å¥½ç´€', 'æ±äº¬å¤§å­¦', 900, 'å¤šå°‘å‚·ã‚ã‚Š', 'ç§‘å­¦ã‚¸ãƒ£ãƒ¼ãƒŠãƒªã‚¹ãƒˆãŒ4å¹´ã«ã‚ãŸã£ã¦æœ€å…ˆç«¯ã®ç ”ç©¶è€…57åã«å¯†ç€å–æã€‚ã€Œæƒ…å ±ãƒ•ãƒ­ãƒ³ãƒ†ã‚£ã‚¢ã€ã®å…¨è²ŒãŒã“ã“ã«ã€‚', 'upload/science.jpg', 'æƒ…å ±ç ”ç©¶å…¥é–€', 'è»ç”Ÿä¸‰æ°', 'engineering', 'mechatronics', 'testing account', '2016-07-16 09:20:56', ''),
(6, 'è¿‘ä»£æ–‡åŒ–å²å…¥é–€', 'é«˜å±±å®', 'è¬›è«‡ç¤¾', 1500, 'å¤šå°‘å‚·ã‚ã‚Š', 'ä»Šã¾ã§ä½•ã®é–¢ä¿‚ã‚‚ãªã„ã¨æ€ã‚ã‚Œã¦ã„ãŸ2ã¤ã®ã‚‚ã®ãŒã€1ã¤ã§ã‚ã‚‹ã“ã¨ã‚’çŸ¥ã‚‹ã“ã¨ã“ãã€é­”è¡“ãƒ»ãƒžãƒ‹ã‚¨ãƒªã‚¹ãƒ ã®çœŸè«¦ã§ã‚ã‚‹ã€‚ãã—ã¦ã€ã“ã‚Œã“ããŒç©¶æ¥µã®ã€Œå¿«ã€ã§ã‚ã‚‹ã€‚å…‰å­¦ã€è¾žå…¸ã€å“²å­¦ã€ãƒ†ãƒ¼ãƒ–ãƒ«ã€åšç‰©å­¦ã€é€ åœ’è¡“ã€è¦‹ä¸–ç‰©ã€æ–‡å­—ã€è²¨å¹£ã€çµµç”»ã€çŽ‹ç«‹å”ä¼šâ€¦â€¦ã€‚è‹±å›½è¿‘ä»£å²ã‚’ä¿¯çž°ã—ã€æ­´å²ã®è£ã«éš ã•ã‚ŒãŸçŸ¥ã®æ°´è„ˆã‚’ã€ã¾ã‚‹ã§åæŽ¢åµãƒ›ãƒ¼ãƒ ã‚ºã®ã‚ˆã†ã«è§£æ˜Žã™ã‚‹ã€Œè„±é ˜åŸŸã®æ–‡åŒ–å­¦ã€ã®è©¦ã¿ã§ã‚ã‚‹ã€‚', 'upload/english.jpg', 'è‹±æ–‡å­¦å…¥é–€', 'ãƒ–ãƒ©ãƒƒãƒ‰ãƒ»ã‚¸ãƒ§ãƒ³ã‚½ãƒ³', 'foreign', 'BandA', 'testing account', '2016-07-16 09:39:50', ''),
(7, 'ã“ã‚Œã‹ã‚‰å‹‰å¼·ã™ã‚‹äººã®ãŸã‚ã®æ—¥æœ¬ä¸€ã‚„ã•ã—ã„æ³•å¾‹ã®æ•™ç§‘æ›¸', 'å“å·åŠŸè£œ', 'æ—¥æœ¬å®Ÿæ¥­å‡ºç‰ˆç¤¾', 1200, 'å¤šå°‘å‚·ã‚ã‚Š', 'è³‡æ ¼è©¦é¨“ã§æ³•å¾‹ç§‘ç›®ãŒã‚ã‚‹äººã€å¤§å­¦ã®æ³•å­¦éƒ¨ã«å…¥ã‚ã†ã¨ã—ã¦ã„ã‚‹äººã€ä¼šç¤¾ã§æ³•å¾‹çŸ¥è­˜ãŒå¿…è¦ã«ãªã£ãŸäººâ€¦â€¦ã€‚\r\næœ€çµ‚çš„ã«ç›®æŒ‡ã™ã‚‚ã®ã¯é•ã£ã¦ã‚‚ã€ãã†ã—ãŸäººãŸã¡ã¯ã“ã‚Œã‹ã‚‰æ³•å¾‹ã‚’å‹‰å¼·ã™ã‚‹ã“ã¨ã«ãªã‚Šã¾ã™ã€‚\r\nã¨ã“ã‚ãŒã€æ³•å¾‹ç”¨èªžãã®ã‚‚ã®ãŒé›£è§£ãªã†ãˆã€ç†è§£ã™ã¹ãå†…å®¹ã‚‚é«˜åº¦ã§ã™ã€‚\r\nã‚„ã¿ãã‚‚ã«å‹‰å¼·ã‚’å§‹ã‚ãŸã®ã§ã¯ã™ãã«ã¤ã¾ã‚‰ãªããªã‚Šã€åŠ¹çŽ‡ã‚‚éžå¸¸ã«ã‚ã‚‹ã„ã‚‚ã®ã«ãªã‚Šã¾ã™ã€‚\r\næœ¬æ›¸ã§ã¯ã€æ³•å¾‹ã®é†é†å‘³ã€ã¤ã¾ã‚Šã€æ³•å¾‹ã®æ ¸ã¨ãªã‚‹ã‚¨ãƒƒã‚»ãƒ³ã‚¹ã«ç„¦ç‚¹ã‚’ã—ã¼ã£ã¦è§£èª¬ã—ã¦ã„ã¾ã™ã€‚\r\nç´°ã‹ã„ã“ã¨ã¯æŠœãã«ã—ã¦ã€ã¾ãšã¯æ³•å¾‹ã®é¢ç™½ã•ã‚’ä½“æ„Ÿã™ã‚‹ã“ã¨ãŒã€å®Ÿã¯æ³•å¾‹ã‚’ç†è§£ã™ã‚‹ä¸€ç•ªã®è¿‘é“ãªã®ã§ã™ã€‚', 'upload/law.jpg', 'æ³•å¾‹Aå…¥é–€', 'ä¸‰è¼ªã¿ã', 'law', 'law', 'testing account', '2016-07-16 09:45:56', ''),
(8, 'ã“ã‚Œã‹ã‚‰å‹‰å¼·ã™ã‚‹äººã®ãŸã‚ã®æ—¥æœ¬ä¸€ã‚„ã•ã—ã„æ³•å¾‹ã®æ•™ç§‘æ›¸', 'å“å·åŠŸè£œ', 'æ—¥æœ¬å®Ÿæ¥­å‡ºç‰ˆç¤¾', 1200, 'å¤šå°‘å‚·ã‚ã‚Š', 'è³‡æ ¼è©¦é¨“ã§æ³•å¾‹ç§‘ç›®ãŒã‚ã‚‹äººã€å¤§å­¦ã®æ³•å­¦éƒ¨ã«å…¥ã‚ã†ã¨ã—ã¦ã„ã‚‹äººã€ä¼šç¤¾ã§æ³•å¾‹çŸ¥è­˜ãŒå¿…è¦ã«ãªã£ãŸäººâ€¦â€¦ã€‚\r\næœ€çµ‚çš„ã«ç›®æŒ‡ã™ã‚‚ã®ã¯é•ã£ã¦ã‚‚ã€ãã†ã—ãŸäººãŸã¡ã¯ã“ã‚Œã‹ã‚‰æ³•å¾‹ã‚’å‹‰å¼·ã™ã‚‹ã“ã¨ã«ãªã‚Šã¾ã™ã€‚\r\nã¨ã“ã‚ãŒã€æ³•å¾‹ç”¨èªžãã®ã‚‚ã®ãŒé›£è§£ãªã†ãˆã€ç†è§£ã™ã¹ãå†…å®¹ã‚‚é«˜åº¦ã§ã™ã€‚\r\nã‚„ã¿ãã‚‚ã«å‹‰å¼·ã‚’å§‹ã‚ãŸã®ã§ã¯ã™ãã«ã¤ã¾ã‚‰ãªããªã‚Šã€åŠ¹çŽ‡ã‚‚éžå¸¸ã«ã‚ã‚‹ã„ã‚‚ã®ã«ãªã‚Šã¾ã™ã€‚\r\næœ¬æ›¸ã§ã¯ã€æ³•å¾‹ã®é†é†å‘³ã€ã¤ã¾ã‚Šã€æ³•å¾‹ã®æ ¸ã¨ãªã‚‹ã‚¨ãƒƒã‚»ãƒ³ã‚¹ã«ç„¦ç‚¹ã‚’ã—ã¼ã£ã¦è§£èª¬ã—ã¦ã„ã¾ã™ã€‚\r\nç´°ã‹ã„ã“ã¨ã¯æŠœãã«ã—ã¦ã€ã¾ãšã¯æ³•å¾‹ã®é¢ç™½ã•ã‚’ä½“æ„Ÿã™ã‚‹ã“ã¨ãŒã€å®Ÿã¯æ³•å¾‹ã‚’ç†è§£ã™ã‚‹ä¸€ç•ªã®è¿‘é“ãªã®ã§ã™ã€‚', 'upload/law.jpg', 'æ³•å¾‹Aå…¥é–€', 'ä¸‰è¼ªã¿ã', 'law', 'law', 'testing account', '2016-07-16 09:53:37', ''),
(9, 'NGOçµ±æ‹¬ä¸»ç¾©', 'ç§‹å…ƒé–', 'æ—¥æœ¬å®Ÿæ¥­å‡ºç‰ˆç¤¾', 1500, 'éžå¸¸ã«è‰¯ã„', 'ã“ã®æœ¬ã¯NGOã‚’ã©ã®ã‚ˆã†ã«çµ±æ‹¬ã™ã‚Œã°ã„ã„ã®ã‹ã€ãƒžãƒã‚¸ãƒ¡ãƒ³ãƒˆã®è¦–ç‚¹ã‹ã‚‰NGOã¨ã„ã†æ©Ÿé–¢ã«ã¤ã„ã¦æ›¸ã‹ã‚ŒãŸã‚‚ã®ã§ã‚ã‚‹ã€‚ã“ã®ç¨®é¡žã®æœ¬ã¯ä»Šã¾ã§ã«ç„¡ãã€çµ±æ‹¬ã®è¦–ç‚¹ã‹ã‚‰è¦‹ãŸã®ã¯åˆã®è©¦ã¿ã§ã‚ã‚‹ã€‚NGOã®é‹å–¶æ–¹æ³•ã€ä»•çµ„ã¿ã€æ´»å‹•å†…å®¹ãªã©æ§˜ã€…ãªã“ã¨ãŒã“ã®æœ¬ã‹ã‚‰ç†è§£ã§ãã‚‹ã€‚', 'upload/ngo.jpg', 'NGOçµ±æ‹¬è«–', 'ãƒ‡ãƒ¼ãƒ“ãƒƒãƒ‰ãƒ»ãƒãƒƒã‚¿ãƒ¼', 'ç·åˆæ”¿ç­–å­¦éƒ¨', 'policy', 'masa1209', '2016-07-16 10:11:49', 'selling'),
(10, 'ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ‘ã‚¹ æˆæžœã‚’å‡ºã™ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®é€²ã‚æ–¹ ', 'æ¨ªç”°å¹¸ä¿¡', 'æ—¥çµŒBPç¤¾', 1000, 'éžå¸¸ã«è‰¯ã„', '\r\nå‰µé€ æ€§ã®ç ”ç©¶ãƒ»å®Ÿè·µã§çŸ¥ã‚‰ã‚Œã‚‹æ±å¤§i.schoolã¨ã‚³ãƒ³ã‚µãƒ«ãƒ†ã‚£ãƒ³ã‚°ä¼æ¥­i.labã®\r\nãƒŽã‚¦ãƒã‚¦ã‚’å¾¹åº•è§£èª¬ã€‚ã‚¢ã‚¤ãƒ‡ã‚¢å‰µå‡ºæ³•ã ã‘ã§ãªãã€ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ã®ãƒžãƒã‚¸ãƒ¡ãƒ³ãƒˆ\r\næ‰‹æ³•ã‚’ã€ä¸‰è±é‡å·¥ã‚°ãƒ«ãƒ¼ãƒ—ã‚„LIXILãªã©ã®å…·ä½“çš„ãªäº‹ä¾‹ã§å­¦ã¶ã€‚\r\n\r\nã€Œç›®æŒ‡ã™ã¹ãã‚´ãƒ¼ãƒ«ã‚’ã€Žã‚¼ãƒ­ã‹ã‚‰1ã€ã§ã¯ãªãã€Žã‚¼ãƒ­ã‹ã‚‰1.1ã€ã«ã™ã‚‹ã«ã¯ã€\r\nã€Œãªã›ä»Šã€ã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãªã®ã‹ã€ã€Œã‚¤ãƒŽãƒ™ãƒ¼ã‚·ãƒ§ãƒ³ãƒ»ãƒ—ãƒ­ã‚¸ã‚§ã‚¯ãƒˆã®è¨­è¨ˆæ³•ã¨ã¯ã€\r\nãªã©ã®ç–‘å•ã«ã‚‚ç­”ãˆã‚‹ã€‚ã‚¯ãƒªã‚¨ã‚¤ãƒ†ã‚£ãƒ–ã‚’ç›®æŒ‡ã™ãƒ“ã‚¸ãƒã‚¹ãƒ‘ãƒ¼ã‚½ãƒ³å¿…èª­ã®æ›¸! ', 'upload/management.jpg', 'çµŒå–¶å­¦', 'ã‚¹ãƒ†ã‚£ãƒ¼ãƒ–ãƒ»ã‚¸ãƒ§ãƒ–ã‚¹', 'çµŒå–¶å­¦éƒ¨', 'çµŒå–¶å­¦ç§‘', 'masa1209', '2016-07-16 10:33:27', ''),
(11, 'è‹±å›½é›¢è„±', 'è‹±èªžç´³å£«', 'è‹±å›½', 2000, 'éžå¸¸ã«è‰¯ã„', 'ã‚¤ã‚®ãƒªã‚¹ã®æ–°æ™‚ä»£ã‚’åˆ‡ã‚Šé–‹ã“ã†ã¨ã—ã¦ã„ã‚‹ä»Šã ã‹ã‚‰ã“ãèª­ã‚“ã§ãŠãã¹ãä¸€å†Šã€‚', 'upload/è‹±å›½é›¢è„±masa1209socioligy.jpg', 'è‹±å›½ã®æ–°æ™‚ä»£', 'ã‚­ãƒ£ã‚µãƒªãƒ³å¦ƒ', 'å¤–å›½èªžå­¦éƒ¨', 'è‹±ç±³å­¦ç§‘', 'masa1209', '2016-07-16 10:39:48', ''),
(12, 'æ³•å¾‹å…¥é–€', 'å­«æ­£ç¾©', 'ã‚½ãƒ•ãƒˆãƒãƒ³ã‚¯', 1500, 'è‰¯ã„', 'æ³•å¾‹ã®åˆæ­©çš„ãªäº‹æŸ„ã‚’å¾¹åº•è§£èª¬ã—ãŸä¸€å†Šã€‚ã“ã‚ŒãŒã‚ã‚Œã°æ³•å¾‹ã‚’é¢ç™½ã„ã¨æ„Ÿã˜ã‚‹ã“ã¨é–“é•ã„ãªã—ã€‚', 'upload/masa1209law.jpg', 'æ³•å¾‹å…¥é–€A', 'ã‚±ãƒ“ãƒ³ãƒ»ã‚¯ãƒ©ã‚¤ãƒ³', 'æ³•å­¦éƒ¨', 'æ³•å¾‹å­¦ç§‘', 'masa1209', '2016-07-16 12:32:18', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `icon` text NOT NULL,
  `rating` int(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `faculty`, `department`, `password`, `icon`, `rating`, `date`) VALUES
(1, 'masa1209', 'masa@gmail.com', 'policy', 'policy', 'masa1209', 'upload/DSCF1604.JPG', 0, '2016-07-11 16:12:26'),
(2, 'masafumi', 'masafumi@gmail.com', 'policy', 'policy', 'masafumi', '', 0, '2016-07-18 11:55:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guestpurchase`
--
ALTER TABLE `guestpurchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `textbooks`
--
ALTER TABLE `textbooks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `guestpurchase`
--
ALTER TABLE `guestpurchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `textbooks`
--
ALTER TABLE `textbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
