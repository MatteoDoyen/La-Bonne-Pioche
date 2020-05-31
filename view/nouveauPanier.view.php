<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - PanierAchat</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/nouveauPanier.view.css">
  </head>

      <body>
        <?php include("../view/navbar.php") ?>
        <h2 id="h2NvPanier" >Ajouter un nouveau panier</h2>
        <div class="container-fluid" id="container_all">
          <form id="form1" enctype="multipart/form-data" action="nouveauPanierInsert.ctrl.php" method="post">
            <div class="container_img3">
              <div class=" col-sm-6">
                <div id="imageUpload">
                  <img id="imgPreview">
                  <img id="btnSupprimer" draggable="false" src="../others/SVG/iconPlus.svg" alt="">
                  <img id="imgPlus" draggable="false" src="../others/SVG/iconPlus.svg" alt="">
                  <input id="inputImage" accept="image/jpeg,image/jpg, image/png, image/webp" tabindex="-1" type="file" name="imgPanier" required>
                </div>
                <p id="labelImage" >1 Mo maximum</p>
              </div>
            </div>

                <div class="doubleInput col-md-6">
                  <div class="">
                    <input  type="text" name="libelle" value="" placeholder="libelle *" required>
                    <input  type="number" name="nbBocaux" value="" placeholder="nombre de bocaux *" required>
                  </div>
                  <div class="">
                      <input  type="number" name="coefficient" value="" step="0.01" placeholder="coefficient *" required>
                      <input  type="number" name="prix" value="" step="0.01" placeholder="prix *" required>
                  </div>
                </div>

            <h2 class="text-center mt-3 mb-2">Composition du panier</h2>
            <div id="compositionPanier" class="container col-6 ">
            </div>
            </form>
            <div id="container_recherche" class="mt-5 mb-2 col-6 d-flex justify-content-center align-items-center p-0">
              <input type="search" class="w-100" id="rechercheProduit" name="produit" aria-label="Chercher des produits" placeholder="Taper un nom de produit ou un fabricant" >
            </div>

              <div id="toutLesProduits" class="container col-6">
              </div>
              <div class="custom-control custom-checkbox mr-sm-2">
                <label for="active">Article achetable</label>
                <input type="checkbox" name="active" value="1" id="active" />
              </div>
              <button id="boutonSubmit" type="button" >Envoyer</button>
        </div>
          <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
          <script type="text/javascript" src="../view/js/nouveauPanier.view.js"></script>

    <?php include("../view/footer.php") ?>
  </body>

</html>

<!-- <figure class="container" id="produit_'+elt.refProduit+'" >
  <div class="row container_row"><img class="img_search" src="'+elt.url+'">
    <div class="col-xs-1 col-sm-2 compo-txt-prod">
      <p>'+elt.name+'</p>
    </div>
    <div class="col-xs-4 col-sm-3 col-lg-2 compo-txt-origin">
      <p>'+elt.quantite+' '+elt.unite+'"</p>
    </div>
    <div class="col-xs-4 col-sm-6 col-md-3 col-lg-6 compo-txt-origin">
      <p>'+elt.fabricant+'</p>
    </div>
    <div class="col-lg-2">
      <button id="boutonAjout_'+elt.refProduit+'" type="button" onclick="ajoutProduitCompo(this)" >+</button>
    </div>
  </div>
</figure> -->
<!--

<button class="boutonPlusProd" type="button" name="button">+</button><button class="boutonMoinProd" type="button" name="button">-</button> -->
