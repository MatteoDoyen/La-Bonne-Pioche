<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - PanierAchat</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/modifierProduit.view.css">
  </head>
      <body>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
        <?php include("navbarEmploye.template.php") ?>
        <h2 id="h2NvPanier" ><?= $produit->libelle ?></h2>
        <div class="container">
        <form action="modifierProduitInsert.ctrl.php" method="post" enctype="multipart/form-data">
          <input id="IdProduit" type="hidden" name="refProduit" value="<?= $produit->refProduit ?>">
          <input id="urlImg" type="hidden" name="urlImg" value="<?=$produit->urlImg ?>">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-6 inputGauche">
              <div id="imageUpload">
                <img id="imgPreview" draggable="false" src="<?= $produit->urlImg ?>" alt="image du produit">
                <img id="btnSupprimer" draggable="false" src="../others/SVG/iconPlus.svg" alt="">
                <img id="imgPlus" draggable="false" src="../others/SVG/iconPlus.svg" alt="">
                <input id="inputImage" accept="image/jpeg,image/jpg, image/png, image/webp" tabindex="-1" type="file" name="imgProduit">
              </div>
              <div class="boutonEditionDiv">
              <button id="bouton_inputImage" type="button" name="button" onclick="editInputImage(this)" class="boutonEditionInputImage"><img src="../others/SVG/edit.svg" alt=""></button>
            </div>
              <p id="labelImage" >1 Mo maximum</p>
              <div class="input_bouton">
              <input type="text" id="libelle" name="libelle" placeholder="libelle *" value="<?= $produit->libelle ?>" required readonly="true"><button id="bouton_libelle" class="boutonEditionInput" type="button"><img src="../others/SVG/edit.svg" alt=""></button>
            </div>
            <div class="input_bouton">
              <input type="text" id="fabricant" name="fabricant" placeholder="fabricant *" value="<?= $produit->fabricant ?>" required readonly="true"><button id="bouton_fabricant" class="boutonEditionInput" type="button" ><img src="../others/SVG/edit.svg" alt=""></button>
            </div>
              <div class="input_bouton">
              <input type="text" id="rayon" name="rayon" placeholder="rayon *" value="<?= $produit->rayon ?>" required readonly="true"><button id="bouton_rayon" class="boutonEditionInput" type="button" ><img src="../others/SVG/edit.svg" alt=""></button>
            </div>
              <div class="input_bouton">
              <input type="text" id="famille" name="famille" placeholder="famille *" value="<?= $produit->famille ?>" required readonly="true"><button id="bouton_famille" class="boutonEditionInput" type="button" ><img src="../others/SVG/edit.svg" alt=""></button>
            </div>
              <div class="input_bouton">
              <input type="number" id="coef" step="0.1" name="coef" placeholder="coefficient multiplicateur *" value="<?= $produit->coef ?>" required readonly="true"><button id="bouton_coef" class="boutonEditionInput" type="button"><img src="../others/SVG/edit.svg" alt=""></button>
            </div>

              <div class="doubleInput">
                <div class="">
                  <label for="prixU">Prix Unitaire :</label><br>
                  <div class="input_bouton">
                  <input type="number" id="prixU" step="0.01" name="prixU" value="<?= $produit->coef ?>" required readonly><button id="bouton_prixU" class="boutonEditionInput" type="button"><img src="../others/SVG/edit.svg" alt=""></button>
                  </div>
                </div>
                <div class="0">
                  <label for="quantiteU">Quantité Unitaire :</label><br>
                  <div class="input_bouton">
                  <input type="number" id="quantiteU" step="0.01" name="quantiteU"value="<?= $produit->quantiteU ?>" required readonly><button id="bouton_quantiteU" class="boutonEditionInput" type="button"><img src="../others/SVG/edit.svg" alt=""></button>
                  </div>
                </div>
              </div>
              <div class="doubleInput">
                <div class="">
                  <label for="unite">Unité *:</label><br>
                  <select id="unite" required size="1" name="unite">
                      <option value="" disabled selected>Unité</option>
                      <option value="Gramme(s)">Gramme(s)</option>
                      <option value="Kilos">Kilos</option>
                      <option value="Pièce(s)">Pièce(s)</option>
                  </select>
                </div>
                <div class="">
                  <label for="stock">Quantité en stock *:</label><br>
                  <div class="input_bouton">
                  <input type="number" id="stock" name="stock" value="<?= $produit->stock ?>" required readonly><button id="bouton_stock" class="boutonEditionInput" type="button"><img src="../others/SVG/edit.svg" alt=""></button>
                  </div>
                </div>
              </div>
              <div class="custom-control custom-checkbox mr-sm-2">
                <label for="active">Article actif</label>
                     <input type="checkbox" name="active" value="1" id="active" checked />
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
              <div class="boutonEditionText">
              <button id="bouton_description" type="button" name="button" onclick="editerInput(this)" class="boutonEditionText"><img src="../others/SVG/edit.svg" alt=""></button>
              <label for="description">Description :</label><br>
            </div>
              <textarea  id="description" name="description" rows="5" cols="33" readonly><?= $produit->description ?></textarea><br>
              <div class="boutonEditionText">
              <button id="bouton_caracteristiques" type="button" name="button" onclick="editerInput(this)" class="boutonEditionText"><img src="../others/SVG/edit.svg" alt=""></button>
              <label for="caracteristiques">Caractéristiques :</label><br>
            </div>
              <textarea  id="caracteristiques" name="caracteristiques" rows="5" cols="33" readonly><?= $produit->caracteristiques ?></textarea>
              <div class="boutonEditionText">
              <button id="bouton_origine" type="button" name="button" onclick="editerInput(this)" class="boutonEditionText"><img src="../others/SVG/edit.svg" alt=""></button>
              <label for="origine">origine :</label><br>
            </div>
              <textarea  id="origine" name="origine" rows="5" cols="33" readonly><?= $produit->origine ?></textarea>
            </div>

          </div>

          <input type="submit" value="Modifier">
        </form>

      <?php if($sent==1): ?>
      <script>
        window.onload = function(){
          alert("Le produit à été ajouté à la base de donnée");
        }
        </script>
      <?php endif;?>
    </div>
    <?php include("footer.php") ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../view/js/modifierProduit.view.js"></script>
  </body>

</html>
