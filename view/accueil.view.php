<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - Accueil</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/accueil.view.css">
  </head>
  <body>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>

    <div class="container-fluid">

      <?php include("../view/navbar.php") ?>

      <?php if (isset($success)): ?>
        <div class="alert alert-success alert-dismissible fade show offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 offset-1 col-10 mb-5 text-center" role="alert">
          <?= $success ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>

      <div class="row" id="row-1">
        <div class="offset-lg-1 col-lg-5 offset-md-1 col-md-5 info-1">
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
          <div class="btn-toolbar mb-3 justify-content-between reseaux offset-lg-1 col-lg-10 offset-md-1 col-md-10 offset-sm-0 col-sm-12 offset-0 col-12" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group mr-1" role="group" aria-label="First group">
              <a href="https://www.facebook.com/labonnepiochegrenoble">
                <img class="reseau" src="https://static.wixstatic.com/media/e316f544f9094143b9eac01f1f19e697.png/v1/fill/w_50,h_50,al_c,q_85,usm_0.66_1.00_0.01/e316f544f9094143b9eac01f1f19e697.webp" alt="Facebook">
              </a>
            </div>
            <div class="btn-group mr-1" role="group" aria-label="First group">
              <a href="https://twitter.com/labonnepioche38">
                <img class="reseau" src="https://static.wixstatic.com/media/9c4b521dd2404cd5a05ed6115f3a0dc8.png/v1/fill/w_50,h_50,al_c,q_85,usm_0.66_1.00_0.01/9c4b521dd2404cd5a05ed6115f3a0dc8.webp" alt="Facebook">
              </a>
            </div>
            <div class="btn-group" role="group" aria-label="First group">
              <a href="https://www.youtube.com/channel/UC8YddZncC3FiL1dZE0-iSxg">
                <img class="reseau" src="https://static.wixstatic.com/media/a1b09fe8b7f04378a9fe076748ad4a6a.png/v1/fill/w_50,h_50,al_c,q_85,usm_0.66_1.00_0.01/a1b09fe8b7f04378a9fe076748ad4a6a.webp" alt="Facebook">
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6 container_img_1">
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

      <?php include("../view/footer.php") ?>

    </div>


    <script type="text/javascript">
      $(function () {

        // Petit script pour cacher la deuxième image en fonction de la taille de l'écran
        var taille = window.innerWidth;
        if (taille <= 767) {
          $("#image-2").hide();
        };
        // Listener sur l'event resize
        $(window).resize(function () {
          var new_taille = window.innerWidth;
          if (new_taille <= 767) {
            $("#image-2").hide();
          } else {
            $("#image-2").show();
          }
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
      });

    </script>

  </body>
</html>
