-- Adminer 4.7.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP VIEW IF EXISTS `data_gap`;
CREATE TABLE `data_gap` (`domain_nama` varchar(100), `domain_keterangan` varchar(255), `indeks_id` int(11), `domain_id` int(11), `pernyataan_total` int(11), `responden_total` int(11), `nilai_total` int(11), `indeks_maturity` float, `keterangan` varchar(50), `harapan` int(11), `gap` float, `gap_id` int(11));


DROP VIEW IF EXISTS `data_indeks_maturity`;
CREATE TABLE `data_indeks_maturity` (`domain_nama` varchar(100), `domain_keterangan` varchar(255), `indeks_id` int(11), `domain_id` int(11), `pernyataan_total` int(11), `responden_total` int(11), `nilai_total` int(11), `indeks_maturity` float, `keterangan` varchar(50));


DROP VIEW IF EXISTS `data_kuisioner`;
CREATE TABLE `data_kuisioner` (`kuisioner_kode` varchar(10), `kuisioner_id` int(11), `kuisioner_tgl` date, `responden_id` int(11), `responden_no` varchar(100), `responden_usia` enum('17 - 25 Tahun','26 - 45 Tahun','> 46 Tahun'), `responden_jk` enum('Pria','Wanita'), `responden_pendidikan` enum('SMA','D3','S1','S2'), `responden_masa_kerja` enum('0 - 5 Tahun','6 - 10 Tahun','> 10 Tahun'), `responden_status_sosial` enum('Menikah','Belum Menikah'), `kuisioner_skor` decimal(27,0), `kuisioner_total_pernyataan` bigint(21), `kuisioner_total_responden` bigint(21));


DROP VIEW IF EXISTS `data_pernyataan`;
CREATE TABLE `data_pernyataan` (`pernyataan_id` int(11), `pernyataan` text, `domain_id` int(11), `domain_nama` varchar(100), `domain_keterangan` varchar(255));


