<?php
session_start();
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
//Récupération des valeurs du formulaire

      foreach($_POST as $key => $value) {
        $$key = $value;
      }
// Creation de l'instance DAO
    $view = new View("nouveauProduit.view.php");
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
