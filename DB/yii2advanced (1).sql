-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Apr 28, 2020 alle 09:06
-- Versione del server: 5.7.29-0ubuntu0.16.04.1
-- Versione PHP: 7.0.33-0ubuntu0.16.04.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2advanced`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `country`
--

CREATE TABLE `country` (
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `country`
--

INSERT INTO `country` (`code`, `name`, `population`) VALUES
('AT', 'Austria', 2343454),
('AU', 'Australia', 10000000),
('BR', 'Brazil', 100000000),
('CA', 'Canada', 35985751),
('CH', 'Svizzera', 100000),
('CN', 'Cina', 1375210000),
('DE', 'Germany', 81459000),
('FR', 'France', 64513242),
('GB', 'United Kingdom', 65097000),
('IN', 'India', 1285400000),
('RU', 'Russia', 146519759),
('US', 'United States', 322976000);

-- --------------------------------------------------------

--
-- Struttura della tabella `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1586539661),
('m130524_201442_init', 1586539669),
('m190124_110200_add_verification_token_column_to_user_table', 1586539669);

-- --------------------------------------------------------

--
-- Struttura della tabella `nazioni`
--

CREATE TABLE `nazioni` (
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `nazioni`
--

INSERT INTO `nazioni` (`code`, `name`, `population`) VALUES
('AT', 'Austria', 1000001),
('AU', 'Australia', 10000000),
('BR', 'Brazil', 100000000),
('CA', 'Canada', 35985751),
('CH', 'Svizzera', 100000),
('CN', 'Cina', 1375210000),
('DE', 'Germany', 81459000),
('FR', 'France', 64513242),
('GB', 'United Kingdom', 65097000),
('IN', 'India', 1285400000),
('RU', 'Russia', 146519759),
('US', 'United States', 322976000);

-- --------------------------------------------------------

--
-- Struttura della tabella `percorsi`
--

CREATE TABLE `percorsi` (
  `id_percorso` int(11) NOT NULL,
  `nome_percorso` varchar(50) NOT NULL,
  `durata` int(3) NOT NULL,
  `inizio` date NOT NULL,
  `costo` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `percorsi`
--

INSERT INTO `percorsi` (`id_percorso`, `nome_percorso`, `durata`, `inizio`, `costo`) VALUES
(1, 'Front End Development', 250, '2020-04-22', '2500.00'),
(2, 'Web Development', 250, '2020-04-22', '3000.00'),
(3, 'Full Stack Development', 450, '2020-04-30', '4500.00');

-- --------------------------------------------------------

--
-- Struttura della tabella `percorsistudente`
--

CREATE TABLE `percorsistudente` (
  `id` int(11) NOT NULL,
  `studenti_id` int(11) NOT NULL,
  `percorsi_id` int(11) NOT NULL,
  `pagato` enum('Si','No') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `percorsistudente`
--

INSERT INTO `percorsistudente` (`id`, `studenti_id`, `percorsi_id`, `pagato`) VALUES
(1, 1, 3, 'No'),
(2, 1, 1, 'No'),
(3, 2, 2, 'No'),
(4, 3, 2, 'No'),
(5, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `studenti`
--

CREATE TABLE `studenti` (
  `id_studente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `studenti`
--

INSERT INTO `studenti` (`id_studente`, `nome`, `cognome`) VALUES
(1, 'Mario', 'Rossi'),
(2, 'Salvatore', 'Baracca'),
(3, 'Simona', 'Bianchi'),
(4, 'Stefania', 'Verdi');

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `studentiPercorsiView`
--
CREATE TABLE `studentiPercorsiView` (
`id_studente` int(11)
,`nome` varchar(100)
,`cognome` varchar(100)
,`nome_percorso` varchar(50)
);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'antonio', 'gO6WvTQe2UrKLAvokildRKufkc5mlk9t', '$2y$13$0jQ2UzhPgGpUSgE2qhnngOZvynDDFYMrY4ZhA49KxuxwsVAzq2BdS', NULL, 'a.giannasca@labforweb.it', 10, 1586541524, 1586541524, '1Lbms0XJYGYIznNSYSF8frna4gZSwpoN_1586541524'),
(3, 'christian', 'CCOP4wyMVhQm4XaTQ_rwlbQf2yzT6tgh', '$2y$13$JOyZEnEr1vRk9cLTGCAlGulu8n00T0cXxJufcMd/j4YDsgdZlHQo2', NULL, 'c.cerrone@me.com', 10, 1586860158, 1586860207, 'TxnRGZU4i-nD4bHZxMSKKoRYJp4oDJFu_1586860158');

-- --------------------------------------------------------

--
-- Struttura per la vista `studentiPercorsiView`
--
DROP TABLE IF EXISTS `studentiPercorsiView`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `studentiPercorsiView`  AS  select `studenti`.`id_studente` AS `id_studente`,`studenti`.`nome` AS `nome`,`studenti`.`cognome` AS `cognome`,`percorsi`.`nome_percorso` AS `nome_percorso` from ((`studenti` join `percorsistudente` on((`studenti`.`id_studente` = `percorsistudente`.`studenti_id`))) join `percorsi` on((`percorsistudente`.`percorsi_id` = `percorsi`.`id_percorso`))) ;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`code`);

--
-- Indici per le tabelle `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indici per le tabelle `nazioni`
--
ALTER TABLE `nazioni`
  ADD PRIMARY KEY (`code`);

--
-- Indici per le tabelle `percorsi`
--
ALTER TABLE `percorsi`
  ADD PRIMARY KEY (`id_percorso`);

--
-- Indici per le tabelle `percorsistudente`
--
ALTER TABLE `percorsistudente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studenti_id` (`studenti_id`),
  ADD KEY `percorsi_id` (`percorsi_id`);

--
-- Indici per le tabelle `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`id_studente`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `percorsi`
--
ALTER TABLE `percorsi`
  MODIFY `id_percorso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `percorsistudente`
--
ALTER TABLE `percorsistudente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT per la tabella `studenti`
--
ALTER TABLE `studenti`
  MODIFY `id_studente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
