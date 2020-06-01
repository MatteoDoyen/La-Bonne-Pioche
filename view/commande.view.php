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
        <img src="../others/SVG/flechegauche.svg" alt="retour commandes"> Retour Commandes
      </a>
    </br></br>

      <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12 quantPanier titre">
          <article>
            <h1>Commande n°<?=$commande->refCommande?></h1></br>
            <h2>commande <?=$commande->etat?></h2>
            <h2>date prévue: <?=$commande->dateRecup?></h2>
          </article>
        </div>
      </div>
      <hr>
        <p class="titre vert">Informations sur la commande</p>
        <div class="row info">
          <div class="col-xs-12 col-sm-6 col-lg-6 quantPanier">
            <article>
              <p>Référence Commande: <?=$commande->refCommande?></p></br>
              <p>Etat de la commande: </br> commande <?=$commande->etat?></p></br>
              <p>Prix total: <?=$commande->prix?>€</p></br>
            </article>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-6 prixPanier">
            <article>
              <p>date de la commande:</br> <?=$commande->dateCommande?></p></br>
              <p>prévue pour le: </br> <?=$commande->dateRecup?></p></br>
              <p>adresse de récupération:</br> <?=$adresse?></p></br>
            </article>
          </div>
        </div>
      </div>
      <hr>
      <p class="titre vert">Client :</p>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12 quantPanier">
          <article>
            Client: <?= $client->prenom ?> <?= $client->nom ?>, id.n°<?= $commande->refClient ?></br>
            @mail: <?= $client->adresseMail?></br>
            n°tel: <?= $client->numeroTelephone?></br>
          </article>
        </div>
      </div>
      <hr>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-lg-12 quantPanier">
            <h3 class="vert">Composition de la commande</h3>
          </div>
          <?php foreach($descriptif as $key => $value) :  ?>
            <hr>
            <div class="container">
              <div class="row" id="ligne_<?= $value->refPanier ?>">
                <div class="d-none d-sm-flex col-xs-12 col-sm-6 col-lg-3 imgPanier">
                  <a href="../controlers/panier.ctrl.php?refPanier=<?= $value->refPanier?>">
                    <img src="<?= $value->image ?>" alt="<?= $value->libelle ?>">
                  </a>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-3 libellePanier justify-content-start">
                    <article>
                      <p class="titrePanier"><?= $value->libelle ?></p>
                      <p class="nbPersPanier">Panier pour <?=$key?> personnes</p>
                    </article>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-3 quantPanier">
                    <p class="titrePanier vert"> x <?= $key ?></p>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-3 prixPanier">
                  <p id="prix_<?= $value->refPanier ?>"><?= $value->prix ?>€</p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        </br>
      </div>
    <?php include("footer.php") ?>
    <script type="text/javascript"  src="../view/js/panier.view.js"></script>
  </body>
</html>
