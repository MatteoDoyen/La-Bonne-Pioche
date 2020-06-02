


<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - PanierAchat</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/panierAchat.view.css">
  </head>

  <body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>

    <?php include("navbar.php") ?>
    <h2 style="text-align:center">Panier</h2>
    <form class="" id="formulaireCommande" action="nouvelleCommandeInsert.ctrl.php" method="post">
      <h3 style="padding-left:6%; font-size: 15px">Vos articles</h3>
    <div class="container_fluid d-flex flex-column flex-md-row justify-content-center align-items-center align-items-md-start" >

        <div class="container p-3 m-0" id="paniersCommande">

        </div>

        <div class="container p-3 m-0" id="container_resume">
          <h3>VOTRE COMMANDE</h3>
          <div id="lignes">

            <div class="ligne" id="totalPaniers">
              <p>TOTAL PANIERS</p>
              <p>50€</p>
            </div>
            <hr>

            <div class="ligne" id="TVA">
              <p>DONT TVA</p>
              <p>2,75€</p>
            </div>
            <hr>

            <div class="ligne" id="totalAPayer">
              <p>TOTAL A PAYER</p>
              <p>50€</p>
            </div>



          </div>
          <div id = "Terminer">
            <button type="button" name="button" id="ValiderCommande">TERMINER LA COMMANDER</button>
          </div>

        </div>

    </div>
    </form>
    <?php include("footer.php") ?>

    <script type="text/javascript" src="../view/js/panierAchat.view.js"></script>


      <!-- <div class="row" id="ligne_'+panier.id+'">
        <input id="panier_'+panier.id+'_'+panier.nbPersonnes+'" type="hidden" name="paniers[]" value="'+panier.id+'_'+panier.nbPersonnes+'_'+panier.quantite+'">
        <div class="d-none d-sm-flex col-sm-6 col-lg-3 imgPanier">
          <img src="'+panier.img+'" alt="">
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-4 libellePanier justify-content-start">
          <div class="d-flex flex-column">
            <p class="titrePanier" id="libelle_'+panier.id+'_'+panier.nbPersonnes+'">'+panier.libelle+'</p>
            <p class="nbPersPanier" id="nbPers_'+panier.id+'_'+panier.nbPersonnes+'">Panier pour '+panier.nbPersonnes+' personnes</p>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-lg-2 quantPanier">
          <button type="button" name="button" id="moins_'+panier.id+'_'+panier.nbPersonnes+'">-</button>
          <input type="text" name="" value="'+panier.quantite+'">
          <button type="button" name="button" id="plus_'+panier.id+'_'+panier.nbPersonnes+'">+</button>
        </div>
        <div class="col-xs-6 col-sm-3 col-lg-2 prixPanier">
          <p id="prix_'+panier.id+'">'+panier.prix+'€</p>
        </div>
        <div class="col-xs-6 col-sm-3 col-lg-1 supprPanier">
          <button type="button" name="button" id="suppr_'+panier.id+'_'+panier.nbPersonnes+'">x</button>
        </div>

        <hr>
    </div> -->



  </body>

</html>
