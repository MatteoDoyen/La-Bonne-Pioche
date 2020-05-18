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
      <br><br><br><br><br><br>
      <figure>
        <img src="<?= $panier->image ?>">
      </figure>
      <?php foreach($composition as $prod) : ?>
        <figure>
          <a href="/La-Bonne-Pioche/controlers/produit.ctrl.php?id=<?= $prod->id ?>">
            <img src="<?= $prod->url_img ?>">
          </a>
          <figcaption>
            <prod-libelle><?= $prod->libelle?></prod-libelle>
            <prod-fabricant><?= $panier->fabricant?></prod-fabricant>
          </figcaption>
        </figure>

      <?php endforeach ?>
      <?php include("footer.php") ?>

    </div>

  </body>
</html>
