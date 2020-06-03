<?php
session_start();

require_once('../model/Panier.class.php');
require_once('../model/PanierDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

//
// Creation d'une instance DAO
$panierDao= new PanierDAO();

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
      exit("Erreur : libelle non définie");
    }
    if(!isset($_POST['refPanier']))
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
    if(!isset($_POST['urlImg']))
    {
      exit("Erreur : input url manquant");
    }
    else if(!isset($_POST['active']))
    {
      $panierDao->desactiverPanier($_POST['refPanier']);
    }

    else {


      foreach($_POST as $key => $value) {
        $$key = $value;
      }

      if (isset($_FILES['imgPanier']) AND $_FILES['imgPanier']['error'] == 0)
      {
        //Testons si le fichier n'est pas trop gros
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
      else {
        $urlImg = explode('/',$urlImg);
        $nomFichier = $urlImg[4];
      }

        //insertion du nouveau panier dans la table paniers

        $panierDao->desactiverPanier($refPanier);

        $panierDao->insertPanier($libelle, $coefficient, $prix, $nomFichier, $nbBocaux, $active);
        $refPanier = $panierDao->getMaxRefPanier();
        //Insertion de la composition du panier dans la table produits_paniers

        foreach ($prod as $value) {
          $temp = explode("_",$value);
          $panierDao->insertProduitPanier($temp[0], $refPanier,$temp[1]);
        }
      }

    $libelle = $_POST['libelle'];

    header("Location: ../controlers/consulterPaniers.ctrl.php?libelleModifie=$libelle");
}
else {
  exit("Le statut renvoie une erreur");
}
}

else {
exit("Il faut être employés pour avoir accès à ce module");
}

?>
