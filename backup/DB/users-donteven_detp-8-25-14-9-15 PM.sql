# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: donteventripp.com (MySQL 5.5.32-31.0-log)
# Database: donteven_detp
# Generation Time: 2014-08-26 04:15:52 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table eup_usermeta
# ------------------------------------------------------------

DROP TABLE IF EXISTS `eup_usermeta`;

CREATE TABLE `eup_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `eup_usermeta` WRITE;
/*!40000 ALTER TABLE `eup_usermeta` DISABLE KEYS */;

INSERT INTO `eup_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`)
VALUES
	(1,1,'first_name','Damon'),
	(2,1,'last_name','Hastings'),
	(3,1,'nickname','Admin'),
	(4,1,'description',''),
	(5,1,'rich_editing','true'),
	(6,1,'comment_shortcuts','false'),
	(7,1,'admin_color','midnight'),
	(8,1,'use_ssl','0'),
	(9,1,'show_admin_bar_front','true'),
	(10,1,'eup_capabilities','a:1:{s:13:\"administrator\";b:1;}'),
	(11,1,'eup_user_level','10'),
	(12,1,'dismissed_wp_pointers','wp350_media,wp360_revisions,wp360_locks,wp390_widgets'),
	(13,1,'show_welcome_panel','1'),
	(14,1,'eup_dashboard_quick_press_last_post_id','35'),
	(15,2,'first_name','Ayasha'),
	(16,2,'last_name','Tripp'),
	(17,2,'nickname','Ayasha'),
	(18,2,'description',''),
	(19,2,'rich_editing','true'),
	(20,2,'comment_shortcuts','false'),
	(21,2,'admin_color','fresh'),
	(22,2,'use_ssl','0'),
	(23,2,'show_admin_bar_front','true'),
	(24,2,'eup_capabilities','a:1:{s:6:\"editor\";b:1;}'),
	(25,2,'eup_user_level','7'),
	(26,2,'dismissed_wp_pointers','wp350_media,wp360_revisions,wp360_locks,wp390_widgets'),
	(27,3,'first_name','Arielle'),
	(28,3,'last_name','Vaughan'),
	(29,3,'nickname','Arielle'),
	(30,3,'description',''),
	(31,3,'rich_editing','true'),
	(32,3,'comment_shortcuts','false'),
	(33,3,'admin_color','fresh'),
	(34,3,'use_ssl','0'),
	(35,3,'show_admin_bar_front','true'),
	(36,3,'eup_capabilities','a:1:{s:6:\"editor\";b:1;}'),
	(37,3,'eup_user_level','7'),
	(38,3,'dismissed_wp_pointers','wp350_media,wp360_revisions,wp360_locks,wp390_widgets'),
	(39,3,'eup_dashboard_quick_press_last_post_id','17'),
	(40,3,'default_password_nag',''),
	(41,2,'eup_dashboard_quick_press_last_post_id','18'),
	(42,2,'eup_user-settings','editor=tinymce'),
	(43,2,'eup_user-settings-time','1408507334'),
	(44,3,'eup_user-settings','wplink=1'),
	(45,3,'eup_user-settings-time','1408680962'),
	(46,1,'default_password_nag','');

/*!40000 ALTER TABLE `eup_usermeta` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table eup_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `eup_users`;

CREATE TABLE `eup_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `eup_users` WRITE;
/*!40000 ALTER TABLE `eup_users` DISABLE KEYS */;

INSERT INTO `eup_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`)
VALUES
	(1,'Admin','$P$BOIxFJQ7byI9A513jaPkEob4gnYLMp/','Admin','damonjhastings@gmail.com','','2014-08-04 18:14:05','',0,'Damon'),
	(2,'Ayasha','$P$BsWVajeJWgujHgnYMQO2YSi79Tyd8n.','ayasha','ayasha.tripp@gmail.com','http://www.donteventripp.com','2014-08-04 18:16:49','',0,'Ayasha Tripp'),
	(3,'Arielle','$P$B2rmBP8xYbGtbE4HejU.SEqkqy27yf1','arielle','ariraesings@gmail.com','http://donteventripp.com','2014-08-04 18:18:02','',0,'Arielle Vaughan');

/*!40000 ALTER TABLE `eup_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
