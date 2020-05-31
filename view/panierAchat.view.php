


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

    <div class="container_fluid d-flex flex-column flex-md-row justify-content-center align-items-center align-items-md-start">

      <div class="container p-3 m-0">
        <div class="row" id="ligne_1">
          <div class="d-none d-sm-flex col-sm-6 col-lg-3 imgPanier">

            <img src="../data/img/img_paniers/apero.jpg" alt="">

          </div>
          <div class="col-xs-12 col-sm-6 col-lg-4 libellePanier justify-content-start">
            <div class="d-flex flex-column">
              <p class="titrePanier">Panier Découverte</p>
              <p class="nbPersPanier">Panier pour 2 personnes</p>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-lg-2 quantPanier">
            <button type="button" name="button" id="moins_1">-</button>
            <input type="text" name="" value="1">
            <button type="button" name="button" id="plus_1">+</button>
          </div>

          <div class="col-xs-6 col-sm-3 col-lg-2 prixPanier">
            <p id="prix_1">25€</p>
          </div>

          <div class="col-xs-6 col-sm-3 col-lg-1 supprPanier">
            <button type="button" name="button" id="suppr_1">x</button>
          </div>

          <hr>

        </div>
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


    <!-- <div class="container-fluid">


          <h2>Panier</h2>

          <div id="corps">

          <section>
            <h3>Vos articles</h3>
            <div class="paniersSelected" id="paniersCommande">

            </div>
          </section>

          <aside>
            <label for="">VOTRE COMMANDE</label>
            <div class="recap" id="recap">
              <div class="recapCommande" id="totalP">
                <p>TOTAL PANIERS</p>
              </div>
              <div class="recapCommande" id="TVA">
                <p>DONT TVA</p>
              </div>
              <div class="recapCommande" id="reduction" >
                <p type="hidden">REDUCTION</p>
              </div>
              <div class="recapCommande" id="total">
                <p>TOTAL A PAYER</p>
              </div>
            </div>
            <button type="button" name="button">TERMINER LA COMMANDE</button>

          </aside>

        </div>


    </div> -->

    <?php include("footer.php") ?>

    <script type="text/javascript" src="../view/js/commandes.view.js"></script>


  </body>

</html>
