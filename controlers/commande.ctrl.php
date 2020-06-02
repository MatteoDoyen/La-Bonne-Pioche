<?php
session_start();
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
// récupération des valeurs de la query string
  if (isset($_GET['refCommande'])) {
    $refCommande = intVal($_GET['refCommande']);
  } else {
    exit("Erreur : refCommande non définie");
  }

  // Creation de l'instance DAO
  $catalogue = new CommandeDAO();
  $paniers = new PanierDAO();

  // Récupération de la commande correspondant à l'id
  $commande = $catalogue->get($refCommande);

  // Traitement de la date pour la rendre facilement lisible
  $tmpDC = $commande->dateCommande;
  $tmpDP = $commande->dateRecup;

  $DC_DH = explode(' ' , $tmpDC);
  $DC = explode('-',$DC_DH[0]);
  $commande->dateCommande = $DC[2]."/".$DC[1]."/".$DC[0]." ".$DC_DH[1];

  $DP_DH = explode(' ' , $tmpDP);
  $DP = explode('-',$DP_DH[0]);
  $commande->dateRecup = $DP[2]."/".$DP[1]."/".$DP[0]." ".$DP_DH[1];


  $descriptif = $catalogue->getComposition($refCommande);
  $client = $catalogue->getClient($refCommande);
  $adresse = $catalogue->getAdresseRecup($refCommande);
  $compos = $catalogue->getProduitsCommande($refCommande);

  ///////// AJOUTE POUR MVC
  $view = new View("../view/commande.view.php");

  // Passage des paramètres à la vue
  $view->commande=$commande;
  $view->descriptif=$descriptif;
  $view->client=$client;
  $view->adresse=$adresse;
  $view->compos=$compos;

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
