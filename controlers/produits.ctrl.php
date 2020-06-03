<?php
// Display tous les produits
// Inclusion du modèle
require_once('../model/Produit.class.php');
require_once('../model/ProduitDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

// Creation de l'instance DAO
$dao = new ProduitDAO();

// On créer une variable view que l'on rattache au fichier accueil.view.php
$view = new View("produits.view.php");

// Si on a clické sur une famille de produit dans la sidebar, alors la vfariable $_GET n'est plus vide
if (!empty($_GET)) {

  if ($_GET['famille'] === "tous") {
    $produits = $dao->getTousProduitsDunRayon($_GET['rayon']);
  } else {
    $produits= $dao->getTousProduitRayonsFamille($_GET['rayon'], $_GET['famille']);
  }
  $view->produits = $produits;
  $view->famille = $_GET['famille'];
  $view->rayon = $_GET['rayon'];


} else if (!empty($_POST)) {
  if ($_POST['search'] !== "") {
    $produits = $dao->getProduitsComprenant($_POST['search']);
    $view->produits = $produits;
  }
}

// On passe à la vue les informations liés au rayons et au nombre de prduits
$view->rayons =  $dao->getRayonsFamilles();
// Appel de la vue
$view->show();

?>
