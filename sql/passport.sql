delimiter $$

CREATE TABLE `passport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `learner_ref` varchar(45) DEFAULT NULL,
  `b1` tinyint(1) DEFAULT NULL,
  `b2` tinyint(1) DEFAULT NULL,
  `b3` tinyint(1) DEFAULT NULL,
  `s1` tinyint(1) DEFAULT NULL,
  `s2` tinyint(1) DEFAULT NULL,
  `s3` tinyint(1) DEFAULT NULL,
  `g1` tinyint(1) DEFAULT NULL,
  `g2` tinyint(1) DEFAULT NULL,
  `g3` tinyint(1) DEFAULT NULL,
  `bcomp` tinyint(1) DEFAULT NULL,
  `scomp` tinyint(1) DEFAULT NULL,
  `gcomp` tinyint(1) DEFAULT NULL,
  `bemail` tinyint(1) DEFAULT NULL,
  `semail` tinyint(1) DEFAULT NULL,
  `gemail` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8$$

