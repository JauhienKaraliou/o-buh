/*
SQLyog Ultimate v11.52 (32 bit)
MySQL - 5.6.22 : Database - db-buh
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db-buh` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `db-buh`;

/*Table structure for table `buh_class` */

DROP TABLE IF EXISTS `buh_class`;

CREATE TABLE `buh_class` (
  `id_class` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id_class`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `buh_class` */

insert  into `buh_class`(`id_class`,`class_name`) values (1,'M12'),(2,'M14'),(3,'M16'),(4,'M18');

/*Table structure for table `buh_classes_on_contest` */

DROP TABLE IF EXISTS `buh_classes_on_contest`;

CREATE TABLE `buh_classes_on_contest` (
  `id_class_to_cont` int(11) NOT NULL AUTO_INCREMENT,
  `id_contest` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  PRIMARY KEY (`id_class_to_cont`),
  KEY `id_contest` (`id_contest`),
  KEY `id_class` (`id_class`),
  CONSTRAINT `buh_classes_on_contest_ibfk_1` FOREIGN KEY (`id_contest`) REFERENCES `buh_contests` (`id_contest`),
  CONSTRAINT `buh_classes_on_contest_ibfk_2` FOREIGN KEY (`id_class`) REFERENCES `buh_class` (`id_class`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `buh_classes_on_contest` */

/*Table structure for table `buh_clubs` */

DROP TABLE IF EXISTS `buh_clubs`;

CREATE TABLE `buh_clubs` (
  `id_club` int(11) NOT NULL AUTO_INCREMENT,
  `club_name` varchar(45) NOT NULL,
  `club_hometown` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_club`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `buh_clubs` */

insert  into `buh_clubs`(`id_club`,`club_name`,`club_hometown`) values (1,'BNTU',NULL),(2,'BPU',NULL),(3,'BPU',NULL),(4,'DFR',NULL);

/*Table structure for table `buh_comments` */

DROP TABLE IF EXISTS `buh_comments`;

CREATE TABLE `buh_comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(45) NOT NULL,
  `author_email` varchar(45) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` text NOT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0-visible, 1-invisible',
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `buh_comments` */

insert  into `buh_comments`(`id_comment`,`author_name`,`author_email`,`date_time`,`text`,`is_deleted`) values (1,'robot','a@B.com','2015-02-11 10:11:01','dummy comment','0'),(2,'robot','a@B.com','2015-02-11 10:11:25','dummy comment n2','0'),(3,'robot 2','a@B.com','2015-02-13 12:50:20','dummy 3','0'),(4,'Яуген','a@B.com','2015-02-25 16:07:36','Хочу участвовать в этих соревах','0'),(5,'robot','a@B.com','2015-02-26 13:11:58','Test comment','0');

/*Table structure for table `buh_contests` */

DROP TABLE IF EXISTS `buh_contests`;

CREATE TABLE `buh_contests` (
  `id_contest` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `date_begin` date NOT NULL,
  `date_end` date NOT NULL,
  `registration_open` enum('1','0') NOT NULL,
  PRIMARY KEY (`id_contest`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `buh_contests` */

insert  into `buh_contests`(`id_contest`,`name`,`date_begin`,`date_end`,`registration_open`) values (11,'Dummy Competitions-6','2015-11-02','2015-11-03','1'),(12,'Dummy Competitions-4','2013-12-20','2013-12-22','1'),(13,'Dummy Competitions-4','2013-12-20','2013-12-22','1');

/*Table structure for table `buh_etap` */

DROP TABLE IF EXISTS `buh_etap`;

CREATE TABLE `buh_etap` (
  `id_etap` int(10) NOT NULL AUTO_INCREMENT,
  `id_contest` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_etap`),
  KEY `etap_to_contest` (`id_contest`),
  CONSTRAINT `etap_to_contest` FOREIGN KEY (`id_contest`) REFERENCES `buh_contests` (`id_contest`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `buh_etap` */

insert  into `buh_etap`(`id_etap`,`id_contest`,`date`) values (7,11,'2015-11-02'),(8,11,'2015-11-03'),(9,12,'2013-12-20'),(10,12,'2013-12-21'),(11,12,'2013-12-22'),(12,13,'2013-12-20'),(13,13,'2013-12-21'),(14,13,'2013-12-22');

/*Table structure for table `buh_label` */

DROP TABLE IF EXISTS `buh_label`;

CREATE TABLE `buh_label` (
  `id_label` int(11) NOT NULL AUTO_INCREMENT,
  `label_name` varchar(45) DEFAULT NULL,
  `en` varchar(90) DEFAULT NULL,
  `ru` varchar(90) DEFAULT NULL,
  `be` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id_label`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `buh_label` */

/*Table structure for table `buh_participant` */

DROP TABLE IF EXISTS `buh_participant`;

CREATE TABLE `buh_participant` (
  `id_part` int(11) NOT NULL AUTO_INCREMENT,
  `id_etap` int(11) NOT NULL,
  `id_runner` int(10) NOT NULL,
  `id_club` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_qual` int(11) NOT NULL,
  `start_time` int(12) DEFAULT NULL,
  `finish_time` int(12) DEFAULT NULL,
  `id_qual_accompl` int(11) DEFAULT NULL,
  `si_card_num` int(11) DEFAULT NULL,
  `reg_email` varchar(45) NOT NULL,
  PRIMARY KEY (`id_part`),
  KEY `id_etap` (`id_etap`),
  KEY `part_to_runners` (`id_runner`),
  KEY `part_to_club` (`id_club`),
  KEY `part_to_class` (`id_class`),
  KEY `part_to_qual` (`id_qual`),
  KEY `qual_acc_to_qual` (`id_qual_accompl`),
  CONSTRAINT `buh_participant_ibfk_1` FOREIGN KEY (`id_etap`) REFERENCES `buh_etap` (`id_etap`),
  CONSTRAINT `part_to_class` FOREIGN KEY (`id_class`) REFERENCES `buh_class` (`id_class`),
  CONSTRAINT `part_to_club` FOREIGN KEY (`id_club`) REFERENCES `buh_clubs` (`id_club`),
  CONSTRAINT `part_to_qual` FOREIGN KEY (`id_qual`) REFERENCES `buh_qualification` (`id_qual`),
  CONSTRAINT `part_to_runners` FOREIGN KEY (`id_runner`) REFERENCES `buh_runners` (`id_runner`),
  CONSTRAINT `qual_acc_to_qual` FOREIGN KEY (`id_qual_accompl`) REFERENCES `buh_qualification` (`id_qual`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `buh_participant` */

insert  into `buh_participant`(`id_part`,`id_etap`,`id_runner`,`id_club`,`id_class`,`id_qual`,`start_time`,`finish_time`,`id_qual_accompl`,`si_card_num`,`reg_email`) values (1,7,7,2,4,2,NULL,NULL,NULL,0,'stralcou@gmail.com'),(2,8,7,2,4,2,NULL,NULL,NULL,0,'stralcou@gmail.com'),(3,7,8,3,1,1,NULL,NULL,NULL,0,'stralcou@gmail.com'),(4,8,8,3,1,1,NULL,NULL,NULL,0,'stralcou@gmail.com'),(5,7,9,4,1,1,NULL,NULL,NULL,0,'stralcou@gmail.com'),(6,8,9,4,1,1,NULL,NULL,NULL,0,'stralcou@gmail.com');

/*Table structure for table `buh_posts` */

DROP TABLE IF EXISTS `buh_posts`;

CREATE TABLE `buh_posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `prev_content` text NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `buh_posts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `buh_users` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `buh_posts` */

insert  into `buh_posts`(`id_post`,`id_user`,`date_time`,`content`,`prev_content`,`title`) values (1,1,'2015-02-11 08:39:47','this is first dummy post','this is first dummy post',NULL),(2,1,'2015-02-11 14:21:56','<p>Правила преобразования ссылок:</p>\r\n<p>Если в подкаталогах в .htaccess нет ни одной директивы модуля mod_rewrite, то все правила преобразования наследуются из родительского каталога.</p>\r\n<p>При наличии в файле .htaccess каких либо директив модуля mod_rewrite не наследуется ничего, а состояние по умолчанию выставляется таким же, как в главном конфигурационном файле веб-сервера (по умолчанию \"off\"). Поэтому, если нужны правила преобразования для конкретного каталога, то нужно еще раз вставить директиву \"RewriteEngine on\" в .htaccess для конкретного каталога.</p>\r\n<p>При наследовании правил из верхних каталогов и добавлении к ним новых свойственных только данному каталогу - необходимо выставить в начале следущее: \"RewriteEngine on\" и <a href=\"http://htaccess.net.ru/doc/mod_rewrite/RewriteOptions.php\">\"RewriteOptions inherit\"</a> - последняя директива сообщает серверу о продолжении.</p>\r\n<h2>&nbsp;</h2>','all about contest','dummy post title'),(3,1,'2015-02-11 14:22:14','<p>Правила преобразования ссылок:</p>\r\n<p>Если в подкаталогах в .htaccess нет ни одной директивы модуля mod_rewrite, то все правила преобразования наследуются из родительского каталога.</p>\r\n<p>При наличии в файле .htaccess каких либо директив модуля mod_rewrite не наследуется ничего, а состояние по умолчанию выставляется таким же, как в главном конфигурационном файле веб-сервера (по умолчанию \"off\"). Поэтому, если нужны правила преобразования для конкретного каталога, то нужно еще раз вставить директиву \"RewriteEngine on\" в .htaccess для конкретного каталога.</p>\r\n<p>При наследовании правил из верхних каталогов и добавлении к ним новых свойственных только данному каталогу - необходимо выставить в начале следущее: \"RewriteEngine on\" и <a href=\"http://htaccess.net.ru/doc/mod_rewrite/RewriteOptions.php\">\"RewriteOptions inherit\"</a> - последняя директива сообщает серверу о продолжении.</p>\r\n<h2>&nbsp;</h2>','all about contest','dummy post title'),(4,1,'2015-02-17 22:24:24','<p>vbfhvfkjdsvbsvsvf</p>','123','tratata'),(5,1,'2015-02-25 14:54:10','<p><strong>Приключенческая гонка &laquo;Активная зона&raquo;</strong></p>\r\n<p>Здесь причудливо смешались комфортные дороги и белорусские горы, традиционные этапы (велосипед, трекинг, лыжи) и принципиально новые (окунание в прорубь, ориентирование \"по глобусу\"), точные карты и запутанные задания квеста. Формат рогейна позволит каждому выбрать наиболее подходящие дисциплины и подстроить длину дистанции под себя. И только Про &laquo;отгребет&raquo; по полной... А на финише победителей будут ждать призы от ведущего туристического магазина &laquo;Активная зона&raquo;.</p>\r\n<p>Краткая информация о гонке:</p>\r\n<ul>\r\n<li>Дата: 31 января-1 февраля 2015</li>\r\n<li>Место: Дзержинский и Минский районы, БЛ - Волчковичское вдхр (Птичь).</li>\r\n<li>Формат: рогейн</li>\r\n<li>Длительность: Про-класс 24 ч, Вело/Трек 16 ч, Любительский &ndash; 7 ч, Зрители &ndash; прохождение квеста 1-2 ч.</li>\r\n<li>Сайт гонки: <a href=\"http://promwadtour.com\">http://promwadtour.com</a></li>\r\n<li>Обсуждение: <a href=\"http://forum.poehali.net/index.php?board=21;action=display;threadid=78819;start=0\">http://forum.poehali.net/index.php?board=21;action=display;threadid=78819;start=0</a><img src=\"http://www.obelarus.net/buls/2015/active-zone.jpg\" alt=\"it starts\" width=\"600\" height=\"450\" /></li>\r\n</ul>','Стартует Ориент лига 2015!','Стартует Ориент лига 2015!'),(6,1,'2015-02-25 14:54:52','<p><strong>Приключенческая гонка &laquo;Активная зона&raquo;</strong></p>\r\n<p>Здесь причудливо смешались комфортные дороги и белорусские горы, традиционные этапы (велосипед, трекинг, лыжи) и принципиально новые (окунание в прорубь, ориентирование \"по глобусу\"), точные карты и запутанные задания квеста. Формат рогейна позволит каждому выбрать наиболее подходящие дисциплины и подстроить длину дистанции под себя. И только Про &laquo;отгребет&raquo; по полной... А на финише победителей будут ждать призы от ведущего туристического магазина &laquo;Активная зона&raquo;.</p>\r\n<p>Краткая информация о гонке:</p>\r\n<ul>\r\n<li>Дата: 31 января-1 февраля 2015</li>\r\n<li>Место: Дзержинский и Минский районы, БЛ - Волчковичское вдхр (Птичь).</li>\r\n<li>Формат: рогейн</li>\r\n<li>Длительность: Про-класс 24 ч, Вело/Трек 16 ч, Любительский &ndash; 7 ч, Зрители &ndash; прохождение квеста 1-2 ч.</li>\r\n<li>Сайт гонки: <a href=\"http://promwadtour.com\">http://promwadtour.com</a></li>\r\n<li>Обсуждение: <a href=\"http://forum.poehali.net/index.php?board=21;action=display;threadid=78819;start=0\">http://forum.poehali.net/index.php?board=21;action=display;threadid=78819;start=0</a><br><img src=\"http://www.obelarus.net/buls/2015/active-zone.jpg\" alt=\"it starts\" width=\"600\" height=\"450\" /></li>\r\n</ul>','Стартует Ориент лига 2015!','Стартует Ориент лига 2015!');

/*Table structure for table `buh_qualification` */

DROP TABLE IF EXISTS `buh_qualification`;

CREATE TABLE `buh_qualification` (
  `id_qual` int(11) NOT NULL AUTO_INCREMENT,
  `qual_name` enum('MS','KMS') NOT NULL,
  PRIMARY KEY (`id_qual`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `buh_qualification` */

insert  into `buh_qualification`(`id_qual`,`qual_name`) values (1,'MS'),(2,'KMS');

/*Table structure for table `buh_runners` */

DROP TABLE IF EXISTS `buh_runners`;

CREATE TABLE `buh_runners` (
  `id_runner` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `birth_year` int(4) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  PRIMARY KEY (`id_runner`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `buh_runners` */

insert  into `buh_runners`(`id_runner`,`name`,`surname`,`birth_year`,`gender`) values (1,'jauhien','Karaliou',1989,'male'),(2,'sascha','karaliou',1992,'male'),(3,'Valery','Marchuk',1990,'male'),(4,'Иван','Глушко',1900,'male'),(5,'Encode','Marchuk',1906,'male'),(6,'Decode','Marchuk',1900,'male'),(7,'Valery','Глушко',1900,'male'),(8,'jauhien2','Каралёў',1900,'male'),(9,'Valery','Каралёў',1900,'male');

/*Table structure for table `buh_user_status` */

DROP TABLE IF EXISTS `buh_user_status`;

CREATE TABLE `buh_user_status` (
  `user_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(45) NOT NULL,
  PRIMARY KEY (`user_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `buh_user_status` */

insert  into `buh_user_status`(`user_status_id`,`status_name`) values (1,'admin'),(2,'moderator');

/*Table structure for table `buh_users` */

DROP TABLE IF EXISTS `buh_users`;

CREATE TABLE `buh_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `user_status_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `sha1_password` varchar(45) NOT NULL,
  `user_key` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `user_status_id` (`user_status_id`),
  CONSTRAINT `buh_users_ibfk_1` FOREIGN KEY (`user_status_id`) REFERENCES `buh_user_status` (`user_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `buh_users` */

insert  into `buh_users`(`id_user`,`username`,`user_status_id`,`email`,`sha1_password`,`user_key`) values (1,'dummy',1,'dummy@dooo.com','8cb2237d0679ca88db6464eac60da96345513964','123456'),(2,'dummy2',2,'a@b.com','8cb2237d0679ca88db6464eac60da96345513964',NULL),(3,'dummy3',2,'jauhien@s.er','8cb2237d0679ca88db6464eac60da96345513964',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
