-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 04:07 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `comenzi`
--

CREATE TABLE `comenzi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data` date NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `status` varchar(15) NOT NULL,
  `plata` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imagini_produs`
--

CREATE TABLE `imagini_produs` (
  `id` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `img1` varchar(15) NOT NULL,
  `img2` varchar(15) DEFAULT NULL,
  `img3` varchar(15) DEFAULT NULL,
  `img4` varchar(15) DEFAULT NULL,
  `img5` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagini_produs`
--

INSERT INTO `imagini_produs` (`id`, `id_produs`, `img1`, `img2`, `img3`, `img4`, `img5`) VALUES
(1, 1, 'toy1img1.png', 'toy1img2.png', 'toy1img3.png', 'toy1img4.png', 'toy1img5.png'),
(2, 2, 'toy2img1.png', 'toy2img2.png', NULL, NULL, NULL),
(3, 3, 'toy3img1.png', NULL, NULL, NULL, NULL),
(4, 4, 'toy4img1.png', 'toy4img2.png', 'toy4img3.png', NULL, NULL),
(5, 5, 'toy5img1.png', 'toy5img2.png', 'toy5img3.png', 'toy5img4.png', NULL),
(6, 6, 'toy6img1.png', 'toy6img2.png', 'toy6img3.png', 'toy6img4.png', 'toy6img5.png'),
(7, 7, 'toy7img1.png', 'toy7img2.png', 'toy7img3.png', 'toy7img4.png', 'toy7img5.png'),
(8, 8, 'toy8img1.png', 'toy8img2.png', 'toy8img3.png', 'toy8img4.png', 'toy8img5.png');

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `id` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `pret` float NOT NULL,
  `stoc` int(11) NOT NULL,
  `vandute` int(11) NOT NULL DEFAULT 0,
  `categorie` varchar(20) NOT NULL,
  `destinatar` varchar(15) NOT NULL,
  `varsta` varchar(35) NOT NULL,
  `descriere` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`id`, `nume`, `pret`, `stoc`, `vandute`, `categorie`, `destinatar`, `varsta`, `descriere`) VALUES
