-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2018 at 04:47 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universa_uniq`
--

-- --------------------------------------------------------

--
-- Table structure for table `actionplan`
--

CREATE TABLE `actionplan` (
  `actionplan_id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `month` varchar(20) DEFAULT NULL,
  `semester` varchar(12) DEFAULT NULL,
  `thn_ajaran` varchar(20) DEFAULT NULL,
  `filename` varchar(256) DEFAULT NULL,
  `created_timestamp` datetime DEFAULT NULL,
  `edited_timestamp` datetime DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `edited_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actionplan`
--

INSERT INTO `actionplan` (`actionplan_id`, `branch_id`, `month`, `semester`, `thn_ajaran`, `filename`, `created_timestamp`, `edited_timestamp`, `created_by`, `edited_by`) VALUES
(2, 1, 'February 2017', 'genap', '2016/2017', 'proker-1-20162017-genap.pdf', '2017-01-05 00:12:17', NULL, 'marketing', NULL),
(3, 1, '', 'genap', '2016/2017', 'proker-1-0120162017-genap.docx', '2017-01-31 22:01:35', NULL, 'marketing', NULL),
(4, 1, 'March 2017', 'genap', '2016/2017', 'proker-1-0320162017-genap.pdf', '2017-03-20 22:24:35', NULL, 'marketing', NULL),
(5, 1, 'December 2016', 'genap', '2016/2017', 'proker-1-1220162017-genap.pdf', '2017-03-20 22:26:33', NULL, 'marketing', NULL),
(6, 1, 'April 2017', 'genap', '2016/2017', 'plans-1-0420162017-genap.pdf', '2017-03-20 22:32:03', NULL, 'marketing', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `attendance` enum('1','2','3','4') COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '1=hadir, 2=ijin, 3=sakit, 4=tanpa keterangan',
  `created_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `edited_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `branch_id`, `attendance_date`, `account_id`, `attendance`, `created_at`, `edited_at`, `deleted_at`) VALUES
