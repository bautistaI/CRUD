# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.9)
# Database: address_book
# Generation Time: 2012-04-22 16:13:33 -0500
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table contacts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(30) NOT NULL,
  `contact_lname` varchar(30) NOT NULL,
  `contact_address` text NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `contact_email` varchar(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;

INSERT INTO `contacts` (`contact_id`, `contact_name`, `contact_lname`, `contact_address`, `contact_phone`, `contact_email`, `user_id`)
VALUES
	(4,'Mike','Johnson','1707 Fern Dr','652-589-0000','mike@yahoo.com',1),
	(5,'Justin','Olson','1545 Park Ave','584-985-9696','justin@yahoo.com',1),
	(8,'John','Smith','1525 Rollan Rd','555-555-555','rollan@gmail.com',2),
	(10,'Sandra','Smith','1410	 Oleos St','121-333-2222','sandra@yahoo.com',2),
	(15,'test3','test3','test3','161651','1516@yahoo.com',2),
	(16,'David','Duran','testaddress','777-777-7777','david@yahoo.com',2);

/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_password` char(32) NOT NULL DEFAULT '',
  `user_fullname` varchar(40) NOT NULL DEFAULT '',
  `user_salt` char(8) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UX_name` (`user_name`),
  UNIQUE KEY `UX_name_password` (`user_password`,`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_fullname`, `user_salt`)
VALUES
	(1,'rick','8d6c54deafe0d17698cba468f3778b32','Rick O','gng165$%'),
	(2,'jason','8e72017021c567f0e6e258f09404c3f3','Jason M','5csdf51c');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
