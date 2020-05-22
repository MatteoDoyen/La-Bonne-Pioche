<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>La Bonne Pioche - PanierAchat</title>
    <link rel="stylesheet" href="../framework/bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../view/css/panierAchat.view.css">
  </head>

  <body>
    <div class="container-fluid">
      <?php include("navbar.php") ?>

      <h2>Ajouter un nouveau produit</h2>

      <body>

      <form action="../controlers/nouveauProduit.ctrl.php" method="post">

      Quantité en stock: <input type="number" name="stock"><br>
      Libellé : <input type="text" name="libelle"><br>
      Fabricant : <input type="text" name="fabricant"><br>
      Rayon où se trouve le produit : <input type="text" name="rayon"><br>
      Famille du produit : <input type="text" name="famille"><br>
      Coefficient multiplicateur (à l'ajout de personnes) : <input type="number" step="0.1" name="coef"><br>
      Description : <input type="text" name="description"><br>
      Caractéristiques : <input type="text" name="caracteristiques"><br>
      Prix Unitaire (pour la quantité minimale vendue) : <input type="number" step="0.01" name="prixU"><br>
      Nom de l'image associée : <input type="text" name="urlImg"><br>
      Quantité Unitaire (quantité minimale vendue): <input type="number" name="quantiteU"><br>
      Unité (g / L / cL etc.) : <input type="text" name="unite"><br>
      Article achetable (0 = non, 1 = oui) : <input type="number" name="active"><br>

      <input type="submit">
      </form>

      </body>

      <?php include("footer.php") ?>
    </div>
  </body>

</html>
