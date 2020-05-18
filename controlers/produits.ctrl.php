<?php
require_once("../framework/view.class.php");
require_once("../model/DAO.class.php");

$dao = new DAO();

$types = $dao->getTypes();

// On créer une variable view que l'on rattache au fichier accueil.view.php
$view = new View('../view/produits.view.php');
// On passe à la vue la liste des Types
$view->types = $types;
// On l'affiche (cette méthode est défini dans le fichier ../framework/view.class.php).
$view->show();

?>
