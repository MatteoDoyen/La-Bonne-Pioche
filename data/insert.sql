-- Insertion de produits

INSERT INTO Type VALUES ('Pain', 'Produits frais');
INSERT INTO Type VALUES ('Brioche', 'Produits frais');
INSERT INTO Type VALUES ('Fromage', 'Produits frais');
INSERT INTO Type VALUES ('Yahourt', 'Produits frais');
INSERT INTO Type VALUES ('Oeufs', 'Produits frais');
INSERT INTO Type VALUES ('Fruits & Légumes', 'Produits frais');

INSERT INTO Type VALUES('Pate', 'Épicerie sèche');
INSERT INTO Type VALUES('Riz', 'Épicerie sèche');
INSERT INTO Type VALUES('Légumineuse', 'Épicerie sèche');
INSERT INTO Type VALUES('Semoule, Quinoa', 'Épicerie sèche');
INSERT INTO Type VALUES('Farine', 'Épicerie sèche');
INSERT INTO Type VALUES('Sucre', 'Épicerie sèche');
INSERT INTO Type VALUES('Levure', 'Épicerie sèche');
INSERT INTO Type VALUES('Graines', 'Épicerie sèche');
INSERT INTO Type VALUES('Fruits secs', 'Épicerie sèche');

INSERT INTO Type VALUES('Huile', 'Assaisonnement');
INSERT INTO Type VALUES('Vinaigre', 'Assaisonnement');
INSERT INTO Type VALUES('Épices', 'Assaisonnement');
INSERT INTO Type VALUES('Condiment', 'Assaisonnement');

INSERT INTO Type VALUES('Céréales', 'Petit déjeuner & Goûter');
INSERT INTO Type VALUES('Biscuits', 'Petit déjeuner & Goûter');
INSERT INTO Type VALUES('Cacao', 'Petit déjeuner & Goûter');
INSERT INTO Type VALUES('Compote', 'Petit déjeuner & Goûter');
INSERT INTO Type VALUES('Coulis', 'Petit déjeuner & Goûter');
INSERT INTO Type VALUES('Confiture', 'Petit déjeuner & Goûter');
INSERT INTO Type VALUES('Miel', 'Petit déjeuner & Goûter');
INSERT INTO Type VALUES('Tartinade', 'Petit déjeuner & Goûter');

INSERT INTO Type VALUES('Chocolat', 'Confiserie');
INSERT INTO Type VALUES('Praline', 'Confiserie');
INSERT INTO Type VALUES('Meringue', 'Confiserie');
INSERT INTO Type VALUES('Bonbon', 'Confiserie');

INSERT INTO Type VALUES('Soupe & Gaspacho', 'Prêt à manger');
INSERT INTO Type VALUES('Sauce', 'Prêt à manger');
INSERT INTO Type VALUES('Plats cuisinés', 'Prêt à manger');
INSERT INTO Type VALUES("Pour l'apéro", 'Prêt à manger');

INSERT INTO Type VALUES('Jus de fruits', 'Boissons');
INSERT INTO Type VALUES('Jus de fruits pétillants', 'Boissons');
INSERT INTO Type VALUES('Sirop', 'Boissons');
INSERT INTO Type VALUES('Limonades', 'Boissons');
INSERT INTO Type VALUES('Cidre', 'Boissons');
INSERT INTO Type VALUES('Bières', 'Boissons');
INSERT INTO Type VALUES('Vin', 'Boissons');
INSERT INTO Type VALUES('Café', 'Boissons');
INSERT INTO Type VALUES('Thé, Tisane', 'Boissons');

INSERT INTO type VALUES('Visage', "Produits d'hygiène");
INSERT INTO type VALUES('Corps', "Produits d'hygiène");
INSERT INTO type VALUES('Dents', "Produits d'hygiène");
INSERT INTO type VALUES('Bébés', "Produits d'hygiène");
INSERT INTO type VALUES('Femmes', "Produits d'hygiène");

INSERT INTO Type VALUES('Linge', "Produits d'entretien");
INSERT INTO Type VALUES('Sol', "Produits d'entretien");
INSERT INTO Type VALUES('Tout usage', "Produits d'entretien");
INSERT INTO Type VALUES('Toilettes', "Produits d'entretien");
INSERT INTO Type VALUES('Vaiselle', "Produits d'entretien");
INSERT INTO Type VALUES('Fabriquer ses produits', "Produits d'entretien");

