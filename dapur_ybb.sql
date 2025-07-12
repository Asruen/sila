-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2025 at 04:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dapur_ybb`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_logs`
--

CREATE TABLE `api_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `table` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `ip_address` text NOT NULL,
  `platform` text NOT NULL,
  `browser` text NOT NULL,
  `activity` text NOT NULL,
  `method_function` text NOT NULL,
  `browser_version` text NOT NULL,
  `is_mobile` text NOT NULL,
  `is_robot` text NOT NULL,
  `is_desktop` text NOT NULL,
  `referer` text NOT NULL,
  `agent_string` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_02_161237_create_presensis_table', 1),
(5, '2024_09_20_022440_create_tb_satuan_table', 1),
(6, '2024_09_20_022546_create_tb_stok_gudang_table', 1),
(7, '2024_09_28_040114_create_komponen_sehat_table', 1),
(8, '2024_09_28_040139_create_tb_resep_table', 1),
(9, '2024_09_28_040834_create_tb_menu_table', 1),
(10, '2024_09_30_025130_create_tb_master_bahan', 1),
(11, '2024_10_03_082247_create_tb_bahan_masak_table', 1),
(12, '2024_10_03_082313_create_tb_menu_bahan_table', 1),
(13, '2025_02_08_043508_create_tb_supplier_table', 1),
(14, '2025_02_08_064123_create_tb_tingkatan_sekolah_table', 1),
(15, '2025_02_09_062301_create_tb_provinsi_table', 1),
(16, '2025_02_09_062801_create_tb_kabkota_table', 1),
(17, '2025_02_09_063300_create_tb_data_dapur_table', 1),
(18, '2025_02_09_070611_create_tb_data_sekolah_table', 1),
(19, '2025_02_10_022013_create_enum_tb_bahan_masak', 1),
(20, '2025_02_10_041226_create_tb_supllier_table', 1),
(21, '2025_02_10_043648_create_enum_tb_stok_gudang', 1),
(22, '2025_02_13_044440_create_tb_karyawan_table', 1),
(23, '2025_02_14_022412_create_tb_cara_masak_table', 1),
(24, '2025_02_20_065434_create_tb_rantang_table', 1),
(25, '2025_02_20_070535_create_tb_ompreng_table', 1),
(26, '2025_02_20_071559_create_api_logs_table', 1),
(27, '2025_02_26_094347_create_tb_ompreng_transaksi', 1),
(28, '2025_02_27_063346_create_tb_inventori_table', 1),
(29, '2025_02_27_063854_create_tb_transaksi_inventori_table', 1),
(30, '2025_02_28_025845_create_rincian_sekolah_table', 1),
(31, '2025_02_28_025946_create_rincian_menu_harian_table', 1),
(32, '2025_03_03_030437_create_tb_pengajuan_dapur_table', 1),
(33, '2025_03_03_030830_create_tb_pengajuan_menu_table', 1),
(34, '2025_03_03_031059_create_tb_pengajuan_po_table', 1),
(35, '2025_03_03_031453_create_tb_approve_pengajuan_po_table', 1),
(36, '2025_03_17_074606_create_tb_menu_hari_ini-table', 1),
(37, '2025_03_19_065017_create_tb_penerima_makan_table', 1),
(38, '2025_03_19_070545_create_tb_penerima_bahan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `tgl` date NOT NULL,
  `jammasuk` time DEFAULT NULL,
  `jamkeluar` time DEFAULT NULL,
  `jamkerja` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rincian_menu_harian`
--

CREATE TABLE `rincian_menu_harian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_menu_harian` int(11) NOT NULL,
  `id_resep` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rincian_sekolah`
--

CREATE TABLE `rincian_sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_menu_harian` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `jumlah_penerima` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_approve_pengajuan_po`
--

CREATE TABLE `tb_approve_pengajuan_po` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_pengajuan` varchar(30) NOT NULL,
  `total_pengajuan` int(11) NOT NULL,
  `status` enum('Pending','Acc','Batal') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bahan_masak`
