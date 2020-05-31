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
    <script src="../view/js/inscription.js"></script>

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
            <h1 class="text-center py-3" style="color: #bfc416;">S'inscrire</h1>
            <form class="px-5 pb-3" id="form" action="../controlers/inscription.ctrl.php" method="POST">
              <div class="form-row">
                <div class="form-group offset-lg-0 col-lg-6 offset-md-1 col-md-10 col-12">
                  <label for="genre">Genre *</label>
                  <select id="genre" class="form-control custom-select" name="genre">
                    <option value="" selected disabled>...</option>
                    <option>Homme</option>
                    <option>Femme</option>
                  </select>
                  <div class="invalid-feedback">
                    Veuillez choisir un genre.
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group offset-lg-0 col-lg-6 offset-md-1 col-md-10 col-12">
                  <label for="nom">Nom *</label>
                  <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                  <div class="invalid-feedback">
                    Veuillez remplir ce champ.
                  </div>
                </div>
                <div class="form-group offset-lg-0 col-lg-6 offset-md-1 col-md-10 col-12">
                  <label for="prenom">Prénom *</label>
                  <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
                  <div class="invalid-feedback">
                    Veuillez remplir ce champ.
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group offset-lg-0 col-lg-6 offset-md-1 col-md-10 col-12">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Adresse@mail.com">
                  <div class="invalid-feedback">
                    Veuillez remplir ce champ (avec le bon format).
                  </div>
                </div>
                <div class="form-group offset-lg-0 col-lg-6 offset-md-1 col-md-10 col-12">
                  <label for="tel">Numéro de téléphone *</label>
                  <input type="tel" class="form-control" id="tel" name="tel" placeholder="0123456789">
                  <div class="invalid-feedback">
                    Veuillez remplir ce champ (avec le bon format).
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group offset-lg-0 col-lg-6 offset-md-1 col-md-10 col-12">
                  <label for="mdp">Mot de passe *</label>
                  <input type="password" class="form-control" id="mdp" name="mdp">
                  <div class="invalid-feedback">
                    Veuillez remplir ce champ (minimum 8 caractères, 1 chiffre et 1 majuscule).
                  </div>
                </div>
                <div class="form-group offset-lg-0 col-lg-6 offset-md-1 col-md-10 col-12">
                  <label for="mdp_conf">Confirmation du mot de passe *</label>
                  <input type="password" class="form-control" id="mdp_conf" name="mdp_conf">
                  <div class="invalid-feedback">
                    Veuillez saisir un mot de passe identique.
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group offset-lg-0 col-lg-6 offset-md-1 col-md-10 col-12">
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
                <div class="form-group offset-lg-0 col-lg-6 offset-md-1 col-md-10 col-12" id="entreprise_hidden">
                  <label for="nom_entreprise">Votre entreprise *</label>
                  <select id="nom_entreprise" class="form-control custom-select" name="nom_entreprise">
                    <option value="" selected disabled>...</option>
                    <?php foreach ($noms as $key => $value): ?>
                      <option><?= $value['nom']?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    Veuillez choisir une entreprise.
                  </div>
                </div>
              </div>
              <div class="form_row mt-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="newletter" name="newletter">
                    <label class="custom-control-label" for="newletter">
                      <p class="text-muted m-0">J'accepte de recevoir des offres des actualités de la part de la Bonne Pioche</p>
                    </label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="conditions" name="conditions">
                    <label class="custom-control-label" for="conditions">
                      <p class="text-muted m-0">J'accepte les conditions générales *</p>
                    </label>
                </div>
              </div>
              <p class="text-center py-2"><span id="error" style="color: red;"></span></p>
              <div class="form-row my-4">
                <button id="submit" type="submit" class="btn offset-md-3 col-md-6">S'inscrire</button>
              </div>
            </form>
          </div>
        </fieldset>
      </div>

    </div>

  </body>
</html>
