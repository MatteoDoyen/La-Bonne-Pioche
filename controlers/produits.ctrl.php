<?php
require_once("../framework/view.class.php");
require_once('../model/Produit.class.php');
require_once('../model/ProduitDAO.class.php');


// On créer une variable view que l'on rattache au fichier accueil.view.php
$view = new View('../view/produits.view.php');
// On l'affiche (cette méthode est défini dans le fichier ../framework/view.class.php).
$view->show();

?>
