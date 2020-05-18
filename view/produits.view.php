<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/produits.view.css">
  </head>
  <body style="margin-top: 200px;">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script defer src="../framework/bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script>

    <div class="container-fluid">

      <?php include("../view/navbar.php") ?>

      <div class="row contenu">

        <ul class="offset-lg-1 col-lg-3 offset-md-1 col-md-3">
          <li>
            <h4>Nos rayons</h4>
          </li>
          <?php foreach ($types as $value): ?>
            <li>
              <div class="dropright">
                <button class="btn dropdown-toggle groupe" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                  <span><?= $value['groupe'] ?></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Total (<?= $value[1][0] ?>)</a>
                  <?php foreach ($value[0] as $key => $value): ?>
                    <?php if (!empty($value)): ?>
                      <a class="dropdown-item" href="#"><?= $value['type']?> (<?= $value['nb'] ?>)</a>
                    <?php else: ?>
                      <a class="dropdown-item" href="#"><?= $value['type']?> (0)</a>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </div>
              </div>
            </li>
          <?php endforeach; ?>


        </ul>

      </div>



      <script type="text/javascript">
        $(function() {
            $('.dropright').hover(function(){
              $('.dropdown-toggle', this).trigger('click');
            });
        });
      </script>

      <?php include("../view/footer.php") ?>

    </div>

  </body>
</html>