INSERT INTO Type VALUES('Boîte', 'Contenants');
INSERT INTO Type VALUES('Bouteille', 'Contenants');
INSERT INTO Type VALUES('Bocaux', 'Contenants');
INSERT INTO Type VALUES('Sac en tissu', 'Contenants');
INSERT INTO Type VALUES('Vaporisateur', 'Contenants');
INSERT INTO Type VALUES('Bidon', 'Contenants');

INSERT INTO Type VALUES('Cuisine', 'Accessoires');
INSERT INTO Type VALUES('Extérieur', 'Accessoires');
INSERT INTO Type VALUES('Détente', 'Accessoires');



-- Insertion de produits --

INSERT INTO Produits VALUES(1, 'Ail', 'Fruits & Légumes', null, 'St Bardoux - 26 - France', null, null);
INSERT INTO Produits VALUES(2, 'Carotte', 'Fruits & Légumes', null, 'St Bardoux - 26 - France', null, null);
INSERT INTO Produits VALUES(3, 'Champignons de Paris', 'Fruits & Légumes', null, 'St Hilaire de la Côte - 38 - France', null, null);
INSERT INTO Produits VALUES(4, 'Épinard', 'Fruits & Légumes', null, 'Meylan - 38 - France', null, null);
INSERT INTO Produits VALUES(5, 'Mesclun', 'Fruits & Légumes', null, 'Meylan - 38 - France', null, null);
INSERT INTO Produits VALUES(6, 'Noix sèche', 'Fruits & Légumes', null, 'Tèche - 38 - France', null, null);
INSERT INTO Produits VALUES(7, 'Pomme de terre', 'Fruits & Légumes', null, 'Tèche - 38 - France', null, null);

INSERT INTO Produits VALUES(8, 'Baguette classique', 'Pain', null, 'Varces - 38 - France', null, null);
INSERT INTO Produits VALUES(9, 'Le 5 céréales', 'Pain', null, 'Varces - 38 - France', null, null);
INSERT INTO Produits VALUES(10, 'Le Complet', 'Pain', null, 'Varces - 38 - France', null, null);
INSERT INTO Produits VALUES(11, 'Le Rustique', 'Pain', null, 'Varces - 38 - France', null, null);

INSERT INTO Produits VALUES(12, 'Brioche St Genix', 'Brioche', null, 'Varces - 38 - France', null, null);
INSERT INTO Produits VALUES(13, 'Brioche tressée', 'Brioche', null, 'Varces - 38 - France', null, null);

INSERT INTO Produits VALUES(14, 'Coeur cendré', 'Fromage', null, 'Tullins - 38 - France', null, null);
INSERT INTO Produits VALUES(15, 'Crottin de chèvre Frais', 'Fromage', null, 'Méaudre - 38 - France', null, null);
INSERT INTO Produits VALUES(16, 'Crottin de chèvre sec', 'Fromage', null, 'Méaudre - 38 - France', null, null);
INSERT INTO Produits VALUES(17, 'Petite tomme grise', 'Fromage', null, 'Méaudre - 38 - France', null, null);
INSERT INTO Produits VALUES(18, 'Saint-Marcellin', 'Fromage', null, 'Auberives en Royans - 38 - France', null, null);

INSERT INTO Produits VALUES(19, 'Lait cru de vache', 'Yahourt', null, 'Sainte Luce - 38 - France', null, null);
INSERT INTO Produits VALUES(20, 'Lait entier de vache', 'Yahourt', null, 'St Ondras - 38 - France', null, null);
INSERT INTO Produits VALUES(21, 'Yaourt fermier au lait de vache', 'Yahourt', null, 'Sainte Luce - 38 - France', null, null);

INSERT INTO Produits VALUES(22, 'Oeufs', 'Oeufs', null, 'St Quentin sur Isère - 38 - France', null, null);

