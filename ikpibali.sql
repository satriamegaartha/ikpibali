-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 09:22 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikpibali`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `nra` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `brevet` varchar(2) NOT NULL,
  `sk` varchar(255) NOT NULL,
  `kip` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nra`, `nama`, `brevet`, `sk`, `kip`, `alamat`, `email`, `password`, `notelp`, `profile`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'A', 'administrator', 'administrator', 'administrator', 'admin@administrator.com', 'admin', '0', 'profile.jpg', '2021-11-01 01:34:38', NULL),
(123, 'blanca', 'A', '123', '123', 'denpasar', 'blankamade@gmail.com', '123', '082247949140', 'administrator.png', '2021-11-03 01:34:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `forum_fgd`
--

CREATE TABLE `forum_fgd` (
  `id_forumfgd` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_peraturan` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_fgd`
--

INSERT INTO `forum_fgd` (`id_forumfgd`, `judul`, `slug`, `konten`, `id_user`, `id_peraturan`, `status`, `created_at`, `updated_at`) VALUES
(14, 'contoh peraturan baru', 'contoh-peraturan-baru', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium incidunt suscipit veritatis magnam cupiditate adipisci, ab necessitatibus ducimus tempore deleniti repudiandae dolore aut commodi hic distinctio. Obcaecati soluta quidem corrupti.\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium incidunt suscipit veritatis magnam cupiditate adipisci, ab necessitatibus ducimus tempore deleniti repudiandae dolore aut commodi hic distinctio. Obcaecati soluta quidem corrupti.\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium incidunt suscipit veritatis magnam cupiditate adipisci, ab necessitatibus ducimus tempore deleniti repudiandae dolore aut commodi hic distinctio. Obcaecati soluta qu\r\nidem corrupti.', 1, 0, 'Active', '2021-12-20 04:38:37', '2021-12-20 19:51:23'),
(15, 'peraturan baru', 'peraturan-baru', 'konten 2', 1, 8, 'Active', '2021-12-20 04:38:45', '2021-12-21 00:24:44'),
(17, 'a', 'a', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum tenetur quam aut, voluptates repudiandae quae id dignissimos, cum numquam quibusdam minus. Quaerat hic repudiandae quam laudantium sed nam a aliquam.Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum tenetur quam aut, voluptates repudiandae quae id dignissimos, cum numquam quibusdam minus. Quaerat hic repudiandae quam laudantium sed nam a aliquam.Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum tenetur quam aut, voluptates repudiandae quae id dignissimos, cum numquam quibusdam minus. Quaerat hic repudiandae quam laudantium sed nam a aliquam.Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum tenetur quam aut, voluptates repudiandae quae id dignissimos, cum numquam quibusdam minus. Quaerat hic repudiandae quam laudantium sed nam a aliquam.Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum tenetur quam aut, voluptates repudiandae quae id dignissimos, cum numquam quibusdam minus. Quaerat hic repudiandae quam laudantium sed nam a aliquam.Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum tenetur quam aut, voluptates repudiandae quae id dignissimos, cum numquam quibusdam minus. Quaerat hic repudiandae quam laudantium sed nam a aliquam.', 1, 7, 'Active', '2021-12-21 03:04:38', '2021-12-21 00:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_fgd`
--

CREATE TABLE `komentar_fgd` (
  `id_komentarfgd` int(11) NOT NULL,
  `konten` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_forumfgd` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar_fgd`
--

INSERT INTO `komentar_fgd` (`id_komentarfgd`, `konten`, `id_user`, `id_forumfgd`, `parent`, `created_at`, `updated_at`) VALUES
(2, 'komentar 2', 1, 14, 0, '2021-12-21 04:02:47', '2021-12-21 05:02:47'),
(4, 'komentar 4\r\n', 123, 14, 0, '2021-12-21 04:04:42', '2021-12-21 05:04:42'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur rutrum condimentum. Donec blandit, purus eu tristique sodales, quam sapien malesuada nisl, in luctus orci tortor at metus. Cras mollis aliquet nisi pulvinar congue. Sed in ligula in leo aliquet placerat. Ut tempor tristique neque, id pretium quam. Ut dignissim sit amet justo vitae porta. Maecenas et semper mi. Pellentesque et pulvinar ante. Pellentesque commodo augue ut velit sagittis, eget volutpat dolor fringilla. Donec lobortis egestas dictum. Curabitur eget fringilla purus. Curabitur elementum sollicitudin nisi, quis feugiat elit sollicitudin eget. Mauris in rutrum nisl, at dignissim sem.\r\n\r\n\r\n\r\nEtiam vel felis sit amet ante auctor dictum id ut dolor. Mauris efficitur leo elit. Donec et gravida tortor. Quisque blandit odio vitae pretium maximus. Vestibulum gravida nisi nec commodo ultricies. Maecenas ipsum ligula, ultricies quis egestas ac, consequat et augue. Morbi ac purus sagittis, pretium erat ac, consequat nisl. Aenean eleifend molestie augue eu rutrum. Duis varius lectus a pulvinar venenatis. Cras vulputate sodales porta. Pellentesque non lacus erat. Nam at condimentum nunc. Suspendisse potenti. Cras viverra molestie justo, non dapibus ante imperdiet sit amet. Vivamus non pharetra lectus, et viverra dolor.', 123, 14, 0, '2021-12-21 04:05:00', '2021-12-21 05:05:00'),
(6, 'komentar 6', 123, 15, 0, '2021-12-21 04:05:25', '2021-12-21 05:05:25'),
(8, 'balasan kedua', 1, 14, 5, '2021-12-21 04:46:47', '2021-12-21 05:46:47'),
(9, 'balasan ketiga', 123, 14, 4, '2021-12-21 04:51:27', '2021-12-21 05:51:27'),
(11, 'balasan satria', 123, 14, 5, '2021-12-21 07:29:30', '2021-12-21 08:29:30'),
(16, 'balasan ketujuh', 1, 14, 5, '2021-12-21 08:10:27', '2021-12-21 09:10:27'),
(17, 'balasan kedelapan', 1, 14, 5, '2021-12-21 08:10:31', '2021-12-21 09:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `notelp` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nama`, `alamat`, `email`, `password`, `notelp`, `created_at`, `updated_at`) VALUES
('U0001', 'Member 1', 'denpasar', 'member1@gmail.com', '123', '08123123123', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('U0002', 'Member 2', 'gianyar', 'member2@gmail.com', '123', '08123123123', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `peraturan`
--

CREATE TABLE `peraturan` (
  `id_peraturan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL,
  `forum_fgd` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peraturan`
--

INSERT INTO `peraturan` (`id_peraturan`, `nama`, `keterangan`, `file`, `status`, `forum_fgd`, `created_at`, `updated_at`) VALUES
(0, 'contoh peraturan baru', 'ini contoh peraturan baru', '', 'Aktif', 1, '2021-11-16 02:22:38', '2021-11-17 01:07:36'),
(7, 'a', 'A', '', 'menunggu', 1, '2021-11-11 09:54:11', '0000-00-00 00:00:00'),
(8, 'peraturan baru', 'ini adalah keterangan', '', 'menunggu', 1, '2021-11-15 15:04:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `postingan`
--

CREATE TABLE `postingan` (
  `id_postingan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar1` varchar(255) DEFAULT NULL,
  `gambar2` varchar(255) DEFAULT NULL,
  `gambar3` varchar(255) DEFAULT NULL,
  `gambar4` varchar(255) DEFAULT NULL,
  `gambar5` varchar(255) DEFAULT NULL,
  `gambar6` varchar(255) DEFAULT NULL,
  `gambar7` varchar(255) DEFAULT NULL,
  `gambar8` varchar(255) DEFAULT NULL,
  `gambar9` varchar(255) DEFAULT NULL,
  `gambar10` varchar(255) DEFAULT NULL,
  `gambar11` varchar(255) DEFAULT NULL,
  `gambar12` varchar(255) DEFAULT NULL,
  `gambar13` varchar(255) DEFAULT NULL,
  `gambar14` varchar(255) DEFAULT NULL,
  `gambar15` varchar(255) DEFAULT NULL,
  `keterangan1` varchar(255) DEFAULT NULL,
  `keterangan2` varchar(255) DEFAULT NULL,
  `keterangan3` varchar(255) DEFAULT NULL,
  `keterangan4` varchar(255) DEFAULT NULL,
  `keterangan5` varchar(255) DEFAULT NULL,
  `keterangan6` varchar(255) DEFAULT NULL,
  `keterangan7` varchar(255) DEFAULT NULL,
  `keterangan8` varchar(255) DEFAULT NULL,
  `keterangan9` varchar(255) DEFAULT NULL,
  `keterangan10` varchar(255) DEFAULT NULL,
  `keterangan11` varchar(255) DEFAULT NULL,
  `keterangan12` varchar(255) DEFAULT NULL,
  `keterangan13` varchar(255) DEFAULT NULL,
  `keterangan14` varchar(255) DEFAULT NULL,
  `keterangan15` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postingan`
--

INSERT INTO `postingan` (`id_postingan`, `tanggal`, `nama`, `keterangan`, `gambar1`, `gambar2`, `gambar3`, `gambar4`, `gambar5`, `gambar6`, `gambar7`, `gambar8`, `gambar9`, `gambar10`, `gambar11`, `gambar12`, `gambar13`, `gambar14`, `gambar15`, `keterangan1`, `keterangan2`, `keterangan3`, `keterangan4`, `keterangan5`, `keterangan6`, `keterangan7`, `keterangan8`, `keterangan9`, `keterangan10`, `keterangan11`, `keterangan12`, `keterangan13`, `keterangan14`, `keterangan15`, `created_at`, `updated_at`) VALUES
(72, '2021-11-19', 'post 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis euismod velit ipsum, et faucibus ligula maximus id. Phasellus id accumsan ligula, vel accumsan dolor. Suspendisse nisl lectus, volutpat interdum viverra a, efficitur id odio. Nunc condimentum placerat mauris sit amet accumsan. Vestibulum volutpat lorem ac facilisis imperdiet. Sed vehicula leo a diam sodales, nec congue odio laoreet. Nulla vehicula nec nulla sit amet porta. Duis tincidunt, leo vel scelerisque maximus, felis turpis scelerisque velit, a facilisis purus turpis interdum lacus. Integer semper urna dui, sit amet fringilla elit luctus vitae. Donec suscipit nunc ac diam interdum, in hendrerit dolor bibendum.', '19-11-2021_04-58-37-simple_stripe_pattern-781.jpg', '', '', '19-11-2021_04-53-40-flat-simple-wallpaper-8.jpeg', '19-11-2021_04-27-57-img5.jpg', '19-11-2021_04-27-57-img6.jpg', '19-11-2021_04-27-57-img7.jpg', '19-11-2021_04-27-57-img8.jpg', '19-11-2021_04-27-57-img9.jpg', '19-11-2021_04-27-57-img10.jpg', '19-11-2021_04-27-57-img11.jpg', '19-11-2021_04-27-57-img12.jpg', '19-11-2021_04-27-57-img13.jpg', '19-11-2021_04-27-57-img14.jpg', '', '', '', '', 'adf4', 'adf5', 'adf6', 'adf7', 'adf8', 'adf9', 'adf10', 'adf11', 'adf12', 'adf13', 'adf14', '', '2021-11-19 04:27:57', '2021-11-19 04:58:37'),
(73, '2021-11-19', 'post 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis euismod velit ipsum, et faucibus ligula maximus id. Phasellus id accumsan ligula, vel accumsan dolor. Suspendisse nisl lectus, volutpat interdum viverra a, efficitur id odio. Nunc condimentum placerat mauris sit amet accumsan. Vestibulum volutpat lorem ac facilisis imperdiet. Sed vehicula leo a diam sodales, nec congue odio laoreet. Nulla vehicula nec nulla sit amet porta. Duis tincidunt, leo vel scelerisque maximus, felis turpis scelerisque velit, a facilisis purus turpis interdum lacus. Integer semper urna dui, sit amet fringilla elit luctus vitae. Donec suscipit nunc ac diam interdum, in hendrerit dolor bibendum.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis euismod velit ipsum, et faucibus ligula maximus id. Phasellus id accumsan ligula, vel accumsan dolor. Suspendisse nisl lectus, volutpat interdum viverra a, efficitur id odio. Nunc condimentum placerat mauris sit amet accumsan. Vestibulum volutpat lorem ac facilisis imperdiet. Sed vehicula leo a diam sodales, nec congue odio laoreet. Nulla vehicula nec nulla sit amet porta. Duis tincidunt, leo vel scelerisque maximus, felis turpis scelerisque velit, a facilisis purus turpis interdum lacus. Integer semper urna dui, sit amet fringilla elit luctus vitae. Donec suscipit nunc ac diam interdum, in hendrerit dolor bibendum.', '19-11-2021_05-03-09-img1.jpg', '19-11-2021_05-02-46-flat-simple-wallpaper-8.jpeg', '19-11-2021_05-01-34-img3.jpg', '19-11-2021_05-01-34-img4.jpg', '19-11-2021_05-01-34-img5.jpg', '19-11-2021_05-01-34-img6.jpg', '19-11-2021_05-01-34-img7.jpg', '19-11-2021_05-01-34-img8.jpg', '19-11-2021_05-01-34-img9.jpg', '19-11-2021_05-01-34-img10.jpg', '19-11-2021_05-01-34-img11.jpg', '19-11-2021_05-01-34-img12.jpg', '19-11-2021_05-01-34-img13.jpg', '19-11-2021_05-01-34-img14.jpg', '19-11-2021_05-01-34-img15.jpg', 'adf1', 'adf2', '', 'adf4', 'adf5', 'adf6', 'adf7', 'adf8', 'adf9', 'adf10', 'adf11', 'adf12', 'adf13', 'adf14', 'adf15', '2021-11-19 05:01:34', '2021-11-19 05:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `ppl`
--

CREATE TABLE `ppl` (
  `id_ppl` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_ppl` date NOT NULL,
  `tanggal_pendaftaran_buka` date NOT NULL,
  `tanggal_pendaftaran_tutup` date NOT NULL,
  `jumlah_peserta_anggota` int(11) NOT NULL,
  `jumlah_peserta_user` int(11) NOT NULL,
  `harga_pendaftaran` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ppl`
--

INSERT INTO `ppl` (`id_ppl`, `nama`, `tanggal_ppl`, `tanggal_pendaftaran_buka`, `tanggal_pendaftaran_tutup`, `jumlah_peserta_anggota`, `jumlah_peserta_user`, `harga_pendaftaran`, `gambar`, `keterangan`, `created_at`, `updated_at`) VALUES
(15, 'Test PPL 1', '2021-12-25', '2021-12-18', '2021-12-24', 0, 0, 500000, '12-12-2021_03-19-20.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra in mauris ut ornare. Nam tempus mi ac eros ultrices rutrum. Vivamus congue, odio ac fermentum pulvinar, dolor ante dictum quam, vitae volutpat libero augue nec sem. Curabitur imperdiet pretium velit, vitae porttitor erat convallis nec. Pellentesque est quam, eleifend a efficitur sit amet, accumsan vulputate erat. Fusce et accumsan erat. Etiam tellus ipsum, luctus sit amet leo eu, porta rhoncus lectus. Donec volutpat, mi ac malesuada ultrices, felis nibh fermentum lectus, sed semper mi felis vel eros. Mauris dignissim ipsum id enim mollis mollis. Fusce interdum, tellus eget malesuada porta, eros magna aliquam nisi, sed accumsan massa purus eu quam. Sed rutrum condimentum nibh in lobortis. Nulla tristique tincidunt eros, id consectetur enim mattis at. Maecenas in tempus massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\nUt purus leo, sagittis sodales sem nec, hendrerit ornare dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In hac habitasse platea dictumst. Proin tellus augue, venenatis convallis fringilla at, imperdiet ac augue. Proin non porta arcu, a ultrices nulla. Pellentesque rhoncus mattis erat nec gravida. Sed tristique consectetur turpis eget tristique. Fusce leo velit, blandit ac sem venenatis, semper vulputate magna. Sed suscipit dui nibh, in commodo elit feugiat non. Maecenas vel quam et enim facilisis placerat in id nulla. Pellentesque tincidunt dignissim tincidunt. Nam fringilla nunc massa, vitae rhoncus quam sollicitudin in. Proin lacus odio, ultricies at sapien nec, venenatis condimentum dolor. Aenean eget sodales odio, eget vehicula massa.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Test PPL 2', '2021-12-31', '2021-12-25', '2021-12-30', 0, 0, 350000, '12-12-2021_03-20-44.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra in mauris ut ornare. Nam tempus mi ac eros ultrices rutrum. Vivamus congue, odio ac fermentum pulvinar, dolor ante dictum quam, vitae volutpat libero augue nec sem. Curabitur imperdiet pretium velit, vitae porttitor erat convallis nec. Pellentesque est quam, eleifend a efficitur sit amet, accumsan vulputate erat. Fusce et accumsan erat. Etiam tellus ipsum, luctus sit amet leo eu, porta rhoncus lectus. Donec volutpat, mi ac malesuada ultrices, felis nibh fermentum lectus, sed semper mi felis vel eros. Mauris dignissim ipsum id enim mollis mollis. Fusce interdum, tellus eget malesuada porta, eros magna aliquam nisi, sed accumsan massa purus eu quam. Sed rutrum condimentum nibh in lobortis. Nulla tristique tincidunt eros, id consectetur enim mattis at. Maecenas in tempus massa. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n\r\nUt purus leo, sagittis sodales sem nec, hendrerit ornare dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In hac habitasse platea dictumst. Proin tellus augue, venenatis convallis fringilla at, imperdiet ac augue. Proin non porta arcu, a ultrices nulla. Pellentesque rhoncus mattis erat nec gravida. Sed tristique consectetur turpis eget tristique. Fusce leo velit, blandit ac sem venenatis, semper vulputate magna. Sed suscipit dui nibh, in commodo elit feugiat non. Maecenas vel quam et enim facilisis placerat in id nulla. Pellentesque tincidunt dignissim tincidunt. Nam fringilla nunc massa, vitae rhoncus quam sollicitudin in. Proin lacus odio, ultricies at sapien nec, venenatis condimentum dolor. Aenean eget sodales odio, eget vehicula massa.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'test ppl kadaluarsa', '2021-12-04', '2021-12-01', '2021-12-03', 0, 0, 500000, '12-12-2021_03-40-11.jpg', 'lorem', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ppluser`
--

CREATE TABLE `ppluser` (
  `id` int(11) NOT NULL,
  `id_ppl` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga_pendaftaran` int(11) NOT NULL,
  `id_pendaftar` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `status_pembayaran` varchar(255) NOT NULL,
  `bukti_transfer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ppluser`
--

INSERT INTO `ppluser` (`id`, `id_ppl`, `nama`, `harga_pendaftaran`, `id_pendaftar`, `role`, `tanggal_daftar`, `status_pembayaran`, `bukti_transfer`) VALUES
(30, 16, 'Test PPL 2', 350000, '1', 'Anggota', '2021-12-13', 'Belum Upload', ''),
(31, 15, 'Test PPL 1', 500000, '1', 'Anggota', '2021-12-13', 'Success', '13-12-2021_14-48-04.jpg'),
(32, 15, 'Test PPL 1', 500000, 'U0001', 'Member', '2021-12-13', 'Success', '13-12-2021_14-47-35.jpg'),
(33, 16, 'Test PPL 2', 350000, 'U0001', 'Member', '2021-12-13', 'Pending', '13-12-2021_14-47-48.jpg'),
(34, 15, 'Test PPL 1', 500000, '123', 'Anggota', '2021-12-13', 'Belum Upload', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nra`);

--
-- Indexes for table `forum_fgd`
--
ALTER TABLE `forum_fgd`
  ADD PRIMARY KEY (`id_forumfgd`);

--
-- Indexes for table `komentar_fgd`
--
ALTER TABLE `komentar_fgd`
  ADD PRIMARY KEY (`id_komentarfgd`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `peraturan`
--
ALTER TABLE `peraturan`
  ADD PRIMARY KEY (`id_peraturan`);

--
-- Indexes for table `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id_postingan`);

--
-- Indexes for table `ppl`
--
ALTER TABLE `ppl`
  ADD PRIMARY KEY (`id_ppl`);

--
-- Indexes for table `ppluser`
--
ALTER TABLE `ppluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `nra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23132;

--
-- AUTO_INCREMENT for table `forum_fgd`
--
ALTER TABLE `forum_fgd`
  MODIFY `id_forumfgd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `komentar_fgd`
--
ALTER TABLE `komentar_fgd`
  MODIFY `id_komentarfgd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `peraturan`
--
ALTER TABLE `peraturan`
  MODIFY `id_peraturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id_postingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `ppl`
--
ALTER TABLE `ppl`
  MODIFY `id_ppl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ppluser`
--
ALTER TABLE `ppluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
