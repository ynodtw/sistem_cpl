-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Agu 2023 pada 11.50
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

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
(53, 'KK14', 'Keterampilan Khusus', 'Menggunakan teknologi informasi (Medsos, Adsense, dll) untuk meningkatkan pemasaran produk/jasa'),
(54, 'P11', 'Pengetahuan', 'Memahami konsep-konsep algoritma dan kompleksitas, meliputi konsep-konsep sentral dan kecakapan yang dibutuhkan untuk merancang, menerapkan dan menganalisis algoritma untuk menyelesaikan masalah'),
(55, 'P12', 'Pengetahuan', 'Menguasai konsep dan prisip algoritma serta teori ilmu komputer yang dapat digunakan dalam pemodelan dan desain sistem berbasis computer'),
(56, 'P14', 'Pengetahuan', 'Menguasai konsep-konsep Big Data, bagaimana perangkat keras dan perangkat lunak yang dibutuhkan, serta cara kerja penyaringan data'),
(57, 'P15', 'Pengetahuan', 'Memahami Kecerdasan Buatan yang mampu mengenali suatu objek, baik secara visual, suara, maupun keduanya'),
(58, 'P16', 'Pengetahuan', 'Menguasai konsep-konsep Machine Learning, baik untuk Supervised Learning maupun Unsupervised Learning'),
(59, 'P17', 'Pengetahuan', 'Menguasai konsep-konsep keamanan data melalui enskripsi data'),
(60, 'P10', 'Pengetahuan', 'Menguasai metodologi pengembangan sistem, yaitu perencanaan, desain, penerapan, pengujian, dan pemeliharaan sistem');

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
(1, 1, 9, 81),
(2, 1, 11, 98),
(3, 1, 12, 78),
(4, 1, 13, 99),
(5, 1, 14, 89),
(6, 2, 9, 50),
(7, 2, 11, 89),
(8, 2, 12, 90),
(9, 2, 13, 87),
(10, 2, 14, 87),
(11, 3, 9, 98),
(12, 3, 11, 98),
(13, 3, 12, 76),
(14, 3, 14, 88),
(15, 4, 21, 66),
(16, 4, 34, 67),
(17, 4, 44, 88),
(18, 4, 55, 99),
(19, 5, 21, 99),
(20, 5, 34, 98),
(21, 5, 44, 98),
(23, 6, 21, 98),
(24, 6, 34, 77),
(25, 6, 44, 89),
(26, 6, 55, 88),
(27, 5, 55, 87),
(28, 7, 9, 89),
(29, 7, 11, 89),
(30, 8, 10, 78),
(31, 8, 26, 67),
(32, 8, 32, 56),
(33, 8, 43, 78),
(34, 16, 9, 78),
(35, 16, 11, 78),
(36, 16, 12, 78),
(37, 16, 13, 49),
(38, 16, 14, 78),
(39, 17, 9, 89),
(40, 17, 11, 78),
(41, 17, 12, 78),
(42, 17, 13, 78),
(43, 17, 14, 78),
(44, 18, 9, 78),
(45, 18, 11, 78),
(46, 18, 12, 89),
(47, 18, 13, 98),
(48, 18, 14, 67),
(49, 19, 9, 89),
(50, 19, 11, 90),
(51, 19, 12, 49),
(52, 19, 13, 89),
(53, 19, 14, 89),
(54, 20, 9, 0),
(55, 20, 11, 0),
(56, 20, 12, 0),
(57, 20, 13, 0),
(58, 20, 14, 0),
(59, 21, 9, 67),
(60, 21, 11, 87),
(61, 21, 12, 76),
(62, 21, 13, 89),
(63, 21, 14, 67),
(64, 22, 9, 0),
(65, 22, 11, 0),
(66, 22, 12, 0),
(67, 22, 13, 0),
(68, 22, 14, 0);

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
(1, '0310017605', 'Istiqomah Sumadikarta, ST., M.Kom  ', 1, 1, 'Aktif'),
(2, '0325077101', 'Bosar Panjaitan, S.Si, M.Kom', 1, 1, 'Aktif'),
(4, '0316076803', 'Dr. Zulkifli , S.Kom.,M.Kom', 1, 1, 'Aktif'),
(5, '0319037001', 'Dr. Safrizal, ST., MM., M.Kom', 1, 1, 'Aktif'),
(6, '0323098001', 'Faizal Zuli, S.Kom., M.Kom', 1, 1, 'Aktif');

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
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `dsn_id` int(11) NOT NULL,
  `kelas_kd` varchar(255) DEFAULT NULL,
  `kelas_nama` varchar(255) NOT NULL,
  `mk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `prd_id`, `dsn_id`, `kelas_kd`, `kelas_nama`, `mk_id`) VALUES
(3, 1, 2, 'Sore A', 'Matematika Diskrit', 34),
(4, 1, 2, 'Sore A', 'Matematika Dasar', 22),
(5, 1, 4, 'Sore A', 'Organisasi dan Arsitektur Komputer', 32),
(7, 1, 5, 'Sore A', 'Analisa dan Perancangan Sistem', 36),
(8, 1, 5, 'Sore A', 'Pengantar Teknologi Informasi', 24),
(9, 1, 6, 'Sore A', 'Jaringan Komputer', 10),
(10, 1, 6, 'Sore A', 'Keamanan Jaringan Komputer', 43),
(19, 1, 1, NULL, 'Pemrograman Berorientasi Objek', 33),
(20, 1, 1, NULL, 'Algoritma dan Pemrograman', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `mhs_nim` varchar(255) NOT NULL,
  `mhs_nama` varchar(255) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `dsn_id` int(11) NOT NULL,
  `mhs_status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `mhs_nim`, `mhs_nama`, `kelas_id`, `fk_id`, `prd_id`, `dsn_id`, `mhs_status`) VALUES
