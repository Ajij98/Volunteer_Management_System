-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2022-04-01 11:32:54
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for db_vms
DROP DATABASE IF EXISTS `db_vms`;
CREATE DATABASE IF NOT EXISTS `db_vms` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_vms`;


-- Dumping structure for table db_vms.tb_blood_doner
DROP TABLE IF EXISTS `tb_blood_doner`;
CREATE TABLE IF NOT EXISTS `tb_blood_doner` (
  `doner_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `doner_code` int(11) DEFAULT NULL,
  `doner_name` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `doner_address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `doner_registered_on` varchar(255) DEFAULT NULL,
  `doner_img` varchar(255) DEFAULT NULL,
  `doner_username` varchar(255) DEFAULT NULL,
  `doner_verify_status` int(11) DEFAULT '0',
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`doner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_vms.tb_blood_doner: ~1 rows (approximately)
DELETE FROM `tb_blood_doner`;
/*!40000 ALTER TABLE `tb_blood_doner` DISABLE KEYS */;
INSERT INTO `tb_blood_doner` (`doner_id`, `doner_code`, `doner_name`, `blood_group`, `doner_address`, `contact_number`, `doner_registered_on`, `doner_img`, `doner_username`, `doner_verify_status`, `entry_time`) VALUES
	(1, 923157, 'Md Sayed Ahmed', 'A+', 'Access Road, Agrabad, Chattogram', '01854545122', '2022-03-30', 'blood_doner_img_folder/6ad46581b91021651f3ec1e0006132a0testimonials-5.jpg', 'Tohin', 1, '2022-03-30 15:15:48');
/*!40000 ALTER TABLE `tb_blood_doner` ENABLE KEYS */;


-- Dumping structure for table db_vms.tb_charity_foundation
DROP TABLE IF EXISTS `tb_charity_foundation`;
CREATE TABLE IF NOT EXISTS `tb_charity_foundation` (
  `foundation_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `foundation_code` int(11) DEFAULT NULL,
  `foundation_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `external_link` varchar(255) DEFAULT NULL,
  `about_foundation` varchar(255) DEFAULT NULL,
  `foundation_address` varchar(255) DEFAULT NULL,
  `foundation_added_on` varchar(255) DEFAULT NULL,
  `foundation_img` varchar(255) DEFAULT NULL,
  `way_of_donation` varchar(255) DEFAULT NULL,
  `foundation_added_by` varchar(255) DEFAULT NULL,
  `foundation_verify_status` int(11) DEFAULT '0',
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`foundation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_vms.tb_charity_foundation: ~0 rows (approximately)
DELETE FROM `tb_charity_foundation`;
/*!40000 ALTER TABLE `tb_charity_foundation` DISABLE KEYS */;
INSERT INTO `tb_charity_foundation` (`foundation_id`, `foundation_code`, `foundation_name`, `contact_number`, `email_address`, `external_link`, `about_foundation`, `foundation_address`, `foundation_added_on`, `foundation_img`, `way_of_donation`, `foundation_added_by`, `foundation_verify_status`, `entry_time`) VALUES
	(1, 497637, 'à¦à¦• à¦Ÿà¦¾à¦•à¦¾à§Ÿ à¦†à¦¹à¦¾à¦° - 1 Taka Meal', '01854545122', 'onetakameal.ctg@gmail.com', 'https://web.facebook.com/1Tk.Meal/?_rdc=1&_rdr', 'à¦¸à§‡à¦°à¦¾ à¦¸à¦®à§à¦ªà¦°à§à¦•à¦—à§à¦²à§‹ à¦–à¦¾à¦¬à¦¾à¦° à¦¶à§‡à§Ÿà¦¾à¦° à¦¥à§‡à¦•à§‡ à¦¸à§ƒà¦·à§à¦Ÿà¦¿ à¦¹à§Ÿâ€™ à¦ à¦ªà§à¦°à¦¤à¦¿à¦ªà¦¾à¦¦à§à¦¯à¦•à§‡ à¦¸à¦¾à¦®à¦¨à§‡ à¦°à§‡à¦–à§‡ à§¨à§¦à§§à§¬ à¦¸à¦¾à¦²à§‡ à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦¨à¦¨à§à¦¦ à¦«à¦¾ï', 'Access Road, Agrabad, Chattgram', '2022-03-30', 'foundation_img_folder/6f319abf0f34024dfcd4fa34089674126.jpg', '<h6><span style="background-color: rgb(115, 24, 66);"><font color="#ffffff">Way of Donation</font></span></h6>', 'Tohin', 1, '2022-03-30 16:27:27');
/*!40000 ALTER TABLE `tb_charity_foundation` ENABLE KEYS */;


-- Dumping structure for table db_vms.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_vms.tb_user: ~3 rows (approximately)
DELETE FROM `tb_user`;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`user_id`, `name`, `email`, `phone`, `address`, `user_name`, `password`, `user_type`, `entry_time`) VALUES
	(1, 'Abhishek Nandi', 'nandi@gmail.com', '01679811194', '2 No. Gate, East Nasirabad', 'Admin', '12345', 'Admin', '2022-03-29 11:37:30'),
	(2, 'Md Tohin Islam', 'tohin47@gmail.com', '01854754856', 'Agrabad, Chattogram', 'Tohin', '12345', 'Volunteer', '2022-03-29 11:39:11'),
	(3, 'Siam Ahmed', 'siam307@gmail.com', '01854715307', 'Muradpur, Chattogram', 'Siam', '12345', 'General User', '2022-03-29 11:40:16');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;


-- Dumping structure for table db_vms.tb_volunteer_profile
DROP TABLE IF EXISTS `tb_volunteer_profile`;
CREATE TABLE IF NOT EXISTS `tb_volunteer_profile` (
  `profile_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `profile_code` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(255) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `profile_objective` varchar(255) DEFAULT NULL,
  `volunteer_experience` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `relevant_skills` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `profile_added_on` varchar(255) DEFAULT NULL,
  `profile_created_by` varchar(255) DEFAULT NULL,
  `profile_verify_status` int(11) DEFAULT '0',
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_vms.tb_volunteer_profile: ~1 rows (approximately)
DELETE FROM `tb_volunteer_profile`;
/*!40000 ALTER TABLE `tb_volunteer_profile` DISABLE KEYS */;
INSERT INTO `tb_volunteer_profile` (`profile_id`, `profile_code`, `name`, `profession`, `address`, `contact_number`, `email`, `facebook_id`, `whatsapp_number`, `profile_img`, `profile_objective`, `volunteer_experience`, `education`, `relevant_skills`, `organization`, `profile_added_on`, `profile_created_by`, `profile_verify_status`, `entry_time`) VALUES
	(1, 424318, 'Md Tohin Islam', 'Web Developer - SoftTech Ltd.', 'Agrabad, Chattogram', '01854754856', 'tohin47@gmail.com', 'Facebook Id', '01854754856', 'profile_img_folder/370fa738c1ff6eb88bd71fcd4a96cbc6team-1.jpg', '<p>Yes</p>', '<p>Yes<br></p>', '<p>Yes<br></p>', '<p>Yes<br></p>', 'Sopnojatri Foundation', '2022-03-29', 'Tohin', 1, '2022-03-29 12:17:58');
/*!40000 ALTER TABLE `tb_volunteer_profile` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
