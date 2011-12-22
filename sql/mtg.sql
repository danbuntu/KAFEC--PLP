delimiter $$

CREATE TABLE `mtg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mtg` varchar(45) DEFAULT NULL,
  `tutor_mtg` varchar(45) DEFAULT NULL,
  `student_id` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id_UNIQUE` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6639 DEFAULT CHARSET=utf8$$


CREATE TABLE `mtg2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lad` varchar(45) DEFAULT NULL,
  `array` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8$$

