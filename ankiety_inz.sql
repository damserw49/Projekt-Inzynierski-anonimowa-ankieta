-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Cze 2020, 14:55
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ankiety_inz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ankieta`
--

CREATE TABLE `ankieta` (
  `ID` int(11) NOT NULL,
  `przedmiot` varchar(50) NOT NULL,
  `prowadzacy` varchar(50) NOT NULL,
  `forma_zajec` varchar(50) NOT NULL,
  `ocena` int(11) NOT NULL,
  `user_name` varbinary(500) NOT NULL,
  `hash` varbinary(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ankieta`
--

INSERT INTO `ankieta` (`ID`, `przedmiot`, `prowadzacy`, `forma_zajec`, `ocena`, `user_name`, `hash`) VALUES
(13, 'Projekt inżynierski', 'Jan Kowalski', 'Wykład', 2, 0x37663962636339383037353937366633326666386365613765636436383661616164633662666134, 0x37633036303330633038643131306665386230633734613666313463643033373431356464373239),
(14, 'Sztuczna Inteligencja', 'Jan Kowalski', 'Laboratorium', 2, 0x37623961336265666266383839396537363662353937333732393937333465323166346338393938, 0x62353036333362313764623235653665633731636162626238653864303230636565373932663936);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `loginy`
--

CREATE TABLE `loginy` (
  `ID` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Imie` varchar(50) DEFAULT NULL,
  `Nazwisko` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `loginy`
--

INSERT INTO `loginy` (`ID`, `login`, `password`, `Imie`, `Nazwisko`) VALUES
(1, 'admin', 'admin', NULL, NULL),
(2, 'jankowalski', 'jankowalski', 'Jan', 'Kowalski'),
(3, 'mareknowak', 'mareknowak', 'Marek', 'Nowak'),
(4, 'tomaszkraj', 'tomaszkraj', 'Tomasz', 'Kraj');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nazwa_ankieta`
--

CREATE TABLE `nazwa_ankieta` (
  `ID` int(11) NOT NULL,
  `ankieta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `nazwa_ankieta`
--

INSERT INTO `nazwa_ankieta` (`ID`, `ankieta`) VALUES
(1, 'ankieta'),
(2, 'Test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmioty`
--

CREATE TABLE `przedmioty` (
  `ID` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `przedmioty`
--

INSERT INTO `przedmioty` (`ID`, `nazwa`) VALUES
(1, 'Projekt inżynierski'),
(2, 'Sztuczna Inteligencja');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `test`
--

CREATE TABLE `test` (
  `ID` int(11) NOT NULL,
  `przedmiot` varchar(50) DEFAULT NULL,
  `prowadzacy` varchar(50) DEFAULT NULL,
  `forma_zajec` varchar(50) DEFAULT NULL,
  `ocena` int(11) DEFAULT NULL,
  `user_name` varbinary(500) DEFAULT NULL,
  `hash` varbinary(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `test`
--

INSERT INTO `test` (`ID`, `przedmiot`, `prowadzacy`, `forma_zajec`, `ocena`, `user_name`, `hash`) VALUES
(1, 'Sztuczna Inteligencja', 'Ewa Jabłońska', 'Laboratorium', 4, 0x37623961336265666266383839396537363662353937333732393937333465323166346338393938, 0x30636633386236316336616539383463323638613533313861346236643436336663363431633535);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wykladowcy`
--

CREATE TABLE `wykladowcy` (
  `ID` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wykladowcy`
--

INSERT INTO `wykladowcy` (`ID`, `imie`, `nazwisko`) VALUES
(1, 'Jan', 'Kowalski'),
(2, 'Ewa', 'Jabłońska');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ankieta`
--
ALTER TABLE `ankieta`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `loginy`
--
ALTER TABLE `loginy`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `nazwa_ankieta`
--
ALTER TABLE `nazwa_ankieta`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `wykladowcy`
--
ALTER TABLE `wykladowcy`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `ankieta`
--
ALTER TABLE `ankieta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `loginy`
--
ALTER TABLE `loginy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `nazwa_ankieta`
--
ALTER TABLE `nazwa_ankieta`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `test`
--
ALTER TABLE `test`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
