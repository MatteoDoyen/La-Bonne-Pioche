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
        <div class="container-fluid">
        <form action="test.php" method="post" enctype="multipart/form-data">
          <div>
            <div class="container_img3">
              <div class=" col-sm-6 col-md-6 col-lg-6">
                <div id="imageUpload">
                  <img id="imgPreview">
                  <img id="btnSupprimer" draggable="false" src="../others/SVG/iconPlus.svg" alt="">
                  <img id="imgPlus" draggable="false" src="../others/SVG/iconPlus.svg" alt="">
                  <input id="inputImage" accept="image/jpeg,image/jpg, image/png, image/webp" tabindex="-1" type="file" name="imgProduit" >
                </div>
              </div>
            </div>
            <input type="search" id="rechercheProduit" name="produit" aria-label="Chercher des produits" placeholder="Search the site">

            <?php foreach ($produits as $value) : ?>

              <p><?= $value->libelle  ?></p>

            <?php endforeach; ?>
            <button>Search</button>
            <!-- <input type="submit" value="Envoyer le fichier"> -->
          </div>
          </form>
        </div>
          <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
          <script type="text/javascript" src="../view/js/nouveauPanier.view.js"></script>

    <?php include("../view/footer.php") ?>
  </body>

</html>
