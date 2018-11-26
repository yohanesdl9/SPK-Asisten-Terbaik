-- MySQL dump 10.16  Distrib 10.1.31-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: spk_asisten
-- ------------------------------------------------------
-- Server version	10.1.31-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `asisten_dosen`
--

DROP TABLE IF EXISTS `asisten_dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asisten_dosen` (
  `nrp` varchar(9) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jk` char(1) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `nilai_disiplin` int(11) DEFAULT NULL,
  PRIMARY KEY (`nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asisten_dosen`
--

LOCK TABLES `asisten_dosen` WRITE;
/*!40000 ALTER TABLE `asisten_dosen` DISABLE KEYS */;
INSERT INTO `asisten_dosen` VALUES ('141111003','Yoppy Pangestu','L','Jl. Ki Ageng Gribig 182 Malang','087759482291','Honorer',85),('141111068','Alfonsius Lorensius','L','Jl. Malino 29 Malang','081974628293','Honorer',95),('141221003','Fery Andri Asmawan','L','Jl. Memberamo 20 Malang','081266472812','Honorer',80),('151111011','Yohanes Dwi Listio','L','Jl. Kelapa Sawit 122 A Malang','088992869107','Tetap',100),('151111014','Arrizky Rahmat Alifiansyah','L','Jl. Ikan Tombro Barat 17 Malang','087893211834','Honorer',75),('151111068','I Made Bisma Gargita','L','Jl. Candi III no. 291 Malang','082293841823','Honorer',80),('151111073','Roiyan Zadana Al Fauzy','L','Jl. Prambanan 17 Karanganyar','081233481192','Honorer',80),('151111081','Rafi Pratama Adji','L','Jl. Gambuta III-H11 Malang','081805116861','Tetap',100),('151111098','Windy','L','Jl. Candi III-309 Malang','081244735289','Honorer',75),('151111104','Mitsaq Enigma Al Afghan','L','Jl. Balearjosari 34 Malang','081252688668','Honorer',75),('151131002','Dyan Bentar Bhaswara Siwi','L','Villa Bukit Cemara Tidar C-17 Malang','085233819283','Honorer',85),('151131014','Fahmi Khudzaifi','L','Jl. Candi III-310 Malang','081217136965','Honorer',80),('161111025','Raham Sutan Iliyas','L','Jl. Raden Intan 17 Malang','081399482293','Honorer',90),('161111030','Bimo Prakoso','L','Jl. Tebo Utara 27 Malang','085764839228','Honorer',90),('161111033','Muhammad Irfan Faishol','L','Jl. Wukir 18 Batu','087849432281','Honorer',95),('161111044','Hizkia Luke Susanto','L','Jl. Cengkeh 38 Malang','089688472623','Honorer',95),('161111051','Agnes Nola Sekar Kinasih','P','Jl. Danau Maninjau Selatan B1-33 Malang','089577362281','Honorer',100),('161111070','Muhammad Bima Indra Kusuma','L','Jl. Kawista 10 Malang','081255486943','Honorer',95),('161111076','Fajar Abifian Al-Ghiffari','L','Jl. Raya Mondoroko 18 Singosari','081588372283','Honorer',95),('161221007','Akmad Sandi','L','Jl. Kebalen Wetan 20 Malang','08173842293','Honorer',90),('161221021','Galang Mahesta','L','Jl. Brigjend Katamso Gg. IV no. 212 Malang','081193485572','Honorer',90);
/*!40000 ALTER TABLE `asisten_dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_nilai`
--

DROP TABLE IF EXISTS `detail_nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_nilai` (
  `kode_kelas` varchar(20) NOT NULL,
  `avg_kelas` double NOT NULL,
  `jumlah_A` int(11) NOT NULL,
  `jumlah_B_plus` int(11) NOT NULL,
  `jumlah_B` int(11) NOT NULL,
  `jumlah_C_plus` int(11) NOT NULL,
  `jumlah_C` int(11) NOT NULL,
  `jumlah_D` int(11) NOT NULL,
  `jumlah_E` int(11) NOT NULL,
  KEY `fk_kode_kelas_1` (`kode_kelas`),
  CONSTRAINT `fk_kode_kelas_1` FOREIGN KEY (`kode_kelas`) REFERENCES `jadwal_kuliah` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_nilai`
--

LOCK TABLES `detail_nilai` WRITE;
/*!40000 ALTER TABLE `detail_nilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dosen` (
  `nip` varchar(10) NOT NULL,
  `nama_dosen` varchar(30) NOT NULL,
  `jk` char(1) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `email` varchar(25) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` VALUES ('141001','Bagus Kristomoyo Kristanto','L','Greenhills Residence Bukit Kamboja 2/15 Karangplos','08113581650','bagus.kristanto@stiki.ac.'),('141002','Chaulina Alfianti Oktavia','P','Jl. Lompobatang 15 Malang','081985902583','chaulina@stiki.ac.id'),('141003','Meivi Kartikasari','P','Jl. Terusan Mergan Lori 3 Malang','085755505996','meivi.k@stiki.ac.id'),('141004','Go Frendi Gunawan','L','Jl. Retawu 29 Malang','083877489393','frendi@stiki.ac.id'),('141007','Jozua F. Palandi','L','Jl. Abdul Gani Atas 18 Batu','085755789898','jozua@stiki.ac.id'),('141009','Koko Wahyu Prasetyo','L','Jl. Bendungan Riam Kanan 21 Malang','089764829384','koko@stiki.ac.id'),('141010','Anita','P','Jl. Arif Margono Gg. IV no. 20 Malang','088657498237','ant@stiki.ac.id'),('141011','Nicholaus Wayong Kebalen','L','Jl. Kebalen Wetan 22 Malang','081976384752','nicholaus@stiki.ac.id'),('141012','Sugeng Widodo','L','Perumahan University Permai C-17 Malang','0817948263','sugeng@stiki.ac.id'),('141013','Saiful Yahya','L','Jl. Tata Surya 24 Malang','087789942931','saiful@stiki.ac.id'),('141014','Subari','L','Jl. M.T. Haryono 123 Malang','085283498271','subari@stiki.ac.id'),('141015','Rakhmad Maulidi','L','Jl. Sulfat Agung 23 Malang','081984726463','maulidi@stiki.ac.id'),('141016','Febry Eka Purwiantono','L','Perum Permata Jingga J-21 Malang','089675849281','febry@stiki.ac.id'),('141017','Daniel Rudiaman Sijabat','L','Jl. Mayjend Wiyono 27 Malang','085263748172','daniel223@stiki.ac.id'),('141018','Addin Aditya','L','Bukit Dieng Permai D-2 Malang','081594839281','addin@stiki.ac.id');
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal_asisten`
--

DROP TABLE IF EXISTS `jadwal_asisten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal_asisten` (
  `kode_kelas` varchar(20) NOT NULL,
  `nrp_1` varchar(9) NOT NULL,
  `nrp_2` varchar(9) NOT NULL,
  KEY `fk_kelas` (`kode_kelas`),
  KEY `fk_nrp` (`nrp_1`),
  KEY `fk_nrp_2` (`nrp_2`),
  CONSTRAINT `fk_kelas` FOREIGN KEY (`kode_kelas`) REFERENCES `jadwal_kuliah` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_nrp` FOREIGN KEY (`nrp_1`) REFERENCES `asisten_dosen` (`nrp`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_nrp_2` FOREIGN KEY (`nrp_2`) REFERENCES `asisten_dosen` (`nrp`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_asisten`
--

LOCK TABLES `jadwal_asisten` WRITE;
/*!40000 ALTER TABLE `jadwal_asisten` DISABLE KEYS */;
INSERT INTO `jadwal_asisten` VALUES ('TI14KB34-C-2018','151111011','161111051');
/*!40000 ALTER TABLE `jadwal_asisten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal_kuliah`
--

DROP TABLE IF EXISTS `jadwal_kuliah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jadwal_kuliah` (
  `kode_kelas` varchar(20) NOT NULL,
  `kodemk` varchar(8) NOT NULL,
  `kelas` char(2) NOT NULL,
  `hari` int(11) NOT NULL,
  `nip` varchar(10) DEFAULT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `koderuang` varchar(10) DEFAULT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  PRIMARY KEY (`kode_kelas`) USING BTREE,
  KEY `FK_kodemk` (`kodemk`),
  KEY `FK_dosen` (`nip`),
  KEY `FK_ruang` (`koderuang`),
  CONSTRAINT `jadwal_kuliah_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `dosen` (`nip`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `jadwal_kuliah_ibfk_2` FOREIGN KEY (`kodemk`) REFERENCES `matakuliah` (`kodemk`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jadwal_kuliah_ibfk_3` FOREIGN KEY (`koderuang`) REFERENCES `ruang` (`koderuang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_kuliah`
--

LOCK TABLES `jadwal_kuliah` WRITE;
/*!40000 ALTER TABLE `jadwal_kuliah` DISABLE KEYS */;
INSERT INTO `jadwal_kuliah` VALUES ('MI14KB33-A-2018','MI14KB33','A',4,'141002','09:40:00','12:10:00','LAB E','2018/2019',16),('MI14KB35-A-2018','MI14KB35','A',5,'141017','08:00:00','10:30:00','NTW','2018/2019',16),('MI14KB36-A-2018','MI14KB36','A',3,'141002','15:30:00','18:00:00','LAB E','2018/2019',16),('SI15KB32-A-2018','SI15KB32','A',3,'141016','15:30:00','18:00:00','LAB B','2018/2019',19),('SI15KB34-A-2018','SI15KB34','A',5,'141002','08:00:00','10:30:00','LAB E','2018/2019',18),('SI15KB35-A-2018','SI15KB35','A',2,'141002','08:00:00','10:30:00','LAB E','2018/2019',19),('SI15KB54-A-2018','SI15KB54','A',4,'141012','07:00:00','09:40:00','LAB E','2018/2019',19),('TI14KB32-A-2018','TI14KB32','A',2,'141016','07:00:00','09:40:00','LAB C','2018/2019',24),('TI14KB32-B-2018','TI14KB32','B',4,'141016','07:00:00','09:40:00','LAB C','2018/2019',24),('TI14KB32-C-2018','TI14KB32','C',2,'141016','15:30:00','18:00:00','LAB B','2018/2019',12),('TI14KB32-D-2018','TI14KB32','D',5,'141016','08:00:00','10:30:00','LAB C','2018/2019',20),('TI14KB32-E-2018','TI14KB32','E',1,'141016','07:00:00','09:40:00','LAB C','2018/2019',25),('TI14KB33-A-2018','TI14KB33','A',1,'141018','15:30:00','18:00:00','B.2.4','2018/2019',25),('TI14KB33-B-2018','TI14KB33','B',2,'141004','08:00:00','10:30:00','B.2.3','2018/2019',26),('TI14KB33-C-2018','TI14KB33','C',4,'141004','15:30:00','18:00:00','B.2.2','2018/2019',26),('TI14KB33-D-2018','TI14KB33','D',2,'141018','10:30:00','13:00:00','LAB E','2018/2019',27),('TI14KB33-E-2018','TI14KB33','E',3,'141018','08:00:00','10:30:00','LAB E','2018/2019',27),('TI14KB34-A-2018','TI14KB34','A',4,'141002','07:00:00','09:40:00','B.2.3','2018/2019',25),('TI14KB34-B-2018','TI14KB34','B',3,'141002','13:00:00','15:30:00','LAB E','2018/2019',24),('TI14KB34-C-2018','TI14KB34','C',1,'141002','15:30:00','18:00:00','LAB E','2018/2019',23),('TI14KB34-D-2018','TI14KB34','D',1,'141002','07:00:00','09:40:00','B.2.3','2018/2019',25),('TI14KB34-E-2018','TI14KB34','E',2,'141002','15:30:00','18:00:00','LAB E','2018/2019',24),('TI14KB51-A-2018','TI14KB51','A',4,'141014','15:30:00','18:00:00','LAB B','2018/2019',25),('TI14KB51-B-2018','TI14KB51','B',3,'141014','13:00:00','15:30:00','LAB B','2018/2019',25),('TI14KB51-C-2018','TI14KB51','C',3,'141014','08:00:00','10:30:00','LAB F','2018/2019',25),('TI14KB51-D-2018','TI14KB51','D',4,'141002','13:00:00','15:30:00','LAB B','2018/2019',25),('TI14KB71-A-2018','TI14KB71','A',3,'141013','13:00:00','15:30:00','LAB F','2018/2019',25);
/*!40000 ALTER TABLE `jadwal_kuliah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matakuliah`
--

DROP TABLE IF EXISTS `matakuliah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matakuliah` (
  `kodemk` varchar(8) NOT NULL,
  `namamk` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tipe` tinyint(4) NOT NULL,
  PRIMARY KEY (`kodemk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matakuliah`
--

LOCK TABLES `matakuliah` WRITE;
/*!40000 ALTER TABLE `matakuliah` DISABLE KEYS */;
INSERT INTO `matakuliah` VALUES ('DK14KB44','Desain Komunikasi Visual 3',6,'Genap',1),('DK14KK41','Video Editing',3,'Genap',1),('DK14KK42','Multimedia 1',3,'Genap',1),('MI14KB22','Pemrograman Dasar 1',3,'Genap',1),('MI14KB23','Praktikum Basis Data',1,'Genap',2),('MI14KB24','Praktikum Pemrograman Dasar 1',1,'Genap',2),('MI14KB33','Pemrograman Dasar 2',3,'Ganjil',1),('MI14KB35','Praktikum Jaringan Komputer dan Komunikasi Data',1,'Ganjil',2),('MI14KB36','Praktikum Pemrograman Dasar 2',1,'Ganjil',2),('MI14KB46','Praktek APSI',1,'Genap',2),('SI15KB21','Pemrograman Dasar 1',3,'Genap',1),('SI15KB22','Praktikum Pemrograman Dasar 1',1,'Genap',2),('SI15KB32','Praktikum Sistem Operasi',1,'Ganjil',2),('SI15KB34','Pemrograman Dasar 2',3,'Ganjil',1),('SI15KB35','Praktikum Pemrograman Dasar 2',1,'Ganjil',2),('SI15KB44','Praktikum Jaringan Komputer dan Komunikasi Data',1,'Genap',2),('SI15KB46','Praktikum Pemrograman Web',1,'Genap',2),('SI15KB54','Praktikum Pemrograman Web Lanjut',1,'Ganjil',2),('SI15KK23','Praktikum Basis Data',1,'Genap',2),('TI14KB22','Praktikum Basis Data',1,'Genap',2),('TI14KB23','Pemrograman Dasar 1',3,'Genap',1),('TI14KB24','Praktikum Pemrograman Dasar 1',1,'Genap',2),('TI14KB32','Praktikum Sistem Operasi',1,'Ganjil',2),('TI14KB33','Pemrograman Dasar 2',3,'Ganjil',1),('TI14KB34','Praktikum Pemrograman Dasar 2',1,'Ganjil',2),('TI14KB41','Pemrograman Berorientasi Objek',3,'Genap',1),('TI14KB47','Praktikum Jaringan Komputer dan Komunikasi Data',1,'Genap',2),('TI14KB51','Pemrograman Perangkat Bergerak',3,'Ganjil',1),('TI14KB53','Pemrograman Web Lanjut',3,'Ganjil',1),('TI14KB68','Praktikum Pemrograman Grafis',1,'Genap',2),('TI14KB71','Animasi 3D',3,'Ganjil',1),('TI14KK73','Embedded Programming',3,'Ganjil',1);
/*!40000 ALTER TABLE `matakuliah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruang`
--

DROP TABLE IF EXISTS `ruang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruang` (
  `koderuang` varchar(10) NOT NULL,
  `nama_ruang` varchar(35) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  PRIMARY KEY (`koderuang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruang`
--

LOCK TABLES `ruang` WRITE;
/*!40000 ALTER TABLE `ruang` DISABLE KEYS */;
INSERT INTO `ruang` VALUES ('B.2.2','Ruang B.2.2',28),('B.2.3','Ruang B.2.3',28),('B.2.4','Ruang B.2.4',28),('LAB B','Information System Laboratory',28),('LAB C','Applied System Laboratory',28),('LAB E','UNIX Laboratory',28),('LAB F','Multimedia Laboratory',28),('NTW','Computer Network Laboratory',20);
/*!40000 ALTER TABLE `ruang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `view_jadwal_asisten`
--

DROP TABLE IF EXISTS `view_jadwal_asisten`;
/*!50001 DROP VIEW IF EXISTS `view_jadwal_asisten`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_jadwal_asisten` (
  `kode_kelas` tinyint NOT NULL,
  `kodemk` tinyint NOT NULL,
  `namamk` tinyint NOT NULL,
  `kelas` tinyint NOT NULL,
  `nama_dosen` tinyint NOT NULL,
  `hari` tinyint NOT NULL,
  `jam_mulai` tinyint NOT NULL,
  `jam_selesai` tinyint NOT NULL,
  `koderuang` tinyint NOT NULL,
  `tahun_ajaran` tinyint NOT NULL,
  `semester` tinyint NOT NULL,
  `asisten_1` tinyint NOT NULL,
  `asisten_2` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_jadwal_kuliah`
--

DROP TABLE IF EXISTS `view_jadwal_kuliah`;
/*!50001 DROP VIEW IF EXISTS `view_jadwal_kuliah`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_jadwal_kuliah` (
  `kode_kelas` tinyint NOT NULL,
  `kodemk` tinyint NOT NULL,
  `namamk` tinyint NOT NULL,
  `kelas` tinyint NOT NULL,
  `nama_dosen` tinyint NOT NULL,
  `hari` tinyint NOT NULL,
  `jam_mulai` tinyint NOT NULL,
  `jam_selesai` tinyint NOT NULL,
  `koderuang` tinyint NOT NULL,
  `tahun_ajaran` tinyint NOT NULL,
  `jumlah_peserta` tinyint NOT NULL,
  `semester` tinyint NOT NULL,
  `tipe` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_jadwal_tanpa_asisten`
--

DROP TABLE IF EXISTS `view_jadwal_tanpa_asisten`;
/*!50001 DROP VIEW IF EXISTS `view_jadwal_tanpa_asisten`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_jadwal_tanpa_asisten` (
  `kode_kelas` tinyint NOT NULL,
  `kodemk` tinyint NOT NULL,
  `namamk` tinyint NOT NULL,
  `kelas` tinyint NOT NULL,
  `tahun_ajaran` tinyint NOT NULL,
  `semester` tinyint NOT NULL,
  `tipe` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_jadwal_asisten`
--

/*!50001 DROP TABLE IF EXISTS `view_jadwal_asisten`*/;
/*!50001 DROP VIEW IF EXISTS `view_jadwal_asisten`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_jadwal_asisten` AS select `v`.`kode_kelas` AS `kode_kelas`,`v`.`kodemk` AS `kodemk`,`v`.`namamk` AS `namamk`,`v`.`kelas` AS `kelas`,`v`.`nama_dosen` AS `nama_dosen`,`v`.`hari` AS `hari`,`v`.`jam_mulai` AS `jam_mulai`,`v`.`jam_selesai` AS `jam_selesai`,`v`.`koderuang` AS `koderuang`,`v`.`tahun_ajaran` AS `tahun_ajaran`,`v`.`semester` AS `semester`,`a1`.`nama` AS `asisten_1`,`a2`.`nama` AS `asisten_2` from (((`view_jadwal_kuliah` `v` join `jadwal_asisten` `ja` on((`ja`.`kode_kelas` = `v`.`kode_kelas`))) join `asisten_dosen` `a1` on((`ja`.`nrp_1` = `a1`.`nrp`))) join `asisten_dosen` `a2` on((`ja`.`nrp_2` = `a2`.`nrp`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_jadwal_kuliah`
--

/*!50001 DROP TABLE IF EXISTS `view_jadwal_kuliah`*/;
/*!50001 DROP VIEW IF EXISTS `view_jadwal_kuliah`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_jadwal_kuliah` AS select `jk`.`kode_kelas` AS `kode_kelas`,`jk`.`kodemk` AS `kodemk`,`mk`.`namamk` AS `namamk`,`jk`.`kelas` AS `kelas`,`d`.`nama_dosen` AS `nama_dosen`,`jk`.`hari` AS `hari`,`jk`.`jam_mulai` AS `jam_mulai`,`jk`.`jam_selesai` AS `jam_selesai`,`jk`.`koderuang` AS `koderuang`,`jk`.`tahun_ajaran` AS `tahun_ajaran`,`jk`.`jumlah_peserta` AS `jumlah_peserta`,`mk`.`semester` AS `semester`,`mk`.`tipe` AS `tipe` from ((`jadwal_kuliah` `jk` join `matakuliah` `mk` on((`jk`.`kodemk` = `mk`.`kodemk`))) join `dosen` `d` on((`jk`.`nip` = `d`.`nip`))) order by `jk`.`hari`,`jk`.`jam_mulai` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_jadwal_tanpa_asisten`
--

/*!50001 DROP TABLE IF EXISTS `view_jadwal_tanpa_asisten`*/;
/*!50001 DROP VIEW IF EXISTS `view_jadwal_tanpa_asisten`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_jadwal_tanpa_asisten` AS select `jk`.`kode_kelas` AS `kode_kelas`,`jk`.`kodemk` AS `kodemk`,`jk`.`namamk` AS `namamk`,`jk`.`kelas` AS `kelas`,`jk`.`tahun_ajaran` AS `tahun_ajaran`,`jk`.`semester` AS `semester`,`jk`.`tipe` AS `tipe` from (`view_jadwal_kuliah` `jk` left join `jadwal_asisten` `ja` on((`ja`.`kode_kelas` = `jk`.`kode_kelas`))) where (isnull(`ja`.`nrp_1`) and isnull(`ja`.`nrp_2`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-26 11:50:53
