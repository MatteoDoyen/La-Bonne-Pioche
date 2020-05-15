<?php
// Display un produit connu par son Id
// Inclusion du modèle
require_once('../model/Panier.class.php');
require_once('../model/PanierDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

// récupération des valeurs de la query string
if (isset($_GET['id'])) {
  $id = intVal($_GET['id']);
} else {
  exit("Erreur : id non défini");
}

// Creation de l'instance DAO
$catalogue = new PanierDAO();

// Récupération de l'objet produit correspondant à l'id
$panier = $catalogue->get($id);

///////// AJOUTE POUR MVC
$view = new View("panier.view.php");

// Passage des paramètres à la vue
$view->panier=$panier;

// Appel de la vue
$view->show();
?>
