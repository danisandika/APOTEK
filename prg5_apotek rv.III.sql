-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2019 pada 05.39
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prg5_apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `IDBooking` varchar(50) NOT NULL,
  `dateBooking` datetime DEFAULT NULL,
  `IDCustomer` int(11) NOT NULL,
  `statusBooking` int(11) NOT NULL,
  `IDTransaksi` varchar(50) DEFAULT NULL,
  `MetodePembayaran` varchar(10) DEFAULT NULL,
  `nama_bank` varchar(250) NOT NULL,
  `FotoTransfer` longtext DEFAULT NULL,
  `Deskripsi` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`IDBooking`, `dateBooking`, `IDCustomer`, `statusBooking`, `IDTransaksi`, `MetodePembayaran`, `nama_bank`, `FotoTransfer`, `Deskripsi`) VALUES
('BO20191219030416', '2019-12-19 03:04:16', 5, 1, 'TR20191219030416', 'Tunai', '-', NULL, 'Saya akan ambil obat nanti jam 5'),
('BO20191219031645', '2019-12-19 03:16:45', 5, 1, 'TR20191219031645', 'Tunai', '-', NULL, 'Saya akan ambil jam 12.00 tolong dipacking yang rapi'),
('BO20191219035008', '2019-12-19 03:50:08', 5, 1, 'TR20191219035008', 'Transfer', 'BCA', NULL, 'fhfghgj');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('iriacu9cf2enca5j9kajmaihjddqonc3', '::1', 1576722935, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537363732323933353b757365725f757365726e616d657c733a353a2272697a6b69223b757365725f726f6c657c733a383a224b6172796177616e223b757365725f7573657249447c733a313a2234223b757365725f726f6c6549447c733a313a2232223b757365725f70726f66696c7c733a36353a223130303432313735332d73746f636b2d766563746f722d692d646f6e2d742d6b6e6f772d6f6f70732d6f682d676573747572696e672d68616e642d6e6f2e6a7067223b676c6f62616c6d7367737563636573737c733a363a2253756b736573223b5f5f63695f766172737c613a313a7b733a31363a22676c6f62616c6d736773756363657373223b733a333a226f6c64223b7d),
('j72tojjo7qt5i78j2jqrs1ch63uvtrl5', '::1', 1576723980, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537363732333938303b757365725f757365726e616d657c733a363a22616e64696b61223b757365725f726f6c657c733a343a2255736572223b757365725f7573657249447c733a313a2235223b757365725f726f6c6549447c733a313a2233223b757365725f70726f66696c7c733a383a2264616e732e504e47223b676c6f62616c6d7367676167616c7c733a353a22476167616c223b5f5f63695f766172737c613a313a7b733a31343a22676c6f62616c6d7367676167616c223b733a333a226f6c64223b7d),
('knej276mska0fp01hr1uqsa34opsajpq', '::1', 1576730189, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537363733303135383b),
('l0gldlo60fjpidine7958f48dpehkgcg', '::1', 1576722296, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537363732323239363b757365725f757365726e616d657c733a363a22616e64696b61223b757365725f726f6c657c733a343a2255736572223b757365725f7573657249447c733a313a2235223b757365725f726f6c6549447c733a313a2233223b757365725f70726f66696c7c733a383a2264616e732e504e47223b),
('mg2hnc2s3923cjc78852avm8qtnfu95b', '::1', 1576724266, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537363732333938303b757365725f757365726e616d657c733a353a2272697a6b69223b757365725f726f6c657c733a383a224b6172796177616e223b757365725f7573657249447c733a313a2234223b757365725f726f6c6549447c733a313a2232223b757365725f70726f66696c7c733a36353a223130303432313735332d73746f636b2d766563746f722d692d646f6e2d742d6b6e6f772d6f6f70732d6f682d676573747572696e672d68616e642d6e6f2e6a7067223b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a31323030303b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a226338316537323864396434633266363336663036376638396363313438363263223b613a363a7b733a323a226964223b733a313a2232223b733a343a226e616d65223b733a373a22506172616d6578223b733a353a227072696365223b643a31323030303b733a333a22717479223b643a313b733a353a22726f776964223b733a33323a226338316537323864396434633266363336663036376638396363313438363263223b733a383a22737562746f74616c223b643a31323030303b7d7d),
('u0h6i0blnavp91edne4c0k6qsi75uakp', '::1', 1576723614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537363732333631343b757365725f757365726e616d657c733a353a2272697a6b69223b757365725f726f6c657c733a383a224b6172796177616e223b757365725f7573657249447c733a313a2234223b757365725f726f6c6549447c733a313a2232223b757365725f70726f66696c7c733a36353a223130303432313735332d73746f636b2d766563746f722d692d646f6e2d742d6b6e6f772d6f6f70732d6f682d676573747572696e672d68616e642d6e6f2e6a7067223b),
('u278pggo9o1c5pfmqbp33ghgnlgtpml9', '::1', 1576722597, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537363732323539373b757365725f757365726e616d657c733a353a2272697a6b69223b757365725f726f6c657c733a383a224b6172796177616e223b757365725f7573657249447c733a313a2234223b757365725f726f6c6549447c733a313a2232223b757365725f70726f66696c7c733a36353a223130303432313735332d73746f636b2d766563746f722d692d646f6e2d742d6b6e6f772d6f6f70732d6f682d676573747572696e672d68616e642d6e6f2e6a7067223b),
('ukpid4k7lq3r5st01uillvin4enrpe0c', '::1', 1576723291, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537363732333239313b757365725f757365726e616d657c733a353a2272697a6b69223b757365725f726f6c657c733a383a224b6172796177616e223b757365725f7573657249447c733a313a2234223b757365725f726f6c6549447c733a313a2232223b757365725f70726f66696c7c733a36353a223130303432313735332d73746f636b2d766563746f722d692d646f6e2d742d6b6e6f772d6f6f70732d6f682d676573747572696e672d68616e642d6e6f2e6a7067223b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpembelian`
--

CREATE TABLE `detailpembelian` (
  `IDPembelian` varchar(50) NOT NULL,
  `IDObat` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `subTotal` decimal(19,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailpembelian`
--

INSERT INTO `detailpembelian` (`IDPembelian`, `IDObat`, `jumlah`, `status`, `subTotal`) VALUES
('2019', 1, 1, 0, '5000.0000'),
('PM20191215191206', 1, 1, 0, '5000.0000'),
('PM20191215191243', 1, 1, 0, '5000.0000'),
('PM20191215191249', 1, 1, 0, '5000.0000'),
('PM20191215191312', 1, 1, 0, '5000.0000'),
('PM20191215191425', 1, 1, 1, '5000.0000'),
('PM20191215191550', 1, 1, 1, '5000.0000'),
('PM20191215191827', 1, 1, 1, '5000.0000'),
('PM20191215191932', 1, 1, 1, '5000.0000'),
('PM20191215192011', 1, 1, 1, '5000.0000'),
('PM20191215192202', 1, 1, 1, '5000.0000'),
('PM20191215192523', 1, 1, 0, '5000.0000'),
('PM20191215192523', 3, 1, 0, '4000.0000'),
('PM20191217043934', 3, 1, 0, '300.0000'),
('PM20191217044006', 1, 1, 0, '0.0000'),
('PM20191219033024', 1, 19, 0, '76000.0000'),
('PM20191219033024', 2, 14, 0, '70000.0000'),
('PM20191219034257', 1, 5, 1, '20000.0000'),
('PM20191219034257', 2, 1, 0, '2000.0000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `IDTransaksi` varchar(50) NOT NULL,
  `IDObat` int(11) NOT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `subTotal` decimal(19,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`IDTransaksi`, `IDObat`, `Jumlah`, `subTotal`) VALUES
('TR20191219025921', 2, 2, '24000.0000'),
('TR20191219030358', 2, 2, '24000.0000'),
('TR20191219030416', 2, 2, '24000.0000'),
('TR20191219031645', 1, 1, '12000.0000'),
('TR20191219032923', 1, 8, '96000.0000'),
('TR20191219032923', 3, 3, '30000.0000'),
('TR20191219034552', 1, 87, '1044000.0000'),
('TR20191219034552', 2, 1, '12000.0000'),
('TR20191219035008', 2, 3, '36000.0000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info`
--

CREATE TABLE `info` (
  `IDInfo` int(11) NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `Kategori` varchar(100) NOT NULL,
  `Konten` text NOT NULL,
  `waktuPost` datetime NOT NULL,
  `createBy` int(11) NOT NULL,
  `createDate` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `modifiedby` int(11) NOT NULL,
  `modifiedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`IDInfo`, `Judul`, `Kategori`, `Konten`, `waktuPost`, `createBy`, `createDate`, `status`, `gambar`, `modifiedby`, `modifiedDate`) VALUES
(2, 'Tujuh Cara Menjaga Kesehatan Mata', 'Kesehatan', '<p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Rutin Memeriksakan Mata<br></strong>Setiap orang, mulai dari anak-anak hingga usia lanjut, dianjurkan untuk memeriksakan mata ke dokter spesialis mata setidaknya 2 tahun sekali. Rutin memeriksakan mata dapat mendeteksi dini masalah pada mata akibat penyakit tertentu, seperti&nbsp;<a href=\"https://www.alodokter.com/retinopati-diabetik\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">diabetes</a>&nbsp;dan tekanan darah tinggi.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\">Orang dewasa yang sudah berumur lebih dari 40 tahun bahkan disarankan untuk memeriksakan mata setahun sekali. Ini berguna untuk mencegah penyakit mata yang berkaitan dengan bertambahnya usia, seperti&nbsp;<a href=\"https://www.alodokter.com/degenerasi-makula\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">degenerasi makula</a>, glaukoma, dan katarak. Sedangkan anak-anak harus diperiksa, setidaknya dua tahun sekali, untuk mendeteksi masalah penglihatan yang mungkin dapat memengaruhi kemampuan belajarnya. Anak-anak tidak perlu harus sudah bisa membaca untuk melakukan pemeriksaan mata.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\">Cari tahu pula riwayat kesehatan mata dalam keluarga. Mengapa? Karena banyak penyakit atau masalah mata yang diturunkan secara genetik dari orang tua ke anak. Dengan&nbsp;<a href=\"https://www.alodokter.com/cari-rumah-sakit/optalmologi/pemeriksaan-dan-konsultasi-mata\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">pemeriksaan mata</a>&nbsp;ke dokter, berbagai penyakit mata dan gejalanya dapat terdeteksi lebih dini. Pengobatannya pun tentu akan lebih mudah.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Mengonsumsi Makanan Bergizi<br></strong>Penelitian menunjukkan bahwa makanan sehat yang mengandung berbagai nutrisi, seperti&nbsp;<a href=\"https://www.alodokter.com/melihat-lebih-jauh-tentang-manfaat-vitamin-a\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">vitamin A</a>, C dan E,&nbsp;<em>zinc</em>,&nbsp;<a href=\"https://www.alodokter.com/lutein\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">lutein</a>, selenium, dan asam lemak omega-3, dapat membantu menangkal masalah mata terkait usia, misalnya katarak dan degenerasi makula. Berbagai nutrisi tersebut bisa didapatkan dengan mengonsumsi sayuran berdaun hijau, salmon, tuna, telur, kacang-kacangan, dan jeruk.<strong><br></strong></p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Jangan Terlalu Lama Menatap&nbsp;</strong><strong>L</strong><strong>ayar&nbsp;</strong><strong>E</strong><strong>lektronik<br></strong>Menatap layar &nbsp;komputer atau&nbsp;<em>smartphone&nbsp;</em>terlalu lama dapat menyebabkan&nbsp;<a href=\"https://www.alodokter.com/cukupi-istirahat-untuk-menghindari-mata-lelah\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">mata lelah</a>. Gejalanya dapat berupa sakit kepala, nyeri leher, sakit pada bahu dan punggung, mata kering dan tegang, sulit fokus menatap kejauhan, dan pandangan menjadi kabur. Jika Anda bekerja di depan komputer sepanjang hari, tiap 20 menit alihkan pandangan mata sejauh 6 meter selama 20 detik, untuk mengurangi ketegangan pada mata. Atau bisa juga mengistirahatkan mata selama 15 menit tiap 2 jam sekali. Jika mata Anda terasa kering, seringlah mengedipkan mata.</p>', '2019-11-26 06:46:08', 2, '2019-11-26 06:46:08', 1, 'default.jpg', 0, '0000-00-00 00:00:00'),
(3, 'Tujuh Cara Menjaga Kesehatan Mata', 'Kesehatan', '<p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Rutin Memeriksakan Mata<br></strong>Setiap orang, mulai dari anak-anak hingga usia lanjut, dianjurkan untuk memeriksakan mata ke dokter spesialis mata setidaknya 2 tahun sekali. Rutin memeriksakan mata dapat mendeteksi dini masalah pada mata akibat penyakit tertentu, seperti&nbsp;<a href=\"https://www.alodokter.com/retinopati-diabetik\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">diabetes</a>&nbsp;dan tekanan darah tinggi.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\">Orang dewasa yang sudah berumur lebih dari 40 tahun bahkan disarankan untuk memeriksakan mata setahun sekali. Ini berguna untuk mencegah penyakit mata yang berkaitan dengan bertambahnya usia, seperti&nbsp;<a href=\"https://www.alodokter.com/degenerasi-makula\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">degenerasi makula</a>, glaukoma, dan katarak. Sedangkan anak-anak harus diperiksa, setidaknya dua tahun sekali, untuk mendeteksi masalah penglihatan yang mungkin dapat memengaruhi kemampuan belajarnya. Anak-anak tidak perlu harus sudah bisa membaca untuk melakukan pemeriksaan mata.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\">Cari tahu pula riwayat kesehatan mata dalam keluarga. Mengapa? Karena banyak penyakit atau masalah mata yang diturunkan secara genetik dari orang tua ke anak. Dengan&nbsp;<a href=\"https://www.alodokter.com/cari-rumah-sakit/optalmologi/pemeriksaan-dan-konsultasi-mata\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">pemeriksaan mata</a>&nbsp;ke dokter, berbagai penyakit mata dan gejalanya dapat terdeteksi lebih dini. Pengobatannya pun tentu akan lebih mudah.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Mengonsumsi Makanan Bergizi<br></strong>Penelitian menunjukkan bahwa makanan sehat yang mengandung berbagai nutrisi, seperti&nbsp;<a href=\"https://www.alodokter.com/melihat-lebih-jauh-tentang-manfaat-vitamin-a\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">vitamin A</a>, C dan E,&nbsp;<em>zinc</em>,&nbsp;<a href=\"https://www.alodokter.com/lutein\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">lutein</a>, selenium, dan asam lemak omega-3, dapat membantu menangkal masalah mata terkait usia, misalnya katarak dan degenerasi makula. Berbagai nutrisi tersebut bisa didapatkan dengan mengonsumsi sayuran berdaun hijau, salmon, tuna, telur, kacang-kacangan, dan jeruk.<strong><br></strong></p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Jangan Terlalu Lama Menatap&nbsp;</strong><strong>L</strong><strong>ayar&nbsp;</strong><strong>E</strong><strong>lektronik<br></strong>Menatap layar &nbsp;komputer atau&nbsp;<em>smartphone&nbsp;</em>terlalu lama dapat menyebabkan&nbsp;<a href=\"https://www.alodokter.com/cukupi-istirahat-untuk-menghindari-mata-lelah\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">mata lelah</a>. Gejalanya dapat berupa sakit kepala, nyeri leher, sakit pada bahu dan punggung, mata kering dan tegang, sulit fokus menatap kejauhan, dan pandangan menjadi kabur. Jika Anda bekerja di depan komputer sepanjang hari, tiap 20 menit alihkan pandangan mata sejauh 6 meter selama 20 detik, untuk mengurangi ketegangan pada mata. Atau bisa juga mengistirahatkan mata selama 15 menit tiap 2 jam sekali. Jika mata Anda terasa kering, seringlah mengedipkan mata.</p>', '2019-11-26 06:50:11', 2, '2019-11-26 06:50:11', 1, 'default.jpg', 0, '0000-00-00 00:00:00'),
(4, 'Tujuh Cara Menjaga Kesehatan Mata', 'Kesehatan', '<p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Rutin Memeriksakan Mata<br></strong>Setiap orang, mulai dari anak-anak hingga usia lanjut, dianjurkan untuk memeriksakan mata ke dokter spesialis mata setidaknya 2 tahun sekali. Rutin memeriksakan mata dapat mendeteksi dini masalah pada mata akibat penyakit tertentu, seperti&nbsp;<a href=\"https://www.alodokter.com/retinopati-diabetik\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">diabetes</a>&nbsp;dan tekanan darah tinggi.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\">Orang dewasa yang sudah berumur lebih dari 40 tahun bahkan disarankan untuk memeriksakan mata setahun sekali. Ini berguna untuk mencegah penyakit mata yang berkaitan dengan bertambahnya usia, seperti&nbsp;<a href=\"https://www.alodokter.com/degenerasi-makula\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">degenerasi makula</a>, glaukoma, dan katarak. Sedangkan anak-anak harus diperiksa, setidaknya dua tahun sekali, untuk mendeteksi masalah penglihatan yang mungkin dapat memengaruhi kemampuan belajarnya. Anak-anak tidak perlu harus sudah bisa membaca untuk melakukan pemeriksaan mata.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\">Cari tahu pula riwayat kesehatan mata dalam keluarga. Mengapa? Karena banyak penyakit atau masalah mata yang diturunkan secara genetik dari orang tua ke anak. Dengan&nbsp;<a href=\"https://www.alodokter.com/cari-rumah-sakit/optalmologi/pemeriksaan-dan-konsultasi-mata\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">pemeriksaan mata</a>&nbsp;ke dokter, berbagai penyakit mata dan gejalanya dapat terdeteksi lebih dini. Pengobatannya pun tentu akan lebih mudah.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Mengonsumsi Makanan Bergizi<br></strong>Penelitian menunjukkan bahwa makanan sehat yang mengandung berbagai nutrisi, seperti&nbsp;<a href=\"https://www.alodokter.com/melihat-lebih-jauh-tentang-manfaat-vitamin-a\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">vitamin A</a>, C dan E,&nbsp;<em>zinc</em>,&nbsp;<a href=\"https://www.alodokter.com/lutein\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">lutein</a>, selenium, dan asam lemak omega-3, dapat membantu menangkal masalah mata terkait usia, misalnya katarak dan degenerasi makula. Berbagai nutrisi tersebut bisa didapatkan dengan mengonsumsi sayuran berdaun hijau, salmon, tuna, telur, kacang-kacangan, dan jeruk.<strong><br></strong></p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Jangan Terlalu Lama Menatap&nbsp;</strong><strong>L</strong><strong>ayar&nbsp;</strong><strong>E</strong><strong>lektronik<br></strong>Menatap layar &nbsp;komputer atau&nbsp;<em>smartphone&nbsp;</em>terlalu lama dapat menyebabkan&nbsp;<a href=\"https://www.alodokter.com/cukupi-istirahat-untuk-menghindari-mata-lelah\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">mata lelah</a>. Gejalanya dapat berupa sakit kepala, nyeri leher, sakit pada bahu dan punggung, mata kering dan tegang, sulit fokus menatap kejauhan, dan pandangan menjadi kabur. Jika Anda bekerja di depan komputer sepanjang hari, tiap 20 menit alihkan pandangan mata sejauh 6 meter selama 20 detik, untuk mengurangi ketegangan pada mata. Atau bisa juga mengistirahatkan mata selama 15 menit tiap 2 jam sekali. Jika mata Anda terasa kering, seringlah mengedipkan mata.</p>', '2019-11-26 06:53:38', 2, '2019-11-26 06:53:38', 1, 'default.jpg', 0, '0000-00-00 00:00:00'),
(5, 'Tujuh Cara Menjaga Kesehatan Mata', 'Kesehatan', '<p>gg</p>', '2019-11-26 07:38:28', 2, '2019-11-26 07:38:28', 1, 'uaua.jpg', 0, '0000-00-00 00:00:00'),
(6, 'Tujuh Cara Menjaga Kesehatan Mata', 'Kesehatan', '<p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Rutin Memeriksakan Mata<br></strong>Setiap orang, mulai dari anak-anak hingga usia lanjut, dianjurkan untuk memeriksakan mata ke dokter spesialis mata setidaknya 2 tahun sekali. Rutin memeriksakan mata dapat mendeteksi dini masalah pada mata akibat penyakit tertentu, seperti&nbsp;<a href=\"https://www.alodokter.com/retinopati-diabetik\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">diabetes</a>&nbsp;dan tekanan darah tinggi.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\">Orang dewasa yang sudah berumur lebih dari 40 tahun bahkan disarankan untuk memeriksakan mata setahun sekali. Ini berguna untuk mencegah penyakit mata yang berkaitan dengan bertambahnya usia, seperti&nbsp;<a href=\"https://www.alodokter.com/degenerasi-makula\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">degenerasi makula</a>, glaukoma, dan katarak. Sedangkan anak-anak harus diperiksa, setidaknya dua tahun sekali, untuk mendeteksi masalah penglihatan yang mungkin dapat memengaruhi kemampuan belajarnya. Anak-anak tidak perlu harus sudah bisa membaca untuk melakukan pemeriksaan mata.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\">Cari tahu pula riwayat kesehatan mata dalam keluarga. Mengapa? Karena banyak penyakit atau masalah mata yang diturunkan secara genetik dari orang tua ke anak. Dengan&nbsp;<a href=\"https://www.alodokter.com/cari-rumah-sakit/optalmologi/pemeriksaan-dan-konsultasi-mata\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">pemeriksaan mata</a>&nbsp;ke dokter, berbagai penyakit mata dan gejalanya dapat terdeteksi lebih dini. Pengobatannya pun tentu akan lebih mudah.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Mengonsumsi Makanan Bergizi<br></strong>Penelitian menunjukkan bahwa makanan sehat yang mengandung berbagai nutrisi, seperti&nbsp;<a href=\"https://www.alodokter.com/melihat-lebih-jauh-tentang-manfaat-vitamin-a\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">vitamin A</a>, C dan E,&nbsp;<em>zinc</em>,&nbsp;<a href=\"https://www.alodokter.com/lutein\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">lutein</a>, selenium, dan asam lemak omega-3, dapat membantu menangkal masalah mata terkait usia, misalnya katarak dan degenerasi makula. Berbagai nutrisi tersebut bisa didapatkan dengan mengonsumsi sayuran berdaun hijau, salmon, tuna, telur, kacang-kacangan, dan jeruk.<strong><br></strong></p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Jangan Terlalu Lama Menatap&nbsp;</strong><strong>L</strong><strong>ayar&nbsp;</strong><strong>E</strong><strong>lektronik<br></strong>Menatap layar &nbsp;komputer atau&nbsp;<em>smartphone&nbsp;</em>terlalu lama dapat menyebabkan&nbsp;<a href=\"https://www.alodokter.com/cukupi-istirahat-untuk-menghindari-mata-lelah\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">mata lelah</a>. Gejalanya dapat berupa sakit kepala, nyeri leher, sakit pada bahu dan punggung, mata kering dan tegang, sulit fokus menatap kejauhan, dan pandangan menjadi kabur. Jika Anda bekerja di depan komputer sepanjang hari, tiap 20 menit alihkan pandangan mata sejauh 6 meter selama 20 detik, untuk mengurangi ketegangan pada mata. Atau bisa juga mengistirahatkan mata selama 15 menit tiap 2 jam sekali. Jika mata Anda terasa kering, seringlah mengedipkan mata.</p>', '2019-11-26 07:39:43', 2, '2019-12-05 17:16:37', 1, 'www.png', 2, '0000-00-00 00:00:00'),
(7, 'Tujuh Cara Menjaga Kesehatan Mata', 'Kesehatan', '<p>a</p>', '2019-12-05 02:15:10', 2, '2019-12-08 15:32:54', 0, 'http.png', 2, '2019-12-05 16:55:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisobat`
--

CREATE TABLE `jenisobat` (
  `IDJenis` int(11) NOT NULL,
  `namaJenis` varchar(50) DEFAULT NULL,
  `statusJenis` int(11) DEFAULT NULL,
  `Deskripsi` longtext DEFAULT NULL,
  `CreateBy` int(11) NOT NULL,
  `CreateDate` date NOT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenisobat`
--

INSERT INTO `jenisobat` (`IDJenis`, `namaJenis`, `statusJenis`, `Deskripsi`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(1, 'Batuk', 1, 'Dari Daun Mint guna meredakan batuk', 1, '2019-11-20', 1, '2019-12-04'),
(2, 'Hipotermia', 1, 'Kedinginan bet', 1, '2019-11-20', 2, '2019-12-05'),
(4, 'Pusing', 1, 'Paramex', 1, '2019-12-04', 2, '2019-12-05'),
(5, 'Demam', 1, '12', 2, '2019-12-05', 2, '2019-12-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_penyimpanan`
--

CREATE TABLE `lokasi_penyimpanan` (
  `IDLokasi` int(11) NOT NULL,
  `Nama_Lokasi` varchar(50) DEFAULT NULL,
  `tempatLokasi` varchar(50) DEFAULT NULL,
  `Deskripsi` longtext DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `CreateBy` int(11) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi_penyimpanan`
--

INSERT INTO `lokasi_penyimpanan` (`IDLokasi`, `Nama_Lokasi`, `tempatLokasi`, `Deskripsi`, `Status`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(1, 'A1', 'Rak A', 'Gud', 1, 1, '2019-11-20 00:00:00', 2, '2019-12-06 07:46:32'),
(2, 'A21', 'Rak A1', 'Rak A bagian 21', 1, 1, '2019-12-04 00:00:00', 1, '2019-12-04 00:00:00'),
(3, 'A2', 'Rak A', 'aa', 1, 1, '2019-12-05 00:00:00', 2, '2019-12-12 02:06:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `management_uang`
--

CREATE TABLE `management_uang` (
  `IDManagement` int(11) NOT NULL,
  `tanggalTransaksi` datetime NOT NULL,
  `Debit` double DEFAULT NULL,
  `Kredit` double DEFAULT NULL,
  `Total` double DEFAULT NULL,
  `Deskripsi` longtext DEFAULT NULL,
  `CreateBy` int(11) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `management_uang`
--

INSERT INTO `management_uang` (`IDManagement`, `tanggalTransaksi`, `Debit`, `Kredit`, `Total`, `Deskripsi`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(30, '2019-12-08 17:52:47', 100, 0, 100, 'a', 2, '2019-12-08 17:52:47', NULL, NULL),
(31, '2019-12-08 17:52:55', 0, 100, 0, '1', 2, '2019-12-08 17:52:55', NULL, NULL),
(32, '2019-12-15 18:49:18', 10000, 0, 10000, 'uang kas', 2, '2019-12-15 18:49:18', NULL, NULL),
(33, '2019-12-15 19:25:23', 0, 9000, 1000, 'Pembelian Obat', 4, '2019-12-15 19:25:23', NULL, NULL),
(34, '2019-12-15 19:25:23', 0, 9000, -8000, 'Pembelian Obat', 4, '2019-12-15 19:25:23', NULL, NULL),
(35, '2019-12-17 04:39:34', 0, 300, -8300, 'Pembelian Obat', 4, '2019-12-17 04:39:34', NULL, NULL),
(36, '2019-12-17 04:40:06', 0, 0, -8300, 'Pembelian Obat', 4, '2019-12-17 04:40:06', NULL, NULL),
(37, '2019-12-19 03:29:23', 0, 126000, -134300, 'Penjualan Obat', 4, '2019-12-19 03:29:23', NULL, NULL),
(38, '2019-12-19 03:30:24', 0, 146000, -280300, 'Pembelian Obat', 4, '2019-12-19 03:30:24', NULL, NULL),
(39, '2019-12-19 03:42:57', 0, 22000, -302300, 'Pembelian Obat', 4, '2019-12-19 03:42:57', NULL, NULL),
(40, '2019-12-19 03:45:52', 0, 1056000, -1358300, 'Penjualan Obat', 4, '2019-12-19 03:45:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `IDObat` int(11) NOT NULL,
  `namaObat` varchar(50) NOT NULL,
  `IDJenis` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `JumlahObat` int(11) DEFAULT NULL,
  `Keterangan` longtext DEFAULT NULL,
  `IDLokasi` int(11) DEFAULT NULL,
  `Satuan` varchar(50) DEFAULT NULL,
  `Harga` decimal(19,4) DEFAULT NULL,
  `Expired` date DEFAULT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `CreateBy` int(11) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`IDObat`, `namaObat`, `IDJenis`, `status`, `JumlahObat`, `Keterangan`, `IDLokasi`, `Satuan`, `Harga`, `Expired`, `Foto`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(1, 'Paramex', 1, 1, -75, 'Obat Batuk', 1, 'Butir', '12000.0000', '2020-12-12', 'Capturemsjidastara.PNG', 2, '2019-12-02 00:00:00', 2, '2019-12-10 10:31:26'),
(2, 'Paramex', 1, 1, 14, 'qe', 1, 'Butir', '12000.0000', '2020-12-12', '4d310e1d-92fd-4116-bef0-5feaad987035.png', 2, '2019-12-05 01:56:27', 2, '2019-12-06 07:46:16'),
(3, 'panadoll ', 2, 1, -2, 'Obat Jantung', 1, 'Butir', '10000.0000', '2020-12-12', '1_28-1lYrYTQoLhi87mllgBw.png', 2, '2019-12-05 09:08:21', 2, '2019-12-11 09:43:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `IDPembelian` varchar(50) NOT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `totalBayar` decimal(19,4) DEFAULT NULL,
  `IDSupplier` int(11) NOT NULL,
  `IDKaryawan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`IDPembelian`, `Tanggal`, `totalBayar`, `IDSupplier`, `IDKaryawan`) VALUES
('2019', '2019-12-15 19:05:21', '5.0000', 1, 4),
('PM20191215191206', '2019-12-15 19:12:06', '5.0000', 1, 4),
('PM20191215191243', '2019-12-15 19:12:43', '5.0000', 1, 4),
('PM20191215191249', '2019-12-15 19:12:49', '5.0000', 1, 4),
('PM20191215191312', '2019-12-15 19:13:12', '5.0000', 1, 4),
('PM20191215191425', '2019-12-15 19:14:25', '5.0000', 1, 4),
('PM20191215191550', '2019-12-15 19:15:50', '5.0000', 1, 4),
('PM20191215191827', '2019-12-15 19:18:27', '5000.0000', 1, 4),
('PM20191215191932', '2019-12-15 19:19:32', '5000.0000', 1, 4),
('PM20191215192011', '2019-12-15 19:20:11', '5000.0000', 1, 4),
('PM20191215192202', '2019-12-15 19:22:02', '5000.0000', 1, 4),
('PM20191215192523', '2019-12-15 19:25:23', '9000.0000', 2, 4),
('PM20191217043901', '2019-12-17 04:39:01', '0.0000', 1, 4),
('PM20191217043934', '2019-12-17 04:39:34', '300.0000', 3, 4),
('PM20191217044006', '2019-12-17 04:40:06', '0.0000', 2, 4),
('PM20191219033024', '2019-12-19 03:30:24', '146000.0000', 3, 4),
('PM20191219034257', '2019-12-19 03:42:57', '22000.0000', 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `IDRole` int(11) NOT NULL,
  `Deskripsi` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `CreateBy` int(11) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`IDRole`, `Deskripsi`, `status`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(1, 'Admin', 1, 1, '2019-11-20 00:00:00', 1, '2019-11-20 00:00:00'),
(2, 'Karyawan', 1, 1, '2019-11-21 00:00:00', 2, '2019-12-04 19:20:32'),
(3, 'User', 1, 2, '2019-12-05 00:00:00', 2, '2019-12-06 07:46:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `IDSupplier` int(11) NOT NULL,
  `NamaSupplier` varchar(50) NOT NULL,
  `AlamatSupplier` varchar(100) DEFAULT NULL,
  `EmailSupplier` varchar(30) DEFAULT NULL,
  `noTelp` varchar(15) DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `CreateBy` int(11) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`IDSupplier`, `NamaSupplier`, `AlamatSupplier`, `EmailSupplier`, `noTelp`, `Status`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(1, 'PT.UltraFlu33', 'ponorogo', 'ultraflu@gmail.com', '43333', 1, 1, '2019-11-21 00:00:00', 2, '2019-12-04 19:33:07'),
(2, 'PT.Paramex', 'Jl.Soekarno Hatta No.26', 'paramex@gmail.com', '0802903423', 1, 2, '0000-00-00 00:00:00', NULL, NULL),
(3, 'PT.UltraFlu', 'jkt utara', 'ultraflu@gmail.com', '0802903423', 0, 2, '2019-12-05 02:22:54', 2, '2019-12-05 02:23:10'),
(4, 'PT.UltraFlu334', 'jkt ', 'ultraflu@gmail.com', '080', 0, 2, '2019-12-05 02:23:39', 2, '2019-12-05 02:24:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `IDTransaksi` varchar(50) NOT NULL,
  `IDKaryawan` int(11) DEFAULT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `FotoResep` longtext DEFAULT NULL,
  `status` int(11) NOT NULL,
  `totalBayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`IDTransaksi`, `IDKaryawan`, `Tanggal`, `FotoResep`, `status`, `totalBayar`) VALUES
('TR20191219025921', NULL, '2019-12-19 02:59:21', NULL, 1, 24000),
('TR20191219030358', NULL, '2019-12-19 03:03:58', NULL, 0, 24000),
('TR20191219030416', NULL, '2019-12-19 03:04:16', NULL, 0, 24000),
('TR20191219031645', NULL, '2019-12-19 03:16:45', NULL, 1, 12000),
('TR20191219032923', 4, '2019-12-19 03:29:23', NULL, 1, 126000),
('TR20191219034552', 4, '2019-12-19 03:45:52', NULL, 1, 1056000),
('TR20191219035008', NULL, '2019-12-19 03:50:08', NULL, 1, 36000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `IDUser` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` varchar(100) DEFAULT NULL,
  `NoTelp` varchar(15) DEFAULT NULL,
  `TglLahir` date DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `CreateBy` int(11) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `IDRole` int(11) NOT NULL,
  `jeniskelamin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`IDUser`, `Nama`, `Alamat`, `NoTelp`, `TglLahir`, `Email`, `status`, `foto`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `username`, `password`, `IDRole`, `jeniskelamin`) VALUES
(2, 'danis andika praditya', 'Jakarta utara', '082257761653', '2018-03-01', 'danisandika1@gmail.com', 1, 'dans.PNG', 1, '2019-11-26 10:00:00', 2, '2019-12-11 06:31:14', 'danis', 'danis', 1, 'Laki-Laki'),
(3, 'danis andika', 'Jakarta Pusat', '0809109212', '2019-12-01', 'danisandika4@gmail.com', 1, 'raka.PNG', 2, '2019-12-06 08:36:27', NULL, NULL, 'danisandika', 'danis', 2, 'Laki-Laki'),
(4, 'Rizki Asri', 'Jambi', '0809109212', '2019-12-01', 'danisandika4@gmail.com', 1, '100421753-stock-vector-i-don-t-know-oops-oh-gesturing-hand-no.jpg', 3, '2019-12-06 08:46:41', 2, '2019-12-11 06:34:08', 'rizki', 'rizki', 2, 'Laki-Laki'),
(5, 'danis andika praditya', 'Jakarta utara', '0809109212', '2019-12-06', 'danisandika4@gmail.com', 1, 'dans.PNG', 2, '2019-12-11 02:09:49', 2, '2019-12-11 05:49:10', 'andika', 'andika', 3, 'Laki-Laki');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`IDBooking`),
  ADD KEY `FK_Booking_Transaksi` (`IDTransaksi`),
  ADD KEY `FK_Booking_User` (`IDCustomer`);

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indeks untuk tabel `detailpembelian`
--
ALTER TABLE `detailpembelian`
  ADD PRIMARY KEY (`IDPembelian`,`IDObat`),
  ADD KEY `FK_detailPembelian_Obat` (`IDObat`);

--
-- Indeks untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`IDTransaksi`,`IDObat`),
  ADD KEY `FK_detailTransaksi_Obat` (`IDObat`);

--
-- Indeks untuk tabel `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`IDInfo`),
  ADD KEY `FK_CREATEBY_INFO` (`createBy`);

--
-- Indeks untuk tabel `jenisobat`
--
ALTER TABLE `jenisobat`
  ADD PRIMARY KEY (`IDJenis`);

--
-- Indeks untuk tabel `lokasi_penyimpanan`
--
ALTER TABLE `lokasi_penyimpanan`
  ADD PRIMARY KEY (`IDLokasi`);

--
-- Indeks untuk tabel `management_uang`
--
ALTER TABLE `management_uang`
  ADD PRIMARY KEY (`IDManagement`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`IDObat`),
  ADD KEY `FK_Obat_JenisObat` (`IDJenis`),
  ADD KEY `FK_Obat_Lokasi_Penyimpanan` (`IDLokasi`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`IDPembelian`),
  ADD KEY `FK_Pembelian_Supplier` (`IDSupplier`),
  ADD KEY `FK_Pembelian_User` (`IDKaryawan`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`IDRole`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`IDSupplier`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`IDTransaksi`),
  ADD KEY `FK_Transaksi_User` (`IDKaryawan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDUser`),
  ADD KEY `FK_ROLE_USER` (`IDRole`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `info`
--
ALTER TABLE `info`
  MODIFY `IDInfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenisobat`
--
ALTER TABLE `jenisobat`
  MODIFY `IDJenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `lokasi_penyimpanan`
--
ALTER TABLE `lokasi_penyimpanan`
  MODIFY `IDLokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `management_uang`
--
ALTER TABLE `management_uang`
  MODIFY `IDManagement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `IDObat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `IDRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `IDSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `IDUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_Booking_Transaksi` FOREIGN KEY (`IDTransaksi`) REFERENCES `transaksi` (`IDTransaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Booking_User` FOREIGN KEY (`IDCustomer`) REFERENCES `user` (`IDUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detailpembelian`
--
ALTER TABLE `detailpembelian`
  ADD CONSTRAINT `FK_detailPembelian_Obat` FOREIGN KEY (`IDObat`) REFERENCES `obat` (`IDObat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_detailPembelian_Pembelian` FOREIGN KEY (`IDPembelian`) REFERENCES `pembelian` (`IDPembelian`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD CONSTRAINT `FK_detailTransaksi_Obat` FOREIGN KEY (`IDObat`) REFERENCES `obat` (`IDObat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_detailTransaksi_Transaksi` FOREIGN KEY (`IDTransaksi`) REFERENCES `transaksi` (`IDTransaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `FK_CREATEBY_INFO` FOREIGN KEY (`createBy`) REFERENCES `user` (`IDUser`);

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `FK_Obat_JenisObat` FOREIGN KEY (`IDJenis`) REFERENCES `jenisobat` (`IDJenis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Obat_Lokasi_Penyimpanan` FOREIGN KEY (`IDLokasi`) REFERENCES `lokasi_penyimpanan` (`IDLokasi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `FK_Pembelian_Supplier` FOREIGN KEY (`IDSupplier`) REFERENCES `supplier` (`IDSupplier`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Pembelian_User` FOREIGN KEY (`IDKaryawan`) REFERENCES `user` (`IDUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_Transaksi_User` FOREIGN KEY (`IDKaryawan`) REFERENCES `user` (`IDUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_ROLE_USER` FOREIGN KEY (`IDRole`) REFERENCES `role` (`IDRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
