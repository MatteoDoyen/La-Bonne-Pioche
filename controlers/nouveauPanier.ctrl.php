<?php
// Inclusion du modèle
require_once('../model/PanierDAO.class.php');
require_once('../model/ProduitDAO.class.php');
require_once('../model/Produit.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

//Récupération des valeurs du formulaire

  $view = new View("nouveauPanier.view.php");

  //$view->paniers=$toutLesPaniers;

  // Appel de la vue
  $view->show();

?>
