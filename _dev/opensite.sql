
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Table structure for table `content_pages`
--

CREATE TABLE IF NOT EXISTS `content_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text,
  `show_title` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `content_pages`
--

INSERT INTO `content_pages` (`id`, `name`, `title`, `content`, `show_title`, `created_at`, `updated_at`) VALUES
(1, 'Index', 'Home', '<div class="jumbotron">\n    <h1>What is OpenSite?</h1>\n    <p>\n        OpenSite is an open-source content management system.\n    </p>\n</div>', 0, '2014-04-16 07:56:41', '2014-04-16 07:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `controller_name` varchar(255) NOT NULL,
  `controller_method` varchar(255) NOT NULL,
  `controller_args` text NOT NULL,
  `request_method` varchar(255) NOT NULL DEFAULT 'get',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `uri`, `controller_name`, `controller_method`, `controller_args`, `request_method`, `enabled`, `created_at`, `update_at`) VALUES
(1, 'Index', '/', 'OpenSite\\Controllers\\ContentPages', 'show', '[1]', 'get', 1, '2014-04-16 07:56:41', '2014-04-16 07:56:41');
