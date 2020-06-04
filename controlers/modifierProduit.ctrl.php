<?php
session_start();
// Inclusion du modèle
require_once('../model/ProduitDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

//Récupération des valeurs du formulaire
if(isset($_SESSION['Utilisateur']))
{
  $statut=-1;
  foreach ($_SESSION['Utilisateur'] as $key => $value) {
    $$key = $value;
  }
  if($statut>=0)
  {
  if(!isset($_POST['refProduit']))
  {
      exit("Erreur : refProduit non définie");
  }

  $refProduit = $_POST['refProduit'];

  $produitDao = new ProduitDAO();
  //
  $produit = $produitDao->get($refProduit);
  //

  $view = new View("modifierProduit.view.php");

  $view->produit = $produit;

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
