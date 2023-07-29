-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2023 pada 01.51
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
-- Struktur dari tabel `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(255) NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `no_telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `biodata`
--

INSERT INTO `biodata` (`id`, `users_id`, `nik`, `tempat_lahir`, `tgl_lahir`, `agama`, `kewarganegaraan`, `jenis_kelamin`, `no_telp`) VALUES
(1, 13, '3147010906960002', 'Jakarta', '1996-06-09', 'Islam', 'Indonesia', 'laki-laki', '085860037837'),
(2, 9, '3147010906960003', 'Jakarta', '1996-06-09', 'Islam', 'Indonesia', 'laki-laki', '085860037837');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cpl`
--

CREATE TABLE `cpl` (
  `id` int(11) NOT NULL,
  `cpl_kd` varchar(255) NOT NULL,
  `cpl_kategori` enum('Sikap','Pengetahuan','Keterampilan Umum','Keterampilan Khusus') NOT NULL,
  `cpl_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cpl`
--

INSERT INTO `cpl` (`id`, `cpl_kd`, `cpl_kategori`, `cpl_deskripsi`) VALUES
(1, 'S01', 'Sikap', 'Bertakwa Kepada Tuhan Yang Maha Esa dan Mampu Menunjuka Sikap Religius'),
(2, 'P01', 'Pengetahuan', 'Memahami pengetahuan tentang ilmu kelautan dan/atau teknologi kelautan dan mampu mengaplikasikannya sesuai dengan bidang keilmuannya masing-masing'),
(3, 'KU01', 'Keterampilan Umum', 'Mampu menerapkan pemikiran logis, kritis, sistematis, dan inovatif dalam konteks pengembangan implementasi ilmu pengetahuan dan teknologi yang memperhatikan dan menerapkan nilai humaniora yang sesuai dengan bidang keahliannya.'),
(4, 'KK01', 'Keterampilan Khusus', 'Membangun aplikasi perangkat lunak yang berkaitan dengan pengetahuan ilmu computer'),
(8, 'S02', 'Sikap', 'Menjunjung tinggi nilai kemanusiaan dalam menjalankan tugas berdasarkan agama,moral, dan etika'),
(9, 'KK02', 'Keterampilan Khusus', 'Menulis kode yang diperlukan untuk digunakan sebagai instruksi dalam membangun aplikasi komputer pada berbagai platform'),
(10, 'S04', 'Sikap', 'Berperan sebagai warga negara yang bangga dan cinta tanah air, memiliki nasionalisme serta rasa tanggungjawab pada negara dan bangsa'),
(11, 'S09', 'Sikap', 'Menunjukkan sikap bertanggungjawab atas pekerjaan di bidang keahliannya secara mandiri'),
(12, 'KU03', 'Keterampilan Umum', 'Mampu mengkaji implikasi pengembangan atau implementasi ilmu pengetahuan teknologi yang memperhatikan dan menerapkan nilai humaniora sesuai dengan keahliannya berdasarkan kaidah, tata cara dan etika ilmiah dalam rangka menghasilkan solusi, gagasan, desain atau kritik seni, menyusun deskripsi saintifik hasil kajiannya dalam bentuk skripsi atau laporan tugas akhir, dan mengunggahnya dalam laman perguruan tinggi'),
(13, 'P07', 'Pengetahuan', 'Menguasai konsep-konsep bahasa pemrograman, serta mampu membandingkan berbagai solusi serta berbagai model bahasa pemrograman'),
(14, 'P13', 'Pengetahuan', 'Menguasai bahasa dan algoritma pemrograman yang berkaitan dengan program aplikasi untuk memanipulasi model gambar, grafis dan citra'),
(16, 'S05', 'Sikap', 'Menghargai keanekaragaman budaya, pandangan, agama, dan kepercayaan, serta pendapat atau temuan orisinal orang lain'),
(17, 'S06', 'Sikap', 'Bekerja sama dan memiliki kepekaan sosial serta kepedulian terhadap masyarakat dan lingkungan'),
(18, 'S07', 'Sikap', 'Taat hukum dan disiplin dalam kehidupan bermasyarakat dan bernegara'),
(19, 'S08', 'Sikap', 'Menginternalisasi nilai, norma, dan etika akademik'),
(20, 'S10', 'Sikap', 'Menginternalisasi semangat kemandirian, kejuangan, dan kewirausahaan'),
(21, 'S11', 'Sikap', 'Bersikap proaktif, berorientasi pada tindakan, beradaptasi dan bersinergi disetiap kondisi apapun dalam masyarakat dan lingkungannya'),
(22, 'S12', 'Sikap', 'Memiliki rasa keingintahuan ang tinggi dalam rangka pengembanga ipteks'),
(23, 'S03', 'Sikap', 'Berkontribusi dalam peningkatan mutu kehidupan bermasyarakat, berbangsa, bernegara, dan kemajuan peradaban berdasarkan Pancasila'),
(24, 'P02', 'Pengetahuan', 'Menguasai konsep-konsep matematika untuk memecahkan berbagai masalah yang berkaitan dengan logika'),
(25, 'P03', 'Pengetahuan', 'Menguasai prinsip-prinsip pemodelan matematika, program linear serta metode numerik'),
(26, 'P04', 'Pengetahuan', 'Menguasai konsep dan ilmu probabilitas dan statistik untuk mendukung dan menganalisis sistem komputasi'),
(27, 'P05', 'Pengetahuan', 'Menguasai konsep dan teori konsep-konsep struktur diskrit, yang meliputi materi dasar matematika yang digunakan untuk memodelkan dan menganalisis sistem komputasi'),
(28, 'P06', 'Pengetahuan', 'Menguasai teori dan konsep yang mendasari ilmu komputer'),
(29, 'P08', 'Pengetahuan', 'Memahami teori dasar arsitektur komputer, termasuk perangkat keras komputer dan jaringan'),
(30, 'P09', 'Pengetahuan', 'Menguasai bidang fokus pengetahuan ilmu komputer serta mampu beradaptasi dengan perkembangan ilmu pengetahuan dan teknologi'),
(31, 'KU02', 'Keterampilan Umum', 'Mampu menunjukkan kinerja mandiri, bermutu, dan terukur'),
(32, 'KU04', 'Keterampilan Umum', 'Menyusun deskripsi saintifik hasil kajian tersebut di atas dalam bentuk skripsi atau laporan tugas akhir, dan mengunggahnya dalam laman perguruan tinggi'),
(33, 'KU05', 'Keterampilan Umum', 'Mampu mengambil keputusan secara tepat dalam konteks penyelesaian masalah di bidang keahliannya, berdasarkan hasil analisis informasi dan data'),
(34, 'KU06', 'Keterampilan Umum', 'Mampu memelihara dan mengembang-kan jaringan kerja dengan pembimbing, kolega, sejawat baik di dalam maupun di luar lembaganya'),
(35, 'KU07', 'Keterampilan Umum', 'Mampu bertanggungjawab atas pencapaian hasil kerja kelompok dan melakukan supervisi dan evaluasi terhadap penyelesaian pekerjaan yang ditugaskan kepada pekerja yang berada di bawah tanggungjawabnya'),
(36, 'KU08', 'Keterampilan Umum', 'Mampu melakukan proses evaluasi diri terhadap kelompok kerja yang berada dibawah tanggung jawabnya, dan mampu mengelola pembelajaran secara mandiri'),
(37, 'KU09', 'Keterampilan Umum', 'Mampu mendokumentasikan, menyimpan, mengamankan, dan menemukan kembali data untuk menjamin kesahihan dan mencegah plagiasi'),
(38, 'KU10', 'Keterampilan Umum', 'Mampu berkomunikasi dengan efektif dalam masyarakat dan lingkungan'),
(39, 'KU11', 'Keterampilan Umum', 'Mampu berbahasa Inggris dengan baik'),
(40, 'KU12', 'Keterampilan Umum', 'Mampu memahami, menggunakan dan memanfaatkan Teknologi Informasi di masyarakat dan lingkungannya dengan bijak'),
(41, 'KU13', 'Keterampilan Umum', 'Mampu mengembangkan potensi diri sesuai minat bakat yang dimiliki'),
(42, 'KK03', 'Keterampilan Khusus', 'Memanfaatkan pengetahuan yang dimiliki berkaitan dengan konsep-konsep dasar pengembangan perangkat lunak dan kecakapan yang berhubungan dengan proses pengembangan perangkat lunak, serta mampu membuat program untuk meningkatkan efektivitas penggunaan komputer untuk memecahkan masalah tertentu'),
(43, 'KK04', 'Keterampilan Khusus', 'Merancang dan mengembangkan program aplikasi untuk memanipulasi model gambar, grafis dan citra, serta dapat memvisualisasikannya'),
(44, 'KK05', 'Keterampilan Khusus', 'Membangun dan mengevaluasi perangkat lunak dalam berbagai area, termasuk yang berkaitan dengan interaksi antara manusia dan komputer'),
(45, 'KK06', 'Keterampilan Khusus', 'Membangun aplikasi perangkat lunak dalam berbagai area yang berkaitan dengan bidang robotik, pengenalan suara, sistem cerdas'),
(46, 'KK07', 'Keterampilan Khusus', 'Menerapkan konsep-konsep yang berkaitan dengan manajemen informasi, termasuk menyusun pemodelan dan abstraksi data serta membangun aplikasi perangkat lunak untuk pengorganisasian data dan penjaminan keamanan akses data'),
(47, 'KK08', 'Keterampilan Khusus', 'Menganalisis, merancang, dan menerapkan suatu sistem berbasis komputer secara efisien untuk menyelesaikan masalah, menggunakan pemrograman prosedural dan berorientasi objek'),
(48, 'KK09', 'Keterampilan Khusus', 'Membangun sistem jaringan komputer dan sistem keamanannya serta melakukan pengelolaan secara kontinu terhadap proteksi profil yang ada'),
(49, 'KK10', 'Keterampilan Khusus', 'Menganalisis dan mengembangkan sistem serta prosedur yang berkaitan dengan sistem komuter serta memberikan rekomendasi ang berkaitan dengan sistem komputer yang lebih efisien dan efektif'),
(50, 'KK11', 'Keterampilan Khusus', 'Menerapkan konsep-konsep yang berkaitan dengan arsitektur dan organisasi komputer serta memanfaatkannya untuk menunjang aplikasi komputer'),
(51, 'KK12', 'Keterampilan Khusus', 'Menerapkan konsep-konsep yang berkaitan dengan pengembangan berbasis platform serta mampu mengembangkan program aplikasi berbasis platform untuk berbagai area'),
(52, 'KK13', 'Keterampilan Khusus', 'menerapkan konsep-konsep yang berkaitan dengan sensor dan mikrokontroler serta mampu mengembangkan suatu alat yang dapat memberikan informasi dan reaksi terhadap lingkungan atau kelautan menggunakan kemampuan Internet of Things'),
(53, 'KK14', 'Keterampilan Khusus', 'Menggunakan teknologi informasi (Medsos, Adsense, dll) untuk meningkatkan pemasaran produk/jasa');

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
(6, 5, 1, 89),
(7, 25, 11, 89),
(8, 25, 12, 70),
(9, 25, 13, 70),
(10, 25, 14, 70),
(11, 25, 9, 70),
(12, 25, 15, 70),
(13, 26, 50, 78),
(14, 26, 39, 67),
(15, 27, 21, 70),
(16, 27, 36, 89),
(17, 26, 11, 70),
(18, 26, 13, 87),
(19, 27, 50, 98),
(20, 27, 39, 87),
(21, 7, 4, 70),
(22, 7, 49, 80),
(23, 8, 4, 87),
(24, 8, 49, 67),
(25, 3, 4, 67),
(26, 3, 49, 70),
(27, 27, 11, 89),
(29, 25, 11, 78),
(32, 35, 11, 67),
(33, 35, 50, 70),
(34, 36, 39, 70),
(35, 36, 11, 89);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `dsn_nid` varchar(255) NOT NULL,
  `dsn_nama` varchar(255) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `dsn_status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `dsn_nid`, `dsn_nama`, `fk_id`, `prd_id`, `dsn_status`) VALUES
