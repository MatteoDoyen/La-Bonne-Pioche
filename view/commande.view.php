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
      <div class="container back">
        <h2 class="display-12">Référence de la commande : <?= $commande->refCommande ?></br>
          Client: <?= $client->prenom ?>, <?= $client->nom ?>, id. n°<?= $commande->refClient ?></br>
          @mail: <?= $client->adresseMail?>, n°tel: <?= $client->numeroTelephone?></br>
          prix total du panier: <?= $commande->prix ?>€</br></br>
          commandée le: <?=$commande->dateCommande?></br>
          à récupérer/livrer pour le: <?=$commande->dateRecup?></br>
          etat: commande <?= $commande->etat ?></br>
          adresse de récupération: <?=$adresse?></br>
        </h2>
          <div class="row">
          <?php foreach($descriptif as $key => $value) :  ?>
              <div class="col-sm">
                <div class="card cstm">
                <img src=<?= $value->image ?> class="card-img-top" alt="panier">
                  <div class="card-body">
                    <h5 class="card-title"><?=$key?> x <?= $value->libelle ?>  pour <?=$value->nbPersonne?> personne(s)</h5>
                    <p>  Sous-total: <?=$value->prix?>€ x <?=$key?> </p>
                    <a class="btn btn-outline-dark" href="/La-Bonne-Pioche/controlers/panier.ctrl.php?refPanier=<?= $value->refPanier ?>" role="button">Détails du panier</a>
                  </div>
                </div>
              </div>
            <?php endforeach ?>

      </div>
    </div>

    </div>
    <?php include("footer.php") ?>
    <script type="text/javascript"  src="../view/js/panier.view.js"></script>
  </body>
</html>
