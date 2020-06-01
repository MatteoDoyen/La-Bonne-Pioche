<?php
// Inclusion du modèle
require_once('../model/PanierDAO.class.php');
require_once('../model/Panier.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

//Récupération des valeurs du formulaire

if(!isset($_POST['refPanier']))
{
    exit("Erreur : refPanier non définie");
}

$refPanier = $_POST['refPanier'];

$panierDao = new PanierDao();
//
$panier = $panierDao->get($refPanier);
//
$composition = $panierDao->getComposition($refPanier);

$view = new View("modifierPanier.view.php");

$view->panier = $panier;

$view->composition = $composition;

$view->show();

?>
