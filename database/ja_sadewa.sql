-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Nov 2019 pada 12.48
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ja_sadewa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `role` enum('1','0') NOT NULL DEFAULT '0',
  `Foto` varchar(255) NOT NULL,
  `tokenHash` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `Nama`, `Email`, `Password`, `role`, `Foto`, `tokenHash`) VALUES
(1, 'superadmin', 'lazer.helmi@gmail.com', '$2y$10$xgy8PD8PAEvhSKZOwYYU9.DGEfiB0JmaI.WG..A0A6ewZrZaBXyRK', '1', '1537411239130.jpg', 'mr56FTTPrbqZvpcB5jSwWds1lfnMVNIQAd83zc2WYhaskkJRgJy8oAGOGVbDDH7ePiuZ0jOq0ySCuCU13xhUXmK2Xz49QgiLYFaN'),
(3, 'buntut', 'lalala@GLW.Com', '$2y$10$xgy8PD8PAEvhSKZOwYYU9.DGEfiB0JmaI.WG..A0A6ewZrZaBXyRK', '0', 'default.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_notif`
--

CREATE TABLE `admin_notif` (
  `admin_notif_id` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `id_hubungi` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `terbaca` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_notif`
--

INSERT INTO `admin_notif` (`admin_notif_id`, `waktu`, `id_hubungi`, `id`, `terbaca`) VALUES
(21, '2019-09-02 03:51:54', 'KdH-0001', 1, '1'),
(22, '2019-09-02 03:51:54', 'KdH-0001', 3, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidangkeahlian`
--

CREATE TABLE `bidangkeahlian` (
  `IdBk` int(11) NOT NULL,
  `NamaBk` varchar(125) NOT NULL,
  `IdPengacara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidangkeahlian`
--

INSERT INTO `bidangkeahlian` (`IdBk`, `NamaBk`, `IdPengacara`) VALUES
(40, 'rouuuuu1', 'Kdp-0001'),
(41, 'rouuuuu2', 'Kdp-0001'),
(43, 'boadka', 'Kdp-0002'),
(44, 'makan', 'Kdp-0001'),
(46, 'boii', 'Kdp-0002'),
(47, 'nge-rusuh', 'Kdp-0002'),
(48, 'ropop1', 'Kdp-00-1'),
(49, 'ropop2', 'Kdp-00-1'),
(50, 'ropop3', 'Kdp-00-1'),
(51, 'Makan', 'Kdp-00-1'),
(52, 'Tidur', 'Kdp-00-1'),
(53, 'minum', 'Kdp-00-1'),
(54, 'djasndlasndlas', 'KdP-00-1'),
(55, 'salkdnakldnaskldn1', 'KdP-00-1'),
(56, 'salkdnakldnaskldn2', 'KdP-00-1'),
(57, 'salkdnakldnaskldn3', 'KdP-00-1'),
(58, 'adnas;dasda', 'KdP-0003'),
(59, 'akldnakldn', 'KdP-0003'),
(60, 'asnkldnaskldnakl', 'KdP-0003'),
(61, 'askdnaskdnasdnaslk', 'KdP-0004'),
(62, 'askldnaskdnasldna', 'KdP-0004'),
(63, 'asdaskjdbasjkdb', 'KdP-0004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapenunjang`
--

CREATE TABLE `datapenunjang` (
  `IdDP` int(11) NOT NULL,
  `File` text NOT NULL,
  `IdKlien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datapenunjang`
--

INSERT INTO `datapenunjang` (`IdDP`, `File`, `IdKlien`) VALUES
(64, 'bookmark3.txt', 'IdK-0002'),
(66, 'bookmark4.txt', 'IdK-0002'),
(67, 'mydr4.txt', 'IdK-0002'),
(68, 'bookmark5.txt', 'IdK-0002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailsidang`
--

CREATE TABLE `detailsidang` (
  `idDSidang` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `IdSidang` int(11) NOT NULL,
  `IdPengacara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailsidang`
--

INSERT INTO `detailsidang` (`idDSidang`, `keterangan`, `tanggal`, `tempat`, `IdSidang`, `IdPengacara`) VALUES
(5, 'sidang pertqama', '2019-08-14', 'bandung', 1, 'KdP-0001'),
(15, 'Sebuah Seni untuk Bersikap Bodo Amat', '2018-02-05', 'Mark Manson', 1, ''),
(16, 'Menghafal Al-Qur`an dengan Otak Kanan', '2018-07-16', 'Tanzil Khaerul Akbar, Ardi Gunawan', 1, ''),
(17, 'Bicara Itu Ada Seninya', '2018-04-30', 'Oh Su Hyang', 1, ''),
(18, 'persidangan ke-1', '2019-09-09', 'bandung', 1, ''),
(19, 'persidangan ke-2', '2019-09-09', 'bandung', 1, ''),
(20, 'persidangan ke-3', '2019-09-09', 'bandung', 1, ''),
(21, 'persidangan ke-4', '2019-09-09', 'bandung', 1, ''),
(22, 'persidangan ke-1', '2019-09-09', 'bandung', 1, ''),
(23, 'persidangan ke-2', '2019-09-09', 'bandung', 1, ''),
(24, 'persidangan ke-3', '2019-09-09', 'bandung', 1, ''),
(25, 'persidangan ke-4', '2019-09-09', 'bandung', 1, ''),
(26, 'persidangan ke-1', '2019-09-09', 'bandung', 1, 'KdP-0001'),
(27, 'persidangan ke-2', '2019-09-09', 'bandung', 1, 'KdP-0001'),
(28, 'persidangan ke-3', '2019-09-09', 'bandung', 1, 'KdP-0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungi`
--

CREATE TABLE `hubungi` (
  `id_hubungi` varchar(255) NOT NULL,
  `nama` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `kategori`, `pesan`) VALUES
('KdH-0001', 'Naruto', 'lazer.helmi@gmail.com', 'Keluarga', 'hokage!!!!!!!!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klien`
--

CREATE TABLE `klien` (
  `IdKlien` varchar(255) NOT NULL,
  `NamaKlien` varchar(100) NOT NULL,
  `EmailKlien` varchar(100) NOT NULL,
  `JkKlien` enum('L','P') NOT NULL,
  `NoTelpKlien` varchar(20) NOT NULL,
  `AlamatKlien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `klien`
--

INSERT INTO `klien` (`IdKlien`, `NamaKlien`, `EmailKlien`, `JkKlien`, `NoTelpKlien`, `AlamatKlien`) VALUES
('IdK-0002', 'bodiii', 'bodiii@bodiii.bod', 'P', 'bodiii', 'bodiii');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengacara`
--

CREATE TABLE `pengacara` (
  `IdPengacara` varchar(255) NOT NULL,
  `IdPengacaraHash` varchar(200) NOT NULL,
  `NamaPengacara` varchar(125) NOT NULL,
  `Email` varchar(125) NOT NULL,
  `NoHp` varchar(13) NOT NULL,
  `Jk` enum('L','P') NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `pengalaman` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengacara`
--

INSERT INTO `pengacara` (`IdPengacara`, `IdPengacaraHash`, `NamaPengacara`, `Email`, `NoHp`, `Jk`, `Foto`, `keterangan`, `pendidikan`, `pengalaman`, `password`) VALUES
('KdP-0001', 'XXhYV8cHxOwF4oGNpBdvIBL8uis1g3PC5UeN2OnyW4yVMzcmjs2f0wr9l67YgP9lIbfA3kkC7RpzRWFnEZaZEiJh6JoTSKmtSaqx', 'Blick', 'lazer.helmi12@gmail.com', '086768909555', 'L', 'a3M3MpD9_700w_01.jpg', 'apa?', 'Galaxy S10 plus', 'ya', '$2y$10$6Oi6VZpJ63fs1N9WpLR5luPU3nUDadifezmZmkRSkXipjFVLSv6hu'),
('KdP-0002', 'CoXZYyTtXyjPxOnhPIeGHHDpqW8dxWTLkqS50m4s4UUiKlZFGgLJRufpiBA9E6tIJQRos8bY59zfM23w21vr7dBnNVaNMkhamEFA', 'bobi', 'bobib@ga.cww', '086768909533', 'L', 'a3M3MpD9_700w_02.jpg', 'makan dan minum', 'ya', 'iua', '$2y$10$Sgo9E0h3HQVcJTGMPIynJeveSKX9qvNjD4Zep3eJrWmvjG0e9kM3a'),
('KdP-0003', '', 'asmd;asmd;asmda', 'lazer.12helmi@gm12l.com', '086768909410', 'L', '1532584085612.jpg', 'asmdnaslkdnasln', 'ansdklasndklasnkl', 'kasndkaskldna', '$2y$10$IKmYrOuBcwaLkNLikxSn/OJZe7WrAj4zXLfLNugZyxde0Oy4gHe02'),
('KdP-0004', '', 'mmmmmmmmmmmm', 'lazer.helmi@gmail.ciss', '086768904404', 'L', '415952.jpg', 'askjdbasjdbasjkdbasj', 'asjkdbasjdbasjdbaj', 'asbdjkasbdjkasbas', '$2y$10$P7iGSJxfXTM81XUEPctdV.imfrUyMWNwJZ42XlxwDuw6z3ncar5RW');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengacara_notif`
--

CREATE TABLE `pengacara_notif` (
  `pengacara_notif_id` int(11) NOT NULL,
  `id_hubungi` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `IdPengacara` varchar(255) NOT NULL,
  `terbaca` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengacara_notif`
--

INSERT INTO `pengacara_notif` (`pengacara_notif_id`, `id_hubungi`, `waktu`, `IdPengacara`, `terbaca`) VALUES
(29, 'KdH-0001', '2019-09-02 03:51:54', 'KdP-0001', '0'),
(30, 'KdH-0001', '2019-09-02 03:51:54', 'KdP-0002', '0'),
(31, 'KdH-0001', '2019-09-02 03:51:54', 'KdP-0003', '0'),
(32, 'KdH-0001', '2019-09-02 03:51:54', 'KdP-0004', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sidang`
--

CREATE TABLE `sidang` (
  `IdSidang` int(11) NOT NULL,
  `IdKlien` varchar(255) NOT NULL,
  `JenisPerkara` varchar(255) NOT NULL,
  `Lawan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sidang`
--

INSERT INTO `sidang` (`IdSidang`, `IdKlien`, `JenisPerkara`, `Lawan`) VALUES
(1, 'IdK-0002', 'Bisnis', 'bobi1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin_notif`
--
ALTER TABLE `admin_notif`
  ADD PRIMARY KEY (`admin_notif_id`);

--
-- Indeks untuk tabel `bidangkeahlian`
--
ALTER TABLE `bidangkeahlian`
  ADD PRIMARY KEY (`IdBk`);

--
-- Indeks untuk tabel `datapenunjang`
--
ALTER TABLE `datapenunjang`
  ADD PRIMARY KEY (`IdDP`);

--
-- Indeks untuk tabel `detailsidang`
--
ALTER TABLE `detailsidang`
  ADD PRIMARY KEY (`idDSidang`);

--
-- Indeks untuk tabel `hubungi`
--
ALTER TABLE `hubungi`
  ADD PRIMARY KEY (`id_hubungi`);

--
-- Indeks untuk tabel `klien`
--
ALTER TABLE `klien`
  ADD PRIMARY KEY (`IdKlien`);

--
-- Indeks untuk tabel `pengacara`
--
ALTER TABLE `pengacara`
  ADD PRIMARY KEY (`IdPengacara`);

--
-- Indeks untuk tabel `pengacara_notif`
--
ALTER TABLE `pengacara_notif`
  ADD PRIMARY KEY (`pengacara_notif_id`);

--
-- Indeks untuk tabel `sidang`
--
ALTER TABLE `sidang`
  ADD PRIMARY KEY (`IdSidang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `admin_notif`
--
ALTER TABLE `admin_notif`
  MODIFY `admin_notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `bidangkeahlian`
--
ALTER TABLE `bidangkeahlian`
  MODIFY `IdBk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `datapenunjang`
--
ALTER TABLE `datapenunjang`
  MODIFY `IdDP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `detailsidang`
--
ALTER TABLE `detailsidang`
  MODIFY `idDSidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `pengacara_notif`
--
ALTER TABLE `pengacara_notif`
  MODIFY `pengacara_notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `sidang`
--
ALTER TABLE `sidang`
  MODIFY `IdSidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