(1, '011601503125139', 'Dony Tanu Wijaya', 1, 1, 1, 4, 'Aktif'),
(11, '011601503125139', 'Dony Tanu Wijaya', 2, 1, 1, 1, 'Aktif'),
(17, '011701503125107', 'Rijal Fathan Zafiri', 0, 1, 1, 1, 'Aktif'),
(18, '011701503125112', 'Andreno Ramadani', 0, 1, 1, 2, 'Aktif'),
(19, '190100001', '	Fikhri Fadhilah', 0, 1, 1, 4, 'Aktif'),
(20, '011701503125069', 'Indrawan Wibisono', 0, 1, 1, 5, 'Aktif'),
(21, '011601573125003', 'Riza Alfiandi', 0, 1, 1, 6, 'Aktif'),
(22, '011701503125066', 'Muhamad Danu', 0, 1, 1, 6, 'Aktif'),
(23, '011701503125103', 'Arfan Arhamsyah', 0, 1, 1, 1, 'Aktif'),
(24, '011701503125090', 'Mutohar', 0, 1, 1, 2, 'Aktif'),
(25, '180100034', 'Endhy Septian ', 0, 1, 1, 4, 'Aktif'),
(26, '190100022', 'Faridah Zahro', 0, 1, 1, 5, 'Aktif'),
(27, '180100093', 'Ipan Amanda', 0, 1, 1, 6, 'Aktif'),
(28, '210170001', 'Sigit Aditya Kurniawan', 0, 1, 1, 1, 'Aktif'),
(29, '180100032', 'Yohanes Hermanto Soge Teluma ', 0, 1, 1, 2, 'Aktif'),
(30, '190100058', 'HARDIKA ADHI MURPRASTYO', 0, 1, 1, 5, 'Aktif'),
(31, '180100015', 'Naufal Nur Prasetyo', 0, 1, 1, 6, 'Aktif'),
(32, '190100015', 'Virginia Agustina', 0, 1, 1, 1, 'Aktif'),
(33, '190100063', 'Farrisa Nanindhiya Rifqah Aygi', 0, 1, 1, 4, 'Aktif'),
(34, '180100051', 'Ajhi Bayu Saputra', 0, 1, 1, 5, 'Aktif'),
(35, '180100048', 'Aditiya Dwi Putra', 0, 1, 1, 6, 'Aktif'),
(36, '180100096', 'Nico Demus Indra Ade Wicaksono', 0, 1, 1, 1, 'Aktif'),
(38, '011605503125043', 'Fathur Rahman Elsam', 0, 1, 2, 5, 'Aktif');

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
  `bobot_uas` int(11) NOT NULL,
  `cpl` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `mk_smt`, `prd_id`, `mk_kd`, `mk_nama`, `mk_sks`, `mk_prasyarat`, `mk_keterangan`, `bobot_absen`, `bobot_tugas`, `bobot_uts`, `bobot_uas`, `cpl`) VALUES
