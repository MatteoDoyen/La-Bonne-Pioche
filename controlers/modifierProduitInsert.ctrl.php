<?php
session_start();

require_once('../model/Produit.class.php');
require_once('../model/ProduitDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

// Creation de l'instance DAO
$produitDao = new ProduitDAO();

//Verification qu'un Utilisateur est connecté
if(isset($_SESSION['Utilisateur']))
{
  //Verification que l'Utilisateur est un employe
  $statut=-1;
  foreach ($_SESSION['Utilisateur'] as $key => $value) {
    $$key = $value;
  }
  if($statut>=0)
  {
    // on verifie que l'on as bien recupéré toutes les variable requises pour modifier un produit
    if(!isset($_POST['refProduit']))
    {
      exit("Erreur : refProduit non définie");
    }
    if(!isset($_POST['urlImg']))
    {
      exit("Erreur : urlImg non définie");
    }
    if(!isset($_POST['libelle']))
    {
      exit("Erreur : libelle non définie");
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
    else if(!isset($_POST['origine']))
    {
      exit("Erreur : origine non définie");
    }
    else if(!isset($_POST['active']))
    {
      $produitDao->desactiverProduit($_POST['refProduit']);
    }
    else {

          foreach($_POST as $key => $value) {
            $$key =  str_replace("'","''",$value);;
          }

          // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
          if (isset($_FILES['imgProduit']) AND $_FILES['imgProduit']['error'] == 0)
          {
            echo"if image";
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
          else {
            $urlImg = explode('/',$urlImg);
            $nomFichier = $urlImg[4];
          }

          $produitDao->modifProduit($_POST['refProduit'],intval($stock),$libelle,$fabricant,$rayon, $famille,floatval($coef), $description,$origine,$rayon,25,$nomFichier,$quantiteU,$unite,$active);

          $libelle = $_POST['libelle'];


          //ici on utilise header et non pas une vue, pour empecher que si l'employe
          // refresh, le formulaire s'envoie une seconde fois
          header("Location: ../controlers/consulterProduits.ctrl.php?modifie=$libelle");

        }
        else {
          exit("Il faut être employé pour pouvoir accèder à cet page");
        }
        }

        else {
        exit("Il faut être connecté et employé pour pouvoir accèder à cet page");
        }
?>
