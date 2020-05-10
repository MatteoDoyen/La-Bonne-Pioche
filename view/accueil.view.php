<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../view/css/style.css">
  <link rel="stylesheet" href="../view/css/acceuil-style.css">
  <title>La bonne pioche</title>
</head>
<body> 
  <header>
    <div class="bloc-header">
      <div class="container">
        <img src="img/logo.png" alt="">
        <div class="titre-header">
          <h1>La Bonne Pioche</h1>
          <h3>L'épicerie Grenobloise de produits Locaux sans emballage</h3>
        </div>
      </div>
      <nav>
        <ul>
          <li><a class="lien-courant" href="acceuil.php" selected>Accueil</a></li>
          <li><a href="../view/nous.php">Nous</a></li>
          <li><a href="#">Mode d'emploi</a></li>
          <li><a href="#">Produits</a></li>
          <li><a href="#">Actualités</a></li>
          <li><a href="#">Nous trouver</a></li>
          <li><a href="#">Panier</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <div class="corp">
    <div class="bloc">
      <h2>À vos bocaux,<br>Prêts...<br><span>Partez ! </span></h2>
      <div class="actualites">
        <a href="#">Nouvelles Fraiches</a>
      </div>
      <div class="concept">
        <a href="#">Notre concept</a>
      </div>

    </div>
  </div>
  <div class="newsletter">
    <p>Vous souhaitez recevoir des nouvelles fraîches ?<br><span>Abonnez-vous à notre newsletter !</span></p>
    <form class="" action="index.html" method="post">
      <input type="email" name="email-newsletter" placeholder="Email">
    </form>
  </div>
  <footer>
    <p>© <?php echo date("Y"); ?> La Bonne Pioche Grenoble - 2, rue Condillac 38000 Grenoble - 821 482 262 R.C.S. Grenoble<br>Illustrations de Louise Plantin<br>"Pour votre santé, pratiquez une activité physique régulière"</p>
  </footer>
</body>

</html>
