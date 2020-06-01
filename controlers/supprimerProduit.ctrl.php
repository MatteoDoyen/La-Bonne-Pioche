<?php

require_once('../model/ProduitDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

if(!isset($_POST['libelle']))
{
    exit("Erreur : libelle non définie");
}
if(!isset($_POST['refProduit']))
{
    exit("Erreur : refProduit non définie");
}



// Creation de l'instance DAO
$produitsDao = new ProduitDAO();

// Récupération des données à placer dans la vue à partir du modèle
$produits = $produitsDao->getAllActive();

$produitsDao->desactiverProduit($_POST['refProduit']);

// On créer une variable view que l'on rattache au fichier consulterProduits.view.php
$view = new View("consulterProduits.view.php");

$view->libelleSupprimer=$_POST['libelle'];

$view->produits=$produits;

$view->supprimer=1;
// Appel de la vue
$view->show();
?>
