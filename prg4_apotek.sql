-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2019 pada 10.05
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
-- Database: `prg4_apotek`
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
(1, 'Terlarang', 0, 'Obat', 1, '2019-11-17', 1, '2019-11-17'),
(2, 'Obat Obatan', 1, 'Adalah Suatu Obat yang bagus', 1, '2019-11-17', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `IDLogin` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `IDUser` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'GD2', 'Lokasi 2 sebelah kanan', 'khusus obat keras', 1, 1, '2019-11-20 11:48:11', 1, '2019-11-20 00:00:00');

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

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`IDObat`, `namaObat`, `IDJenis`, `status`, `JumlahObat`, `Keterangan`, `IDLokasi`, `Satuan`, `Harga`, `Expired`, `Foto`, `CreateBy`, `CreateDate`, `ModifiedBy`, `ModifiedDate`) VALUES
(17, 'Paracetamol', 1, NULL, NULL, 'Demam', 1, 'Butir', '1300.0000', '2019-11-20', 'a', 1, '2019-11-20 00:00:00', NULL, NULL),
(18, 'Dikomix', 2, 1, NULL, 'Batuk', 1, 'Butir', '1300.0000', '2019-01-20', 'as', 1, '2019-11-20 00:00:00', NULL, NULL);

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
(1, 'Kasir', 1, 1, '2019-11-20 04:59:48', 1, '2019-11-20 05:04:54'),
(2, 'Admin', 1, 1, '2019-11-20 14:03:49', NULL, NULL);

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
(1, 'PT.PETROKIMIA', 'Surabaya', 'petro@gmail.com', '0810920312', 1, 1, '2019-11-18 00:00:00', 1, '2019-11-18 00:00:00');

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
  `ModifiedDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `userlogin`
--

CREATE TABLE `userlogin` (
  `IDrole` int(11) NOT NULL,
  `IDLogin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indeks untuk tabel `jenisobat`
--
ALTER TABLE `jenisobat`
  ADD PRIMARY KEY (`IDJenis`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`IDLogin`),
  ADD KEY `FK_Login_User` (`IDUser`);

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
  ADD PRIMARY KEY (`IDUser`);

--
-- Indeks untuk tabel `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`IDrole`,`IDLogin`),
  ADD KEY `FK_UserLogin_Login` (`IDLogin`);

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
-- Ketidakleluasaan untuk tabel `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `FK_Login_User` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Ketidakleluasaan untuk tabel `userlogin`
--
ALTER TABLE `userlogin`
  ADD CONSTRAINT `FK_UserLogin_Login` FOREIGN KEY (`IDLogin`) REFERENCES `login` (`IDLogin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_UserLogin_Role` FOREIGN KEY (`IDrole`) REFERENCES `role` (`IDRole`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