(4, 1, '2017-01-02', 1, '2', '2017-01-08 23:06:02', NULL, NULL),
(5, 1, '2017-01-02', 3, '3', '2017-01-08 23:06:03', NULL, NULL),
(6, 1, '2017-01-02', 4, '3', '2017-01-08 23:06:03', NULL, NULL),
(7, 1, '2017-01-03', 1, '1', '2017-01-12 23:19:21', NULL, NULL),
(8, 1, '2017-01-03', 3, '1', '2017-01-12 23:19:21', NULL, NULL),
(9, 1, '2017-01-03', 4, '1', '2017-01-12 23:19:21', NULL, NULL),
(10, 1, '2017-01-31', 1, '1', '2017-01-31 22:11:28', NULL, NULL),
(11, 1, '2017-01-31', 3, '2', '2017-01-31 22:11:28', NULL, NULL),
(12, 1, '2017-01-31', 4, '3', '2017-01-31 22:11:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checklist_server`
--

CREATE TABLE `checklist_server` (
  `id_checklist` int(11) NOT NULL,
  `id_server` varchar(20) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `resource` varchar(50) DEFAULT NULL,
  `mtnc_plan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(20) NOT NULL,
  `updated_by` varchar(20) NOT NULL,
  `deleted_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checklist_server`
--

INSERT INTO `checklist_server` (`id_checklist`, `id_server`, `status`, `resource`, `mtnc_plan`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, '1', 'OK', 'Aman', 'OK', '2018-10-10 03:45:37', '2018-10-10 03:58:30', '2018-10-10 03:58:30', '', '', ''),
(2, '2', 'OK', 'OKE', 'OK', '2018-10-10 03:48:20', '2018-10-10 03:58:30', '2018-10-10 03:58:30', '', '', ''),
(3, '3', 'DOWN', 'Memory penuh', 'OK', '2018-10-10 06:13:12', '2018-10-10 06:13:12', '2018-10-10 06:13:12', '', '', ''),
(4, '1', 'DOWN', 'Storage penuh', 'OK', '2018-10-10 06:21:56', '2018-10-10 06:21:56', '2018-10-10 06:21:56', '', '', ''),
(5, '1', 'OK', 'Aman', 'DOWN', '2018-10-10 06:23:12', '2018-10-10 06:23:12', '2018-10-10 06:23:12', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kas_besar`
--

CREATE TABLE `kas_besar` (
  `id_kb` int(11) NOT NULL,
  `tgl_kb` date DEFAULT NULL,
  `pemasukan_bimbel` varchar(30) DEFAULT NULL,
  `pemasukan_pusat` varchar(30) DEFAULT NULL,
  `pengeluaran` varchar(30) DEFAULT NULL,
  `pengisian` varchar(30) DEFAULT NULL,
  `setor` varchar(30) DEFAULT NULL,
  `setor_kepada` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `updated_by` varchar(30) DEFAULT NULL,
  `deleted_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas_besar`
--

INSERT INTO `kas_besar` (`id_kb`, `tgl_kb`, `pemasukan_bimbel`, `pemasukan_pusat`, `pengeluaran`, `pengisian`, `setor`, `setor_kepada`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(6, '2017-01-21', '2000000', NULL, '250000', '1000000', '200000', 'Ahmad Z', '2017-01-16', NULL, NULL, 'admin', NULL, NULL),
(9, '2017-01-25', '1250000', NULL, '200000', '250000', '200000', 'Yoni K', '2017-01-16', NULL, NULL, 'admin', NULL, NULL),
(10, '2017-01-17', '2000000', NULL, '500000', '250000', '300000', 'Andi D', '2017-01-17', NULL, NULL, 'admin', NULL, NULL),
(11, '2017-02-19', '2500000', NULL, '200000', '400000', '250000', 'Roni Samsudin', '2017-02-04', NULL, NULL, 'admin', NULL, NULL),
(12, '2017-02-20', '2000000', NULL, '400000', '500000', '100000', 'Fauzi', '2017-02-04', NULL, NULL, 'admin', NULL, NULL),
(14, '2017-02-21', '', '2500000', '', '100000', '150000', 'Robi', '2017-02-05', NULL, NULL, 'admin', NULL, NULL),
(18, '2017-01-05', '600000', '3000000', '-125000', '200000', '300000', 'Toni', '2017-02-05', NULL, NULL, 'admin', NULL, NULL),
(20, '2017-05-02', '200000', '500000', '135900', '500000', '200000', 'Yayasan ', '2017-05-29', NULL, NULL, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kas_kecil`
--

CREATE TABLE `kas_kecil` (
  `id_kk` int(11) NOT NULL,
  `tgl_kk` date DEFAULT NULL,
  `no_item` varchar(50) DEFAULT NULL,
  `uraian_item` varchar(100) DEFAULT NULL,
  `jumlah_item` int(11) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `debit_kk` int(11) DEFAULT NULL,
  `kredit_kk` int(11) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `edited_at` varchar(20) DEFAULT NULL,
  `deleted_at` varchar(20) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `edited_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas_kecil`
--

INSERT INTO `kas_kecil` (`id_kk`, `tgl_kk`, `no_item`, `uraian_item`, `jumlah_item`, `harga_satuan`, `debit_kk`, `kredit_kk`, `created_at`, `edited_at`, `deleted_at`, `created_by`, `edited_by`) VALUES
(1, '2017-01-01', '123ASD', 'Biaya Operasional', 2, 160000, 0, 320000, '2017-01-03 15:13:32', NULL, NULL, 'admin', NULL),
(2, '2017-01-01', 'TYU765', 'Pembayarn Siswa', 1, 200000, 0, 200000, '2017-01-03 16:22:24', NULL, NULL, 'admin', NULL),
(3, '2017-01-01', '123', 'asf', 21, 12, 252, 0, '2017-01-06 10:12:56', NULL, NULL, 'admin', NULL),
(8, '2017-01-01', '123097tre', 'Buku', 200, 15000, 3000000, 0, '2017-01-07 22:22:46', NULL, NULL, 'admin', NULL),
(9, '2017-01-01', 'HFD678', 'Pensil', 100, 1000, 100000, 0, '2017-01-07 22:23:15', NULL, NULL, 'admin', NULL),
(10, '2017-01-01', 'FHGHK666', 'tes', 1000, 1000, 1000000, 0, '2017-01-07 22:27:19', NULL, NULL, 'admin', NULL),
(11, '2017-01-01', '123097tre', 'Buku', 200, 1000, 200000, 0, '2017-01-07 22:28:14', NULL, NULL, 'admin', NULL),
(12, '2017-01-01', 'FHGHK666', 'tes', 200, 1000, 200000, 0, '2017-01-07 22:29:36', NULL, NULL, 'admin', NULL),
(13, '2017-01-31', '1', 'Semen', 10, 50000, 0, 500000, '2017-01-31 22:43:09', NULL, NULL, 'admin', NULL),
(14, '2017-01-31', '1', 'Bakso', 5, 6500, 0, 32500, '2017-01-31 22:43:57', NULL, NULL, 'admin', NULL),
(15, '2017-01-31', '2', 'Fotokopi', 1000, 100, 0, 100000, '2017-01-31 22:44:23', NULL, NULL, 'admin', NULL),
(17, '2017-02-19', '234SDF', 'Minum', 3, 250000, 0, 750000, '2017-02-04 23:11:54', NULL, NULL, 'admin', NULL),
(18, '2017-01-05', '567TYUI', 'Operasional', 1, 125000, 0, 125000, '2017-02-05 16:41:52', NULL, NULL, 'admin', NULL),
(19, '2017-05-02', '', 'Tissue \'Monties\'', 1, 7200, 0, 7200, '2017-05-29 10:15:16', NULL, NULL, 'admin', NULL),
(20, '2017-05-02', '', 'Tempat sampah', 1, 18500, 0, 18500, '2017-05-29 10:16:32', NULL, NULL, 'admin', NULL),
(21, '2017-05-02', '', 'Timba', 1, 11000, 0, 11000, '2017-05-29 10:17:20', NULL, NULL, 'admin', NULL),
(22, '2017-05-02', '', 'Pulsa Listrik', 1, 203000, 0, 203000, '2017-05-29 10:18:11', NULL, NULL, 'admin', NULL),
(23, '2017-05-02', '', 'Pulsa Telepon a.n. Pak Yusuf', 1, 22000, 0, 22000, '2017-05-29 10:19:27', NULL, NULL, 'admin', NULL),
(24, '2017-05-02', '', 'Fotocopy', 130, 100, 0, 13000, '2017-05-29 10:20:40', NULL, NULL, 'admin', NULL),
(25, '2017-05-02', '', 'Fotocopy', 75, 100, 0, 7500, '2017-05-29 10:21:32', NULL, NULL, 'admin', NULL),
(26, '2017-05-02', '', 'Printing', 1, 9000, 0, 9000, '2017-05-29 10:22:10', NULL, NULL, 'admin', NULL),
(27, '2017-05-02', '', 'Kekurangan Gaji Karyawan', 1, 50000, 0, 50000, '2017-05-29 10:23:40', NULL, NULL, 'admin', NULL),
(28, '2017-05-02', '', 'Fotocopy', 50, 100, 0, 5000, '2017-05-29 10:24:44', NULL, NULL, 'admin', NULL),
(29, '2017-05-02', '', 'Fotocopy', 40, 150, 0, 6000, '2017-05-29 10:25:31', NULL, NULL, 'admin', NULL),
(30, '2017-05-02', '', 'Printing', 1, 2500, 0, 2500, '2017-05-29 10:26:13', NULL, NULL, 'admin', NULL),
(31, '2017-05-02', '', 'Fotocopy', 40, 100, 0, 4000, '2017-05-29 10:26:45', NULL, NULL, 'admin', NULL),
(32, '2017-05-02', '', 'Laundry Mukena', 1, 10000, 0, 10000, '2017-05-29 10:27:34', NULL, NULL, 'admin', NULL),
(33, '2017-05-02', '', 'Penerimaan Kas Kecil', 1, 500000, 500000, 0, '2017-05-29 10:29:31', NULL, NULL, 'admin', NULL),
(34, '2017-05-02', '', 'Saldo per tanggal 29 April 2017', 1, 4600, 4600, 0, '2017-05-29 10:32:30', NULL, NULL, 'admin', NULL),
(35, '2017-07-01', '', 'Saldo Awal', 0, 0, 135900, 0, '2017-07-10 12:56:01', NULL, NULL, 'admin', NULL),
(36, '2017-07-01', '1234qwer', 'Buku Tulis', 1, 20000, 0, 20000, '2017-07-10 12:56:01', NULL, NULL, 'admin', NULL),
(44, '2017-07-01', '123', 'Operasional Kendaraan', 1, 50000, 0, 50000, '2017-07-10 13:07:12', NULL, NULL, 'admin', NULL),
(45, '2017-07-01', '12333', 'Seragam Karyawan', 1, 30000, 0, 30000, '2017-07-10 13:11:36', NULL, NULL, 'admin', NULL),
(46, '2017-07-01', '5678', 'Bensin Motor', 1, 8500, 0, 8500, '2017-07-10 13:12:06', NULL, NULL, 'admin', NULL),
(47, '2018-01-01', '', 'Saldo Awal', 0, 0, 27400, 0, '2018-01-24 19:50:32', NULL, NULL, 'admin', NULL),
(48, '2018-01-01', '123', 'Kebutuhan Operasional Kantor', 3, 1231232, 3693696, 0, '2018-01-24 19:50:32', NULL, NULL, 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_psycocare`
--

CREATE TABLE `laporan_psycocare` (
  `laporan_id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `month` varchar(20) DEFAULT NULL,
  `semester` enum('gasal','genap') DEFAULT NULL,
  `thn_ajaran` varchar(20) DEFAULT NULL,
  `filename` varchar(256) DEFAULT NULL,
  `created_timestamp` datetime NOT NULL,
  `edited_timestamp` datetime DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `edited_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_psycocare`
--

INSERT INTO `laporan_psycocare` (`laporan_id`, `branch_id`, `month`, `semester`, `thn_ajaran`, `filename`, `created_timestamp`, `edited_timestamp`, `created_by`, `edited_by`) VALUES
(2, 1, 'February 2017', 'genap', '2016/2017', 'report-1-0220162017-genap.pdf', '2017-01-04 23:41:20', NULL, 'psycocare', NULL),
(3, 1, 'March 2017', 'genap', '2016/2017', 'report-1-0320162017-genap.pdf', '2017-01-06 23:13:57', NULL, 'psycocare', NULL),
(4, 1, 'April 2017', 'genap', '2016/2017', 'report-1-0420162017-genap.pdf', '2017-01-06 23:15:21', NULL, 'psycocare', NULL),
(5, 1, '', 'genap', '2016/2017', '', '2017-01-31 22:08:34', NULL, 'psycocare', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `list_server`
--

CREATE TABLE `list_server` (
  `id_server` int(11) NOT NULL,
  `ip_server` varchar(50) NOT NULL,
  `nama_server` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(20) DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `deleted_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_server`
--

INSERT INTO `list_server` (`id_server`, `ip_server`, `nama_server`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, '10.242.78.18', 'node 1 ', '2018-10-10 03:56:30', '2018-10-10 03:56:30', '2018-10-10 03:56:30', NULL, NULL, NULL),
(2, '10.242.78.118', 'node 2 ', '2018-10-10 03:56:30', '2018-10-10 03:56:30', '2018-10-10 03:56:30', NULL, NULL, NULL),
(3, '10.241.78.18', 'node 1 DRC ', '2018-10-10 03:56:30', '2018-10-10 03:56:30', '2018-10-10 03:56:30', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master__appointment`
--

CREATE TABLE `master__appointment` (
  `appointment_id` int(11) NOT NULL,
  `appointment_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` smallint(2) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `master__appointment`
--

INSERT INTO `master__appointment` (`appointment_id`, `appointment_name`, `is_active`) VALUES
(1, 'Kepala Unit', 1),
(2, 'Kepala Bagian Marketing', 1),
(3, 'Kepala Bagian P & K', 1),
(4, 'Kepala Bagian Akun & Keuangan', 1),
(5, 'Pengajar Tetap', 1),
(6, 'CS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master__branch`
--

CREATE TABLE `master__branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(64) NOT NULL,
  `branch_address` varchar(255) NOT NULL,
  `id_kota` int(5) DEFAULT NULL,
  `branch_telp` varchar(32) NOT NULL,
  `is_active` smallint(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master__branch`
--

INSERT INTO `master__branch` (`branch_id`, `branch_name`, `branch_address`, `id_kota`, `branch_telp`, `is_active`) VALUES
(1, 'Cabang 1', 'Jl. Diponegoro No.5', 2, '0342-441111', 1),
(2, 'Cabang 2', 'Jl. Pattimura No. 2', 1, '0342-412121', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master__kelas`
--

CREATE TABLE `master__kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(15) DEFAULT NULL,
  `created_timestamp` varchar(20) DEFAULT NULL,
  `edited_timestamp` varchar(20) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `edited_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master__kelas`
--

INSERT INTO `master__kelas` (`id_kelas`, `nama_kelas`, `created_timestamp`, `edited_timestamp`, `created_by`, `edited_by`) VALUES
(1, 'Reg 1', NULL, NULL, NULL, NULL),
(2, 'Reg 2', NULL, NULL, NULL, NULL),
(3, 'Reg 3', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master__kota`
--

CREATE TABLE `master__kota` (
  `id_kota` int(11) NOT NULL,
  `kode_kota` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_kota` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` smallint(2) DEFAULT '1' COMMENT '0=tidak aktif; 1=aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `master__kota`
--

INSERT INTO `master__kota` (`id_kota`, `kode_kota`, `nama_kota`, `is_active`) VALUES
(1, 'BLT', 'Blitar', 1),
(2, 'WTS', 'Wates', 1),
(3, 'KDR', 'Kediri', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member__account`
--

CREATE TABLE `member__account` (
  `account_id` int(11) NOT NULL,
  `account_email` varchar(64) NOT NULL,
  `account_username` varchar(32) NOT NULL,
  `account_password` varchar(64) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` varchar(16) DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member__account`
--

INSERT INTO `member__account` (`account_id`, `account_email`, `account_username`, `account_password`, `branch_id`, `created_at`, `updated_at`, `deleted_at`, `is_active`) VALUES
(1, 'admin@admin.com', 'superadmin', 'a5ef132517612890a74852d2554ebb39ebbf8d79', 1, '0000-00-00 00:00:00', NULL, NULL, 1),
(2, 'admin@uniq.com', 'admin', '519ea4cab05261561e390fea46fa899e12bf9ae1', 1, '0000-00-00 00:00:00', NULL, NULL, 1),
(3, 'cs@uniq.com', 'cs', '672fa0c3e4fa37ba0bc2bdf3462caf01b7b43d87', 1, '0000-00-00 00:00:00', NULL, NULL, 1),
(4, 'keuangan@uniq.com', 'keuangan', '2faedd48d5b1f0c82cd67ed7ed29597c375425c5', 1, '0000-00-00 00:00:00', NULL, NULL, 1),
(5, 'sdm@uniq.com', 'sdm', '8e9879565655768714815a0a2d709a6bf32028b0', 1, '0000-00-00 00:00:00', NULL, NULL, 1),
(6, 'psycocare@uniq.com', 'psycocare', '0a0a7fbde3fcf5d3939d738d1af9635dfcba89b1', 1, '0000-00-00 00:00:00', NULL, NULL, 1),
(7, 'marketing@uniq.com', 'marketing', 'c5672c466b08b57b6fd9e5605a081797c325863b', 1, '0000-00-00 00:00:00', NULL, NULL, 1),
(8, 'pengajaran@uniq.com', 'pengajaran', '5e387bb28f33b9aea199188136f86cc171374f50', 1, '0000-00-00 00:00:00', NULL, NULL, 1),
(9, 'sdm2@uniq.com', 'sdm2', 'e25a561459cdff3aacbba817d21b8e73f5b684aa', 2, '0000-00-00 00:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member__profile`
--

CREATE TABLE `member__profile` (
  `profile_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member__profile`
--

INSERT INTO `member__profile` (`profile_id`, `account_id`, `first_name`, `last_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Super', 'Admin', '0000-00-00 00:00:00', NULL, NULL),
(2, 2, 'Admin', 'Istrator', '0000-00-00 00:00:00', NULL, NULL),
(3, 3, 'Customer', 'Service', '0000-00-00 00:00:00', NULL, NULL),
(4, 4, 'Keu', 'Angan', '0000-00-00 00:00:00', NULL, NULL),
(5, 5, 'Sumber', 'Daya Manusia', '0000-00-00 00:00:00', NULL, NULL),
(6, 6, 'Psyco', 'Care', '0000-00-00 00:00:00', NULL, NULL),
(7, 7, 'Marke', 'Ting', '0000-00-00 00:00:00', NULL, NULL),
(8, 8, 'Penga', 'Jaran', '0000-00-00 00:00:00', NULL, NULL),
(9, 9, 'Sumber', 'Daya Manusiadua', '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan_pusat`
--

CREATE TABLE `pemasukan_pusat` (
  `id_pemasukan` int(11) NOT NULL,
  `jumlah_pemasukan` int(11) DEFAULT NULL,
  `tgl_pemasukan` date DEFAULT NULL,
  `created_at` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pemasukan_pusat`
--

INSERT INTO `pemasukan_pusat` (`id_pemasukan`, `jumlah_pemasukan`, `tgl_pemasukan`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 2400000, '2017-01-21', '2017-01-17 21:51:50', NULL, NULL, 'admin', NULL, NULL),
(2, 1500000, '2017-01-17', '2017-01-17 22:00:10', NULL, NULL, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_siswa`
--

CREATE TABLE `pembayaran_siswa` (
  `id_pembayaran` int(11) NOT NULL,
  `no_kwitansi` varchar(30) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `biaya_daftar` int(11) DEFAULT NULL,
  `biaya_bimbel` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL,
  `deleted_at` varchar(20) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `deleted_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_siswa`
--

INSERT INTO `pembayaran_siswa` (`id_pembayaran`, `no_kwitansi`, `id_siswa`, `biaya_daftar`, `biaya_bimbel`, `jumlah`, `jenis`, `tgl_pembayaran`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(16, '123', 8, 200000, 2000000, NULL, NULL, NULL, '2017-01-09 21:05:53', NULL, NULL, 'admin', NULL, NULL),
(27, '3456tyui', 8, NULL, 1900000, 100000, 'cicilan 1', '2017-01-05', '2017-01-12 21:33:21', NULL, NULL, 'admin', NULL, NULL),
(28, NULL, 9, 150000, 2000000, NULL, NULL, NULL, '2017-01-12 21:41:51', NULL, NULL, 'admin', NULL, NULL),
(29, NULL, 10, 100000, 2000000, NULL, NULL, NULL, '2017-01-12 21:44:04', NULL, NULL, 'admin', NULL, NULL),
(30, '9736', 10, NULL, 1500000, 500000, 'cicilan 1', '2017-01-05', '2017-01-12 21:46:08', NULL, NULL, 'admin', NULL, NULL),
(31, '1234', 9, NULL, 1750000, 250000, 'cicilan 1', '2017-01-06', '2017-01-12 21:46:29', NULL, NULL, 'admin', NULL, NULL),
(32, '123wer', 8, NULL, 1850000, 50000, 'cicilan 2', '2017-01-06', '2017-01-12 22:16:12', NULL, NULL, 'admin', NULL, NULL),
(33, '123sdf', 9, NULL, 1650000, 100000, 'cicilan 2', '2017-01-07', '2017-01-12 22:16:34', NULL, NULL, 'admin', NULL, NULL),
(34, '8587', 10, NULL, 1250000, 250000, 'cicilan 2', '2017-01-08', '2017-01-12 22:16:59', NULL, NULL, 'admin', NULL, NULL),
(35, NULL, 11, 100000, 2499999, NULL, NULL, NULL, '2017-01-31 22:26:40', NULL, NULL, 'admin', NULL, NULL),
(36, '', 11, NULL, 1499999, 1000000, 'SPP', '2017-01-31', '2017-01-31 22:27:20', NULL, NULL, 'admin', NULL, NULL),
(37, '786ty', 11, NULL, 999999, 500000, 'cicilan 2', '2017-03-01', '2017-03-05 20:42:02', NULL, NULL, 'admin', NULL, NULL),
(38, NULL, 12, 100000, 1800000, NULL, NULL, NULL, '2017-04-24 16:17:15', NULL, NULL, 'admin', NULL, NULL),
(39, NULL, 13, 200000, 1800000, NULL, NULL, NULL, '2017-04-24 16:27:22', NULL, NULL, 'admin', NULL, NULL),
(40, NULL, 14, 100000, 1800000, NULL, NULL, NULL, '2017-04-24 16:29:53', NULL, NULL, 'admin', NULL, NULL),
(41, NULL, 15, 200000, 2430000, NULL, NULL, NULL, '2017-05-29 11:02:56', NULL, NULL, 'admin', NULL, NULL),
(42, '021', 15, NULL, 2230000, 200000, 'cicilan 1', '2017-05-02', '2017-05-29 11:10:56', NULL, NULL, 'admin', NULL, NULL),
(43, '022', 15, NULL, 1930000, 300000, 'cicilan 2', '2017-05-04', '2017-05-29 11:12:39', NULL, NULL, 'admin', NULL, NULL),
(44, NULL, NULL, NULL, 1930000, 0, NULL, '1970-01-01', '2018-10-10 15:40:26', NULL, NULL, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profil_siswa`
--

CREATE TABLE `profil_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `panggilan` varchar(20) DEFAULT NULL,
  `nia` varchar(50) DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `sekolah` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `ayah_siswa` varchar(50) DEFAULT NULL,
  `ibu_siswa` varchar(50) DEFAULT NULL,
  `telp_ayah` varchar(20) DEFAULT NULL,
  `telp_ibu` varchar(20) DEFAULT NULL,
  `pekerjaan_ayah` varchar(20) DEFAULT NULL,
  `pekerjaan_ibu` varchar(20) DEFAULT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `deleted_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `deleted_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_siswa`
--

INSERT INTO `profil_siswa` (`id_siswa`, `id_kelas`, `nama`, `panggilan`, `nia`, `agama`, `kelas`, `telepon`, `sekolah`, `alamat`, `tempat_lahir`, `tgl_lahir`, `ayah_siswa`, `ibu_siswa`, `telp_ayah`, `telp_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `created_at`, `deleted_at`, `updated_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(8, 3, 'Zola Majendra', 'Zola', '7340', 'Islam', '9SMP', '087736370688', 'SMP N 1 Tawangsari', 'Solo', 'Sukoharjo', '2017-01-01', 'Sartopo Ahmadi', 'Haswati', '-', '09866', '-', 'Swasta', '2017-01-09 21:05:53', NULL, '2017-01-12 23:23:17', 'admin', 'admin', 'admin'),
(9, 2, 'Toni Setiyo', 'Tonset', '1234', 'Islam', '7SMP', '09865', 'SMP N 1 Tawangsari', 'Jogja', 'Jogja', '1994-01-16', 'Ngatno', 'Partini', '0986', '07653', 'Juragan', 'Dagang', '2017-01-12 21:41:51', NULL, '2017-01-12 23:25:23', 'admin', NULL, 'admin'),
(10, 1, 'Anto Sulistiawan', 'Anto', '03836', 'Islam', '7SMP', '0837', 'SMP N 2 Mojorejo', 'Tuban', 'Tuban', '1995-07-26', 'Karyono', 'Suyamti', '0863', '07465', 'Swasta', 'Guru', '2017-01-12 21:44:04', NULL, '2017-01-12 23:23:17', 'admin', NULL, NULL),
(11, 2, 'Bagus Waseso', 'Bagus', '', 'islam', '7SMP', '08564444456582', 'SMP Negeri 2 Blitar', 'Perum Wisma Indah Jl. Dewaruci no D-12', 'Wates', '2014-04-08', 'Budi', 'Siti', '0856478545', '05864555652', 'PNS', 'IRT', '2017-01-31 22:26:40', NULL, NULL, 'admin', NULL, NULL),
(12, 1, 'M Fajar Sidiq', 'Fajar', '--4SD-1-12', 'Islam', '4SD', '098876655', 'SD N Kateguhan 02', 'Tegalan', 'Sukoharjo', '2011-05-29', 'Joko P', 'Haswati', '0985483', '094726', 'Swasta', 'Swasta', '2017-04-24 16:17:15', '2017-04-24 16:18:22', '2017-04-24 16:18:22', 'admin', NULL, 'admin'),
(13, 2, 'Ilvan Octa', 'Tape', '-1-7SMP-2-13', 'Islam', '7SMP', '087643627465', 'SMP N 1 Tawangsari', 'Jatimalang', 'Sukoharjo', '1993-04-06', 'Mustofa', 'Warni', '086353728', '0863263536', 'Swasta', 'Swasta', '2017-04-24 16:27:22', '2017-04-24 16:28:38', '2017-04-24 16:28:38', 'admin', NULL, 'admin'),
(14, 3, 'Rillo', 'Gembes', '1-1-7SMP-3-14', 'Islam', '7SMP', '087643627465', 'SMP N 1 Tawangsari', 'Kedunggudel', 'Sukoharjo', '2017-04-02', 'Yadi', 'Tanti', '03823646', '0284875', 'Swasta', 'Swasta', '2017-04-24 16:29:53', NULL, '2017-04-24 16:29:53', 'admin', NULL, NULL),
(15, 1, 'Dia', '', '--4SD-1-15', 'Islam', '4SD', '0354', 'sd tawang', 'ds', 'kediri', '2017-05-02', 'ayah', 'emak', '021', '031', 'kerja', 'rt', '2017-05-29 11:02:56', NULL, '2017-05-29 11:02:56', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proker_psycocare`
--

CREATE TABLE `proker_psycocare` (
  `proker_id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `semester` enum('gasal','genap') DEFAULT NULL,
  `thn_ajaran` varchar(20) DEFAULT NULL,
  `filename` varchar(256) DEFAULT NULL,
  `created_timestamp` datetime DEFAULT NULL,
  `edited_timestamp` datetime DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `edited_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proker_psycocare`
--

INSERT INTO `proker_psycocare` (`proker_id`, `branch_id`, `semester`, `thn_ajaran`, `filename`, `created_timestamp`, `edited_timestamp`, `created_by`, `edited_by`) VALUES
(4, 1, 'gasal', '2016/2017', 'proker-1-20162017-gasal.pdf', '2016-12-26 00:33:08', NULL, 'psycocare', NULL),
(5, 1, 'gasal', '2016/2017', 'proker-1-20162017-gasal.pdf', '2017-01-06 23:27:33', NULL, 'psycocare', NULL),
(6, 1, 'gasal', '2016/2017', 'proker-1-20162017-gasal.docx', '2017-01-31 22:07:38', NULL, 'psycocare', NULL),
(7, 1, 'gasal', '2016/2017', 'proker-1-20162017-gasal.pdf', '2017-03-20 22:35:09', NULL, 'psycocare', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sikarya__account`
--

CREATE TABLE `sikarya__account` (
  `account_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `account_email` varchar(64) NOT NULL,
  `account_username` varchar(64) NOT NULL,
  `account_password` varchar(64) NOT NULL,
  `is_active` smallint(2) NOT NULL,
  `created_by` varchar(32) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sikarya__account`
--

INSERT INTO `sikarya__account` (`account_id`, `branch_id`, `account_email`, `account_username`, `account_password`, `is_active`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'komarudin@gmail.com', 'komarudin', 'bdd97a27d9a3e1d57f71e5c987f757dddeab7a8c', 1, 'sdm', '2016-12-17 18:42:13', '2017-01-25 22:45:06', NULL),
(2, 2, 'alkadir@gamil.com', 'alkadir', '14604573e79e829f6c14b075957a4bf3b07e3cad', 1, 'admin', '2017-01-08 12:40:48', NULL, NULL),
(3, 1, 'yayang@gmail.com', 'yayang', 'b6d7f0b6462346e566f139e4088671967193b1c4', 1, 'sdm', '2017-01-08 14:59:02', NULL, NULL),
(4, 1, 'egis@gmail.com', 'egis', 'c8939b618d54f497fd4036443804cfcc7b82e647', 1, 'sdm', '2017-01-08 15:05:04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sikarya__profile`
--

CREATE TABLE `sikarya__profile` (
  `profile_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `profile_firstname` varchar(128) NOT NULL,
  `profile_lastname` varchar(128) NOT NULL,
  `profile_address` varchar(256) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(50) DEFAULT NULL,
  `education` enum('SMA','D1','D3','S1','S2','S3') NOT NULL,
  `college` varchar(64) NOT NULL,
  `bank_name` varchar(128) DEFAULT NULL,
  `bank_account` varchar(32) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sikarya__profile`
--

INSERT INTO `sikarya__profile` (`profile_id`, `branch_id`, `account_id`, `appointment_id`, `profile_firstname`, `profile_lastname`, `profile_address`, `phone_number`, `birthdate`, `birthplace`, `education`, `college`, `bank_name`, `bank_account`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 'Komarudin', 'Wahid', 'Jl. Kapuk 5/12 No.228 Kec. Cengkareng', '089213243546', '1990-01-27', 'Blitar', 'S1', 'Universitas Terbuka', 'Mandiri', '142021982763', '2016-12-17 18:42:13', '2017-01-25 22:45:06', NULL),
(2, 2, 2, 1, 'Alkadir', 'Muhammad', 'Jl. Wilis No.20, Blitar', '083838363632', '0000-00-00', 'Blitar', 'S1', 'Universitas Tarumanegara', 'BCA', '7337845609', '2017-01-08 12:40:48', NULL, NULL),
(3, 1, 3, 5, 'Yayang', 'Prananda', 'Jl. Jati no.2 Blitar', '089786756342', '1990-01-30', 'Blitar', 'S1', 'Universitas Negeri Blitar', 'BRI', '2312234990390', '2017-01-08 14:59:02', NULL, NULL),
(4, 1, 4, 5, 'Egis', 'Fernanda', 'Jl. Selarong No.101, Blitar', '085790680128', '1990-05-29', 'Blitar', 'S1', 'Universitas Negeri Blitar', 'Mandiri', '1230987465', '2017-01-08 15:05:04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sikarya__slip_gaji`
--

CREATE TABLE `sikarya__slip_gaji` (
  `slip_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `slip_month` varchar(16) NOT NULL,
  `nilai_kontrak` int(11) DEFAULT NULL,
  `mengajar` int(11) DEFAULT NULL,
  `mengajar_luar` int(11) DEFAULT NULL,
  `piket` int(11) DEFAULT NULL,
  `pembahasan` int(11) DEFAULT NULL,
  `pembahasan_luar` int(11) DEFAULT NULL,
  `kelebihan_jam` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `pinjaman_before` int(11) DEFAULT NULL,
  `cicilan` int(11) DEFAULT NULL,
  `pinjaman_after` int(11) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `pinalti` int(11) DEFAULT NULL,
  `keterlambatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sikarya__slip_gaji`
--

INSERT INTO `sikarya__slip_gaji` (`slip_id`, `branch_id`, `account_id`, `slip_month`, `nilai_kontrak`, `mengajar`, `mengajar_luar`, `piket`, `pembahasan`, `pembahasan_luar`, `kelebihan_jam`, `created_by`, `created_at`, `updated_at`, `deleted_at`, `pinjaman_before`, `cicilan`, `pinjaman_after`, `tgl_pinjam`, `pinalti`, `keterlambatan`) VALUES
(1, 1, 1, 'March 2017', 4000000, 0, 0, 0, 0, 0, 0, 5, '2017-03-12 16:49:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sys__auth_account_role`
--

CREATE TABLE `sys__auth_account_role` (
  `account_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys__auth_account_role`
--

INSERT INTO `sys__auth_account_role` (`account_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sys__auth_role`
--

CREATE TABLE `sys__auth_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(32) NOT NULL,
  `role_description` varchar(64) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys__auth_role`
--

INSERT INTO `sys__auth_role` (`role_id`, `role_name`, `role_description`, `created_at`) VALUES
(1, 'Super Admin', 'Melakukan semua hal', '2016-10-30 02:51:20'),
(2, 'Admin', 'Monitoring sistem pusat', '2016-10-30 02:51:52'),
(3, 'CS', 'Customer Service', '2016-11-06 07:41:49'),
(4, 'Keuangan', NULL, '2016-11-06 07:41:49'),
(5, 'SDM', 'Sumber Daya Manusia', '2016-11-06 07:41:49'),
(6, 'Psycocare', NULL, '2016-11-06 07:41:49'),
(7, 'Marketing', NULL, '2016-11-06 07:41:49'),
(8, 'P & K', 'Pengajaran dan Kesiswaan', '2016-11-06 07:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `sys__menu`
--

CREATE TABLE `sys__menu` (
  `menu_id` int(11) NOT NULL,
  `menu_parent` int(11) DEFAULT NULL,
  `menu_title` varchar(128) NOT NULL,
  `menu_icon` varchar(128) NOT NULL,
  `menu_url` varchar(255) NOT NULL,
  `order_number` int(11) NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys__menu`
--

INSERT INTO `sys__menu` (`menu_id`, `menu_parent`, `menu_title`, `menu_icon`, `menu_url`, `order_number`, `is_active`) VALUES
(1, NULL, 'Checklist', 'icon-check', 'url/', 1, 1),
(6, 1, 'Isi Checklist', '', 'siswa/pendaftaran', 1, 1),
(20, 1, 'Rekap Checklist', '', 'siswa/listSiswa', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sys__role_menu`
--

CREATE TABLE `sys__role_menu` (
  `role_menu_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys__role_menu`
--

INSERT INTO `sys__role_menu` (`role_menu_id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 1),
(9, 2, 2),
(10, 2, 3),
(11, 2, 4),
(12, 2, 5),
(13, 2, 6),
(14, 2, 7),
(15, 2, 8),
(16, 2, 9),
(17, 2, 10),
(18, 2, 11),
(19, 2, 12),
(20, 2, 13),
(21, 2, 14),
(22, 2, 23),
(23, 2, 16),
(24, 2, 17),
(25, 2, 18),
(26, 2, 19),
(27, 2, 20),
(28, 2, 21),
(29, 6, 16),
(30, 6, 17),
(31, 6, 4),
(32, 7, 5),
(33, 7, 18),
(34, 7, 19),
(35, 2, 22),
(36, 5, 3),
(37, 5, 12),
(38, 5, 14),
(39, 5, 15),
(40, 5, 23),
(41, 3, 6),
(42, 3, 7),
(43, 3, 20),
(44, 3, 21),
(45, 5, 24),
(46, 2, 25),
(47, 2, 26),
(48, 3, 1),
(49, 4, 2),
(50, 4, 8),
(51, 4, 9),
(52, 4, 10),
(53, 2, 27);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actionplan`
--
ALTER TABLE `actionplan`
  ADD PRIMARY KEY (`actionplan_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `checklist_server`
--
ALTER TABLE `checklist_server`
  ADD PRIMARY KEY (`id_checklist`);

--
-- Indexes for table `kas_besar`
--
ALTER TABLE `kas_besar`
  ADD PRIMARY KEY (`id_kb`);

--
-- Indexes for table `kas_kecil`
--
ALTER TABLE `kas_kecil`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `laporan_psycocare`
--
ALTER TABLE `laporan_psycocare`
  ADD PRIMARY KEY (`laporan_id`);

--
-- Indexes for table `list_server`
--
ALTER TABLE `list_server`
  ADD PRIMARY KEY (`id_server`);

--
-- Indexes for table `master__appointment`
--
ALTER TABLE `master__appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `master__branch`
--
ALTER TABLE `master__branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `master__kelas`
--
ALTER TABLE `master__kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `master__kota`
--
ALTER TABLE `master__kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `member__account`
--
ALTER TABLE `member__account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_username` (`account_username`),
  ADD KEY `account_username_2` (`account_username`);

--
-- Indexes for table `member__profile`
--
ALTER TABLE `member__profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `pemasukan_pusat`
--
ALTER TABLE `pemasukan_pusat`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `pembayaran_siswa`
--
ALTER TABLE `pembayaran_siswa`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `profil_siswa`
--
ALTER TABLE `profil_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `proker_psycocare`
--
ALTER TABLE `proker_psycocare`
  ADD PRIMARY KEY (`proker_id`);

--
-- Indexes for table `sikarya__account`
--
ALTER TABLE `sikarya__account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_username` (`account_username`);

--
-- Indexes for table `sikarya__profile`
--
ALTER TABLE `sikarya__profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `sikarya__slip_gaji`
--
ALTER TABLE `sikarya__slip_gaji`
  ADD PRIMARY KEY (`slip_id`);

--
-- Indexes for table `sys__auth_role`
--
ALTER TABLE `sys__auth_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sys__menu`
--
ALTER TABLE `sys__menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `menu_parent` (`menu_parent`),
  ADD KEY `menu_parent_2` (`menu_parent`);

--
-- Indexes for table `sys__role_menu`
--
ALTER TABLE `sys__role_menu`
  ADD PRIMARY KEY (`role_menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actionplan`
--
ALTER TABLE `actionplan`
  MODIFY `actionplan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `checklist_server`
--
ALTER TABLE `checklist_server`
  MODIFY `id_checklist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kas_besar`
--
ALTER TABLE `kas_besar`
  MODIFY `id_kb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `kas_kecil`
--
ALTER TABLE `kas_kecil`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `laporan_psycocare`
--
ALTER TABLE `laporan_psycocare`
  MODIFY `laporan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `list_server`
--
ALTER TABLE `list_server`
  MODIFY `id_server` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master__appointment`
--
ALTER TABLE `master__appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `master__branch`
--
ALTER TABLE `master__branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master__kelas`
--
ALTER TABLE `master__kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master__kota`
--
ALTER TABLE `master__kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `member__account`
--
ALTER TABLE `member__account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `member__profile`
--
ALTER TABLE `member__profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pemasukan_pusat`
--
ALTER TABLE `pemasukan_pusat`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pembayaran_siswa`
--
ALTER TABLE `pembayaran_siswa`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `profil_siswa`
--
ALTER TABLE `profil_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `proker_psycocare`
--
ALTER TABLE `proker_psycocare`
  MODIFY `proker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sikarya__profile`
--
ALTER TABLE `sikarya__profile`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sikarya__slip_gaji`
--
ALTER TABLE `sikarya__slip_gaji`
  MODIFY `slip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sys__auth_role`
--
ALTER TABLE `sys__auth_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sys__menu`
--
ALTER TABLE `sys__menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `sys__role_menu`
--
ALTER TABLE `sys__role_menu`
  MODIFY `role_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `sys__menu`
--
ALTER TABLE `sys__menu`
  ADD CONSTRAINT `parent_id` FOREIGN KEY (`menu_parent`) REFERENCES `sys__menu` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