DROP TABLE IF EXISTS `tbl_domain`;
CREATE TABLE `tbl_domain` (
  `domain_id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_nama` varchar(100) NOT NULL,
  `domain_keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`domain_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_domain` (`domain_id`, `domain_nama`, `domain_keterangan`) VALUES
(38,	'ME 1',	'Monitor and Evaluate IT Performance'),
(39,	'ME 2',	' Monitor and Evaluate Internal Control'),
(40,	'ME 3',	'Ensure Regulatory Compliance With External Requirements'),
(41,	'ME 4',	'Provide IT Government');

DROP TABLE IF EXISTS `tbl_gap`;
CREATE TABLE `tbl_gap` (
  `gap_id` int(11) NOT NULL AUTO_INCREMENT,
  `indeks_id` int(11) NOT NULL,
  `harapan` int(11) NOT NULL DEFAULT 5,
  `gap` float NOT NULL,
  PRIMARY KEY (`gap_id`),
  UNIQUE KEY `indeks_id` (`indeks_id`),
  CONSTRAINT `tbl_gap_ibfk_1` FOREIGN KEY (`indeks_id`) REFERENCES `tbl_indeks_maturity` (`indeks_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_gap` (`gap_id`, `indeks_id`, `harapan`, `gap`) VALUES
(1,	2,	5,	1.85714);

DROP TABLE IF EXISTS `tbl_indeks_maturity`;
CREATE TABLE `tbl_indeks_maturity` (
  `indeks_id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_id` int(11) NOT NULL,
  `pernyataan_total` int(11) NOT NULL,
  `responden_total` int(11) NOT NULL,
  `nilai_total` int(11) NOT NULL,
  `indeks_maturity` float NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`indeks_id`),
  UNIQUE KEY `domain_id` (`domain_id`),
  CONSTRAINT `tbl_indeks_maturity_ibfk_1` FOREIGN KEY (`domain_id`) REFERENCES `tbl_domain` (`domain_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_indeks_maturity` (`indeks_id`, `domain_id`, `pernyataan_total`, `responden_total`, `nilai_total`, `indeks_maturity`, `keterangan`) VALUES
(2,	38,	7,	7,	154,	3.14286,	'Ditetapkan'),
(3,	39,	8,	7,	168,	3,	'Ditetapkan');

DROP TABLE IF EXISTS `tbl_jawaban_kuisioner`;
CREATE TABLE `tbl_jawaban_kuisioner` (
  `jawaban_id` int(11) NOT NULL AUTO_INCREMENT,
  `kuisioner_id` int(11) NOT NULL,
  `skor` smallint(6) NOT NULL,
  `pernyataan_id` int(11) NOT NULL,
  PRIMARY KEY (`jawaban_id`),
  KEY `kuisioner_id` (`kuisioner_id`),
  KEY `pernyataan_id` (`pernyataan_id`),
  CONSTRAINT `tbl_jawaban_kuisioner_ibfk_1` FOREIGN KEY (`kuisioner_id`) REFERENCES `tbl_kuisioner` (`kuisioner_id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_jawaban_kuisioner_ibfk_2` FOREIGN KEY (`pernyataan_id`) REFERENCES `tbl_pernyataan` (`pernyataan_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_jawaban_kuisioner` (`jawaban_id`, `kuisioner_id`, `skor`, `pernyataan_id`) VALUES
(27,	2,	3,	2),
(28,	2,	5,	3),
(29,	2,	1,	4),
(30,	2,	4,	5),
(31,	2,	4,	6),
(32,	2,	4,	7),
(33,	2,	3,	8),
(34,	2,	5,	9),
(35,	2,	5,	10),
(36,	2,	1,	11),
(37,	2,	3,	12),
(38,	2,	5,	13),
(39,	2,	1,	14),
(40,	2,	2,	15),
(41,	2,	5,	16),
(42,	2,	2,	17),
(43,	2,	1,	18),
(44,	2,	3,	19),
(45,	2,	2,	20),
(46,	2,	5,	21),
(47,	2,	4,	22),
(48,	2,	5,	23),
(49,	2,	4,	24),
(50,	2,	3,	25),
(51,	2,	2,	26),
(52,	2,	2,	27),
(53,	3,	4,	2),
(54,	3,	3,	3),
(55,	3,	3,	4),
(56,	3,	1,	5),
(57,	3,	2,	6),
(58,	3,	4,	7),
(59,	3,	4,	8),
(60,	3,	4,	9),
(61,	3,	1,	10),
(62,	3,	2,	11),
(63,	3,	5,	12),
(64,	3,	3,	13),
(65,	3,	3,	14),
(66,	3,	1,	15),
(67,	3,	3,	16),
(68,	3,	1,	17),
(69,	3,	3,	18),
(70,	3,	4,	19),
(71,	3,	3,	20),
(72,	3,	4,	21),
(73,	3,	2,	22),
(74,	3,	1,	23),
(75,	3,	2,	24),
(76,	3,	5,	25),
(77,	3,	5,	26),
(78,	3,	1,	27),
(79,	4,	3,	2),
(80,	4,	4,	3),
(81,	4,	4,	4),
(82,	4,	5,	5),
(83,	4,	2,	6),
(84,	4,	4,	7),
(85,	4,	2,	8),
(86,	4,	5,	9),
(87,	4,	4,	10),
(88,	4,	2,	11),
(89,	4,	2,	12),
(90,	4,	4,	13),
(91,	4,	2,	14),
(92,	4,	4,	15),
(93,	4,	3,	16),
(94,	4,	5,	17),
(95,	4,	5,	18),
(96,	4,	1,	19),
(97,	4,	2,	20),
(98,	4,	3,	21),
(99,	4,	5,	22),
(100,	4,	3,	23),
(101,	4,	1,	24),
(102,	4,	1,	25),
(103,	4,	1,	26),
(104,	4,	4,	27),
(105,	5,	3,	2),
(106,	5,	1,	3),
(107,	5,	2,	4),
(108,	5,	5,	5),
(109,	5,	1,	6),
(110,	5,	5,	7),
(111,	5,	4,	8),
(112,	5,	3,	9),
(113,	5,	3,	10),
(114,	5,	4,	11),
(115,	5,	5,	12),
(116,	5,	5,	13),
(117,	5,	5,	14),
(118,	5,	4,	15),
(119,	5,	2,	16),
(120,	5,	1,	17),
(121,	5,	1,	18),
(122,	5,	2,	19),
(123,	5,	5,	20),
(124,	5,	2,	21),
(125,	5,	3,	22),
(126,	5,	4,	23),
(127,	5,	5,	24),
(128,	5,	5,	25),
(129,	5,	4,	26),
(130,	5,	2,	27),
(131,	6,	1,	2),
(132,	6,	1,	3),
(133,	6,	1,	4),
(134,	6,	2,	5),
(135,	6,	2,	6),
(136,	6,	4,	7),
(137,	6,	4,	8),
(138,	6,	1,	9),
(139,	6,	2,	10),
(140,	6,	3,	11),
(141,	6,	3,	12),
(142,	6,	3,	13),
(143,	6,	1,	14),
(144,	6,	1,	15),
(145,	6,	5,	16),
(146,	6,	5,	17),
(147,	6,	2,	18),
(148,	6,	4,	19),
(149,	6,	1,	20),
(150,	6,	2,	21),
(151,	6,	1,	22),
(152,	6,	4,	23),
(153,	6,	1,	24),
(154,	6,	5,	25),
(155,	6,	1,	26),
(156,	6,	1,	27),
(157,	7,	5,	2),
(158,	7,	2,	3),
(159,	7,	3,	4),
(160,	7,	3,	5),
(161,	7,	1,	6),
(162,	7,	5,	7),
(163,	7,	5,	8),
(164,	7,	4,	9),
(165,	7,	4,	10),
(166,	7,	1,	11),
(167,	7,	5,	12),
(168,	7,	3,	13),
(169,	7,	2,	14),
(170,	7,	5,	15),
(171,	7,	1,	16),
(172,	7,	1,	17),
(173,	7,	4,	18),
(174,	7,	1,	19),
(175,	7,	2,	20),
(176,	7,	3,	21),
(177,	7,	5,	22),
(178,	7,	1,	23),
(179,	7,	3,	24),
(180,	7,	5,	25),
(181,	7,	2,	26),
(182,	7,	4,	27),
(183,	8,	5,	2),
(184,	8,	5,	3),
(185,	8,	5,	4),
(186,	8,	2,	5),
(187,	8,	1,	6),
(188,	8,	5,	7),
(189,	8,	2,	8),
(190,	8,	3,	9),
(191,	8,	1,	10),
(192,	8,	2,	11),
(193,	8,	1,	12),
(194,	8,	2,	13),
(195,	8,	3,	14),
(196,	8,	3,	15),
(197,	8,	3,	16),
(198,	8,	4,	17),
(199,	8,	4,	18),
(200,	8,	5,	19),
(201,	8,	3,	20),
(202,	8,	2,	21),
(203,	8,	5,	22),
(204,	8,	1,	23),
(205,	8,	1,	24),
(206,	8,	3,	25),
(207,	8,	2,	26),
(208,	8,	1,	27);

DROP TABLE IF EXISTS `tbl_kuisioner`;
CREATE TABLE `tbl_kuisioner` (
  `kuisioner_id` int(11) NOT NULL AUTO_INCREMENT,
  `kuisioner_tgl` date NOT NULL,
  `kuisioner_kode` varchar(10) DEFAULT NULL,
  `responden_id` int(11) NOT NULL,
  PRIMARY KEY (`kuisioner_id`),
  KEY `responden_id` (`responden_id`),
  CONSTRAINT `tbl_kuisioner_ibfk_1` FOREIGN KEY (`responden_id`) REFERENCES `tbl_responden` (`responden_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_kuisioner` (`kuisioner_id`, `kuisioner_tgl`, `kuisioner_kode`, `responden_id`) VALUES
(2,	'2019-12-11',	'K0001',	4),
(3,	'2019-12-11',	'K0001',	5),
(4,	'2019-12-11',	'K0001',	6),
(5,	'2019-12-11',	'K0001',	7),
(6,	'2019-12-11',	'K0001',	8),
(7,	'2019-12-11',	'K0001',	9),
(8,	'2019-12-11',	'K0001',	10);

DROP TABLE IF EXISTS `tbl_pernyataan`;
CREATE TABLE `tbl_pernyataan` (
  `pernyataan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pernyataan` text NOT NULL,
  `domain_id` int(11) NOT NULL,
  PRIMARY KEY (`pernyataan_id`),
  KEY `domain_id` (`domain_id`),
  CONSTRAINT `tbl_pernyataan_ibfk_1` FOREIGN KEY (`domain_id`) REFERENCES `tbl_domain` (`domain_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_pernyataan` (`pernyataan_id`, `pernyataan`, `domain_id`) VALUES
(2,	'Rail Document System (RDS) yang ada saat ini telah berjalan sesuai dengan kebutuhan perusahaan',	38),
(3,	'Rail Document System (RDS) yang ada saat ini telah memiliki kinerja serta kualitas yang baik.',	38),
(4,	'Rail Document System (RDS) yang ada saat ini telah mampu mengatasi masalah dan kendala dalam proses surat menyurat yang ada pada perusahaan',	38),
(5,	'Monitoring terhadap Rail Document System (RDS) telah dilakukan secara berkala.',	38),
(6,	'Rail Document System (RDS) yang ada saat ini menghasilkan data secara tepat dan akurat.',	38),
(7,	'Rail Document System (RDS) yang ada saat ini telah menghasilkan laporan yang akurat sesuai dengan kebutuhan perusahaan.',	38),
(8,	'Kualitas yang dihasilkan oleh Rail Document System (RDS) lebih baik dan telah memenuhi standar yang diharapkan perusahaan.',	38),
(9,	'Adanya pengawasan dan evaluasi terhadap kualitas Rail Document System (RDS)',	39),
(10,	'Perusahaan memberikan edukasi dan pelatihan kepada karyawan terhadap Rail Document System (RDS).',	39),
(11,	'Perusahaan melakukan tindakan korektif dalam pengendalian internal IT pada Rail Document System (RDS).',	39),
(12,	'Adanya standar untuk mengukur kualitas Rail Document System (RDS) dengan baik dan tepat.',	39),
(13,	'Adanya penetapan tingkat toleransi untuk proses pengendalian IT terhadap surat menyurat saat ini.',	39),
(14,	'Adanya pengendalian yang dilakukan oleh perusahaan bila Rail Document System (RDS) mengalami kerusakan atau masalah.',	39),
(15,	'Adanya pengawasan dan evaluasi kualitas terhadap user.',	39),
(16,	'Rail Document System (RDS) melakukan koreksi apabila terjadi ketidakakuratan pada data.',	39),
(17,	'Adanya kepatuhan perusahaan terkait tata tertib dan aturan perusahaan dalam menjalankan tugasnya.',	40),
(18,	'Perusahaan memberikan pelatihan kepada karyawan terkait dengan tata tertib dan peraturan yang telah disepakati.',	40),
(19,	'Perusahaan melakukan pengevaluasian dan penyesuaian prosedur serta metodologi IT untuk memastikan bahwa peraturan terkait surat menyurat telah diatasi dan dikomunikasikan dengan baik.',	40),
(20,	'Perusahaan melakukan evaluasi kelengkapan dan efektivitas pengendalian manajemen atas proses surat menyurat yang ada saat ini.',	40),
(21,	'Perusahaan melakukan pengembangan terhadap kebijakan, perencanaan dan prosedur yang telah ditetapkan.',	40),
(22,	'Perusahaan melakukan penilaian terhadap kerangka kerja tata kelola IT yang ada saat ini.',	41),
(23,	'Perusahaan melakukan pengelolaan resiko yang mungkin terjadi pada IT.',	41),
(24,	'Permasalahan yang ada terkait IT pada perusahaan dapat diperbaiki dan diatasi.',	41),
(25,	'Adanya pihak manajemen yang bertanggung jawab terhadap proses pengelolaan pada IT yang ditetapkan.',	41),
(26,	'Adanya framework yang diterapkan pada IT dengan pengaturan perusahaan secara menyeluruh.',	41),
(27,	'Adanya dewan atau komite dalam penyusunan strategi IT pada Rail Document System (RDS)',	41);

DROP TABLE IF EXISTS `tbl_responden`;
CREATE TABLE `tbl_responden` (
  `responden_id` int(11) NOT NULL AUTO_INCREMENT,
  `responden_no` varchar(100) NOT NULL,
  `responden_usia` enum('17 - 25 Tahun','26 - 45 Tahun','> 46 Tahun') NOT NULL,
  `responden_jk` enum('Pria','Wanita') NOT NULL,
  `responden_pendidikan` enum('SMA','D3','S1','S2') NOT NULL,
  `responden_masa_kerja` enum('0 - 5 Tahun','6 - 10 Tahun','> 10 Tahun') NOT NULL,
  `responden_status_sosial` enum('Menikah','Belum Menikah') NOT NULL,
  PRIMARY KEY (`responden_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_responden` (`responden_id`, `responden_no`, `responden_usia`, `responden_jk`, `responden_pendidikan`, `responden_masa_kerja`, `responden_status_sosial`) VALUES
(2,	'Dolore vitae rem pos',	'26 - 45 Tahun',	'Wanita',	'D3',	'> 10 Tahun',	'Menikah'),
(3,	'Dolore vitae rem pos',	'26 - 45 Tahun',	'Wanita',	'D3',	'> 10 Tahun',	'Menikah'),
(4,	'Atque eligendi in qu',	'26 - 45 Tahun',	'Wanita',	'SMA',	'6 - 10 Tahun',	'Menikah'),
(5,	'Dignissimos qui faci',	'26 - 45 Tahun',	'Pria',	'S2',	'0 - 5 Tahun',	'Menikah'),
(6,	'Quod debitis sint al',	'> 46 Tahun',	'Wanita',	'SMA',	'0 - 5 Tahun',	'Menikah'),
(7,	'Autem lorem ex volup',	'26 - 45 Tahun',	'Pria',	'S2',	'> 10 Tahun',	'Belum Menikah'),
(8,	'Culpa aspernatur hic',	'> 46 Tahun',	'Wanita',	'S1',	'> 10 Tahun',	'Belum Menikah'),
(9,	'Atque illo nisi pari',	'26 - 45 Tahun',	'Wanita',	'D3',	'> 10 Tahun',	'Belum Menikah'),
(10,	'Temporibus in nihil ',	'17 - 25 Tahun',	'Wanita',	'S2',	'6 - 10 Tahun',	'Menikah');

DROP TABLE IF EXISTS `data_gap`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `data_gap` AS select `tbl_domain`.`domain_nama` AS `domain_nama`,`tbl_domain`.`domain_keterangan` AS `domain_keterangan`,`tbl_indeks_maturity`.`indeks_id` AS `indeks_id`,`tbl_indeks_maturity`.`domain_id` AS `domain_id`,`tbl_indeks_maturity`.`pernyataan_total` AS `pernyataan_total`,`tbl_indeks_maturity`.`responden_total` AS `responden_total`,`tbl_indeks_maturity`.`nilai_total` AS `nilai_total`,`tbl_indeks_maturity`.`indeks_maturity` AS `indeks_maturity`,`tbl_indeks_maturity`.`keterangan` AS `keterangan`,`tbl_gap`.`harapan` AS `harapan`,`tbl_gap`.`gap` AS `gap`,`tbl_gap`.`gap_id` AS `gap_id` from ((`tbl_indeks_maturity` join `tbl_domain` on(`tbl_indeks_maturity`.`domain_id` = `tbl_domain`.`domain_id`)) join `tbl_gap` on(`tbl_gap`.`indeks_id` = `tbl_indeks_maturity`.`indeks_id`));

DROP TABLE IF EXISTS `data_indeks_maturity`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `data_indeks_maturity` AS select `tbl_domain`.`domain_nama` AS `domain_nama`,`tbl_domain`.`domain_keterangan` AS `domain_keterangan`,`tbl_indeks_maturity`.`indeks_id` AS `indeks_id`,`tbl_indeks_maturity`.`domain_id` AS `domain_id`,`tbl_indeks_maturity`.`pernyataan_total` AS `pernyataan_total`,`tbl_indeks_maturity`.`responden_total` AS `responden_total`,`tbl_indeks_maturity`.`nilai_total` AS `nilai_total`,`tbl_indeks_maturity`.`indeks_maturity` AS `indeks_maturity`,`tbl_indeks_maturity`.`keterangan` AS `keterangan` from (`tbl_indeks_maturity` join `tbl_domain` on(`tbl_indeks_maturity`.`domain_id` = `tbl_domain`.`domain_id`));

DROP TABLE IF EXISTS `data_kuisioner`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `data_kuisioner` AS select `tbl_kuisioner`.`kuisioner_kode` AS `kuisioner_kode`,`tbl_kuisioner`.`kuisioner_id` AS `kuisioner_id`,`tbl_kuisioner`.`kuisioner_tgl` AS `kuisioner_tgl`,`tbl_kuisioner`.`responden_id` AS `responden_id`,`tbl_responden`.`responden_no` AS `responden_no`,`tbl_responden`.`responden_usia` AS `responden_usia`,`tbl_responden`.`responden_jk` AS `responden_jk`,`tbl_responden`.`responden_pendidikan` AS `responden_pendidikan`,`tbl_responden`.`responden_masa_kerja` AS `responden_masa_kerja`,`tbl_responden`.`responden_status_sosial` AS `responden_status_sosial`,sum(`tbl_jawaban_kuisioner`.`skor`) AS `kuisioner_skor`,count(`tbl_jawaban_kuisioner`.`pernyataan_id`) AS `kuisioner_total_pernyataan`,(select count(`kuisioner`.`responden_id`) from `tbl_kuisioner` `kuisioner` where `kuisioner`.`kuisioner_kode` = `tbl_kuisioner`.`kuisioner_kode` group by `kuisioner`.`kuisioner_kode`) AS `kuisioner_total_responden` from ((`tbl_kuisioner` join `tbl_jawaban_kuisioner` on(`tbl_jawaban_kuisioner`.`kuisioner_id` = `tbl_kuisioner`.`kuisioner_id`)) join `tbl_responden` on(`tbl_responden`.`responden_id` = `tbl_kuisioner`.`responden_id`)) group by `tbl_jawaban_kuisioner`.`kuisioner_id`;

DROP TABLE IF EXISTS `data_pernyataan`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `data_pernyataan` AS select `tbl_pernyataan`.`pernyataan_id` AS `pernyataan_id`,`tbl_pernyataan`.`pernyataan` AS `pernyataan`,`tbl_pernyataan`.`domain_id` AS `domain_id`,`tbl_domain`.`domain_nama` AS `domain_nama`,`tbl_domain`.`domain_keterangan` AS `domain_keterangan` from (`tbl_pernyataan` join `tbl_domain` on(`tbl_pernyataan`.`domain_id` = `tbl_domain`.`domain_id`));

-- 2019-12-14 14:55:36
