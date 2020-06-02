<?php

require_once(dirname(__FILE__).'/ProduitDAO.class.php');

$panier = new ProduitDAO();



$truc = "BRASSERIE MATHEYSINE-NANTES EN RATTIER - 38 - FRANCE HISTOIRE La Brasserie Matheysine est une fabrique de bière artisanale Made in Matheysine, tenue par Elodie et Jérôme et située à Nantes en Rattier au dessus de La Mure en Isère. FABRICATION Les bières de dégustation sont élaborées selon une méthode artisanale et un procédé raisonné : un transport limité avec une distribution essentiellement locale, la réduction des déchets avec des bouteilles consignées, la réutilisation des emballages et le don des céréales brassées pour l’alimentation animale, un étiquetage à la colle à l’eau, l’utilisation d’eau de pluie pour le ménage et les sanitaires, un bâtiment basse consommation. LES PRODUITS Blanche, aux écorces de citrons bio et sauge du jardin ; Blonde, désaltérante, rondeur maltée et douce amertume ; Ambrée, aromatique et maltée, aux notes de biscuit et de caramel ; Brune, puissante et racée, aux notes de réglisse et de chocolat ; Bière de Printemps cuivrée aux notes florales équilibrées à partir de mi-mars; Bière de Noël aux épices et écorces dorange douce disponible en novembre. Plus d'informations : http://www.brasseriematheysine.fr/";

$truc = sprintf($truc);

  $panier->insertProduit(55,"testProd","le fabricant","rayon","famille",1,"description",$truc,"caracteristiques",25,"img.jpg",25,"gramme",0);
// (55,"testProd","le fabricant","rayon","famille",1,"description",
//   "origine","caracteristiques",25,"img.jpg",25,"gramme",0)
// $prod = new Produit();
//
// print_r($prod->getNextRef());
// print_r($prod->getNextRef());


// $prod = new ProduitDAO();
//
// $panier = new PanierDAO();

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
// print_r($panier->getComposition(1));
// $prod->deleteProduitPaniers(2);
//
// //print_r($prod->get(1));
// print_r($panier->getComposition(1));

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
