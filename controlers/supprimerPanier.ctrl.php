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

    header("Location: ../controlers/consulterPaniers.ctrl.php?libelleSupprimer=$libelle");

}
else {
  exit("Le statut renvoie une erreur");
}
}

else {
exit("Il faut être employés pour avoir accès à ce module");
}

?>
