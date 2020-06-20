<!DOCTYPE html>
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

      <?php include("navbar.php") ?>
    <div class="container-fluid">

      <?php if($vienDePageProduit): ?>
        <a href="../controlers/paniers.ctrl.php" class="boutonretour">
          <img src="../others/SVG/flechegauche.svg" alt=""> Retour
        </a>
      <?php endif; ?>
      <?php if(!$vienDePageProduit): ?>
        <a href="<?=$_SERVER['HTTP_REFERER']?>" class="boutonretour">
          <img src="../others/SVG/flechegauche.svg" alt=""> Retour
        </a>
      <?php endif; ?>

      <figure>
        <h2 class="text-center h2_panier">Le <?php echo"$panier->libelle"; ?></h1>
        <div class="bigcontainer col-6">
          <div class="container_img">
            <img class="mx-auto d-block" src="<?= $panier->image ?>">
          </div>
            <?php if($panier->nbBocaux>0): ?>
            <p class="text"><?= $panier->nbBocaux ?> x <img class="bocal" src="../others/SVG/bocal.svg" alt=""></p>
            <?php endif; ?>
        </div>
      </figure>
      <div class="container container_commande">
        <div class="row">
          <div class="prix col-4">
            <div class="container_prix">
              <div class="prix_button">
                <p id="affichePrix" ><?= $panier->prix?>/€</p>
                <button class="iconUtilisateur" type="button" name="button"><img src="../others/SVG/iconuser.svg" alt=""></button>
                <button id="plusUtilisateur" type="button" name="button" ><img src="../others/SVG/user-gris.svg" alt=""></button>
                <button id="moinUtilisateur" type="button" name="button" ><img src="../others/SVG/user-gris-moin.svg" alt=""></button>
                <input id="coeffPanier" type="hidden" value="<?= $panier->coefficient ?>">
                <input id="inputPrix" type="hidden" value="<?= $panier->prix ?>">
              </div>
              <p id="nb_personne_panier" >Panier pour 1</p>
            </div>

          </div>
          <div class="separation col-1">
            <img class="" src="../others/SVG/separateur.svg" alt="">
          </div>
          <div class="nombre_panier col-md-6 col-lg-4">
            <div class="ajoutpanier">
              <div class="bouton_legende_panier">
                <p>Nombre de panier</p>
                <div class="bouton_panier">
                  <button id="boutonMoins" type="button" name="button">-</button>
                  <input id="nombrePanierCommande" type="number" min="1" max="10" name="" value="1">
                  <button id="boutonPlus" type="button" name="button">+</button>
                </div>
              </div>
              <a href="#">
              <p class="panier">Ajouter <img src="..\others\SVG\panierachat.svg" alt=""> </p>
              </a>
            </div>
          </div>
        </div>
      </div>
      <h2 class="text-center h2_panier2 pb-2">Composition</h2>
      <?php foreach($composition as $key => $prod) :
        //On explose la clé pour récupérer la quantité de chaque produit dans le panier, la clé est composé comme ceci tab["id quantité"], une fois la clé explosé il nous faut donc le deuxieme indice du tableau récupéré
        $key = explode(' ',$key);
        //on utilise la fonction floor pour ne plus avoir de décimal après le chiffre, les quantité unitaire sont toujours des int : cela sera inutile si l'ont type les arguments du constructeur panier
        $quantite = floor($prod->quantiteU);
        ?>

        <figure class="container test">
          <div class="row container_row">
            <a class ="lien_img col-1" href="../controlers/produit.ctrl.php?refProduit=<?= $prod->refProduit ?>">
              <img src="<?= $prod->urlImg ?>">
            </a>
            <div class="col-xs-1 col-3 compo-txt-prod">
                <p><?= $prod->libelle?></p>
            </div>
            <div class="col-xs-4 col-sm-3 col-2 compo-txt-origin">
                <!-- ici l'indice 1 de $key correspond à la quantité du produit dans le panier -->
                <p><?php echo"$key[1] x $quantite $prod->unite"; ?></p>
            </div>
            <div class="col-md-3 col-12 compo-txt-origin">
                <p><?= $prod->fabricant ?></p>
          </div>
        </figure>
        <hr>
      <?php endforeach ?>
    </div>
    <?php include("footer.php") ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript"  src="../view/js/panier.view.js"></script>
  </body>
</html>
