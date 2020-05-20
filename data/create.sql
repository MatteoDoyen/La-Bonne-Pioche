DROP TABLE IF EXISTS `Type`;
CREATE TABLE `Type` (
  `nom` varchar(64) NOT NULL,
  `groupe` varchar(64) NOT NULL,
  PRIMARY KEY (`nom`)
);

DROP TABLE IF EXISTS `Produits`;
CREATE TABLE `Produits` (
  `id` int(8) NOT NULL,
  `intitule` varchar(128) NOT NULL,
  `type` varchar(64) NOT NULL,
  `image` varchar(2048),
  `lieu_production` varchar(1024) NOT NULL,
  `origine` varchar(4096),
  `description` varchar(1028),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`type`) REFERENCES `Type` (`nom`)
);
