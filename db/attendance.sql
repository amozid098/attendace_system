/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.6.25 : Database - attendance
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`attendance` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `attendance`;

/*Table structure for table `attendance` */

DROP TABLE IF EXISTS `attendance`;

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attendance_of` int(10) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `attendance_time_in` time DEFAULT NULL,
  `attendance_time_out` time DEFAULT NULL,
  `mode_in` int(2) DEFAULT NULL,
  `mode_out` int(2) DEFAULT NULL,
  `update_by` int(10) DEFAULT NULL,
  `insert_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

/*Data for the table `attendance` */

insert  into `attendance`(`id`,`attendance_of`,`attendance_date`,`attendance_time_in`,`attendance_time_out`,`mode_in`,`mode_out`,`update_by`,`insert_datetime`) values (2,2,'2017-07-16','10:00:00','17:39:03',1,1,1,'2017-07-16 13:38:43'),(3,1,'2017-07-06','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(4,1,'2017-07-07','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(5,1,'2017-07-08','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(6,1,'2017-07-09','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(7,1,'2017-07-10','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(8,1,'2017-07-11','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(9,1,'2017-07-12','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(10,1,'2017-07-13','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(11,1,'2017-07-14','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(12,1,'2017-07-15','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(13,1,'2017-07-16','10:00:00','00:00:00',1,0,1,'2017-07-16 13:38:09'),(14,2,'2017-07-06','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(15,2,'2017-07-07','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(16,2,'2017-07-08','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(17,2,'2017-07-09','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(18,2,'2017-07-10','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(19,2,'2017-07-11','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(20,2,'2017-07-12','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(21,2,'2017-07-13','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(22,2,'2017-07-14','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(23,2,'2017-07-15','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(24,2,'2017-07-16','10:00:00','00:00:00',1,0,1,'2017-07-16 13:38:09'),(25,3,'2017-07-06','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(26,3,'2017-07-07','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(27,3,'2017-07-08','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(28,3,'2017-07-09','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(29,3,'2017-07-10','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(30,3,'2017-07-11','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(31,3,'2017-07-12','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(32,3,'2017-07-13','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(33,3,'2017-07-14','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(34,3,'2017-07-15','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(35,3,'2017-07-16','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(36,4,'2017-07-06','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(37,4,'2017-07-07','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(38,4,'2017-07-08','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(39,4,'2017-07-09','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(40,4,'2017-07-10','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(41,4,'2017-07-11','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(42,4,'2017-07-12','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(43,4,'2017-07-13','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(44,4,'2017-07-14','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(45,4,'2017-07-15','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(46,4,'2017-07-16','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(47,5,'2017-07-06','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(48,5,'2017-07-07','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(49,5,'2017-07-08','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(50,5,'2017-07-09','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(51,5,'2017-07-10','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(52,5,'2017-07-11','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(53,5,'2017-07-12','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(54,5,'2017-07-13','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(55,5,'2017-07-14','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(56,5,'2017-07-15','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09'),(57,5,'2017-07-16','10:00:00','18:00:00',1,1,1,'2017-07-16 13:38:09');

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_no` varchar(11) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `voter_id` varchar(20) DEFAULT NULL,
  `user_type` int(2) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `update_by` int(10) DEFAULT NULL,
  `insert_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

/*Data for the table `employee` */

insert  into `employee`(`id`,`first_name`,`last_name`,`email`,`phone_no`,`address`,`designation`,`gender`,`joining_date`,`voter_id`,`user_type`,`password`,`update_by`,`insert_datetime`) values (1,'Abdul','Mozid','ab.mozid@engineer.com','01724113318','West Rajabazar, Dhaka','Jr. Software engineer','Male','2017-03-01','1999333333333',1,'1234',5,'2017-03-30 13:06:59'),(2,'Firoj','Kobir','firoz@gmail.com','01722069109','West Rajabazar, Dhaka','Data Entry Operator','Male','2017-03-02','1112222',1,'1234',1,'2017-03-31 11:20:02'),(3,'Taijul ','Islam','taijul@gmail.com','01724422111','West Rajabazar, Dhaka','Hacker','Male','2017-03-03','11223344',2,'1234',1,'2017-03-30 13:11:25'),(4,'Abu','Bakker ','bakker@gmail.com','01924118822','Pathopoth Signal','Jr. Software engineer','Male','2017-03-04','1992230011888',1,'1234',1,'2017-03-30 13:19:13'),(5,'Abdur ','Rob','abdur_rob@gmail.com','01722118822','Comilla','It support Engineer','Male','2017-03-05','1231233233',1,'1234',1,'2017-03-30 13:24:05'),(6,'Towhidul','Pavel','pavel@gmail.com','01700000000','Dhaka','Jr. Engineer','Male','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(10,'Shakil','Ahmed','shakil@gmail.com','01700000000','Dhaka','Jr. Engineer','Male','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(11,'Mst.','Rima','rima@gmail.com','01700000000','Dhaka','Jr. Engineer','Female','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(12,'Chaitali','Rahman','chaitali@gmail.com','01700000000','Dhaka','Jr. Engineer','Female','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(13,'Tania','Islam','tania@gmail.com','01700000000','Dhaka','Jr. Engineer','Female','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(14,'Abdur','Roshid','roshid@gmail.com','01700000000','Dhaka','Jr. Engineer','Male','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(15,'Sobuj','Rahman','sobuj@gmail.com','01700000000','Dhaka','Jr. Engineer','Male','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(16,'Basir','Khan','basir@gmail.com','01700000000','Dhaka','Jr. Engineer','Male','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(17,'Afsar','Rana','afsar@gmail.com','01700000000','Dhaka','Jr. Engineer','Male','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(18,'Hasan','Jahan','hasan@gmail.com','01700000000','Dhaka','Jr. Engineer','Male','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(19,'Didar','Alam','dider@gmail.com','01700000000','Dhaka','Jr. Engineer','Male','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(20,'Rakib','Hasan','rakib@gmail.com','01700000000','Dhaka','Jr. Engineer','Male','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(21,'Robiul','Islam','robiul@gmail.com','01700000000','Dhaka','Jr. Engineer','Male','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(22,'Abdul','Aziz','aziz@gmail.com','01700000000','Dhaka','Jr. Engineer','Male','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(23,'Mahmud','Shimanto','mahmud@gmail.com','01700000000','Dhaka','Jr. Engineer','Male','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(24,'Aronno','Islam','aronno@gmail.com','01700000000','Dhaka','Jr. Engineer','Male','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(25,'Arnab','Hossen','arnab@gmail.com','01700000000','Dhaka','Jr. Engineer','Male','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(26,'Ahsan','Habib','habib@gmail.com','01923118833','Dhaka','Software Engineer','Male','2017-03-01','19900111',2,'1234',1,'2017-03-01 12:00:00'),(55,'Abdul','Aziz',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `user_type` */

DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `type` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user_type` */

insert  into `user_type`(`id`,`type`) values (1,'Admin User'),(2,'General User');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
