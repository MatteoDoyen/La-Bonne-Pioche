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

// on vérifie si l'utilisateur viens de la page produit.view.php, si c'est le cas
// alors le bouton retour le raménera sur la page panier
// RAISON : Sans cela l'utilisateur pourrait passer de panier à produit en boucle en appuyant sur retour


$vienDePageProduit = false;
$url = parse_url($_SERVER['HTTP_REFERER'],PHP_URL_PATH);
if(strpos($url,'/')>=0)
{
  $url = explode('/',$url);
  $vienDePageProduit = in_array('produit.ctrl.php',$url);
}

// Creation de l'instance DAO
$catalogue = new PanierDAO();

// Récupération de l'objet panier correspondant à l'id
$panier = $catalogue->get($refPpanier);

$composition = $catalogue->getComposition($refPpanier);
//$compo = $catalogue->getComposition($refPanier);

// ///////// AJOUTE POUR MVC
$view = new View("panier.view.php");

// // Passage des paramètres à la vue
$view->panier=$panier;
$view->composition=$composition;

$view->vienDePageProduit = $vienDePageProduit;
// // Appel de la vue
$view->show();
?>
