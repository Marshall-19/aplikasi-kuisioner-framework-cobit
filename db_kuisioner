-- Adminer 4.7.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP VIEW IF EXISTS `data_kuisioner`;
CREATE TABLE `data_kuisioner` (`kuisioner_id` int(11), `responden_id` int(11), `pertanyaan_id` int(11), `skor` tinyint(4), `pertanyaan` text, `kategori_id` int(11), `kategori_nama` varchar(100), `kategori_keterangan` int(255), `responden_nama` varchar(100), `responden_usia` enum('17 - 25 Tahun','26 - 45 Tahun','> 46 Tahun'), `responden_jk` enum('Pria','Wanita'), `responden_pendidikan` enum('SMA','D3','S1','S2'), `responden_masa_kerja` enum('0 - 5 Tahun','6 - 10 Tahun','> 10 Tahun'), `responden_status_sosial` enum('Menikah','Belum Menikah'));


DROP VIEW IF EXISTS `data_pertanyaan`;
CREATE TABLE `data_pertanyaan` (`pertanyaan_id` int(11), `pertanyaan` text, `kategori_id` int(11), `kategori_nama` varchar(100), `kategori_keterangan` int(255));


DROP TABLE IF EXISTS `tbl_kategori_pertanyaan`;
CREATE TABLE `tbl_kategori_pertanyaan` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(100) NOT NULL,
  `kategori_keterangan` int(255) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_kuisioner`;
CREATE TABLE `tbl_kuisioner` (
  `kuisioner_id` int(11) NOT NULL AUTO_INCREMENT,
  `responden_id` int(11) NOT NULL,
  `pertanyaan_id` int(11) NOT NULL,
  `skor` tinyint(4) NOT NULL,
  PRIMARY KEY (`kuisioner_id`),
  KEY `responden_id` (`responden_id`),
  KEY `pertanyaan_id` (`pertanyaan_id`),
  CONSTRAINT `tbl_kuisioner_ibfk_1` FOREIGN KEY (`responden_id`) REFERENCES `tbl_responden` (`responden_id`),
  CONSTRAINT `tbl_kuisioner_ibfk_2` FOREIGN KEY (`pertanyaan_id`) REFERENCES `tbl_pertanyaan` (`pertanyaan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_pertanyaan`;
CREATE TABLE `tbl_pertanyaan` (
  `pertanyaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  `kategori_id` int(11) NOT NULL,
  PRIMARY KEY (`pertanyaan_id`),
  KEY `kategori_id` (`kategori_id`),
  CONSTRAINT `tbl_pertanyaan_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `tbl_kategori_pertanyaan` (`kategori_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tbl_responden`;
CREATE TABLE `tbl_responden` (
  `responden_id` int(11) NOT NULL AUTO_INCREMENT,
  `responden_nama` varchar(100) NOT NULL,
  `responden_usia` enum('17 - 25 Tahun','26 - 45 Tahun','> 46 Tahun') NOT NULL,
  `responden_jk` enum('Pria','Wanita') NOT NULL,
  `responden_pendidikan` enum('SMA','D3','S1','S2') NOT NULL,
  `responden_masa_kerja` enum('0 - 5 Tahun','6 - 10 Tahun','> 10 Tahun') NOT NULL,
  `responden_status_sosial` enum('Menikah','Belum Menikah') NOT NULL,
  PRIMARY KEY (`responden_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `data_kuisioner`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `data_kuisioner` AS select `tbl_kuisioner`.`kuisioner_id` AS `kuisioner_id`,`tbl_kuisioner`.`responden_id` AS `responden_id`,`tbl_kuisioner`.`pertanyaan_id` AS `pertanyaan_id`,`tbl_kuisioner`.`skor` AS `skor`,`data_pertanyaan`.`pertanyaan` AS `pertanyaan`,`data_pertanyaan`.`kategori_id` AS `kategori_id`,`data_pertanyaan`.`kategori_nama` AS `kategori_nama`,`data_pertanyaan`.`kategori_keterangan` AS `kategori_keterangan`,`tbl_responden`.`responden_nama` AS `responden_nama`,`tbl_responden`.`responden_usia` AS `responden_usia`,`tbl_responden`.`responden_jk` AS `responden_jk`,`tbl_responden`.`responden_pendidikan` AS `responden_pendidikan`,`tbl_responden`.`responden_masa_kerja` AS `responden_masa_kerja`,`tbl_responden`.`responden_status_sosial` AS `responden_status_sosial` from ((`tbl_kuisioner` join `tbl_responden` on(`tbl_kuisioner`.`responden_id` = `tbl_responden`.`responden_id`)) join `data_pertanyaan`);

DROP TABLE IF EXISTS `data_pertanyaan`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `data_pertanyaan` AS select `tbl_pertanyaan`.`pertanyaan_id` AS `pertanyaan_id`,`tbl_pertanyaan`.`pertanyaan` AS `pertanyaan`,`tbl_pertanyaan`.`kategori_id` AS `kategori_id`,`tbl_kategori_pertanyaan`.`kategori_nama` AS `kategori_nama`,`tbl_kategori_pertanyaan`.`kategori_keterangan` AS `kategori_keterangan` from (`tbl_pertanyaan` join `tbl_kategori_pertanyaan` on(`tbl_pertanyaan`.`kategori_id` = `tbl_kategori_pertanyaan`.`kategori_id`));

-- 2019-12-11 06:34:54
