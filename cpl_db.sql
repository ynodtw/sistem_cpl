/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.22-MariaDB : Database - cpl_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cpl_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `cpl_db`;

/*Table structure for table `cpl` */

DROP TABLE IF EXISTS `cpl`;

CREATE TABLE `cpl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpl_kd` varchar(255) NOT NULL,
  `cpl_kategori` enum('Sikap','Pengetahuan','Keterampilan Umum','Keterampilan Khusus') NOT NULL,
  `cpl_deskripsi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cpl` */

insert  into `cpl`(`id`,`cpl_kd`,`cpl_kategori`,`cpl_deskripsi`) values 
(1,'S01','Sikap','Bertakwa Kepada Tuhan Yang Maha Esa dan Mampu Menunjuka Sikap Religius'),
(2,'P01','Pengetahuan','Memahami pengetahuan tentang ilmu kelautan dan/atau teknologi kelautan dan mampu mengaplikasikannya sesuai dengan bidang keilmuannya masing-masing'),
(3,'KU01','Keterampilan Umum','Mampu menerapkan pemikiran logis, kritis, sistematis, dan inovatif dalam konteks pengembangan implementasi ilmu pengetahuan dan teknologi yang memperhatikan dan menerapkan nilai humaniora yang sesuai dengan bidang keahliannya.'),
(4,'KK01','Keterampilan Khusus','Membangun aplikasi perangkat lunak yang berkaitan dengan pengetahuan ilmu computer'),
(8,'S02','Sikap','Menjunjung tinggi nilai kemanusiaan dalam menjalankan tugas berdasarkan agama,moral, dan etika'),
(9,'KK02','Keterampilan Khusus','Menulis kode yang diperlukan untuk digunakan sebagai instruksi dalam membangun aplikasi komputer pada berbagai platform'),
(10,'S04','Sikap','Berperan sebagai warga negara yang bangga dan cinta tanah air, memiliki nasionalisme serta rasa tanggungjawab pada negara dan bangsa'),
(11,'S09','Sikap','Menunjukkan sikap bertanggungjawab atas pekerjaan di bidang keahliannya secara mandiri'),
(12,'KU03','Keterampilan Umum','Mampu mengkaji implikasi pengembangan atau implementasi ilmu pengetahuan teknologi yang memperhatikan dan menerapkan nilai humaniora sesuai dengan keahliannya berdasarkan kaidah, tata cara dan etika ilmiah dalam rangka menghasilkan solusi, gagasan, desain atau kritik seni, menyusun deskripsi saintifik hasil kajiannya dalam bentuk skripsi atau laporan tugas akhir, dan mengunggahnya dalam laman perguruan tinggi'),
(13,'P07','Pengetahuan','Menguasai konsep-konsep bahasa pemrograman, serta mampu membandingkan berbagai solusi serta berbagai model bahasa pemrograman'),
(14,'P13','Pengetahuan','Menguasai bahasa dan algoritma pemrograman yang berkaitan dengan program aplikasi untuk memanipulasi model gambar, grafis dan citra'),
(16,'S05','Sikap','Menghargai keanekaragaman budaya, pandangan, agama, dan kepercayaan, serta pendapat atau temuan orisinal orang lain'),
(17,'S06','Sikap','Bekerja sama dan memiliki kepekaan sosial serta kepedulian terhadap masyarakat dan lingkungan'),
(18,'S07','Sikap','Taat hukum dan disiplin dalam kehidupan bermasyarakat dan bernegara'),
(19,'S08','Sikap','Menginternalisasi nilai, norma, dan etika akademik'),
(20,'S10','Sikap','Menginternalisasi semangat kemandirian, kejuangan, dan kewirausahaan'),
(21,'S11','Sikap','Bersikap proaktif, berorientasi pada tindakan, beradaptasi dan bersinergi disetiap kondisi apapun dalam masyarakat dan lingkungannya'),
(22,'S12','Sikap','Memiliki rasa keingintahuan ang tinggi dalam rangka pengembanga ipteks'),
(23,'S03','Sikap','Berkontribusi dalam peningkatan mutu kehidupan bermasyarakat, berbangsa, bernegara, dan kemajuan peradaban berdasarkan Pancasila'),
(24,'P02','Pengetahuan','Menguasai konsep-konsep matematika untuk memecahkan berbagai masalah yang berkaitan dengan logika'),
(25,'P03','Pengetahuan','Menguasai prinsip-prinsip pemodelan matematika, program linear serta metode numerik'),
(26,'P04','Pengetahuan','Menguasai konsep dan ilmu probabilitas dan statistik untuk mendukung dan menganalisis sistem komputasi'),
(27,'P05','Pengetahuan','Menguasai konsep dan teori konsep-konsep struktur diskrit, yang meliputi materi dasar matematika yang digunakan untuk memodelkan dan menganalisis sistem komputasi'),
(28,'P06','Pengetahuan','Menguasai teori dan konsep yang mendasari ilmu komputer'),
(29,'P08','Pengetahuan','Memahami teori dasar arsitektur komputer, termasuk perangkat keras komputer dan jaringan'),
(30,'P09','Pengetahuan','Menguasai bidang fokus pengetahuan ilmu komputer serta mampu beradaptasi dengan perkembangan ilmu pengetahuan dan teknologi'),
(31,'KU02','Keterampilan Umum','Mampu menunjukkan kinerja mandiri, bermutu, dan terukur'),
(32,'KU04','Keterampilan Umum','Menyusun deskripsi saintifik hasil kajian tersebut di atas dalam bentuk skripsi atau laporan tugas akhir, dan mengunggahnya dalam laman perguruan tinggi'),
(33,'KU05','Keterampilan Umum','Mampu mengambil keputusan secara tepat dalam konteks penyelesaian masalah di bidang keahliannya, berdasarkan hasil analisis informasi dan data'),
(34,'KU06','Keterampilan Umum','Mampu memelihara dan mengembang-kan jaringan kerja dengan pembimbing, kolega, sejawat baik di dalam maupun di luar lembaganya'),
(35,'KU07','Keterampilan Umum','Mampu bertanggungjawab atas pencapaian hasil kerja kelompok dan melakukan supervisi dan evaluasi terhadap penyelesaian pekerjaan yang ditugaskan kepada pekerja yang berada di bawah tanggungjawabnya'),
(36,'KU08','Keterampilan Umum','Mampu melakukan proses evaluasi diri terhadap kelompok kerja yang berada dibawah tanggung jawabnya, dan mampu mengelola pembelajaran secara mandiri'),
(37,'KU09','Keterampilan Umum','Mampu mendokumentasikan, menyimpan, mengamankan, dan menemukan kembali data untuk menjamin kesahihan dan mencegah plagiasi'),
(38,'KU10','Keterampilan Umum','Mampu berkomunikasi dengan efektif dalam masyarakat dan lingkungan'),
(39,'KU11','Keterampilan Umum','Mampu berbahasa Inggris dengan baik'),
(40,'KU12','Keterampilan Umum','Mampu memahami, menggunakan dan memanfaatkan Teknologi Informasi di masyarakat dan lingkungannya dengan bijak'),
(41,'KU13','Keterampilan Umum','Mampu mengembangkan potensi diri sesuai minat bakat yang dimiliki'),
(42,'KK03','Keterampilan Khusus','Memanfaatkan pengetahuan yang dimiliki berkaitan dengan konsep-konsep dasar pengembangan perangkat lunak dan kecakapan yang berhubungan dengan proses pengembangan perangkat lunak, serta mampu membuat program untuk meningkatkan efektivitas penggunaan komputer untuk memecahkan masalah tertentu'),
(43,'KK04','Keterampilan Khusus','Merancang dan mengembangkan program aplikasi untuk memanipulasi model gambar, grafis dan citra, serta dapat memvisualisasikannya'),
(44,'KK05','Keterampilan Khusus','Membangun dan mengevaluasi perangkat lunak dalam berbagai area, termasuk yang berkaitan dengan interaksi antara manusia dan komputer'),
(45,'KK06','Keterampilan Khusus','Membangun aplikasi perangkat lunak dalam berbagai area yang berkaitan dengan bidang robotik, pengenalan suara, sistem cerdas'),
(46,'KK07','Keterampilan Khusus','Menerapkan konsep-konsep yang berkaitan dengan manajemen informasi, termasuk menyusun pemodelan dan abstraksi data serta membangun aplikasi perangkat lunak untuk pengorganisasian data dan penjaminan keamanan akses data'),
(47,'KK08','Keterampilan Khusus','Menganalisis, merancang, dan menerapkan suatu sistem berbasis komputer secara efisien untuk menyelesaikan masalah, menggunakan pemrograman prosedural dan berorientasi objek'),
(48,'KK09','Keterampilan Khusus','Membangun sistem jaringan komputer dan sistem keamanannya serta melakukan pengelolaan secara kontinu terhadap proteksi profil yang ada'),
(49,'KK10','Keterampilan Khusus','Menganalisis dan mengembangkan sistem serta prosedur yang berkaitan dengan sistem komuter serta memberikan rekomendasi ang berkaitan dengan sistem komputer yang lebih efisien dan efektif'),
(50,'KK11','Keterampilan Khusus','Menerapkan konsep-konsep yang berkaitan dengan arsitektur dan organisasi komputer serta memanfaatkannya untuk menunjang aplikasi komputer'),
(51,'KK12','Keterampilan Khusus','Menerapkan konsep-konsep yang berkaitan dengan pengembangan berbasis platform serta mampu mengembangkan program aplikasi berbasis platform untuk berbagai area'),
(52,'KK13','Keterampilan Khusus','menerapkan konsep-konsep yang berkaitan dengan sensor dan mikrokontroler serta mampu mengembangkan suatu alat yang dapat memberikan informasi dan reaksi terhadap lingkungan atau kelautan menggunakan kemampuan Internet of Things'),
(53,'KK14','Keterampilan Khusus','Menggunakan teknologi informasi (Medsos, Adsense, dll) untuk meningkatkan pemasaran produk/jasa');

