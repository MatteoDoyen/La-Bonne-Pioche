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
    <?php include("../view/navbar.php") ?>
    <div class="container-fluid">

      <div class="container">
        <h2 class="h2_paniers">Nos paniers : </h2>
        <div class="row justify-content-between">
          <?php foreach($list as $panier) :  ?>
            <div class="col-lg-4 container_all">
              <div class="container_img_text">
                <div class="container_img">
                  <a href="/La-Bonne-Pioche/controlers/panier.ctrl.php?refPanier=<?= $panier->refPanier ?>">
                  <img src="<?= $panier->image  ?>" alt="">
                  </a>
                </div>
                <a href="/La-Bonne-Pioche/controlers/panier.ctrl.php?refPanier=<?= $panier->refPanier ?>">
                  <img class="icon_panier" src="../others/SVG/<?= $panier->refPanier ?>.svg" alt="">
                  <p><?= $panier->libelle ?></p>
                </a>
              </div>
              <div class="container_info">
                <p class="description">Petite description du panier indiquant quantité et composition</p>
                <div class="nombre_panier">
                  <p><?= $panier->prix ?> € /</p>
                  <button type="button" name="button"> <img src="../others/SVG/iconuser.svg" alt=""> </button>
                  <button type="button" name="button"> <img src="../others/SVG/user-gris.svg" alt=""> </button>
                </div>
                <div class="commande">
                  <button type="button" name="button">Ajouter <img src="../others/SVG/panierachat.svg" alt=""> </button>
                  <div class="bouton_panier">
                    <button type="button" name="button">-</button>
                    <input type="text" name="" value="1">
                    <button type="button" name="button">+</button>
                  </div>
                </div>
                <a href="#">
                  <p class="plus_information">+ D'informations</p>
                </a>
              </div>
            </div>
          <?php endForeach; ?>
        </div>
      </div>
    </div>
    <?php include("../view/footer.php") ?>

  </body>
</html>
