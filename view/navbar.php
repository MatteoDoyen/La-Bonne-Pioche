<div class="sticky-top">
  <div class="row m_nav-bar">
    <div class="titre offset-lg-2 col-lg-8 offset-1 col-10">
      <h1 class="nav_h1" >La bonne pioche</h1>
      <h2 class="nav_h2" id="sous_titre">L'épicerie grenobloise de produits locaux sans emballage</h2>
    </div>
  </div>
  <nav class="row navbar navbar-expand-lg m_nav-bar">
    <a class="navbar-brand" href="../controlers/accueil.ctrl.php">
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
          <a class="nav-link with-border nous" href="../controlers/nous.ctrl.php">Nous</a>
        </li>
        <li class="nav-item">
          <a class="nav-link with-border mode_emploie" href="../controlers/modeDemploi.ctrl.php">Mode d'emploi</a>
        </li>
        <?php if (isset($produits)): ?>
          <li id="dropdown-produits" class="nav-item">
            <a class="nav-link with-border produits dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
              Produits
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Separated link</a>
            </div>
          </li>
          <li id="produits">
            <a class="nav-link with-border produits" href="../controlers/produits.ctrl.php">Produits</a>
          </li>
        <?php else: ?>
          <li>
            <a class="nav-link with-border produits" href="../controlers/produits.ctrl.php">Produits</a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link with-border actualites" href="#">Actualités</a>
        </li>
        <li class="nav-item">
          <a class="nav-link with-border nous_trouver" href="../controlers/nousTrouver.ctrl.php">Nous trouver</a>
        </li>
        <li class="nav-item">
          <a class="nav-link paniers" href="../controlers/paniers.ctrl.php">Paniers</a>
        </li>
      </ul>
      <div class="form-inline my-2 my-lg-0">
        <button class="btn btn-success my-2 my-sm-0 connect" type="button" name="button">Se connecter</button>
      </div>
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
  if (taille > 992) {
    dropdown_produits.hide();
  } else {
    produits.hide();
  }

  $(window).resize(function () {
    var new_taille = window.innerWidth;
    if (new_taille > 992) {
      dropdown_produits.hide();
      produits.show();
    } else {
      produits.hide();
      dropdown_produits.show();
    }
  });
</script>
