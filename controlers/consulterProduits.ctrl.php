<?php
session_start();
// Display tous les produits
// Inclusion du modèle
require_once('../model/ProduitDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

//Verification qu'un Utilisateur est connecté
if(isset($_SESSION['Utilisateur']))
{
  $statut=-1;
  foreach ($_SESSION['Utilisateur'] as $key => $value) {
    $$key = $value;
  }
    //Verification que l'Utilisateur est un employe
  if($statut>=0)
  {
    // Creation de l'instance DAO
    $produitsDao = new ProduitDAO();

    // Récupération des données à placer dans la vue à partir du modèle
    $produits = $produitsDao->getAllActive();

    // On créer une variable view que l'on rattache au fichier consulterProduits.view.php
    $view = new View("consulterProduits.view.php");

    // Envoie la liste des produits à la vue
    $view->produits=$produits;

    if(isset($tabLibellePaniers))
    {
      //si l'ont à recu un tabLibellePaniers alors l'Utilisateur à souhaité supprimer des $produits
      // qui sont encore dans des paniers, il doit dabord supprimer le produit de tout les paniers
      //cet variable contient le libelle des paniers dans lequel se trouve le produit
      $view->tabLibellePaniers = $tabLibellePaniers;
    }
    if(isset($supprimer))
    {
      //cet variable sert à vérifier si un produit à été supprimé
      // si oui un message apparaitra
      //j'aurai pu me contenter de libelleSupprimer, je n'ai pas le temps de tout refaire
      $view->supprimer=$supprimer;
    }
    else {
      //si rien n'a été supprimé alors la view envoie 0
      $view->supprimer=0;
    }

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
