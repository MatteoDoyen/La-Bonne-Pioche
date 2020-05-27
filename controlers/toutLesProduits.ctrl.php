<?php
// Display tous les produits
// Inclusion du modèle
require_once('../model/Produit.class.php');
require_once('../model/ProduitDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

// Creation de l'instance DAO
$catalogue = new ProduitDAO();

$list = array();
// Récupération des données à placer dans la vue à partir du modèle
for($i=1; $i<$catalogue->getNbElements();$i++){
  // Récupération de l'objet Produit
  $p = $catalogue->get($i);
  // Ajout à la liste des images à afficher
  $list[] =$p;
}

// On créer une variable view que l'on rattache au fichier accueil.view.php
$view = new View("toutLesProduits.view.php");

// Envoie la liste des produits à la vue
$view->list=$list;

// Appel de la vue
$view->show();
?>
