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
  `foto` varchar(100) DEFAULT 'default.jpg',
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nip`),
  KEY `username` (`username`),
  CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `guru` */

insert  into `guru`(`nip`,`nama`,`tempat`,`tanggal_lahir`,`alamat`,`telepon`,`email`,`foto`,`username`,`date_created`) values ('123456','guru','Sukabumi','1978-12-12','jl loasari 5 no 64 Rt 03 Rw 02','0987654323','a@a.com','982391960284_694862843963459_4773245070259265499_n.jpg','guru','2015-07-07 22:55:49'),('196010151981012002','HJ. WIWIN SAKUNTALA DEWI, M.Pd','Sukabumi','1960-10-15','jl loasari no 1','087834256177','wiwinsukanta@yahoo.com','776885HJ. WIWIN SAKUNTALA DEWI, M.Pd.jpg','WIWIN','2015-07-07 23:24:44'),('196207051993031009','SURYADI, S.Pd','Sukabumi','1962-07-05','jl pelabuhan 2 no 309','085692993421','suryadi@yahoo.com','79467SURYADI, S.Pd.jpg','SURYADI','2015-07-07 22:59:14'),('196404062007011035','SUDIRMAN S.Pd','Solo','1964-04-06','jl pabuaran no 74','081578234508','sudirmanjl@ymail.com','851226SUDIRMAN S.Pd.jpg','SUDIRMAN','2015-07-07 23:02:50'),('196607051993032007','Hj. SITI SAROH, S.Pd','Sukabumi','1966-07-05','Jl. munarman n0 34','089934217645','hjsiti@yahoo.com','81054Hj. SITI SAROH, S.Pd.jpg','SITI','2015-07-07 22:33:33'),('196612151999031002','JARWOTO, S.Pd','surabaya','1966-12-15','jl. baros no125','085792431002','jarwoto15@yahoo.com','109375JARWOTO, S.Pd.jpg','JARWOTO','2015-07-07 21:53:13'),('196706131995122001','ENY SUSILOWATI, S.Pd','Sukabumi','1967-06-13','jl. badaksinga no 15 Rt 02 Rw 15','085613199512','enysusilowati@yahoo.com','737396ENY SUSILOWATI, S.Pd.jpg','ENY','2015-07-07 22:01:33'),('196807271995122002','LILIK SJOFIATUN, S.Pd','Sukabumi','1968-07-27','jl loasari 5 no 64 Rt 03 Rw 02','081253764321','liliksj@yahoo.com','298614LILIK SJOFIATUN, S.Pd.jpg','LILIK','2015-07-07 22:24:33'),('196909181993011002','ILYAS, S.Pd, M.M','Bogor','1969-09-18','jl rancakadu no 67','085819384742','ilyas@ymail.com','848022ILYAS, S.Pd, M.M.jpg','ILYAS','2015-07-07 23:21:52'),('197106041999031009','EDI KRISNANTO, S.Pd','Sukabumi','1971-07-04','jl munawarman 11 ','08127866432','ediedi@yahoo.com','260498EDI KRISNANTO, S.Pd.jpg','EDI','2015-07-07 23:55:58'),('197210112007012014','FATHILAH, S.Ag','Bogor','1972-10-11','jl pemuda no 99','085797029069','fatilah.72@gmail.com','311645FATHILAH, S.Ag.jpg','FATHILAH','2015-07-08 00:00:58'),('1973021012042000','ADNAN, S.Ag','Sukabumi','1973-02-02','jl bayangkara no 221','089921975422','adnantea@yahoo.com','230163ADNAN, S.Ag.jpg','ADNAN','2015-07-07 23:08:35'),('197308142007012027','NURLAILAH, S.Ag','Sukabumi','1973-08-14','perum nangeleng jl sunda no 98','082254317655','nurlailah@yahoo.com','227294NURLAILAH, S.Ag.jpg','NURLAILAH','2015-07-07 23:18:31'),('197504022007012025','RAHMAWATI, S.Ag','Sukabumi','1975-04-02','Jl pelabuhan 2 no 19','0857642312','rahma66@yahoo.com','660095RAHMAWATI, S.Ag.jpg','RAHMAWATI','2015-07-07 22:52:51'),('197602242008012010','RIRIN YUNIARSIH, S.Pd','Sukabumi','1979-02-24','jl. pelabuan no 10','085707012010','ririnyuniarrih65@yahoo.com','535705RIRIN YUNIARSIH, S.Pd.jpg','RIRIN','2015-07-07 21:46:55'),('197609032007011015','MUHROSIM, S.Pd','Bandung','1976-09-03','jl. garuda no 100','08819921345','muh_rosim@ymail.com','711700MUHROSIM, S.Pd.jpg','MUHROSIM','2015-07-07 22:39:43'),('197704122007011020','BASTIAN, S.Pd','Bogor','1977-04-12','perum indah permai jl. musik no 02','081245543663','bastian.04.12@gmail.com','186462BASTIAN, S.Pd.jpg','BASTIAN','2015-07-07 22:48:08'),('1982040305061999','MAESYURI, S.Pd','Tanggerang','1983-04-03','jl juanda no 51','081534564444','mes89@yahoo.com','320159MAESYURI, S.Pd.jpg','MAESYURI','2015-07-07 23:16:27'),('1983072102102001','AANG NURHALI, S.Pd','Bandung','1983-07-21','perum cibereum 2 jl badak no 04','082154332176','aang@yahoo.com','457336AANG NURHALI, S.Pd.jpg','AANG','2015-07-07 23:11:40'),('1989200305162002','Slamet, S.Pd.','Sukabumi','1989-03-20','jl bungbulang no 22','087865213344','slametajj@gmail.com','370819Slamet, S.Pd..jpg','Slamet','2015-07-07 23:53:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `kelas` */

insert  into `kelas`(`id_kelas`,`nis`,`id_sko`,`date_created`) values (28,'217102091',12,'2015-07-08 06:53:57'),(29,'217102091',6,'2015-07-08 07:05:38'),(30,'217102091',5,'2015-07-08 07:13:18'),(31,'10111001',14,'2015-07-08 07:21:34');

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

insert  into `mata_pelajaran`(`id_mp`,`nama_mp`,`kurikulum`,`date_created`) values ('1','Matematika','2013','2015-06-20 16:20:00'),('10','Ilmu Pengetahuan Sosial','2014','2015-07-08 00:30:16'),('2','PKN','2014','2015-06-20 16:20:00'),('3','Pendidikan Agama Islam','2013','2015-06-20 16:20:00'),('4','Komputer','2015','2015-06-20 16:20:00'),('5','Bahasa Indonesia','2013','2015-07-08 00:27:39'),('6','Ilmu Pengetahuan Alam','2013','2015-07-08 00:27:39'),('7','Pendidikan Jasmani','2013','2015-07-08 00:27:39'),('8','Seni Budaya','2014','2015-07-08 00:27:39'),('9','Bahasa Inggris','2014','2015-07-08 00:27:39');

/*Table structure for table `materi` */

DROP TABLE IF EXISTS `materi`;

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL AUTO_INCREMENT,
  `judul_materi` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `file` text,
  `id_sko` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_materi`),
  KEY `materi_ibfk_1` (`id_sko`),
  CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_sko`) REFERENCES `sesi_kelas_online` (`id_sko`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `materi` */

insert  into `materi`(`id_materi`,`judul_materi`,`deskripsi`,`file`,`id_sko`,`date_created`) values (34,'TES','TES','Graf-12.pdf',32,'2015-07-08 03:14:23'),(35,'TES','TES','chapter 4 Analisis Sistem 16(tugas).pptx',32,'2015-07-08 03:15:19'),(38,'TES','TES','EBOOK FRAMEWORK BOOTSTRAP BAHASA INDONESIA.pdf',5,'2015-07-08 07:02:43');

/*Table structure for table `pengumuman` */

DROP TABLE IF EXISTS `pengumuman`;

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(100) DEFAULT 'default.jpg',
  `id_admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pengumuman`),
  KEY `id_admin` (`id_admin`),
  CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `pengumuman` */

insert  into `pengumuman`(`id_pengumuman`,`judul`,`deskripsi`,`tanggal`,`image`,`id_admin`) values (1,'Libur Lebaran','ini pengumuman libur lebaran','2015-07-02 04:30:50','347747lebaran.jpg',1),(2,'Libur Semester','ini pengumuman libur Semester','2015-07-02 04:30:59','931213libur.jpg',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `pengumuman_kelas` */

insert  into `pengumuman_kelas`(`id_pengumuman`,`judul`,`deskripsi`,`id_sko`,`date_created`) values (4,'Test','	tes			',5,'2015-07-08 07:27:01'),(5,'116','		556		',12,'2015-07-08 07:30:53');

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `sesi_kelas_online` */

insert  into `sesi_kelas_online`(`id_sko`,`nip`,`nama_kelas`,`semester`,`tahun`,`id_mp`,`date_created`) values (5,'196607051993032007','PKN 1A',NULL,NULL,'2','2015-07-08 00:07:23'),(6,'196607051993032007','PKN 2B',NULL,NULL,'2','2015-07-08 00:08:07'),(7,'196607051993032007','PKN 3A',NULL,NULL,'2','2015-07-08 00:08:52'),(8,'197609032007011015','PKN 1B',NULL,NULL,'2','2015-07-08 00:40:06'),(9,'197609032007011015','PKN 1C',NULL,NULL,'2','2015-07-08 00:40:32'),(10,'197609032007011015','PKN 2C',NULL,NULL,'2','2015-07-08 00:40:53'),(11,'197609032007011015','PKN 3C',NULL,NULL,'2','2015-07-08 00:41:20'),(12,'196607051993032007','PKN 2A',NULL,NULL,'2','2015-07-08 00:42:07'),(13,'196607051993032007','PKN 3B',NULL,NULL,'2','2015-07-08 00:42:37'),(14,'196706131995122001','MTK 1A',NULL,NULL,'1','2015-07-08 00:43:21'),(15,'196706131995122001','MTK 1C',NULL,NULL,'1','2015-07-08 00:43:41'),(16,'196706131995122001','MTK 2B',NULL,NULL,'1','2015-07-08 00:43:54'),(17,'196706131995122001','MTK 3A',NULL,NULL,'1','2015-07-08 00:44:13'),(18,'196706131995122001','MTK 3C',NULL,NULL,'1','2015-07-08 00:44:27'),(19,'196612151999031002','MTK 1B',NULL,NULL,'1','2015-07-08 00:45:08'),(20,'196612151999031002','MTK 2A',NULL,NULL,'1','2015-07-08 00:45:26'),(21,'196612151999031002','MTK 2C',NULL,NULL,'1','2015-07-08 00:45:39'),(22,'196612151999031002','MTK 3B',NULL,NULL,'1','2015-07-08 00:46:06'),(23,'196807271995122002','BI 1A',NULL,NULL,'5','2015-07-08 00:47:49'),(24,'196807271995122002','BI 1B',NULL,NULL,'5','2015-07-08 00:48:03'),(25,'196807271995122002','BI 1C',NULL,NULL,'5','2015-07-08 00:48:14'),(26,'196807271995122002','BI 3C',NULL,NULL,'5','2015-07-08 00:48:33'),(27,'197602242008012010','BI 2A',NULL,NULL,'5','2015-07-08 00:49:46'),(28,'197602242008012010','BI 2B',NULL,NULL,'5','2015-07-08 00:50:10'),(29,'197602242008012010','BI 2C',NULL,NULL,'5','2015-07-08 00:50:34'),(30,'197602242008012010','BI 3A',NULL,NULL,'5','2015-07-08 00:50:48'),(31,'197602242008012010','BI 3B',NULL,NULL,'5','2015-07-08 00:50:57'),(32,'123456','Test Kelas',NULL,NULL,'5','2015-07-08 02:37:44');

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
  `foto` varchar(100) DEFAULT 'default.jpg',
  `username` varchar(50) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`nis`),
  KEY `username` (`username`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `siswa` */

insert  into `siswa`(`nis`,`nama`,`kelas`,`jurusan`,`tempat`,`tanggal_lahir`,`alamat`,`telepon`,`email`,`foto`,`username`,`date_created`) values ('1','a','a','','a','0000-00-00','a','a','a','428558229702_256289634381742_549676_n.jpg','aa','2015-07-08 02:22:38'),('10111001','DADAn SETIADI','IPA-1','IPA','Bandung','1990-11-11','Bandung','085222241987','10111001@gmail.com','saved_resource(20).jpg','siswa','2015-06-20 17:41:47'),('10111002','CHANDRA AGUSTYANTO PRABO','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111002@gmail.com','saved_resource(1).jpg','10111002','2015-06-20 17:41:47'),('10111003','E ZENAL A','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111003@gmail.com','saved_resource(2).jpg','10111003','2015-06-20 17:41:47'),('10111004','ERNA ROSYANAH','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111004@gmail.com','saved_resource(3).jpg','10111004','2015-06-20 17:41:47'),('10111005','GEORGE FUNNY CONSTANTIN','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111005@gmail.com','saved_resource(4).jpg','10111005','2015-06-20 17:41:47'),('10111006','LUTHFI','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111006@gmail.com','saved_resource(5).jpg','10111006','2015-06-20 17:41:47'),('10111007','MONIKA SARI','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111007@gmail.com','saved_resource(6).jpg','10111007','2015-06-20 17:41:47'),('10111008','NITA MARLIYANI','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111008@gmail.com','saved_resource(7).jpg','10111008','2015-06-20 17:41:47'),('10111009','SEPTIADI','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111009@gmail.com','saved_resource(8).jpg','10111009','2015-06-20 17:41:47'),('10111010','SINGGIH OKFRIYANTO','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111010@gmail.com','saved_resource(9).jpg','10111010','2015-06-20 17:41:47'),('10111011','SUBING HERMAWAN','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111011@gmail.com','saved_resource(10).jpg','10111011','2015-06-20 17:41:47'),('10111012','A AMIRUDDIN','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111012@gmail.com','saved_resource(11).jpg','10111012','2015-06-20 17:41:47'),('10111013','A BASO LOLO','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111013@gmail.com','saved_resource(12).jpg','10111013','2015-06-20 17:41:47'),('10111014','A FARLI ABADI','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111014@gmail.com','saved_resource(13).jpg','10111014','2015-06-20 17:41:47'),('10111015','A FAROUK GINANJAR','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111015@gmail.com','saved_resource(14).jpg','10111015','2015-06-20 17:41:47'),('10111016','A FAUZAN MUTAKIN','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111016@gmail.com','saved_resource(15).jpg','10111016','2015-06-20 17:41:47'),('10111017','A FAUZAN MUTAKIN','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111017@gmail.com','saved_resource(16).jpg','10111017','2015-06-20 17:41:47'),('10111018','A GAMA','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111018@gmail.com','saved_resource(17).jpg','10111018','2015-06-20 17:41:47'),('10111019','A PRADANA UGAN','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111019@gmail.com','saved_resource(18).jpg','10111019','2015-06-20 17:41:47'),('10111020','A SILFIA APRIYANTI','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111020@gmail.com','saved_resource(19).jpg','10111020','2015-06-20 17:41:47'),('10111021','A WAFIE AMINULLAH','IPA-1','IPA','Bandung','1990-11-11','Bandung',NULL,'10111021@gmail.com','saved_resource(20).jpg','10111021','2015-06-20 17:41:47'),('10111022','A. ABDUR RACHMAN','IPS-1','IPS','Bandung','1990-11-11','Bandung',NULL,'10111022@gmail.com','saved_resource(21).jpg','10111022','2015-06-20 17:41:47'),('205968261','ABU JABAR AL RIFA','1A','','Sukabumi','2002-05-02','','','','178955download.jpg','ABU','2015-07-08 06:34:38'),('217101906','ARISA SUHARDI PUTRI','1A','','Sukabumi','2002-01-26','','','','456024download.jpg','ARISA','2015-07-08 06:45:06'),('217102091','DINI ASRI ALVITA','1A','','Sukabumi','2002-06-23','','','','449829download.jpg','DINI','2015-07-08 06:50:59'),('217105968','CHOFIFAH SITI RACHMA','1A','','Sukabumi','2002-09-21','','','','91003download.jpg','CHOFIFAH','2015-07-08 06:47:13'),('220565863','ALDI RIZQULLAH','1A','','Sukabumi','2002-04-05','','','','896606download.jpg','ALDI','2015-07-08 06:38:36'),('221783129','DEWI RAHAYU','1A','','Sukabumi','2002-05-26','','','','452362download.jpg','DEWI','2015-07-08 06:48:54'),('221783134','ANIS FAUZIAH','1A','','Sukabumi','2002-05-30','','','','131896download.jpg','ANIS','2015-07-08 06:41:38'),('274397125','ARIS OKTAVIANTO','1A','','Sukabumi','2002-10-06','','','','773376download.jpg','ARIS','2015-07-08 06:43:34'),('344731812','ADE MAWAR','1A','','Sukabumi','2000-04-24','','','','257843download.jpg','ADE','2015-07-08 06:36:34'),('ANDIKA','ANDIKA PRATAMA','1A','','Sukabumi','2002-05-21','','','','544342download.jpg','ANDIKA','2015-07-08 06:40:04'),('tarkiman','Tarkiman','Otomotif 1','Teknik Mekanik Otomotif','Subang','1987-11-11','Subang',NULL,'tarkiman@gmail.com','saved_resource.jpg','tarkiman','2015-06-20 17:41:47');

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

insert  into `user`(`username`,`password`,`level`,`status`,`id_session`,`date_created`) values ('10111001','4188bd9ad1e2c2f2d6a429c29ec28532','siswa','N',NULL,'2015-06-20 23:21:34'),('10111002','1096a9d28ca7950724a896867e729133','siswa','N',NULL,'2015-06-20 23:21:34'),('10111003','ac7aa80ad8d344c8d56733d2f5810a07','siswa','N',NULL,'2015-06-20 23:21:34'),('10111004','298d47047ef997bfd4c253dca2cc0588','siswa','N',NULL,'2015-06-20 23:21:34'),('10111005','89c5e76b6e88cdc7a34cf9cfac0a3617','siswa','N',NULL,'2015-06-20 23:21:34'),('10111006','2202ed712481940f934cfb5812b743f3','siswa','N',NULL,'2015-06-20 23:21:34'),('10111007','1bdeccb61df1623412271e05874b0094','siswa','N',NULL,'2015-06-20 23:21:34'),('10111008','fb9f7ca2d7daad69473b1192db1d7c30','siswa','N',NULL,'2015-06-20 23:21:34'),('10111009','0d5f6c7702aa2126719f1449869cb871','siswa','N',NULL,'2015-06-20 23:21:34'),('10111010','7633ae66d8c814f618ccf6a136fcb5d5','siswa','N',NULL,'2015-06-20 23:21:34'),('10111011','8273f9a4830487d0fd67eefa1f05423e','siswa','N',NULL,'2015-06-20 23:21:34'),('10111012','065a5f4b23f21227653cd1bdf2201caa','siswa','N',NULL,'2015-06-20 23:21:34'),('10111013','e8e5271bc8c846a413d8a8738f7305c5','siswa','N',NULL,'2015-06-20 23:21:34'),('10111014','edf05e441e14f691663cd2d1807276b4','siswa','N',NULL,'2015-06-20 23:21:34'),('10111015','54d26518c4a4300bbefa41c5a25040ec','siswa','N',NULL,'2015-06-20 23:21:34'),('10111016','f248a96e9f28c80844e8c27fc86d3e4d','siswa','N',NULL,'2015-06-20 23:21:34'),('10111017','942564e2e36dccdd3abc6e3da165c8c6','siswa','N',NULL,'2015-06-20 23:21:34'),('10111018','b062ce653c73b5ff8a3ed1b0f3534651','siswa','N',NULL,'2015-06-20 23:21:34'),('10111019','35d35932e2d72f1f42e28f89e8764de4','siswa','N',NULL,'2015-06-20 23:21:34'),('10111020','62b6c7739d9d7e6d52985b4c46c4d00a','siswa','N',NULL,'2015-06-20 23:21:34'),('10111021','d25d93b78bd1e0867aad1aab4ff01342','siswa','N',NULL,'2015-06-20 23:21:34'),('10111022','f3c3723ca1a17b924a7637976d8a47a9','siswa','N',NULL,'2015-06-20 23:21:34'),('102129','80d2f169f1a586475915139d767a3f99','guru','N',NULL,'2015-06-20 23:54:48'),('a','0cc175b9c0f1b6a831c399e269772661','siswa','Y',NULL,'2015-07-08 02:26:21'),('aa','0cc175b9c0f1b6a831c399e269772661','siswa','Y',NULL,'2015-07-08 02:22:38'),('AANG','5ee2fb9b71d60d918cb91ef52c064645','guru','N',NULL,'2015-07-07 23:11:40'),('ABU','37c0b4a203a76aa6e2a4747c8b4f2c0e','siswa','Y',NULL,'2015-07-08 06:34:38'),('ADE','8418cad2dcc02c5131a160caf4d8a229','siswa','Y',NULL,'2015-07-08 06:36:34'),('admin','21232f297a57a5a743894a0e4a801fc3','admin','Y','vq6mkknnu49uobofmt60evdrs7','2015-06-20 23:21:34'),('ADNAN','2dbaf267f0d5ec5a5cb9f6d2b615a218','guru','N',NULL,'2015-07-07 23:08:35'),('ALDI','41267d9fb3826d417e32077a3b0a35e5','siswa','Y',NULL,'2015-07-08 06:38:36'),('ANDIKA','d449ffcf3e361e25e0d432ffe94d5d36','siswa','Y',NULL,'2015-07-08 06:40:03'),('ANIS','79558d36eda4ed7ee9901ceeadd319ce','siswa','Y',NULL,'2015-07-08 06:41:38'),('ARIS','950a3d97e5f47593d50dbea6a7f77582','siswa','Y',NULL,'2015-07-08 06:43:34'),('ARISA','8b52a0a437ddef6aa64673bcf1826196','siswa','Y',NULL,'2015-07-08 06:45:06'),('BASTIAN','2feeda5b19242cf060eeef71b8dcd9f0','guru','N',NULL,'2015-07-07 22:48:08'),('CHOFIFAH','7f448f2a446bdf305e861310c7979889','siswa','Y',NULL,'2015-07-08 06:47:13'),('DEWI','f8a7f5d7ad69505e97391b94665555c6','siswa','Y',NULL,'2015-07-08 06:48:54'),('DINI','c3136d3d5496fb5fb625a9a2da5c4360','siswa','Y','okd80apdo8p2t4jkue5bktk633','2015-07-08 06:50:59'),('EDI','4d2e27158ca5f1c109c99624b7ee9092','guru','N',NULL,'2015-07-07 23:55:58'),('ENY','4e8a52f3feea564556622fe4e0191307','guru','Y','069rvl8a8jcfbt7grmvu8gg6h0','2015-07-07 22:01:33'),('FATHILAH','56e22126d24b19ba71d456835a906ef2','guru','N',NULL,'2015-07-08 00:00:58'),('guru','77e69c137812518e359196bb2f5e9bb9','guru','Y','qfo7a15rat6i8qhd5homdqjos2','2015-07-07 22:55:49'),('ILYAS','e23a12ea1a53c285068fc114f5697237','guru','N',NULL,'2015-07-07 23:21:52'),('JARWOTO','c78b3877f247cb09abdf26c9d73afda8','guru','Y','ri5qqjugknqlah8imj6dgissj1','2015-07-07 21:53:13'),('LILIK','4806b0cfb83c05e31f3b83e1945a979b','guru','Y','igs8rrb9bjrqn0mf8o1ajhh0f3','2015-07-07 22:24:33'),('MAESYURI','5bfacd2768e520dbdb5a845bc2dfb7c7','guru','N',NULL,'2015-07-07 23:16:27'),('MUHROSIM','a95071dc5a9ce01eac8d8407efea7bd5','guru','Y','ra42ctvpj93darf5r7ior87jm4','2015-07-07 22:39:43'),('NURLAILAH','59778a36565e64741c1667879cb892bb','guru','N',NULL,'2015-07-07 23:18:31'),('RAHMAWATI','43614e9df308f5d7f7f3140a0ace9379','guru','N',NULL,'2015-07-07 22:52:51'),('RIRIN','64c3bc37622b2a871117912d21ec9225','guru','Y','asmia453s2rph3ck8f1egsl3i1','2015-07-07 21:46:55'),('siswa','bcd724d15cde8c47650fda962968f102','siswa','Y','239sqtou835qh7ff6ju5hs4ne2','2015-06-20 23:21:34'),('SITI','7f0bd0ea687bddd9b1197e79a2a1aee9','guru','Y','lefl5e2psdt8ej9cn5teitpp66','2015-07-07 22:33:33'),('Slamet','b6f01395cae79f74d7693b8b72e76b88','guru','N',NULL,'2015-07-07 23:53:04'),('SUDIRMAN','360ac85987cf7f7f30d1ae412292427f','guru','N',NULL,'2015-07-07 23:02:50'),('SURYADI','86cab0e89592984d120f59171fe5245e','guru','N',NULL,'2015-07-07 22:59:14'),('tarkiman','d070fc82541618e84313e44f91a67f1c','siswa','Y','t8con5pram4l10vno6d0mfar90','2015-06-20 23:21:34'),('WIWIN','5c6bc170b55362ad1b30506f1b18b9b0','guru','N',NULL,'2015-07-07 23:24:44');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
