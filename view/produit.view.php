<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - Nous</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/produit.view.css">
  </head>
  <body>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>

    <div class="container-fluid">

      <?php include("navbar.php") ?>
      <a href="<?= $_SERVER['HTTP_REFERER']  ?>" class="boutonretour">
        <img src="../others/SVG/flechegauche.svg" alt=""> Retour
      </a>
      <div class="container container_img_desc">
        <figure class="container_img d-inline-block">
          <img src="<?= $produit->url_img ?>">
        </figure>
        <div class="bloc_droit">
          <h2><?= $produit->libelle  ?> : </h2>
          <p><?= $produit->description ?></p>
        </div>
      </div>
      <div class="container container_info">
        <h3>Fabricant : </h3><p><?= $produit->fabricant  ?></p>
        <h3>Origine : </h3><p><?= $produit->origine  ?></p>

      </div>
      <?php include("footer.php") ?>

    </div>

  </body>
</html>
