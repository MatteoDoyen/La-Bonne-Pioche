<?php
require_once("../framework/view.class.php");
require_once("../model/EntrepriseDAO.class.php");
require_once("../model/EmployeDAO.class.php");
require_once("../model/ClientDAO.class.php");

$daoEntreprise = new EntrepriseDAO();
$daoEmploye = new EmployeDAO();
$daoClient = new ClientDao();

if (!empty($_POST)) {

  // Traitement pour l'inscription d'un clientEntreprise
  if ($_POST['who'] === 'Entreprise') {
    if (isset($_POST['genre']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['mdp']) && isset($_POST['mdp_conf']) && isset($_POST['who']) && isset($_POST['conditions'])) {
      if (empty($_POST['genre']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['tel']) || empty($_POST['who']) || empty($_POST['nom_entreprise'])) {
        $view = new View('../view/inscription.view.php');
        $view->noms = $daoEntreprise->getAllEntreprises();
        $view->error = "Veuillez remplir la totalité des champs.";
        $view->show();
      } else if ($_POST['mdp'] !== $_POST['mdp_conf']) {
        $view = new View('../view/inscription.view.php');
        $view->noms = $daoEntreprise->getAllEntreprises();
        $view->error = "Veuillez saisir des mots de passe identique.";
        $view->show();
      } else {
        $mdp = password_hash($_POST['mdp'],PASSWORD_DEFAULT);
        if ($daoClient->getUtilisateursEmail($_POST['email']) !== null) {
          $newsletter = 0;
          if (isset($_POST['newsletter'])) {
            if ($_POST['newsletter'] == 'on') {
              $newsletter = 1;
            }
          }
          $genre = 0;
          if ($_POST['genre'] === "Femme") {
            $genre = 1;
          }
          $daoEntreprise->addClientEntreprise($_POST['nom'], $_POST['prenom'], $_POST['email'], $mdp, $_POST['tel'], $newsletter, $genre, $_POST['nom_entreprise']);
          $view = new View('../view/accueil.view.php');
          $view->success = "Inscription réussie ! N'hésitez pas à vous connecter.";
          $view->show();
        } else {
          $view = new View('../view/inscription.view.php');
          $view->noms = $daoEntreprise->getAllEntreprises();
          $view->error = "Cette email est déjà utilisée.";
          $view->show();
        }
      }
    } else {
      $view = new View('../view/inscription.view.php');
      $view->noms = $daoEntreprise->getAllEntreprises();
      $view->error = "Veuillez remplir la totalité des champs.";
      $view->show();
    }

  // Enregistrement d'un employé ou d'un client basique
  } else {
    if (isset($_POST['genre']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['mdp']) && isset($_POST['mdp_conf']) && isset($_POST['who']) && isset($_POST['conditions'])) {
      if (empty($_POST['genre']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['tel']) || empty($_POST['who'])) {
        $view = new View('../view/inscription.view.php');
        $view->noms = $daoEntreprise->getAllEntreprises();
        $view->error = "Veuillez remplir la totalité des champs.";
        $view->show();
      } else if ($_POST['mdp'] !== $_POST['mdp_conf']) {
        $view = new View('../view/inscription.view.php');
        $view->noms = $daoEntreprise->getAllEntreprises();
        $view->error = "Veuillez saisir des mots de passes identiques.";
        $view->show();
      } else {
        $mdp = password_hash($_POST['mdp'],PASSWORD_DEFAULT);
        if (!$daoClient->getUtilisateursEmail($_POST['email'])) {
          $newsletter = 0;
          if (isset($_POST['newsletter'])) {
            if ($_POST['newsletter'] == 'on') {
              $newsletter = 1;
            }
          }
          $genre = 0;
          if ($_POST['genre'] === "Femme") {
            $genre = 1;
          }

          // Vérificiation si c'est un employé ou un Client basique
          if ($_POST['who'] === "Employé") {
            $daoEmploye->addEmploye($_POST['nom'], $_POST['prenom'], $_POST['email'], $mdp, $_POST['tel']);
            $view = new View('../view/accueil.view.php');
            $view->success = "Inscription réussie ! N'hésitez pas à vous connecter.";
            $view->show();
          } else {
            $daoClient->addClient($_POST['nom'], $_POST['prenom'], $_POST['email'], $mdp, $_POST['tel'], $newsletter, $genre);
            $view = new View('../view/accueil.view.php');
            $view->success = "Inscription réussie ! N'hésitez pas à vous connecter.";
            $view->show();
          }
        } else {
          $view = new View('../view/inscription.view.php');
          $view->noms = $daoEntreprise->getAllEntreprises();
          $view->error = "Cette email est déjà utilisée.";
          $view->show();
        }
      }
    } else {
      $view = new View('../view/inscription.view.php');
      $view->noms = $daoEntreprise->getAllEntreprises();
      $view->error = "Veuillez remplir la totalité des champs.";
      $view->show();
    }
  }


} else {
  $view = new View('../view/inscription.view.php');
  $view->noms = $daoEntreprise->getAllEntreprises();
  $view->show();
}
?>
