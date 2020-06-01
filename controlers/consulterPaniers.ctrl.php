<?php
// Display tous les produits
// Inclusion du modèle
require_once('../model/PanierDAO.class.php');
require_once('../model/PanierDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

// Creation de l'instance DAO
$catalogue = new PanierDAO();

// Récupération des données à placer dans la vue à partir du modèle
$paniers = $catalogue->getAllActive();

// On créer une variable view que l'on rattache au fichier accueil.view.php
$view = new View("consulterPaniers.view.php");

// Envoie la liste des produits à la vue
$view->paniers=$paniers;

$view->supprimer=0;

// Appel de la vue
$view->show();
?>
