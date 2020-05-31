<?php
require_once('../framework/view.class.php');
// On démarre la session
session_start ();
// On détruit les variables de notre session
session_unset ();
// On détruit notre session
session_destroy ();
// On redirige le visiteur vers la page d'accueil
$view = new View("../view/accueil.view.php");
$view->success = "Déconnexion réussie.";
$view->show();
?>
