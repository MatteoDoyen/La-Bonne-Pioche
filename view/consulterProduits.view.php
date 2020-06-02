<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/consulterProduits.view.css">
  </head>
  <body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
    <?php include("../view/navbarEmploye.template.php"); ?>

    <div class="container-fluid">
      <?php if ($supprimer==1): ?>
        <div class="container alert alert-success" role="alert">
        <h4 class="alert-heading text-center">Produit supprimé</h4>
        <p class="text-center textSupprLibelle" >Le produit : "<?= $libelleSupprimer ?>" à été supprimé</p>
        </div>
      <?php endif; ?>
      <div class="container">
        <h2 class="text-center mt-5 mb-5">Les Produits</h2>
        <a href="nouveauProduit.ctrl.php">
          <div id="nouveauProduit">
            <p>Nouveau produit</p><p>+</p>
          </div>
        </a>
        <?php foreach ($produits as $produit): ?>
          <div class="row mb-3 ">
            <div class="col-6 col-md-2 imgProduit d-flex justify-content-start align-items-center">
              <a href="produit.ctrl.php?refProduit=<?= $produit->refProduit ?>">
                <img src="<?= $produit->urlImg ?>" alt="">
              </a>
            </div>
            <div class="col-6 col-md-4 d-flex justify-content-start align-items-center">
              <p><?= $produit->libelle ?></p>
            </div>
            <div class="col-md-2 col-5 d-flex justify-content-center align-items-center quantite">
              <p><?= $produit->quantiteU ?> x <?= $produit->unite ?></p>
            </div>
            <div class="col-md-2 col-5 d-flex justify-content-center align-items-center">
              <p><?= $produit->fabricant ?></p>
            </div>
            <div class="col-2 buttonProduit d-flex align-items-center">
              <form id="formulaireEdit_<?= $produit->refProduit ?>" action="modifierProduit.ctrl.php" method="post">
                <input type="hidden" name="refProduit" value="<?= $produit->refProduit ?>">
                <button onclick="envoieFormulaireEdit(this)" id="boutonEdit_<?= $produit->refProduit ?>" class="d-flex" type="button" name="button"> <img src="../others/SVG/edit.svg" alt=""> </button>
              </form>
              <form id="formulaireSupprimer_<?= $produit->refProduit ?>"  class="" action="supprimerProduit.ctrl.php" method="post">
                <input type="hidden" name="libelle" value="<?= $produit->libelle ?>">
                <input type="hidden" name="refProduit" value="<?= $produit->refProduit ?>">
                <button onclick="supprimerProduit(this)" id="boutonSupprimer_<?= $produit->refProduit ?>"  class="boutonSupprimer" type="button" name="button">x</button>
              </form>
            </div>
          </div>
          <hr>
        <?php endforeach; ?>
      </div>
    </div>
    <?php include("../view/footer.php") ?>

    <script src="../view/js/consulterProduits.view.js"></script>
  </body>
</html>
