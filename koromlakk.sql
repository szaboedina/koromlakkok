-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Ápr 17. 16:56
-- Kiszolgáló verziója: 10.4.8-MariaDB
-- PHP verzió: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `koromlakkok`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `koromlakk`
--

CREATE TABLE `koromlakk` (
  `id` int(11) NOT NULL,
  `marka` varchar(128) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `szin` varchar(128) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `ar` int(11) NOT NULL,
  `keszleten` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `koromlakk`
--

INSERT INTO `koromlakk` (`id`, `marka`, `szin`, `ar`, `keszleten`) VALUES
(1, 'Crystal Nails', 'kek', 14, 1),
(2, 'Crystal Nails', 'pink', 8, 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `koromlakk`
--
ALTER TABLE `koromlakk`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `koromlakk`
--
ALTER TABLE `koromlakk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
