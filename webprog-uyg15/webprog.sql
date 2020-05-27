-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 May 2020, 16:21:42
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `webprog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adresdefteri`
--

CREATE TABLE `adresdefteri` (
  `Id` int(3) NOT NULL,
  `Ad` varchar(50) NOT NULL,
  `Soyad` varchar(50) NOT NULL,
  `Adres` text NOT NULL,
  `Telefon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `adresdefteri`
--

INSERT INTO `adresdefteri` (`Id`, `Ad`, `Soyad`, `Adres`, `Telefon`) VALUES
(1, 'Eren', 'İNAL', 'Şarköy/Tekirdağ\"\"', '123456'),
(2, 'Pelinsu', 'Baltaci', 'Sarıyer/İstanbul', '45678729');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`Id`, `Name`, `Password`) VALUES
(1, 'e', '1'),
(2, 'b', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyg13`
--

CREATE TABLE `uyg13` (
  `Id` int(3) NOT NULL,
  `Ad` varchar(50) NOT NULL,
  `Soyad` varchar(50) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Sifre` varchar(10) NOT NULL,
  `Adres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `uyg13`
--

INSERT INTO `uyg13` (`Id`, `Ad`, `Soyad`, `Email`, `Sifre`, `Adres`) VALUES
(1, 'Eren', 'İNAL', 'ereninal10@gmail.com', '1234567', 'Şarköy/Tekirdağ\"\"');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ziyaretkullanicilar`
--

CREATE TABLE `ziyaretkullanicilar` (
  `Id` int(3) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Sifre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `ziyaretkullanicilar`
--

INSERT INTO `ziyaretkullanicilar` (`Id`, `Email`, `Sifre`) VALUES
(1, 'ereninal10@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ziyaretmesaj`
--

CREATE TABLE `ziyaretmesaj` (
  `Id` int(11) NOT NULL,
  `Ad` varchar(50) NOT NULL,
  `Soyad` varchar(50) NOT NULL,
  `Eposta` varchar(50) NOT NULL,
  `Baslik` varchar(50) NOT NULL,
  `Mesaj` text NOT NULL,
  `Zaman` date NOT NULL,
  `YoneticiId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `ziyaretmesaj`
--

INSERT INTO `ziyaretmesaj` (`Id`, `Ad`, `Soyad`, `Eposta`, `Baslik`, `Mesaj`, `Zaman`, `YoneticiId`) VALUES
(1, 'mehmet', 'alp', 'felanfilan@gmail.com', 'Konu', 'asdasldşaksmjdklasmdas', '2020-05-31', NULL),
(5, 'onur', 'fel', 'a@gmail.coma', 'asişaşsdkmasş', 'd', '2020-05-27', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adresdefteri`
--
ALTER TABLE `adresdefteri`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `uyg13`
--
ALTER TABLE `uyg13`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `ziyaretkullanicilar`
--
ALTER TABLE `ziyaretkullanicilar`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `ziyaretmesaj`
--
ALTER TABLE `ziyaretmesaj`
  ADD PRIMARY KEY (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `adresdefteri`
--
ALTER TABLE `adresdefteri`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `uyg13`
--
ALTER TABLE `uyg13`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ziyaretkullanicilar`
--
ALTER TABLE `ziyaretkullanicilar`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ziyaretmesaj`
--
ALTER TABLE `ziyaretmesaj`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
