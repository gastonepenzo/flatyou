-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Apr 02, 2019 alle 14:37
-- Versione del server: 5.7.25-0ubuntu0.16.04.2
-- Versione PHP: 7.2.15-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `flatyou`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `apartments`
--

CREATE TABLE `apartments` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` char(8) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `address` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `street_number` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `cap` char(5) COLLATE utf8_bin NOT NULL,
  `town` varchar(50) COLLATE utf8_bin NOT NULL,
  `province` char(2) COLLATE utf8_bin NOT NULL,
  `state` char(3) COLLATE utf8_bin NOT NULL,
  `typology` enum('studio_apartment','apartment','house','duplex','dormitory','other') COLLATE utf8_bin NOT NULL,
  `smokers` tinyint(1) UNSIGNED DEFAULT NULL,
  `washing_machine` tinyint(1) UNSIGNED DEFAULT NULL,
  `air_conditioned` tinyint(1) UNSIGNED DEFAULT NULL,
  `internet` tinyint(1) UNSIGNED DEFAULT NULL,
  `heating` enum('nothing','centralized','autonomous') COLLATE utf8_bin DEFAULT NULL,
  `living_room` tinyint(1) UNSIGNED DEFAULT NULL,
  `television` tinyint(1) UNSIGNED DEFAULT NULL,
  `pets` tinyint(1) UNSIGNED DEFAULT NULL,
  `car_parking` tinyint(1) UNSIGNED DEFAULT NULL,
  `bike_parking` tinyint(1) UNSIGNED DEFAULT NULL,
  `garden` tinyint(1) UNSIGNED DEFAULT NULL,
  `mq` tinyint(4) UNSIGNED DEFAULT NULL,
  `extra` text COLLATE utf8_bin,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `position_result` enum('not_found','precise','range_interpolated','geometric_center','approximate','error') COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `apartments`
--

INSERT INTO `apartments` (`id`, `code`, `user_id`, `title`, `address`, `street_number`, `cap`, `town`, `province`, `state`, `typology`, `smokers`, `washing_machine`, `air_conditioned`, `internet`, `heating`, `living_room`, `television`, `pets`, `car_parking`, `bike_parking`, `garden`, `mq`, `extra`, `lat`, `lng`, `position_result`, `created_at`, `modified_at`, `active`) VALUES
(1, 'LV0U7HBP', 1, 'Appartamento Pontecorvo', 'Piazzale Pontecorvo', '7', '35121', 'Padova', 'PD', 'ITA', 'apartment', 1, 0, 0, 1, 'autonomous', 1, 1, 0, 0, 1, 0, NULL, NULL, 45.401165, 11.884337, 'precise', '2019-03-19 17:29:45', NULL, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `beds`
--

CREATE TABLE `beds` (
  `id` int(11) UNSIGNED NOT NULL,
  `room_id` int(11) UNSIGNED NOT NULL,
  `typology` enum('single','double') COLLATE utf8_bin NOT NULL DEFAULT 'single',
  `state` enum('free','reserved','empty_reserved') COLLATE utf8_bin NOT NULL DEFAULT 'free',
  `occupied_by` enum('male','female','couple') COLLATE utf8_bin NOT NULL DEFAULT 'male',
  `notes` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `beds`
--

INSERT INTO `beds` (`id`, `room_id`, `typology`, `state`, `occupied_by`, `notes`) VALUES
(1, 1, 'single', 'reserved', 'female', 'Singola di Daniela'),
(2, 2, 'single', 'reserved', 'male', 'Occupata da Gastone\r\n'),
(3, 2, 'single', 'empty_reserved', 'male', 'Letto vuoto ma non prenotabile'),
(4, 3, 'double', 'free', 'couple', 'Letto matrimoniale disponbile per coppia');

-- --------------------------------------------------------

--
-- Struttura della tabella `photos`
--

CREATE TABLE `photos` (
  `id` int(11) UNSIGNED NOT NULL,
  `apartment_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `is_main_photo` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `photos`
--

INSERT INTO `photos` (`id`, `apartment_id`, `name`, `is_main_photo`) VALUES
(1, 1, '1.jpg', 1),
(2, 1, '2.jpg', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) UNSIGNED NOT NULL,
  `apartment_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `rooms`
--

INSERT INTO `rooms` (`id`, `apartment_id`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` char(8) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `username` varchar(25) COLLATE utf8_bin NOT NULL,
  `password` varchar(40) COLLATE utf8_bin NOT NULL,
  `name` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `surname` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `gender` enum('M','F') COLLATE utf8_bin DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `smoker` enum('yes','no','occasional') COLLATE utf8_bin DEFAULT NULL,
  `job` enum('student','employed','unemployed') COLLATE utf8_bin DEFAULT NULL,
  `photo` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `biography` text COLLATE utf8_bin,
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `code`, `email`, `username`, `password`, `name`, `surname`, `gender`, `birthday`, `smoker`, `job`, `photo`, `biography`, `created_at`, `modified_at`, `active`) VALUES
(1, 'ZWBIORTM', 'gastone.penzo@gmail.com', 'belsen', '313f6f32856c39256f1cef5432e17bbe94ac951f', 'Gastone', 'Penzo', 'M', '2019-02-26', 'yes', 'employed', 0, NULL, '2019-03-19 17:21:44', NULL, 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `active` (`active`),
  ADD KEY `user_id` (`user_id`);

--
-- Indici per le tabelle `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `state` (`state`),
  ADD KEY `typology` (`typology`),
  ADD KEY `occupied_by` (`occupied_by`);

--
-- Indici per le tabelle `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartment_id` (`apartment_id`),
  ADD KEY `default` (`is_main_photo`);

--
-- Indici per le tabelle `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartment_id` (`apartment_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD UNIQUE KEY `email` (`email`,`password`),
  ADD UNIQUE KEY `username` (`username`,`password`),
  ADD KEY `active` (`active`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `beds`
--
ALTER TABLE `beds`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `apartments`
--
ALTER TABLE `apartments`
  ADD CONSTRAINT `fk_apartments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `beds`
--
ALTER TABLE `beds`
  ADD CONSTRAINT `fk_beds_rooms` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `fk_photos_apartments` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_rooms_apartments` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
