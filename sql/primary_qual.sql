delimiter $$

CREATE TABLE `primary_qual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `learner_code` int(11) DEFAULT NULL,
  `primary_qual` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nvqcode` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aim` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8372 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci$$

