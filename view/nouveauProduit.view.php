<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - PanierAchat</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/nouveauProduit.view.css">
  </head>
      <body>
        <?php include("../view/navbar.php") ?>

        <h2 id="h2NvPanier" >Ajouter un nouveau produit</h2>
        <div class="container">
        <form action="nouveauProduitInsert.ctrl.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-6 inputGauche">
              <div id="imageUpload">
                <img id="imgPreview" alt="image du produit">
                <img id="btnSupprimer" draggable="false" src="../others/SVG/iconPlus.svg" alt="">
                <img id="imgPlus" draggable="false" src="../others/SVG/iconPlus.svg" alt="">
                <input id="inputImage" accept="image/jpeg,image/jpg, image/png, image/webp" tabindex="-1" type="file" name="imgProduit" required>
              </div>
              <p id="labelImage" >1 Mo maximum</p>
              <input type="text" id="libelle" name="libelle" placeholder="libelle *" required>
              <input type="text" id="fabricant" name="fabricant" placeholder="fabricant *" required>
              <input type="text" id="rayon" name="rayon" placeholder="rayon *" required>
              <input type="text" id="famille" name="famille" placeholder="famille *" required>
              <input type="number" id="coef" step="0.1" name="coef" placeholder="coefficient multiplicateur *" required>

              <div class="doubleInput">
                <div class="">
                  <label for="prixU">Prix Unitaire :</label><br>
                  <input type="number" id="prixU" step="0.01" name="prixU" required>
                </div>
                <div class="0">
                  <label for="quantiteU">Quantité Unitaire :</label><br>
                  <input type="number" id="quantiteU" step="0.01" name="quantiteU" required>
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
                  <input type="number" id="stock" name="stock" required>
                </div>
              </div>
              <div class="custom-control custom-checkbox mr-sm-2">
                <label for="active">Article achetable</label>
                     <input type="checkbox" name="active" value="1" id="active" />

              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6">
              <label for="description">Description :</label><br>
              <textarea  id="description" name="description" rows="5" cols="33" ></textarea><br>
              <label for="caracteristiques">Caractéristiques :</label><br>
              <textarea  id="caracteristiques" name="caracteristiques" rows="5" cols="33"></textarea>
              <label for="origine">origine :</label><br>
              <textarea  id="origine" name="origine" rows="5" cols="33"></textarea>
            </div>

          </div>

          <input type="submit" value="Envoyer le fichier">
        </form>
      <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="../view/js/nouveauProduit.js"></script>
      <?php if($sent==1): ?>
      <script>
        window.onload = function(){ 
          alert("Le produit à été ajouté à la base de donnée");
        }
        </script>
      <?php endif;?>
    </div>
    <?php include("../view/footer.php") ?>
  </body>

</html>
