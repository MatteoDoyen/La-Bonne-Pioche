<?php
// Inclusion du modèle
require_once('../model/Produit.class.php');
require_once('../model/ProduitDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

//Récupération des valeurs du formulaire


  echo "<ul>";
      foreach($_POST as $key => $value) {
        $$key = $value;
        echo "<li> <strong>$key</strong> : ", htmlentities($value), "</li>";
      }
  echo "</ul>";

// Creation de l'instance DAO
$catalogue = new ProduitDAO();

$catalogue->insertProduit($stock, $libelle, $fabricant, $rayon, $famille, $coef, $description,
      $origine, $caracteristiques, $prixU, $urlImg, $quantiteU, $unite, $active);

?>
