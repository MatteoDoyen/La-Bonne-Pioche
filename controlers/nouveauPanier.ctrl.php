<?php
session_start();
// Inclusion du modèle
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

  $view = new View("nouveauPanier.view.php");

  //$view->paniers=$toutLesPaniers;

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
