-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 24. Mrz 2016 um 17:23
-- Server-Version: 10.1.10-MariaDB
-- PHP-Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `tvdb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cs1`
--

CREATE TABLE `cs1` (
  `id` int(11) NOT NULL,
  `text1` text COLLATE utf8mb4_german2_ci NOT NULL,
  `text2` text COLLATE utf8mb4_german2_ci NOT NULL,
  `text3` text COLLATE utf8mb4_german2_ci NOT NULL,
  `text4` text COLLATE utf8mb4_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cs2`
--

CREATE TABLE `cs2` (
  `id` int(11) NOT NULL,
  `text1` text COLLATE utf8mb4_german2_ci NOT NULL,
  `text2` text COLLATE utf8mb4_german2_ci NOT NULL,
  `text3` text COLLATE utf8mb4_german2_ci NOT NULL,
  `text4` text COLLATE utf8mb4_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ct1`
--

CREATE TABLE `ct1` (
  `id` int(11) NOT NULL,
  `text1` text COLLATE utf8mb4_german2_ci NOT NULL,
  `text2` text COLLATE utf8mb4_german2_ci,
  `text3` text COLLATE utf8mb4_german2_ci NOT NULL,
  `text4` text COLLATE utf8mb4_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ct2`
--

CREATE TABLE `ct2` (
  `id` int(11) NOT NULL,
  `textx1` text COLLATE utf8mb4_german2_ci NOT NULL,
  `textx2` text COLLATE utf8mb4_german2_ci NOT NULL,
  `textx3` text COLLATE utf8mb4_german2_ci NOT NULL,
  `textx4` text COLLATE utf8mb4_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `music`
--

CREATE TABLE `music` (
  `plexid` int(24) NOT NULL,
  `name` text CHARACTER SET latin1 NOT NULL,
  `plexcount` int(12) NOT NULL,
  `lastfmcount` int(12) NOT NULL,
  `mbid` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `plex`
--

CREATE TABLE `plex` (
  `tvdbid` int(24) NOT NULL,
  `plexid` int(24) NOT NULL,
  `epplex` int(4) NOT NULL,
  `eptvdb` int(4) NOT NULL,
  `status` text CHARACTER SET utf8mb4 NOT NULL,
  `epdiff` int(4) NOT NULL,
  `setvdb` text COLLATE utf8mb4_german2_ci NOT NULL,
  `seplex` text COLLATE utf8mb4_german2_ci NOT NULL,
  `plexname` text CHARACTER SET utf8mb4 NOT NULL,
  `tvdbname` text CHARACTER SET utf8mb4 NOT NULL,
  `lang` text COLLATE utf8mb4_german2_ci NOT NULL,
  `poster` text COLLATE utf8mb4_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cs1`
--
ALTER TABLE `cs1`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `cs2`
--
ALTER TABLE `cs2`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `ct1`
--
ALTER TABLE `ct1`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `ct2`
--
ALTER TABLE `ct2`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`plexid`);

--
-- Indizes für die Tabelle `plex`
--
ALTER TABLE `plex`
  ADD PRIMARY KEY (`tvdbid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cs1`
--
ALTER TABLE `cs1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `cs2`
--
ALTER TABLE `cs2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT für Tabelle `ct1`
--
ALTER TABLE `ct1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `ct2`
--
ALTER TABLE `ct2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
