-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Agu 2024 pada 09.28
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcrud2022`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbarang`
--

CREATE TABLE `tbarang` (
  `id_barang` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `penerima` varchar(15) NOT NULL,
  `asal` varchar(25) NOT NULL,
  `jumlah` int(4) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `tanggal_simpan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbarang`
--

INSERT INTO `tbarang` (`id_barang`, `kode`, `nama`, `penerima`, `asal`, `jumlah`, `satuan`, `tanggal_diterima`, `tanggal_simpan`) VALUES
(1, 'INV-2022-004', 'Mic Warles', '', 'Bantuan', 2, 'Pcs', '2022-08-06', '2024-08-19 06:10:27'),
(2, 'INV-2022-001', 'Meja Kantor', '', 'Pembelian', 1, 'Unit', '2022-06-01', '2024-08-19 04:29:41'),
(3, 'INV-2022-002', 'Kursi Kantor', '', 'Hibah', 5, 'Unit', '2022-06-02', '2024-08-19 05:43:51'),
(4, 'INV-2022-003', 'Laptop ROG', '', 'Sumbangan', 1, 'Unit', '2022-06-04', '2024-08-19 05:45:58'),
(5, 'INV-2022-003', 'Laptop ROG', '', 'Sumbangan', 2, 'Unit', '2022-06-04', '2024-08-19 07:12:31'),
(6, 'INV-2022-003', 'Laptop ROG', '', 'Sumbangan', 2, 'Unit', '2022-06-04', '2024-08-19 07:15:29'),
(7, 'INV-2022-003', 'Laptop ROG', 'aja', 'Sumbangan', 2, 'Unit', '2022-06-04', '2024-08-19 07:18:51'),
(8, 'INV-2022-003', 'Laptop ROG', 'nindi', 'Sumbangan', 2, 'Unit', '2022-06-04', '2024-08-19 07:19:00'),
(9, 'INV-2022-003', 'Laptop ROG', 'zahra', 'Sumbangan', 2, 'Unit', '2022-06-04', '2024-08-19 07:19:08'),
(10, 'INV-2022-003', 'Laptop ROG', 'bunga', 'Sumbangan', 2, 'Unit', '2022-06-04', '2024-08-19 07:19:16'),
(11, 'INV-2022-003', 'Laptop ROG', 'citra', 'Sumbangan', 2, 'Unit', '2022-06-04', '2024-08-19 07:19:25'),
(12, 'INV-2022-003', 'Laptop ROG', 'audy', 'Sumbangan', 2, 'Unit', '2022-06-04', '2024-08-19 07:19:34'),
(13, 'INV-2022-003', 'Laptop ROG', 'rojek', 'Sumbangan', 2, 'Unit', '2022-06-04', '2024-08-19 07:19:46'),
(14, 'INV-2022-003', 'Laptop ROG', 'ezi', 'Sumbangan', 2, 'Unit', '2022-06-04', '2024-08-19 07:19:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbarang`
--
ALTER TABLE `tbarang`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbarang`
--
ALTER TABLE `tbarang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
