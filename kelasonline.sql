/*
SQLyog Ultimate v9.63 
MySQL - 5.1.33-community-log : Database - kelasonline
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kelasonline` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kelasonline`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id`,`nama`,`email`,`username`,`alamat`,`telepon`,`foto`,`date_created`) values (1,'admin','admin@gmail.com','admin','Bandung','085222241987','taryana.png','2015-06-21 00:02:49');

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nip`),
  KEY `username` (`username`),
  CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `guru` */

insert  into `guru`(`nip`,`nama`,`tempat`,`tanggal_lahir`,`alamat`,`telepon`,`email`,`foto`,`username`,`date_created`) values ('102100','TARKIMAN, S.KOM','Subang','1987-11-11','Bandung',NULL,'102100@gmail.com','tarkiman.jpg','102100','2015-06-20 23:35:53'),('102101','ADAM MUKHARIL BACHTIAR','Bandung','1980-08-17','Bandung',NULL,'102101@gmail.com','saved_resource(2).jpg','102101','2015-06-20 23:35:53'),('102102','ADE RAHMAT ISKANDAR, S.KOM','Bandung','1980-08-17','Bandung',NULL,'102102@gmail.com','saved_resource(3).jpg','102102','2015-06-20 23:35:53'),('102103','ADI RACHMANTO','Bandung','1980-08-17','Bandung',NULL,'102103@gmail.com','saved_resource(4).jpg','102103','2015-06-20 23:35:53'),('102104','ADI RAHMANTO, S.KOM','Bandung','1980-08-17','Bandung',NULL,'102104@gmail.com','saved_resource(5).jpg','102104','2015-06-20 23:35:53'),('102105','ADI SUNARJO, ST','Bandung','1980-08-17','Bandung',NULL,'102105@gmail.com','saved_resource(6).jpg','102105','2015-06-20 23:35:53'),('102106','ADITYA ACHMAD FATHONY','Bandung','1980-08-17','Bandung',NULL,'102106@gmail.com','saved_resource(7).jpg','102106','2015-06-20 23:35:53'),('102107','ADIYANA SLAMET','Bandung','1980-08-17','Bandung',NULL,'102107@gmail.com','saved_resource(8).jpg','102107','2015-06-20 23:35:53'),('102108','AGUNG WAHONO, MT','Bandung','1980-08-17','Bandung',NULL,'102108@gmail.com','saved_resource(9).jpg','102108','2015-06-20 23:35:53'),('102109','AGUS MULYANA','Bandung','1980-08-17','Bandung',NULL,'102109@gmail.com','saved_resource(10).jpg','102109','2015-06-20 23:35:53'),('102110','AGUSRIYANTO','Bandung','1980-08-17','Bandung',NULL,'102110@gmail.com','saved_resource(11).jpg','102110','2015-06-20 23:35:53'),('102111','AHMAD AMARULLAH','Bandung','1980-08-17','Bandung',NULL,'102111@gmail.com','saved_resource(12).jpg','102111','2015-06-20 23:35:53'),('102112','AHMAD AMARULLAH, S.KOM','Bandung','1980-08-17','Bandung',NULL,'102112@gmail.com','saved_resource(13).jpg','102112','2015-06-20 23:35:53'),('102113','AHMAD FACHRUDDIN','Bandung','1980-08-17','Bandung',NULL,'102113@gmail.com','saved_resource(14).jpg','102113','2015-06-20 23:35:53'),('102114','AHMAD SULAEMAN, S.KOM','Bandung','1980-08-17','Bandung',NULL,'102114@gmail.com','saved_resource(15).jpg','102114','2015-06-20 23:35:53'),('102115','AHMAD SULAIMAN, S.KOM','Bandung','1980-08-17','Bandung',NULL,'102115@gmail.com','saved_resource(1).jpg','102115','2015-06-20 23:35:53'),('102116','ALAM SANTOSA, MT.','Bandung','1980-08-17','Bandung',NULL,'102116@gmail.com','saved_resource(1).jpg','102116','2015-06-20 23:35:53'),('102117','ALIF FINANDHITA','Bandung','1980-08-17','Bandung',NULL,'102117@gmail.com','saved_resource(1).jpg','102117','2015-06-20 23:35:53'),('102118','ANANDA ROSETIKA, S.KOM','Bandung','1980-08-17','Bandung',NULL,'102118@gmail.com','saved_resource(1).jpg','102118','2015-06-20 23:35:53'),('102119','ANDI NURUL HUDA','Bandung','1980-08-17','Bandung',NULL,'102119@gmail.com','saved_resource(1).jpg','102119','2015-06-20 23:35:53'),('102120','ANDRI HERYANDI, M.T.','Bandung','1980-08-17','Bandung',NULL,'102120@gmail.com','saved_resource(1).jpg','102120','2015-06-20 23:35:53'),('102121','ANDRI MOHAMAD LUKMAN, ST','Bandung','1980-08-17','Bandung',NULL,'102121@gmail.com','saved_resource(1).jpg','102121','2015-06-20 23:35:53'),('102122','ANDRI SAHATA S, S.KOM','Bandung','1980-08-17','Bandung',NULL,'102122@gmail.com','saved_resource(1).jpg','102122','2015-06-20 23:35:53'),('102123','ANDRIAS DARMAYADI, M.SI','Bandung','1980-08-17','Bandung',NULL,'102123@gmail.com','saved_resource(1).jpg','102123','2015-06-20 23:35:53'),('102124','ANDRIAS DARMAYADI, M.SI','Bandung','1980-08-17','Bandung',NULL,'102124@gmail.com','saved_resource(1).jpg','102124','2015-06-20 23:35:53'),('102125','ANDRIS SAHATA SITANGGANG','Bandung','1980-08-17','Bandung',NULL,'102125@gmail.com','saved_resource(1).jpg','102125','2015-06-20 23:35:53'),('102126','ANDRIS SAHATA SITANGGANG','Bandung','1980-08-17','Bandung',NULL,'102126@gmail.com','saved_resource(1).jpg','102126','2015-06-20 23:35:53'),('102127','ANDRY ALAMSYAH, S.SI, M.SC','Bandung','1980-08-17','Bandung',NULL,'102127@gmail.com','saved_resource(1).jpg','102127','2015-06-20 23:35:53'),('102128','ANGGA RUSDINAR','Bandung','1980-08-17','Bandung',NULL,'102128@gmail.com','saved_resource(1).jpg','102128','2015-06-20 23:35:53'),('102129','ANGGA SETIYADI','Bandung','1980-08-17','Bandung','085222241987','102129@gmail.com','angga_setiyadi.png','guru','2015-06-20 23:35:53'),('102130','ANNA DARA ANDRIANA','Bandung','1980-08-17','Bandung',NULL,'102130@gmail.com','saved_resource(1).jpg','102130','2015-06-20 23:35:53'),('102131','ANNISA PARAMITHA FADILLAH','Bandung','1980-08-17','Bandung',NULL,'102131@gmail.com','saved_resource(1).jpg','102131','2015-06-20 23:35:53'),('102132','APRIANI PUTI PURFINI,S.KOM','Bandung','1980-08-17','Bandung',NULL,'102132@gmail.com','saved_resource(1).jpg','102132','2015-06-20 23:35:53'),('102133','APRIANTI PUTRI SUJANA, S.KOM., M.T.','Bandung','1980-08-17','Bandung',NULL,'102133@gmail.com','saved_resource(1).jpg','102133','2015-06-20 23:35:53'),('102134','ARIE PRASETIO','Bandung','1980-08-17','Bandung',NULL,'102134@gmail.com','saved_resource(1).jpg','102134','2015-06-20 23:35:53'),('102135','ARIF SAEFURROHMAN,S. KOM','Bandung','1980-08-17','Bandung',NULL,'102135@gmail.com','saved_resource(1).jpg','102135','2015-06-20 23:35:53'),('102136','ARINITA SANDRIA','Bandung','1980-08-17','Bandung',NULL,'102136@gmail.com','saved_resource(1).jpg','102136','2015-06-20 23:35:53'),('102137','ASEP SOLIH A','Bandung','1980-08-17','Bandung',NULL,'102137@gmail.com','saved_resource(1).jpg','102137','2015-06-20 23:35:53'),('102138','ASEP WAHYUDIN, S.KOM, MT','Bandung','1980-08-17','Bandung',NULL,'102138@gmail.com','saved_resource(1).jpg','102138','2015-06-20 23:35:53'),('102139','ASIH PRIHANDINI, M.HUM','Bandung','1980-08-17','Bandung',NULL,'102139@gmail.com','saved_resource(1).jpg','102139','2015-06-20 23:35:53'),('102140','ASIH PRIHANDINI,S.S,M.HUM','Bandung','1980-08-17','Bandung',NULL,'102140@gmail.com','saved_resource(1).jpg','102140','2015-06-20 23:35:53'),('102141','ASTRI BUDI YUSNIATI, ST','Bandung','1980-08-17','Bandung',NULL,'102141@gmail.com','saved_resource(1).jpg','102141','2015-06-20 23:35:53'),('102142','BAMBANG PRAYETNO, S.KOM','Bandung','1980-08-17','Bandung',NULL,'102142@gmail.com','saved_resource(1).jpg','102142','2015-06-20 23:35:53'),('102143','BAMBANG SISWOYO','Bandung','1980-08-17','Bandung',NULL,'102143@gmail.com','saved_resource(1).jpg','102143','2015-06-20 23:35:53'),('102144','BELLA HARDIYANA S.KOM','Bandung','1980-08-17','Bandung',NULL,'102144@gmail.com','saved_resource(1).jpg','102144','2015-06-20 23:35:53'),('102145','BELLA HARDIYANA S.KOM','Bandung','1980-08-17','Bandung',NULL,'102145@gmail.com','saved_resource(1).jpg','102145','2015-06-20 23:35:53'),('102146','BENNY MUSTAPHA, S.SI, MBA','Bandung','1980-08-17','Bandung',NULL,'102146@gmail.com','saved_resource(1).jpg','102146','2015-06-20 23:35:53'),('102147','BOBI KURNIAWAN, S.T.,M.KOM','Bandung','1980-08-17','Bandung',NULL,'102147@gmail.com','saved_resource(1).jpg','102147','2015-06-20 23:35:53'),('102148','BOBI KURNIAWAN, ST, M.KOM','Bandung','1980-08-17','Bandung',NULL,'102148@gmail.com','saved_resource(1).jpg','102148','2015-06-20 23:35:53'),('102149','BUDI FITRIADI','Bandung','1980-08-17','Bandung',NULL,'102149@gmail.com','saved_resource(1).jpg','102149','2015-06-20 23:35:53');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(50) DEFAULT NULL,
  `id_sko` int(11) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kelas`),
  KEY `nis` (`nis`),
  KEY `kelas_ibfk_2` (`id_sko`),
  CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`id_sko`) REFERENCES `sesi_kelas_online` (`id_sko`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

insert  into `kelas`(`id_kelas`,`nis`,`id_sko`,`date_created`) values (2,'10111002',1,'2015-06-20 14:10:53'),(3,'10111003',1,'2015-06-20 14:11:01'),(4,'10111004',1,'2015-06-20 14:11:14'),(5,'10111005',1,'2015-06-20 14:11:20'),(7,'10111002',4,'2015-06-20 14:13:04'),(8,'10111003',2,'2015-06-20 14:13:34'),(9,'10111004',3,'2015-06-20 14:13:46'),(10,'10111005',3,'2015-06-20 14:13:59'),(19,'tarkiman',3,'2015-06-21 03:44:57'),(20,'tarkiman',1,'2015-06-22 20:01:28'),(24,'10111001',3,'2015-06-25 00:02:15');

/*Table structure for table `mata_pelajaran` */

DROP TABLE IF EXISTS `mata_pelajaran`;

CREATE TABLE `mata_pelajaran` (
  `id_mp` varchar(50) NOT NULL,
  `nama_mp` varchar(100) DEFAULT NULL,
  `kurikulum` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_mp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mata_pelajaran` */

