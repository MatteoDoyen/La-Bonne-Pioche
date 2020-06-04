<?php
session_start();
// Display tous les produits
// Inclusion du modèle
require_once('../model/Produit.class.php');
require_once('../model/ProduitDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

if(isset($_SESSION['Utilisateur']))
{
  $statut=-1;
  foreach ($_SESSION['Utilisateur'] as $key => $value) {
    $$key = $value;
  }
  if($statut>=0)
  {
    // Creation de l'instance DAO
    $produitDAO = new ProduitDAO();

    //Récupération de tout les produits actif
    $list = $produitDAO->getAllActive();


    // On créer une variable view que l'on rattache au fichier toutLesProduits.view.php
    $view = new View("tousLesProduits.view.php");

    //on envoie tout les produits à cette vu qui les affichera sous le format json
    $view->list=$list;

    // Appel de la vue
    $view->show();

  }
  else {
    exit("Il faut être employé pour pouvoir accèder à cet page");
  }
  }

  else {
  exit("Il faut être connecté et employé pour pouvoir accèder à cet page");
  }

?>
