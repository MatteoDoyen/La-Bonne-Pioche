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

// Récupération de l'objet panier correspondant à l'id
$panier = $catalogue->get($id);
//$compo = $catalogue->getComposition($id);

///////// AJOUTE POUR MVC
$view = new View("panier.view.php");

// Passage des paramètres à la vue
$view->panier=$panier;
$view->composition=$composition;

// Appel de la vue
$view->show();
?>
