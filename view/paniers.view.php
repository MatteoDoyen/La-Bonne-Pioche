<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - Nous</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/paniers.view.css">
  </head>
  <body>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
    <div class="container-fluid">
      <?php include("../view/navbar.php") ?>

      <div class="container">
        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1">
          <div class="col">Essai</div>
          <div class="col">Essai</div>
          <div class="col">Essai</div>
          <div class="col">Essai</div>
          <div class="col">Essai</div>
        </div>
      </div>
      <?php foreach($list as $panier) :  ?>
        <figure>
          <a href="/La-Bonne-Pioche/controlers/panier.ctrl.php?id=<?= $panier->id_Panier ?>">
            <img src="<?= $panier->image ?>" />
          </a>
          <figcaption>
            <panier-libelle><?= $panier->libelle?></panier-libelle>
            <panier-prix><?= $panier->prix?>€</panier-prix>
          </figcaption>
        </figure>
        <?php endForeach; ?>
      <?php include("../view/footer.php") ?>

    </div>

  </body>
</html>
