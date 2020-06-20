<?php
session_start();
// Display tous les produits
// Inclusion du modèle
require_once('../model/Commande.class.php');
require_once('../model/CommandeDAO.class.php');
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
$commandes = new commandeDAO();

// Récupération des données à placer dans la vue à partir du modèle
$list = $commandes->getCmdEnCours();

// On créer une variable view que l'on rattache au fichier accueil.view.php
$view = new View("../view/commandes.view.php");

// Envoie la liste des produits à la vue
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
