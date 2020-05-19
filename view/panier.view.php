<!DOCTYPE html>
<!--
//$somme=0;
//foreach ($composition as $key => $prod) {
  //$key = explode(' ',$key);

//  $somme+=$prod->prix_u*$key[1]*$panier->nbpersonne;
}

 ?> -->
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - Nous</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/panier.view.css">
  </head>
  <body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>

    <div class="container-fluid">
      <?php include("navbar.php") ?>


      <figure>
        <h2 class="text-center titre_panier">Le <?php echo"$panier->libelle"; ?></h1>
        <div class="bigcontainer col-sm-6 col-md-6 col-lg-6">
          <div class="container_img">
            <img class="mx-auto d-block" src="<?= $panier->image ?>">
          </div>
            <?php if($panier->nb_Bocaux>0): ?>
            <p class="text"><?= $panier->nb_Bocaux ?> x <img class="bocal" src="../others/SVG/bocal.svg" alt=""></p>
            <?php endif; ?>
        </div>
      </figure>
      <div class="container container_commande">
        <div class="row">
          <div class="prix col-md-4 col-lg-4">
            <div class="">
              <p><?= $panier->prix?>/€</p>
              <button type="button" name="button"><img src="../others/SVG/iconuser.svg" alt=""></button>
              <button type="button" name="button"><img src="../others/SVG/user-gris.svg" alt=""></button>
            </div>
          </div>
          <div class="separation d-none d-sm-block col-sm-1 col-md-1 col-lg-1">
            <img src="../others/SVG/separateur.svg" alt="">
          </div>
          <div class="nombre_panier col-md-6 col-lg-4">
            <div class="ajoutpanier">
              <div class="bouton_legende_panier">
                <p>Nombre de panier</p>
                <div class="bouton_panier">
                  <button type="button" name="button">-</button>
                  <input type="text" name="" value="1">
                  <button type="button" name="button">+</button>
                </div>
              </div>
              <p class="panier">Ajouter <img src="..\others\SVG\panierachat.svg" alt=""> </p>
            </div>
          </div>
        </div>
      </div>
      <h2 class="text-center pb-5">Composition</h2>
      <?php foreach($composition as $key => $prod) :
        $key = explode(' ',$key);
        ?>

        <figure class="container">
          <div class="row container_row">
            <a class ="col-xs-1 col-sm-1 col-lg-1" href="/La-Bonne-Pioche/controlers/produit.ctrl.php?id=<?= $prod->id ?>">
              <img class="produit_img" src="<?= $prod->url_img ?>">
            </a>
            <div class="col-xs-1 col-sm-3 col-md-3 col-lg-3 compo-txt-prod">
                <p><?= $prod->libelle?></p>
            </div>
            <div class="col-xs-4 col-sm-3 col-md-3 col-lg-2 compo-txt-origin">
                <p><?php echo"$key[1] x $prod->quantite_u $prod->unite"; ?></p>
            </div>
            <div class="col-xs-4 col-sm-6 col-md-3 col-lg-6 compo-txt-origin">
                <p><?= $prod->fabricant ?></p>
            </div>
          </div>
        </figure>
        <hr>
      <?php endforeach ?>
      <?php include("footer.php") ?>

    </div>

  </body>
</html>
