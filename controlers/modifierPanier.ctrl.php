<?php
session_start();
// Inclusion du modèle
require_once('../model/PanierDAO.class.php');
require_once('../model/Panier.class.php');
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
  if(!isset($_POST['refPanier']))
  {
      exit("Erreur : refPanier non définie");
  }

  $refPanier = $_POST['refPanier'];

  $panierDao = new PanierDao();

  $panier = $panierDao->get($refPanier);

  $composition = $panierDao->getComposition($refPanier);

  $view = new View("modifierPanier.view.php");

  $view->panier = $panier;

  $view->composition = $composition;

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