/*Table structure for table `cplmk` */

DROP TABLE IF EXISTS `cplmk`;

CREATE TABLE `cplmk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_nilai_mk` int(11) NOT NULL,
  `id_cpl` int(11) NOT NULL,
  `n_cplmk` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cplmk` */

insert  into `cplmk`(`id`,`id_nilai_mk`,`id_cpl`,`n_cplmk`) values 
(1,1,1,70),
(2,1,2,90),
(3,1,3,67),
(4,5,4,80),
(5,1,10,23),
(6,5,1,89),
(7,25,11,89),
(8,25,12,70),
(9,25,13,70),
(10,25,14,70),
(11,25,9,70),
(12,25,15,70),
(13,26,50,78),
(14,26,39,67),
(15,27,21,70),
(16,27,36,89),
(17,26,11,70),
(18,26,13,87),
(19,27,50,98),
(20,27,39,87),
(21,7,4,70),
(22,7,49,80),
(23,8,4,87),
(24,8,49,67),
(25,3,4,67),
(26,3,49,70),
(27,27,11,89),
(32,35,11,67),
(33,35,50,70),
(34,36,39,70),
(35,36,11,89),
(36,37,4,70),
(37,39,4,80);

/*Table structure for table `dosen` */

DROP TABLE IF EXISTS `dosen`;

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dsn_nid` varchar(255) NOT NULL,
  `dsn_nama` varchar(255) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `dsn_status` enum('Aktif','Non Aktif') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `dosen` */