(1, 'Jucarie de plus Mappy Fluffy Friends', 149.99, 50, 0, 'plus', 'baieti,fete', 'vprescolari, vscolari, vadolescenti', 'Ursul cu pui Mappy Fluffy Friends, maro, 130 cm poate sa fie o mascota, un cadou sau un prieten de joaca al copilului dumneavoastra, in acelasi timp stimuland creativitatea si dezvoltarea sa personala'),
(2, 'Tractor John Deere cu lumini si sunete', 77.99, 50, 2, 'masini', 'baieti', 'vprescolari, vscolari', 'Acest vehicul este pregatit sa faca fata oricarui obstacol care ii sta in cale. Tractorul dispune de lumini si actiune sonora.\r\n\r\nFunctioneaza cu 3 baterii LR44 (AG13)- incluse.'),
(3, 'Papusa Truli, multicolor', 74.99, 50, 10, 'papusi', 'fete', 'vprescolari', 'Papusa Truli 45cm , cel mai nou produs Zurli. Completeaza-ti colectia de papusi cu cele doua noi personaje: Truli si Clopotel. '),
(4, 'LEGO City Police - Centru de comanda mobil ', 143.99, 50, 5, 'creative', 'baieti', 'vscolari', 'Din centrul de comanda mobil LEGO City a evadat un infractor periculos. Toti membrii echipei de politie, adica micii constructori cu varsta cuprinsa intre 6 si 12 ani, sunt rugati sa se prezinte la datorie pentru a prinde evadatul.\r\n\r\nEchipamentul din dotare – cabina de camion detasabila, biroul celor doi ofiteri, camerele de monitorizare cu ecrane mari, antena-satelit, acoperisul cu deschidere larga, usile laterale, rampa din spatele statiei, motocicletele si ATV-urile'),
(5, 'Set cuburi Baby Clemmy – Farm animals', 64.99, 50, 1, 'bebelusi', 'baieti,fete', 'vprescolari', 'Setul de joaca Clemmy este ideal pentru cei mici. Include 6 cuburi moi printre care 3 animalute cu puiutii lor si o brosura de ilustratii pentru a stimula inventivitatea copiilor.\r\n\r\nDa frau liber imaginatiei cu setul Ferma Animalelor si carte de ilustratii de la Clemmy. Produsul stimuleaza dexteritatea, imaginatia si emotia.'),
(6, 'LEGO DUPLO Town - Animalele de la ferma', 34.99, 50, 13, 'creative', 'baieti,fete', 'vprescolari', 'Animalele de la ferma este un set de jucarii pentru copiii de 2 ani, maxim 5 ani. Acesta este compus din doar 16 piese dragute, printre care si patru figurine animale: un vitel, un purcelus, un pui si o pisica.\r\n\r\nSi cum micutul tau iubeste animalele, cu siguranta va fi incantat de aceasta inedita ferma cu animale de jucarie. Ajuta-l sa puna puisorul in cuibar, sa hraneasca purcelul si vitelul in spatiul special amenajat in acest sens si, nu in ultimul rand, sa aiba grija de pisicuta iubitoare!'),
(7, 'LEGO Creator Expert - Ford Mustang', 329.99, 50, 14, 'creative', 'baieti', 'vadolescenti', 'Construieste-ti propriul tau Ford Mustang, completat cu caroserie albastru-inchis, dungi de curse albe, priza de aer agresiva si jante grozave cu 5 spite cu anvelope aderente la sol! Dezvoltat in parteneriat cu Ford, acest model formidabil surprinde vraja automobil american din anii 1960, si vine cu o colectie de accesorii optionale pentru personalizare, incluzand un supra-alimentator, un spoiler posterior ridicat, tevi de esapament masive, o masca frontala si un rezervor de protoxid de azot.'),
(8, 'LEGO Friends - Casa Miei', 129.99, 50, 9, 'creative', 'fete', 'vscolari', 'O vizita linistita in natura, acasa la familia Miei, intr-un weekend relaxat, il va incarca pe micul tau aventurier cu multa energie pozitiva. Nu-i de mirare ca aceasta casa de jucarie este numita de mai toata lumea Casa Prieteniei!\r\n\r\nLocalizata in apropierea padurii, casuta de jucarie este dotata cu bucatarie, baie, sufragerie, dar si cu un dormitor special, pentru momentele in care Mia vrea sa se relaxeze singura, in care se poate ajunge urcand pe o scara exterioara.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `produse_comanda`
--

CREATE TABLE `produse_comanda` (
  `id` int(11) NOT NULL,
  `id_comanda` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `pret` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produse_cos`
--

CREATE TABLE `produse_cos` (
  `id_user` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produse_favorite`
--

CREATE TABLE `produse_favorite` (
  `id_user` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recenzii_produs`
--

CREATE TABLE `recenzii_produs` (
  `id` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL,
  `autor` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recenzii_produs`
--

INSERT INTO `recenzii_produs` (`id`, `id_produs`, `autor`, `data`, `text`) VALUES
(1, 1, 'Harriett Mcdowell', '2020-05-01', 'Cel mai bun cadou indiferent de varsta.'),
(2, 1, 'Damian Hubbard', '2020-05-02', 'Thanks to toys, we\'ve just launched our 5th website!'),
(3, 1, 'Hetty Shaw', '2020-05-03', 'It\'s incredible. I love your system. We can\'t understand how we\'ve been living without toys.'),
(4, 1, 'Kailum Plant', '2020-05-04', 'Wow what great service, I love it! I would be lost without toys.'),
(5, 1, 'Timur Franco', '2020-05-05', 'I would gladly pay over 600 dollars for toys.'),
(6, 1, 'Aaryan Pickett', '2020-05-06', 'I would also like to say thank you to all your staff.'),
(7, 1, 'Haidar Mcmillan', '2020-05-07', 'Toys is the real deal! Very easy to use. Thanks guys, keep up the good work! Toys was the best investment I ever made. Toys is great. You guys rock! Thank you so much for your help. I love your system. Since I invested in toys I made over 100,000 dollars profits. I made back the purchase price in just 48 hours! It\'s exactly what I\'ve been looking for. You won\'t regret it. I wish I would have thought of it first. I would also like to say thank you to all your staff.'),
(8, 1, 'Tayler Benjamin', '2020-05-08', 'Great job, I will definitely be ordering again!'),
(9, 1, 'Matias Mohammed', '2020-05-09', 'Toys is worth much more than I paid. I wish I would have thought of it first.'),
(10, 1, 'Wil Barnett', '2020-05-10', 'Toy saved my business. Great job, I will definitely be ordering again! Toy did exactly what you said it does.'),
(11, 1, 'Shivam Fulton', '2020-05-11', 'This toy impressed me on multiple levels. Best. Product. Ever!'),
(12, 1, 'Archibald Hayward', '2020-05-12', 'Very easy to use.'),
(13, 1, 'Kerry Derrick', '2020-05-13', 'I love this toy. I would like to personally thank you for your outstanding product. This toy is the most valuable business resource we have EVER purchased. This toy has got everything I need.'),
(14, 1, 'Zara Jackson', '2020-05-14', 'Thanks to this toy, we\'ve just launched our 5th website! This toy was worth a fortune to my company. Definitely worth the investment. Buy this now. '),
(15, 1, 'Oriana Stamp', '2020-05-15', 'Definitely worth the investment. No matter where you go, this toy is the coolest, most happening thing around! I love this toy. I couldn\'t have asked for more than this.'),
(16, 1, 'Isabell Munoz', '2020-05-16', 'Best. Product. Ever! I have gotten at least 50 times the value from this toy.'),
(17, 1, 'Edward Glover', '2020-05-17', 'I was amazed at the quality of this toy. Without this toy, we would have gone bankrupt by now. This toy is the real deal! '),
(18, 1, 'Yahya Rice', '2020-05-18', 'I would also like to say thank you to all your staff. You won\'t regret it.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
-- Indexes for table `produse_cos`
--
ALTER TABLE `produse_cos`
  ADD PRIMARY KEY (`id_user`,`id_produs`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produs` (`id_produs`);

--
-- Indexes for table `produse_favorite`
--
ALTER TABLE `produse_favorite`
  ADD PRIMARY KEY (`id_user`,`id_produs`),
  ADD KEY `id_user` (`id_user`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produse_comanda`
--
ALTER TABLE `produse_comanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recenzii_produs`
--
ALTER TABLE `recenzii_produs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comenzi`
--
ALTER TABLE `comenzi`
  ADD CONSTRAINT `fk_comenzi` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `imagini_produs`
--
ALTER TABLE `imagini_produs`
  ADD CONSTRAINT `fk_imagini` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`);

--
-- Constraints for table `produse_comanda`
--
ALTER TABLE `produse_comanda`
  ADD CONSTRAINT `fk_comanda` FOREIGN KEY (`id_comanda`) REFERENCES `comenzi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produs` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produse_cos`
--
ALTER TABLE `produse_cos`
  ADD CONSTRAINT `id_produs_fk` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produse_favorite`
--
ALTER TABLE `produse_favorite`
  ADD CONSTRAINT `favorite_id_produs_fk` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_id_user_fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recenzii_produs`
--
ALTER TABLE `recenzii_produs`
  ADD CONSTRAINT `fk_recenzii` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
