-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.14-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for sistem_pmb
CREATE DATABASE IF NOT EXISTS `sistem_pmb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sistem_pmb`;


-- Dumping structure for table sistem_pmb.fakultas
CREATE TABLE IF NOT EXISTS `fakultas` (
  `id_fakultas` varchar(1) NOT NULL,
  `kode_fakultas` varchar(4) NOT NULL,
  `nama_fakultas` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_fakultas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table sistem_pmb.fakultas: ~3 rows (approximately)
/*!40000 ALTER TABLE `fakultas` DISABLE KEYS */;
INSERT INTO `fakultas` (`id_fakultas`, `kode_fakultas`, `nama_fakultas`) VALUES
	('1', 'FTI', 'Fakultas Teknologi Industri'),
	('2', 'FTSP', 'Fakultas Teknik Sipil dan Perencanaan'),
	('3', 'FSRD', 'Fakultas Seni Rupa dan Desain');
/*!40000 ALTER TABLE `fakultas` ENABLE KEYS */;


-- Dumping structure for table sistem_pmb.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nrp` varchar(10) NOT NULL,
  `nama_depan` varchar(50) DEFAULT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `agama` enum('Islam','Katolik','Kristen','Hindu','Budha') DEFAULT NULL,
  `id_program_studi` varchar(2) NOT NULL,
  PRIMARY KEY (`nrp`),
  KEY `FK_mahasiswa_program_studi` (`id_program_studi`),
  CONSTRAINT `FK_mahasiswa_program_studi` FOREIGN KEY (`id_program_studi`) REFERENCES `program_studi` (`id_program_studi`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table sistem_pmb.mahasiswa: ~2 rows (approximately)
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` (`nrp`, `nama_depan`, `nama_belakang`, `alamat`, `email`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `id_program_studi`) VALUES
	('152009070', 'Kurnia Ramadhan ', 'Putra', 'Komplek Green Garden View No.20, Pasir Impun, Bandung.', 'kurniaramadhanp91@gmail.com', 'Bukittingi', '1991-03-11', 'Laki-laki', 'Islam', '16'),
	('152009071', 'Michael', 'Suryadi', 'Jl. Surya Sumantri No.11, Dago, Bandung.', 'michael.suryadi@gmail.com', 'Bandung', '1991-11-11', 'Laki-laki', 'Katolik', '15');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;


-- Dumping structure for table sistem_pmb.program_studi
CREATE TABLE IF NOT EXISTS `program_studi` (
  `id_program_studi` varchar(5) NOT NULL,
  `kode_program_studi` varchar(3) DEFAULT NULL,
  `nama_program_studi` varchar(50) DEFAULT NULL,
  `strata` enum('Sarjana','Magister') NOT NULL,
  `id_fakultas` varchar(4) NOT NULL,
  PRIMARY KEY (`id_program_studi`,`strata`),
  KEY `FK_program_studi_fakultas` (`id_fakultas`),
  CONSTRAINT `FK_program_studi_fakultas` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table sistem_pmb.program_studi: ~17 rows (approximately)
/*!40000 ALTER TABLE `program_studi` DISABLE KEYS */;
INSERT INTO `program_studi` (`id_program_studi`, `kode_program_studi`, `nama_program_studi`, `strata`, `id_fakultas`) VALUES
	('11', 'EL', 'Teknik Elektro', 'Sarjana', '1'),
	('12', 'MS', 'Teknik Mesin', 'Sarjana', '1'),
	('12', 'MMS', 'Magister Teknik Mesin', 'Magister', '1'),
	('13', 'TI', 'Teknik Industri', 'Sarjana', '1'),
	('13', 'MTI', 'Magister Teknik Industri', 'Magister', '1'),
	('14', 'TK', 'Teknik Kimia', 'Sarjana', '1'),
	('15', 'IF', 'Informatika', 'Sarjana', '1'),
	('16', 'IS', 'Sistem Informasi', 'Sarjana', '1'),
	('21', 'AR', 'Arsitektur', 'Sarjana', '2'),
	('22', 'SI', 'Teknik Sipil', 'Sarjana', '2'),
	('22', 'MSI', 'Magister Teknik Sipil', 'Magister', '2'),
	('23', 'GD', 'Teknik Geodesi', 'Sarjana', '2'),
	('24', 'PWK', 'Perencanaan Wilayah dan Kota', 'Sarjana', '2'),
	('25', 'TL', 'Teknik Lingkungan', 'Sarjana', '2'),
	('31', 'DI', 'Desain Interior', 'Sarjana', '3'),
	('32', 'DP', 'Desain Produk', 'Sarjana', '3'),
	('33', 'DKV', 'Desain Komunikasi Visual', 'Sarjana', '3');
/*!40000 ALTER TABLE `program_studi` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