insert  into `dosen`(`id`,`dsn_nid`,`dsn_nama`,`fk_id`,`prd_id`,`dsn_status`) values 
(1,'00001','Istiqomah Sumadikarta',1,1,'Aktif'),
(2,'00002','Bosar Panjaitan',1,1,'Aktif'),
(4,'00003','Zulkifli',1,1,'Aktif'),
(5,'00004','Safrizal',1,1,'Aktif'),
(6,'00005','Faizal Zuli',1,1,'Aktif');

/*Table structure for table `fakultas` */

DROP TABLE IF EXISTS `fakultas`;

CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `fakultas` */

insert  into `fakultas`(`id`,`fk_nama`) values 
(1,'Teknik'),
(2,'Ekonomi'),
(3,'FISIP'),
(4,'Perikanan');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prd_id` int(11) NOT NULL,
  `dsn_id` int(11) NOT NULL,
  `kelas_nama` varchar(255) NOT NULL,
  `mk_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kelas` */

insert  into `kelas`(`id`,`prd_id`,`dsn_id`,`kelas_nama`,`mk_id`) values 
(1,1,1,'Algoritma dan Pemrograman',20),
(2,1,1,'Pemrograman Web',37),
(3,1,2,'Matematika Diskrit',34),
(4,1,2,'Matematika Dasar',22),
(5,1,4,'Organisasi dan Arsitektur Komputer',32),
(6,1,4,'Bahasa Inggris',1),
(7,1,5,'Analisa dan Perancangan Sistem',36),
(8,1,5,'Pengantar Teknologi Informasi',24),
(9,1,6,'Jaringan Komputer',10),
(10,1,6,'Keamanan Jaringan Komputer',43);

/*Table structure for table `mahasiswa` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mhs_nim` varchar(255) NOT NULL,
  `mhs_nama` varchar(255) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `dsn_id` int(11) NOT NULL,
  `mhs_status` enum('Aktif','Non Aktif') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mahasiswa` */

insert  into `mahasiswa`(`id`,`mhs_nim`,`mhs_nama`,`kelas_id`,`fk_id`,`prd_id`,`dsn_id`,`mhs_status`) values 
(1,'011601503125139','Dony Tanu Wijaya',1,1,1,1,'Aktif'),
(2,'011601503125140','DB Unknown',1,1,2,2,'Aktif'),
(3,'011601503125141','Unknown DB',1,3,7,8,'Aktif'),
(4,'011601503125142','Unknown',1,4,10,10,'Aktif'),
(7,'011601503125138','Lorem',1,1,2,5,'Aktif'),
(11,'011601503125139','Dony Tanu Wijaya',2,1,1,1,'Aktif'),
(12,'011601503125140','DB Unknown',2,1,2,2,'Aktif'),
(13,'011601503125141','Unknown DB',2,1,3,5,'Aktif'),
(14,'011601503125142','Unknown',2,1,4,6,'Aktif'),
(15,'011601503125138','Lorem',2,1,2,5,'Aktif');

/*Table structure for table `matakuliah` */

DROP TABLE IF EXISTS `matakuliah`;

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `cpl` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4;

/*Data for the table `matakuliah` */

insert  into `matakuliah`(`id`,`mk_smt`,`prd_id`,`mk_kd`,`mk_nama`,`mk_sks`,`mk_prasyarat`,`mk_keterangan`,`bobot_absen`,`bobot_tugas`,`bobot_uts`,`bobot_uas`,`cpl`) values 
(1,'1',1,'UN192003','Bahasa Inggris',2,'','Wajib Universitas',10,20,30,40,'4,9'),
(2,'6',1,'TI123006','Interaksi Manusia dan Komputer',3,'Pemrograman Web','Wajib Prodi',0,20,30,50,NULL),
(3,'1',1,'UN192006','Pancasila',2,'','Wajib Universitas',10,20,30,40,NULL),
(5,'7',1,'TI172029','Riset Teknologi Informasi',2,'Kecerdasan Buatan','',10,20,30,40,NULL),
(6,'2',1,'UN192004','Kewarganegaraan',2,'','Wajib Universitas',10,20,30,40,NULL),
(8,'2',1,'TI1133012','Sistem Digital',3,'','Wajib Prodi',10,20,30,40,NULL),
(9,'3',1,'Ti115171','Bahasa Inggris Teknik',2,'Bahasa Inggris','Wajib Prodi',10,20,30,40,NULL),
(10,'3',1,'TI133008','Jaringan Komputer',3,'Komunikasi Data','Wajib Prodi',10,20,30,40,NULL),
(11,'4',1,'TI113004','Sistem Operasi',3,'Organisasi Arsitektur dan Komputer','Wajib Prodi',10,20,30,40,NULL),
(12,'4',1,'TI115119','Teori Graf dan Bahasa Automata',3,'Matematika DIskrit','Wajib Prodi',10,20,30,40,NULL),
(13,'5',1,'FT193007','Technopreneurship',3,'Kewirausahaan','Wajib Fakultas',10,20,30,40,NULL),
(14,'5',1,'TI115181','Grafik Komputer',3,'Pemrograman Berorientasi Objek','Wajibi Prodi',10,20,30,40,NULL),
(15,'6',1,'TI393003','Machine Learning',3,'Kecerdasan Buatan','Wajib Prodi',10,20,30,40,NULL),
(20,'1',1,'TI113001','Algoritma dan Pemrograman',3,'','Wajib Prodi',10,20,30,40,NULL),
(21,'1',1,'UN192002','Bahasa Indonesia',2,'','Wajib Universitas',10,20,30,40,NULL),
(22,'1',1,'TI113002','Matermatika Dasar',3,'','Wajib Prodi',10,20,30,40,NULL),
(23,'1',1,'FT192003','Kecapakan Antar Personal',2,'','Wajib Fakultas',10,20,30,40,NULL),
(24,'1',1,'TI113003','Pengantar Teknologi Informasi',3,'','Wajib Prodi',10,20,30,40,NULL),
(25,'1',1,'TI123007','Komunikasi Data',3,'','Wajib Prodi',10,20,30,40,NULL),
(27,'2',1,'TI123005','Basis Data',3,'','Wajib Prodi',10,20,30,40,NULL),
(28,'2',1,'FT193006','Statistik',3,'','Wajib Fakultas',10,20,30,40,NULL),
(29,'2',1,'FT193002','Kalkulus',3,'','Wajib Fakultas',10,20,30,40,NULL),
(30,'2',1,'TI133014','Struktur Data',3,'','Wajib Prodi',10,20,30,40,NULL),
(31,'3',1,'TI133009','Kumputasi Numerik',3,'Kalkulus','Wajib Prodi',10,20,30,40,NULL),
(32,'3',1,'TI133010','Organisasi dan Arsitektur Komputer',3,'Pengantar Teknologi Informasi','Wajib Prodi',10,20,30,40,NULL),
(33,'3',1,'TI133011','Pemrograman Berorientasi Objek',3,'Algoritma dan Pemrograman','Wajib Prodi',10,20,30,40,NULL),
(34,'3',1,'TI143016','Matematika Diskrit',3,'Matematika Dasar','Lintas Prodi',10,20,30,40,NULL),
(35,'3',1,'TI153021','Aljabar Linear',3,'Matematika Dasar','Wajib Prodi',10,20,30,40,NULL),
(36,'4',1,'TI143015','Analisa dan Perancangan Sistem',3,'Organisasi Arsitektur dan Komputer','Wajib Prodi',10,20,30,40,NULL),
(37,'4',1,'TI143018','Pemrograman Web',3,'Algoritma dan Pemrograman','Wajib Prodi',10,20,30,40,NULL),
(38,'4',1,'TI143019','Sistem Terdistribusi',3,'Basis Data','Wajib Prodi',10,20,30,40,NULL),
(39,'4',1,'TI153024','Kecerdasan Buatan',3,'Statistik','Wajib Prodi',10,20,30,40,NULL),
(40,'4',1,'UN193005','Kewirausahaan',3,'','Wajib Universitas',10,20,30,40,NULL),
(41,'5',1,'TI114017','Pemrograman Jaringan',3,'Pemrograman Berorientasi Objek','Wajib Prodi',10,20,30,40,NULL),
(42,'5',1,'TI115022','Data Mining',3,'Basis Data','Wajib Prodi',10,20,30,40,NULL),
(43,'5',1,'TI115023','Keamanan Jaringan Komputer',3,'Jaringan Komputer','Wajib Prodi',10,20,30,40,NULL),
(44,'5',1,'TI153025','Rekayasa Perangkat Lunak',3,'Analisa dan Perancangan SIstem','Wajib Prodi',10,20,30,40,NULL),
(45,'5',1,'TI163026','Manajemen Proyek Perangkat Lunak',3,'Analisa dan Perancangan SIstem','Wajib Prodi',10,20,30,40,NULL),
(46,'6',1,'FT192001','Etika Bisnis dan Profesi',2,'','Wajib Fakultas',10,20,30,40,NULL),
(47,'7',1,'FT193005','Pemodelan dan Simulasi',3,'Statistik, Aljabar Linier','',10,20,30,40,NULL),
(48,'8',1,'TI186030','Skripsi',6,'Riset Teknologi Informasi, Minimal 120 SKS, dan menyelesaikan 133 SKS sebelum sidang','Wajib Prodi',10,20,30,40,NULL),
(49,'6',1,'TI393001','Kriptografi',3,'','Mata Kuliah Pilihan',10,20,30,40,NULL),
(50,'6',1,'TI393002','Pemrograman Perangkat Mobile',3,'','Mata Kuliah Pilihan',10,20,30,40,NULL),
(51,'6',1,'PS163023','Sistem Informasi Geografis Kelautan',3,'','Mata Kuliah Pilihan',10,20,30,40,NULL),
(52,'6',1,'TI393006','Pemrograman Game',3,'','Mata Kuliah Pilihan',0,0,0,0,NULL),
(53,'6',1,'TL133014','Menggambar Teknik',3,'','Mata Kuliah Pilihan',10,20,30,40,NULL),
(54,'6',1,'TI133013','SistemTemu Balik Informasi',3,'','Mata Kuliah Pilihan',10,20,30,40,NULL),
(55,'6',1,'TI151192','Perancangan dan Manajemen Jaringan',3,'','Mata Kuliah Pilihan',10,20,30,40,NULL),
(56,'7',1,'TI115179','Sistem Pakar',3,'','Mata Kuliah Pilihan',10,20,30,40,NULL),
(57,'7',1,'TI163027','Metodologi Penelitian',3,'','Mata Kuliah Pilihan',10,20,30,40,NULL),
(58,'7',1,'FT193008','Teknik Riset Operasi',3,'','Mata Kuliah Pilihan',10,20,30,40,NULL),
(59,'7',1,'SI183024','Big Data',4,'','Mata Kuliah Pilihan',10,20,30,40,NULL),
(60,'7',1,'TI393004','Pengolahan Citra Digital',4,'','Mata Kuliah Pilihan',10,20,30,40,NULL),
(61,'7',1,'TI393005','Internet of Things',4,'','Mata Kuliah Pilihan',10,20,30,40,NULL),
(62,'7',1,'TI143020','Software Quality Assurance',3,'','Mata Kuliah Pilihan',10,20,30,40,NULL),
(63,'7',1,'SI163017','Evaluasi dan Audit Sistem Informasi',3,'','Mata Kuliah Pilihan',10,20,30,40,NULL),
(64,'7',1,'TI215161','Teknologi Antar Jaringan',3,'','Mata Kuliah Pilihan',10,20,30,40,NULL),
(65,'2',1,'UN192101','Agama Islam',2,'','Wajib Universitas',10,20,30,40,NULL),
(66,'2',1,'UN192201','Agama Kristen Protestan',2,'','Wajib Universitas',10,20,30,40,NULL),
(67,'2',1,'UN192301','Agama Kristen Katolik',2,'','Wajib Universitas',10,20,30,40,NULL),
(68,'2',1,'UN192401','Agama Hindu',2,'','Wajib Universitas',10,20,30,40,NULL),
(69,'2',1,'UN192501','Agama Budha',2,'','Wajib Universitas',10,20,30,40,NULL),
(70,'2',1,'UN192601','Agama Konghucu',2,'','Wajib Universitas',10,20,30,40,NULL);

/*Table structure for table `nilai_cpl` */

DROP TABLE IF EXISTS `nilai_cpl`;

CREATE TABLE `nilai_cpl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) DEFAULT NULL,
  `id_cpl` int(11) DEFAULT NULL,
  `n_cpl` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `nilai_cpl` */

