-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2025 at 02:37 AM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survei_kepuasan_masyarakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password_hash`) VALUES
(2, 'adminsimpelmas', '$2y$10$IGmEtAJOSbs00Zm74Z/qCu.Tv7IgJj1gtE9JEVYozeCHMys/wP4G2');

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE `question_options` (
  `option_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `option_value` int(11) DEFAULT NULL,
  `option_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`option_id`, `question_id`, `option_value`, `option_text`) VALUES
(1, 1, 4, 'Sangat Memadai'),
(2, 1, 3, 'Memadai'),
(3, 1, 2, 'Tidak Memadai'),
(4, 1, 1, 'Sangat Tidak  Memadai'),
(5, 2, 4, 'Sangat Terlihat'),
(6, 2, 3, 'Cukup Terlihat'),
(7, 2, 2, 'Tidak Terlihat'),
(8, 2, 1, 'Sangat Tidak Terlihat'),
(9, 3, 4, 'Sesuai'),
(10, 3, 3, 'Sebagian Besar Sesuai'),
(11, 3, 2, 'Sebagian Kecil Sesuai'),
(12, 3, 1, 'Tidak Sesuai'),
(13, 4, 4, 'Sangat Mudah'),
(14, 4, 3, 'Mudah'),
(15, 4, 2, 'Tidak Mudah'),
(16, 4, 1, 'Sangat Tidak Mudah'),
(17, 5, 4, 'Sangat Memadai'),
(18, 5, 3, 'Memadai'),
(19, 5, 2, 'Tidak Memadai'),
(20, 5, 1, 'Sangat Tidak  Memadai'),
(21, 6, 4, 'Sangat Memadai'),
(22, 6, 3, 'Memadai'),
(23, 6, 2, 'Tidak Memadai'),
(24, 6, 1, 'Sangat Tidak  Memadai'),
(25, 7, 4, 'Sangat Terlihat'),
(26, 7, 3, 'Terlihat'),
(27, 7, 2, 'Tidak Terlihat'),
(28, 7, 1, 'Sangat Tidak Terlihat'),
(29, 8, 4, 'Seluruhnya Sesuai'),
(30, 8, 3, 'Sebagian Besar Sesuai'),
(31, 8, 2, 'Sebagian Kecil Sesuai'),
(32, 8, 1, 'Seluruhnya tidak sesuai'),
(33, 9, 4, 'Sangat Jelas'),
(34, 9, 3, 'Cukup Jelas'),
(35, 9, 2, 'Tidak Jelas'),
(36, 9, 1, 'Sangat Tidak Jelas'),
(37, 10, 4, 'Sangat Jelas'),
(38, 10, 3, 'Cukup Jelas'),
(39, 10, 2, 'Tidak Jelas'),
(40, 10, 1, 'Sangat Tidak Jelas'),
(41, 11, 4, 'Lebih Cepat Dari Jadwal'),
(42, 11, 3, 'Sesuai Dengan Jadwal'),
(43, 11, 2, 'Sedikit Lebih Lambat Dari Jadwal'),
(44, 11, 1, 'Sering Melebihi Jadwal'),
(45, 12, 4, 'Sangat Cepat'),
(46, 12, 3, 'Cepat'),
(47, 12, 2, 'Lambat'),
(48, 12, 1, 'Sangat Lambat'),
(49, 13, 4, 'Sangat Mudah'),
(50, 13, 3, 'Cukup Mudah'),
(51, 13, 2, 'Sulit'),
(52, 13, 1, 'Sangat Sulit'),
(53, 14, 4, 'Selalu '),
(54, 14, 3, 'Kadang-Kadang '),
(55, 14, 2, 'Jarang '),
(56, 14, 1, 'Tidak Pernah'),
(57, 15, 4, 'Sangat  Mampu'),
(58, 15, 3, 'Kadang-Kadang Mampu'),
(59, 15, 2, 'Jarang Mampu'),
(60, 15, 1, 'Tidak Mampu'),
(61, 16, 4, 'Sangat Mampu'),
(62, 16, 3, 'Mampu'),
(63, 16, 2, 'Kurang Mampu'),
(64, 16, 1, 'Tidak Mampu'),
(65, 17, 4, 'Sangat Memadai'),
(66, 17, 3, 'Cukup Memadai'),
(67, 17, 2, 'Tidak Memadai'),
(68, 17, 1, 'Sangat Tidak Memadai'),
(69, 18, 4, 'Sangat Memadai'),
(70, 18, 3, 'Cukup Memadai'),
(71, 18, 2, 'Tidak Memadai'),
(72, 18, 1, 'Sangat Tidak Memadai'),
(73, 19, 4, 'Sangat Memadai'),
(74, 19, 3, 'Cukup Memadai'),
(75, 19, 2, 'Tidak Memadai'),
(76, 19, 1, 'Sangat Tidak Memadai'),
(77, 20, 4, 'Sangat Memadai'),
(78, 20, 3, 'Cukup Memadai'),
(79, 20, 2, 'Tidak Memadai'),
(80, 20, 1, 'Sangat Tidak  Memadai'),
(81, 21, 4, 'Sangat Memadai'),
(82, 21, 3, 'Cukup Memadai'),
(83, 21, 2, 'Tidak Memadai'),
(84, 21, 1, 'Sangat Tidak Memadai'),
(85, 22, 4, 'Sangat Memadai'),
(86, 22, 3, 'Cukup Memadai'),
(87, 22, 2, 'Tidak Memadai'),
(88, 22, 1, 'Sangat Tidak Memadai'),
(89, 23, 4, 'Sangat Lengkap'),
(90, 23, 3, 'Cukup Lengkap'),
(91, 23, 2, 'Tidak Lengkap'),
(92, 23, 1, 'Sangat Tidak Lengkap'),
(93, 24, 1, 'Tidak Pernah'),
(94, 24, 2, '1 Kali'),
(95, 24, 3, '2 s.d. 3 Kali'),
(96, 24, 4, 'Lebih Dari 3 Kali'),
(97, 25, 4, 'Sangat Mudah '),
(98, 25, 3, 'Cukup Mudah '),
(99, 25, 2, 'Lambat '),
(100, 25, 1, 'Sangat Lambat'),
(101, 26, 4, 'Sangat Cepat'),
(102, 26, 3, 'Cukup Cepat'),
(103, 26, 2, ' Lambat'),
(104, 26, 1, 'Sangat Lambat'),
(105, 27, 4, 'Sangat Baik'),
(106, 27, 3, 'Cukup Baik'),
(107, 27, 2, 'Tidak Baik'),
(108, 27, 1, 'Sangat Tidak Baik'),
(109, 28, 4, 'Tidak Ada'),
(110, 28, 3, 'Sebagan Besar Tdak Ada'),
(111, 28, 2, 'Sebagian Kecil Ada'),
(112, 28, 1, 'Ada'),
(113, 29, 4, 'Tidak Ada'),
(114, 29, 3, 'Sebagan Besar Tdak Ada'),
(115, 29, 2, 'Sebagian Kecil Ada'),
(116, 29, 1, 'Ada'),
(117, 30, 4, 'Tidak Ada'),
(118, 30, 3, 'Sebagan Besar Tdak Ada'),
(119, 30, 2, 'Sebagian Kecil Ada'),
(120, 30, 1, 'Ada'),
(121, 31, 4, 'Tidak Ada'),
(122, 31, 3, 'Sebagan Besar Tidak Ada'),
(123, 31, 2, 'Sebagian Kecil Ada'),
(124, 31, 1, 'Ada'),
(125, 32, 4, 'Tidak Ada'),
(126, 32, 3, 'Sebagian Besar Tidak Ada'),
(127, 32, 2, 'Sebagian Kecil Ada'),
(128, 32, 1, 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `respondents`
--

CREATE TABLE `respondents` (
  `respondent_id` int(11) NOT NULL,
  `nama_responden` varchar(100) DEFAULT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `usia` enum('Di Bawah 20 Tahun','21-30 Tahun','31-40 Tahun','41-50 Tahun','Di Atas 50 Tahun') DEFAULT 'Di Bawah 20 Tahun',
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT 'Laki-laki',
  `pendidikan` enum('Sekolah Dasar','Sekolah Lanjut Tingkat Pertama','Sekolah Menengah Atas','Strata 1','Strata 2','Strata 3') DEFAULT 'Sekolah Dasar',
  `pekerjaan` enum('PNS,TNI,POLRI','Pegawai Swasta','Wiraswasta','Pelajar atau Mahasiswa','Lainnya') DEFAULT 'PNS,TNI,POLRI',
  `service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `nama_pelayanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `nama_pelayanan`) VALUES
(1, 'Surat Pernyataan Tidak Pernah Dikenakan Hukuman Disiplin Sedang / Berat'),
(2, 'Pengajuan Tanda Kehormatan Satyalancana Karya Satya'),
(3, 'Surat Pengantar Usul Ijin Belajar'),
(4, 'Surat Izin Cuti'),
(5, 'Permohonan Magang/PKL'),
(6, 'Permohonan Rohaniawan Pembaca Doa'),
(7, 'Rekomendasi Persetujuan Penelitian di Kementerian Agama Kabupaten Jombang'),
(8, 'Permohonan Studi Banding Studi Lapangan Kunjungan Kerja'),
(9, 'Permohonan Magang PPL PKL Mahasiswa, SMK, SMA, MA Sederajat'),
(10, 'Rekomendasi Kegiatan'),
(11, 'Permohonan Audiensi'),
(12, 'Permohonan MOU'),
(13, 'Permohonan Narasumber Kegiatan'),
(14, 'Penawaran / Promosi'),
(15, 'Permohonan Data Informasi'),
(16, 'Rekomendasi Melanjutkan Sekolah/Kuliah Ke Luar Negeri'),
(17, 'Rekomendasi Bantuan Sarana/Prasarana'),
(18, 'Pengajuan Kepala Madrasah Baru'),
(19, 'Rekomendasi Mutasi Siswa Dalam Provinsi'),
(20, 'Rekomendasi Penelitian di Madrasah'),
(21, 'Rekomendasi Lomba Di Madrasah'),
(22, 'Rekomendasi Akreditasi'),
(23, 'Surat Pengantar Kurikulum MA'),
(24, 'Rekomendasi PPDB'),
(25, 'Rekomendasi IKM (Implementasi Kurikulum Merdeka)'),
(26, 'Rekomendasi Mutasi Siswa Ke Luar Provinsi'),
(27, 'Pengesahan Kurikulum'),
(28, 'Rekomendasi untuk syarat pengurusan paspor belajar ke luar negeri'),
(29, 'Rekomendasi Kegiatan Pendidikan (Diklat, seminar, workshop,dll)'),
(30, 'Rekomendasi Izin Tinggal/Belajar Terbatas Bagi Santri/Guru Asing dari Luar Negeri (ITAS) Baru atau Perpanjangan'),
(31, 'Rekomendasi Permohonan Izin Operasional Madrasah Diniyah Takmiliyah Ulya'),
(32, 'Rekomendasi Permohonan Izin Operasional Pendidikan Diniyah Formal '),
(33, 'Rekomendasi Bantuan Untuk Lembaga Pondok Pesantren, Madin, Dan TPQ'),
(34, 'Rekomendasi Izin Penelitian'),
(35, 'Rekomendasi Izin Operasional Pendidikan Kesetaraan Pada Pondok Pesantren Salafiyah Tingkat Ulya'),
(36, 'Rekomendasi Izin Operasional Ma\'had Aly'),
(37, 'Rekomendasi Izin Operasional Satuan Pendidikan Muadalah Pada Pondok Pesantren'),
(38, 'Rekomendasi Melanjutkan Studi ke Luar Negeri bagi Santri Pondok Pesantren'),
(39, 'Pengajuan Rekomendasi untuk syarat pengurusan pasp'),
(40, 'Permohonan Rekomendasi Tahfidz Al Qur\'an'),
(41, 'Permohonan Mutasi Guru'),
(42, 'Rekomendasi Bantuan FKG,KKG, MGMP'),
(43, 'Rekomendasi Bantuan Rekom Sarana Ibadah Direktorat PAI'),
(44, 'Rekomendasi Bantuan MGMP SMP, SMA'),
(45, 'Rekomendasi Penerbitan Paspor Jamaah Haji'),
(46, 'Pembatalan Haji Karena Meninggal Dunia'),
(47, 'Pendaftaran Haji Reguler'),
(48, 'Pelimpahan Porsi'),
(49, 'Permohonan Surat Keterangan Majelis Ta\'lim Terdaftar'),
(50, 'Piagam Masjid'),
(51, 'Piagam Mushola'),
(52, 'Rekomendasi Persetujuan Penelitian di KUA'),
(53, 'Sertifikat Arah Kiblat'),
(54, 'Rekomendasi Bantuan Operasional'),
(55, 'Rekomendasi Pembentukan Lembaga Amil Zakat'),
(56, 'Rekomendasi Pergantian Nadzir'),
(57, 'Perubahan Nadzir Perseorangan'),
(58, 'Rekomendasi Pergantian Nadzir Organisasi/Badan Hukum'),
(59, 'Rekomendasi Izin Tukar Menukar Harta Benda Wakaf'),
(60, 'Rekomendasi Perubahan Peruntukan Wakaf'),
(61, 'Surat Pernyataan Tidak Pernah Dihukum'),
(62, 'Pengajuan Tanda Kehormatan Satyalancana Karya Satya'),
(63, 'Surat Pengantar Usul Ijin Belajar'),
(64, 'Surat Izin Cuti'),
(65, 'Permohonan Pengantar Karis/Karsu'),
(66, 'Pengajuan Berkas Usul Penambahan Gelar Ijazah'),
(67, 'Kenaikan Pangkat'),
(68, 'Usul Mutasi'),
(69, 'Usul Pensiun'),
(70, 'Usul Kenaikan Gaji Berkala (KGB)'),
(71, 'Usul PAK Integrasi'),
(72, 'Ajuan Salah Tingkat'),
(73, 'Ajuan Reaktifasi'),
(74, 'Ajuan Input Emis Kabupaten'),
(75, 'Persetujuan Mutasi GTK'),
(76, 'Persetujuan Penonaktifan Akun Kepala Madrasah'),
(77, 'Persetujuan Pengaktifan Akun Kepala Madrasah'),
(78, 'Layanan Verval Biodata'),
(79, 'Layanan Verval Mutasi & Non Aktif'),
(80, 'Layanan Verval Tunjangan'),
(81, 'Keaktifan Kolektif Madrasah'),
(82, 'Layanan S12d (Perubahan Data Rinci terkait Perubahan TMT)'),
(83, 'Layanan S28 (Surat Pengajuan Riwayat PTK) '),
(84, 'Pengajuan Kepala Madrasah Baru'),
(85, 'Pergantian Kepala Madrasah'),
(86, ' Permintaan Tanda Tangan Kepala Kantor '),
(87, 'Layanan komsultasi Ijin Madrasah Baru'),
(88, 'Layanan Konsultasi BOS dan ERKAM'),
(89, 'Layanan Konsultasi PIP'),
(90, 'Layanan Konsultasi Penggantian jazah Rusak'),
(91, 'Layanan Konsultasi Penggantian jazah Hilang'),
(92, 'Layanan Legislasi Berkas jazah/Berkas Pndidikan Lainnya'),
(93, 'Layanan Konsultasi Permasalahan  Emis'),
(94, 'Layanan Konsultasi Permasalahan Simpatika'),
(95, 'Layanan Konsultasi Kurikulum ');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `survey_id` int(11) NOT NULL,
  `respondent_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `survey_date` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `survey_questions`
