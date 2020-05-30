<?php
session_start();
if(!empty($_SESSION['Utilisateur'])) {
  header('Location: accueil.ctrl.php');
}
require_once("../framework/view.class.php");
require_once("../model/EntrepriseDAO.class.php");
require_once("../model/EmployeDAO.class.php");
require_once("../model/ClientDAO.class.php");

$daoEntreprise = new EntrepriseDAO();
$daoEmploye = new EmployeDAO();
$daoClient = new ClientDao();

if (!empty($_POST)) {

  if (isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['who'])) {
    if (empty($_POST['mdp']) || empty($_POST['email']) || empty($_POST['who'])) {
      $view = new View('../view/connexion.view.php');
      $view->error = "Veuillez remplir la totalité du formulaire.";
      $view->show();
    } else {
      $uti;
      // Si on est un Client
      if ($_POST['who'] === "Client") {
        $uti = $daoClient->getUtilisateurOfThisEmail($_POST['email']);
      // Si on est un Employé
      } else if ($_POST['who'] === "Employé"){
        $uti = $daoEmploye->getUtilisateurOfThisEmail($_POST['email']);
      // Si on est une Entreprise
      } else if ($_POST['who'] === "Entreprise"){
        $uti = $daoEntreprise->getUtilisateurOfThisEmail($_POST['email']);
      }
      if ($uti) {
        if (password_verify($_POST['mdp'] , $uti->motDePasse)) {                // On compare le mot de passe de la base de données et celui entré par l'utilisateur
          $_SESSION['Utilisateur'] = $uti;
          $view = new View('../view/accueil.view.php');
          $view->success = "Connexion réussie ! Bienvenue sur La Bonne Pioche ".$uti->nom." ".$uti->prenom.".";
          $view->show();
        } else {
          $view = new View('../view/connexion.view.php');
          $view->error = "Le mot de passe est incorrect.";
          $view->show();
        }
      } else {
        $view = new View('../view/connexion.view.php');
        $view->error = "Email inconnue.";
        $view->show();
      }
    }
  } else {
    $view = new View('../view/connexion.view.php');
    $view->error = "Veuillez remplir la totalité du formulaire.";
    $view->show();
  }
} else {
  $view = new View('../view/connexion.view.php');
  $view->show();
}


?>
