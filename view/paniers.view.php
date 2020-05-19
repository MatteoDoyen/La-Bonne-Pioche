<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - Nous</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/paniers.view.css">
    <link rel="stylesheet" href="../view/css/paniers.css">

  </head>
  <body>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
    <?php include("../view/navbar.php") ?>
    <div class="container-fluid row">


      <?php foreach($list as $panier) :  ?>
        <figure class="col col-lg-3">
          <div class="container_img">
            <a href="/La-Bonne-Pioche/controlers/panier.ctrl.php?id=<?= $panier->id_Panier ?>" >
              <img class="image_entete mx-auto d-block"src="<?= $panier->image ?>"  />
            </a>
          </div>

          <figcaption>
            <div class="categ" >
              <img  src="../Ressources/images/biere.svg" alt=""><br>
            </div>
            <panier-libelle><?= $panier->libelle?></panier-libelle>
            <p>Petite description du panier indiquant quantité et composition</p>
            <div>
              <panier-prix><?= $panier->prix?>€ / </panier-prix>
              <img id="solo" src="../Ressources/images/userRed.svg" alt="">
              <img id="duo" src="../Ressources/images/couple.svg" alt="">
              <img id="famille" src="../Ressources/images/famille.svg" alt="">
            </div>
            <div class="ajout_panier">
              <button id="ajout" type="button" name="AjouterPanier">Ajouter <img src="../Ressources/images/panierachat.svg" alt=""> </button>
                <button .class="modifier" type="button" name="moins"> - </button>
                <input type="number" name="" value="1">
                <button .class="modifier" type="button" name="plus"> + </button>
            </div>
            <a href="#" class="infos">+ D'informations</a>

          </figcaption>
        </figure>
        <?php endForeach; ?>


    </div>

    <?php include("../view/footer.php") ?>

  </body>
</html>
