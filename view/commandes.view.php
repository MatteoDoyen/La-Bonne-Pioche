<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - Nous</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/commandes.view.css">

  </head>
  <body>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
    <?php include("../view/navbarEmploye.template.php") ?>

    <div class="container-fluid btns">
      <div class="row">
        <div class="col-md-12">
          <button type="button" class="btn btn-danger custom"> <a href="../controlers/commandes.ctrl.php">Toutes les commandes</a></button>
          <button type="button" class="btn btn-danger custom"> <a href="../controlers/commandesEnCours.ctrl.php">Commandes en cours</a></button>
          <button type="button" class="btn btn-danger custom"> <a href="../controlers/commandesARelancer.ctrl.php">Commandes à relancer</a></button>
          <button type="button" class="btn btn-danger custom"> <a href="../controlers/commandesPassees.ctrl.php">Historique des commandes</a></button>
        </div>
      </div>
    </div>

    </br>

    <div class="container tble">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col" class="theader">Ref. Commande</th>
            <th scope="col" class="theader">Ref. Client</th>
            <th scope="col" class="theader">Détails Commande</th>
            <th score="col" class="theader">Date Récup. Prévue</th>
            <th scope="col" class="theader">Etat Commande</th>
            <th score="col" class="theader">Accuser la remise</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($list as $commande) : ?>
          <tr>
            <th scope="row"><?= $commande->refCommande ?></th>
            <td><?= $commande->refClient ?></td>
            <td><a href="../controlers/commande.ctrl.php?refCommande=<?= $commande->refCommande ?>">cliquez ici </td>
            <td><?=$commande->dateRecup?></td>
            <td><?=$commande->etat ?></td>
            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><img src="../others/SVG/tick.svg" alt="bouton validation" style="width:25px;height:35px"></button></td>
          </tr>
          <?php endForeach; ?>
        </tbody>

      </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Validation du choix</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Vous vous apprêtez à accuser la réception de cette commande,en êtes-vous certain(e)?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary">Annuler</button>
            <button type="button" onclick="" class="btn btn-primary" data-dismiss="modal">Valider la réception></button>
          </div>
        </div>
      </div>
    </div>

    <?php include("../view/footer.php") ?>
  </body>
</html>
