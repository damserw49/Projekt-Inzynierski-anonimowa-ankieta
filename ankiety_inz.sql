-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Cze 2020, 12:11
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
(10, 'Sztuczna Inteligencja', 'Ewa Jabłońska', 'Laboratorium', 4, 0x37663962636339383037353937366633326666386365613765636436383661616164633662666134, 0x39396132303832656432316430613134666236343331663265616432656231366435346466653365),
(11, 'Projekt inżynierski', 'Jan Kowalski', 'Wykład', 6, 0x37623961336265666266383839396537363662353937333732393937333465323166346338393938, 0x39616337376437323763393035663263353839386537323538383166336566343765653339303231),
(12, 'Projekt inżynierski', 'Jan Kowalski', 'Wykład', 2, 0x37623961336265666266383839396537363662353937333732393937333465323166346338393938, 0x32366265373965316635653832373630313061336330636464623333633437363235323934373937);

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
-- Indeksy dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `loginy`
--
ALTER TABLE `loginy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
