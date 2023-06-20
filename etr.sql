-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Nov 27. 07:54
-- Kiszolgáló verziója: 10.4.14-MariaDB
-- PHP verzió: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `etr`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felvette`
--

CREATE TABLE `felvette` (
  `neptun_kod` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `kurzuskod` varchar(20) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felvette`
--

INSERT INTO `felvette` (`neptun_kod`, `kurzuskod`) VALUES
('5VEBGN', 'MBNXK311E'),
('5VEBGN', 'MBNXK311G-1'),
('6WBA36', 'IB104E'),
('6WBA36', 'IB104L-7'),
('6WBA36', 'IB411e-00001'),
('6WBA36', 'MBNXK311E'),
('B0Q1KW', 'IB155e-00002'),
('B0Q1KW', 'IB501e'),
('B0Q1KW', 'IB501g-12'),
('B0Q1KW', 'IB504g-8'),
('C5V4A7', 'IB104E'),
('C5V4A7', 'IB104L-7'),
('C5V4A7', 'MBNXK111E'),
('C5V4A7', 'MBNXK111G-9'),
('CLMFRA', 'IB104E'),
('CLMFRA', 'IB104L-2'),
('CLMFRA', 'IB155e-00002'),
('CLMFRA', 'IB501e'),
('CLMFRA', 'IB501g-10'),
('CLMFRA', 'MBNXK311E'),
('CLMFRA', 'MBNXK311G-1'),
('F3GM5W', 'IB104E'),
('F3GM5W', 'IB104L-7'),
('F3GM5W', 'IB155e-00002'),
('F3GM5W', 'IB411e-00001'),
('F3GM5W', 'IB501e'),
('F3GM5W', 'IB501g-14'),
('F3GM5W', 'MBNXK111E'),
('F3GM5W', 'MBNXK111G-9'),
('F3GM5W', 'MBNXK311E'),
('F3GM5W', 'MBNXK311G-3'),
('FCCXY7', 'IB104E'),
('FCCXY7', 'IB104L-2'),
('FCCXY7', 'IB501e'),
('FCCXY7', 'IB501g-14'),
('FCCXY7', 'MBNXK311E'),
('FCCXY7', 'MBNXK311G-1'),
('I6O3PO', 'IB104E'),
('I6O3PO', 'IB104L-7'),
('I6O3PO', 'IB155e-00002'),
('I6O3PO', 'IB411e-00001'),
('I6O3PO', 'IB501e'),
('I6O3PO', 'IB501g-12'),
('I6O3PO', 'IB504g-8'),
('I6O3PO', 'MBNXK111E'),
('I6O3PO', 'MBNXK111G-9'),
('I6O3PO', 'MBNXK311E'),
('JIQTVW', 'IB104E'),
('JIQTVW', 'IB104L-7'),
('JIQTVW', 'IB155e-00002'),
('JIQTVW', 'IB411e-00001'),
('JIQTVW', 'IB501e'),
('JIQTVW', 'IB501g-12'),
('JIQTVW', 'IB504g-8'),
('JIQTVW', 'MBNXK111E'),
('JIQTVW', 'MBNXK111G-9'),
('JIQTVW', 'MBNXK311E'),
('L15IGE', 'IB104E'),
('L15IGE', 'IB104L-2'),
('L15IGE', 'IB501e'),
('L15IGE', 'IB501g-14'),
('L15IGE', 'MBNXK311E'),
('L15IGE', 'MBNXK311G-3'),
('MHI36M', 'IB104E'),
('MHI36M', 'IB104L-7'),
('MHI36M', 'IB411e-00001'),
('MHI36M', 'IB501e'),
('MHI36M', 'IB501g-12'),
('MHI36M', 'MBNXK111E'),
('MHI36M', 'MBNXK111G-9'),
('MHI36M', 'MBNXK311E'),
('MHI36M', 'MBNXK311G-1'),
('OJFOVH', 'IB104E'),
('OJFOVH', 'IB104L-7'),
('OJFOVH', 'IB155e-00002'),
('OJFOVH', 'IB501e'),
('OJFOVH', 'IB501g-12'),
('OJFOVH', 'IB504g-8'),
('OJFOVH', 'MBNXK111E'),
('OJFOVH', 'MBNXK111G-9'),
('OJFOVH', 'MBNXK311E'),
('OJFOVH', 'MBNXK311G-1'),
('QJ3E2H', 'IB104E'),
('QJ3E2H', 'IB104L-2'),
('QJ3E2H', 'IB155e-00002'),
('QJ3E2H', 'IB501e'),
('QJ3E2H', 'IB501g-10'),
('QJ3E2H', 'IB504g-3'),
('QJ3E2H', 'MBNXK111E'),
('QJ3E2H', 'MBNXK311E'),
('SLI2MX', 'IB104E'),
('SLI2MX', 'IB104L-2'),
('SLI2MX', 'IB155e-00002'),
('SLI2MX', 'IB501e'),
('SLI2MX', 'IB501g-12'),
('SLI2MX', 'IB504g-3'),
('SLI2MX', 'MBNXK111E'),
('SLI2MX', 'MBNXK311E'),
('SLI2MX', 'MBNXK311G-1'),
('XCS14G', 'IB104E'),
('XCS14G', 'IB104L-7'),
('XCS14G', 'IB155e-00002'),
('XCS14G', 'IB501e'),
('XCS14G', 'IB501g-10'),
('XCS14G', 'MBNXK111E'),
('XCS14G', 'MBNXK311E'),
('XCS14G', 'MBNXK311G-3');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hallgato`
--

CREATE TABLE `hallgato` (
  `neptun_kod` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `nev` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `szuletesi_ido` date NOT NULL,
  `lakcim` varchar(60) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `szak` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `felvetel_eve` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `hallgato`
--

INSERT INTO `hallgato` (`neptun_kod`, `nev`, `szuletesi_ido`, `lakcim`, `szak`, `felvetel_eve`) VALUES
('5VEBGN', 'Pintér Albert', '1987-06-05', 'Szenta, Csavargyár u. 22.', 'Gépészmérnök', 2006),
('6WBA36', 'Novák Flóra', '1999-04-09', 'Miskolc, Dózsa György út 62.', 'Mérnökinformatikus', 2018),
('B0Q1KW', 'László Angéla', '1995-01-26', 'Naszály, Munkácsy Mihály út 5.', 'Gépészmérnök', 2013),
('C5V4A7', 'Gulyás Áron', '1993-02-16', 'Bodony, Erzsébet tér 64.', 'Villamosmérnök', 2015),
('CLMFRA', 'Balogh Árpád', '1987-08-27', 'Debrecen, Hegyalja út 16.', 'Programtervező informatikus', 2007),
('F3GM5W', 'Kis Aranka', '1999-08-12', 'Szeged, Kereszttöltés u. 22.', 'Gazdaságinformatikus', 2018),
('FCCXY7', 'Hegedűs Gábor', '1997-04-30', 'Mándok, Bem rakpart 20.', 'Biológia', 2015),
('I6O3PO', 'Bálint Rebeka', '2001-10-03', 'Szeged, Pusztaszeri u. 7', 'Gazdaságinformatikus', 2020),
('JIQTVW', 'Sándor Katalin', '1993-12-13', 'Pécs, Kossuth Lajos u. 47.', 'Gazdaságinformatikus', 2012),
('L15IGE', 'Balog Dorina', '2002-04-25', 'Kiskunhalas, Dayka Gábor u. 15.', 'Programtervező informatikus', 2020),
('MHI36M', 'Oláh Anna', '2001-11-16', 'Budapest, Csabai kapu 97.', 'Programtervező informatikus', 2020),
('OJFOVH', 'Gáspár Richárd', '1992-06-28', 'Isaszeg, Síp utca 23.', 'Agrármérnök', 2013),
('P2S4KC', 'Budai Erzsébet', '1998-07-17', 'Szeged, Kárász utca 13.', '	Programtervező informatikus', 2017),
('QJ3E2H', 'Fehér Klaudia', '1999-10-16', 'Tárnokréti, Bécsi utca 52.', 'Műszaki menedzser', 2021),
('SLI2MX', 'Farkas Kincső', '2002-11-12', 'Budakalász, Árpád fejedelem útja 49.', 'Programtervező informatikus', 2021),
('XCS14G', 'Orosz Áron', '2000-11-07', 'Szeged, Nagytétényi út 35.', 'Gazdaságinformatikus', 2019);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kurzus`
--