insert  into `nilai_cpl`(`id`,`id_mhs`,`id_cpl`,`n_cpl`) values 
(1,1,1,'70'),
(2,1,2,'80'),
(3,2,1,'57'),
(4,2,2,'76'),
(5,3,1,'65'),
(6,3,2,'87');

/*Table structure for table `nilai_mk` */

DROP TABLE IF EXISTS `nilai_mk`;

CREATE TABLE `nilai_mk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mk` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `n_absen` varchar(11) NOT NULL,
  `n_tugas` varchar(11) NOT NULL,
  `n_uts` varchar(11) NOT NULL,
  `n_uas` varchar(11) NOT NULL,
  `n_akumulasi` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;

/*Data for the table `nilai_mk` */

insert  into `nilai_mk`(`id`,`id_mk`,`id_mhs`,`n_absen`,`n_tugas`,`n_uts`,`n_uas`,`n_akumulasi`) values 
(3,1,3,'0','0','0','0','0'),
(7,5,2,'67','89','87','78','81.8'),
(8,14,2,'90','67','87','78','79.7'),
(22,1,6,'0','0','0','0','0'),
(26,21,1,'80','80','80','80','80'),
(27,1,1,'100','100','50','50','65'),
(28,3,3,'90','100','80','80','85'),
(35,1,7,'90','89','67','87','81.7'),
(36,3,7,'80','23','80','80','68.6'),
(37,3,1,'80','67','80','70','73.4'),
(39,22,1,'80','67','80','80','77.4'),
(40,23,1,'80','66','76','70','72'),
(41,23,7,'80','66','76','70','72'),
(42,25,7,'80','56','80','80','75.2'),
(43,20,7,'70','70','70','70','70'),
(44,37,1,'60','70','80','90','80'),
(45,20,13,'70','60','70','80','72'),
(46,20,2,'70','70','70','70','70'),
(47,20,1,'78','78','78','78','78');