INSERT INTO Produits VALUES(23, 'Coquillette', 'Pate', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(25, 'Crozet nature', 'Pate', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(26, 'Mini Coque', 'Pate', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(27, 'Mini Farfalle', 'Pate', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(28, 'Penne', 'Pate', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(29, 'Perle', 'Pate', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(30, 'Tagliatelle', 'Pate', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(31, 'Torsade complète', 'Pate', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);

INSERT INTO Produits VALUES(32, 'Riz à risotto', 'Riz', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(33, 'Riz blanc de Camargue', 'Riz', null, 'Saint-Gilles - 30 - France', null, null);
INSERT INTO Produits VALUES(34, 'Riz rouge de Camargue', 'Riz', null, 'Saint-Gilles - 30 - France', null, null);

INSERT INTO Produits VALUES(35, 'Haricot noir', 'Légumineuse', null, 'Villefagnan - 16 - France', null, null);
INSERT INTO Produits VALUES(36, 'Haricot rouge', 'Légumineuse', null, 'Villefagnan - 16 - France', null, null);
INSERT INTO Produits VALUES(37, 'Pois cassés', 'Légumineuse', null, 'Villefagnan - 16 - France', null, null);

INSERT INTO Produits VALUES(38, 'Boulgour Gros', 'Semoule, Quinoa', null, 'St-Marcel-lès-Valence - 26 - France', null, null);
INSERT INTO Produits VALUES(39, 'Polenta', 'Semoule, Quinoa', null, 'Saint-Jean-de-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(40, 'Quinoa', 'Semoule, Quinoa', null, 'Jumelles - 49 - France', null, null);

INSERT INTO Produits VALUES(41, 'Farine de blé Biocéréales', 'Farine', null, 'Mens - 38 - France', null, null);
INSERT INTO Produits VALUES(42, 'Farine de blé T55', 'Farine', null, 'Mens - 38 - France', null, null);
INSERT INTO Produits VALUES(43, 'Farine de blé T65', 'Farine', null, 'Mens - 38 - France', null, null);
INSERT INTO Produits VALUES(44, 'Farine de blé T80', 'Farine', null, 'Mens - 38 - France', null, null);
INSERT INTO Produits VALUES(45, 'Farine de riz', 'Farine', null, 'Mens - 38 - France', null, null);

INSERT INTO Produits VALUES(46, 'Sucre blanc', 'Sucre', null, 'Méjannes-lès-Alès - 30 - France', null, null);
INSERT INTO Produits VALUES(47, 'Sucre roux', 'Sucre', null, 'Méjannes-lès-Alès - 30 - France', null, null);

INSERT INTO Produits VALUES(48, 'Levure maltée', 'Levure', null, 'St-Marcel-lès-Valence - 26 - France', null, null);

INSERT INTO Produits VALUES(49, 'Graines de courge', 'Graines', null, 'Moncrabeau - 47 - France', null, null);
INSERT INTO Produits VALUES(50, 'Graines de lin', 'Graines', null, 'Moncrabeau - 47 - France', null, null);

INSERT INTO Produits VALUES(51, 'Amande décortiquée', 'Fruits secs', null, 'St-Marcel-lès-Valence - 26 - France', null, null);
INSERT INTO Produits VALUES(52, 'Raisin sec', 'Fruits secs', null, 'St-Marcel-lès-Valence - 26 - France', null, null);

INSERT INTO Produits VALUES(53, 'Huile vierge de colza', 'Huile', null, 'Montelier - 26 - France', null, null);
INSERT INTO Produits VALUES(54, 'Huile vierge de tournesol', 'Huile', null, 'Montelier - 26 - France', null, null);

INSERT INTO Produits VALUES(55, 'Vinaigre 11 aromates', 'Vinaigre', null, 'Saint Sébastien - 38 - France', null, null);
INSERT INTO Produits VALUES(56, 'Vinaigre à l\'échalotte', 'Vinaigre', null, 'Saint Sébastien - 38 - France', null, null);
INSERT INTO Produits VALUES(57, 'Vinaigre à l\'estragon', 'Vinaigre', null, 'Saint Sébastien - 38 - France', null, null);

INSERT INTO Produits VALUES(58, 'Basilic', 'Épices', null, 'Méjannes-lès-Alès - 30 - France', null, null);
INSERT INTO Produits VALUES(59, 'Bouillon de légumes', 'Épices', null, 'Cavaillon - 84 - France', null, null);
INSERT INTO Produits VALUES(60, 'Cannelle moulue', 'Épices', null, 'Méjannes-lès-Alès - 30 - France', null, null);
INSERT INTO Produits VALUES(61, 'Clou de girofle', 'Épices', null, 'Méjannes-lès-Alès - 30 - France', null, null);
INSERT INTO Produits VALUES(62, 'Cumin moulu', 'Épices', null, 'Méjannes-lès-Alès - 30 - France', null, null);
INSERT INTO Produits VALUES(63, 'Curry', 'Épices', null, 'Méjannes-lès-Alès - 30 - France', null, null);
INSERT INTO Produits VALUES(64, 'Gros sel', 'Épices', null, 'Batz sur Mer - 44 - France', null, null);
INSERT INTO Produits VALUES(65, 'Persil', 'Épices', null, 'Méjannes-lès-Alès - 30 - France', null, null);

INSERT INTO Produits VALUES(66, 'Moutarde à l\'ancienne', 'Condiment', null, 'Montelier - 26 - France', null, null);
