<?php

require_once(dirname(__FILE__).'/ProduitDAO.class.php');
require_once(dirname(__FILE__).'/PanierDAO.class.php');

$prod = new ProduitDAO();

$panier = new PanierDAO();

// insertProduit($stock, $libelle, $fabricant, $rayon, $famille, $coef, $description,
//   $origine, $caracteristiques, $prixU, $urlImg, $quantiteU, $unite)

//$arrayName = array('libelle' =>'pommes');
// $panier->insertProduit(5,'banane','matteo','fruits','fruitsexotique',1.2,'grosse banane','etat unis','f',5.2,'aucune.jpg',3.2,'gramme');
//
// print_r($panier->get($panier->getNbElements()));
//
// try {
//   $panier->deleteProduit($panier->getNbElements());
// }
// catch (\Exception $e) {
//
//   if(strpos($e->getMessage(),'FOREIGN'))
//   {
//     echo"erreur foreign key";
//   }
// }
// print_r($panier->get($panier->getNbElements()));
print_r($panier->getComposition(1));
$prod->deleteProduitPaniers(2);

//print_r($prod->get(1));
print_r($panier->getComposition(1));

// print_r($panier->get(55));
// print_r($panier->get(56));
//
// $panier->deleteProduit(55);
// $panier->deleteProduit(56);
//
// print_r($panier->get(55));
// print_r($panier->get(56));
//   $nb = $panier->getNbElements();
// $test = $panier->get($nb);
//  $nb = $panier->getNbElements();
// $test = $panier->get($nb);
//
// print_r($test);


?>
