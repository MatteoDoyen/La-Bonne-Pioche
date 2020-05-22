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

      <label for="stock">Quantité en stock:</label><input type="number" id="stock" name="stock"><br>
      <label for="libelle">Libellé :</label> <input type="text" id="libelle" name="libelle"><br>
      <label for="fabricant">Fabricant :</label> <input type="text" id="fabricant" name="fabricant"><br>
      <label for="rayon">Rayon où se trouve le produit :</label> <input type="text" id="rayon" name="rayon"><br>
      <label for="famille">Famille du produit :</label> <input type="text" id="famille" name="famille"><br>
      <label for="coef">Coefficient multiplicateur (à l'ajout de personnes) :</label> <input type="number" id="coef" step="0.1" name="coef"><br>
      <label for="description">Description :</label> <input type="text" id="description" name="description"><br>
      <label for="caracteristiques">Caractéristiques :</label> <input type="text" id="caracteristiques" name="caracteristiques"><br>
      <label for="prixU">Prix Unitaire (pour la quantité minimale vendue) :</label> <input type="number" id="prixU" step="0.01" name="prixU"><br>
      <label for="urlImg">Nom de l'image associée :</label> <input type="text" id="urlImg" name="urlImg"><br>
      <label for="quantiteU">Quantité Unitaire (quantité minimale vendue):</label> <input type="number" id="quantiteU" name="quantiteU"><br>
      <label for="unite">Unité (g / L / cL etc.) :</label> <input type="text" id="unite" name="unite"><br>
      <label for="active">Article achetable (0 = non, 1 = oui) :</label> <input type="number" id="active" name="active"><br>

      <input type="submit">
      </form>

      </body>

      <?php include("footer.php") ?>
    </div>
  </body>

</html>
