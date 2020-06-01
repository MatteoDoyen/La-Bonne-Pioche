<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/consulterPaniers.view.css">
  </head>
  <body>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
    <?php include("../view/navbar.php") ?>

    <div class="container-fluid">
      <?php if ($supprimer==1): ?>
        <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Pannier supprimé</h4>
        <p>Le paniers : "<?= $libelleSupprimer ?>" à été supprimé</p>
        </div>
      <?php endif; ?>
      <div class="container">
        <h2 class="text-center mt-5 mb-5">Les paniers</h2>
        <a href="nouveauPanier.ctrl.php">
          <div id="nouveauPanier">
            <p>Nouveau panier</p><p>+</p>
          </div>
        </a>
        <?php foreach ($paniers as $panier): ?>
          <div class="row mb-3 ">
            <div class="col-md-12 col-lg-2 imgPanier d-flex justify-content-start align-items-center">
              <img src="<?= $panier->image ?>" alt="">
            </div>
            <div class="col-md-6 col-lg-4 d-flex justify-content-start align-items-center">
              <p><?= $panier->libelle ?></p>
            </div>
            <div class="col-2 d-flex justify-content-center align-items-center">
              <p><?= $panier->prix ?> €</p>
            </div>
            <div class="col-2 d-flex justify-content-center align-items-center">
              <p><?= $panier->nbBocaux ?> bocaux</p>
            </div>
            <div class="col-2 buttonPaniers d-flex align-items-center">
              <form id="formulaireEdit_<?= $panier->refPanier ?>" action="modifierPanier.ctrl.php" method="post">
                <input type="hidden" name="refPanier" value="<?= $panier->refPanier ?>">
                <button onclick="envoieFormulaireEdit(this)" id="boutonEdit_<?= $panier->refPanier ?>" class="d-flex" type="button" name="button"> <img src="../others/SVG/edit.svg" alt=""> </button>
              </form>
              <form id="formulaireSupprimer_<?= $panier->refPanier ?>"  class="" action="supprimerPanier.ctrl.php" method="post">
                <input type="hidden" name="libelle" value="<?= $panier->libelle ?>">
                <input type="hidden" name="refPanier" value="<?= $panier->refPanier ?>">
                <button onclick="supprimerPanier(this)" id="boutonSupprimer_<?= $panier->refPanier ?>"  class="boutonSupprimer" type="button" name="button">x</button>
              </form>
            </div>
          </div>
          <hr>
        <?php endforeach; ?>
      </div>
    </div>
    <?php include("../view/footer.php") ?>

    <script src="../view/js/consulterPaniers.view.js"></script>
  </body>
</html>
