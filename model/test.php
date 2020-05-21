<?php

require_once(dirname(__FILE__).'/ProduitDAO.class.php');
//require_once(dirname(__FILE__).'/Produit.class.php');

$panier = new ProduitDAO();

// insertProduit($stock, $refProduit, $libelle, $fabricant, $rayon, $famille, $coef, $description,
//   $origine, $caracteristiques, $prixU, $urlImg, $quantiteU, $unite)

// $panier->insertProduit(5,56,'banane','matteo','fruits','fruitsexotique',1.2,'grosse banane','etat unis','f',5.2,'aucune.jpg',3.2,'gramme');
// $test = $panier->get(56);


?>
//  CREATE TABLE produits (
//    stock INTEGER,
//    refProduit INTEGER PRIMARY KEY,
//    libelle STRING,
//    fabricant STRING,
//    rayon STRING,
//    famille STRING,
//    coef FLOAT,
//    description STRING,
//    origine STRING,
//    caracteristiques STRING,
//    prixU FLOAT,
//    urlImg STRING,
//    quantiteU FLOAT,
//    unite STRING
//  );
//
// insert into produits values(5,55,"banane","matteo","fruits","fruitsexotique",1.2,"grosse banane","etat unis","f",5.2,"aucune.jpg",3.2,"gramme");
