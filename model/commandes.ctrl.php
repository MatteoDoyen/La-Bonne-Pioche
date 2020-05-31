<?php
// Display tous les produits
// Inclusion du modèle
require_once('../model/Commande.class.php');
require_once('../model/CommandeDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

// Creation de l'instance DAO
$catalogue = new commandeDAO();

// Récupération des données à placer dans la vue à partir du modèle
$list = $catalogue->getAllActive();

// On créer une variable view que l'on rattache au fichier accueil.view.php
$view = new View("commandes.view.php");

// Envoie la liste des produits à la vue
$view->list=$list;

// Appel de la vue
$view->show();
?>
