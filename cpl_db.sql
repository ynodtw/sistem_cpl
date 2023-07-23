-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2023 pada 19.05
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpl_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cpl`
--

CREATE TABLE `cpl` (
  `id` int(11) NOT NULL,
  `cpl_kd` varchar(255) NOT NULL,
  `cpl_kategori` varchar(255) NOT NULL,
  `cpl_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cpl`
--

INSERT INTO `cpl` (`id`, `cpl_kd`, `cpl_kategori`, `cpl_deskripsi`) VALUES
(1, 'S1', 'Sikap', 'Bertakwa Kepada Tuhan Yang Maha Esa dan Mampu Menunjuka Sikap Religius'),
(2, 'P1', 'Pengetahuan', 'Memahami pengetahuan tentang ilmu kelautan dan/atau teknologi kelautan dan mampu mengaplikasikannya sesuai dengan bidang keilmuannya masing-masing'),
(3, 'KU1', 'Kemampuan Umum', 'Mampu menerapkan pemikiran logis, kritis, sistematis, dan inovatif dalam konteks pengembangan implementasi ilmu pengetahuan dan teknologi yang memperhatikan dan menerapkan nilai humaniora yang sesuai dengan bidang keahliannya.'),
(4, 'KK1', 'Kemampuan Khusus', 'Membangun aplikasi perangkat lunak yang berkaitan dengan pengetahuan ilmu computer'),
(8, 'S2', 'Sikap', 'asdasdasd'),
(9, 'KK2', 'Kemampuan Khusus', 'Lorem'),
(10, 'S4', 'Sikap', 'Lorem');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cplmk`
--

CREATE TABLE `cplmk` (
  `id` int(11) NOT NULL,
  `id_nilai_mk` int(11) NOT NULL,
  `id_cpl` int(11) NOT NULL,
  `n_cplmk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cplmk`
--

INSERT INTO `cplmk` (`id`, `id_nilai_mk`, `id_cpl`, `n_cplmk`) VALUES
(1, 1, 1, 70),
(2, 1, 2, 90),
(3, 1, 3, 67),
(4, 5, 4, 80),
(5, 1, 10, 23),
(6, 5, 1, 89);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `dsn_nid` varchar(255) NOT NULL,
  `dsn_nama` varchar(255) NOT NULL,
  `dsn_fakultas` enum('Teknik') NOT NULL,
  `dsn_jurusan` enum('Teknik Informatika','Sistem Informasi','Teknik Lingkungan','Manajemen Informasi') NOT NULL,
  `dsn_status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `dsn_nid`, `dsn_nama`, `dsn_fakultas`, `dsn_jurusan`, `dsn_status`) VALUES
(1, '0000000001', 'Istiqomah Sumadikarta', 'Teknik', 'Teknik Informatika', 'Aktif'),
(2, '0000000002', 'Bosar Panjaitan', 'Teknik', 'Teknik Informatika', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `jrs_kd` varchar(255) NOT NULL,
  `jrs_nama` varchar(255) NOT NULL,
  `jrs_fakultas` enum('Teknik','Ekonomi','FISIP','Perikanan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `jrs_kd`, `jrs_nama`, `jrs_fakultas`) VALUES
(1, 'TI', 'Teknik Informatika', 'Teknik'),
(2, 'SI', 'Sistem Informasi', 'Teknik'),
(3, 'TL', 'Teknik Lingkungan', 'Teknik'),
(4, 'MI', 'Majanemen Informasi', 'Teknik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `mhs_nim` varchar(255) NOT NULL,
  `mhs_nama` varchar(255) NOT NULL,
  `mhs_fakultas` enum('Teknik') NOT NULL,
  `mhs_jurusan` enum('Teknik Informatika','Sistem Informasi','Teknik Lingkungan','Manajemen Informasi') NOT NULL,
  `mhs_status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `mhs_nim`, `mhs_nama`, `mhs_fakultas`, `mhs_jurusan`, `mhs_status`) VALUES
