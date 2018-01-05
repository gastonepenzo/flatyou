
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `photo` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `biography` text COLLATE utf8_bin,
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `email` (`email`,`password`),
  UNIQUE KEY `username` (`username`,`password`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `apartments`;
CREATE TABLE `apartments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` char(8) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `address` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `street_number` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `cap` char(5) COLLATE utf8_bin NOT NULL,
  `town` varchar(50) COLLATE utf8_bin NOT NULL,
  `province` char(2) COLLATE utf8_bin NOT NULL,
  `state` char(3) COLLATE utf8_bin NOT NULL,
  `typology` enum('studio_apartment','apartment','house','duplex','dormitory','other') COLLATE utf8_bin NOT NULL,
  `smokers` tinyint(1) unsigned DEFAULT NULL,
  `washing_machine` tinyint(1) unsigned DEFAULT NULL,
  `air_conditioned` tinyint(1) unsigned DEFAULT NULL,
  `internet` tinyint(1) unsigned DEFAULT NULL,
  `heating` enum('nothing','centralized','autonomous') COLLATE utf8_bin DEFAULT NULL,
  `living_room` tinyint(1) unsigned DEFAULT NULL,
  `television` tinyint(1) unsigned DEFAULT NULL,
  `pets` tinyint(1) unsigned DEFAULT NULL,
  `car_parking` tinyint(1) unsigned DEFAULT NULL,
  `bike_parking` tinyint(1) unsigned DEFAULT NULL,
  `garden` tinyint(1) unsigned DEFAULT NULL,
  `mq` tinyint(4) unsigned DEFAULT NULL,
  `extra` text COLLATE utf8_bin,
  `created_at` datetime NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `active` (`active`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `fk_apartments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `apartment_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `apartment_id` (`apartment_id`),
  CONSTRAINT `fk_rooms_apartments` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


DROP TABLE IF EXISTS `beds`;
CREATE TABLE `beds` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `room_id` int(11) unsigned NOT NULL,
  `typology` enum('s','m') COLLATE utf8_bin NOT NULL DEFAULT 's',
  `state` enum('bm', 'bf', 'bc', 'rm', 'rf', 'rc', 'ra', 'fnr') COLLATE utf8_bin NOT NULL DEFAULT 'ra',
  `notes` text COLLATE utf8_bin,  
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`),
  KEY `state` (`state`),
  CONSTRAINT `fk_beds_rooms` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
