-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server Version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server Betriebssystem:        Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Exportiere Datenbank Struktur für krautundrueben
CREATE DATABASE IF NOT EXISTS `krautundrueben` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `krautundrueben`;

-- Exportiere Struktur von Tabelle krautundrueben.bestellung
CREATE TABLE IF NOT EXISTS `bestellung` (
  `BESTELLNR` int(11) NOT NULL AUTO_INCREMENT,
  `KUNDENNR` int(11) DEFAULT NULL,
  `BESTELLDATUM` date DEFAULT NULL,
  `RECHNUNGSBETRAG` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`BESTELLNR`),
  KEY `KUNDENNR` (`KUNDENNR`),
  CONSTRAINT `bestellung_ibfk_1` FOREIGN KEY (`KUNDENNR`) REFERENCES `kunde` (`KUNDENNR`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle krautundrueben.bestellung: ~12 rows (ungefähr)
DELETE FROM `bestellung`;
/*!40000 ALTER TABLE `bestellung` DISABLE KEYS */;
INSERT INTO `bestellung` (`BESTELLNR`, `KUNDENNR`, `BESTELLDATUM`, `RECHNUNGSBETRAG`) VALUES
	(1, 2001, '2020-07-01', 6.21),
	(2, 2002, '2020-07-08', 32.96),
	(3, 2003, '2020-08-01', 24.08),
	(4, 2004, '2020-08-02', 19.90),
	(5, 2005, '2020-08-02', 6.47),
	(6, 2006, '2020-08-10', 6.96),
	(7, 2007, '2020-08-10', 2.41),
	(8, 2008, '2020-08-10', 13.80),
	(9, 2009, '2020-08-10', 8.67),
	(10, 2007, '2020-08-15', 17.98),
	(11, 2005, '2020-08-12', 8.67),
	(12, 2003, '2020-08-13', 20.87);
/*!40000 ALTER TABLE `bestellung` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle krautundrueben.bestellungzutat
CREATE TABLE IF NOT EXISTS `bestellungzutat` (
  `BESTELLNR` int(11) NOT NULL,
  `ZUTATENNR` int(11) NOT NULL,
  `MENGE` int(11) DEFAULT NULL,
  PRIMARY KEY (`BESTELLNR`,`ZUTATENNR`),
  KEY `ZUTATENNR` (`ZUTATENNR`),
  CONSTRAINT `bestellungzutat_ibfk_1` FOREIGN KEY (`BESTELLNR`) REFERENCES `bestellung` (`BESTELLNR`),
  CONSTRAINT `bestellungzutat_ibfk_2` FOREIGN KEY (`ZUTATENNR`) REFERENCES `zutat` (`ZUTATENNR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle krautundrueben.bestellungzutat: ~26 rows (ungefähr)
DELETE FROM `bestellungzutat`;
/*!40000 ALTER TABLE `bestellungzutat` DISABLE KEYS */;
INSERT INTO `bestellungzutat` (`BESTELLNR`, `ZUTATENNR`, `MENGE`) VALUES
	(1, 1001, 5),
	(1, 1002, 3),
	(1, 1004, 3),
	(1, 1006, 2),
	(2, 1003, 4),
	(2, 1005, 5),
	(2, 6408, 5),
	(2, 9001, 10),
	(3, 3001, 5),
	(3, 6300, 15),
	(4, 3003, 2),
	(4, 5001, 7),
	(5, 1001, 5),
	(5, 1002, 4),
	(5, 1004, 5),
	(6, 1010, 5),
	(7, 1009, 9),
	(8, 1008, 7),
	(8, 1012, 5),
	(9, 1007, 4),
	(9, 1012, 5),
	(10, 1011, 7),
	(10, 4001, 7),
	(11, 1012, 5),
	(11, 5001, 2),
	(12, 1010, 15);
/*!40000 ALTER TABLE `bestellungzutat` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle krautundrueben.kunde
CREATE TABLE IF NOT EXISTS `kunde` (
  `KUNDENNR` int(11) NOT NULL,
  `NACHNAME` varchar(50) DEFAULT NULL,
  `VORNAME` varchar(50) DEFAULT NULL,
  `GEBURTSDATUM` date DEFAULT NULL,
  `STRASSE` varchar(50) DEFAULT NULL,
  `HAUSNR` varchar(6) DEFAULT NULL,
  `PLZ` varchar(5) DEFAULT NULL,
  `ORT` varchar(50) DEFAULT NULL,
  `TELEFON` varchar(25) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`KUNDENNR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle krautundrueben.kunde: ~9 rows (ungefähr)
DELETE FROM `kunde`;
/*!40000 ALTER TABLE `kunde` DISABLE KEYS */;
INSERT INTO `kunde` (`KUNDENNR`, `NACHNAME`, `VORNAME`, `GEBURTSDATUM`, `STRASSE`, `HAUSNR`, `PLZ`, `ORT`, `TELEFON`, `EMAIL`) VALUES
	(2001, 'Wellensteyn', 'Kira', '1990-05-05', 'Eppendorfer Landstrasse', '104', '20249', 'Hamburg', '040/443322', 'k.wellensteyn@yahoo.de'),
	(2002, 'Foede', 'Dorothea', '2000-03-24', 'Ohmstraße', '23', '22765', 'Hamburg', '040/543822', 'd.foede@web.de'),
	(2003, 'Leberer', 'Sigrid', '1989-09-21', 'Bilser Berg', '6', '20459', 'Hamburg', '0175/1234588', 'sigrid@leberer.de'),
	(2004, 'Soerensen', 'Hanna', '1974-04-03', 'Alter Teichweg', '95', '22049', 'Hamburg', '040/634578', 'h.soerensen@yahoo.de'),
	(2005, 'Schnitter', 'Marten', '1964-04-17', 'Stübels', '10', '22835', 'Barsbüttel', '0176/447587', 'schni_mart@gmail.com'),
	(2006, 'Maurer', 'Belinda', '1978-09-09', 'Grotelertwiete', '4a', '21075', 'Hamburg', '040/332189', 'belinda1978@yahoo.de'),
	(2007, 'Gessert', 'Armin', '1978-01-29', 'Küstersweg', '3', '21079', 'Hamburg', '040/67890', 'armin@gessert.de'),
	(2008, 'Haessig', 'Jean-Marc', '1982-08-30', 'Neugrabener Bahnhofstraße', '30', '21149', 'Hamburg', '0178-67013390', 'jm@haessig.de'),
	(2009, 'Urocki', 'Eric', '1999-12-04', 'Elbchaussee', '228', '22605', 'Hamburg', '0152-96701390', 'urocki@outlook.de');
/*!40000 ALTER TABLE `kunde` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle krautundrueben.lieferant
CREATE TABLE IF NOT EXISTS `lieferant` (
  `LIEFERANTENNR` int(11) NOT NULL,
  `LIEFERANTENNAME` varchar(50) DEFAULT NULL,
  `STRASSE` varchar(50) DEFAULT NULL,
  `HAUSNR` varchar(6) DEFAULT NULL,
  `PLZ` varchar(5) DEFAULT NULL,
  `ORT` varchar(50) DEFAULT NULL,
  `TELEFON` varchar(25) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`LIEFERANTENNR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle krautundrueben.lieferant: ~3 rows (ungefähr)
DELETE FROM `lieferant`;
/*!40000 ALTER TABLE `lieferant` DISABLE KEYS */;
INSERT INTO `lieferant` (`LIEFERANTENNR`, `LIEFERANTENNAME`, `STRASSE`, `HAUSNR`, `PLZ`, `ORT`, `TELEFON`, `EMAIL`) VALUES
	(101, 'Bio-Hof Müller', 'Dorfstraße', '74', '24354', 'Weseby', '04354-9080', 'mueller@biohof.de'),
	(102, 'Obst-Hof Altes Land', 'Westerjork 74', '76', '21635', 'Jork', '04162-4523', 'info@biohof-altesland.de'),
	(103, 'Molkerei Henning', 'Molkereiwegkundekunde', '13', '19217', 'Dechow', '038873-8976', 'info@molkerei-henning.de');
/*!40000 ALTER TABLE `lieferant` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle krautundrueben.rezepte
CREATE TABLE IF NOT EXISTS `rezepte` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `Vegetarisch` tinyint(4) DEFAULT NULL,
  `Name` varchar(64) NOT NULL,
  `Vegan` tinyint(4) DEFAULT NULL,
  `High_Prot` tinyint(4) DEFAULT NULL,
  `Glutenfrei` tinyint(4) DEFAULT NULL,
  `Laktosefrei` tinyint(4) DEFAULT NULL,
  `enthaelt_keine_nuesse` tinyint(4) DEFAULT NULL,
  `enthaelt_kein_ei` tinyint(4) DEFAULT NULL,
  `allesfresser` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle krautundrueben.rezepte: ~5 rows (ungefähr)
DELETE FROM `rezepte`;
/*!40000 ALTER TABLE `rezepte` DISABLE KEYS */;
INSERT INTO `rezepte` (`ID`, `Vegetarisch`, `Name`, `Vegan`, `High_Prot`, `Glutenfrei`, `Laktosefrei`, `enthaelt_keine_nuesse`, `enthaelt_kein_ei`, `allesfresser`) VALUES
	(1, 0, 'Bunter Salat', 1, NULL, 1, 1, 1, 1, 1),
	(2, NULL, 'Orientalische Lammkoteletts', NULL, 1, NULL, NULL, 1, NULL, 1),
	(3, NULL, 'English Breakfast', NULL, 1, NULL, NULL, 1, NULL, 1),
	(4, 1, 'Tomate-Mozzarella', NULL, NULL, 1, NULL, 1, NULL, 1),
	(5, 1, 'Ofengemüse', NULL, NULL, NULL, NULL, 1, NULL, 1);
/*!40000 ALTER TABLE `rezepte` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle krautundrueben.rezepte_alt
CREATE TABLE IF NOT EXISTS `rezepte_alt` (
  `Rezept_NR` int(11) NOT NULL,
  `BEZEICHNUNG` varchar(50) DEFAULT NULL,
  `Zucchini` int(11) DEFAULT NULL,
  `Zwiebel` int(11) DEFAULT NULL,
  `Tomate` int(11) DEFAULT NULL,
  `Schalotte` int(11) DEFAULT NULL,
  `Karotte` int(11) DEFAULT NULL,
  `Kartoffel` int(11) DEFAULT NULL,
  `Rucola` int(11) DEFAULT NULL,
  `Lauch` int(11) DEFAULT NULL,
  `Knoblauch` int(11) DEFAULT NULL,
  `Basilikum` int(11) DEFAULT NULL,
  `Suesskartoffel` int(11) DEFAULT NULL,
  `Schnittlauch` int(11) DEFAULT NULL,
  `Apfel` int(11) DEFAULT NULL,
  `Vollmilch` int(11) DEFAULT NULL,
  `Mozzarella` int(11) DEFAULT NULL,
  `Butter` int(11) DEFAULT NULL,
  `Ei` int(11) DEFAULT NULL,
  `Wiener_Wuerstchen` int(11) DEFAULT NULL,
  `Kichererbsen` int(11) DEFAULT NULL,
  `Couscous` int(11) DEFAULT NULL,
  `Gemuesebruehe` int(11) DEFAULT NULL,
  `Tofu_Wuerstchen` int(11) DEFAULT NULL,
  `Lammkotelett` int(11) DEFAULT NULL,
  `NETTOPREIS` decimal(10,2) DEFAULT NULL,
  `KALORIEN` int(11) DEFAULT NULL,
  `KOHLENHYDRATE` decimal(10,2) DEFAULT NULL,
  `PROTEIN` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle krautundrueben.rezepte_alt: ~5 rows (ungefähr)
DELETE FROM `rezepte_alt`;
/*!40000 ALTER TABLE `rezepte_alt` DISABLE KEYS */;
INSERT INTO `rezepte_alt` (`Rezept_NR`, `BEZEICHNUNG`, `Zucchini`, `Zwiebel`, `Tomate`, `Schalotte`, `Karotte`, `Kartoffel`, `Rucola`, `Lauch`, `Knoblauch`, `Basilikum`, `Suesskartoffel`, `Schnittlauch`, `Apfel`, `Vollmilch`, `Mozzarella`, `Butter`, `Ei`, `Wiener_Wuerstchen`, `Kichererbsen`, `Couscous`, `Gemuesebruehe`, `Tofu_Wuerstchen`, `Lammkotelett`, `NETTOPREIS`, `KALORIEN`, `KOHLENHYDRATE`, `PROTEIN`) VALUES
	(10001, 'English Breakfast', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 3, 1, NULL, NULL, NULL, NULL, NULL, 7.50, 831, 14.40, 51.00),
	(10002, 'Ofen Gemuese', NULL, NULL, NULL, NULL, 3, 3, NULL, NULL, 1, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4.60, 563, 162.20, 19.50),
	(10003, 'Tomate Mozzarella', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9.65, 577, 14.90, 42.30),
	(10004, 'Bunter Salat', NULL, NULL, 1, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 4.45, 465, 82.70, 19.50),
	(10005, 'Orientalische Lammkoteletts', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, NULL, NULL, 2, 14.55, 1833, 123.80, 80.60);
/*!40000 ALTER TABLE `rezepte_alt` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle krautundrueben.rezept_zutaten
CREATE TABLE IF NOT EXISTS `rezept_zutaten` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `Rezept_ID` int(3) NOT NULL,
  `Zutat_ID` int(3) NOT NULL,
  `Menge` int(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle krautundrueben.rezept_zutaten: ~24 rows (ungefähr)
DELETE FROM `rezept_zutaten`;
/*!40000 ALTER TABLE `rezept_zutaten` DISABLE KEYS */;
INSERT INTO `rezept_zutaten` (`ID`, `Rezept_ID`, `Zutat_ID`, `Menge`) VALUES
	(1, 1, 1003, 1),
	(2, 1, 1005, 1),
	(3, 1, 1007, 1),
	(4, 1, 1012, 1),
	(5, 1, 6408, 1),
	(6, 2, 1004, 2),
	(7, 2, 1009, 1),
	(8, 2, 3003, 1),
	(9, 2, 6300, 1),
	(10, 2, 6408, 1),
	(11, 2, 5002, 1),
	(12, 3, 1002, 1),
	(13, 3, 1003, 1),
	(14, 3, 1012, 1),
	(15, 3, 3003, 1),
	(16, 3, 4001, 3),
	(17, 3, 5001, 1),
	(18, 4, 1003, 3),
	(19, 4, 1010, 1),
	(20, 4, 3002, 2),
	(21, 5, 1005, 3),
	(22, 5, 1006, 3),
	(23, 5, 1009, 1),
	(24, 5, 1011, 3);
/*!40000 ALTER TABLE `rezept_zutaten` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle krautundrueben.zutat
CREATE TABLE IF NOT EXISTS `zutat` (
  `ZUTATENNR` int(11) NOT NULL,
  `BEZEICHNUNG` varchar(50) DEFAULT NULL,
  `EINHEIT` varchar(25) DEFAULT NULL,
  `NETTOPREIS` decimal(10,2) DEFAULT NULL,
  `BESTAND` int(11) DEFAULT NULL,
  `LIEFERANT` int(11) DEFAULT NULL,
  `KALORIEN` int(11) DEFAULT NULL,
  `KOHLENHYDRATE` decimal(10,2) DEFAULT NULL,
  `PROTEIN` decimal(10,2) DEFAULT NULL,
  `Gramm` int(11) DEFAULT NULL,
  PRIMARY KEY (`ZUTATENNR`),
  KEY `LIEFERANT` (`LIEFERANT`),
  CONSTRAINT `zutat_ibfk_1` FOREIGN KEY (`LIEFERANT`) REFERENCES `lieferant` (`LIEFERANTENNR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportiere Daten aus Tabelle krautundrueben.zutat: ~23 rows (ungefähr)
DELETE FROM `zutat`;
/*!40000 ALTER TABLE `zutat` DISABLE KEYS */;
INSERT INTO `zutat` (`ZUTATENNR`, `BEZEICHNUNG`, `EINHEIT`, `NETTOPREIS`, `BESTAND`, `LIEFERANT`, `KALORIEN`, `KOHLENHYDRATE`, `PROTEIN`, `Gramm`) VALUES
	(1001, 'Zucchini', 'Stück', 0.89, 100, 101, 19, 2.00, 1.60, 250),
	(1002, 'Zwiebel', 'Stück', 0.15, 50, 101, 28, 4.90, 1.20, 80),
	(1003, 'Tomate', 'Stück', 0.45, 50, 101, 18, 2.60, 1.00, 100),
	(1004, 'Schalotte', 'Stück', 0.20, 500, 101, 25, 3.30, 1.50, 20),
	(1005, 'Karotte', 'Stück', 0.30, 500, 101, 41, 10.00, 0.90, 60),
	(1006, 'Kartoffel', 'Stück', 0.15, 1500, 101, 71, 14.60, 2.00, 90),
	(1007, 'Rucola', 'Bund', 0.90, 10, 101, 27, 2.10, 2.60, 50),
	(1008, 'Lauch', 'Stück', 1.20, 35, 101, 29, 3.30, 2.10, 140),
	(1009, 'Knoblauch', 'Stück', 0.25, 250, 101, 141, 28.40, 6.10, 40),
	(1010, 'Basilikum', 'Bund', 1.30, 10, 101, 41, 5.10, 3.10, 40),
	(1011, 'Süßkartoffel', 'Stück', 2.00, 200, 101, 86, 20.00, 1.60, 310),
	(1012, 'Schnittlauch', 'Bund', 0.90, 10, 101, 28, 1.00, 3.00, 30),
	(2001, 'Apfel', 'Stück', 1.20, 750, 102, 54, 14.40, 0.30, 135),
	(3001, 'Vollmilch. 3.5%', 'Liter', 1.50, 50, 103, 65, 4.70, 3.40, 1000),
	(3002, 'Mozzarella', 'Packung', 3.50, 20, 103, 241, 1.00, 18.10, 140),
	(3003, 'Butter', 'Stück', 3.00, 50, 103, 741, 0.60, 0.70, 250),
	(4001, 'Ei', 'Stück', 0.40, 300, 102, 137, 1.50, 11.90, 55),
	(5001, 'Wiener Würstchen', 'Paar', 1.80, 40, 101, 331, 1.20, 9.90, 100),
	(5002, 'Lammkotelett', 'Stück', 4.00, 20, 101, 200, 0.00, 24.90, 100),
	(6300, 'Kichererbsen', 'Dose', 1.00, 400, 103, 150, 21.20, 9.00, 265),
	(6408, 'Couscous', 'Packung', 1.90, 15, 102, 351, 67.00, 12.00, 500),
	(7043, 'Gemüsebrühe', 'Würfel', 0.20, 4000, 101, 1, 0.50, 0.50, 5),
	(9001, 'Tofu-Würstchen', 'Stück', 1.80, 20, 103, 252, 7.00, 17.00, 70);
/*!40000 ALTER TABLE `zutat` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
