<?php
// Inclusion du modèle
require_once('../model/PanierDAO.class.php');
require_once('../model/ProduitDAO.class.php');
require_once('../model/Produit.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

//Récupération des valeurs du formulaire

  $view = new View("nouveauPanier.view.php");

  $produit = new ProduitDAO();
  $paniers = new PanierDAO();

  $toutLesPaniers = array();

  // // Récupération des données à placer dans la vue à partir du modèle
  // for($i=1; $i<=$paniers->getNbElements();$i++){
  //   // Récupération de l'objet Produit
  //   $panier = $paniers->get($i);
  //   // Ajout à la liste des images à afficher
  //   $toutLesPaniers[] = $panier;
  // }

  $toutLesProduits = array();

  for($i=1;$i<=$produit->getMaxRefProduit();$i++){
    // Récupération de l'objet Produit
    $prod = $produit->get($i);
    // Ajout à la liste des images à afficher
    $toutLesProduits[] = $prod;
  }

  // Passage des paramètres à la vue
  $view->produits=$toutLesProduits;
  //$view->paniers=$toutLesPaniers;

  // Appel de la vue
  $view->show();

?>
