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
            <th score="col" class="theader">Traiter la commande</th>
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
              <?php if ($commande->etat !="récupérée"):?>
                <td><button type="button" class="btn btn" data-toggle="modal" data-target="#validModal_<?= $commande->refCommande ?>"><img src="../others/SVG/tick.svg" alt="bouton validation" style="width:25px;height:35px"></button></td>
                <div class="modal fade" id="validModal_<?= $commande->refCommande ?>" tabindex="-1" role="dialog" aria-labelledby="validModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="validModalLabel_<?= $commande->refCommande ?>">Accuser la réception</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Vous vous apprêtez à accuser la réception de la commande <?= $commande->refCommande ?>,en êtes-vous certain(e)?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger custom links"><a href="../controlers/commandes.ctrl.php">Annuler</a></button>
                        <button type="button" class="btn btn-danger custom links"><a href="../controlers/commandes.ctrl.php?refReception=<?= $commande->refCommande ?>">Valider la réception></a></button>
                    </div>
                    </div>
                  </div>
                </div>
              <?php else:?>
                <td><button type="button" class="btn btn" data-toggle="modal" data-target="#supprModal_<?= $commande->refCommande ?>" alt="bouton supprimer" style="width:40px;height:40px;color:red">X</button></td>
                <div class="modal fade" id="supprModal_<?= $commande->refCommande ?>" tabindex="-1" role="dialog" aria-labelledby="supprModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="supprModalLabel_<?= $commande->refCommande ?>">Suppression d'une commande</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Vous vous apprêtez à supprimer la commande n°5,en êtes-vous certain(e)?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary custom links"><a href="../controlers/commandes.ctrl.php">Annuler</a></button>
                        <button type="button" class="btn btn-danger custom links"><a href="../controlers/commandes.ctrl.php?refSuppr=<?= $commande->refCommande ?>">Valider la suppression</a></button>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif;?>
            </tr>
          <?php endForeach; ?>
        </tbody>

      </table>
    </div>



    <?php include("../view/footer.php") ?>
  </body>
</html>