(1, '00001', 'Istiqomah Sumadikarta', 1, 1, 'Aktif'),
(2, '00002', 'Bosar Panjaitan', 1, 1, 'Aktif'),
(4, '00003', 'Zulkifli', 1, 2, 'Aktif'),
(5, '00004', 'Agung', 1, 3, 'Aktif'),
(6, '00005', 'Nama 1', 2, 5, 'Aktif'),
(7, '00006', 'Nama 2', 2, 6, 'Aktif'),
(8, '00007', 'Nama 3', 3, 7, 'Aktif'),
(9, '00008', 'Nama 4', 3, 8, 'Aktif'),
(10, '00009', 'Nama 5', 4, 9, 'Aktif'),
(11, '00010', 'Nama 6', 4, 10, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL,
  `fk_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id`, `fk_nama`) VALUES
(1, 'Teknik'),
(2, 'Ekonomi'),
(3, 'FISIP'),
(4, 'Perikanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `mhs_nim` varchar(255) NOT NULL,
  `mhs_nama` varchar(255) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `dsn_id` int(11) NOT NULL,
  `mhs_status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `mhs_nim`, `mhs_nama`, `fk_id`, `prd_id`, `dsn_id`, `mhs_status`) VALUES
(1, '011601503125139', 'Dony Tanu Wijaya', 1, 1, 1, 'Aktif'),
(2, '011601503125140', 'DB Unknown', 2, 2, 2, 'Aktif'),
(3, '011601503125141', 'Unknown DB', 3, 3, 3, 'Non Aktif'),
(4, '011601503125142', 'Unknown', 4, 4, 4, 'Aktif'),
(7, '011601503125138', 'Lorem', 1, 2, 5, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `mk_smt` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `prd_id` int(11) NOT NULL,
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

INSERT INTO `matakuliah` (`id`, `mk_smt`, `prd_id`, `mk_kd`, `mk_nama`, `mk_sks`, `mk_prasyarat`, `mk_keterangan`, `bobot_absen`, `bobot_tugas`, `bobot_uts`, `bobot_uas`) VALUES
(1, '1', 1, 'UN192003', 'Bahasa Inggris', 2, '', 'Wajib Universitas', 10, 20, 30, 40),
(2, '6', 1, 'TI123006', 'Interaksi Manusia dan Komputer', 3, 'Pemrograman Web', 'Wajib Prodi', 0, 20, 30, 50),
(3, '1', 1, 'UN192006', 'Pancasila', 2, '', 'Wajib Universitas', 10, 20, 30, 40),
(5, '7', 1, 'TI172029', 'Riset Teknologi Informasi', 2, 'Kecerdasan Buatan', '', 10, 20, 30, 40),
(6, '2', 1, 'UN192004', 'Kewarganegaraan', 2, '', 'Wajib Universitas', 10, 20, 30, 40),
(8, '2', 1, 'TI1133012', 'Sistem Digital', 3, '', 'Wajib Prodi', 10, 20, 30, 40),
(9, '3', 1, 'Ti115171', 'Bahasa Inggris Teknik', 2, 'Bahasa Inggris', 'Wajib Prodi', 10, 20, 30, 40),
(10, '3', 1, 'TI133008', 'Jaringan Komputer', 3, 'Komunikasi Data', 'Wajib Prodi', 10, 20, 30, 40),
(11, '4', 1, 'TI113004', 'Sistem Operasi', 3, 'Organisasi Arsitektur dan Komputer', 'Wajib Prodi', 10, 20, 30, 40),
(12, '4', 1, 'TI115119', 'Teori Graf dan Bahasa Automata', 3, 'Matematika DIskrit', 'Wajib Prodi', 10, 20, 30, 40),
(13, '5', 1, 'FT193007', 'Technopreneurship', 3, 'Kewirausahaan', 'Wajib Fakultas', 10, 20, 30, 40),
(14, '5', 1, 'TI115181', 'Grafik Komputer', 3, 'Pemrograman Berorientasi Objek', 'Wajibi Prodi', 10, 20, 30, 40),
(15, '6', 1, 'TI393003', 'Machine Learning', 3, 'Kecerdasan Buatan', 'Wajib Prodi', 10, 20, 30, 40),
(20, '1', 1, 'TI113001', 'Algoritma dan Pemrograman', 3, '', 'Wajib Prodi', 10, 20, 30, 40),
(21, '1', 1, 'UN192002', 'Bahasa Indonesia', 2, '', 'Wajib Universitas', 10, 20, 30, 40),
(22, '1', 1, 'TI113002', 'Matermatika Dasar', 3, '', 'Wajib Prodi', 10, 20, 30, 40),
(23, '1', 1, 'FT192003', 'Kecapakan Antar Personal', 2, '', 'Wajib Fakultas', 10, 20, 30, 40),
(24, '1', 1, 'TI113003', 'Pengantar Teknologi Informasi', 3, '', 'Wajib Prodi', 10, 20, 30, 40),
(25, '1', 1, 'TI123007', 'Komunikasi Data', 3, '', 'Wajib Prodi', 10, 20, 30, 40),
(27, '2', 1, 'TI123005', 'Basis Data', 3, '', 'Wajib Prodi', 10, 20, 30, 40),
(28, '2', 1, 'FT193006', 'Statistik', 3, '', 'Wajib Fakultas', 10, 20, 30, 40),
(29, '2', 1, 'FT193002', 'Kalkulus', 3, '', 'Wajib Fakultas', 10, 20, 30, 40),
(30, '2', 1, 'TI133014', 'Struktur Data', 3, '', 'Wajib Prodi', 10, 20, 30, 40),
(31, '3', 1, 'TI133009', 'Kumputasi Numerik', 3, 'Kalkulus', 'Wajib Prodi', 10, 20, 30, 40),
(32, '3', 1, 'TI133010', 'Organisasi dan Arsitektur Komputer', 3, 'Pengantar Teknologi Informasi', 'Wajib Prodi', 10, 20, 30, 40),
(33, '3', 1, 'TI133011', 'Pemrograman Berorientasi Objek', 3, 'Algoritma dan Pemrograman', 'Wajib Prodi', 10, 20, 30, 40),
(34, '3', 1, 'TI143016', 'Matematika Diskrit', 3, 'Matematika Dasar', 'Lintas Prodi', 10, 20, 30, 40),
(35, '3', 1, 'TI153021', 'Aljabar Linear', 3, 'Matematika Dasar', 'Wajib Prodi', 10, 20, 30, 40),
(36, '4', 1, 'TI143015', 'Analisa dan Perancangan SIstem', 3, 'Organisasi Arsitektur dan Komputer', 'Wajib Prodi', 10, 20, 30, 40),
(37, '4', 1, 'TI143018', 'Pemrograman Web', 3, 'Algoritma dan Pemrograman', 'Wajib Prodi', 10, 20, 30, 40),
(38, '4', 1, 'TI143019', 'Sistem Terdistribusi', 3, 'Basis Data', 'Wajib Prodi', 10, 20, 30, 40),
(39, '4', 1, 'TI153024', 'Kecerdasan Buatan', 3, 'Statistik', 'Wajib Prodi', 10, 20, 30, 40),
(40, '4', 1, 'UN193005', 'Kewirausahaan', 3, '', 'Wajib Universitas', 10, 20, 30, 40),
(41, '5', 1, 'TI114017', 'Pemrograman Jaringan', 3, 'Pemrograman Berorientasi Objek', 'Wajib Prodi', 10, 20, 30, 40),
(42, '5', 1, 'TI115022', 'Data Mining', 3, 'Basis Data', 'Wajib Prodi', 10, 20, 30, 40),
(43, '5', 1, 'TI115023', 'Keamanan Jaringan Komputer', 3, 'Jaringan Komputer', 'Wajib Prodi', 10, 20, 30, 40),
(44, '5', 1, 'TI153025', 'Rekayasa Perangkat Lunak', 3, 'Analisa dan Perancangan SIstem', 'Wajib Prodi', 10, 20, 30, 40),
(45, '5', 1, 'TI163026', 'Manajemen Proyek Perangkat Lunak', 3, 'Analisa dan Perancangan SIstem', 'Wajib Prodi', 10, 20, 30, 40),
(46, '6', 1, 'FT192001', 'Etika Bisnis dan Profesi', 2, '', 'Wajib Fakultas', 10, 20, 30, 40),
(47, '7', 1, 'FT193005', 'Pemodelan dan Simulasi', 3, 'Statistik, Aljabar Linier', '', 10, 20, 30, 40),
(48, '8', 1, 'TI186030', 'Skripsi', 6, 'Riset Teknologi Informasi, Minimal 120 SKS, dan menyelesaikan 133 SKS sebelum sidang', 'Wajib Prodi', 10, 20, 30, 40),
(49, '6', 1, 'TI393001', 'Kriptografi', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40),
(50, '6', 1, 'TI393002', 'Pmerograman Perangkat Mobile', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40),
(51, '6', 1, 'PS163023', 'Sistem Informasi Geografis Kelautan', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40),
(52, '6', 1, 'TI393006', 'Pemrograman Game', 3, '', 'Mata Kuliah Pilihan', 0, 0, 0, 0),
(53, '6', 1, 'TL133014', 'Menggambar Teknik', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40),
(54, '6', 1, 'TI133013', 'SistemTemu Balik Informasi', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40),
(55, '6', 1, 'TI151192', 'Perancangan dan Manajeen Jaringan', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40),
(56, '7', 1, 'TI115179', 'Sistem Pakar', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40),
(57, '7', 1, 'TI163027', 'Metodologi Penelitian', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40),
(58, '7', 1, 'FT193008', 'Teknik Riset Operasi', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40),
(59, '7', 1, 'SI183024', 'Big Data', 4, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40),
(60, '7', 1, 'TI393004', 'Pengolahan Citra Digital', 4, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40),
(61, '7', 1, 'TI393005', 'Internet of Things', 4, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40),
(62, '7', 1, 'TI143020', 'Software Quality Assurance', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40),
(63, '7', 1, 'SI163017', 'Evaluasi dan Audit Sistem Informasi', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40),
(64, '7', 1, 'TI215161', 'Teknologi Antar Jaringan', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40),
(65, '2', 1, 'UN192101', 'Agama Islam', 2, '', 'Wajib Universitas', 10, 20, 30, 40),
(66, '2', 1, 'UN192201', 'Agama Kristen Protestan', 2, '', 'Wajib Universitas', 10, 20, 30, 40),
(67, '2', 1, 'UN192301', 'Agama Kristen Katolik', 2, '', 'Wajib Universitas', 10, 20, 30, 40),
(68, '2', 1, 'UN192401', 'Agama Hindu', 2, '', 'Wajib Universitas', 10, 20, 30, 40),
(69, '2', 1, 'UN192501', 'Agama Budha', 2, '', 'Wajib Universitas', 10, 20, 30, 40),
(70, '2', 1, 'UN192601', 'Agama Konghucu', 2, '', 'Wajib Universitas', 10, 20, 30, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_cpl`
--

CREATE TABLE `nilai_cpl` (
  `id` int(11) NOT NULL,
  `id_mhs` int(11) DEFAULT NULL,
  `id_cpl` int(11) DEFAULT NULL,
  `n_cpl` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_cpl`
--

INSERT INTO `nilai_cpl` (`id`, `id_mhs`, `id_cpl`, `n_cpl`) VALUES
(1, 1, 1, '70'),
(2, 1, 2, '80'),
(3, 2, 1, '57'),
(4, 2, 2, '76'),
(5, 3, 1, '65'),
(6, 3, 2, '87');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_mk`
--

CREATE TABLE `nilai_mk` (
  `id` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `n_absen` varchar(11) NOT NULL,
  `n_tugas` varchar(11) NOT NULL,
  `n_uts` varchar(11) NOT NULL,
  `n_uas` varchar(11) NOT NULL,
  `n_akumulasi` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_mk`
--

INSERT INTO `nilai_mk` (`id`, `id_mk`, `id_mhs`, `n_absen`, `n_tugas`, `n_uts`, `n_uas`, `n_akumulasi`) VALUES
(3, 1, 3, '0', '0', '0', '0', '0'),
(7, 5, 2, '67', '89', '87', '78', '81.8'),
(8, 14, 2, '90', '67', '87', '78', '79.7'),
(22, 1, 6, '0', '0', '0', '0', '0'),
(25, 20, 1, '80', '78', '70', '67', '71.4'),
(26, 21, 1, '80', '80', '80', '80', '80'),
(27, 1, 1, '100', '100', '50', '50', '65'),
(28, 3, 3, '90', '100', '80', '80', '85'),
(35, 1, 7, '90', '89', '67', '87', '81.7'),
(36, 3, 7, '80', '23', '80', '80', '68.6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `prd_kd` varchar(255) NOT NULL,
  `prd_jurusan` varchar(255) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `dsn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id`, `prd_kd`, `prd_jurusan`, `fk_id`, `dsn_id`) VALUES
(1, 'T1', 'Teknik Informatika', 1, 4),
(2, 'T2', 'Sistem Informasi', 1, 4),
(3, 'T3', 'Teknik Lingkungan', 1, 4),
(4, 'T4', 'Manajemen Informasi', 1, 4),
(5, 'E1', 'Akutansi', 2, 1),
(6, 'E2', 'Manajemen', 2, 1),
(7, 'F1', 'Ilmu Hubungan Internasional', 3, 2),
(8, 'F2', 'Ilmu Komunikasi', 3, 2),
(9, 'F3', 'Hukum', 3, 5),
(10, 'P1', 'Pemanfaatan Sumber Daya Perikanan', 4, 5),
(11, 'P2', 'Akuakultur', 4, 5);

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
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `role` enum('superadmin','prodi','dosen','mahasiswa') NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `photo`, `status`, `role`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(9, 'Super Admin', 'admin', '$2y$10$5sfoiew1iJ0DLpBTM.O5UOauIYqELVZ3ShqxWLYgKVrQMQy4X9alO', '9-superadmin.png', 'active', 'superadmin', 1, '2023-05-31 11:05:03', 9, '2023-07-16 19:21:53'),
(11, 'Istiqomah Sumadikarta', '00001', '$2y$10$BOA2wmETl5an1JgQG4Pnfed4gpWbNxjuPbmLinvvwdlv3nb2dyXlS', '9-superadmin.png', 'active', 'dosen', 9, '2023-05-31 14:41:44', 9, '2023-07-25 20:12:58'),
(13, 'Dony Tanu Wijaya', '011601503125139', '$2y$10$J/4lKLvb.njyBqDh2q.MqOQuj63Xe3zTE61TjT24BaqSK/UI8N8r6', '13-mahasiswa.jpg', 'active', 'mahasiswa', 9, '2023-07-09 02:15:55', 13, '2023-07-25 20:10:40'),
(14, 'DB Unknown', '011601503125140', '$2y$10$CG9qToP7Ev1MXUj/wfQ5xOUj.Iz0U2pugnTsNBDDcfv8M.vEN5cT2', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-07-26 01:03:09', 9, '2023-07-25 20:13:28'),
(15, 'Lorem', '011601503125138', '$2y$10$N95Z1tPlxOiCmaC6V8NK5.gJeJSIbXk8AVjAkYsC6.y1pZMZM4/Ty', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-07-26 01:34:26', NULL, NULL),
(16, 'Zulkifli', '00003', '$2y$10$OTomExGQ6NhyKP.t2kOlvONjGdUkgEmYk7ZQOPNb/gnI785yquf86', '9-superadmin.jpg', 'active', 'prodi', 9, '2023-07-29 06:41:24', 9, '2023-07-29 23:32:34'),
(17, 'admin2', 'admin2', '$2y$10$CKh5LdHFoFrYeYv7bG0/6OyEXjxPcjHiqjkrgY0QCK611wfs5R0WC', '9-superadmin.png', 'inactive', 'superadmin', 9, '2023-07-30 04:26:15', 17, '2023-07-29 23:31:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
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
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
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
-- AUTO_INCREMENT untuk tabel `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `cpl`
--
ALTER TABLE `cpl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `cplmk`
--
ALTER TABLE `cplmk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `nilai_cpl`
--
ALTER TABLE `nilai_cpl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai_mk`
--
ALTER TABLE `nilai_mk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