CREATE TABLE `kurzus` (
  `kurzuskod` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `kurzus_nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `tipus` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `aktualis_letszam` int(4) DEFAULT NULL,
  `max_letszam` int(4) DEFAULT NULL,
  `kredit` int(2) DEFAULT NULL,
  `kezdesi_idopont` varchar(20) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `idotartam` int(3) DEFAULT NULL,
  `teremnev` varchar(20) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kurzus`
--

INSERT INTO `kurzus` (`kurzuskod`, `kurzus_nev`, `tipus`, `aktualis_letszam`, `max_letszam`, `kredit`, `kezdesi_idopont`, `idotartam`, `teremnev`) VALUES
('IB104E', 'Programozás alapjai', 'előadás', 555, 600, 4, 'Hétfő 14:00', 120, 'TIK-0001-0'),
('IB104L-2', 'Programozás alapjai', 'gyakorlat', 45, 60, 4, 'Hétfő 16:00', 180, 'IR-217-3'),
('IB104L-7', 'Programozás alapjai', 'gyakorlat', 22, 60, 4, 'Péntek 10:00', 180, 'IR-217-3'),
('IB155e-00002', 'Számítógépes grafika', 'előadás', 315, 420, 2, 'Hétfő 12:00', 120, 'TIK-0002-0'),
('IB411e-00001', 'Számítógéppel támogatott tervezés', 'előadás', 40, 40, 2, 'Szerda 12:00', 120, 'IR-217-3'),
('IB501e', 'Adatbázisok', 'előadás', 476, 490, 2, 'Hétfő 16:00', 120, 'TIK-0001-0'),
('IB501g-10', 'Adatbázisok', 'gyakorlat', 29, 30, 2, 'Csütörtök 11:00', 60, 'IR-222-3'),
('IB501g-12', 'Adatbázisok', 'gyakorlat', 28, 30, 2, 'Szerda 15:00', 60, 'IR-222-3'),
('IB501g-14', 'Adatbázisok', 'gyakorlat', 30, 30, 2, 'Hétfő 13:00', 60, 'IR-225-3'),
('IB504g-3', 'Számítógépes grafika', 'gyakorlat', 17, 30, 2, 'Kedd 08:00', 60, 'IR-222-3'),
('IB504g-4', 'Számítógépes grafika', 'gyakorlat', 0, 30, 2, 'Kedd 10:00', 60, 'IR-217-3'),
('IB504g-5', 'Számítógépes grafika', 'gyakorlat', 12, 30, 2, 'Szerda 15:00', 60, 'IR-217-3'),
('IB504g-6', 'Számítógépes grafika', 'gyakorlat', 1, 30, 2, 'Hétfő 8:00', 60, 'IR-222-3'),
('IB504g-8', 'Számítógépes grafika', 'gyakorlat', 29, 30, 2, 'Csütörtök 14:00', 60, 'IR-222-3'),
('MBNXK111E', 'Diszkrét matematika I.', 'előadás', 356, 500, 2, 'Kedd 14:00', 120, 'AD-0057-2'),
('MBNXK111G-9', 'Diszkrét matematika I.', 'gyakorlat', 25, 19, 2, 'Szerda 15:00', 60, 'BO-214-3'),
('MBNXK311E', 'Kalkulus I.', 'előadás', 714, 999, 2, 'Szerda 16:00', 120, 'MO-010-1'),
('MBNXK311G-1', 'Kalkulus I.', 'gyakorlat', 30, 30, 3, 'Csütörtök 10:00', 120, 'BO-211-3'),
('MBNXK311G-3', 'Kalkulus I.', 'gyakorlat', 26, 30, 3, 'Péntek 08:00', 120, 'BO-215-3');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `oktato`
--

CREATE TABLE `oktato` (
  `neptun_kod` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `nev` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `szuletesi_ido` date NOT NULL,
  `intezet_neve` varchar(30) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `iroda_cime` varchar(60) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `oktato`
--

INSERT INTO `oktato` (`neptun_kod`, `nev`, `szuletesi_ido`, `intezet_neve`, `iroda_cime`) VALUES
('BYAJED', 'Papp Szabolcs', '1965-09-08', 'Gépészeti Intézet', 'Szeged, Mars tér 7.'),
('D9PO7Y', 'Pásztor Boglárka', '1989-02-20', 'Informatikai Intézet', 'Szeged, Dugonics tér 14.'),
('EFXFPS', 'Tóth Margit', '1974-03-28', 'Bolyai Intézet', 'Szeged, Aradi vértanúk tere 1.'),
('MU50TE', 'Máté Áron', '1985-03-14', 'Bolyai Intézet', 'Szeged, Aradi vértanúk tere 2.'),
('NGBVSU', 'Vörös Péter', '1964-06-20', 'Informatikai Intézet', 'Szeged, Dugonics tér 13.'),
('ODYYV6', 'Illés Ferenc', '1977-08-10', 'Informatikai Intézet', 'Szeged, Dugonics tér 13.'),
('Q2BEWH', 'Farkas Hunor', '1961-11-16', 'Gépészeti Intézet', 'Szeged, Moszkvai krt. 9.'),
('RFNFGL', 'Horváth Andrea', '1980-06-25', 'Informatikai Intézet', 'Szeged, Dugonics tér 15.'),
('TFWGLA', 'Takács Péter', '1979-06-14', 'Bolyai Intézet', 'Szeged, Aradi vértanúk tere 1.'),
('Y5G885', 'Fülöp Ádám', '1990-08-28', 'Mérnöki Menedzsment és Ökonómi', 'Szeged, Mars tér 7.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tartja`
--

CREATE TABLE `tartja` (
  `neptun_kod` varchar(10) COLLATE utf8_hungarian_ci NOT NULL,
  `kurzuskod` varchar(20) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `tartja`
--

INSERT INTO `tartja` (`neptun_kod`, `kurzuskod`) VALUES
('BYAJED', 'IB104L-2'),
('D9PO7Y', 'IB104E'),
('D9PO7Y', 'IB155e-00002'),
('EFXFPS', 'IB504g-6'),
('EFXFPS', 'MBNXK111G-9'),
('NGBVSU', 'IB501e'),
('NGBVSU', 'IB501g-12'),
('NGBVSU', 'IB501g-14'),
('ODYYV6', 'IB504g-3'),
('ODYYV6', 'IB504g-8'),
('Q2BEWH', 'IB411e-00001'),
('Q2BEWH', 'IB504g-4'),
('Q2BEWH', 'IB504g-5'),
('RFNFGL', 'IB104L-7'),
('RFNFGL', 'IB501g-10'),
('TFWGLA', 'MBNXK311E'),
('TFWGLA', 'MBNXK311G-1');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `terem`
--

CREATE TABLE `terem` (
  `teremnev` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `cim` varchar(60) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `epulet` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `emelet` int(2) DEFAULT NULL,
  `ajto_szama` int(3) DEFAULT NULL,
  `tipus` varchar(20) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `ferohely` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `terem`
--

INSERT INTO `terem` (`teremnev`, `cim`, `epulet`, `emelet`, `ajto_szama`, `tipus`, `ferohely`) VALUES
('AD-0057-2', 'Szeged, Egyetem u. 2.', 'Ady téri épület', 0, 317, 'előadó', 16),
('BO-211-3', 'Szeged, Aradi vértanúk tere 1.', 'Bolyai épület', 2, 211, 'előadó', 72),
('BO-214-3', 'Szeged, Aradi vértanúk tere 1.', 'Bolyai épület', 2, 214, 'előadó', 32),
('BO-215-3', 'Szeged, Aradi vértanúk tere 1.', 'Bolyai épület', 2, 215, 'előadó', 56),
('IR-217-3', 'Szeged, Tisza Lajos krt. 103.', 'Irinyi épület', 2, 217, 'számítógépes', 60),
('IR-222-3', 'Szeged, Tisza Lajos krt. 103.', 'Irinyi épület', 2, 222, 'számítógépes', 25),
('IR-225-3', 'Szeged, Tisza Lajos krt. 103.', 'Irinyi épület', 2, 225, 'számítógépes', 25),
('MO-010-1', 'Szeged, Zoltán u. 14.', 'Móra épület', 0, 10, 'előadó', 120),
('TIK-0001-0', 'Szeged, Ady tér 10.', 'Tanulmányi és Információs Központ', 1, 1, 'előadó', 700),
('TIK-0002-0', 'Szeged, Ady tér 10', 'Tanulmányi és Információs központ', 1, 2, 'előadó', 220);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felvette`
--
ALTER TABLE `felvette`
  ADD PRIMARY KEY (`neptun_kod`,`kurzuskod`),
  ADD KEY `kurzuskod` (`kurzuskod`),
  ADD KEY `neptun_kod` (`neptun_kod`);

--
-- A tábla indexei `hallgato`
--
ALTER TABLE `hallgato`
  ADD PRIMARY KEY (`neptun_kod`);

--
-- A tábla indexei `kurzus`
--
ALTER TABLE `kurzus`
  ADD PRIMARY KEY (`kurzuskod`),
  ADD KEY `teremnev` (`teremnev`),
  ADD KEY `teremnev_2` (`teremnev`);

--
-- A tábla indexei `oktato`
--
ALTER TABLE `oktato`
  ADD PRIMARY KEY (`neptun_kod`);

--
-- A tábla indexei `tartja`
--
ALTER TABLE `tartja`
  ADD PRIMARY KEY (`neptun_kod`,`kurzuskod`),
  ADD KEY `neptun_kod` (`neptun_kod`),
  ADD KEY `kurzuskod` (`kurzuskod`),
  ADD KEY `neptun_kod_2` (`neptun_kod`);

--
-- A tábla indexei `terem`
--
ALTER TABLE `terem`
  ADD PRIMARY KEY (`teremnev`) USING BTREE;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `felvette`
--
ALTER TABLE `felvette`
  ADD CONSTRAINT `felvette_ibfk_1` FOREIGN KEY (`Neptun_kod`) REFERENCES `hallgato` (`Neptun_kod`),
  ADD CONSTRAINT `felvette_ibfk_2` FOREIGN KEY (`kurzuskod`) REFERENCES `kurzus` (`kurzuskod`),
  ADD CONSTRAINT `felvette_ibfk_3` FOREIGN KEY (`neptun_kod`) REFERENCES `hallgato` (`Neptun_kod`);

--
-- Megkötések a táblához `kurzus`
--
ALTER TABLE `kurzus`
  ADD CONSTRAINT `kurzus_ibfk_1` FOREIGN KEY (`teremnev`) REFERENCES `terem` (`teremnev`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Megkötések a táblához `tartja`
--
ALTER TABLE `tartja`
  ADD CONSTRAINT `tartja_ibfk_1` FOREIGN KEY (`Neptun_kod`) REFERENCES `oktato` (`Neptun_kod`),
  ADD CONSTRAINT `tartja_ibfk_2` FOREIGN KEY (`kurzuskod`) REFERENCES `kurzus` (`kurzuskod`),
  ADD CONSTRAINT `tartja_ibfk_3` FOREIGN KEY (`neptun_kod`) REFERENCES `oktato` (`Neptun_kod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
