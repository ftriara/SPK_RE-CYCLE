/*
SQLyog Ultimate v9.50 
MySQL - 5.5.5-10.1.29-MariaDB : Database - ahp_topsis
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ahp_topsis` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ahp_topsis`;

/*Table structure for table `tb_alternatif` */

DROP TABLE IF EXISTS `tb_alternatif`;

CREATE TABLE `tb_alternatif` (
  `kode_alternatif` varchar(16) NOT NULL,
  `nama_alternatif` varchar(256) NOT NULL DEFAULT '',
  `keterangan` varchar(256) NOT NULL DEFAULT '',
  `total` double NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kode_alternatif`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tb_alternatif` */

insert  into `tb_alternatif`(`kode_alternatif`,`nama_alternatif`,`keterangan`,`total`,`rank`) values ('A1','Big Coaster','-',0,0),('A2','Small Coaster','-',0,0),('A3','Coaster Double','-',0,0),('A4','Keychain','-',0,0),('A5','Laptop Stand','-',0,0),('A6','Phone Stand','-',0,0),('A7','Soap Dish','-',0,0),('A8','Plastic Stool','-',0,0),('A9','Tissue Box','-',0,0),('A10','Flower Vase','-',0,0);

/*Table structure for table `tb_kriteria` */

DROP TABLE IF EXISTS `tb_kriteria`;

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(256) NOT NULL,
  `atribut` varchar(256) NOT NULL DEFAULT 'benefit',
  PRIMARY KEY (`kode_kriteria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tb_kriteria` */

insert  into `tb_kriteria`(`kode_kriteria`,`nama_kriteria`,`atribut`) values ('C1','Harga Jual','benefit'),('C2','Permintaan Pasar','benefit'),('C3','Kebutuhan Bahan Baku','benefit'),('C4','Waktu Produksi','cost'),('C5','Biaya Pengolahan','cost');

/*Table structure for table `tb_rel_alternatif` */

DROP TABLE IF EXISTS `tb_rel_alternatif`;

CREATE TABLE `tb_rel_alternatif` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rel_alternatif` */

insert  into `tb_rel_alternatif`(`ID`,`kode_alternatif`,`kode_kriteria`,`nilai`) values (11,'A1','C1',32000),(12,'A1','C2',5),(13,'A1','C3',100),(14,'A1','C4',7),(15,'A1','C5',5),
                                                                                        (21,'A2','C1',30000),(22,'A2','C2',4),(23,'A2','C3',60),(24,'A2','C4',5),(25,'A2','C5',4),
                                                                                        (31,'A3','C1',55000),(32,'A3','C2',4),(33,'A3','C3',120),(34,'A3','C4',8),(35,'A3','C5',5),
                                                                                        (41,'A4','C1',25000),(42,'A4','C2',7),(43,'A4','C3',20),(44,'A4','C4',5),(45,'A4','C5',5),
                                                                                        (51,'A5','C1',80000),(52,'A5','C2',8),(53,'A5','C3',700),(54,'A5','C4',8),(55,'A5','C5',6),
                                                                                        (61,'A6','C1',60000),(62,'A6','C2',8),(63,'A6','C3',150),(64,'A6','C4',9),(65,'A6','C5',7),
                                                                                        (71,'A7','C1',35000),(72,'A7','C2',6),(73,'A7','C3',100),(74,'A7','C4',6),(75,'A7','C5',5),
                                                                                        (81,'A8','C1',700000),(82,'A8','C2',8),(83,'A8','C3',6000),(84,'A8','C4',15),(85,'A8','C5',9),
                                                                                        (91,'A9','C1',250000),(92,'A9','C2',7),(93,'A9','C3',3000),(94,'A9','C4',12),(95,'A9','C5',7),
                                                                                        (101,'A10','C1',180000),(102,'A10','C2',7),(103,'A10','C3',2000),(104,'A10','C4',10),(105,'A10','C5',6);

/*Table structure for table `tb_rel_kriteria` */

DROP TABLE IF EXISTS `tb_rel_kriteria`;

CREATE TABLE `tb_rel_kriteria` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID1` varchar(16) DEFAULT NULL,
  `ID2` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=437 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rel_kriteria` */

insert  into `tb_rel_kriteria`(`ID`,`ID1`,`ID2`,`nilai`) values (11,'C1','C1',1),(12,'C1','C2',1),(13,'C1','C3',1),(14,'C1','C4',1),(15,'C1','C5',1),
                                                                (21,'C2','C1',1),(22,'C2','C2',1),(23,'C2','C3',1),(24,'C2','C4',1),(25,'C2','C5',1),
                                                                (31,'C3','C1',1),(32,'C3','C2',1),(33,'C3','C3',1),(34,'C3','C4',1),(35,'C3','C5',1),
                                                                (41,'C4','C1',1),(42,'C4','C2',1),(43,'C4','C3',1),(44,'C4','C4',1),(45,'C4','C5',1),
                                                                (51,'C5','C1',1),(52,'C5','C2',1),(53,'C5','C3',1),(54,'C5','C4',1),(55,'C5','C5',1);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

-- CREATE TABLE `tb_user` (
--   `user` varchar(16) DEFAULT NULL,
--   `pass` varchar(16) DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- /*Data for the table `tb_user` */

-- insert  into `tb_user`(`user`,`pass`) values ('admin','ADMIN');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
