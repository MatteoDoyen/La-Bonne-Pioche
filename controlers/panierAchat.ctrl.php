<?php

// Display tous les produits
// Inclusion du modèle
require_once('../model/PanierDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC


$catalogue = new PanierDAO();

$paniers = array();
// Récupération des données à placer dans la vue à partir du modèle
$paniers = $catalogue->getAllActive();

// On crée une instance de vue pour la page panierAchat.view.php
$view = new View("panierAchat.view.php");

// On affecte les paniers récupérés dans la base de données à la vue
// via la variable paniers de la vue
$view->paniers = $paniers;

// affichage de la vue
$view->show();

 ?>