(1, '1', 1, 'UN192003', 'Bahasa Inggris', 2, '', 'Wajib Universitas', 10, 20, 30, 40, '4,3,2,1'),
(2, '6', 1, 'TI123006', 'Interaksi Manusia dan Komputer', 3, 'Pemrograman Web', 'Wajib Prodi', 0, 20, 30, 50, '43,40,30,16'),
(3, '1', 1, 'UN192006', 'Pancasila', 2, '', 'Wajib Universitas', 10, 20, 30, 40, '9,31,24,8'),
(5, '7', 1, 'TI172029', 'Riset Teknologi Informasi', 2, 'Kecerdasan Buatan', '', 10, 20, 30, 40, '44,37,14,17'),
(6, '2', 1, 'UN192004', 'Kewarganegaraan', 2, '', 'Wajib Universitas', 10, 20, 30, 40, '47,36,29,19'),
(8, '2', 1, 'TI1133012', 'Sistem Digital', 3, '', 'Wajib Prodi', 10, 20, 30, 40, '49,38,60,20'),
(9, '3', 1, 'Ti115171', 'Bahasa Inggris Teknik', 2, 'Bahasa Inggris', 'Wajib Prodi', 10, 20, 30, 40, '52,40,56,18'),
(10, '3', 1, 'TI133008', 'Jaringan Komputer', 3, 'Komunikasi Data', 'Wajib Prodi', 10, 20, 30, 40, '50,38,14,11'),
(11, '4', 1, 'TI113004', 'Sistem Operasi', 3, 'Organisasi Arsitektur dan Komputer', 'Wajib Prodi', 10, 20, 30, 40, '44,33,27,16'),
(12, '4', 1, 'TI115119', 'Teori Graf dan Bahasa Automata', 3, 'Matematika DIskrit', 'Wajib Prodi', 10, 20, 30, 40, '45,34'),
(13, '5', 1, 'FT193007', 'Technopreneurship', 3, 'Kewirausahaan', 'Wajib Fakultas', 10, 20, 30, 40, '43,34,24,20'),
(14, '5', 1, 'TI115181', 'Grafik Komputer', 3, 'Pemrograman Berorientasi Objek', 'Wajibi Prodi', 10, 20, 30, 40, '9,34,54,10'),
(15, '6', 1, 'TI393003', 'Machine Learning', 3, 'Kecerdasan Buatan', 'Wajib Prodi', 10, 20, 30, 40, '42,36,41,59,10'),
(20, '1', 1, 'TI113001', 'Algoritma dan Pemrograman', 3, '', 'Wajib Prodi', 10, 20, 30, 40, '9,12,13,14,11'),
(21, '1', 1, 'UN192002', 'Bahasa Indonesia', 2, '', 'Wajib Universitas', 10, 20, 30, 40, '42,12,25,23'),
(22, '1', 1, 'TI113002', 'Matermatika Dasar', 3, '', 'Wajib Prodi', 10, 20, 30, 40, '43,32,26,10'),
(23, '1', 1, 'FT192003', 'Kecapakan Antar Personal', 2, '', 'Wajib Fakultas', 10, 20, 30, 40, '44,33,27,16'),
(24, '1', 1, 'TI113003', 'Pengantar Teknologi Informasi', 3, '', 'Wajib Prodi', 10, 20, 30, 40, '45,34,28,17'),
(25, '1', 1, 'TI123007', 'Komunikasi Data', 3, '', 'Wajib Prodi', 10, 20, 30, 40, '46,35,13,18'),
(27, '2', 1, 'TI123005', 'Basis Data', 3, '', 'Wajib Prodi', 10, 20, 30, 40, '50,39,54,21'),
(28, '2', 1, 'FT193006', 'Statistik', 3, '', 'Wajib Fakultas', 10, 20, 30, 40, '51,40,55,22'),
(29, '2', 1, 'FT193002', 'Kalkulus', 3, '', 'Wajib Fakultas', 10, 20, 30, 40, '52,41,14,1'),
(30, '2', 1, 'TI133014', 'Struktur Data', 3, '', 'Wajib Prodi', 10, 20, 30, 40, '53,56'),
(31, '3', 1, 'TI133009', 'Kumputasi Numerik', 3, 'Kalkulus', 'Wajib Prodi', 10, 20, 30, 40, '4,31,24,8'),
(32, '3', 1, 'TI133010', 'Organisasi dan Arsitektur Komputer', 3, 'Pengantar Teknologi Informasi', 'Wajib Prodi', 10, 20, 30, 40, '4,3,2,1'),
(33, '3', 1, 'TI133011', 'Pemrograman Berorientasi Objek', 3, 'Algoritma dan Pemrograman', 'Wajib Prodi', 10, 20, 30, 40, '9,31,24,8'),
(34, '3', 1, 'TI143016', 'Matematika Diskrit', 3, 'Matematika Dasar', 'Lintas Prodi', 10, 20, 30, 40, '42,12,25,23'),
(35, '3', 1, 'TI153021', 'Aljabar Linear', 3, 'Matematika Dasar', 'Wajib Prodi', 10, 20, 30, 40, '43,32,26,10'),
(36, '4', 1, 'TI143015', 'Analisa dan Perancangan Sistem', 3, 'Organisasi Arsitektur dan Komputer', 'Wajib Prodi', 10, 20, 30, 40, '46,35,13,18'),
(37, '4', 1, 'TI143018', 'Pemrograman Web', 3, 'Algoritma dan Pemrograman', 'Wajib Prodi', 10, 20, 30, 40, '44,34,55,21'),
(38, '4', 1, 'TI143019', 'Sistem Terdistribusi', 3, 'Basis Data', 'Wajib Prodi', 10, 20, 30, 40, '43,3,54,21'),
(39, '4', 1, 'TI153024', 'Kecerdasan Buatan', 3, 'Statistik', 'Wajib Prodi', 10, 20, 30, 40, '43,40,30,21'),
(40, '4', 1, 'UN193005', 'Kewirausahaan', 3, '', 'Wajib Universitas', 10, 20, 30, 40, '42,35,13,8'),
(41, '5', 1, 'TI114017', 'Pemrograman Jaringan', 3, 'Pemrograman Berorientasi Objek', 'Wajib Prodi', 10, 20, 30, 40, '42,36,25,56,21'),
(42, '5', 1, 'TI115022', 'Data Mining', 3, 'Basis Data', 'Wajib Prodi', 10, 20, 30, 40, '44,29,54,20'),
(43, '5', 1, 'TI115023', 'Keamanan Jaringan Komputer', 3, 'Jaringan Komputer', 'Wajib Prodi', 10, 20, 30, 40, '51,39,24,23'),
(44, '5', 1, 'TI153025', 'Rekayasa Perangkat Lunak', 3, 'Analisa dan Perancangan SIstem', 'Wajib Prodi', 10, 20, 30, 40, '43,40,24,16'),
(45, '5', 1, 'TI163026', 'Manajemen Proyek Perangkat Lunak', 3, 'Analisa dan Perancangan SIstem', 'Wajib Prodi', 10, 20, 30, 40, '44,31,36,56,20'),
(46, '6', 1, 'FT192001', 'Etika Bisnis dan Profesi', 2, '', 'Wajib Fakultas', 10, 20, 30, 40, '42,37,28,30,21'),
(47, '7', 1, 'FT193005', 'Pemodelan dan Simulasi', 3, 'Statistik, Aljabar Linier', '', 10, 20, 30, 40, '9,35,39,56,18'),
(48, '8', 1, 'TI186030', 'Skripsi', 6, 'Riset Teknologi Informasi, Minimal 120 SKS, dan menyelesaikan 133 SKS sebelum sidang', 'Wajib Prodi', 10, 20, 30, 40, '53,41,59,22'),
(49, '6', 1, 'TI393001', 'Kriptografi', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40, '43,38,30,8'),
(50, '6', 1, 'TI393002', 'Pemrograman Perangkat Mobile', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40, '44,37,29,19'),
(51, '6', 1, 'PS163023', 'Sistem Informasi Geografis Kelautan', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40, '44,12,59,22'),
(52, '6', 1, 'TI393006', 'Pemrograman Game', 3, '', 'Mata Kuliah Pilihan', 0, 0, 0, 0, '4,44,36,30,19'),
(53, '6', 1, 'TL133014', 'Menggambar Teknik', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40, '9,3,59,21'),
(54, '6', 1, 'TI133013', 'SistemTemu Balik Informasi', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40, '9,12,28,20'),
(55, '6', 1, 'TI151192', 'Perancangan dan Manajemen Jaringan', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40, '9,34,27,23'),
(56, '7', 1, 'TI115179', 'Sistem Pakar', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40, '53,41,27,8'),
(57, '7', 1, 'TI163027', 'Metodologi Penelitian', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40, '42,37,55,22'),
(58, '7', 1, 'FT193008', 'Teknik Riset Operasi', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40, '42,39,24,20'),
(59, '7', 1, 'SI183024', 'Big Data', 4, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40, '42,33,29,54,19'),
(60, '7', 1, 'TI393004', 'Pengolahan Citra Digital', 4, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40, '42,39,13,23'),
(61, '7', 1, 'TI393005', 'Internet of Things', 4, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40, '9,32,29,23'),
(62, '7', 1, 'TI143020', 'Software Quality Assurance', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40, '42,37,29,21'),
(63, '7', 1, 'SI163017', 'Evaluasi dan Audit Sistem Informasi', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40, '43,40,29,19'),
(64, '7', 1, 'TI215161', 'Teknologi Antar Jaringan', 3, '', 'Mata Kuliah Pilihan', 10, 20, 30, 40, '4,34,29,16'),
(65, '2', 1, 'UN192101', 'Agama Islam', 2, '', 'Wajib Universitas', 10, 20, 30, 40, '43,39,57,1'),
(66, '2', 1, 'UN192201', 'Agama Kristen Protestan', 2, '', 'Wajib Universitas', 10, 20, 30, 40, '48,33,26,18'),
(67, '2', 1, 'UN192301', 'Agama Kristen Katolik', 2, '', 'Wajib Universitas', 10, 20, 30, 40, '43,35,30,10'),
(68, '2', 1, 'UN192401', 'Agama Hindu', 2, '', 'Wajib Universitas', 10, 20, 30, 40, '53,41,59'),
(69, '2', 1, 'UN192501', 'Agama Budha', 2, '', 'Wajib Universitas', 10, 20, 30, 40, '42,3,58,17'),
(70, '2', 1, 'UN192601', 'Agama Konghucu', 2, '', 'Wajib Universitas', 10, 20, 30, 40, '42,36,57,10');

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
  `n_absen` varchar(11) DEFAULT NULL,
  `n_tugas` varchar(11) DEFAULT NULL,
  `n_uts` varchar(11) DEFAULT NULL,
  `n_uas` varchar(11) DEFAULT NULL,
  `n_akumulasi` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_mk`
--

INSERT INTO `nilai_mk` (`id`, `id_mk`, `id_mhs`, `n_absen`, `n_tugas`, `n_uts`, `n_uas`, `n_akumulasi`) VALUES
(1, 0, 1, '80', '80', '60', '79', '73.6'),
(2, 20, 21, '90', '70', '80', '78', '78.2'),
(4, 37, 1, '100', '89', '99', '78', '88.7'),
(5, 37, 21, '90', '99', '88', '77', '86'),
(6, 37, 22, '77', '88', '99', '89', '90.6'),
(16, 20, 1, '100', '78', '49', '49', '59.9'),
(18, 20, 20, '80', '78', '98', '67', '79.8'),
(19, 20, 31, '89', '89', '87', '89', '88.4'),
(20, 20, 28, '0', '0', '0', '0', '0'),
(22, 20, 24, '0', '0', '0', '0', '0');

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
(4, 'T4', 'Manajemen Informasi', 1, 4);

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
  `updated_at` datetime DEFAULT NULL,
  `nik` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `kewarganegaraan` varchar(255) NOT NULL,
  `gender` enum('laki-laki','perempuan') NOT NULL,
  `no_telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `photo`, `status`, `role`, `created_by`, `created_at`, `updated_by`, `updated_at`, `nik`, `tempat_lahir`, `tgl_lahir`, `agama`, `kewarganegaraan`, `gender`, `no_telp`) VALUES
