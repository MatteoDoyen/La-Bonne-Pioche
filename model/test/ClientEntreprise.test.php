<?php

  //require_once("../Utilisateur.class.php");
  require_once("../ClientEntreprise.class.php");

  //variables de constructions (servent aux tests)
  $refUtilisateur = 1;
  $nom = 'Fricaud-Lecorre';
  $prenom = 'Matteo';
  $adresseMail = 'fricaud-lecorre.matteo@thotmail.com';
  $motDePasse = 'Provence4';
  $etat = "actif";
  $newsletter = true;
  $genre = true;
  $numeroTelephone = "0455674355";
  $tauxReduction = 10.3;

  $c_test = new ClientEntreprise($refUtilisateur, $nom, $prenom, $adresseMail, $motDePasse, $etat, $newsletter, $genre, $numeroTelephone, $tauxReduction);

  //affichage instance
  $c_test->affiche();

  //test de la fonction magique get
  if($c_test->refUtilisateur != $refUtilisateur){

    echo "l'attribut refUtilisateur => $refUtilisateur n'a pas été récupérée\n";
  }
  elseif($c_test->nom != $nom) {

    echo "l'attribut nom => $nom n'a pas été récupérée\n";
  }
  elseif ($c_test->prenom != $prenom) {

    echo "l'attribut prenom => $prenom n'a pas été récupérée\n";
  }
  elseif ($c_test->adresseMail != $adresseMail) {

    echo "l'attribut adresseMail => $adresseMail n'a pas été récupérée\n";
  }
  elseif ($c_test->motDePasse != $motDePasse) {

    echo "l'attribut motDePasse => $motDePasse n'a pas été récupérée\n";
  }
  elseif ($c_test->etat != $etat) {

    echo "l'attribut etat => $etat n'a pas été récupérée\n";
  }
  elseif ($c_test->newsletter != $newsletter) {

    echo "l'attribut newsletter => $newsletter n'a pas été récupérée\n";
  }
  elseif ($c_test->genre != $genre) {

    echo "l'attribut genre => $genre n'a pas été récupérée\n";
  }
  elseif ($c_test->numeroTelephone != $numeroTelephone) {

    echo "l'attribut numeroTelephone => $numeroTelephone n'a pas été récupérée\n";
  }
  elseif ($c_test->tauxReduction != $tauxReduction) {

    echo "l'attribut tauxReduction => $tauxReduction n'a pas été récupérée\n";
  }
  else {

    echo "OK : les guetteurs fonctionnent pour la classe Utilisateur\n";
  }


  //test de la fonction magique set

  //utilisation de set
  $c_test->refUtilisateur = 2;
  $c_test->nom = 'Lievre-Doyen';
  $c_test->prenom = 'Charles';
  $c_test->adresseMail = 'lievre-doyen.charles@thotmail.com';
  $c_test->motDePasse = 'houite';
  $c_test->etat = "en cours";
  $c_test->newsletter = false;
  $c_test->genre = false;
  $c_test->numeroTelephone = "0602285492";
  $c_test->tauxReduction = 12.3;

  //affichage instance
  $c_test->affiche();

  //test de la fonction magique set
  if($c_test->refUtilisateur == $refUtilisateur){

    echo "l'attribut refUtilisateur => $refUtilisateur n'a pas été modifié\n";
  }
  elseif($c_test->nom == $nom) {

    echo "l'attribut nom => $nom n'a pas été modifié\n";
  }
  elseif ($c_test->prenom == $prenom) {

    echo "l'attribut prenom => $prenom n'a pas été modifié\n";
  }
  elseif ($c_test->adresseMail == $adresseMail) {

    echo "l'attribut adresseMail => $adresseMail n'a pas été modifié\n";
  }
  elseif ($c_test->motDePasse == $motDePasse) {

    echo "l'attribut motDePasse => $motDePasse n'a pas été modifié\n";
  }
  elseif ($c_test->etat == $etat) {

    echo "l'attribut etat => $etat n'a pas été modifié\n";
  }
  elseif ($c_test->newsletter == $newsletter) {

    echo "l'attribut newsletter => $newsletter n'a pas été modifié\n";
  }
  elseif ($c_test->genre == $genre) {

    echo "l'attribut genre => $genre n'a pas été modifié\n";
  }
  elseif ($c_test->numeroTelephone == $numeroTelephone) {

    echo "l'attribut numeroTelephone => $numeroTelephone n'a pas été modifié\n";
  }
  elseif ($c_test->tauxReduction == $tauxReduction) {

    echo "l'attribut tauxReduction => $tauxReduction n'a pas été modifié\n";
  }
  else {

    echo "OK : les setteurs fonctionnent pour la classe Utilisateur\n";
  }

?>


?>
