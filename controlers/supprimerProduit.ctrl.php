<?php
session_start();

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
        exit("Erreur : libelle non définie");
    }
    if(!isset($_POST['refProduit']))
    {
        exit("Erreur : refProduit non définie");
    }



    // Creation de l'instance DAO
    $produitsDao = new ProduitDAO();
    // Récupération des données à placer dans la vue à partir du modèle
    $produitsDao->desactiverProduit($_POST['refProduit']);

    // On créer une variable view que l'on rattache au fichier consulterProduits.view.php
    $view = new View("../controlers/consulterProduits.ctrl.php");

    $view->libelleSupprimer=$_POST['libelle'];
    $view->supprimer=1;
    // Appel de la vue
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
