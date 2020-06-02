<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/fontawesome/css/all.css">
    <link rel="stylesheet" href="../view/css/produits.view.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="../view/js/produits.view.js"></script>
  </head>
  <body>

    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>

    <?php include("../view/navbar.php") ?>

    <div class="container-fluid">

      <div class="row contenu">

        <form id="searchsmall" action="../controlers/produits.ctrl.php" method="post">
          <div class="input-group mb-3">
            <input class="form-control search" name="search" type="text" placeholder="Rechercher" aria-label="Rechercher">
            <div class="input-group-append">
              <button class="input-group-text send" type="submit"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>

        <ul class="offset-lg-1 col-lg-3 offset-md-1 col-md-3 mb-5 pb-5" id="sidebar">
          <form id="searchbig"action="../controlers/produits.ctrl.php" method="post">
            <div class="input-group mb-3">
              <input class="form-control search" name="search" type="text" placeholder="Rechercher" aria-label="Rechercher">
              <div class="input-group-append">
                <button class="input-group-text send" type="submit"><i class="fas fa-search text-grey" aria-hidden="true"></i></button>
              </div>
            </div>
          </form>

          <li>
            <h4>Nos rayons</h4>
          </li>
          <?php foreach ($rayons as $value): ?>
            <li>
              <div class="dropright">
                <button class="btn dropdown-toggle groupe" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                  <span><?= $value['rayon'] ?></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="../controlers/produits.ctrl.php?rayon=<?=$value['rayon'] ?>&famille=tous">Tous (<?= $value[1] ?>)</a>
                  <?php foreach ($value[0] as $key => $value2): ?>
                    <?php if (!empty($value2)): ?>
                      <a class="dropdown-item" href="../controlers/produits.ctrl.php?rayon=<?=$value['rayon'] ?>&famille=<?= $value2['famille']?>"><?= $value2['famille']?> (<?= $value2['nb'] ?>)</a>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </div>
              </div>
            </li>
          <?php endforeach; ?>

        </ul>

        <div class="col-lg-7">
          <div class="row">
            <?php if (isset($produits)): ?>
              <?php if (isset($rayon) && isset($famille)): ?>
                <div class="col-12">
                  <h2 class="mb-4 rayonFamille" style="color: #f04942;"><?= $rayon ?> - <?= $famille ?></h2>
                </div>
              <?php endif; ?>
              <?php foreach ($produits as $key => $value): ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-6 card mb-4">
                  <img src="<?= $value->urlImg ?>" class="card-img-top" alt="...">
                  <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title"><strong><?= $value->libelle ?></strong></h5>
                    <p class="card-text"><?= $value->fabricant ?></p>
                    <a href="../controlers/produit.ctrl.php?refProduit=<?= $value->refProduit ?>" class="btn btn-primary plusdinfo pr-0 pl-0" style="width: 60%;">+ D'infos</a>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div class="col-lg-12">
                <h2 class="mb-4 rayonFamille" style="color: #f04942;">Découvrez nos produits</h2>
                <p> <strong>Sur ces quelques pages, vous pourrez découvrir tous les produits que nous proposons en magasin.</strong> </p>
                <p>Vous découvrirez également d'où viennent nos produits car les producteurs sont au cœur de notre projet ! Le contact humain, la simplicité, l’authenticité, la transparence, la confiance sont à la base de nos contacts avec eux.</p>
                <p>Nous les avons choisi de par leur proximité géographique et par leur qualité (bio ou raisonné). Nous savons d’où viennent nos produits, comment ils sont « fabriqués » et par qui. Les produits proposés sont de saison. Impossible donc de trouver des tomates en hiver chez nous ! </p>
                <p>Quelques exceptions dérogent à la règle : certains indispensables du quotidien ne sont pas produits chez nous comme le sucre ou le cacao. Nous travaillons avec des distributeurs et avons privilégié le bio.</p>
                <p>Sur ce site, vous trouverez donc une liste non-exhaustive de ce que nous pouvons avoir en magasin en fonction de la saisonnalité et des disponibilités chez les producteurs : des pâtes, des tisanes, des lentilles, des fruits, des légumes, des huiles et vinaigres, de la bière, des jus de fruits etc... mais aussi des produits cosmétiques, des produits d’entretien...</p>
                <p><strong>Bonne visite et à bientôt au magasin !</strong></p>
              </div>
            <?php endif; ?>

          </div>
        </div>

      </div>

    </div>

    <?php include("../view/footer.php") ?>

  </body>
</html>
