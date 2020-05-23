<?php
// Display un produit connu par son Id
// Inclusion du modèle
require_once('../model/Panier.class.php');
require_once('../model/PanierDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

// récupération des valeurs de la query string
if (isset($_GET['refPanier'])) {
  $refPpanier = intVal($_GET['refPanier']);
} else {
  exit("Erreur : refPanier non définie");
}

// Creation de l'instance DAO
$catalogue = new PanierDAO();

// Récupération de l'objet panier correspondant à l'id
$panier = $catalogue->get($refPpanier);

$composition = $catalogue->getComposition($refPpanier);
//$compo = $catalogue->getComposition($refPanier);

///////// AJOUTE POUR MVC
$view = new View("panier.view.php");

// Passage des paramètres à la vue
$view->panier=$panier;
$view->composition=$composition;

// Appel de la vue
$view->show();
?>
