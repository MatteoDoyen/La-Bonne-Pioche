<?php
require_once('../model/Panier.class.php');
require_once('../model/PanierDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

if(!isset($_POST['libelle']))
{
  exit("Erreur : refPanier non définie");
}
if(!isset($_POST['coefficient']))
{
  exit("Erreur : coefficient non définie");
}
if(!isset($_POST['prix']))
{
  exit("Erreur : prix non définie");
}
if(!isset($_POST['nbBocaux']))
{
  exit("Erreur : nombre de bocaux non définie");
}
else if(!isset($_POST['active']))
{
  $active=0;
}

foreach($_POST as $key => $value) {
  $$key = $value;
}

// Gestion de l'image
if (isset($_FILES['imgPanier']) AND $_FILES['imgPanier']['error'] == 0)
{
  // Testons si le fichier n'est pas trop gros
  if ($_FILES['imgPanier']['size'] <= 1000000)
  {
    // Testons si l'extension est autorisée
    $infosfichier = pathinfo($_FILES['imgPanier']['name']);
    $extension_upload = $infosfichier['extension'];
    $extensions_autorisees = array('jpg', 'jpeg','png');

    if (in_array($extension_upload, $extensions_autorisees))
    {
      $nomFichier = $libelle.'.'.$infosfichier['extension'];
      $image = dirname(__DIR__, 1).'/data/img/img_paniers/' .$nomFichier;
      $image = str_replace("\\","/",$image);
      // On peut valider le fichier et le stocker définitivement
      move_uploaded_file($_FILES['imgPanier']['tmp_name'], $image);
    }
  }
}

// Creation de l'instance DAO
$catalogue = new PanierDAO();

$catalogue->insertPanier($libelle, $coefficient, $prix, $image, $nbBocaux, $active);

/* Insertion de la composition du panier dans produits paniers
foreach ($variable as $key => $value) {
  $catalogue->insertProduitPanier($refProduit, $refPanier,$quantite)
}*/

$view = new View("nouveauProduit.view.php");

$view->sent = 1;

$view->show();

?>
