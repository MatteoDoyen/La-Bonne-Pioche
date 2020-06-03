<?php

// Display tous les produits
// Inclusion du modèle
require_once('../model/PanierDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC


$catalogue = new PanierDAO();

$paniers = array();
// Récupération des données à placer dans la vue à partir du modèle
$paniers = $catalogue->getAllActive();


$view = new View("panierAchat.view.php");

$view->paniers = $paniers;

$view->show();

 ?>