--

CREATE TABLE `survey_questions` (
  `question_id` int(11) NOT NULL,
  `survey_type` enum('SKM','IPK') NOT NULL,
  `question_text` text NOT NULL,
  `category_id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_questions`
--

INSERT INTO `survey_questions` (`question_id`, `survey_type`, `question_text`, `category_id`) VALUES
(1, 'SKM', '1. Bagaimana publikasi informasi prosedur/alur pelayanan? ', 1),
(2, 'SKM', '2. Apakah informasi prosedur/alur pelayanan jelas terlihat? ', 1),
(3, 'SKM', '3. Apakah pelaksanaan prosedur/alur pelayanan sesuai dengan yang diinformasikan?', 1),
(4, 'SKM', '4. Apakah prosedur/alur pelayanan mudah dipahami?', 1),
(5, 'SKM', '5. Bagaimana ketersediaan informasi pemenuhan persyaratan', 1),
(6, 'SKM', '6. Bagaimana publikasi informasi persyaratan pelayanan?', 1),
(7, 'SKM', '7. Apakah informasi persyaratan pelayanan jelas terlihat?', 1),
(8, 'SKM', '8. Apakah persyaratan pelayanan sesuai dengan yang diinformasikan?', 1),
(9, 'SKM', '9. Bagaimana penilaian Bapak/Ibu/Saudara mengenai kejelasan informasi tentang biaya pelayanan?', 1),
(10, 'SKM', '10. Apakah publikasi informasi jangka waktu pelayanan terlihat?', 1),
(11, 'SKM', '11. Bagaimana pendapat Bapak/Ibu tentang ketepatan waktu dalam memberikan pelayanan?', 1),
(12, 'SKM', '12. Bagaimana respon petugas/aplikasi begitu juga dengan sistem aplikasi?', 2),
(13, 'SKM', '13. Apakah petugas mudah dikenali (memakai seragam, tanda pengenal, dll)?', 2),
(14, 'SKM', '14. Apakah petugas melayani dengan (senyum, salam, sapa, sopan, dan santun)?', 2),
(15, 'SKM', '15. Apakah petugas mampu menjawab pertanyaan dari pengguna tanpa dibantu petugas lain?', 2),
(16, 'SKM', '16. Apakah petugas mampu memberikan solusi?', 2),
(17, 'SKM', '17. Apakah tersedia ruang khusus pelayanan yang memadai?', 3),
(18, 'SKM', '18. Apakah tersedia ruang tunggu yang memadai?', 3),
(19, 'SKM', '19. Apakah tersedia fasilitas tempat parkir yang memadai?', 3),
(20, 'SKM', '20. Apakah tersedia fasilitas toilet khusus pengguna layanan yang memadai?', 3),
(21, 'SKM', '21. Apakah tersedia fasilitas sarana pengguna layanan berkebutuhan khusus yang memadai?', 3),
(22, 'SKM', '22. Apakah tersedia fasilitas sarana pengaduan yang memadai?', 3),
(23, 'SKM', '23. Menurut Bapak/Ibu/Saudara mengenai ketersediaan sarana prasarana pendukung pemberian pelayanan publik pada unit layanan ini?', 3),
(24, 'SKM', '24. Apakah Bapak/Ibuk/Saudara pernah melakukan pengaduan?', 3),
(25, 'SKM', '25. Apakah prosedur untuk melakukan pengaduan mudah dilakukan?', 4),
(26, 'SKM', '26. Seberapa cepat respon pengaduan yang pernah saudara terima?', 4),
(27, 'SKM', '27. Secara keseluruhan, bagaimana penilaian Bapak/Ibu/Saudara mengenai penanganan pengaduan pada unit layanan ini?', 4),
(28, 'IPK', '1. Apakah menurut penilaian Bapak/Ibu/Saudara terdapat diskriminasi pada unit layanan ini? *[Petugas memberikan pelayanan secara khusus atau membeda-bedakan pelayanan terhadap pengguna layanan yang satu dengan lainnya]', 5),
(29, 'IPK', '2. Apakah menurut penilaian Bapak/Ibu/Saudara terdapat petugas yang memberikan pelayanan di luar prosedur sehingga mengindikasikan kecurangan?', 5),
(30, 'IPK', '3. Apakah menurut penilaian Bapak/Ibu/Saudara terdapat praktik pemberian imbalan uang/barang pada unit layanan ini? [Petugas menerima pemberian uang, barang, atau fasilitas lainnya untuk memperoleh kemudahan/ keistimewaan dari petugas]', 5),
(31, 'IPK', '4. Apakah menurut penilaian Bapak/Ibu/Saudara terdapat praktik pemberian imbalan uang/barang pada unit layanan ini? [Petugas menerima pemberian uang, barang, atau fasilitas lainnya untuk memperoleh kemudahan/ keistimewaan dari petugas]', 5),
(32, 'IPK', '5. Apakah menurut penilaian Bapak/Ibu/Saudara terdapat praktik percaloan/perantara/biro jasa pada unit layanan ini?', 6);

-- --------------------------------------------------------

--
-- Table structure for table `survey_questions_category`
--

CREATE TABLE `survey_questions_category` (
  `category_id` int(1) NOT NULL,
  `category_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `survey_questions_category`
--

INSERT INTO `survey_questions_category` (`category_id`, `category_name`) VALUES
(1, 'Prosedur, Persyaratan, Biaya, dan Waktu'),
(2, 'Performa Petugas'),
(3, 'Sarana dan Prasarana'),
(4, 'Penanganan Pengaduan'),
(5, 'Persepsi Korupsi'),
(6, 'Percaloan');

-- --------------------------------------------------------

--
-- Table structure for table `survey_responses`
--

CREATE TABLE `survey_responses` (
  `response_id` bigint(20) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `response_value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_options`
--
ALTER TABLE `question_options`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `respondents`
--
ALTER TABLE `respondents`
  ADD PRIMARY KEY (`respondent_id`),
  ADD KEY `fk_service_id` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`survey_id`),
  ADD KEY `respondent_id` (`respondent_id`),
  ADD KEY `surveys_ibfk_2` (`service_id`);

--
-- Indexes for table `survey_questions`
--
ALTER TABLE `survey_questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `fk_survey_category_id` (`category_id`);

--
-- Indexes for table `survey_questions_category`
--
ALTER TABLE `survey_questions_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `survey_responses`
--
ALTER TABLE `survey_responses`
  ADD PRIMARY KEY (`response_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `respondents`
--
ALTER TABLE `respondents`
  MODIFY `respondent_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey_questions`
--
ALTER TABLE `survey_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `survey_questions_category`
--
ALTER TABLE `survey_questions_category`
  MODIFY `category_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey_responses`
--
ALTER TABLE `survey_responses`
  MODIFY `response_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question_options`
--
ALTER TABLE `question_options`
  ADD CONSTRAINT `question_options_survey_questions_question_id_fk` FOREIGN KEY (`question_id`) REFERENCES `survey_questions` (`question_id`);

--
-- Constraints for table `surveys`
--
ALTER TABLE `surveys`
  ADD CONSTRAINT `surveys_respondents_respondent_id_fk` FOREIGN KEY (`respondent_id`) REFERENCES `respondents` (`respondent_id`),
  ADD CONSTRAINT `surveys_services_service_id_fk` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`);

--
-- Constraints for table `survey_questions`
--
ALTER TABLE `survey_questions`
  ADD CONSTRAINT `fk_survey_category_id` FOREIGN KEY (`category_id`) REFERENCES `survey_questions_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey_responses`
--
ALTER TABLE `survey_responses`
  ADD CONSTRAINT `survey_responses_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `survey_questions` (`question_id`),
  ADD CONSTRAINT `survey_responses_ibfk_3` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`survey_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
