<?php
// Display tous les produits
// Inclusion du modèle
require_once('../model/ProduitDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

// Creation de l'instance DAO
$produitsDao = new ProduitDAO();

// Récupération des données à placer dans la vue à partir du modèle
$produits = $produitsDao->getAllActive();

// On créer une variable view que l'on rattache au fichier accueil.view.php
$view = new View("consulterProduits.view.php");

// Envoie la liste des produits à la vue
$view->produits=$produits;

$view->supprimer=0;

// Appel de la vue
$view->show();
?>
