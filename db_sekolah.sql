-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Bulan Mei 2024 pada 15.56
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id`, `nip`, `nama`, `alamat`, `telpon`, `agama`, `foto`) VALUES
(4, '199012102022102056', 'juminten', 'Jln bagaya nih boss', '087774114123', 'Hindu', '286-muka.jpeg'),
(8, '199012112022102001', 'yahyaaa', 'Jln Mekarasai', '087774114132', 'Islam', 'default.png'),
(10, '199012102022108907', 'ellon', 'Jl X', '087774114125', 'Islam', '973-elon.jpeg'),
(12, '123456789101117111', 'Jef Bezos', 'Jl Amazon', '087774224139', 'Kristen', '818-jeff.jpg'),
(15, '199014562022101001', 'suryanti', 'Jln Madiun', '087774214132', 'Kristen', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai_ujian`
--

CREATE TABLE `tbl_nilai_ujian` (
  `id` int(11) NOT NULL,
  `no_ujian` char(7) NOT NULL,
  `pelajaran` varchar(100) NOT NULL,
  `nilai_ujian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_nilai_ujian`
--

INSERT INTO `tbl_nilai_ujian` (`id`, `no_ujian`, `pelajaran`, `nilai_ujian`) VALUES
(7, 'Kimia', 'IPA', 90),
(8, 'Bahasa', 'IPA', 90),
(9, 'Bahasa', 'IPA', 85),
(10, 'Kimia', 'IPA', 80),
(11, 'Bahasa', 'IPA', 80),
(12, 'Bahasa', 'IPA', 40),
(13, 'bahasa', 'IPS', 90),
(14, 'Sejarah', 'IPS', 80),
(15, 'Sejarah', 'IPS', 80),
(16, 'Kimia', 'IPA', 90),
(17, 'Bahasa', 'IPA', 80),
(18, 'Bahasa', 'IPA', 95),
(19, 'Kimia', 'IPA', 90),
(20, 'Bahasa', 'IPA', 80),
(21, 'Biologi', 'IPA', 90),
(22, 'Fisika', 'IPA', 85),
(23, 'Kimia d', 'IPA', 95),
(24, 'Kimia', 'IPA', 70),
(25, 'Bahasa', 'IPA', 60),
(26, 'Biologi', 'IPA', 50),
(27, 'Fisika', 'IPA', 40),
(28, 'Kimia d', 'IPA', 80),
(29, 'Kimia', 'IPA', 90),
(30, 'Bahasa', 'IPA', 90),
(31, 'Biologi', 'IPA', 85),
(32, 'Fisika', 'IPA', 90),
(33, 'Kimia d', 'IPA', 85);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelajaran`
--

CREATE TABLE `tbl_pelajaran` (
  `id` int(11) NOT NULL,
  `pelajaran` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_pelajaran`
--

INSERT INTO `tbl_pelajaran` (`id`, `pelajaran`, `jurusan`, `guru`) VALUES
(3, 'Kimia', 'IPA', 'juminten'),
(4, 'Bahasa Fisika', 'IPA', 'ellon'),
(5, 'Biologi', 'IPA', 'Jef Bezos'),
(9, 'Fisika dasar', 'IPA', 'yahyaaa'),
(10, 'Kimia dasar', 'IPA', 'suryanti');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sekolah`
--

CREATE TABLE `tbl_sekolah` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `akreditasi` char(1) NOT NULL,
  `status` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `visimisi` varchar(256) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`id`, `nama`, `alamat`, `akreditasi`, `status`, `email`, `visimisi`, `gambar`) VALUES
(1, 'SMA PEMALANG', 'Jln Sukaharjo', 'B', 'Swasta', 'smapemalang@gmail.com', 'Menyukseskan anak bangsa', '47-bgLogin.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nis` char(6) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nama`, `alamat`, `kelas`, `jurusan`, `foto`) VALUES
('NIS003', 'gading', 'jln', 'XII', 'IPA', '596-gading.jpg'),
('NIS004', 'prambudi', 'Jl Pandawa', 'XII', 'IPA', '435-pram.jpg'),
('NIS005', 'dapa', 'panduuu', 'XII', 'IPA', '910-dapaa.jpg'),
('NIS011', 'paid', 'Jl Paid', 'X', 'IPA', '842-paid.jpg'),
('NIS012', 'elisa', 'Jln Margayanti', 'XII', 'IPA', '959-uni.jpeg'),
('NIS013', 'Rapi', 'Jln Margonda Raya', 'XII', 'IPA', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ujian`
--

CREATE TABLE `tbl_ujian` (
  `no_ujian` char(7) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `nis` char(6) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `total_nilai` int(11) NOT NULL,
  `nilai_terendah` int(11) NOT NULL,
  `nilai_tertinggi` int(11) NOT NULL,
  `nilai_rata2` int(11) NOT NULL,
  `hasil_ujian` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_ujian`
--

INSERT INTO `tbl_ujian` (`no_ujian`, `tgl_ujian`, `nis`, `jurusan`, `total_nilai`, `nilai_terendah`, `nilai_tertinggi`, `nilai_rata2`, `hasil_ujian`) VALUES
('UTS-001', '2024-05-05', 'NIS003', 'IPA', 265, 85, 90, 88, 'LULUS'),
('UTS-002', '2024-05-05', 'NIS004', 'IPA', 200, 40, 80, 67, 'GAGAL'),
('UTS-004', '2024-05-06', 'NIS011', 'IPA', 265, 80, 95, 88, 'LULUS'),
('UTS-005', '2024-05-09', 'NIS012', 'IPA', 440, 80, 95, 88, 'LULUS'),
('UTS-006', '2024-05-09', 'NIS005', 'IPA', 300, 40, 80, 60, 'GAGAL'),
('UTS-007', '2024-05-10', 'NIS013', 'IPA', 440, 85, 90, 88, 'LULUS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `nama`, `alamat`, `jabatan`, `foto`) VALUES
(1, 'admin', '$2y$10$zmDZbJlqeXjz09wULvyWDewWFoAa5lM/OLzha6nVeRgeU/uBYi13O', 'prm', 'wyyy', '', '458-toga.png'),
(2, 'budi', '$2y$10$a1ted37tlcanuCb2uhvdi.qYIjtPja/V1zeQzQw8hgTOjkF8y91y.', 'buidi', 'panduu', '', '27-toga.png'),
(3, 'alief', '$2y$10$EXXXz3tDhAEpfKXcq81hMeoD507YM8J6ffneXgrO7BYdHchR8Xcrq', 'alief', 'hiyaa', '', '560-productt.png'),
(4, 'budd', '$2y$10$XTZmWyb9x.taZhzSEBWHvulXVR2nxHaqO0dVRaaQPskJS4Obyz2I6', 'budd', 'hiy', 'Kepala Sekolah', '325-productt.png'),
(5, 'yahya', '$2y$10$2RyovlJg4Z91AQ0UAS7JTeydWIF8YskKSTpiCLTzXHHWID08mrjuS', 'yahya', 'pandawa', 'Kepala Sekolah', '29-bgLoginpng'),
(6, 'didit', '$2y$10$LP/s.PDAuZ8A77TCvN72au6P4eIkR83VhGzOmEtdaXqbYoe63Klya', 'didit', 'aslam', 'Kepala Sekolah', '40-bgLogin.jpeg'),
(7, 'diia', '$2y$10$DW4mi52VyNdT00SRKZivq.3U8dF4qYbGZbpfcQRGttRoG.xwUiMiy', 'alief', 'hiya', 'Kepala Sekolah', '36-bgLogin.jpeg'),
(8, 'prambudi', '$2y$10$5ASwM./FFkeiFuu3mMB5FegEvIUQl.wW42w9eL9ufiSx8ZGMUXdZy', 'prambudd', 'Jl. Pandu', 'Guru Mapel', '49-bgLogin.jpeg'),
(9, 'rudi', '$2y$10$KYN4wcekTRBd/TC6/L8UR.OCBIVpKdyecpq5qreoflmXnHCOzrBqW', 'rudi', 'domisiliii', 'Kepala Sekolah', '913-51422297.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_nilai_ujian`
--
ALTER TABLE `tbl_nilai_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pelajaran`
--
ALTER TABLE `tbl_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `tbl_ujian`
--
ALTER TABLE `tbl_ujian`
  ADD PRIMARY KEY (`no_ujian`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_nilai_ujian`
--
ALTER TABLE `tbl_nilai_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelajaran`
--
ALTER TABLE `tbl_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
