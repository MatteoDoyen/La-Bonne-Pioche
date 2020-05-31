<?php

// Display tous les produits
// Inclusion du modèle
require_once('../model/PanierAchat.class.php');
require_once('../model/PanierDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC


$catalogue = new PanierDAO();

$paniers = array();
// Récupération des données à placer dans la vue à partir du modèle
for($i=1; $i<=$catalogue->getNbElements();$i++){

  $p = $catalogue->get($i);

  $paniers[] =$p;
}


$view = new View("panierAchat.view.php");

$view->paniers = $paniers;

$view->show();

 ?>
