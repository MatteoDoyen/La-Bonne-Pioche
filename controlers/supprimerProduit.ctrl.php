<?php
session_start();

require_once('../model/ProduitDAO.class.php');
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
    if(!isset($_POST['refProduit']))
    {
        exit("Erreur : refProduit non définie");
    }

    $view = new View("../controlers/consulterProduits.ctrl.php");

    $panierDao = new PanierDAO();
    //on verifie le nombre de panier dans lequel se trouve le produits
    //si le produit se trouve dans un panier
    $refPaniers = $panierDao->getPanierProduit($_POST['refProduit']);
    if($refPaniers!=NULL)
    {
      $tabLibellePaniers = array();
      foreach ($refPaniers[0] as $key => $refPanier) {
        $tabLibellePaniers[]=$panierDao->get($refPanier)->libelle;
      }
      $view->supprimer=-1;
      $view->tabLibellePaniers = $tabLibellePaniers;

    }
    else
    {
      // Creation de l'instance DAO
      $produitsDao = new ProduitDAO();
      // Récupération des données à placer dans la vue à partir du modèle
      $produitsDao->desactiverProduit($_POST['refProduit']);

      // On créer une variable view que l'on rattache au fichier consulterProduits.view.php
      $view->supprimer=1;
    }
    $view->libelleSupprimer=$_POST['libelle'];
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
