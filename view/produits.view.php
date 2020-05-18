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

      <?php include("../view/navbar.php") ?>
      
      <?php foreach($list as $produit) :  ?>
        <figure>
          <a href="/La-Bonne-Pioche/controlers/produit.ctrl.php?id=<?= $produit->id ?>">
            <img src="<?= $produit->url_img ?>" />
          </a>
          <figcaption>
            <produit-libelle><?= $produit->libelle?></produit-libelle>
            <produit-fabricant><?= $produit->fabricant?></produit-fabricant>
          </figcaption>
        </figure>
        <?php endForeach; ?>

      <?php include("../view/footer.php") ?>

    </div>

  </body>
</html>
