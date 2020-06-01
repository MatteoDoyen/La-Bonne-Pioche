<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/navbarEmploye.css">
    <title></title>
  </head>
  <body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
    <div class="sticky-top container-fluid">
      <div class="row m_nav-bar">
        <div class="col-lg-2" id="logo-1">
          <a class="navbar-brand" href="../controlers/accueil.ctrl.php">
            <img class="nav_img" src="../data/img/logo.png" alt="Logo">
          </a>
        </div>
        <div class="titre col-lg-6 offset-1 col-10">
          <h1 class="nav_h1" >La bonne pioche</h1>
          <h2 class="nav_h2" id="sous_titre">L'épicerie grenobloise de produits locaux sans emballage</h2>
        </div>
        <div class="col-lg-3 my-2 my-lg-0" id="connect_signin">
          <?php if (!isset($_SESSION['Utilisateur'])): ?>
            <a class="btn btn-light my-2 my-sm-0 connect" type="button" name="button" href="../controlers/inscription.ctrl.php" style="float: right;">S'inscrire</a>
            <a class="btn btn-light my-2 my-sm-0 connect" type="button" name="button" href="../controlers/connexion.ctrl.php" style="float: right;">Se connecter</a>
          <?php else: ?>
            <a class="btn btn-light my-2 my-sm-0 connect" type="button" name="button" href="../controlers/deconnexion.ctrl.php" style="float: right;">Se Deconnecter</a>
          <?php endif; ?>
        </div>
      </div>
      <nav class="row navbar navbar-expand-lg py-3 m_nav-bar">
        <a id="logo-2" class="navbar-brand" href="../controlers/accueil.ctrl.php">
          <img class="nav_img" src="../data/img/logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
              <i class="fa fa-navicon" style="color:#fff; font-size:28px;"></i>
          </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link accueil" href="../controlers/accueil.ctrl.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link commandes" href="#">Commandes</a>
            </li>
              <li>
                <a class="nav-link with-border produits" href="../controlers/consulterProduits.ctrl.php">Produits</a>
              </li>
            <li class="nav-item">
              <a class="nav-link paniers" href="../controlers/consulterPaniers.ctrl.php">Paniers</a>
            </li>
            <li id="connect" class="nav-item">
              <a class="nav-link btn btn-light my-2 my-sm-0 connect" type="button" name="button" href="../controlers/inscription.ctrl.php" style="float: right;">S'inscrire</a>
            </li>
            <li id="signin" class="nav-item">
              <a class="nav-link btn btn-light my-2 my-sm-0 connect" type="button" name="button" href="../controlers/connexion.ctrl.php" style="float: right;">Se connecter</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <script type="text/javascript">
      var sous_titre = $("#sous_titre");
      var taille = window.innerWidth;
      if (taille <= 600) {
        sous_titre.hide();
      };
      // Listener sur l'event resize
      $(window).resize(function () {
        var new_taille = window.innerWidth;
        if (new_taille <= 600) {
          sous_titre.hide();
        } else {
          sous_titre.show();
        }
      });


      // Disparation ou apparation du dropdown produits en fonciton de la taille de l'écran.
      var dropdown_produits = $("#dropdown-produits");
      var produits = $("#produits");
      var logo1 = $("#logo-1");
      var logo2 = $("#logo-2");
      var connect_signin = $("#connect_signin");
      var connect = $("#connect");
      var signin = $("#signin");
      if (taille > 992) {
        dropdown_produits.hide();
        logo2.hide();
        connect.hide();
        signin.hide();
      } else {
        logo1.hide();
        produits.hide();
        connect_signin.hide();
      }

      $(window).resize(function () {
        var new_taille = window.innerWidth;
        if (new_taille > 992) {
          dropdown_produits.hide();
          produits.show();
          logo1.show();
          logo2.hide();
          connect_signin.show();
          connect.hide();
          signin.hide();
        } else {
          produits.hide();
          dropdown_produits.show();
          logo1.hide();
          logo2.show();
          connect_signin.hide();
          connect.show();
          signin.show();
        }
      });
    </script>
  </body>
</html>




<!-- <script src="../model/panierAchat.js"></script> -->
