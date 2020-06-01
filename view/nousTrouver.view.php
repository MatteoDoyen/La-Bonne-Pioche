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
    <?php include("../view/navbar.php") ?>
    <div class="container-fluid">



      <div class="row info">
        <div class="offset-lg-2 col-lg-8 text-center">
          <div class="mb-3">
            <h4 class="m-0">Horraires</h4>
            <p class="mb-1">Du lundi au samedi de 10h à 20h</p>
            <p class="mb-1">Sauf le jeudi de 10h à 14h et de 15h à 20h</p>
            <p>Et sauf les jours fériés !</p>
          </div>
          <div class="mb-3">
            <h4 class="m-0">Adresse</h4>
            <p class="mb-1">2, rue Condillac</p>
            <p>38000 Grenoble</p>
          </div>
          <div class="mb-3">
            <h4 class="m-0">Pour venir nous voir</h4>
            <p class="mb-1">Tram A et B : Arrêt Hubert Dubedout - Maison du Tourisme</p>
            <p class="mb-1">Tous les bus allant au centre ville</p>
            <p class="mb-1">Parking vélo à promixité</p>
            <p>Parking voiture (gratuit pendant 20 minutes)</p>
          </div>
          <div class="mb-3">
            <h4 class="m-0">Téléphone</h4>
            <p>04 38 38 31 22</p>
          </div>
          <div>
            <h4 class="m-0">Email</h4>
            <p>labonnepioche38@gmail.com</p>
          </div>
        </div>
      </div>

      <hr class="offset-lg-3 col-lg-6 offset-md-3 col-md-6 offset-sm-2 col-sm-8 offset-1 col-10 my-5">

      <div class="row">
        <div class="offset-lg-2 col-lg-8 mb-5">
          <div id="map-container-google-1" class="z-depth-1-half map-container">
            <iframe id="plan" src="https://maps.google.com/maps?q=labonnepioche&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
      </div>



    </div>
    <?php include("../view/footer.php") ?>
  </body>
</html>
