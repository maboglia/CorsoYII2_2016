-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2016 alle 15:02
-- Versione del server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii2basic`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `areeSosta`
--

CREATE TABLE IF NOT EXISTS `areeSosta` (
`id` int(10) unsigned NOT NULL COMMENT 'identificativo',
  `nomeArea` varchar(255) NOT NULL COMMENT 'nome area',
  `descrizione` text NOT NULL COMMENT 'descrizione dell''area',
  `comune` varchar(200) NOT NULL COMMENT 'comune e indirizzo',
  `latitudine` decimal(10,6) NOT NULL COMMENT 'coordinate gps',
  `longitudine` decimal(10,6) NOT NULL COMMENT 'coordinate gps'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `areeSosta`
--

INSERT INTO `areeSosta` (`id`, `nomeArea`, `descrizione`, `comune`, `latitudine`, `longitudine`) VALUES
(1, 'Ivrea da Fabiana', 'Ivrea da FabianaIvrea da FabianaIvrea da FabianaIvrea da FabianaIvrea da FabianaIvrea da FabianaIvrea da FabianaIvrea da FabianaIvrea da Fabiana', 'Ivrea', '45.812346', '7.912346'),
(2, 'Ivrea da Clara', 'Ivrea da Clara Ivrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da ClaraIvrea da Clara', 'Ivrea', '45.812346', '7.912346');

-- --------------------------------------------------------

--
-- Struttura della tabella `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `phone_number` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dump dei dati per la tabella `customer`
--

INSERT INTO `customer` (`id`, `name`, `surname`, `phone_number`) VALUES
(1, 'Mauro', 'Bogliaccino', '+39-12345678'),
(2, 'Stefano', 'Netsurf', '3334445566'),
(3, 'Clara', 'Netsurf', '3334445566'),
(4, 'Stefano', 'Garofalo', '3334445566'),
(5, 'Fabiana', 'Netsurf', '3334445566');

-- --------------------------------------------------------

--
-- Struttura della tabella `notizie`
--

CREATE TABLE IF NOT EXISTS `notizie` (
`id` int(11) NOT NULL,
  `titolo` varchar(255) NOT NULL,
  `testo` text NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `notizie`
--

INSERT INTO `notizie` (`id`, `titolo`, `testo`, `data`) VALUES
(1, 'Il mio camper è più bello', 'Parte il concorso di Fabiana Il mio camper è più bello', '2016-02-26');

-- --------------------------------------------------------

--
-- Struttura della tabella `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
`id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `price_per_day` decimal(20,2) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `reservation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `reservation`
--

INSERT INTO `reservation` (`id`, `room_id`, `customer_id`, `price_per_day`, `date_from`, `date_to`, `reservation_date`) VALUES
(1, 1, 2, '90.00', '2015-04-01', '2015-05-06', '2016-03-01 21:05:49'),
(2, 2, 1, '48.00', '2019-08-27', '2019-08-31', '2016-03-01 21:05:49'),
(3, 2, 3, '150.00', '2016-03-01', '2016-03-08', '2016-03-01 21:23:47'),
(4, 3, 4, '59.00', '2016-03-09', '2016-03-16', '2016-03-01 21:23:47');

-- --------------------------------------------------------

--
-- Struttura della tabella `room`
--

CREATE TABLE IF NOT EXISTS `room` (
`id` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `has_conditioner` int(1) NOT NULL,
  `has_tv` int(1) NOT NULL,
  `has_phone` int(1) NOT NULL,
  `available_from` date NOT NULL,
  `price_per_day` decimal(20,2) DEFAULT NULL,
  `description` text,
  `fileImage` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dump dei dati per la tabella `room`
--

INSERT INTO `room` (`id`, `floor`, `room_number`, `has_conditioner`, `has_tv`, `has_phone`, `available_from`, `price_per_day`, `description`, `fileImage`) VALUES
(1, 1, 101, 1, 0, 1, '2015-05-20', '120.00', 'piano ammezzato, senza bagno e finestre', ''),
(2, 2, 202, 0, 1, 1, '2015-05-30', '118.00', 'molto bella', ''),
(3, 3, 303, 1, 1, 1, '2015-05-30', '218.00', 'very nice', ''),
(4, 4, 404, 1, 1, 1, '2016-01-10', '134.00', 'pqybpwypqwyf0wyètyqè\r\nvoquèpqubpn', 'mozillafr_128_tr.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areeSosta`
--
ALTER TABLE `areeSosta`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notizie`
--
ALTER TABLE `notizie`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
 ADD PRIMARY KEY (`id`), ADD KEY `room_id` (`room_id`), ADD KEY `customer_id` (`customer_id`), ADD KEY `room_id_2` (`room_id`), ADD KEY `customer_id_2` (`customer_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areeSosta`
--
ALTER TABLE `areeSosta`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'identificativo',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `notizie`
--
ALTER TABLE `notizie`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `reservation`
--
ALTER TABLE `reservation`
ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`),
ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
