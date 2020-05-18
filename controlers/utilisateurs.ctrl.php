<?php
// Display tous les produits
// Inclusion du modèle
require_once('../model/Utilisateur.class.php');
require_once('../model/UtilisateurDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

// Creation de l'instance DAO
$annuaire = new UtilisateurDAO();

$list = array();
// Récupération des données à placer dans la vue à partir du modèle
for($i=1; $i<$annuaire->getNbElements();$i++){
  // Récupération de l'objet Utilisateur
  $p = $annuaire->get($i);
  // Ajout à la liste des informations à afficher
  $list[] =$p;
}

// On créer une variable view que l'on rattache au fichier accueil.view.php
$view = new View("utilisateurs.view.php");

// Envoie la liste des utilisateurs à la vue
$view->list=$list;

// Appel de la vue
$view->show();
?>