/*Table structure for table `prodi` */

DROP TABLE IF EXISTS `prodi`;

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prd_kd` varchar(255) NOT NULL,
  `prd_jurusan` varchar(255) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `dsn_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

/*Data for the table `prodi` */

insert  into `prodi`(`id`,`prd_kd`,`prd_jurusan`,`fk_id`,`dsn_id`) values 
(1,'T1','Teknik Informatika',1,4),
(2,'T2','Sistem Informasi',1,4),
(3,'T3','Teknik Lingkungan',1,4),
(4,'T4','Manajemen Informasi',1,4),
(7,'F1','Ilmu Hubungan Internasional',3,8),
(8,'F2','Ilmu Komunikasi',3,8),
(9,'F3','Hukum',3,8),
(10,'P1','Pemanfaatan Sumber Daya Perikanan',4,11),
(11,'P2','Akuakultur',4,11);

/*Table structure for table `tamu` */

DROP TABLE IF EXISTS `tamu`;

CREATE TABLE `tamu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `tujuan` text NOT NULL,
  `tgl_datang` date NOT NULL,
  `tgl_pulang` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tamu` */

insert  into `tamu`(`id`,`nik`,`nama`,`alamat`,`telp`,`photo`,`tujuan`,`tgl_datang`,`tgl_pulang`) values 
(4,'576545645465454','Rizky Kuntoro','pondok aren','089767685622','2023-06-02-36740305029700033-437.png','main aja','2023-06-02','2023-06-02');

