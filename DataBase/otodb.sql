-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 11 Mai 2020 la 22:01
-- Versiune server: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otodb`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `comenzi`
--

CREATE TABLE IF NOT EXISTS `comenzi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data` date NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `status` varchar(15) NOT NULL,
  `plata` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `imagini_produs`
--

CREATE TABLE IF NOT EXISTS `imagini_produs` (
  `id` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `img1` varchar(15) NOT NULL,
  `img2` varchar(15) DEFAULT NULL,
  `img3` varchar(15) DEFAULT NULL,
  `img4` varchar(15) DEFAULT NULL,
  `img5` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `produse`
--

CREATE TABLE IF NOT EXISTS `produse` (
  `id` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `pret` decimal(10,0) NOT NULL,
  `stoc` int(11) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `destinatar` varchar(15) NOT NULL,
  `varsta` varchar(15) NOT NULL,
  `descriere` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `produse_comanda`
--

CREATE TABLE IF NOT EXISTS `produse_comanda` (
  `id` int(11) NOT NULL,
  `id_comanda` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `pret` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `recenzii_produs`
--

CREATE TABLE IF NOT EXISTS `recenzii_produs` (
  `id` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `autor` varchar(20) NOT NULL,
  `text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `parola` varchar(20) NOT NULL,
  `nume` varchar(30) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `adresa` varchar(150) DEFAULT NULL,
  `poza` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comenzi`
--
ALTER TABLE `comenzi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`) USING BTREE;

--
-- Indexes for table `imagini_produs`
--
ALTER TABLE `imagini_produs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produs` (`id_produs`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produse_comanda`
--
ALTER TABLE `produse_comanda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comanda` (`id_comanda`),
  ADD KEY `id_produs` (`id_produs`);

--
-- Indexes for table `recenzii_produs`
--
ALTER TABLE `recenzii_produs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produs` (`id_produs`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comenzi`
--
ALTER TABLE `comenzi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `imagini_produs`
--
ALTER TABLE `imagini_produs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produse_comanda`
--
ALTER TABLE `produse_comanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `recenzii_produs`
--
ALTER TABLE `recenzii_produs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `comenzi`
--
ALTER TABLE `comenzi`
  ADD CONSTRAINT `fk_comenzi` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Restrictii pentru tabele `imagini_produs`
--
ALTER TABLE `imagini_produs`
  ADD CONSTRAINT `fk_imagini` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`);

--
-- Restrictii pentru tabele `produse_comanda`
--
ALTER TABLE `produse_comanda`
  ADD CONSTRAINT `fk_comanda` FOREIGN KEY (`id_comanda`) REFERENCES `comenzi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produs` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrictii pentru tabele `recenzii_produs`
--
ALTER TABLE `recenzii_produs`
  ADD CONSTRAINT `fk_recenzii` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
