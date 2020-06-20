<?php
session_start();

require_once('../model/PanierDAO.class.php');
require_once('../model/PanierDAO.class.php');
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
        exit("Erreur : libelle non définie");
    }
    if(!isset($_POST['refPanier']))
    {
        exit("Erreur : refPanier non définie");
    }



    // Creation de l'instance DAO
    $catalogue = new PanierDAO();

    $libelle = $_POST['libelle'];

    $catalogue->desactiverPanier($_POST['refPanier']);

    //ici on utilise header et non pas une vue, pour empecher que si l'employe
    // refresh, le formulaire s'envoie une seconde fois
    header("Location: ../controlers/consulterPaniers.ctrl.php?libelleSupprimer=$libelle");

  }
  else {
    exit("Il faut être employé pour pouvoir accèder à cet page");
  }
  }

  else {
  exit("Il faut être connecté et employé pour pouvoir accèder à cet page");
  }

?>
