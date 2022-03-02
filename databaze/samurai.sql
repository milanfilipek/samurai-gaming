-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 30. bře 2021, 18:04
-- Verze serveru: 10.4.11-MariaDB
-- Verze PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `samurai`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `hraci`
--

CREATE TABLE `hraci` (
  `IDh` int(3) NOT NULL,
  `jmeno` varchar(25) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `prijmeni` varchar(25) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `dat_nar` date NOT NULL,
  `prezdivka` varchar(25) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `narod` varchar(30) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `role` varchar(30) CHARACTER SET utf8 COLLATE utf8_czech_ci DEFAULT '-',
  `obrazek` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `IDs` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `hraci`
--

INSERT INTO `hraci` (`IDh`, `jmeno`, `prijmeni`, `dat_nar`, `prezdivka`, `narod`, `role`, `obrazek`, `IDs`) VALUES
(1, 'Jakub', 'Pudil', '2003-04-29', 'Cpt_Kubajz', 'Česká Republika', '-', 'images/hraci/sg_cpt_kubajz.png', 2),
(2, 'Roman', 'Protivínský', '2000-02-10', 'Angel', 'Česká Republika', '-', 'images/hraci/sg_angel.png', 2),
(3, 'Matěj', 'Řehák', '2001-03-30', 'Rehy', 'Česká Republika', '-', 'images/hraci/sg_rehy.png', 1),
(4, 'Matúš', 'Timoranský', '2004-05-13', 'Trylox', 'Slovensko', 'IGL', 'images/hraci/sg_placeholder.png', 4),
(5, 'David', 'Toth', '2003-07-05', 'Wardy', 'Slovensko', 'Lurker', 'images/hraci/sg_placeholder.png', 4),
(6, 'Martin', 'Samuel', '2003-09-16', 'Trollxo', 'Slovensko', 'Entry Fragger', 'images/hraci/sg_placeholder.png', 4),
(7, 'Lukáš', 'Vilem', '2003-08-21', 'Snowjumper', 'Slovensko', 'Roamer', 'images/hraci/sg_placeholder.png', 4),
(8, 'Patrik', 'Mayer', '2004-06-24', 'Amraleardya', 'Slovensko', 'Support', 'images/hraci/sg_placeholder.png', 4),
(10, 'Milan', 'Filipek', '2001-08-01', 'firecrazy', 'Česká Republika', 'Toplaner', 'images/hraci/sg_firecrazy.png', 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `kontakty`
--

CREATE TABLE `kontakty` (
  `IDk` int(3) NOT NULL,
  `nazev` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `odkaz` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `fa` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `kontakty`
--

INSERT INTO `kontakty` (`IDk`, `nazev`, `odkaz`, `fa`) VALUES
(1, 'Facebook', 'https://www.facebook.com/samuraigamingcz/', 'fab fa-facebook-square fa-2x'),
(2, 'Instagram', 'https://www.instagram.com/samuraigamingcz/', 'fab fa-instagram fa-2x'),
(3, 'Twitter', 'https://twitter.com/Samuraigamingcz', 'fab fa-twitter fa-2x'),
(4, 'Telefon', '+420 777 285 717, +420 725 151 886', 'fas fa-phone-square fa-2x'),
(5, 'Email', 'samuraigamingcz@gmail.com', 'far fa-envelope fa-2x');

-- --------------------------------------------------------

--
-- Struktura tabulky `partneri`
--

CREATE TABLE `partneri` (
  `IDp` int(3) NOT NULL,
  `nazev` varchar(50) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `odkaz` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `popis` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `partneri`
--

INSERT INTO `partneri` (`IDp`, `nazev`, `odkaz`, `logo`, `popis`) VALUES
(1, 'OVACHAMP - Ostrava Championship', 'https://www.ovachamp.cz/', 'images\\sponsors\\ovachamp.png', 'Ostravský organizátor turnajů'),
(2, 'INSTINKT', 'https://instinkt-pills.cz/?affiliate=1ff1de774005f8da13f42943881c655f', 'images\\sponsors\\instinkt.png', 'jedinečný doplněk stravy, který ti dodá energii na dlouhé hodiny hraní'),
(3, 'WARHOUSE', 'http://warhouse.cz/', 'images\\sponsors\\warhouse.png', 'Revoluce ve světě herních židlí'),
(4, 'GAMEBRAND', 'https://www.gamebrand.cz/index.php?route=common/home', 'images\\sponsors\\gamebrand.png', 'Hráčský e-shop, kde najdeš různý merch tvých oblíbených YouTuberů a další');

-- --------------------------------------------------------

--
-- Struktura tabulky `sekce`
--

CREATE TABLE `sekce` (
  `IDs` int(3) NOT NULL,
  `nazev` varchar(30) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `zkratka` varchar(10) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `obrazek` varchar(255) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `sekce`
--

INSERT INTO `sekce` (`IDs`, `nazev`, `zkratka`, `obrazek`) VALUES
(1, 'Teamfight Tactics', 'TFT', 'images/sekce/tft.png'),
(2, 'FIFA', 'FIFA', 'images/sekce/fifa.png'),
(3, 'League of Legends', 'LoL', 'images/sekce/lol.png'),
(4, 'R6: Siege', 'R6S', 'images/sekce/r6.png');

-- --------------------------------------------------------

--
-- Struktura tabulky `uspechy`
--

CREATE TABLE `uspechy` (
  `IDu` int(3) NOT NULL,
  `nazev` varchar(70) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `umisteni` varchar(30) CHARACTER SET utf8 COLLATE utf8_czech_ci NOT NULL,
  `IDs` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `uspechy`
--

INSERT INTO `uspechy` (`IDu`, `nazev`, `umisteni`, `IDs`) VALUES
(1, 'MSI FANDAY Žilina TFT turnaj', '2. místo', 1),
(2, 'Škoda GAMING DAY', '3. místo', 2),
(3, 'Grandfinále DATART e:LIGA', 'Top16', 2),
(4, 'Ovachamp Vánoční TFT LAN Nightcup', '1. místo', 1),
(5, 'Rivals Challenge 7.díl (SG Academy)', '2. místo', 3),
(6, 'Ovachamp LoL Grandfinále 2019', '5. - 8. místo', 3),
(7, 'Glory4Gamers TFT 1v1', '1. místo', 1),
(8, 'PLAYzone TFT #9', '1. místo', 1),
(9, 'Ovachamp TFT LAN Nightcup', '2. místo', 1),
(10, 'Glory4Gamers TFT 1v1', '2. místo', 1),
(11, 'Glory4Gamers TFT 1v1', '2. místo', 1),
(12, 'Glory4Gamers TFT 1v1', '1. místo', 1),
(13, 'Zetko Cup #2', '3. místo', 2),
(14, 'Rivals Challenge 4.díl', '3. místo', 3),
(15, 'Rivals Challenge 3.díl', '2. místo', 3),
(16, 'Rivals Challenge 2.díl', '1. místo', 3);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `hraci`
--
ALTER TABLE `hraci`
  ADD PRIMARY KEY (`IDh`),
  ADD KEY `IDs` (`IDs`);

--
-- Klíče pro tabulku `kontakty`
--
ALTER TABLE `kontakty`
  ADD PRIMARY KEY (`IDk`);

--
-- Klíče pro tabulku `partneri`
--
ALTER TABLE `partneri`
  ADD PRIMARY KEY (`IDp`);

--
-- Klíče pro tabulku `sekce`
--
ALTER TABLE `sekce`
  ADD PRIMARY KEY (`IDs`);

--
-- Klíče pro tabulku `uspechy`
--
ALTER TABLE `uspechy`
  ADD PRIMARY KEY (`IDu`),
  ADD KEY `IDs` (`IDs`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `hraci`
--
ALTER TABLE `hraci`
  MODIFY `IDh` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pro tabulku `kontakty`
--
ALTER TABLE `kontakty`
  MODIFY `IDk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pro tabulku `partneri`
--
ALTER TABLE `partneri`
  MODIFY `IDp` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pro tabulku `sekce`
--
ALTER TABLE `sekce`
  MODIFY `IDs` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pro tabulku `uspechy`
--
ALTER TABLE `uspechy`
  MODIFY `IDu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `hraci`
--
ALTER TABLE `hraci`
  ADD CONSTRAINT `hraci_ibfk_1` FOREIGN KEY (`IDs`) REFERENCES `sekce` (`IDs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `uspechy`
--
ALTER TABLE `uspechy`
  ADD CONSTRAINT `uspechy_ibfk_1` FOREIGN KEY (`IDs`) REFERENCES `sekce` (`IDs`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
