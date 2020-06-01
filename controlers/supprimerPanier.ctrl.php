<?php

require_once('../model/PanierDAO.class.php');
require_once('../model/PanierDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

if(!isset($_POST['libelle']))
{
    exit("Erreur : libelle non définie");
}
if(!isset($_POST['refPanier']))
{
    exit("Erreur : refPanier non définie");
}



// Creation de l'instance DAO
$catalogue = new PanierDAO();

$catalogue->desactiverPanier($_POST['refPanier']);

// Récupération des données à placer dans la vue à partir du modèle
$paniers = $catalogue->getAllActive();

// On créer une variable view que l'on rattache au fichier accueil.view.php
$view = new View("consulterPaniers.view.php");

$view->libelleSupprimer=$_POST['libelle'];

$view->paniers=$paniers;

$view->supprimer=1;
// Appel de la vue
$view->show();
?>
