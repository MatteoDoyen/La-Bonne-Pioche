<?php
// Display un produit connu par son Id
// Inclusion du modèle
require_once('../model/Produit.class.php');
require_once('../model/ProduitDAO.class.php');

// récupération des valeurs de la query string
if (isset($_GET['id'])) {
  $id = intVal($_GET['id']);
} else {
  exit("Erreur : id non définit");
}

// Creation de l'instance DAO
$catalogue = new ProduitDAO();

// Récupération de l'objet produit correspondant à l'id
$produit = $catalogue->get($id);
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - Nous</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/nous.view.css">
  </head>
  <body>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>

    <div class="container-fluid p-0">

      <?php include("navbar.php") ?>
      <br><br><br><br><br><br><br>
      <figure>
        <img src="<?= $produit->url_img ?>">
      </figure>


      <?php include("footer.php") ?>

    </div>

  </body>
</html>
