<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - Nous Trouver</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/nousTrouver.view.css">
  </head>
  <body>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>

    <div class="container-fluid">

      <?php include("../view/navbar.php") ?>

      <div class="row info">
        <div class="offset-lg-2 col-lg-3">
          <div class="mb-3">
            <h4 class="m-0">Horraires</h4>
            <p>Du lundi au samedi de 10h à 20h</p>
            <p>Sauf le jeudi de 10h à 14h et de 15h à 20h</p>
            <p>Et sauf les jours fériés !</p>
          </div>

          <div class="mb-3">
            <h4 class="m-0">Adresse</h4>
            <p>2, rue Condillac</p>
            <p>38000 Grenoble</p>
          </div>

          <div class="mb-3">
            <h4 class="m-0">Pour venir nous voir</h4>
            <p>Tram A et B : Arrêt Hubert Dubedout - Maison du Tourisme</p>
            <p>Tous les bus allant au centre ville</p>
            <p>Parking vélo à promixité</p>
            <p>Parking voiture (gratuit pendant 20 minutes)</p>
          </div>

          <div class="mb-3">
            <h4 class="m-0">Téléphone</h4>
            <p>04 38 38 31 22</p>
          </div>

          <div class="mb-3">
            <h4 class="m-0">Email</h4>
            <p>labonnepioche38@gmail.com</p>
          </div>

        </div>
        <div class="col-lg-5">
          <img class="img-fluid" src="../data/img/plan.jpeg" alt="Plan">
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="offset-lg-2 col-lg-8">
          <div id="map-container-google-1" class="z-depth-1-half map-container">
            <iframe id="plan" src="https://maps.google.com/maps?q=labonnepioche&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
      </div>

      <?php include("../view/footer.php") ?>

    </div>

  </body>
</html>
