<?php

require_once(dirname(__FILE__).'/ProduitDAO.class.php');
//require_once(dirname(__FILE__).'/Produit.class.php');

$panier = new ProduitDAO();

// insertProduit($stock, $refProduit, $libelle, $fabricant, $rayon, $famille, $coef, $description,
//   $origine, $caracteristiques, $prixU, $urlImg, $quantiteU, $unite)


$panier->insertProduit(5,55,'banane','matteo','fruits','fruitsexotique',1.2,'grosse banane','etat unis','f',5.2,'aucune.jpg',3.2,'gramme');
$test = $panier->get(1);
print_r($test);
 ?>
