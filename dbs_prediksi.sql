-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2020 at 03:37 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_prediksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keputusan`
--

CREATE TABLE `tbl_keputusan` (
  `kd_keputusan` int(11) NOT NULL,
  `parent` text,
  `akar` text,
  `keputusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keputusan`
--

INSERT INTO `tbl_keputusan` (`kd_keputusan`, `parent`, `akar`, `keputusan`) VALUES
(13, '(IPS Semester 4 <3.00)', '(IPS Semester 2 <3.00)', 'Tidak Tepat Waktu'),
(14, '(IPS Semester 4 <3.00) and (IPS Semester 2 <=3.50)', '(IPS Semester 3 <3.00)', 'Tidak Tepat Waktu'),
(15, '(IPS Semester 4 <3.00) and (IPS Semester 2 <=3.50) and (IPS Semester 3 <=3.50)', '(SKS Semester 3 Rendah)', 'Tidak Tepat Waktu'),
(16, '(IPS Semester 4 <3.00) and (IPS Semester 2 <=3.50) and (IPS Semester 3 <=3.50)', '(SKS Semester 3 Tinggi)', 'Tidak Tepat Waktu'),
(17, '(IPS Semester 4 <3.00) and (IPS Semester 2 <=3.50)', '(IPS Semester 3 >3.50)', 'Tidak Tepat Waktu'),
(18, '(IPS Semester 4 <3.00)', '(IPS Semester 2 >3.50)', 'Tepat Waktu'),
(19, '(IPS Semester 4 <=3.50)', '(IPS Semester 2 <3.00)', 'Tidak Tepat Waktu'),
(20, '(IPS Semester 4 <=3.50) and (IPS Semester 2 <=3.50)', '(SKS Semester 4 Rendah)', 'Tidak Tepat Waktu'),
(21, '(IPS Semester 4 <=3.50) and (IPS Semester 2 <=3.50) and (SKS Semester 4 Tinggi)', '(IPS Semester 3 <3.00)', 'Tidak Tepat Waktu'),
(22, '(IPS Semester 4 <=3.50) and (IPS Semester 2 <=3.50) and (SKS Semester 4 Tinggi)', '(IPS Semester 3 <=3.50)', 'Tepat Waktu'),
(23, '(IPS Semester 4 <=3.50) and (IPS Semester 2 <=3.50) and (SKS Semester 4 Tinggi)', '(IPS Semester 3 >3.50)', 'Tepat Waktu'),
(24, '(IPS Semester 4 <=3.50) and (IPS Semester 2 >3.50)', '(IPS Semester 3 <=3.50)', 'Tepat Waktu'),
(25, '(IPS Semester 4 <=3.50) and (IPS Semester 2 >3.50)', '(IPS Semester 3 >3.50)', 'Lebih Cepat'),
(26, '(IPS Semester 4 >3.50) and (IPS Semester 2 <=3.50) ', '(IPS Semester 3 <=3.50)', 'Lebih Cepat'),
(27, '(IPS Semester 4 >3.50) and (IPS Semester 2 <=3.50)', '(IPS Semester 3 >3.50)', 'Lebih Cepat'),
(28, '(IPS Semester 4 >3.50)', '(IPS Semester 2 >3.50)', 'Lebih Cepat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kls_asli`
--

