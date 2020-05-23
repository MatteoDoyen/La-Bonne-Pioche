<?php
// Display un produit connu par son Id
// Inclusion du modèle
require_once('../model/Utilisateur.class.php');
require_once('../model/Client.class.php');
require_once('../model/ClientDAO.class.php');
require_once('../model/ClientEntreprise.class.php');
require_once('../model/ClientEntrepriseDAO.class.php');
require_once('../model/Employe.class.php');
require_once('../model/EmployeDAO.class.php');

require_once('../framework/view.class.php'); // AJOUTE POUR MVC

// récupération des valeurs de la query string
if (isset($_GET['refUtilisateur'])) {
  $id = intVal($_GET['refUtilisateur']);
} else {
  exit("Erreur : refUtilisateur non définie");
}

// Creation de l'instance DAO
$annuaire_c = new ClientDAO();
$annuaire_ce = new ClientEntrepriseDAO();
$annuaire_e = new EmployeDAO();

// Récupération de l'objet utilisateur correspondant à l'id
if($annuaire_e->get($id)){
  //si l'id apparaît dans la table employes
};

///////// AJOUTE POUR MVC
$view = new View("utilisateur.view.php");

// Passage des paramètres à la vue
$view->annuaire_c=$annuaire_c;
$view->annuaire_ce=$annuaire_ce;
$view->annuaire_e=$annuaire_e;

// Appel de la vue
$view->show();
?>