insert  into `mata_pelajaran`(`id_mp`,`nama_mp`,`kurikulum`,`date_created`) values ('1','Matematika','2013','2015-06-20 16:20:00'),('2','PKN','2014','2015-06-20 16:20:00'),('3','Pendidikan Agama Islam','2013','2015-06-20 16:20:00'),('4','Komputer','2015','2015-06-20 16:20:00');

/*Table structure for table `materi` */

DROP TABLE IF EXISTS `materi`;

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL AUTO_INCREMENT,
  `judul_materi` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `file` varchar(50) DEFAULT NULL,
  `id_sko` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_materi`),
  KEY `materi_ibfk_1` (`id_sko`),
  CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_sko`) REFERENCES `sesi_kelas_online` (`id_sko`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `materi` */

insert  into `materi`(`id_materi`,`judul_materi`,`deskripsi`,`file`,`id_sko`,`date_created`) values (1,'Integral','menjelaskan tentang Integral','kuliahonline.pdf',1,'2015-06-16 20:09:41'),(2,'Persamaan Linear','Persamaan linear yang terdiri dari ...','kuliahonline.pdf',1,'2015-06-19 22:37:49'),(3,'Hukum Jual Beli','Menjelaskan Hukum Jual Beli dalam Islam','kuliahonline.pdf',3,'2015-06-20 02:14:21'),(4,'Praktikum Hardware','Merkait Komputer','kuliahonline.pdf',4,'2015-06-20 05:25:27'),(6,'Pancasila','Rumusan Pancasila','kuliahonline.pdf',2,'2015-06-20 13:53:44');

/*Table structure for table `pengumuman` */

DROP TABLE IF EXISTS `pengumuman`;

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pengumuman`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengumuman` */

/*Table structure for table `pengumuman_kelas` */

DROP TABLE IF EXISTS `pengumuman_kelas`;

CREATE TABLE `pengumuman_kelas` (
  `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `id_sko` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pengumuman`),
  KEY `pengumuman_kelas_ibfk_2` (`id_sko`),
  CONSTRAINT `pengumuman_kelas_ibfk_2` FOREIGN KEY (`id_sko`) REFERENCES `sesi_kelas_online` (`id_sko`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pengumuman_kelas` */

insert  into `pengumuman_kelas`(`id_pengumuman`,`judul`,`deskripsi`,`id_sko`,`date_created`) values (1,NULL,'tugas kombinatorial sdh dpt dikerjakan , soal dpt dilihat di kelas Materi Matdisk 14-15. Thx',1,'2015-06-22 19:31:06'),(2,NULL,'tugas baru silahkan di download di kelas online',2,'2015-06-22 19:31:30'),(3,NULL,'pertemuan minggu ini saya tidak masuk, jadi untuk modulnya silahkan di di download dan di pelajari, minggu depan kita bahas, thank\'s',3,'2015-06-22 19:31:42');

/*Table structure for table `sesi_kelas_online` */

DROP TABLE IF EXISTS `sesi_kelas_online`;

CREATE TABLE `sesi_kelas_online` (
  `id_sko` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(50) DEFAULT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `id_mp` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_sko`),
  KEY `nip` (`nip`),
  KEY `id_mp` (`id_mp`),
  CONSTRAINT `sesi_kelas_online_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sesi_kelas_online_ibfk_2` FOREIGN KEY (`id_mp`) REFERENCES `mata_pelajaran` (`id_mp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `sesi_kelas_online` */

insert  into `sesi_kelas_online`(`id_sko`,`nip`,`nama_kelas`,`semester`,`tahun`,`id_mp`,`date_created`) values (1,'102100','Matematika IPA1','1',2015,'1','2015-06-20 02:10:27'),(2,'102105','PKN IPS 1','2',2015,'2','2015-06-20 02:12:21'),(3,'102129','Agama IPA 1','2',2015,'3','2015-06-20 02:12:43'),(4,'102100','Komputer IPA 1','2',2015,'4','2015-06-20 05:20:27');

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `nis` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nis`),
  KEY `username` (`username`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `siswa` */

insert  into `siswa`(`nis`,`nama`,`kelas`,`jurusan`,`tempat`,`tanggal_lahir`,`alamat`,`telepon`,`email`,`foto`,`username`,`date_created`) values ('10111001','DADAn SETIADI','IPA-1','IPA','Bandung','1990-11-11','Bandung','085222241987','10111001@gmail.com','saved_resource(20).jpg','siswa','2015-06-20 17:41:47'),('10111002','CHANDRA AGUSTYANTO PRABO','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111002@gmail.com','saved_resource(1).jpg','10111002','2015-06-20 17:41:47'),('10111003','E ZENAL A','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111003@gmail.com','saved_resource(2).jpg','10111003','2015-06-20 17:41:47'),('10111004','ERNA ROSYANAH','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111004@gmail.com','saved_resource(3).jpg','10111004','2015-06-20 17:41:47'),('10111005','GEORGE FUNNY CONSTANTIN','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111005@gmail.com','saved_resource(4).jpg','10111005','2015-06-20 17:41:47'),('10111006','LUTHFI','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111006@gmail.com','saved_resource(5).jpg','10111006','2015-06-20 17:41:47'),('10111007','MONIKA SARI','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111007@gmail.com','saved_resource(6).jpg','10111007','2015-06-20 17:41:47'),('10111008','NITA MARLIYANI','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111008@gmail.com','saved_resource(7).jpg','10111008','2015-06-20 17:41:47'),('10111009','SEPTIADI','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111009@gmail.com','saved_resource(8).jpg','10111009','2015-06-20 17:41:47'),('10111010','SINGGIH OKFRIYANTO','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111010@gmail.com','saved_resource(9).jpg','10111010','2015-06-20 17:41:47'),('10111011','SUBING HERMAWAN','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111011@gmail.com','saved_resource(10).jpg','10111011','2015-06-20 17:41:47'),('10111012','A AMIRUDDIN','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111012@gmail.com','saved_resource(11).jpg','10111012','2015-06-20 17:41:47'),('10111013','A BASO LOLO','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111013@gmail.com','saved_resource(12).jpg','10111013','2015-06-20 17:41:47'),('10111014','A FARLI ABADI','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111014@gmail.com','saved_resource(13).jpg','10111014','2015-06-20 17:41:47'),('10111015','A FAROUK GINANJAR','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111015@gmail.com','saved_resource(14).jpg','10111015','2015-06-20 17:41:47'),('10111016','A FAUZAN MUTAKIN','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111016@gmail.com','saved_resource(15).jpg','10111016','2015-06-20 17:41:47'),('10111017','A FAUZAN MUTAKIN','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111017@gmail.com','saved_resource(16).jpg','10111017','2015-06-20 17:41:47'),('10111018','A GAMA','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111018@gmail.com','saved_resource(17).jpg','10111018','2015-06-20 17:41:47'),('10111019','A PRADANA UGAN','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111019@gmail.com','saved_resource(18).jpg','10111019','2015-06-20 17:41:47'),('10111020','A SILFIA APRIYANTI','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111020@gmail.com','saved_resource(19).jpg','10111020','2015-06-20 17:41:47'),('10111021','A WAFIE AMINULLAH','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111021@gmail.com','saved_resource(20).jpg','10111021','2015-06-20 17:41:47'),('10111022','A. ABDUR RACHMAN','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111022@gmail.com','saved_resource(21).jpg','10111022','2015-06-20 17:41:47'),('tarkiman','Tarkiman','Otomotif 1','Teknik Mekanik Otomotif','Subang','1987-11-11','Subang',NULL,'tarkiman@gmail.com','saved_resource.jpg','tarkiman','2015-06-20 17:41:47');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` enum('admin','guru','siswa') DEFAULT NULL,
  `status` enum('Y','N') DEFAULT 'N',
  `id_session` varchar(100) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`username`,`password`,`level`,`status`,`id_session`,`date_created`) values ('10111001','4188bd9ad1e2c2f2d6a429c29ec28532','siswa','N',NULL,'2015-06-20 23:21:34'),('10111002','1096a9d28ca7950724a896867e729133','siswa','N',NULL,'2015-06-20 23:21:34'),('10111003','ac7aa80ad8d344c8d56733d2f5810a07','siswa','N',NULL,'2015-06-20 23:21:34'),('10111004','298d47047ef997bfd4c253dca2cc0588','siswa','N',NULL,'2015-06-20 23:21:34'),('10111005','89c5e76b6e88cdc7a34cf9cfac0a3617','siswa','N',NULL,'2015-06-20 23:21:34'),('10111006','2202ed712481940f934cfb5812b743f3','siswa','N',NULL,'2015-06-20 23:21:34'),('10111007','1bdeccb61df1623412271e05874b0094','siswa','N',NULL,'2015-06-20 23:21:34'),('10111008','fb9f7ca2d7daad69473b1192db1d7c30','siswa','N',NULL,'2015-06-20 23:21:34'),('10111009','0d5f6c7702aa2126719f1449869cb871','siswa','N',NULL,'2015-06-20 23:21:34'),('10111010','7633ae66d8c814f618ccf6a136fcb5d5','siswa','N',NULL,'2015-06-20 23:21:34'),('10111011','8273f9a4830487d0fd67eefa1f05423e','siswa','N',NULL,'2015-06-20 23:21:34'),('10111012','065a5f4b23f21227653cd1bdf2201caa','siswa','N',NULL,'2015-06-20 23:21:34'),('10111013','e8e5271bc8c846a413d8a8738f7305c5','siswa','N',NULL,'2015-06-20 23:21:34'),('10111014','edf05e441e14f691663cd2d1807276b4','siswa','N',NULL,'2015-06-20 23:21:34'),('10111015','54d26518c4a4300bbefa41c5a25040ec','siswa','N',NULL,'2015-06-20 23:21:34'),('10111016','f248a96e9f28c80844e8c27fc86d3e4d','siswa','N',NULL,'2015-06-20 23:21:34'),('10111017','942564e2e36dccdd3abc6e3da165c8c6','siswa','N',NULL,'2015-06-20 23:21:34'),('10111018','b062ce653c73b5ff8a3ed1b0f3534651','siswa','N',NULL,'2015-06-20 23:21:34'),('10111019','35d35932e2d72f1f42e28f89e8764de4','siswa','N',NULL,'2015-06-20 23:21:34'),('10111020','62b6c7739d9d7e6d52985b4c46c4d00a','siswa','N',NULL,'2015-06-20 23:21:34'),('10111021','d25d93b78bd1e0867aad1aab4ff01342','siswa','N',NULL,'2015-06-20 23:21:34'),('10111022','f3c3723ca1a17b924a7637976d8a47a9','siswa','N',NULL,'2015-06-20 23:21:34'),('102100','985f750f65e391cb0051b1b2e99bc688','guru','Y',NULL,'2015-06-20 23:54:48'),('102101','46b6a806d23f6b88bf865b83710e6af3','guru','Y',NULL,'2015-06-20 23:54:48'),('102102','802a53ee4185f931bb2669bdd179b175','guru','Y',NULL,'2015-06-20 23:54:48'),('102103','e2e1f3d5a4ab81110d69d88775350dbb','guru','N',NULL,'2015-06-20 23:54:48'),('102104','79d37f1a1c0d2b2bb3da3e4baea12ba5','guru','N',NULL,'2015-06-20 23:54:48'),('102105','74c6898c765b030d7390fe36ada0ff8c','guru','N',NULL,'2015-06-20 23:54:48'),('102106','ff5c3b976cec84bade2d257067c157e3','guru','N',NULL,'2015-06-20 23:54:48'),('102107','4f94e95feaef16e9ff1668fe3495b7a8','guru','N',NULL,'2015-06-20 23:54:48'),('102108','8553cc449c58ad1d685933233fc3a990','guru','N',NULL,'2015-06-20 23:54:48'),('102109','0f338e3c9f80e4cc684dd7af4f320e91','guru','N',NULL,'2015-06-20 23:54:48'),('102110','75addfa55247bb76eacb04c3c8c246bc','guru','N',NULL,'2015-06-20 23:54:48'),('102111','ab8972fc09bb17e07fd92828fb240d93','guru','N',NULL,'2015-06-20 23:54:48'),('102112','63d2780d05c0a77a61453e5232e8553c','guru','N',NULL,'2015-06-20 23:54:48'),('102113','e88d5f65f9d101c9ae2b996c8c3c044d','guru','N',NULL,'2015-06-20 23:54:48'),('102114','a7647e66fe2c80d59e7e2894f2a72999','guru','N',NULL,'2015-06-20 23:54:48'),('102115','77e40f21f4f5d69428abb7089ffdda77','guru','N',NULL,'2015-06-20 23:54:48'),('102116','d3f16ca317a488ca49df8934ab40269c','guru','N',NULL,'2015-06-20 23:54:48'),('102117','cb8653380b212fffc4e4cd2e6144bd94','guru','N',NULL,'2015-06-20 23:54:48'),('102118','1bebb09d7d254afbbfd9a73d15637278','guru','N',NULL,'2015-06-20 23:54:48'),('102119','b6f814f81c1a31556e25a5ec8c40c0e5','guru','N',NULL,'2015-06-20 23:54:48'),('102120','951f6d7750eefdd7df4830317e29cc89','guru','N',NULL,'2015-06-20 23:54:48'),('102121','76c0cd761ae0e081a738eb435e83c4ca','guru','N',NULL,'2015-06-20 23:54:48'),('102122','ace61ca003e9d9a383d2d8030c4da9ec','guru','N',NULL,'2015-06-20 23:54:48'),('102123','6269cd730988b8c6df3ba27a0d01eea9','guru','N',NULL,'2015-06-20 23:54:48'),('102124','8cadf8fb9018031f9e39e61a864eccf3','guru','N',NULL,'2015-06-20 23:54:48'),('102125','3fa7df82260962a922440b7a5c6efd9f','guru','N',NULL,'2015-06-20 23:54:48'),('102126','8534e5f8fcd475a40c05fe2a5ae6daf4','guru','N',NULL,'2015-06-20 23:54:48'),('102127','3cb9b60310763a4bc5e42367c2a0720e','guru','N',NULL,'2015-06-20 23:54:48'),('102128','fd7612455142d2b0a7021b84e7db4299','guru','N',NULL,'2015-06-20 23:54:48'),('102129','80d2f169f1a586475915139d767a3f99','guru','N',NULL,'2015-06-20 23:54:48'),('102130','f72f3c64f4035c03dcf80fb0c957be7b','guru','N',NULL,'2015-06-20 23:54:48'),('102131','d857a1bd18e5d145a7c14b7d05081301','guru','N',NULL,'2015-06-20 23:54:48'),('102132','b9e4f3729d1b5ec4db8312055f9930b9','guru','N',NULL,'2015-06-20 23:54:48'),('102133','b145b67606eb562c7e78493e34b6a83a','guru','N',NULL,'2015-06-20 23:54:48'),('102134','1eefb0fbd713086226ef9a8f3633b189','guru','N',NULL,'2015-06-20 23:54:48'),('102135','1892ba77e37afb750832b84c61ed99ac','guru','N',NULL,'2015-06-20 23:54:48'),('102136','cc0d0313ee4bbe0a3664126e4e63dbf5','guru','N',NULL,'2015-06-20 23:54:48'),('102137','88a78667012a80499533d1c3fcc4f138','guru','N',NULL,'2015-06-20 23:54:48'),('102138','87e39bd029cf322e22235d0515641a76','guru','N',NULL,'2015-06-20 23:54:48'),('102139','5d4cedd971c81b3ec3d62e46334af148','guru','N',NULL,'2015-06-20 23:54:48'),('102140','3cc79ca7b86157a6526ef38abf57fbb4','guru','N',NULL,'2015-06-20 23:54:48'),('102141','cf81132064091053758f0ae738dc10bf','guru','N',NULL,'2015-06-20 23:54:48'),('102142','c18019e4b8d91a8c8486928168566653','guru','N',NULL,'2015-06-20 23:54:48'),('102143','7aea439114f0514c025f23d801c8d57a','guru','N',NULL,'2015-06-20 23:54:48'),('102144','5a62c526fe80155631f1f28273f8dc26','guru','N',NULL,'2015-06-20 23:54:48'),('102145','09c329f12066bdb161150464562a6934','guru','N',NULL,'2015-06-20 23:54:48'),('102146','423ef784a17d8f70d3ff5a16571757d0','guru','N',NULL,'2015-06-20 23:54:48'),('102147','aef0b6fa45e8a89772bd9ca120d1b1ce','guru','N',NULL,'2015-06-20 23:54:48'),('102148','72bd9cba3fd164557511ee6eb8e16c5d','guru','N',NULL,'2015-06-20 23:54:48'),('102149','ca859bc3d1011f2c4ddd841ec759b687','guru','N',NULL,'2015-06-20 23:54:48'),('admin','21232f297a57a5a743894a0e4a801fc3','admin','Y','sh2n6lp94bne19bbicsau1u2l5','2015-06-20 23:21:34'),('guru','77e69c137812518e359196bb2f5e9bb9','guru','Y','c6e315p1vbufmrv4mg6a6vajd4','2015-06-20 23:21:34'),('siswa','bcd724d15cde8c47650fda962968f102','siswa','Y','qpvtkv0eukmo3t62qbi21jjjb3','2015-06-20 23:21:34'),('tarkiman','d070fc82541618e84313e44f91a67f1c','siswa','Y','t8con5pram4l10vno6d0mfar90','2015-06-20 23:21:34');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