--

CREATE TABLE `tb_bahan_masak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bahan_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_satuan` bigint(20) UNSIGNED NOT NULL,
  `kategori_bahan` enum('Matang','Mentah') NOT NULL,
  `status_bahan` enum('Aman','Sedikit','Habis') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cara_masak`
--

CREATE TABLE `tb_cara_masak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_menu` bigint(20) UNSIGNED NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `keterangan_menu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_dapur`
--

CREATE TABLE `tb_data_dapur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_dapur` varchar(255) NOT NULL,
  `alamat_dapur` varchar(255) NOT NULL,
  `nomor_dapur` varchar(255) NOT NULL,
  `kota` int(11) NOT NULL,
  `provinsi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_sekolah`
--

CREATE TABLE `tb_data_sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `jenjang_sekolah` bigint(20) UNSIGNED NOT NULL,
  `jumlah_siswa` int(11) NOT NULL,
  `alamat_sekolah` varchar(255) NOT NULL,
  `id_dapur` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventori`
--

CREATE TABLE `tb_inventori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jenis_barang` enum('Ompreng','Rantang','BHP','Alat Masak','Lain Lain') NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kabkota`
--

CREATE TABLE `tb_kabkota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provinsi_id` bigint(20) UNSIGNED NOT NULL,
  `kabupaten_kota` varchar(255) NOT NULL,
  `ibukota` varchar(255) NOT NULL,
  `k_bsni` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_karyawan` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `kontak` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_komponen_sehat`
--

CREATE TABLE `tb_komponen_sehat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `komponen` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_bahan`
--

CREATE TABLE `tb_master_bahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bahan` varchar(30) NOT NULL,
  `gramasi` double(10,2) NOT NULL,
  `satuan_gudang` bigint(20) UNSIGNED NOT NULL,
  `satuan_bahan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu` varchar(30) NOT NULL,
  `karbohidrat` bigint(20) UNSIGNED NOT NULL,
  `protein` bigint(20) UNSIGNED NOT NULL,
  `sayur` bigint(20) UNSIGNED NOT NULL,
  `buah` bigint(20) UNSIGNED NOT NULL,
  `susu` bigint(20) UNSIGNED NOT NULL,
  `nama_pengaju` varchar(255) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `nama_acc` varchar(255) DEFAULT NULL,
  `tanggal_acc` date DEFAULT NULL,
  `status_pengajuan` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `nomor_pengajuan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu_bahan`
--

CREATE TABLE `tb_menu_bahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `bahan_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_satuan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu_hari_ini`
--

CREATE TABLE `tb_menu_hari_ini` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_dapur` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `karbohidrat` varchar(255) NOT NULL,
  `protein` varchar(255) NOT NULL,
  `sayur` varchar(255) NOT NULL,
  `buah` varchar(255) NOT NULL,
  `susu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_menu_hari_ini`
--

