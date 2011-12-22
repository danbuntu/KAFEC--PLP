delimiter $$

CREATE TABLE `progression_targets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(45) NOT NULL,
  `target` varchar(9000) DEFAULT NULL,
  `completed` tinyint(4) DEFAULT NULL,
  `setby` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `number` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8$$

