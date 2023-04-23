-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 03:33 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hcp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Emploi'),
(2, 'Santé'),
(8, 'Sport'),
(9, 'Education'),
(10, 'Agriculture');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id_data` int(11) NOT NULL,
  `id_annee` int(11) NOT NULL,
  `id_indicateur` int(11) NOT NULL,
  `valeur` decimal(11,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id_data`, `id_annee`, `id_indicateur`, `valeur`) VALUES
(1, 1, 1, '13.400'),
(2, 2, 1, '12.300'),
(3, 3, 1, '11.300'),
(4, 4, 1, '11.500'),
(5, 5, 1, '10.800'),
(6, 6, 1, '11.100'),
(7, 7, 1, '9.700'),
(8, 8, 1, '9.800'),
(9, 9, 1, '9.600'),
(10, 10, 1, '9.100'),
(11, 11, 1, '9.100'),
(12, 12, 1, '8.900'),
(14, 14, 1, '9.200'),
(15, 15, 1, '9.900'),
(16, 1, 2, '12.200'),
(17, 7, 2, '13.500'),
(18, 14, 2, '18.300'),
(76, 1, 11, '10.900'),
(77, 2, 11, '12.500'),
(78, 3, 11, '13.400'),
(79, 4, 11, '15.800'),
(80, 17, 11, '18.000'),
(81, 20, 11, '24.000'),
(82, 22, 11, '30.000');

-- --------------------------------------------------------

--
-- Table structure for table `indicateurs`
--

CREATE TABLE `indicateurs` (
  `id_indicateur` int(11) NOT NULL,
  `id_categories` int(11) NOT NULL,
  `id_thematique` int(11) NOT NULL,
  `definition` text NOT NULL,
  `unite` text NOT NULL,
  `indication` text NOT NULL,
  `source` text NOT NULL,
  `periodicite` text NOT NULL,
  `couverture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indicateurs`
--

INSERT INTO `indicateurs` (`id_indicateur`, `id_categories`, `id_thematique`, `definition`, `unite`, `indication`, `source`, `periodicite`, `couverture`) VALUES
(1, 1, 1, 'Taux de chômage selon le Milieu, les diplômes', 'POURCENTAGE', '', 'MAR_HCP ENQUETE NATIONALE SUR L\'EMPLOI', 'Annuelle', ''),
(2, 1, 1, 'Taux de chômage selon le Milieu, le sexe et le groupe d\'âges', 'POURCENTAGE', '', 'MAR_HCP ENQUETE NATIONALE SUR L\'EMPLOI', 'Annuelle', ''),
(15, 2, 0, 'Indicateur', 'Unite ', 'Indication', 'Source ', 'Periodicite', 'Couverture');

-- --------------------------------------------------------

--
-- Table structure for table `periodes`
--

CREATE TABLE `periodes` (
  `id_annee` int(11) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periodes`
--

INSERT INTO `periodes` (`id_annee`, `annee`) VALUES
(1, 2000),
(2, 2001),
(3, 2002),
(4, 2003),
(5, 2004),
(6, 2005),
(7, 2006),
(8, 2007),
(9, 2008),
(10, 2009),
(11, 2010),
(12, 2011),
(13, 2012),
(14, 2013),
(15, 2014),
(16, 2015),
(17, 2016),
(18, 2017),
(19, 2018),
(20, 2019),
(21, 2020),
(22, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `substatistiques`
--

CREATE TABLE `substatistiques` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `info` text NOT NULL,
  `categorie` text NOT NULL,
  `thematique` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `substatistiques`
--

INSERT INTO `substatistiques` (`id`, `titre`, `info`, `categorie`, `thematique`) VALUES
(53, 'Taux net d activite', 'data (25).csv', 'Emploi', 'Activite');

-- --------------------------------------------------------

--
-- Table structure for table `thematiques`
--

CREATE TABLE `thematiques` (
  `id_thematique` int(11) NOT NULL,
  `id_categories` int(11) NOT NULL,
  `titre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thematiques`
--

INSERT INTO `thematiques` (`id_thematique`, `id_categories`, `titre`) VALUES
(1, 1, 'Chomage'),
(2, 1, 'Activité'),
(10, 8, 'Musculation');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`),
  ADD KEY `id_annee` (`id_annee`);

--
-- Indexes for table `indicateurs`
--
ALTER TABLE `indicateurs`
  ADD PRIMARY KEY (`id_indicateur`);

--
-- Indexes for table `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id_annee`);

--
-- Indexes for table `substatistiques`
--
ALTER TABLE `substatistiques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thematiques`
--
ALTER TABLE `thematiques`
  ADD PRIMARY KEY (`id_thematique`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `indicateurs`
--
ALTER TABLE `indicateurs`
  MODIFY `id_indicateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `substatistiques`
--
ALTER TABLE `substatistiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `thematiques`
--
ALTER TABLE `thematiques`
  MODIFY `id_thematique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`id_annee`) REFERENCES `periodes` (`id_annee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
