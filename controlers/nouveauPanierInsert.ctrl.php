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
if(!isset($_POST['prod']))
{
  exit("Erreur : composition non définie");
}
else if(!isset($_POST['active']))
{
  $active=0;
}
//
foreach($_POST as $key => $value) {
  $$key = $value;
  echo "$key : $value";
  echo"<br>";
}

// // Gestion de l'image

echo "je suis là";

if (isset($_FILES['imgPanier']) AND $_FILES['imgPanier']['error'] == 0)
{
  echo "je suis là";
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

echo "je suis là";
// echo $image;
// echo"<br>";
// print_r($prod);
//
// //
// Creation d'une instance DAO
$catalogue = new PanierDAO();
//insertion du nouveau panier dans la table paniers
$catalogue->insertPanier($libelle, $coefficient, $prix, $nomFichier, $nbBocaux, $active);
$refPanier = $catalogue->getMaxRefPanier();
echo "je suis là";
//Insertion de la composition du panier dans la table produits_paniers

foreach ($prod as $value) {
  $temp = explode("_",$value);
  print_r($temp);
  $catalogue->insertProduitPanier($temp[0], $refPanier,$temp[1]);
  echo"<br>";
}

// foreach ($prod as $key => $value) {
//   //$temp = explode("_",$produit);
//   echo $produitttttt;
//   echo"<br>";
//   //$catalogue->insertProduitPanier($temp[0], $refPanier,$temp[1]) //$prod[0] = refProduit; $prod[1] = quantite
// }
// //
// $view = new View("nouveauProduit.view.php");
//
// $view->sent = 1;
//
// $view->show();

?>