/*Table structure for table `tentang` */

DROP TABLE IF EXISTS `tentang`;

CREATE TABLE `tentang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_aplikasi` varchar(100) DEFAULT NULL,
  `logo_aplikasi` varchar(255) DEFAULT NULL,
  `tentang_aplikasi` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tentang` */

insert  into `tentang`(`id`,`nama_aplikasi`,`logo_aplikasi`,`tentang_aplikasi`) values 
(1,'Aplikasi Evaluasi Capaian Pembelajaran Lulusan','12578502.png','<div style=\"\" courier=\"\" new\",=\"\" monospace;=\"\" font-size:=\"\" 14px;=\"\" line-height:=\"\" 19px;=\"\" white-space:=\"\" pre;\"=\"\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloremque accusantium error temporibus neque eum vero dignissimos facilis! Eaque placeat laborum nisi ea laudantium. Veniam, fugit. Fugiat qui nulla eaque iste?</div>');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `no_telp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`fullname`,`username`,`password`,`photo`,`status`,`role`,`created_by`,`created_at`,`updated_by`,`updated_at`,`nik`,`tempat_lahir`,`tgl_lahir`,`agama`,`kewarganegaraan`,`gender`,`no_telp`) values 
(9,'Super Admin','admin','$2y$10$5sfoiew1iJ0DLpBTM.O5UOauIYqELVZ3ShqxWLYgKVrQMQy4X9alO','9-superadmin.png','active','superadmin',1,'2023-05-31 11:05:03',9,'2023-07-16 19:21:53','','','','','','laki-laki',''),
(11,'Istiqomah Sumadikarta','00001','$2y$10$BOA2wmETl5an1JgQG4Pnfed4gpWbNxjuPbmLinvvwdlv3nb2dyXlS','9-superadmin.png','active','dosen',9,'2023-05-31 14:41:44',9,'2023-07-25 20:12:58','','','','','','laki-laki',''),
(13,'Dony Tanu Wijaya','011601503125139','$2y$10$J/4lKLvb.njyBqDh2q.MqOQuj63Xe3zTE61TjT24BaqSK/UI8N8r6','13-mahasiswa.jpg','active','mahasiswa',9,'2023-07-09 02:15:55',13,'2023-07-31 21:46:53','3174010906960002','Jakarta','1996-06-09','Islam','Indonesia','laki-laki','085860037837'),
(14,'DB Unknown','011601503125140','$2y$10$CG9qToP7Ev1MXUj/wfQ5xOUj.Iz0U2pugnTsNBDDcfv8M.vEN5cT2','9-superadmin.png','active','mahasiswa',9,'2023-07-26 01:03:09',9,'2023-07-25 20:13:28','','','','','','laki-laki',''),
(15,'Lorem','011601503125138','$2y$10$N95Z1tPlxOiCmaC6V8NK5.gJeJSIbXk8AVjAkYsC6.y1pZMZM4/Ty','9-superadmin.png','active','mahasiswa',9,'2023-07-26 01:34:26',NULL,NULL,'','','','','','laki-laki',''),
(16,'Zulkifli','00003','$2y$10$OTomExGQ6NhyKP.t2kOlvONjGdUkgEmYk7ZQOPNb/gnI785yquf86','9-superadmin.jpg','active','prodi',9,'2023-07-29 06:41:24',16,'2023-07-31 21:43:23','3174010906960002','','','','','laki-laki',''),
(17,'admin2','admin2','$2y$10$CKh5LdHFoFrYeYv7bG0/6OyEXjxPcjHiqjkrgY0QCK611wfs5R0WC','17-superadmin.png','active','superadmin',9,'2023-07-30 04:26:15',17,'2023-07-31 21:39:55','3174010906960002','Jakarta','1996-06-09','Islam','Indonesia','perempuan','085860037837'),
(19,'Agung','00004','$2y$10$kSO.ipgjFNg/it0Gt31BOetfMImQ4iOvCiA/SLZA4EfT/AtxpJ326','9-superadmin.png','active','dosen',9,'2023-07-30 23:52:50',9,'2023-07-30 19:35:08','','','','','','laki-laki',''),
(20,'Bosar Panjaitan','00002','$2y$10$1qa7HHjBARXprL58xv4c..NXEd/fRV/XlmAWDmOzN4FTNzo9Vl4SG','9-superadmin.png','active','dosen',9,'2023-07-30 23:55:09',9,'2023-07-30 19:35:16','','','','','','laki-laki',''),
(26,'Faizal Zuli','00005','$2y$10$VbJ9lQOX.GcT.zGrGtF5DO3Npg4/vnV8PL01lcMy07Dan3PtO45M6','9-superadmin.png','active','dosen',9,'2023-08-02 18:25:43',NULL,NULL,'','','','','','laki-laki',''),
(27,'DB Unknown 41','011601503125141','$2y$10$CG9qToP7Ev1MXUj/wfQ5xOUj.Iz0U2pugnTsNBDDcfv8M.vEN5cT2','9-superadmin.png','active','mahasiswa',9,'2023-07-26 01:03:09',9,'2023-07-25 20:13:28','','','','','','laki-laki',''),
(28,'DB Unknown 42','011601503125142','$2y$10$CG9qToP7Ev1MXUj/wfQ5xOUj.Iz0U2pugnTsNBDDcfv8M.vEN5cT2','9-superadmin.png','active','mahasiswa',9,'2023-07-26 01:03:09',9,'2023-07-25 20:13:28','','','','','','laki-laki','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
