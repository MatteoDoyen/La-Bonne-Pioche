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
INSERT INTO Produits VALUES(3, 'Épinard', 'Fruits & Légumes', null, 'Meylan - 38 - France', null, null);
INSERT INTO Produits VALUES(4, 'Mesclun', 'Fruits & Légumes', null, 'Meylan - 38 - France', null, null);
INSERT INTO Produits VALUES(5, 'Baguette classique', 'Pain', null, 'Varces - 38 - France', null, null);
INSERT INTO Produits VALUES(6, 'Le 5 céréales', 'Pain', null, 'Varces - 38 - France', null, null);
INSERT INTO Produits VALUES(7, 'Crottin de chèvre Frais', 'Fromage', null, 'Méaudre - 38 - France', null, null);
INSERT INTO Produits VALUES(8, 'Crottin de chèvre sec', 'Fromage', null, 'Méaudre - 38 - France', null, null);
INSERT INTO Produits VALUES(9, 'Lait cru de vache', 'Yahourt', null, 'Saint Luce - 38 - France', null, null);
INSERT INTO Produits VALUES(10, 'Yaourt fermier au lait de vache', 'Yahourt', null, 'Saint Luce - 38 - France', null, null);
INSERT INTO Produits VALUES(11, 'Yaourt fermier au lait de vache', 'Yahourt', null, 'Saint Luce - 38 - France', null, null);
INSERT INTO Produits VALUES(12, 'Coquillette', 'Pate', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(13, 'Crozet nature', 'Pate', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(14, 'Mini Coque', 'Pate', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(15, 'Mini Farfalle', 'Pate', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(16, 'Penne', 'Pate', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(17, 'Perle', 'Pate', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(18, 'Tagliatelle', 'Pate', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(19, 'Torsade complète', 'Pate', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(20, 'Riz à risotto', 'Riz', null, 'Saint-Jean-De-Maurienne - 73 - France', null, null);
INSERT INTO Produits VALUES(21, 'Riz blanc de Camargue', 'Riz', null, 'Saint-Gilles - 30 - France', null, null);
INSERT INTO Produits VALUES(22, 'Riz blanc de Camargue', 'Riz', null, 'Saint-Gilles - 30 - France', null, null);
INSERT INTO Produits VALUES(23, 'Riz rouge de Camargue', 'Riz', null, 'Saint-Gilles - 30 - France', null, null);
INSERT INTO Produits VALUES(24, 'Farine de blé Biocéréales', 'Farine', null, 'Saint-Gilles - 30 - France', null, null);
