<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La bonne Pioche</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/accueil.test.css">
  </head>
  <body>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>

    <div class="container-fluid">

      <div class="fixed-top">
        <div class="row m_nav-bar">
          <div class="titre offset-lg-2 col-lg-8 offset-1 col-10">
            <h1>La bonne pioche</h1>
            <h2>L'épicerie grenobloise de produits locaux sans emballage</h2>
          </div>
        </div>

        <nav class="row navbar navbar-expand-lg m_nav-bar">
          <a class="navbar-brand" href="#">
            <img src="../data/img/logo.png" alt="Logo">
          </a>
          <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fa fa-navicon" style="color:#fff; font-size:28px;"></i>
            </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link with-border" href="#">Nous</a>
              </li>
              <li class="nav-item">
                <a class="nav-link with-border" href="#">Mode d'emploi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link with-border" href="#">Produits</a>
              </li>
              <li class="nav-item">
                <a class="nav-link with-border" href="#">Actualités</a>
              </li>
              <li class="nav-item">
                <a class="nav-link with-border" href="#">Nous trouver</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Paniers</a>
              </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
              <button class="btn btn-success my-2 my-sm-0 connect" type="button" name="button">Se connecter</button>
            </div>
          </div>
        </nav>
      </div>



      <div class="row" id="row-1">
        <div class="offset-lg-1 col-lg-5 offset-md-1 col-md-5 flex-column-reverse info-1">
          <h3 class="titre_info1_1">À vos bocaux,</h3>
          <h3 class="titre_info1_2">prêts...</h3>
          <h3 class="titre_info1_3">partez !</h3>
          <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2 offset-lg-1 col-lg-5 offset-md-0 col-md-12 offset-sm-2 col-sm-8" role="group" aria-label="First group">
              <button type="button" class="btn btn-outline-danger">Nouvelles fraîches</button>
            </div>
            <div class="btn-group mr-2 col-lg-5 offset-md-0 col-md-12 offset-sm-2 col-sm-8" role="group" aria-label="First group">
              <button type="button" class="btn btn-outline-danger">Notre concept</button>
            </div>
          </div>


          <h3 class="titre_info1_4">N'oublier pas</h3>
          <h3 class="titre_info1_5">Nos réseaux sociaux</h3>
          <div class="btn-toolbar mb-3 justify-content-between reseaux offset-lg-2 col-lg-8 offset-md-1 col-md-10 offset-sm-1 col-sm-10 offset-0 col-12" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-2" role="group" aria-label="First group">
              <a href="https://www.facebook.com/labonnepiochegrenoble">
                <img src="https://static.wixstatic.com/media/e316f544f9094143b9eac01f1f19e697.png/v1/fill/w_50,h_50,al_c,q_85,usm_0.66_1.00_0.01/e316f544f9094143b9eac01f1f19e697.webp" alt="Facebook">
              </a>
            </div>
            <div class="btn-group mr-2" role="group" aria-label="First group">
              <a href="https://twitter.com/labonnepioche38">
                <img src="https://static.wixstatic.com/media/9c4b521dd2404cd5a05ed6115f3a0dc8.png/v1/fill/w_50,h_50,al_c,q_85,usm_0.66_1.00_0.01/9c4b521dd2404cd5a05ed6115f3a0dc8.webp" alt="Facebook">
              </a>
            </div>
            <div class="btn-group mr-2" role="group" aria-label="First group">
              <a href="https://www.youtube.com/channel/UC8YddZncC3FiL1dZE0-iSxg">
                <img src="https://static.wixstatic.com/media/a1b09fe8b7f04378a9fe076748ad4a6a.png/v1/fill/w_50,h_50,al_c,q_85,usm_0.66_1.00_0.01/a1b09fe8b7f04378a9fe076748ad4a6a.webp" alt="Facebook">
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-5 col-md-6">
          <img class="image_accueil_1" src="../data/img/image-acceuil-3.jpg" alt="Image accueil">
        </div>
      </div>



      <div class="row" id="row-2">
        <div class="offset-lg-1 col-lg-5 offset-md-1 col-md-5" id="image-2">
          <img class="image_accueil_2" src="../data/img/image-acceuil-2.jpg" alt="Image accueil">
        </div>
        <div class="col-lg-5 col-md-5 info-2">
          <div class="offset-1 col-10">
            <p class="newsletter">Vous souhaitez recevoir des nouvelles fraîches ?</p>
            <p class="newsletter2">Abonnez-vous à notre newsletter !</p>
          </div>
          <form action="index.html" method="post">
            <div class="form-group text-center offset-1 col-10 p-0">
              <label id="label-adress">Adresse Email</label>
              <input type="email" class="form-control" id="mail" required>
            </div>
            <button type="submit" class="btn btn-danger offset-1 col-10" id="abonne">Abonnez-vous</button>
          </form>
        </div>
      </div>

    </div>

    <footer id="footer">
      <p class="pt-4 m-1">© 2020 La Bonne Pioche Grenoble - 2, rue Condillac 38000 Grenoble - 821 482 262 R.C.S. Grenoble</p>
      <p class="m-1">Illustrations de Louise Plantin</p>
      <p class="pb-4 m-0 small">"Pour votre santé, pratiquez une activité physique régulière"</p>
    </footer>


    <script type="text/javascript">
      // Petit script pour cacher la deuxième image en fonction de la taille de l'écran
      $(function () {
        var taille = window.innerWidth;
        if (taille <= 768) {
          $("#image-2").hide();
        };
        // Listener sur l'event resize
        $(window).resize(function () {
          var new_taille = window.innerWidth;
          if (new_taille <= 768) {
            $("#image-2").hide();
          } else {
            $("#image-2").show();
          }
        });
      });


      // Petit script pour vérifier que l'adresse entrée est bien valide (test qu'il faudra réaliser aussi back-end)
      var ok;
      $("#mail").blur(function () {
        if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/i.test($("#mail").val()) ) {
          ok = false;
          $("#mail").css("border", "solid 1.5px red");
        } else {
          ok = true
          $("#mail").css("border", "solid 1.5px lightgreen");

        }

      });

      $("#abonne").submit(function (e) {
        if (!ok) {
          e.preventDefault();
        }
      })
    </script>

  </body>
</html>
