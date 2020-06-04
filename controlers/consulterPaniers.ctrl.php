<?php
session_start();
// Display tous les produits
// Inclusion du modèle
require_once('../model/PanierDAO.class.php');
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
    $catalogue = new PanierDAO();

    // Récupération des données à placer dans la vue à partir du modèle
    $paniers = $catalogue->getAllActive();

    // On créer une variable view que l'on rattache au fichier accueil.view.php
    $view = new View("consulterPaniers.view.php");

    // Envoie la liste des produits à la vue
    $view->paniers=$paniers;

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


<!-- $mavariable = $_SESSION['Utilisateur'];

foreach ($mavariable as $key => $value) {
  echo "ma cle : $key et ma valeur : $value";
  echo"<br>";
} -->