CREATE TABLE `tbl_kls_asli` (
  `npm` varchar(12) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `ket_asli` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kls_asli`
--

INSERT INTO `tbl_kls_asli` (`npm`, `nama`, `ket_asli`) VALUES
('1408017', 'Gilang Koswara', 'Tidak Tepat Waktu'),
('1412001', 'Aden Jalaludin', 'Tidak Tepat Waktu'),
('1412004', 'Andi Wibowo', 'Lebih Cepat'),
('1412006', 'Aprilian Ridwan Hakim', 'Tidak Tepat Waktu'),
('1412008', 'Asti Nurwati', 'Lebih Cepat'),
('1412010', 'Dimas Aditya Anjaswara', 'Tidak Tepat Waktu'),
('1412014', 'Ilham Riyadi', 'Tidak Tepat Waktu'),
('1412015', 'Laviva Maash Sholihati Filjannah', 'Lebih Cepat'),
('1412016', 'Maulana Yusuf', 'Tidak Tepat Waktu'),
('1412018', 'Rahmat Hidayat', 'Tidak Tepat Waktu'),
('1412019', 'Recky Julian', 'Tidak Tepat Waktu'),
('1412020', 'Rina Apriani', 'Tidak Tepat Waktu'),
('1412023', 'Romdhoni Ahmad', 'Tidak Tepat Waktu'),
('1412024', 'Taufik Hidayat', 'Lebih Cepat'),
('1412025', 'Nova Nur Budiman', 'Tidak Tepat Waktu'),
('1412026', 'Hery Insan Maulana', 'Tidak Tepat Waktu'),
('1412027', 'Dede Abdul Aziz', 'Tepat Waktu'),
('1412028', 'Rizka Nurmala', 'Lebih Cepat'),
('1412031', 'Indiary Almira', 'Tepat Waktu'),
('1412032', 'Ahmad Fauzi', 'Tepat Waktu'),
('1412033', 'Restu Gumilang', 'Tidak Tepat Waktu'),
('1412037', 'Jamaludin', 'Tidak Tepat Waktu'),
('1412038', 'Nicko Arrahim', 'Tidak Tepat Waktu'),
('1412040', 'Asep Ahmad Yani', 'Tidak Tepat Waktu'),
('1412047', 'Puri Prasastiwi', 'Tepat Waktu'),
('1413001', 'Achmad Ismail Nachrawi', 'Tidak Tepat Waktu'),
('1413002', 'Achmad Sahlan', 'Tidak Tepat Waktu'),
('1413004', 'Ali Mustofa', 'Tepat Waktu'),
('1413006', 'Anwar Nasrudin', 'Tidak Tepat Waktu'),
('1413009', 'Ashar', 'Tidak Tepat Waktu'),
('1413013', 'Cipta Pratama', 'Tidak Tepat Waktu'),
('1413015', 'Dewi Fatmawati', 'Tidak Tepat Waktu'),
('1413016', 'Dwa Maksum Putra Bumi', 'Tidak Tepat Waktu'),
('1413017', 'Eneng Yulianti', 'Tepat Waktu'),
('1413018', 'Errik Sunendar', 'Tidak Tepat Waktu'),
('1413021', 'Fauzan Yusak Ibrahim', 'Tepat Waktu'),
('1413023', 'Febrian', 'Tidak Tepat Waktu'),
('1413025', 'Girie Hernasa', 'Tidak Tepat Waktu'),
('1413027', 'Hening Irizia Paradenti', 'Tidak Tepat Waktu'),
('1413029', 'Imam Agus Shubekhan', 'Tidak Tepat Waktu'),
('1413030', 'Indra Octaviana', 'Tepat Waktu'),
('1413032', 'Lisna Anggraeni', 'Tepat Waktu'),
('1413033', 'Lupi Ardiansyah', 'Tepat Waktu'),
('1413035', 'M. Aulia Arief Firdaus', 'Tepat Waktu'),
('1413038', 'Muhammad Ariansyah Pratama', 'Tidak Tepat Waktu'),
('1413039', 'Muhammad Fajrul Iman', 'Tidak Tepat Waktu'),
('1413041', 'Muhammad Yuke Subagja', 'Tidak Tepat Waktu'),
('1413042', 'Muqorrobin Mutawaqil', 'Tidak Tepat Waktu'),
('1413043', 'Novi Triyanto', 'Tepat Waktu'),
('1413045', 'Resti Fitriani', 'Tidak Tepat Waktu'),
('1413046', 'Reza Syuhada Sofyan', 'Tepat Waktu'),
('1413054', 'Yudi Setiadi', 'Tepat Waktu'),
('1413056', 'Rizki Darmawan', 'Tepat Waktu'),
('1413058', 'Muhamad Ridwan', 'Tepat Waktu'),
('1413060', 'Rahmat Hidayat', 'Tidak Tepat Waktu'),
('1413061', 'Adam Aji Pratama', 'Tidak Tepat Waktu'),
('1413062', 'Ardi Setiawan', 'Tidak Tepat Waktu'),
('1413063', 'Bagoes Prasetyo', 'Tidak Tepat Waktu'),
('1414001', 'Albar Prayoga', 'Tepat Waktu'),
('1414004', 'Arif Wahyudi', 'Tepat Waktu'),
('1414005', 'Asep Gunawan', 'Tidak Tepat Waktu'),
('1414006', 'Asih lestari', 'Tepat Waktu'),
('1414007', 'Dean Aldy', 'Tidak Tepat Waktu'),
('1414008', 'Asep Nurhidayat', 'Tepat Waktu'),
('1414011', 'Eva Yuliana Rahma', 'Tidak Tepat Waktu'),
('1414012', 'Fallahudin Sihaq', 'Tepat Waktu'),
('1414013', 'Felix Agustinus Gandi', 'Tidak Tepat Waktu'),
('1414014', 'Firman Maulana', 'Tepat Waktu'),
('1414016', 'Lingga Wenny', 'Tepat Waktu'),
('1414021', 'Muhammad Heri Nurohman', 'Tepat Waktu'),
('1414022', 'Muhammad Rizal Fahminuddin', 'Tidak Tepat Waktu'),
('1414023', 'Partini ', 'Tepat Waktu'),
('1414025', 'Ria Agustriani', 'Tepat Waktu'),
('1414026', 'Rian Anugrah', 'Tepat Waktu'),
('1414029', 'Siti Khaosaroh', 'Tepat Waktu'),
('1414031', 'Syifa Nurul Shofwaty', 'Tepat Waktu'),
('1414034', 'Wisnu Jaelani', 'Tidak Tepat Waktu'),
('1414038', 'Arif Febrianto', 'Tidak Tepat Waktu'),
('1414041', 'Aditya Rio Sagarasmoro', 'Tidak Tepat Waktu'),
('1414043', 'Risma Muliawati', 'Tidak Tepat Waktu'),
('1414045', 'Putri Noviana', 'Tidak Tepat Waktu'),
('1414046', 'Muhammad Suhendrik', 'Tidak Tepat Waktu'),
('1414047', 'Siti Nurmutia', 'Tepat Waktu'),
('1414048', 'Muhamad Dahlan', 'Tepat Waktu'),
('1414049', 'Achmad Fauzy', 'Tidak Tepat Waktu'),
('1414052', 'Imam Teguh', 'Tepat Waktu'),
('1414053', 'Arief Dhimas Suryanto', 'Tepat Waktu'),
('1414054', 'Ajat Sudrajat', 'Tidak Tepat Waktu'),
('1512001', 'Aang Raunil Anwar', 'Tidak Tepat Waktu'),
('1512002', 'Ali Gandi', 'Tidak Tepat Waktu'),
('1512003', 'Aditia Setiadi', 'Tidak Tepat Waktu'),
('1512005', 'Dana Ariefirmanda', 'Tidak Tepat Waktu'),
('1512008', 'Eko Aldiansyah', 'Tidak Tepat Waktu'),
('1512009', 'Fahmi Pujangga Atmaja', 'Lebih Cepat'),
('1512010', 'Farid Surya Handika', 'Tidak Tepat Waktu'),
('1512011', 'Irjan Syukur', 'Tidak Tepat Waktu'),
('1512012', 'Komarudin', 'Tidak Tepat Waktu'),
('1512014', 'Rudi Setiawan', 'Tepat Waktu'),
('1512015', 'Saeful Fitriyanto', 'Tidak Tepat Waktu'),
('1512018', 'Yanuar Nurcahyo', 'Tepat Waktu'),
('1512019', 'Yusup', 'Tidak Tepat Waktu'),
('1512020', 'Zaky Yudha Prihakasa', 'Lebih Cepat'),
('1512021', 'Asngat', 'Tepat Waktu'),
('1512022', 'Fauzi Maulana', 'Tepat Waktu'),
('1512023', 'Suwarno Wijaya', 'Tidak Tepat Waktu'),
('1512025', 'Sayyid Nurkilah', 'Tidak Tepat Waktu'),
('1512027', 'Ogiano Waskitajaya', 'Lebih Cepat'),
('1512028', 'Oky Octaviansyah', 'Tepat Waktu'),
('1513001', 'Abdul Ghoni', 'Tidak Tepat Waktu'),
('1513005', 'Dwi Hari Wibowo', 'Tepat Waktu'),
('1513006', 'Eriswan Tarigan', 'Tidak Tepat Waktu'),
('1513007', 'Fajar Bagus Nugraha', 'Tidak Tepat Waktu'),
('1513008', 'Fauzi', 'Tepat Waktu'),
('1513009', 'Fikri Islamoriza', 'Tepat Waktu'),
('1513010', 'Gugun Gunawan', 'Tepat Waktu'),
('1513012', 'Ian Ambari', 'Tidak Tepat Waktu'),
('1513013', 'Irwan Bastiar', 'Tepat Waktu'),
('1513015', 'Mochamad Yudi Cahyadi Syarif', 'Tidak Tepat Waktu'),
('1513018', 'Muhammad Abduh', 'Tepat Waktu'),
('1513019', 'Muhammad Anova Nurfaqih', 'Tepat Waktu'),
('1513020', 'Paristina', 'Tidak Tepat Waktu'),
('1513022', 'Raden Muhamad Indra Permana', 'Tidak Tepat Waktu'),
('1513026', 'Wahyudin', 'Tidak Tepat Waktu'),
('1513027', 'Yola Afiah Salami', 'Tepat Waktu'),
('1513029', 'Yulius Arieyanto', 'Tidak Tepat Waktu'),
('1513030', 'Zulkarnaen Jabidi', 'Tepat Waktu'),
('1513031', 'Raden Tuhibagus Khaidir Akbar', 'Tepat Waktu'),
('1513032', 'Mulyana', 'Tidak Tepat Waktu'),
('1513033', 'Febriana Tri Ramdhaniati', 'Tepat Waktu'),
('1513034', 'R. Fina Fitriana', 'Tepat Waktu'),
('1513035', 'Iman', 'Tepat Waktu'),
('1513036', 'Nana Ardiansyah', 'Tidak Tepat Waktu'),
('1513037', 'Raudhatul Irvan', 'Tidak Tepat Waktu'),
('1513038', 'Ari Setyanto', 'Tidak Tepat Waktu'),
('1514003', 'Ahmad Renalda', 'Tepat Waktu'),
('1514004', 'Andriyana', 'Tidak Tepat Waktu'),
('1514005', 'Angga Ardi Febianto', 'Tepat Waktu'),
('1514006', 'Anto Neo', 'Tepat Waktu'),
('1514007', 'Ari Fajrianto', 'Tepat Waktu'),
('1514008', 'Darsin Usman', 'Tidak Tepat Waktu'),
('1514009', 'Dimas Adi Nugroho', 'Tepat Waktu'),
('1514013', 'Haryani', 'Tepat Waktu'),
('1514014', 'Ilyas Fikriansyah', 'Tidak Tepat Waktu'),
('1514016', 'Imam Teguh Agustianto', 'Tepat Waktu'),
('1514018', 'Muhamad Andra Fahreza', 'Tepat Waktu'),
('1514019', 'Muhamad Firdaus', 'Tepat Waktu'),
('1514020', 'Muhamad Ruslan', 'Tepat Waktu'),
('1514021', 'Muhammad Al Faruq', 'Tepat Waktu'),
('1514023', 'Nurhasan Fadli', 'Tepat Waktu'),
('1514024', 'Pebri Eriyadi', 'Tepat Waktu'),
('1514029', 'Elly Kuswandy', 'Tidak Tepat Waktu'),
('1514030', 'Muhammad Adi Prasetiyo', 'Tepat Waktu'),
('1514033', 'Ismail Zein Nurfariyanto', 'Tidak Tepat Waktu'),
('1514035', 'Kepin Sihotang', 'Tepat Waktu'),
('1514036', 'Hongky Suteja', 'Tepat Waktu'),
('1514037', 'Ade Gunawan', 'Tidak Tepat Waktu'),
('1514038', 'Muhamad Syamsul Ulum', 'Tepat Waktu'),
('1514039', 'Yudhistira Aditya Pradana', 'Tidak Tepat Waktu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mhs_lama`
--

CREATE TABLE `tbl_mhs_lama` (
  `kd_mhs` varchar(11) NOT NULL,
  `nama_mhs` varchar(200) NOT NULL,
  `sks_2` int(11) NOT NULL,
  `sks_3` int(11) NOT NULL,
  `sks_4` int(11) NOT NULL,
  `ips_2` decimal(10,2) NOT NULL,
  `ips_3` decimal(10,2) NOT NULL,
  `ips_4` decimal(10,2) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mhs_lama`
--

INSERT INTO `tbl_mhs_lama` (`kd_mhs`, `nama_mhs`, `sks_2`, `sks_3`, `sks_4`, `ips_2`, `ips_3`, `ips_4`, `ket`) VALUES
('1408017', 'Gilang Koswara', 9, 5, 10, '2.33', '1.60', '3.30', 'Tidak Tepat Waktu'),
('1412001', 'Aden Jalaludin', 11, 14, 29, '2.81', '3.35', '3.20', 'Tidak Tepat Waktu'),
('1412004', 'Andi Wibowo', 19, 23, 22, '3.15', '3.00', '3.31', 'Tepat Waktu'),
('1412006', 'Aprilian Ridwan Hakim', 46, 36, 15, '1.93', '0.91', '1.80', 'Tidak Tepat Waktu'),
('1412008', 'Asti Nurwati', 22, 20, 22, '3.13', '3.55', '3.40', 'Tepat Waktu'),
('1412010', 'Dimas Aditya Anjaswara', 18, 0, 0, '0.16', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1412014', 'Ilham Riyadi', 27, 38, 31, '2.22', '1.36', '1.41', 'Tidak Tepat Waktu'),
('1412015', 'Laviva Maash Sholihati Fil Jannah', 22, 20, 22, '3.50', '3.60', '4.00', 'Lebih Cepat'),
('1412016', 'Maulana Yusuf', 22, 14, 0, '2.40', '2.78', '0.00', 'Tidak Tepat Waktu'),
('1412018', 'Rahmat Hidayat', 19, 0, 0, '1.00', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1412019', 'Recky Julian', 22, 0, 0, '0.77', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1412020', 'Rina Apriani', 22, 0, 0, '0.63', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1412023', 'Romdhoni Ahmad', 24, 31, 15, '2.70', '1.83', '2.60', 'Tidak Tepat Waktu'),
('1412024', 'Taufik Hidayat', 22, 20, 22, '3.36', '3.40', '3.27', 'Tepat Waktu'),
('1412025', 'Nova Nur Budiman', 19, 0, 0, '0.10', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1412026', 'Hery Insan Maulana', 14, 0, 0, '1.42', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1412027', 'Dede Abdul Aziz', 24, 17, 26, '2.62', '3.00', '2.84', 'Tidak Tepat Waktu'),
('1412028', 'Rizka Nurmala', 22, 20, 22, '3.13', '3.45', '3.86', 'Lebih Cepat'),
('1412031', 'Indiary Almira', 22, 20, 22, '3.27', '3.30', '3.86', 'Lebih Cepat'),
('1412032', 'Ahmad Fauzi', 27, 23, 31, '2.44', '2.47', '1.70', 'Tidak Tepat Waktu'),
('1412033', 'Restu Gumilang', 22, 0, 0, '0.50', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1412037', 'Jamaludin', 22, 20, 22, '2.59', '2.85', '1.90', 'Tidak Tepat Waktu'),
('1412038', 'Nicko Arrahim', 22, 0, 0, '1.22', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1412040', 'Asep Ahmad Yani', 19, 17, 25, '3.15', '3.17', '2.76', 'Tidak Tepat Waktu'),
('1412047', 'Puri Prasastiwi', 22, 20, 22, '3.40', '3.55', '3.54', 'Tepat Waktu'),
('1413001', 'Achmad Ismail Nachrawi', 22, 20, 22, '2.77', '2.10', '0.81', 'Tidak Tepat Waktu'),
('1413002', 'Achmad Sahlan', 31, 23, 25, '1.93', '2.39', '2.24', 'Tidak Tepat Waktu'),
('1413004', 'Ali Mustofa', 24, 20, 22, '3.16', '3.40', '2.86', 'Tidak Tepat Waktu'),
('1413006', 'Anwar Nasrudin', 22, 20, 19, '3.59', '3.45', '3.15', 'Tepat Waktu'),
('1413009', 'Ashar', 20, 15, 20, '2.40', '2.40', '2.80', 'Tidak Tepat Waktu'),
('1413013', 'Cipta Pratama', 25, 17, 16, '2.04', '1.94', '0.18', 'Tidak Tepat Waktu'),
('1413015', 'Dewi Fatmawati', 22, 0, 0, '2.22', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1413016', 'Dwa Maksum Putra Bumi', 22, 20, 19, '2.77', '2.45', '1.63', 'Tidak Tepat Waktu'),
('1413017', 'Eneng Yulianti', 22, 20, 19, '3.22', '3.15', '3.15', 'Tepat Waktu'),
('1413018', 'Errik Sunendar', 22, 0, 0, '0.00', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1413021', 'Fauzan Yusak Ibrahim', 22, 20, 19, '3.00', '2.70', '3.00', 'Tidak Tepat Waktu'),
('1413023', 'Febrian', 13, 0, 0, '0.69', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1413025', 'Girie Hernasa', 22, 23, 22, '3.13', '2.73', '3.27', 'Tidak Tepat Waktu'),
('1413027', 'Hening Irizia Paradenti', 22, 20, 19, '3.13', '3.00', '3.15', 'Tepat Waktu'),
('1413029', 'Imam Agus Shubekhan', 22, 20, 16, '2.90', '2.15', '2.62', 'Tidak Tepat Waktu'),
('1413030', 'Indra Octaviana', 22, 20, 19, '3.27', '3.15', '3.15', 'Tepat Waktu'),
('1413032', 'Lisna Anggraeni', 22, 20, 19, '3.36', '3.30', '3.15', 'Tepat Waktu'),
('1413033', 'Lupi Ardiansyah', 22, 20, 19, '3.00', '2.85', '3.15', 'Tidak Tepat Waktu'),
('1413035', 'M. Aulia Arief Firdaus', 22, 20, 22, '3.00', '3.25', '3.27', 'Tepat Waktu'),
('1413038', 'Muhammad Ariansyah Pratama', 25, 23, 22, '1.96', '2.34', '2.40', 'Tidak Tepat Waktu'),
('1413039', 'Muhammad Fajrul Iman', 22, 20, 22, '3.13', '3.30', '3.40', 'Tepat Waktu'),
('1413041', 'Muhammad Yuke Subagja', 22, 23, 22, '2.09', '2.52', '2.54', 'Tidak Tepat Waktu'),
('1413042', 'Muqorrobin Mutawaqil', 28, 29, 25, '1.67', '1.37', '1.52', 'Tidak Tepat Waktu'),
('1413043', 'Novi Triyanto', 22, 20, 22, '3.13', '3.60', '3.27', 'Tepat Waktu'),
('1413045', 'Resti Fitriani', 22, 0, 0, '1.81', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1413046', 'Reza Syuhada Sofyan', 22, 23, 19, '3.00', '2.47', '3.31', 'Tidak Tepat Waktu'),
('1413054', 'Yudi Setiadi', 22, 20, 22, '3.00', '2.85', '2.72', 'Tidak Tepat Waktu'),
('1413056', 'Rizki Darmawan', 22, 20, 19, '3.59', '4.00', '3.47', 'Lebih Cepat'),
('1413058', 'Muhamad Ridwan', 22, 20, 19, '3.22', '3.10', '3.15', 'Tepat Waktu'),
('1413060', 'Rahmat Hidayat', 22, 20, 37, '2.63', '2.75', '1.72', 'Tidak Tepat Waktu'),
('1413061', 'Adam Aji Pratama', 22, 0, 0, '0.00', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1413062', 'Ardi Setiawan', 22, 0, 0, '1.36', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1413063', 'Bagoes Prasetyo', 22, 20, 0, '3.00', '2.40', '0.00', 'Tidak Tepat Waktu'),
('1414001', 'Albar Prayoga', 22, 20, 28, '2.86', '2.75', '2.32', 'Tidak Tepat Waktu'),
('1414004', 'Arif Wahyudi', 22, 20, 22, '3.13', '3.00', '3.00', 'Tepat Waktu'),
('1414005', 'Asep Gunawan', 22, 20, 19, '2.45', '2.55', '1.73', 'Tidak Tepat Waktu'),
('1414006', 'Asih Lestari', 22, 20, 22, '3.36', '3.25', '3.00', 'Tepat Waktu'),
('1414007', 'Dean Aldy', 25, 20, 16, '2.28', '2.10', '1.50', 'Tidak Tepat Waktu'),
('1414008', 'Asep Nurhidayat', 22, 20, 22, '3.14', '3.30', '3.27', 'Tepat Waktu'),
('1414011', 'Eva Yuliana Rahma', 22, 17, 0, '2.68', '1.76', '0.00', 'Tidak Tepat Waktu'),
('1414012', 'Fallahudin Sihaq', 22, 20, 22, '3.00', '3.30', '3.27', 'Tepat Waktu'),
('1414013', 'Felix Agustinus Gandi', 22, 20, 22, '3.72', '3.15', '2.86', 'Tepat Waktu'),
('1414014', 'Firman Maulana', 22, 20, 22, '3.00', '3.00', '2.73', 'Tepat Waktu'),
('1414016', 'Lingga Wenny', 22, 20, 22, '3.13', '2.85', '3.00', 'Tepat Waktu'),
('1414021', 'Muhamad Heri Nurohman', 22, 20, 22, '3.09', '2.85', '3.00', 'Tepat Waktu'),
('1414022', 'Muhammad Rizal Fahminuddin', 22, 20, 25, '3.13', '2.75', '2.76', 'Tidak Tepat Waktu'),
('1414023', 'Partini', 22, 20, 22, '3.36', '3.30', '3.72', 'Lebih Cepat'),
('1414025', 'Ria Agustriani', 22, 20, 22, '3.27', '3.30', '3.27', 'Tepat Waktu'),
('1414026', 'Rian Anugrah', 22, 20, 22, '3.13', '3.15', '3.13', 'Tepat Waktu'),
('1414029', 'Siti Khaosaroh', 22, 20, 22, '3.36', '3.30', '3.54', 'Lebih Cepat'),
('1414031', 'Syifa Nurul Shofwaty', 22, 20, 22, '3.27', '3.45', '3.41', 'Tepat Waktu'),
('1414034', 'Wisnu Jaelani', 22, 20, 0, '2.09', '0.15', '0.00', 'Tidak Tepat Waktu'),
('1414038', 'Arif Febrianto', 22, 20, 22, '2.72', '2.85', '1.22', 'Tidak Tepat Waktu'),
('1414041', 'Aditya Rio Sagarasmoro', 22, 17, 0, '2.22', '0.70', '0.00', 'Tidak Tepat Waktu'),
('1414043', 'Risma Muliawati', 22, 0, 0, '3.40', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1414045', 'Putri Noviana', 17, 3, 0, '0.88', '3.00', '0.00', 'Tidak Tepat Waktu'),
('1414046', 'Muhammad Suhendrik', 22, 20, 0, '2.36', '2.55', '0.00', 'Tidak Tepat Waktu'),
('1414047', 'Siti Nurmutia', 22, 20, 22, '3.27', '3.30', '3.40', 'Tepat Waktu'),
('1414048', 'Muhamad Dahlan', 22, 20, 19, '3.00', '2.85', '3.00', 'Tidak Tepat Waktu'),
('1414049', 'Achmad Fauzy', 22, 20, 22, '2.86', '3.15', '2.86', 'Tidak Tepat Waktu'),
('1414052', 'Imam Teguh', 22, 20, 22, '3.45', '3.40', '2.86', 'Tepat Waktu'),
('1414053', 'Arief Dhiemas Suryanto', 22, 20, 22, '3.22', '3.00', '3.40', 'Tepat Waktu'),
('1414054', 'Ajat Sudrajat', 22, 17, 19, '2.09', '2.64', '1.26', 'Tidak Tepat Waktu'),
('1512001', 'Aang Raunil Anwar', 23, 21, 22, '3.26', '3.14', '3.31', 'Tepat Waktu'),
('1512002', 'Ali Gandi', 23, 21, 22, '3.13', '3.00', '3.00', 'Tepat Waktu'),
('1512003', 'Aditia Setiadi', 23, 23, 19, '2.65', '1.82', '1.73', 'Tidak Tepat Waktu'),
('1512005', 'Dana Ariefirmanda', 23, 21, 0, '2.78', '0.09', '0.00', 'Tidak Tepat Waktu'),
('1512008', 'Eko Aldiansyah', 23, 21, 22, '3.00', '3.14', '1.36', 'Tidak Tepat Waktu'),
('1512009', 'Fahmi Pujangga Atmaja', 26, 24, 22, '3.11', '3.29', '3.31', 'Tepat Waktu'),
('1512010', 'Farid Surya Handika', 22, 27, 74, '2.59', '1.66', '0.64', 'Tidak Tepat Waktu'),
('1512011', 'Irjan Syukur', 20, 18, 19, '2.75', '2.66', '2.63', 'Tidak Tepat Waktu'),
('1512012', 'Komarudin', 23, 37, 28, '3.39', '1.64', '2.32', 'Tidak Tepat Waktu'),
('1512014', 'Rudi Setiawan', 23, 21, 22, '3.26', '3.00', '3.13', 'Tepat Waktu'),
('1512015', 'Saeful Fitriyanto', 20, 0, 0, '0.45', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1512018', 'Yanuar Nurcahyo', 25, 24, 22, '3.16', '3.00', '3.31', 'Tepat Waktu'),
('1512019', 'Yusup', 23, 21, 22, '3.39', '3.52', '1.36', 'Tidak Tepat Waktu'),
('1512020', 'Zaky Yudha Prihakasa', 23, 21, 22, '3.39', '3.71', '3.59', 'Lebih Cepat'),
('1512021', 'Asngat', 23, 21, 22, '2.91', '2.71', '3.00', 'Tidak Tepat Waktu'),
('1512022', 'Fauzi Maulana', 23, 21, 22, '3.65', '3.42', '3.59', 'Lebih Cepat'),
('1512023', 'Suwarno Wijaya', 23, 21, 22, '3.30', '3.14', '1.22', 'Tidak Tepat Waktu'),
('1512025', 'Sayyid Nurkilah', 23, 27, 19, '2.78', '1.88', '1.57', 'Tidak Tepat Waktu'),
('1512027', 'Ogiano Waskitajaya', 23, 21, 22, '3.26', '3.42', '3.31', 'Tepat Waktu'),
('1512028', 'Oky Octaviansyah', 23, 21, 22, '3.26', '3.47', '3.59', 'Tepat Waktu'),
('1513001', 'Abdul Ghoni', 26, 26, 19, '2.65', '2.11', '2.68', 'Tidak Tepat Waktu'),
('1513005', 'Dwi Hari Wibowo', 26, 20, 19, '2.65', '3.00', '2.84', 'Tidak Tepat Waktu'),
('1513006', 'Eriswan Tarigan', 23, 20, 22, '2.86', '3.00', '2.54', 'Tidak Tepat Waktu'),
('1513007', 'Fajar Bagus Nugraha', 23, 20, 0, '1.91', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1513008', 'Fauzi', 23, 17, 22, '3.13', '3.00', '2.86', 'Tidak Tepat Waktu'),
('1513009', 'Fikri Islamoriza', 23, 20, 22, '2.73', '2.30', '2.45', 'Tidak Tepat Waktu'),
('1513010', 'Gugun Gunawan', 23, 20, 22, '2.86', '3.00', '3.45', 'Tidak Tepat Waktu'),
('1513012', 'Ian Ambari', 23, 20, 22, '2.73', '2.40', '1.90', 'Tidak Tepat Waktu'),
('1513013', 'Irwan Bastiar', 26, 20, 22, '2.65', '2.85', '2.86', 'Tidak Tepat Waktu'),
('1513015', 'Mochamad Yudi Cahyadi Syarif', 40, 0, 0, '0.82', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1513018', 'Muhammad Abduh', 23, 20, 22, '3.26', '3.45', '3.59', 'Tepat Waktu'),
('1513019', 'Muhammad Anova Nurfaqih', 23, 20, 22, '3.65', '3.60', '3.45', 'Lebih Cepat'),
('1513020', 'Paristina', 23, 0, 0, '1.39', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1513022', 'Raden Muhamad Indra Permana', 23, 20, 22, '3.08', '3.00', '2.54', 'Tidak Tepat Waktu'),
('1513026', 'Wahyudin', 23, 20, 0, '2.47', '0.45', '0.00', 'Tidak Tepat Waktu'),
('1513027', 'Yola Afiah Salami', 23, 20, 22, '3.13', '3.15', '3.13', 'Tepat Waktu'),
('1513029', 'Yulius Arieyanto', 20, 0, 0, '0.15', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1513030', 'Zulkarnaen Jabidi', 23, 26, 25, '3.00', '2.11', '2.64', 'Tidak Tepat Waktu'),
('1513031', 'Raden Tuhibagus Khaidir Akbar', 23, 20, 22, '3.08', '3.00', '3.13', 'Tepat Waktu'),
('1513032', 'Mulyana', 23, 20, 0, '2.60', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1513033', 'Febriana Tri Ramdhaniati', 23, 23, 22, '3.26', '3.13', '3.27', 'Tepat Waktu'),
('1513034', 'R. Fina Fitriana', 23, 20, 22, '3.26', '3.05', '3.40', 'Tepat Waktu'),
('1513035', 'Iman', 23, 20, 22, '3.73', '3.30', '3.45', 'Tepat Waktu'),
('1513036', 'Nana Ardiansyah', 29, 0, 0, '0.31', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1513037', 'Raudhatul Irvan', 33, 29, 31, '2.24', '1.75', '1.80', 'Tidak Tepat Waktu'),
('1513038', 'Ari Setyanto', 23, 0, 0, '0.13', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1514003', 'Ahmad Renalda', 23, 21, 22, '3.52', '3.04', '3.31', 'Tepat Waktu'),
('1514004', 'Andriyana', 23, 0, 0, '0.26', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1514005', 'Angga Ardi Febianto', 23, 21, 22, '3.26', '3.23', '2.72', 'Tidak Tepat Waktu'),
('1514006', 'Anto Neo', 23, 17, 22, '3.47', '3.35', '3.45', 'Tepat Waktu'),
('1514007', 'Ari Fajrianto', 23, 21, 22, '3.47', '3.19', '2.86', 'Tidak Tepat Waktu'),
('1514008', 'Darsin Usman', 23, 27, 25, '3.00', '2.03', '2.88', 'Tidak Tepat Waktu'),
('1514009', 'Dimas Adi Nugroho', 23, 21, 22, '3.34', '3.33', '3.27', 'Tepat Waktu'),
('1514013', 'Haryani', 23, 21, 22, '3.60', '3.85', '3.54', 'Lebih Cepat'),
('1514014', 'Ilyas Fikriansyah', 23, 0, 0, '2.34', '0.00', '0.00', 'Tidak Tepat Waktu'),
('1514016', 'Imam Teguh Agustianto', 23, 21, 22, '3.60', '3.85', '3.59', 'Lebih Cepat'),
('1514018', 'Muhamad Andra Fahreza', 23, 21, 22, '3.52', '3.33', '3.27', 'Tepat Waktu'),
('1514019', 'Muhamad Firdaus', 23, 21, 22, '3.21', '3.04', '3.13', 'Tepat Waktu'),
('1514020', 'Muhamad Ruslan', 23, 21, 22, '3.73', '3.57', '3.59', 'Lebih Cepat'),
('1514021', 'Muhammad Al Faruq', 23, 21, 22, '3.26', '3.57', '3.40', 'Tepat Waktu'),
('1514023', 'Nurhasan Fadli', 23, 21, 22, '3.39', '3.47', '3.13', 'Tepat Waktu'),
('1514024', 'Pebri Eriyadi', 23, 21, 22, '3.34', '3.19', '2.86', 'Tidak Tepat Waktu'),
('1514029', 'Elly Kuswandy', 23, 21, 9, '3.00', '2.61', '1.66', 'Tidak Tepat Waktu'),
('1514030', 'Muhammad Adi Prasetiyo', 26, 21, 22, '2.76', '3.04', '3.13', 'Tidak Tepat Waktu'),
('1514033', 'Ismail Zein Nurfariyanto', 23, 21, 0, '2.60', '0.71', '0.00', 'Tidak Tepat Waktu'),
('1514035', 'Kepin Sihotang', 23, 21, 22, '3.26', '3.04', '3.27', 'Tepat Waktu'),
('1514036', 'Hongky Suteja', 20, 18, 22, '3.15', '3.66', '2.59', 'Tidak Tepat Waktu'),
('1514037', 'Ade Gunawan', 20, 21, 0, '1.80', '1.00', '0.00', 'Tidak Tepat Waktu'),
('1514038', 'Muhamad Syamsul Ulum', 23, 21, 22, '3.26', '3.47', '3.13', 'Tepat Waktu'),
('1514039', 'Yudhistira Aditya Pradana', 11, 12, 0, '0.81', '0.00', '0.00', 'Tidak Tepat Waktu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prediksi`
--

CREATE TABLE `tbl_prediksi` (
  `kd_prediksi` int(11) NOT NULL,
  `nama_mhs` varchar(200) NOT NULL,
  `sks_2` int(11) DEFAULT NULL,
  `sks_3` int(11) DEFAULT NULL,
  `sks_4` int(11) DEFAULT NULL,
  `ips_2` double DEFAULT NULL,
  `ips_3` double DEFAULT NULL,
  `ips_4` double DEFAULT NULL,
  `ket` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prediksi`
--

INSERT INTO `tbl_prediksi` (`kd_prediksi`, `nama_mhs`, `sks_2`, `sks_3`, `sks_4`, `ips_2`, `ips_3`, `ips_4`, `ket`) VALUES
(1, 'Bayu Angkoso', 25, 29, 22, 2.88, 2.9, 3.59, 'Lebih Cepat'),
(2, 'Bian Oryza', 22, 20, 22, 3.09, 2.7, 2.95, 'Tidak Tepat Waktu'),
(3, 'Daniel Stevanus', 31, 20, 22, 2.71, 3, 3.27, 'Tidak Tepat Waktu'),
(4, 'Khodijah', 31, 20, 22, 2.77, 3, 3.41, 'Tidak Tepat Waktu'),
(5, 'Ryan Akbar Perdana', 22, 20, 34, 3.09, 2.85, 1.82, 'Tidak Tepat Waktu'),
(6, 'Erisya Lastrini', 31, 20, 22, 3.03, 3.7, 3.86, 'Lebih Cepat'),
(7, 'Fikri Abdurrahman', 22, 17, 22, 3.18, 3.29, 3.14, 'Tepat Waktu'),
(8, 'Fauzi Fadillah Pranoto', 22, 29, 22, 2.95, 2.38, 2.45, 'Tidak Tepat Waktu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `kd_user` int(11) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `st_user` int(1) NOT NULL,
  `lvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`kd_user`, `nama_lengkap`, `username`, `password`, `email`, `st_user`, `lvl`) VALUES
(1, 'Muqiit T. Kastrilia', 'admin', '1234', 'mtk273@gmail.com', 1, 0),
(2, 'Dosen Wali 1', 'dw1', '1234', 'dosenwali@stikombinaniaga.ac.id', 1, 3),
(3, 'Program Studi 1', 'prodi1', '1234', 'prodi@stikombinaniaga.ac.id', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_keputusan`
--
ALTER TABLE `tbl_keputusan`
  ADD PRIMARY KEY (`kd_keputusan`);

--
-- Indexes for table `tbl_kls_asli`
--
ALTER TABLE `tbl_kls_asli`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `tbl_mhs_lama`
--
ALTER TABLE `tbl_mhs_lama`
  ADD PRIMARY KEY (`kd_mhs`);

--
-- Indexes for table `tbl_prediksi`
--
ALTER TABLE `tbl_prediksi`
  ADD PRIMARY KEY (`kd_prediksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_keputusan`
--
ALTER TABLE `tbl_keputusan`
  MODIFY `kd_keputusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbl_prediksi`
--
ALTER TABLE `tbl_prediksi`
  MODIFY `kd_prediksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `kd_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
