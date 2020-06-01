<?php
session_start();
require_once("../framework/view.class.php");

if(isset($_SESSION['Utilisateur']))
{
  $statut=-1;
  foreach ($_SESSION['Utilisateur'] as $key => $value) {
    $$key = $value;
  }
}



// On créer une variable view que l'on rattache au fichier accueil.view.php
$view = new View('../view/accueil.view.php');
// On l'affiche (cette méthode est défini dans le fichier ../framework/view.class.php).

$view->statut = $statut;

$view->show();

?>
