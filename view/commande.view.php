<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - Commande</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/commande.view.css">

  </head>
  <body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>

      <?php include("navbar.php") ?>
    <div class="container-fluid">

      <a href="../controlers/commandes.ctrl.php" class="boutonretour">
        <img src="../others/SVG/flechegauche.svg" alt=""> Retour Commandes
      </a>

      <p>Ref commande : <?= $commande->refCommande ?>;
        Client : <?= $commande->refClient ?>;
        état de la commande : <?= $commande->etat ?></p><br>

      <?php foreach($descriptif as $panier) :  ?>

          <p>Ref panier : <?= $panier->refPanier ?>;
            <a href="/La-Bonne-Pioche/controlers/panier.ctrl.php?refPanier=<?= $panier->refPanier ?>">
              image panier : <?= $panier->image ?>
            </a>;
               prix : <?= $panier->prix ?>
          </p>

          <br>

      <?php endforeach ?>


    </div>
    <?php include("footer.php") ?>
    <script type="text/javascript"  src="../view/js/panier.view.js"></script>
  </body>
</html>
