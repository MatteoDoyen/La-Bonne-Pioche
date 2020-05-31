


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

    <div class="container-fluid">
      <?php include("navbar.php") ?>

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

      <?php include("footer.php") ?>
    </div>
    <script type="text/javascript" src="../view/js/commandes.view.js"></script>


  </body>

</html>