(9, 'Super Admin', 'admin', '$2y$10$5sfoiew1iJ0DLpBTM.O5UOauIYqELVZ3ShqxWLYgKVrQMQy4X9alO', '9-superadmin.png', 'active', 'superadmin', 1, '2023-05-31 11:05:03', 9, '2023-07-16 19:21:53', '', '', '', '', '', 'laki-laki', ''),
(11, 'Istiqomah Sumadikarta, ST., M.Kom  ', '0310017605', '$2y$10$BOA2wmETl5an1JgQG4Pnfed4gpWbNxjuPbmLinvvwdlv3nb2dyXlS', '11-dosen.png', 'active', 'dosen', 9, '2023-05-31 14:41:44', 9, '2023-08-13 00:34:03', '', '', '', '', '', 'laki-laki', ''),
(13, 'Dony Tanu Wijaya', '011601503125139', '$2y$10$J/4lKLvb.njyBqDh2q.MqOQuj63Xe3zTE61TjT24BaqSK/UI8N8r6', '13-mahasiswa.jpg', 'active', 'mahasiswa', 9, '2023-07-09 02:15:55', 13, '2023-07-31 21:46:53', '3174010906960002', 'Jakarta', '1996-06-09', 'Islam', 'Indonesia', 'laki-laki', '085860037837'),
(16, 'Dr. Zulkifli , S.Kom.,M.Kom', '0316076803', '$2y$10$OTomExGQ6NhyKP.t2kOlvONjGdUkgEmYk7ZQOPNb/gnI785yquf86', '16-prodi.png', 'active', 'prodi', 9, '2023-07-29 06:41:24', 9, '2023-08-13 00:34:51', '3174010906960002', '', '', '', '', 'laki-laki', ''),
(17, 'admin2', 'admin2', '$2y$10$CKh5LdHFoFrYeYv7bG0/6OyEXjxPcjHiqjkrgY0QCK611wfs5R0WC', '17-superadmin.png', 'active', 'superadmin', 9, '2023-07-30 04:26:15', 17, '2023-07-31 21:39:55', '3174010906960002', 'Jakarta', '1996-06-09', 'Islam', 'Indonesia', 'perempuan', '085860037837'),
(19, 'Dr. Safrizal, ST., MM., M.Kom', '0319037001', '$2y$10$kSO.ipgjFNg/it0Gt31BOetfMImQ4iOvCiA/SLZA4EfT/AtxpJ326', '9-superadmin.png', 'active', 'dosen', 9, '2023-07-30 23:52:50', 9, '2023-08-13 00:33:39', '', '', '', '', '', 'laki-laki', ''),
(20, 'Bosar Panjaitan, S.Si, M.Kom', '0325077101', '$2y$10$1qa7HHjBARXprL58xv4c..NXEd/fRV/XlmAWDmOzN4FTNzo9Vl4SG', '9-superadmin.png', 'active', 'dosen', 9, '2023-07-30 23:55:09', 9, '2023-08-13 00:34:31', '', '', '', '', '', 'laki-laki', ''),
(26, 'Faizal Zuli, S.Kom., M.Kom', '0323098001', '$2y$10$VbJ9lQOX.GcT.zGrGtF5DO3Npg4/vnV8PL01lcMy07Dan3PtO45M6', '9-superadmin.png', 'active', 'dosen', 9, '2023-08-02 18:25:43', 9, '2023-08-13 00:35:37', '', '', '', '', '', 'laki-laki', ''),
(30, 'Rijal Fathan Zafiri', '011701503125107', '$2y$10$mgOiYpXSuHuPdFED/mkMXOSuLlGkl0sJ938lqciN.Yzd1hJeGJ.76', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:37:32', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(31, 'Andreno Ramadani', '011701503125112', '$2y$10$OWDq75w2s3PoIcX5CH6ateZnAfa.fBnBSDNRGayI2ZBmlG0heN.dm', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:38:13', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(32, 'Muhamad Danu', '011701503125066', '$2y$10$llBvV7B3Q9lqH4TttluNr.hyhRLVv.tUB0nt/bru7kvH.5FA5PYCO', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:39:19', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(33, 'Fikhri Fadhilah', '190100001', '$2y$10$66Hx3Ef42mHT0eSdDu7UUu2GwfRSug0oADaevIkes0ff7iDi/2bWq', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:40:31', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(34, 'Indrawan Wibisono', '011701503125069', '$2y$10$NxvM3ygtlMMPjUO8b05X6eOsCvvjEgztYedJEz5G8JwvnhMcA4hmq', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:41:13', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(35, 'Riza Alfiandi', '011601573125003', '$2y$10$zmeAYhYhy4i/.UgitEVTW..1yrqYarq7b.3PCJSKj0tsDyzbh2o.W', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:42:05', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(36, 'Arfan Arhamsyah', '011701503125103', '$2y$10$eFckxKVYRth76/PkPyuhfOf6ySfXoIv/GmXj/DF8/BLC9QuI.Zx4u', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:44:30', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(37, 'Mutohar', '011701503125090', '$2y$10$WUeW9u3xQqOKPPKj5KOjFu/63vuccVHHdkRN6LXD55bQxuuzCjU5q', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:45:18', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(38, 'Endhy Septian ', '180100034', '$2y$10$jSFpbHOoID./z/b9A.j6.O3Jw2bjfIbmDYomRTDAJ94nY6bvQQxaG', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:46:05', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(39, 'Faridah Zahro', '190100022', '$2y$10$UMcCwXg1VyphlKNlGBEEuOtZ8n8NeJfNN8/qVE8OpFiMIZtdRhkBy', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:46:31', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(40, 'Ipan Amanda', '180100093', '$2y$10$QcRHJD0.llXYNf4dKaXSPOJPuYRyOvvbAZnhcOQ8BpJHGWpAyNs.S', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:46:57', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(41, 'Sigit Aditya Kurniawan', '210170001', '$2y$10$dFvmQ.ICWgeclHwGUvZIQuZNfVCdf99DD4QVAt5gJS7qNqIjgQ9f.', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:47:17', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(42, 'Yohanes Hermanto Soge Teluma ', '180100032', '$2y$10$43XnkSwoIrCodj.4iYeOPuVClrSNWTB/yeljjS3dqaUyBOHn9TbyG', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:49:37', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(43, 'HARDIKA ADHI MURPRASTYO', '190100058', '$2y$10$oMWALNEDFujASZUM.S0RUeTTym5uYHidSwLFGIFl4GbGD3vIy..NS', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:50:13', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(44, 'Naufal Nur Prasetyo', '180100015', '$2y$10$7SMgUPEXECZQLl41eVwN.e9MnNIFMClLwtEw79QVYQFMuZ6JIHO2m', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:50:55', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(45, 'Virginia Agustina', '190100015', '$2y$10$3wcHI9b4CxNizWmFA.W5a.RJVglFeFOUFel0UuMBpG2z6iEoy4SOu', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:51:26', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(46, 'Farrisa Nanindhiya Rifqah Aygi', '190100063', '$2y$10$UXQ1JSmf1UjvTzpMbvsbxO3kVZLih6a3APxmlX6BpgBqULCNSYDfW', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:52:36', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(47, 'Ajhi Bayu Saputra', '180100051', '$2y$10$IvPG82ZF5LJnUKh.oCdCXeEz1ivsq8KsHQSkEOEdjbL2iLFstEVka', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:54:06', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(48, 'Aditiya Dwi Putra', '180100048', '$2y$10$fs3.lE4HmQfIw17JUa/Pq.s5XEux.fHVljNbZt.RSKDcCxDDU.xGO', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:54:29', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(49, 'Nico Demus Indra Ade Wicaksono', '180100096', '$2y$10$YN2j5ojWCQ8bHfdBTHKufOclcIMAcqtpkQ6j1VwGohJJfjFoQUTKq', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-06 04:55:47', NULL, NULL, '', '', '', '', '', 'laki-laki', ''),
(52, 'Fathur Rahman Elsam', '011605503125043', '$2y$10$vASafLlTJacrDNluOC558.ujNoHP0Qd0dmgFnzBCiPWOwhWpy9Hbi', '9-superadmin.png', 'active', 'mahasiswa', 9, '2023-08-09 17:07:53', NULL, NULL, '', '', '', '', '', 'laki-laki', '');

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
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `cplmk`
--
ALTER TABLE `cplmk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `nilai_cpl`
--
ALTER TABLE `nilai_cpl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai_mk`
--
ALTER TABLE `nilai_mk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