INSERT INTO `tb_menu_hari_ini` (`id`, `nomor_dapur`, `tanggal`, `karbohidrat`, `protein`, `sayur`, `buah`, `susu`, `created_at`, `updated_at`) VALUES
(1, 'D126', '2025-03-15', 'Nasi', 'Ayam Bakar', 'Capcay', 'Pepaya', 'Susu Stroberi', '2025-05-07 00:12:25', '2025-05-07 00:12:25'),
(2, 'D125', '2025-03-15', 'Nasi', 'Ayam Bakar', 'Capcay', 'Pepaya', 'Susu coklat', '2025-05-07 00:27:25', '2025-05-07 01:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ompreng`
--

CREATE TABLE `tb_ompreng` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dapur` bigint(20) DEFAULT NULL COMMENT 'id dapur jika diberlakukan untuk masing2 dapur',
  `kode_ompreng` varchar(255) NOT NULL COMMENT 'kode qr untuk ompreng atau rantang',
  `jenis` enum('Ompreng','Rantang') NOT NULL COMMENT 'jenis barang ompreng atau rantang',
  `status` enum('Didapur','Diluar','Rusak/Hilang') NOT NULL DEFAULT 'Didapur' COMMENT 'status barang',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ompreng_transaksi`
--

CREATE TABLE `tb_ompreng_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tb_menu_id` bigint(20) DEFAULT NULL COMMENT 'sementara nullable',
  `kode_rantang` varchar(50) DEFAULT NULL,
  `kode_ompreng` varchar(50) DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `tanggal_keluar` timestamp NULL DEFAULT NULL COMMENT 'tanggal keluar ompreng',
  `tanggal_masuk` timestamp NULL DEFAULT NULL COMMENT 'tanggal masuk ompreng',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'status transaksi 0 = keluar, 1 = sudah kembali',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerima_bahan`
--

CREATE TABLE `tb_penerima_bahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_bahan` varchar(100) NOT NULL,
  `nomor_dapur` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_penerima_bahan`
--

INSERT INTO `tb_penerima_bahan` (`id`, `nama_bahan`, `nomor_dapur`, `tanggal`, `jumlah`, `nama_supplier`, `created_at`, `updated_at`) VALUES
(1, 'Air', 'D123', '2025-03-12', 786, 'Air Gunung', '2025-05-07 00:11:51', '2025-05-07 00:11:51'),
(2, 'Air', 'D123', '2025-03-12', 786, 'Air Gunung', '2025-05-07 00:12:04', '2025-05-07 00:12:04'),
(3, 'Air', 'D123', '2025-03-12', 786, 'Air Gunung', '2025-05-07 00:12:11', '2025-05-07 00:12:11'),
(4, 'Air', 'D126', '2025-03-12', 786, 'Air Gunung', '2025-05-07 00:13:13', '2025-05-07 00:13:13'),
(5, 'Air', 'D126', '2025-03-12', 786, 'Air Gunung', '2025-05-07 00:26:03', '2025-05-07 00:26:03'),
(6, 'Air', 'D126', '2025-03-12', 786, 'Air Gunung', '2025-05-07 00:26:04', '2025-05-07 00:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerima_makan`
--

CREATE TABLE `tb_penerima_makan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_dapur` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_tk_sd_kls3` int(11) NOT NULL,
  `jumlah_sd_kls4_sma` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_penerima_makan`
--

INSERT INTO `tb_penerima_makan` (`id`, `nomor_dapur`, `tanggal`, `jumlah_tk_sd_kls3`, `jumlah_sd_kls4_sma`, `created_at`, `updated_at`) VALUES
(1, 'D124', '2025-03-13', 645, 8343, '2025-05-07 00:12:19', '2025-05-07 00:12:19'),
(2, 'D126', '2025-03-13', 645, 8343, '2025-05-07 00:13:11', '2025-05-07 00:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan_dapur`
--

CREATE TABLE `tb_pengajuan_dapur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_dapur` varchar(30) NOT NULL,
  `status` enum('Pending','Acc','Batal') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan_menu`
--

CREATE TABLE `tb_pengajuan_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_dapur` varchar(30) NOT NULL,
  `status` enum('Pending','Acc','Batal') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan_po`
--

CREATE TABLE `tb_pengajuan_po` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_pengajuan` varchar(30) NOT NULL,
  `total_pengajuan` int(11) NOT NULL,
  `status` enum('Pending','Acc','Batal') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `ibukota` varchar(255) NOT NULL,
  `p_bsni` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rantang`
--

CREATE TABLE `tb_rantang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_dapur` varchar(255) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `status` enum('Diluar','Didapur') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_resep`
--

CREATE TABLE `tb_resep` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_resep` varchar(60) NOT NULL,
  `id_komponen_sehat` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok_gudang`
--

CREATE TABLE `tb_stok_gudang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_satuan` bigint(20) UNSIGNED NOT NULL,
  `kategori_bahan` enum('Matang','Mentah') NOT NULL,
  `status_bahan` enum('Aman','Sedikit','Habis') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_supllier`
--

CREATE TABLE `tb_supllier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_satuan` bigint(20) UNSIGNED NOT NULL,
  `kategori_bahan` varchar(30) NOT NULL,
  `status_bahan` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `jenis_supplier` bigint(20) UNSIGNED NOT NULL,
  `no_telp` int(11) NOT NULL,
  `alamat_supplier` varchar(255) NOT NULL,
  `nama_PIC` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tingkatan_sekolah`
--

CREATE TABLE `tb_tingkatan_sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenjang_sekolah` varchar(255) NOT NULL,
  `golongan` int(11) NOT NULL,
  `gramasi_nasi` double(8,2) NOT NULL,
  `gramasi_sayur` double(8,2) NOT NULL,
  `gramasi_protein` double(8,2) NOT NULL,
  `gramasi_buah` double(8,2) NOT NULL,
  `gramasi_susu` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_inventori`
--

CREATE TABLE `tb_transaksi_inventori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `pic` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Aplikasi', 'admin', 'admin@admin.com', NULL, '$2y$10$hYp2md3EqRnce2fBJcsiPuXWU53Gwk1mbQNVmWn3npx5l8KGA0v76', 'zeF8EXZ9M4tEASTf3dhVe9CMC6VaLIcrUYH7sOB33ZVw5EUJ368IFDzktsfz', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_logs`
--
ALTER TABLE `api_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rincian_menu_harian`
--
ALTER TABLE `rincian_menu_harian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rincian_sekolah`
--
ALTER TABLE `rincian_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_approve_pengajuan_po`
--
ALTER TABLE `tb_approve_pengajuan_po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bahan_masak`
--
ALTER TABLE `tb_bahan_masak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_bahan_masak_bahan_id_foreign` (`bahan_id`),
  ADD KEY `tb_bahan_masak_id_satuan_foreign` (`id_satuan`);

--
-- Indexes for table `tb_cara_masak`
--
ALTER TABLE `tb_cara_masak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_cara_masak_id_menu_foreign` (`id_menu`);

--
-- Indexes for table `tb_data_dapur`
--
ALTER TABLE `tb_data_dapur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_data_sekolah`
--
ALTER TABLE `tb_data_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_inventori`
--
ALTER TABLE `tb_inventori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kabkota`
--
ALTER TABLE `tb_kabkota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_kabkota_provinsi_id_foreign` (`provinsi_id`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_komponen_sehat`
--
ALTER TABLE `tb_komponen_sehat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_master_bahan`
--
ALTER TABLE `tb_master_bahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_master_bahan_satuan_gudang_foreign` (`satuan_gudang`),
  ADD KEY `tb_master_bahan_satuan_bahan_foreign` (`satuan_bahan`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_menu_bahan`
--
ALTER TABLE `tb_menu_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_menu_hari_ini`
--
ALTER TABLE `tb_menu_hari_ini`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ompreng`
--
ALTER TABLE `tb_ompreng`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ompreng_transaksi`
--
ALTER TABLE `tb_ompreng_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penerima_bahan`
--
ALTER TABLE `tb_penerima_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penerima_makan`
--
ALTER TABLE `tb_penerima_makan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengajuan_dapur`
--
ALTER TABLE `tb_pengajuan_dapur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengajuan_menu`
--
ALTER TABLE `tb_pengajuan_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengajuan_po`
--
ALTER TABLE `tb_pengajuan_po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rantang`
--
ALTER TABLE `tb_rantang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_resep`
--
ALTER TABLE `tb_resep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_resep_id_komponen_sehat_foreign` (`id_komponen_sehat`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_stok_gudang`
--
ALTER TABLE `tb_stok_gudang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_stok_gudang_id_satuan_foreign` (`id_satuan`);

--
-- Indexes for table `tb_supllier`
--
ALTER TABLE `tb_supllier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_supplier_jenis_supplier_foreign` (`jenis_supplier`);

--
-- Indexes for table `tb_tingkatan_sekolah`
--
ALTER TABLE `tb_tingkatan_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi_inventori`
--
ALTER TABLE `tb_transaksi_inventori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_logs`
--
ALTER TABLE `api_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rincian_menu_harian`
--
ALTER TABLE `rincian_menu_harian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rincian_sekolah`
--
ALTER TABLE `rincian_sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_approve_pengajuan_po`
--
ALTER TABLE `tb_approve_pengajuan_po`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bahan_masak`
--
ALTER TABLE `tb_bahan_masak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cara_masak`
--
ALTER TABLE `tb_cara_masak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_data_dapur`
--
ALTER TABLE `tb_data_dapur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_data_sekolah`
--
ALTER TABLE `tb_data_sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_inventori`
--
ALTER TABLE `tb_inventori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kabkota`
--
ALTER TABLE `tb_kabkota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_komponen_sehat`
--
ALTER TABLE `tb_komponen_sehat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_master_bahan`
--
ALTER TABLE `tb_master_bahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_menu_bahan`
--
ALTER TABLE `tb_menu_bahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_menu_hari_ini`
--
ALTER TABLE `tb_menu_hari_ini`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_ompreng`
--
ALTER TABLE `tb_ompreng`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_ompreng_transaksi`
--
ALTER TABLE `tb_ompreng_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_penerima_bahan`
--
ALTER TABLE `tb_penerima_bahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_penerima_makan`
--
ALTER TABLE `tb_penerima_makan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengajuan_dapur`
--
ALTER TABLE `tb_pengajuan_dapur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengajuan_menu`
--
ALTER TABLE `tb_pengajuan_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengajuan_po`
--
ALTER TABLE `tb_pengajuan_po`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rantang`
--
ALTER TABLE `tb_rantang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_resep`
--
ALTER TABLE `tb_resep`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_stok_gudang`
--
ALTER TABLE `tb_stok_gudang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_supllier`
--
ALTER TABLE `tb_supllier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tingkatan_sekolah`
--
ALTER TABLE `tb_tingkatan_sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi_inventori`
--
ALTER TABLE `tb_transaksi_inventori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bahan_masak`
--
ALTER TABLE `tb_bahan_masak`
  ADD CONSTRAINT `tb_bahan_masak_bahan_id_foreign` FOREIGN KEY (`bahan_id`) REFERENCES `tb_master_bahan` (`id`),
  ADD CONSTRAINT `tb_bahan_masak_id_satuan_foreign` FOREIGN KEY (`id_satuan`) REFERENCES `tb_satuan` (`id`);

--
-- Constraints for table `tb_cara_masak`
--
ALTER TABLE `tb_cara_masak`
  ADD CONSTRAINT `tb_cara_masak_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `tb_menu` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_kabkota`
--
ALTER TABLE `tb_kabkota`
  ADD CONSTRAINT `tb_kabkota_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `tb_provinsi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_master_bahan`
--
ALTER TABLE `tb_master_bahan`
  ADD CONSTRAINT `tb_master_bahan_satuan_bahan_foreign` FOREIGN KEY (`satuan_bahan`) REFERENCES `tb_satuan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_master_bahan_satuan_gudang_foreign` FOREIGN KEY (`satuan_gudang`) REFERENCES `tb_satuan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_resep`
--
ALTER TABLE `tb_resep`
  ADD CONSTRAINT `tb_resep_id_komponen_sehat_foreign` FOREIGN KEY (`id_komponen_sehat`) REFERENCES `tb_komponen_sehat` (`id`);

--
-- Constraints for table `tb_stok_gudang`
--
ALTER TABLE `tb_stok_gudang`
  ADD CONSTRAINT `tb_stok_gudang_id_satuan_foreign` FOREIGN KEY (`id_satuan`) REFERENCES `tb_satuan` (`id`);

--
-- Constraints for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD CONSTRAINT `tb_supplier_jenis_supplier_foreign` FOREIGN KEY (`jenis_supplier`) REFERENCES `tb_master_bahan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
