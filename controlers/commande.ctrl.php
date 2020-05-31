<?php
// Inclusion du modèle
require_once('../model/Commande.class.php');
require_once('../model/CommandeDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

// récupération des valeurs de la query string
if (isset($_GET['refCommande'])) {
  $refCommande = intVal($_GET['refCommande']);
} else {
  exit("Erreur : refCommande non définie");
}

// Creation de l'instance DAO
$catalogue = new commandeDAO();

// Récupération de l'objet panier correspondant à l'id
$commande = $catalogue->get($refCommande);

$descriptif = $catalogue->getComposition($refCommande);

///////// AJOUTE POUR MVC
$view = new View("../view/commande.view.php");

// Passage des paramètres à la vue
$view->commande=$commande;
$view->descriptif=$descriptif;

// Appel de la vue
$view->show();
?>
