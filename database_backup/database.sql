-- Adminer 4.2.0 MySQL dump

SET NAMES utf8mb4;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `all_structure_admin`;

DROP TABLE IF EXISTS `android_api`;
CREATE TABLE `android_api` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `profile_image` varchar(256) NOT NULL,
  `profile_url` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `description_url` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `android_api` (`id`, `name`, `profile_image`, `profile_url`, `image`, `description`, `description_url`, `timestamp`, `status`) VALUES
(1,	'Perl Harbar',	'<img alt=\"\" src=\"http://localhost/all_structure/admin/include/elfinder/files/tom-cruise_2265642b.jpg\" style=\"height:387px; width:620px\" />',	'',	'',	'aldksfalsdfjasdflaksdfadsj ajdflkajflkajflkjadl kjalfkjalfjalfjasf',	0,	'2015-04-13 04:56:14',	'0'),
(2,	'Paul Walker',	'<img alt=\"\" src=\"http://localhost/all_structure/admin/include/elfinder/files/HD-Paul-Walker-Wallpapers-04.jpg\" style=\"height:180px; width:320px\" />',	'',	'',	'adfasdfadfads afjafjalsdfjasljfsdlfjalsdfjasdlfjadlsjf aldjf adjfadsfjalkfjafadflkaflaflasjdflksjdflajdflajsdfa<br />\r\nadfafafasfaksjflasjdflajkdsfalkjdfalsfalsdfjadfsdaf<br />\r\n&nbsp;',	0,	'2015-04-04 13:00:37',	'0'),
(3,	'Pranav Bhatt',	'<img alt=\"\" src=\"http://localhost/all_structure/admin/include/elfinder/files/macbook_air_1.jpg\" style=\"height:330px; width:440px\" />',	'',	'',	'Descriapdsfnadfnasfnasdfnasfn asdfnasdfnasdlfjsadlkfjasdlkfjasdlkfjaslkfjasdl jasdlkfjaslkfjaslkfjasldkfalkfaslkfjaslkdfjalksfjalskdfjadsfkjadflkasfasdfadfadfasdfadfsdfadsfasdfasdfadfadsfadfasdfadsfasdfasdf asdfasdfasdfadsfadsfasdf asdfasdfasfasfasdfdsafsdfadsf',	0,	'2015-04-04 13:11:04',	'0'),
(4,	'Hashim Ali Matiya',	'<img alt=\"\" src=\"http://localhost/all_structure/admin/include/elfinder/files/ipod_classic_4.jpg\" style=\"height:600px; width:530px\" />',	'',	'',	'adfasfasfds',	0,	'2015-04-04 13:18:48',	'0'),
(5,	'queradf',	'<img alt=\"\" src=\"http://localhost/all_structure/admin/include/elfinder/files/ipod_nano_2.jpg\" style=\"height:600px; width:530px\" />',	'',	'',	'asdfasdfasfadfsadasdfasdfasfasfsdfasfasdf asdfasdfasdfasd adsfasdfasdf',	0,	'2015-04-04 13:19:19',	'0'),
(6,	'adfafafasfd',	'<img alt=\"\" src=\"http://localhost/all_structure/admin/include/elfinder/files/sony_vaio_4.jpg\" style=\"height:631px; width:550px\" />',	'',	'',	'adfafafafasdfajfaljdfalksjdfalksj ladjfalsdjflakjdfalkdsjflkasd lkasjflaksdjf<br />\r\n<a href=\"http://in.yahoo.com\">http://in.yahoo.com</a>',	0,	'2015-04-04 13:29:16',	'0');

DROP TABLE IF EXISTS `cms_manager`;
CREATE TABLE `cms_manager` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `page_name` text,
  `c_status` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `name`, `password`, `added_date`, `status`) VALUES
(1,	'pranav',	'21232f297a57a5a743894a0e4a801fc3',	'2015-04-13 05:43:45',	'0');

-- 2015-04-13 07:10:45
