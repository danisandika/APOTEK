-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2019 pada 07.41
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

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
  `FotoTransfer` longtext DEFAULT NULL,
  `Deskripsi` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpembelian`
--

CREATE TABLE `detailpembelian` (
  `IDPembelian` varchar(50) NOT NULL,
  `IDObat` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subTotal` decimal(19,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`IDInfo`, `Judul`, `Kategori`, `Konten`, `waktuPost`, `createBy`, `createDate`, `status`, `gambar`) VALUES
(2, 'Tujuh Cara Menjaga Kesehatan Mata', 'Kesehatan', '<p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Rutin Memeriksakan Mata<br></strong>Setiap orang, mulai dari anak-anak hingga usia lanjut, dianjurkan untuk memeriksakan mata ke dokter spesialis mata setidaknya 2 tahun sekali. Rutin memeriksakan mata dapat mendeteksi dini masalah pada mata akibat penyakit tertentu, seperti&nbsp;<a href=\"https://www.alodokter.com/retinopati-diabetik\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">diabetes</a>&nbsp;dan tekanan darah tinggi.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\">Orang dewasa yang sudah berumur lebih dari 40 tahun bahkan disarankan untuk memeriksakan mata setahun sekali. Ini berguna untuk mencegah penyakit mata yang berkaitan dengan bertambahnya usia, seperti&nbsp;<a href=\"https://www.alodokter.com/degenerasi-makula\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">degenerasi makula</a>, glaukoma, dan katarak. Sedangkan anak-anak harus diperiksa, setidaknya dua tahun sekali, untuk mendeteksi masalah penglihatan yang mungkin dapat memengaruhi kemampuan belajarnya. Anak-anak tidak perlu harus sudah bisa membaca untuk melakukan pemeriksaan mata.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\">Cari tahu pula riwayat kesehatan mata dalam keluarga. Mengapa? Karena banyak penyakit atau masalah mata yang diturunkan secara genetik dari orang tua ke anak. Dengan&nbsp;<a href=\"https://www.alodokter.com/cari-rumah-sakit/optalmologi/pemeriksaan-dan-konsultasi-mata\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">pemeriksaan mata</a>&nbsp;ke dokter, berbagai penyakit mata dan gejalanya dapat terdeteksi lebih dini. Pengobatannya pun tentu akan lebih mudah.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Mengonsumsi Makanan Bergizi<br></strong>Penelitian menunjukkan bahwa makanan sehat yang mengandung berbagai nutrisi, seperti&nbsp;<a href=\"https://www.alodokter.com/melihat-lebih-jauh-tentang-manfaat-vitamin-a\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">vitamin A</a>, C dan E,&nbsp;<em>zinc</em>,&nbsp;<a href=\"https://www.alodokter.com/lutein\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">lutein</a>, selenium, dan asam lemak omega-3, dapat membantu menangkal masalah mata terkait usia, misalnya katarak dan degenerasi makula. Berbagai nutrisi tersebut bisa didapatkan dengan mengonsumsi sayuran berdaun hijau, salmon, tuna, telur, kacang-kacangan, dan jeruk.<strong><br></strong></p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Jangan Terlalu Lama Menatap&nbsp;</strong><strong>L</strong><strong>ayar&nbsp;</strong><strong>E</strong><strong>lektronik<br></strong>Menatap layar &nbsp;komputer atau&nbsp;<em>smartphone&nbsp;</em>terlalu lama dapat menyebabkan&nbsp;<a href=\"https://www.alodokter.com/cukupi-istirahat-untuk-menghindari-mata-lelah\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">mata lelah</a>. Gejalanya dapat berupa sakit kepala, nyeri leher, sakit pada bahu dan punggung, mata kering dan tegang, sulit fokus menatap kejauhan, dan pandangan menjadi kabur. Jika Anda bekerja di depan komputer sepanjang hari, tiap 20 menit alihkan pandangan mata sejauh 6 meter selama 20 detik, untuk mengurangi ketegangan pada mata. Atau bisa juga mengistirahatkan mata selama 15 menit tiap 2 jam sekali. Jika mata Anda terasa kering, seringlah mengedipkan mata.</p>', '2019-11-26 06:46:08', 2, '2019-11-26 06:46:08', 1, 'default.jpg'),
(3, 'Tujuh Cara Menjaga Kesehatan Mata', 'Kesehatan', '<p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Rutin Memeriksakan Mata<br></strong>Setiap orang, mulai dari anak-anak hingga usia lanjut, dianjurkan untuk memeriksakan mata ke dokter spesialis mata setidaknya 2 tahun sekali. Rutin memeriksakan mata dapat mendeteksi dini masalah pada mata akibat penyakit tertentu, seperti&nbsp;<a href=\"https://www.alodokter.com/retinopati-diabetik\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">diabetes</a>&nbsp;dan tekanan darah tinggi.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\">Orang dewasa yang sudah berumur lebih dari 40 tahun bahkan disarankan untuk memeriksakan mata setahun sekali. Ini berguna untuk mencegah penyakit mata yang berkaitan dengan bertambahnya usia, seperti&nbsp;<a href=\"https://www.alodokter.com/degenerasi-makula\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">degenerasi makula</a>, glaukoma, dan katarak. Sedangkan anak-anak harus diperiksa, setidaknya dua tahun sekali, untuk mendeteksi masalah penglihatan yang mungkin dapat memengaruhi kemampuan belajarnya. Anak-anak tidak perlu harus sudah bisa membaca untuk melakukan pemeriksaan mata.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\">Cari tahu pula riwayat kesehatan mata dalam keluarga. Mengapa? Karena banyak penyakit atau masalah mata yang diturunkan secara genetik dari orang tua ke anak. Dengan&nbsp;<a href=\"https://www.alodokter.com/cari-rumah-sakit/optalmologi/pemeriksaan-dan-konsultasi-mata\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">pemeriksaan mata</a>&nbsp;ke dokter, berbagai penyakit mata dan gejalanya dapat terdeteksi lebih dini. Pengobatannya pun tentu akan lebih mudah.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Mengonsumsi Makanan Bergizi<br></strong>Penelitian menunjukkan bahwa makanan sehat yang mengandung berbagai nutrisi, seperti&nbsp;<a href=\"https://www.alodokter.com/melihat-lebih-jauh-tentang-manfaat-vitamin-a\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">vitamin A</a>, C dan E,&nbsp;<em>zinc</em>,&nbsp;<a href=\"https://www.alodokter.com/lutein\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">lutein</a>, selenium, dan asam lemak omega-3, dapat membantu menangkal masalah mata terkait usia, misalnya katarak dan degenerasi makula. Berbagai nutrisi tersebut bisa didapatkan dengan mengonsumsi sayuran berdaun hijau, salmon, tuna, telur, kacang-kacangan, dan jeruk.<strong><br></strong></p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Jangan Terlalu Lama Menatap&nbsp;</strong><strong>L</strong><strong>ayar&nbsp;</strong><strong>E</strong><strong>lektronik<br></strong>Menatap layar &nbsp;komputer atau&nbsp;<em>smartphone&nbsp;</em>terlalu lama dapat menyebabkan&nbsp;<a href=\"https://www.alodokter.com/cukupi-istirahat-untuk-menghindari-mata-lelah\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">mata lelah</a>. Gejalanya dapat berupa sakit kepala, nyeri leher, sakit pada bahu dan punggung, mata kering dan tegang, sulit fokus menatap kejauhan, dan pandangan menjadi kabur. Jika Anda bekerja di depan komputer sepanjang hari, tiap 20 menit alihkan pandangan mata sejauh 6 meter selama 20 detik, untuk mengurangi ketegangan pada mata. Atau bisa juga mengistirahatkan mata selama 15 menit tiap 2 jam sekali. Jika mata Anda terasa kering, seringlah mengedipkan mata.</p>', '2019-11-26 06:50:11', 2, '2019-11-26 06:50:11', 1, 'default.jpg'),
(4, 'Tujuh Cara Menjaga Kesehatan Mata', 'Kesehatan', '<p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Rutin Memeriksakan Mata<br></strong>Setiap orang, mulai dari anak-anak hingga usia lanjut, dianjurkan untuk memeriksakan mata ke dokter spesialis mata setidaknya 2 tahun sekali. Rutin memeriksakan mata dapat mendeteksi dini masalah pada mata akibat penyakit tertentu, seperti&nbsp;<a href=\"https://www.alodokter.com/retinopati-diabetik\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">diabetes</a>&nbsp;dan tekanan darah tinggi.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\">Orang dewasa yang sudah berumur lebih dari 40 tahun bahkan disarankan untuk memeriksakan mata setahun sekali. Ini berguna untuk mencegah penyakit mata yang berkaitan dengan bertambahnya usia, seperti&nbsp;<a href=\"https://www.alodokter.com/degenerasi-makula\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">degenerasi makula</a>, glaukoma, dan katarak. Sedangkan anak-anak harus diperiksa, setidaknya dua tahun sekali, untuk mendeteksi masalah penglihatan yang mungkin dapat memengaruhi kemampuan belajarnya. Anak-anak tidak perlu harus sudah bisa membaca untuk melakukan pemeriksaan mata.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\">Cari tahu pula riwayat kesehatan mata dalam keluarga. Mengapa? Karena banyak penyakit atau masalah mata yang diturunkan secara genetik dari orang tua ke anak. Dengan&nbsp;<a href=\"https://www.alodokter.com/cari-rumah-sakit/optalmologi/pemeriksaan-dan-konsultasi-mata\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">pemeriksaan mata</a>&nbsp;ke dokter, berbagai penyakit mata dan gejalanya dapat terdeteksi lebih dini. Pengobatannya pun tentu akan lebih mudah.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Mengonsumsi Makanan Bergizi<br></strong>Penelitian menunjukkan bahwa makanan sehat yang mengandung berbagai nutrisi, seperti&nbsp;<a href=\"https://www.alodokter.com/melihat-lebih-jauh-tentang-manfaat-vitamin-a\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">vitamin A</a>, C dan E,&nbsp;<em>zinc</em>,&nbsp;<a href=\"https://www.alodokter.com/lutein\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">lutein</a>, selenium, dan asam lemak omega-3, dapat membantu menangkal masalah mata terkait usia, misalnya katarak dan degenerasi makula. Berbagai nutrisi tersebut bisa didapatkan dengan mengonsumsi sayuran berdaun hijau, salmon, tuna, telur, kacang-kacangan, dan jeruk.<strong><br></strong></p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Jangan Terlalu Lama Menatap&nbsp;</strong><strong>L</strong><strong>ayar&nbsp;</strong><strong>E</strong><strong>lektronik<br></strong>Menatap layar &nbsp;komputer atau&nbsp;<em>smartphone&nbsp;</em>terlalu lama dapat menyebabkan&nbsp;<a href=\"https://www.alodokter.com/cukupi-istirahat-untuk-menghindari-mata-lelah\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">mata lelah</a>. Gejalanya dapat berupa sakit kepala, nyeri leher, sakit pada bahu dan punggung, mata kering dan tegang, sulit fokus menatap kejauhan, dan pandangan menjadi kabur. Jika Anda bekerja di depan komputer sepanjang hari, tiap 20 menit alihkan pandangan mata sejauh 6 meter selama 20 detik, untuk mengurangi ketegangan pada mata. Atau bisa juga mengistirahatkan mata selama 15 menit tiap 2 jam sekali. Jika mata Anda terasa kering, seringlah mengedipkan mata.</p>', '2019-11-26 06:53:38', 2, '2019-11-26 06:53:38', 1, 'default.jpg'),
(5, 'Tujuh Cara Menjaga Kesehatan Mata', 'Kesehatan', '<p>gg</p>', '2019-11-26 07:38:28', 2, '2019-11-26 07:38:28', 1, 'uaua.jpg'),
(6, 'Tujuh Cara Menjaga Kesehatan Mata', 'Kesehatan', '<p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Rutin Memeriksakan Mata<br></strong>Setiap orang, mulai dari anak-anak hingga usia lanjut, dianjurkan untuk memeriksakan mata ke dokter spesialis mata setidaknya 2 tahun sekali. Rutin memeriksakan mata dapat mendeteksi dini masalah pada mata akibat penyakit tertentu, seperti&nbsp;<a href=\"https://www.alodokter.com/retinopati-diabetik\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">diabetes</a>&nbsp;dan tekanan darah tinggi.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\">Orang dewasa yang sudah berumur lebih dari 40 tahun bahkan disarankan untuk memeriksakan mata setahun sekali. Ini berguna untuk mencegah penyakit mata yang berkaitan dengan bertambahnya usia, seperti&nbsp;<a href=\"https://www.alodokter.com/degenerasi-makula\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">degenerasi makula</a>, glaukoma, dan katarak. Sedangkan anak-anak harus diperiksa, setidaknya dua tahun sekali, untuk mendeteksi masalah penglihatan yang mungkin dapat memengaruhi kemampuan belajarnya. Anak-anak tidak perlu harus sudah bisa membaca untuk melakukan pemeriksaan mata.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\">Cari tahu pula riwayat kesehatan mata dalam keluarga. Mengapa? Karena banyak penyakit atau masalah mata yang diturunkan secara genetik dari orang tua ke anak. Dengan&nbsp;<a href=\"https://www.alodokter.com/cari-rumah-sakit/optalmologi/pemeriksaan-dan-konsultasi-mata\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">pemeriksaan mata</a>&nbsp;ke dokter, berbagai penyakit mata dan gejalanya dapat terdeteksi lebih dini. Pengobatannya pun tentu akan lebih mudah.</p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Mengonsumsi Makanan Bergizi<br></strong>Penelitian menunjukkan bahwa makanan sehat yang mengandung berbagai nutrisi, seperti&nbsp;<a href=\"https://www.alodokter.com/melihat-lebih-jauh-tentang-manfaat-vitamin-a\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">vitamin A</a>, C dan E,&nbsp;<em>zinc</em>,&nbsp;<a href=\"https://www.alodokter.com/lutein\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">lutein</a>, selenium, dan asam lemak omega-3, dapat membantu menangkal masalah mata terkait usia, misalnya katarak dan degenerasi makula. Berbagai nutrisi tersebut bisa didapatkan dengan mengonsumsi sayuran berdaun hijau, salmon, tuna, telur, kacang-kacangan, dan jeruk.<strong><br></strong></p><p style=\"margin: 10px 0px; color: rgb(59, 55, 56); font-family: LatoWeb, sans-serif;\"><strong>Jangan Terlalu Lama Menatap&nbsp;</strong><strong>L</strong><strong>ayar&nbsp;</strong><strong>E</strong><strong>lektronik<br></strong>Menatap layar &nbsp;komputer atau&nbsp;<em>smartphone&nbsp;</em>terlalu lama dapat menyebabkan&nbsp;<a href=\"https://www.alodokter.com/cukupi-istirahat-untuk-menghindari-mata-lelah\" target=\"_blank\" style=\"color: rgb(53, 112, 210);\">mata lelah</a>. Gejalanya dapat berupa sakit kepala, nyeri leher, sakit pada bahu dan punggung, mata kering dan tegang, sulit fokus menatap kejauhan, dan pandangan menjadi kabur. Jika Anda bekerja di depan komputer sepanjang hari, tiap 20 menit alihkan pandangan mata sejauh 6 meter selama 20 detik, untuk mengurangi ketegangan pada mata. Atau bisa juga mengistirahatkan mata selama 15 menit tiap 2 jam sekali. Jika mata Anda terasa kering, seringlah mengedipkan mata.</p>', '2019-11-26 07:39:43', 2, '2019-11-26 07:39:43', 1, 'www.png');

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
(1, 'Batuk', 1, 'Dari Daun Mint guna meredakan batuk', 1, '2019-11-20', NULL, NULL),
(2, 'Pusing', 0, 'Meredakan Sakit Pusing', 1, '2019-11-20', 1, '2019-11-21');

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
(1, 'A1', 'Rak A', 'Gud', 1, 1, '2019-11-20 00:00:00', 1, '2019-11-20 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `management_uang`
--

CREATE TABLE `management_uang` (
  `IDManagement` int(11) NOT NULL,
  `tanggalTransaksi` datetime NOT NULL,
  `Debit` decimal(19,4) DEFAULT NULL,
  `Kredit` decimal(19,4) DEFAULT NULL,
  `Total` decimal(19,4) DEFAULT NULL,
  `Deskripsi` longtext DEFAULT NULL,
  `CreateBy` int(11) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Foto` varchar(50) DEFAULT NULL,
  `CreateBy` int(11) NOT NULL,
  `CreateDate` datetime NOT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'Karyawan', 1, 1, '2019-11-21 00:00:00', 1, '2019-11-26 00:00:00');

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
(1, 'PT.UltraFlu33', 'po', 'ultraflu@gmail.com', '43333', 1, 1, '2019-11-21 00:00:00', 1, '2019-11-21 07:26:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `IDTransaksi` varchar(50) NOT NULL,
  `IDKaryawan` int(11) NOT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `FotoResep` longtext DEFAULT NULL,
  `totalBayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

INSERT INTO `user` (`IDUser`, `Nama`, `Alamat`, `NoTelp`, `TglLahir`, `Email`, `status`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`, `username`, `password`, `IDRole`, `jeniskelamin`) VALUES
(2, 'danis andika praditya', 'Jakarta', '082257761653', '2018-03-01', 'danisandika1@gmail.com', 1, 1, '2019-11-26 10:00:00', NULL, NULL, 'danis', 'danisandika', 1, 'Laki-Laki');

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
  MODIFY `IDInfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenisobat`
--
ALTER TABLE `jenisobat`
  MODIFY `IDJenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lokasi_penyimpanan`
--
ALTER TABLE `lokasi_penyimpanan`
  MODIFY `IDLokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `management_uang`
--
ALTER TABLE `management_uang`
  MODIFY `IDManagement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `IDObat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `IDRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `IDSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `IDUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
