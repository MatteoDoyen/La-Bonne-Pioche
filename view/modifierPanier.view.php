<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - PanierAchat</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/modifierPanier.view.css">
  </head>

      <body>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
        <?php include("navbarEmploye.template.php") ?>

        <h2 id="h2NvPanier" >Le <?= $panier->libelle ?></h2>
        <div class="container-fluid" id="container_all">
          <form id="form1" enctype="multipart/form-data" action="modifierPanierInsert.ctrl.php" method="post">
            <input id="idPanier" type="hidden" name="refPanier" value="<?= $panier->refPanier ?>">
            <input id="urlImg" type="hidden" name="urlImg" value="<?=$panier->image ?>">
            <div class="container_img3">
              <div class=" col-sm-6">
                <div id="imageUpload">
                  <img id="imgPreview" draggable="false" src="<?=$panier->image ?>">
                  <img id="btnSupprimer" draggable="false" src="../others/SVG/iconPlus.svg" alt="">
                  <img id="imgPlus" draggable="false" src="../others/SVG/iconPlus.svg" alt="">
                  <input id="inputImage" accept="image/jpeg,image/jpg, image/png, image/webp" tabindex="-1" type="file" name="imgPanier">
                </div>
                <div class="boutonEditionDiv">
                <button id="bouton_inputImage" type="button" name="button" onclick="editInputImage(this)" class="boutonEditionInputImage"><img src="../others/SVG/edit.svg" alt=""></button>
              </div>
                <p id="labelImage" >1 Mo maximum</p>
              </div>
            </div>

                <div class="doubleInput col-md-6">
                  <div class="">
                    <label for="libelle">Libelle</label><br>
                    <div class="input_bouton">
                    <input id="libelle" type="text" name="libelle" value="<?=$panier->libelle  ?>"  required readonly="true"><button id="bouton_libelle" class="boutonEditionInput" type="button" name="button"><img src="../others/SVG/edit.svg" alt=""></button>
                    </div>
                    <label for="nbBocaux">Nombre de bocaux</label><br>
                    <div class="input_bouton">
                    <input id="nbBocaux" type="number" name="nbBocaux" value="<?=$panier->nbBocaux ?>"  required readonly="true"><button id="bouton_nbBocaux" class="boutonEditionInput" type="button" name="button"><img src="../others/SVG/edit.svg" alt=""></button>
                    </div>
                  </div>
                  <div class="">
                      <label for="coefficient">Coefficient</label><br>
                      <div class="input_bouton">
                      <input  id="coefficient" type="number" name="coefficient" value="<?=$panier->coefficient ?>" step="0.01" required readonly="true"><button id="bouton_coefficient" class="boutonEditionInput" type="button" name="button"><img src="../others/SVG/edit.svg" alt=""></button>
                      </div>
                      <label for="prix">Prix</label><br>
                      <div class="input_bouton">
                        <input  id="prix" type="number" name="prix" value="<?=$panier->prix ?>" step="0.01" required readonly="true"><button id="bouton_prix" class="boutonEditionInput" type="button" name="button"><img src="../others/SVG/edit.svg" alt=""></button>
                      </div>

                  </div>
                </div>

            <h2 class="text-center mt-3 mb-2">Composition du panier</h2>
            <div class="boutonEditionDiv container col-6">
                <button type="button" name="button" onclick="editInputCompo(this)" class="boutonEditionInputCompo"><img src="../others/SVG/edit.svg" alt=""></button>
            </div>

            <div class="mt-2 produitsPaniers container col-6 ">
              <div class="cacheProduit"></div>
              <div  id="compositionPanier">
                <?php foreach ($composition as $key => $produit):

                  $key = explode(' ',$key);
                  ?>
                  <figure class="container" id="produit_<?= $produit->refProduit ?>" >
                    <div class="row container_row">
                      <div class="row_image">
                        <img class="img_search" src="<?= $produit->urlImg ?>">
                      </div>
                      <div class="col-xs-1 col-sm-2 compo-txt-prod">
                        <p><?= $produit->libelle ?></p>
                      </div>
                      <div class="col-xs-4 compo-txt-origin">
                        <p class="qteProd"><span id="valeurQute_<?= $produit->refProduit ?>"><?= $key[1] ?> x </span><?=(int) $produit->quantiteU ?> <?=$produit->unite ?></p>
                        <p id="boutonPlus_<?= $produit->refProduit  ?>" class="boutonPlusProd" onclick="ajouterUniteProd(this)">+</p>
                        <?php if ($key[1]>1): ?>
                          <p id="boutonMoins_<?= $produit->refProduit  ?>" class="boutonMoinsProd" onclick="supprimerUniteProd(this)">-</p>
                        <?php endif; ?>
                      </div>
                      <div class="col-xs-4 col-sm-6 col-md-3 compo-txt-origin">
                        <p><?= $produit->fabricant ?></p>
                      </div>
                      <div class="col-lg-1 boutonAjout">
                        <button id="boutonAjout_<?= $produit->refProduit ?>" type="button" onclick="supprimerProduitCompo(this)" >x</button>
                      </div>
                    </div>
                    <hr>
                    <input id="input_<?= $produit->refProduit ?>" name="prod[]" type="hidden" value="<?= $produit->refProduit ?>_1">
                  </figure>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="custom-control custom-checkbox mr-sm-2">
              <label for="active">Panier activé</label>
              <?php if ($panier->active==1): ?>
                <input type="checkbox" name="active" value="1" id="active" checked/>
              <?php endif; ?>
              <?php if ($panier->active!=1): ?>
                <input type="checkbox" name="active" value="1" id="active" />
              <?php endif; ?>

            </div>
            </form>
            <div id="container_recherche" class="mt-5 mb-2 col-6 d-flex justify-content-center align-items-center p-0">
              <input type="search" class="w-100" id="rechercheProduit" name="produit" aria-label="Chercher des produits" placeholder="Taper un nom de produit ou un fabricant" >
            </div>


                <div class="produitsPaniers container col-6">
                  <div class="cacheProduit"></div>
                  <div id="toutLesProduits">
                </div>
              </div>

              <button id="boutonSubmit" type="button" >Modifier</button>
        </div>
          <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
          <script type="text/javascript" src="../view/js/modifierPanier.view.js"></script>

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
