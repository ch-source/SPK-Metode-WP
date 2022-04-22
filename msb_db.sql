-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Mar 2022 pada 05.56
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msb_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_grafik`
--

CREATE TABLE `tbl_grafik` (
  `id_grafik` int(11) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `lulus` int(11) NOT NULL,
  `tidak_lulus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_grafik`
--

INSERT INTO `tbl_grafik` (`id_grafik`, `periode`, `tahun`, `lulus`, `tidak_lulus`) VALUES
(3, '3', '2022', 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hasil_seleksi`
--

CREATE TABLE `tbl_hasil_seleksi` (
  `id_seleksi` int(11) NOT NULL,
  `id_pelamar` varchar(50) NOT NULL,
  `nama_pelamar` varchar(50) NOT NULL,
  `id_lowongan` varchar(50) NOT NULL,
  `periode` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `vektor_s` varchar(50) NOT NULL,
  `rangking` varchar(50) NOT NULL,
  `status_seleksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hasil_seleksi`
--

INSERT INTO `tbl_hasil_seleksi` (`id_seleksi`, `id_pelamar`, `nama_pelamar`, `id_lowongan`, `periode`, `tahun`, `tanggal`, `vektor_s`, `rangking`, `status_seleksi`) VALUES
(21, 'PLM004', 'Yhun', 'LWG001', '3', '2022', '2022-03-30', '67.04475633314', '0.29256192217173', 'Lulus'),
(22, 'PLM005', 'Arin', 'LWG001', '3', '2022', '2022-03-30', '58.912819790831', '0.25707674606079', 'Tidak Lulus'),
(23, 'PLM006', 'Natan', 'LWG001', '3', '2022', '2022-03-30', '45.734645783683', '0.19957139994412', 'Tidak Lulus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_informasi`
--

CREATE TABLE `tbl_informasi` (
  `id_informasi` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_mulai` varchar(50) NOT NULL,
  `tgl_akhir` varchar(50) NOT NULL,
  `jam_interview` varchar(50) NOT NULL,
  `tempat_interview` varchar(50) NOT NULL,
  `syarat` varchar(50) NOT NULL,
  `aktif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_informasi`
--

INSERT INTO `tbl_informasi` (`id_informasi`, `deskripsi`, `tgl_mulai`, `tgl_akhir`, `jam_interview`, `tempat_interview`, `syarat`, `aktif`) VALUES
(5, 'Berdasarkan hasil test seleksi penerimaan karyawan baru PT. Primafood International Tahun 2022, maka kami mengundang pelamar yang lulus test untuk mengikuti sesi wawancara yang akan di laksanakan pada:', '2022-04-01', '2022-04-02', '08:00', 'PT. Primafood International', 'Berpakaian Rapi & Bersepatu', 'ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` varchar(50) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `benefit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `benefit`) VALUES
('KRT001', 'Pengalaman Kerja', '5'),
('KRT002', 'Pengalaman Berorganisasi', '5'),
('KRT003', 'Publick Speaking', '4'),
('KRT004', 'Berorientasi Pada Divisi dan perusahaan', '3'),
('KRT005', 'Kepribadian', '3'),
('KRT006', 'Kerja Sama Team', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lamaran`
--

CREATE TABLE `tbl_lamaran` (
  `id_lamaran` int(11) NOT NULL,
  `id_pelamar` varchar(50) NOT NULL,
  `id_lowongan` varchar(50) NOT NULL,
  `tgl_lamar` varchar(50) NOT NULL,
  `surat_lamaran` varchar(200) NOT NULL,
  `cv` varchar(200) NOT NULL,
  `ktp` varchar(200) NOT NULL,
  `kk` varchar(200) NOT NULL,
  `ijazah` varchar(200) NOT NULL,
  `trasnkrip` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `status_lamaran` varchar(50) NOT NULL,
  `status_berkas` varchar(50) NOT NULL,
  `total_score` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lamaran`
--

INSERT INTO `tbl_lamaran` (`id_lamaran`, `id_pelamar`, `id_lowongan`, `tgl_lamar`, `surat_lamaran`, `cv`, `ktp`, `kk`, `ijazah`, `trasnkrip`, `foto`, `status_lamaran`, `status_berkas`, `total_score`) VALUES
(6, 'PLM004', 'LWG001', '2022-03-25', 'sl_PLM004.pdf', 'cv_6.pdf', '25032022073219Certificate.jpg', 'kk_6.pdf', 'ijazah_6.pdf', 'transkrip_6.pdf', '25032022072828Certificate (1).jpg', 'Sudah Mengerjakan Soal', 'Oke', '410'),
(7, 'PLM003', 'LWG004', '2022-03-26', 'sl_PLM003.pdf', 'cv_7.pdf', '26032022183149Certificate.jpg', 'kk_7.pdf', 'ijazah_7.pdf', 'transkrip_7.pdf', '26032022183142Certificate (1).jpg', 'Sudah Mengerjakan Soal', '', '350'),
(8, 'PLM005', 'LWG001', '2022-03-27', 'sl_PLM005.pdf', 'cv_8.pdf', '27032022161431Certificate.jpg', 'kk_8.pdf', 'ijazah_8.pdf', 'transkrip_8.pdf', '27032022161425Certificate (1).jpg', 'Sudah Mengerjakan Soal', '', '360'),
(9, 'PLM006', 'LWG001', '2022-03-28', 'sl_PLM006.pdf', 'cv_9.pdf', '28032022145510Certificate.jpg', 'kk_9.pdf', 'ijazah_9.pdf', 'transkrip_9.pdf', '28032022145504Certificate (1).jpg', 'Sudah Mengerjakan Soal', '', '280');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lowongan`
--

CREATE TABLE `tbl_lowongan` (
  `id_lowongan` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tgl_upload` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lowongan`
--

INSERT INTO `tbl_lowongan` (`id_lowongan`, `judul`, `tgl_upload`) VALUES
('LWG001', 'Staff Administrasi', '2020-03-30'),
('LWG002', 'IT Support', '2020-03-30'),
('LWG003', 'Staff HRD', '2020-04-02'),
('LWG004', 'Akuntan', '2020-04-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_opsi_soal`
--

CREATE TABLE `tbl_opsi_soal` (
  `id_opsi` int(11) NOT NULL,
  `id_soal` varchar(50) NOT NULL,
  `opsi` varchar(50) NOT NULL,
  `isi_opsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelamar`
--

CREATE TABLE `tbl_pelamar` (
  `id_pelamar` varchar(50) NOT NULL,
  `nama_pelamar` varchar(50) NOT NULL,
  `alamat_pelamar` varchar(50) NOT NULL,
  `telepon_pelamar` varchar(50) NOT NULL,
  `jk_pelamar` varchar(50) NOT NULL,
  `email_pelamar` varchar(50) NOT NULL,
  `pendidkan_terakhir_pelamar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pelamar`
--

INSERT INTO `tbl_pelamar` (`id_pelamar`, `nama_pelamar`, `alamat_pelamar`, `telepon_pelamar`, `jk_pelamar`, `email_pelamar`, `pendidkan_terakhir_pelamar`) VALUES
('PLM001', 'Ni Putu kadek', 'Denpasar-Bali', '0824788888', 'Laki-laki', 'putu_kadek@gmail.com', 'S1 Manajemen'),
('PLM002', 'Muhammad Mahmud', 'Denpasar-Bali', '082883883', 'Laki-laki', 'mahmud@gmail.com', 'D3 Antropologi'),
('PLM003', 'Maria Yohana', 'Nusa Dua, Bali', '08233595995', 'Perempuan', 'yohana@gmail.com', 'S1 Akuntansi'),
('PLM004', 'Yhun', 'Br. Cempaka, Desa Pikat', '082339368112', 'Perempuan', 'chrissony184@gmail.com', 'Sarjana Arkeog'),
('PLM005', 'Arin', 'Br. Cempaka, Desa Pikat', '082339368112', 'Laki-laki', 'arin@gmail.com', 'sarjana'),
('PLM006', 'Natan', 'Br. Cempaka, Desa Pikat', '082339368112', 'Laki-laki', 'natan@gmail.com', 'sarjana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_score_akhir`
--

CREATE TABLE `tbl_score_akhir` (
  `id_lowongan` varchar(50) NOT NULL,
  `id_pelamar` varchar(50) NOT NULL,
  `c1` varchar(50) NOT NULL,
  `c2` varchar(50) NOT NULL,
  `c3` varchar(50) NOT NULL,
  `c4` varchar(50) NOT NULL,
  `c5` varchar(50) NOT NULL,
  `c6` varchar(50) NOT NULL,
  `tgl_test` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `vs` varchar(50) NOT NULL,
  `rangking` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_score_akhir`
--

INSERT INTO `tbl_score_akhir` (`id_lowongan`, `id_pelamar`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `tgl_test`, `total`, `vs`, `rangking`) VALUES
('LWG001', 'PLM004', '60', '70', '80', '70', '70', '60', '2022-03-25', '410', '67.04475633314', '0.29256192217173'),
('LWG004', 'PLM003', '70', '60', '50', '60', '40', '70', '2022-03-26', '350', '57.472106229983', '0.31331955380636'),
('LWG001', 'PLM005', '60', '60', '70', '40', '70', '60', '2022-03-27', '360', '58.912819790831', '0.25707674606079'),
('LWG001', 'PLM006', '40', '50', '50', '50', '40', '50', '2022-03-28', '280', '45.734645783683', '0.19957139994412');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id_soal` varchar(50) NOT NULL,
  `id_kriteria` varchar(50) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `a` varchar(50) NOT NULL,
  `b` varchar(50) NOT NULL,
  `c` varchar(50) NOT NULL,
  `d` varchar(50) NOT NULL,
  `e` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_soal`
--

INSERT INTO `tbl_soal` (`id_soal`, `id_kriteria`, `nama_kriteria`, `a`, `b`, `c`, `d`, `e`) VALUES
('SAL001', 'KRT001', 'Pengalaman Kerja', '0 Tahun', '½ Tahun', '1 Tahun', '2 Tahun', '>2 Tahun'),
('SAL002', 'KRT002', 'Pengalaman Berorganisasi', '0 Tahun', '½ Tahun', '1 Tahun', '2 Tahun', '>2 Tahun'),
('SAL003', 'KRT003', 'Publick Speaking', 'Lihat teks, dan  monoton', 'Tidak percaya diri dan  gugup', 'Tidak menguasai  materi presentasi secara  keselur', 'Berpenampilan baik', 'Komunikatif,menguasai  materi yang  dibawahkan dan'),
('SAL004', 'KRT004', 'Berorientasi Pada Divisi dan perusahaan', 'Berorientasi  Pada Divisi dan Perusahaan', 'Fokus dengan  pekerjaan lain', 'Kebiasaan  menunda-nunda  pekerjaan', 'Fokus tidak  menunda -nunda  pekerjaan', 'Loyalitas yang  tinggi serta  adanya skala  priori'),
('SAL005', 'KRT005', 'Kepribadian', 'Egois tidak mau  bekerja sama', 'Kurang betanggung  jawab', 'Merasa ketakutan  saat berbicara atau  kaku', 'Tenang,cara bicara  jelas, dan mampu  memberikan i', 'Sopan,Bertanggung  jawab'),
('SAL006', 'KRT006', 'Kerja Sama Team', 'Egois tidak mau  bekerja sama', 'Tidak mau  mendengar  pendapat orang', 'Rela berkorban  untuk teman satu  team', 'Terlibat aktif dalam  bekerja team', 'Kesedian  melakukan tugas  sesuai kesepakatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_syarat_lowongan`
--

CREATE TABLE `tbl_syarat_lowongan` (
  `id_syarat` int(11) NOT NULL,
  `id_lowongan` varchar(50) NOT NULL,
  `syarat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_syarat_lowongan`
--

INSERT INTO `tbl_syarat_lowongan` (`id_syarat`, `id_lowongan`, `syarat`) VALUES
(7, 'LWG003', 'Usia Max 30 Tahun'),
(8, 'LWG003', 'Pria /Wanita'),
(9, 'LWG003', 'Pendidikan Min S1 Psikologi'),
(10, 'LWG003', 'Bisa Berkomunikasi Dengan Baik'),
(11, 'LWG003', 'Berpenampilan Menarik'),
(12, 'LWG001', 'Pria/Wanita'),
(13, 'LWG001', 'Usia Max 28 Tahun'),
(14, 'LWG001', 'Berpengalaman Di Bidang Yang Sama'),
(15, 'LWG001', 'Jujujr Dan Bertanggung Jawab'),
(16, 'LWG002', 'Pria, Usia Minimal 35 Thn'),
(17, 'LWG002', 'Minimal D1 Teknik Informatika'),
(18, 'LWG004', 'Pria /Wanita'),
(19, 'LWG004', 'Pendidikan Min D1 Akuntansi'),
(20, 'LWG004', 'Pengalaman Min 1 Tahun Dibidang Yang Sama'),
(21, 'LWG004', 'Jujujur dan Pekerja Keras');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(50) NOT NULL,
  `id_pelamar` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `telepon_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `tgl_registrasi` varchar(50) NOT NULL,
  `status_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `id_pelamar`, `nama_user`, `telepon_user`, `email_user`, `username`, `password`, `level`, `tgl_registrasi`, `status_user`) VALUES
('USR002', '', 'Maria Ave', '0823993991', 'ave@gmail.com', '1234', '1234', 'Pimpinan', '2020-04-01', 'Valid'),
('USR003', 'PLM001', 'Ni Putu kadek', '0824788888', 'putu_kadek@gmail.com', 'putukadek', 'putukadek', 'Pelamar', '2020-03-29', 'Valid'),
('USR004', '', 'Elda John', '0823883883', 'elda@gmail.com', '1234', '1234', 'HRD', '2020-04-02', 'Valid'),
('USR005', 'PLM002', 'Muhammad Mahmud', '082883883', 'mahmud@gmail.com', 'mahmud@gmail.com', 'mahmud', 'Pelamar', '2020-04-07', 'Valid'),
('USR006', 'PLM003', 'Maria Yohana', '08233595995', 'yohana@gmail.com', 'yohana@gmail.com', 'yohana', 'Pelamar', '2020-04-07', 'Valid'),
('USR007', 'PLM004', 'Yhun', '082339368112', 'chrissony184@gmail.com', 'chrissony184@gmail.com', '1234', 'Pelamar', '2022-03-25', 'Valid'),
('USR008', 'PLM005', 'Arin', '082339368112', 'arin@gmail.com', 'arin@gmail.com', '1234', 'Pelamar', '2022-03-27', 'Valid'),
('USR009', 'PLM006', 'Natan', '082339368112', 'natan@gmail.com', 'natan@gmail.com', '1234', 'Pelamar', '2022-03-28', 'Valid');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_grafik`
--
ALTER TABLE `tbl_grafik`
  ADD PRIMARY KEY (`id_grafik`);

--
-- Indeks untuk tabel `tbl_hasil_seleksi`
--
ALTER TABLE `tbl_hasil_seleksi`
  ADD PRIMARY KEY (`id_seleksi`);

--
-- Indeks untuk tabel `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indeks untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tbl_lamaran`
--
ALTER TABLE `tbl_lamaran`
  ADD PRIMARY KEY (`id_lamaran`);

--
-- Indeks untuk tabel `tbl_lowongan`
--
ALTER TABLE `tbl_lowongan`
  ADD PRIMARY KEY (`id_lowongan`);

--
-- Indeks untuk tabel `tbl_opsi_soal`
--
ALTER TABLE `tbl_opsi_soal`
  ADD PRIMARY KEY (`id_opsi`);

--
-- Indeks untuk tabel `tbl_pelamar`
--
ALTER TABLE `tbl_pelamar`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- Indeks untuk tabel `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indeks untuk tabel `tbl_syarat_lowongan`
--
ALTER TABLE `tbl_syarat_lowongan`
  ADD PRIMARY KEY (`id_syarat`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_grafik`
--
ALTER TABLE `tbl_grafik`
  MODIFY `id_grafik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_hasil_seleksi`
--
ALTER TABLE `tbl_hasil_seleksi`
  MODIFY `id_seleksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_lamaran`
--
ALTER TABLE `tbl_lamaran`
  MODIFY `id_lamaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_opsi_soal`
--
ALTER TABLE `tbl_opsi_soal`
  MODIFY `id_opsi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_syarat_lowongan`
--
ALTER TABLE `tbl_syarat_lowongan`
  MODIFY `id_syarat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
