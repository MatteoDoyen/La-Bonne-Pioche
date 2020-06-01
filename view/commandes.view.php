<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - Nous</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/paniers.view.css">

  </head>
  <body>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
    <?php include("../view/navbar.php") ?>


    <button type="button" name="button"> <a href="/La-Bonne-Pioche/controlers/commandesEnCours.ctrl.php"> Commandes en cours </a></button>
    <button type="button" name="button"> <a href="/La-Bonne-Pioche/controlers/commandesARelancer.ctrl.php"> Commandes à relancer </button>
    <button type="button" name="button"> <a href="/La-Bonne-Pioche/controlers/commandesPassees.ctrl.php">Historique des commandes</button>


    <?php foreach($list as $commande) :  ?>
      <a href="/La-Bonne-Pioche/controlers/commande.ctrl.php?refCommande=<?= $commande->refCommande ?>">
        <p>Ref commande : <?= $commande->refCommande ?>; Client : <?= $commande->refClient ?>; état de la commande : <?= $commande->etat ?></p><br>
      </a>
    <?php endForeach; ?>

    <?php include("../view/footer.php") ?>

  </body>
</html>
