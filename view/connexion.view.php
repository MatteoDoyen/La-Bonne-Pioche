<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - Inscription</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/inscription.view.css">
  </head>
  <body>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../view/js/connexion.js"></script>

    <div class="container-fluid ">

      <div class="text-center">
        <a id="retour" class="btn btn-danger mt-4" type="button" name="button" href="../controlers/accueil.ctrl.php">Retour</a>
      </div>

      <br><br>

      <?php if (isset($error)): ?>
        <div class="alert alert-danger alert-dismissible fade show offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 offset-1 col-10 mb-5" role="alert">
          <?= $error ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>

      <div class="row pb-5">
        <fieldset class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 offset-1 col-10 inscription">
          <div class="header text-center">
            <img src="../data/img/logo.png" alt="Logo" class="logo">
          </div>
          <div class="body">
            <h1 class="text-center py-3" style="color: #bfc416;">Se connecter</h1>
            <form class="px-5 pb-3" id="form" action="../controlers/connexion.ctrl.php" method="POST">
              <div class="form-row">
                <div class="form-group offset-lg-3 col-lg-6 offset-md-2 col-md-8 col-12">
                  <input class="form-control" type="text" placeholder="Email" name="email" id="mail">
                  <div class="invalid-feedback">
                    Veuillez remplir ce champ (avec le bon format).
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group offset-lg-3 col-lg-6 offset-md-2 col-md-8 col-12">
                  <input class="form-control" type="password" placeholder="Mot de passe" name="mdp" id="mdp">
                  <div class="invalid-feedback">
                    Veuillez remplir ce champ (minimum 8 caractères, 1 chiffre et 1 majuscule).
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group offset-lg-3 col-lg-6 offset-md-2 col-md-8 col-12">
                  <label for="who">Qui êtes-vous ? *</label>
                  <select id="who" class="form-control custom-select" name="who">
                    <option value="" selected disabled>...</option>
                    <option>Client</option>
                    <option>Employé</option>
                    <option>Entreprise</option>
                  </select>
                  <div class="invalid-feedback">
                    Veuillez choisir une option.
                  </div>
                </div>
              </div>
              <div class="form-row my-4">
                <button id="submit" type="submit" class="btn offset-md-3 col-md-6">Se connecter</button>
              </div>
            </form>
          </div>
        </fieldset>
      </div>

    </div>

  </body>
</html>
