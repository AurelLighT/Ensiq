-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 02:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ensiqtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `user_id`, `time`) VALUES
(1, 1, 'Sunday, 18th of December 2022 03:30:30 PM'),
(2, 1, 'Sunday, 18th of December 2022 03:36:25 PM'),
(3, 1, 'Sunday, 18th of December 2022 07:00:11 PM'),
(4, 1, 'Sunday, 18th of December 2022 07:02:00 PM'),
(5, 2, 'Sunday, 18th of December 2022 07:07:50 PM');

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE `entry` (
  `entry_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `nama_latin` varchar(200) NOT NULL,
  `daerah_asal` varchar(200) NOT NULL,
  `ciri_ciri` varchar(1000) NOT NULL,
  `deskipsi_singkat` varchar(1000) NOT NULL,
  `link_gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`entry_id`, `jenis_id`, `judul`, `nama_latin`, `daerah_asal`, `ciri_ciri`, `deskipsi_singkat`, `link_gambar`) VALUES
(4, 2, 'Rafflesia Arnoldii', 'Rafflesia arnoldii', 'Sumatra', 'Memiliki bau yang tidak sedap', 'Rafflesia arnoldii merupakan bungan yang ukurannya sangat besar ketika mekar. Diameter mencpaai 70 cm dan tingginya 50 cm.', 'rafflesia.jpg'),
(6, 2, 'Padi', 'Oryza sativa', 'India', 'Berakar serabut dan bentuk batangnya seperti pelepah daun.', 'Padi merupakan tanaman yang dibudidaya. Padi marupakan sumber karbohidrat utama untuk Indonesia.', 'padi.jpg'),
(8, 1, 'Cheetah', 'Acinonyx jubatus', 'Afrika', 'Pola tutul hitam, kaki panjang untuk aerodinamis', 'Cheetah disebut-sebut sebagai hewan tercepat di dunia dengan kecepatan lari hingga 130 km/jam. Habitat Cheetah adalah savana.', 'cheetah.png'),
(12, 1, 'Kanguru', 'Macropodidae', 'Australia', 'ukuran kaki belakang dan depan berbeda. Kaki belakang lebih besar dan kuat.', 'Kanguru merupakan marsupial terbesar di dunia yang berasal dari Australia.', 'kanguru.jpg'),
(13, 1, 'Jerapah', 'Giraffa camelopardalis', 'Afrika', 'Lehernya panjang dan menjulang', 'Jerapah merupakan hewan darat tertinggi di dunia.', '639f06d5b2ac1.jpg'),
(14, 1, 'komodo', 'Varanus komodoensis', 'Nusa Tenggara Timur', 'Mirip biawak, kulitnya coklat kehitaman dan sisiknya kasar', 'Komodo adalah kadal terbesar dan tertinggi di dunia. ', '639f0781aaa0a.jpg'),
(15, 1, 'Lumba-lumba', 'Stenella longirostris', 'Amerika Selatan, Asia', 'Ukuran tubuh panjang, berkembang biak dengan melahirkan', 'Lumba-lumba memiliki sifat sosial dan pintar.', '639f090bbd242.jpg'),
(16, 1, 'Merak', 'Pavo cristatus', 'Sri Lanka', 'bulunya berwarna biru atau hijau, di ujung bulunya tedapat pola seperti mata.', 'Merak adalah burung yang sangat indah. Ekornya akan menghasilkan suara ketika di buka.', '639f09d6a3708.jpg'),
(17, 2, 'Kelapa', 'Cocos nucifera', 'Amerika Selatan', 'Tulang daunnya menyirip dan akarnya serabut', 'Kelapa termasuk ke dalam keluarga Palmae. Tanaman kelapa merupakan tanaman yang batangnya tidak bercabang.', '639f0c266fd17.jpg'),
(18, 2, 'Lavender', 'Lavandula', 'Mediterania', 'Daunnya kecil dan bunganya berada di pucuk.', 'Lavender merupakan bunga yang harum dan memiliki umur yang panjang hingga 30 tahun.', '639f0db0e5dd0.jpg'),
(19, 2, 'Kenanga', 'Cananga odorata', 'Indonesia', 'Tangkainya pendek dan aromanya khas.', 'Kenanga adalah pohon yang putiknya berlendir dan pohonnya memiliki tinggi 5-20 meter.', '639f0ea9b7323.jpg'),
(20, 2, 'Anggrek Bulan', 'Phalaenopsis amabilis', 'Indonesia', 'Anggrek Bulan berwana putih dengan corak kuning', 'Anggrek Bulan adalah bunga yang menuykai sedikit matahari', '639f0f42c14a2.jpg'),
(21, 3, 'Kancing', 'Agaricus bisporus', 'Prancis', 'Tudungnya menyerupai kancing dan berwarna putih.', 'Jmaur kancing merupakan jamur yang paling banyak dibudidayakan. Jamur kancing memiliki manfaat untuk meningkatkan sistem imun tubuh.', '639f1151b36a8.jpg'),
(22, 3, 'Kuping', 'Auricularia auricula-judae', 'Kayu yang lapuk', 'Bentuknya menyerupai kuping manusia dan memiliki diameter 2-15 cm.', 'Jamur kuping merupakan jamur yang kenyal dalam keadaan segar dan keras ketika kering.', '639f122270078.jpg'),
(23, 3, 'Matsutake', 'Tricholoma matsutake', 'Jepang', 'Permukaannya bersisik dan warnanya kecoklatan.', 'Jamur Matsutake pertumbuhannya lamban. Matsutake teksturnya seperti daging. ', '639f13191e089.jpg'),
(24, 3, 'Enoki', 'Flammulina velutipes', 'Jepang', 'Tangkainya panjang dan tudungny sangat kecil.', 'Jamur enoki ini banyak dibudidayakan di Asia. Jamur enoki teksturnya halus dan bentuknya mirip lidi.', '639f13f124aef.jpg'),
(25, 3, 'Tiram', 'Pleurotus ostreatus', 'Cina', 'Tudungnya berbentuk setengah lingkaran menyerupai cangk tiram', 'Jamur tiram tumbuh berderet di batang kayu yang sudah lapuk. ', '639f14bae1344.jpg'),
(26, 3, 'Shimeji', 'Hypsizygus marmoreus', 'Asia Timur', 'Batangnya ramping dengan tudung berwarna putih dan coklat.', 'Jamur Shimeji umumnya diolah menjadi campuran sup. Jamur shimeji memiliki panjang batang sekitar 10 cm.  ', '639f15c437357.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `jenis_id` int(11) NOT NULL,
  `nama_jenis` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`jenis_id`, `nama_jenis`) VALUES
(1, 'Hewan'),
(2, 'Tumbuhan'),
(3, 'Jamur');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roles` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `email`, `password`, `roles`) VALUES
(1, 'Hesang', 'hesang@gmail.com', '$2y$10$nqjV0/R1nGxBeQW90fXhIOTFkkVLRss8KtoIH4HaYpvoIkPz/of22', 'admin'),
(2, 'admin', 'admin@gmail.com', '$2y$10$5XxpJjV2SjI.QhIhBQqEMuKIFE.rnpIVLD/wCEivhAhkpFT/g..0q', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `entry`
--
ALTER TABLE `entry`
  ADD PRIMARY KEY (`entry_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `entry`
--
ALTER TABLE `entry`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
