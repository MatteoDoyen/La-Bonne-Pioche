<?php
// Display un produit connu par son Id
// Inclusion du modèle
require_once('../model/Utilisateur.class.php');
require_once('../model/UtilisateurDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

// récupération des valeurs de la query string
if (isset($_GET['id'])) {
  $id = intVal($_GET['id']);
} else {
  exit("Erreur : id non défini");
}

// Creation de l'instance DAO
$annuaire = new UtilisateurDAO();

// Récupération de l'objet utilisateur correspondant à l'id
$utilisateur = $annuaire->get($id);

///////// AJOUTE POUR MVC
$view = new View("utilisateur.view.php");

// Passage des paramètres à la vue
$view->utilisateur=$utilisateur;

// Appel de la vue
$view->show();
?>
