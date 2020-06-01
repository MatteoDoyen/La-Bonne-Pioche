<?php
session_start();
// Display tous les produits
// Inclusion du modèle
require_once('../model/Commande.class.php');
require_once('../model/CommandeDAO.class.php');
require_once('../framework/view.class.php'); // AJOUTE POUR MVC

if(isset($_SESSION['Utilisateur']))
{
  $statut=-1;
  foreach ($_SESSION['Utilisateur'] as $key => $value) {
    $$key = $value;
  }
  if($statut>=0)
  {

    // Creation de l'instance DAO
    $commandes = new commandeDAO();

    // Récupération des données à placer dans la vue à partir du modèle
    $list = $commandes->getAll();

    // On créer une variable view que l'on rattache au fichier accueil.view.php
    $view = new View("../view/commandes.view.php");

    // Envoie la liste des produits à la vue
    $view->list=$list;

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