(1, '011601503125139', 'Dony Tanu Wijaya', 'Teknik', 'Teknik Informatika', 'Aktif'),
(2, '011601503125140', 'DB Unknown', 'Teknik', 'Sistem Informasi', 'Aktif'),
(3, '011601503125141', 'Unknown DB', 'Teknik', 'Teknik Lingkungan', 'Non Aktif'),
(4, '011601503125142', 'Unknown', 'Teknik', 'Teknik Informatika', 'Aktif'),
(6, '011601503125138', 'Tester', 'Teknik', 'Teknik Informatika', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `mk_smt` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `mk_kd` varchar(255) NOT NULL,
  `mk_nama` varchar(255) NOT NULL,
  `mk_sks` int(11) NOT NULL,
  `mk_prasyarat` varchar(255) NOT NULL,
  `mk_keterangan` varchar(255) NOT NULL,
  `bobot_absen` int(11) NOT NULL,
  `bobot_tugas` int(11) NOT NULL,
  `bobot_uts` int(11) NOT NULL,
  `bobot_uas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `mk_smt`, `mk_kd`, `mk_nama`, `mk_sks`, `mk_prasyarat`, `mk_keterangan`, `bobot_absen`, `bobot_tugas`, `bobot_uts`, `bobot_uas`) VALUES
(1, '1', 'UN192003', 'Bahasa Inggris', 2, '', 'Wajib Universitas', 10, 20, 30, 40),
(2, '6', 'TI123006', 'Interaksi Manusia dan Komputer', 3, 'Pemrograman Web', 'Wajib Prodi', 10, 20, 30, 40),
(3, '1', 'UN192006', 'Pancasila', 2, '', 'Wajib Universitas', 10, 20, 30, 40),
(5, '7', 'TI172029', 'Riset Teknologi Informasi', 2, 'Kecerdasan Buatan', '', 10, 20, 30, 40),
(6, '2', 'UN192004', 'Kewarganegaraan', 2, '', 'Wajib Universitas', 10, 20, 30, 40),
(8, '2', 'TI1133012', 'Sistem Digital', 3, '', 'Wajib Prodi', 10, 20, 30, 40),
(9, '3', 'Ti115171', 'Bahasa Inggris Teknik', 2, 'Bahasa Inggris', 'Wajib Prodi', 10, 20, 30, 40),
(10, '3', 'TI133008', 'Jaringan Komputer', 3, 'Komunikasi Data', 'Wajib Prodi', 10, 20, 30, 40),
(11, '4', 'TI113004', 'Sistem Operasi', 3, 'Organisasi Arsitektur dan Komputer', 'Wajib Prodi', 10, 20, 30, 40),
(12, '4', 'TI115119', 'Teori Graf dan Bahasa Automata', 3, 'Matematika DIskrit', 'Wajib Prodi', 10, 20, 30, 40),
(13, '5', 'FT193007', 'Technopreneurship', 3, 'Kewirausahaan', 'Wajib Fakultas', 10, 20, 30, 40),
(14, '5', 'TI115181', 'Grafik Komputer', 3, 'Pemrograman Berorientasi Objek', 'Wajibi Prodi', 10, 20, 30, 40),
(15, '6', 'TI393003', 'Machine Learning', 3, 'Kecerdasan Buatan', 'Wajib Prodi', 10, 20, 30, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_cpl`
--

CREATE TABLE `nilai_cpl` (
  `id` int(11) NOT NULL,
  `id_mhs` int(11) DEFAULT NULL,
  `id_cpl` int(11) DEFAULT NULL,
  `n_cpl` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_cpl`
--

INSERT INTO `nilai_cpl` (`id`, `id_mhs`, `id_cpl`, `n_cpl`) VALUES
(1, 1, 1, 70),
(2, 1, 2, 80),
(3, 2, 1, 57),
(4, 2, 2, 76),
(5, 3, 1, 65),
(6, 3, 2, 87);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_mk`
--

CREATE TABLE `nilai_mk` (
  `id` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `n_absen` int(11) NOT NULL,
  `n_tugas` int(11) NOT NULL,
  `n_uts` int(11) NOT NULL,
  `n_uas` int(11) NOT NULL,
  `n_akumulasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_mk`
--

INSERT INTO `nilai_mk` (`id`, `id_mk`, `id_mhs`, `n_absen`, `n_tugas`, `n_uts`, `n_uas`, `n_akumulasi`) VALUES
(1, 1, 1, 0, 0, 0, 0, 0),
(2, 1, 2, 0, 0, 0, 0, 0),
(3, 1, 3, 0, 0, 0, 0, 0),
(7, 5, 2, 0, 0, 0, 0, 0),
(8, 14, 2, 0, 0, 0, 0, 0),
(22, 1, 6, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `id` int(11) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `tujuan` text NOT NULL,
  `tgl_datang` date NOT NULL,
  `tgl_pulang` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`id`, `nik`, `nama`, `alamat`, `telp`, `photo`, `tujuan`, `tgl_datang`, `tgl_pulang`) VALUES
(4, '576545645465454', 'Rizky Kuntoro', 'pondok aren', '089767685622', '2023-06-02-36740305029700033-437.png', 'main aja', '2023-06-02', '2023-06-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang`
--

CREATE TABLE `tentang` (
  `id` int(11) NOT NULL,
  `nama_aplikasi` varchar(100) DEFAULT NULL,
  `logo_aplikasi` varchar(255) DEFAULT NULL,
  `tentang_aplikasi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tentang`
--

INSERT INTO `tentang` (`id`, `nama_aplikasi`, `logo_aplikasi`, `tentang_aplikasi`) VALUES
(1, 'Aplikasi Evaluasi Capaian Pembelajaran Lulusan', '12578502.png', '<div style=\"\" courier=\"\" new\",=\"\" monospace;=\"\" font-size:=\"\" 14px;=\"\" line-height:=\"\" 19px;=\"\" white-space:=\"\" pre;\"=\"\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque accusantium error temporibus neque eum vero dignissimos facilis! Eaque placeat laborum nisi ea laudantium. Veniam, fugit. Fugiat qui nulla eaque iste?</div>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `role` enum('admin','superadmin','dosen','mahasiswa') NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `photo`, `status`, `role`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(9, 'Super Admin', 'superadmin@mail.com', '$2y$10$5sfoiew1iJ0DLpBTM.O5UOauIYqELVZ3ShqxWLYgKVrQMQy4X9alO', '9-superadmin.png', 'active', 'superadmin', 1, '2023-05-31 11:05:03', 9, '2023-07-16 19:21:53'),
(11, 'Admin', 'admin@mail.com', '$2y$10$BOA2wmETl5an1JgQG4Pnfed4gpWbNxjuPbmLinvvwdlv3nb2dyXlS', '9-superadmin.png', 'active', 'admin', 9, '2023-05-31 14:41:44', 11, '2023-06-04 07:09:19'),
(13, 'Dony Tanu Wijaya', 'donytanuwijaya@gmail.com', '$2y$10$J/4lKLvb.njyBqDh2q.MqOQuj63Xe3zTE61TjT24BaqSK/UI8N8r6', '9-superadmin.jpg', 'active', 'mahasiswa', 9, '2023-07-09 02:15:55', 9, '2023-07-08 21:20:24');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cpl`
--
ALTER TABLE `cpl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cplmk`
--
ALTER TABLE `cplmk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_cpl`
--
ALTER TABLE `nilai_cpl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_mk`
--
ALTER TABLE `nilai_mk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cpl`
--
ALTER TABLE `cpl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `cplmk`
--
ALTER TABLE `cplmk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `nilai_cpl`
--
ALTER TABLE `nilai_cpl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai_mk`
--
ALTER TABLE `nilai_mk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
