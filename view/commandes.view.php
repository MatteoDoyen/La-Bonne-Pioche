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
    <?php include("../view/navbar.php") ?>

    <div class="container-fluid btns">
      <div class="row">
        <div class="col-md-12">
          <button type="button" class="btn btn-danger custom"> <a href="/La-Bonne-Pioche/controlers/commandes.ctrl.php">Toutes les commandes</a></button>
          <button type="button" class="btn btn-danger custom"> <a href="/La-Bonne-Pioche/controlers/commandesEnCours.ctrl.php">Commandes en cours</a></button>
          <button type="button" class="btn btn-danger custom"> <a href="/La-Bonne-Pioche/controlers/commandesARelancer.ctrl.php">Commandes à relancer</a></button>
          <button type="button" class="btn btn-danger custom"> <a href="/La-Bonne-Pioche/controlers/commandesPassees.ctrl.php">Historique des commandes</a></button>
        </div>
      </div>
    </div>

    </br>

    <div class="container-fluid tble">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col" class="theader">Ref. Commande</th>
            <th scope="col" class="theader">Ref. Client</th>
            <th scope="col" class="theader">Détails Commande</th>
            <th score="col" class="theader">Date Récup. Prévue</th>
            <th scope="col" class="theader">Etat Commande</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($list as $commande) : ?>
          <tr>
            <th scope="row"><?= $commande->refCommande ?></th>
            <td><?= $commande->refClient ?></td>
            <td><a href="/La-Bonne-Pioche/controlers/commande.ctrl.php?refCommande=<?= $commande->refCommande ?>">cliquez ici </td>
            <td><?=$commande->dateRecup?></td>
            <td><?= $commande->etat ?></td>
          </tr>
          <?php endForeach; ?>
        </tbody>
      </table>
    </div>

    <?php include("../view/footer.php") ?>

  </body>
</html>
