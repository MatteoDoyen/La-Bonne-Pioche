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

    </br></br>

    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h2 class="display-12">Référence de la commande : <?= $commande->refCommande ?></br>
          Client : <?=$client->prenom?>, <?=$client->nom?>, identifiant n°<?= $commande->refClient ?></br>
          prix total : <?= $commande->prix ?></br>
          commandée le : <?=$commande->dateCommande?></br>
          à récupérer pour le : <?=$commande->dateRecup?></br>
          état de la commande : <?= $commande->etat ?></br>
        </h2>
          <?php foreach($descriptif as $panier) :  ?>
              <hr class="my-6">
              <p><img src=<?= $panier->image ?> alt="panier" width="100" height="100"><?= $panier->libelle ?> </p>
              <p class="lead">
                <a class="btn btn-outline-dark" href="/La-Bonne-Pioche/controlers/panier.ctrl.php?refPanier=<?= $panier->refPanier ?>" role="button">Détails du panier</a>
              </p>
          <?php endforeach ?>
      </div>
    </div>



    </div>
    <?php include("footer.php") ?>
    <script type="text/javascript"  src="../view/js/panier.view.js"></script>
  </body>
</html>
