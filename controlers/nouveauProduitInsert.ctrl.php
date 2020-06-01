<?php
session_start();

require_once('../model/Produit.class.php');
require_once('../model/ProduitDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

if(isset($_SESSION['Utilisateur']))
{
  $statut=-1;
  foreach ($_SESSION['Utilisateur'] as $key => $value) {
    $$key = $value;
  }
  if($statut>=0)
  {

if(!isset($_POST['libelle']))
{
  exit("Erreur : refProduit non définie");
}
else if(!isset($_POST['fabricant']))
{
  exit("Erreur : fabricant non définie");
}
else if(!isset($_POST['rayon']))
{
  exit("Erreur : rayon non définie");
}
else if(!isset($_POST['famille']))
{
  exit("Erreur : famille non définie");
}
else if(!isset($_POST['coef']))
{
  exit("Erreur : coef non définie");
}
else if(!isset($_POST['prixU']))
{
  exit("Erreur : prixU non définie");
}
else if(!isset($_POST['quantiteU']))
{
  exit("Erreur : quantiteU non définie");
}
else if(!isset($_POST['unite']))
{
  exit("Erreur : unite non définie");
}
else if(!isset($_POST['stock']))
{
  exit("Erreur : stock non définie");
}
else if(!isset($_POST['description']))
{
  exit("Erreur : description non définie");
}
else if(!isset($_POST['caracteristiques']))
{
  exit("Erreur : caracteristiques non définie");
}
else if(!isset($_POST['active']))
{
  $active=0;
}

foreach($_POST as $key => $value) {
  $$key = $value;
}

// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['imgProduit']) AND $_FILES['imgProduit']['error'] == 0)
{
  // Testons si le fichier n'est pas trop gros
  if ($_FILES['imgProduit']['size'] <= 1000000)
  {
    // Testons si l'extension est autorisée
    $infosfichier = pathinfo($_FILES['imgProduit']['name']);
    $extension_upload = $infosfichier['extension'];
    $extensions_autorisees = array('jpg', 'jpeg','png');

    if (in_array($extension_upload, $extensions_autorisees))
    {
      $nomFichier = $libelle.'.'.$infosfichier['extension'];
      $urlImg = dirname(__DIR__, 1).'/data/img/img_produits/' .$nomFichier;
      $urlImg = str_replace("\\","/",$urlImg);
      // On peut valider le fichier et le stocker définitivement
      move_uploaded_file($_FILES['imgProduit']['tmp_name'], $urlImg);
    }
  }
}

// Creation de l'instance DAO
$catalogue = new ProduitDAO();

$catalogue->insertProduit($stock, $libelle, $fabricant, $rayon, $famille, $coef, $description,
      $origine, $caracteristiques, $prixU, $nomFichier, $quantiteU, $unite, $active);

$view = new View("nouveauProduit.view.php");


$view->sent = 1;

$view->show();
}
else {
  exit("Le statut renvoie une erreur");
}
}

else {
exit("Il faut être employés pour avoir accès à ce module");
}
?>
