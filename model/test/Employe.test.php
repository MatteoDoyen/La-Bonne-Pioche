<?php

  require_once("../Employe.class.php");


  //variables de constructions (servent aux tests)
  $refUtilisateur = 1;
  $nom = 'Fricaud-Lecorre';
  $prenom = 'Matteo';
  $adresseMail = 'fricaud-lecorre.matteo@thotmail.com';
  $motDePasse = 'Provence4';
  $etat = "actif";
  $statut = true;

  $e_test = new Employe($refUtilisateur ,$nom, $prenom,$adresseMail, $motDePasse, $etat, $statut);

  //affichage instance
  $e_test->affiche();

  //test de la fonction magique get
  if($e_test->refUtilisateur != $refUtilisateur){

    echo "l'attribut refUtilisateur => $refUtilisateur n'a pas été récupérée\n";
  }
  elseif($e_test->nom != $nom) {

    echo "l'attribut nom => $nom n'a pas été récupérée\n";
  }
  elseif ($e_test->prenom != $prenom) {

    echo "l'attribut prenom => $prenom n'a pas été récupérée\n";
  }
  elseif ($e_test->adresseMail != $adresseMail) {

    echo "l'attribut adresseMail => $adresseMail n'a pas été récupérée\n";
  }
  elseif ($e_test->motDePasse != $motDePasse) {

    echo "l'attribut motDePasse => $motDePasse n'a pas été récupérée\n";
  }
  elseif ($e_test->etat != $etat) {

    echo "l'attribut etat => $etat n'a pas été récupérée\n";
  }
  elseif ($e_test->statut != $statut) {

    echo "l'attribut etat => $statut n'a pas été récupérée\n";
  }
  else {

    echo "OK : les guetteurs fonctionnent pour la classe Utilisateur\n";
  }


  //test de la fonction magique set

  //utilisation de set
  $e_test->refUtilisateur = 2;
  $e_test->nom = 'Lievre-Doyen';
  $e_test->prenom = 'Charles';
  $e_test->adresseMail = 'lievre-doyen.charles@thotmail.com';
  $e_test->motDePasse = 'huitre';
  $e_test->etat = 'en cours';
  $e_test->statut = false;

  //affichage instance
  $e_test->affiche();

  //test de la fonction magique set
  if($e_test->refUtilisateur == $refUtilisateur){

    echo "l'attribut refUtilisateur => $refUtilisateur n'a pas été modifié\n";
  }
  elseif($e_test->nom == $nom) {

    echo "l'attribut nom => $nom n'a pas été modifié\n";
  }
  elseif ($e_test->prenom == $prenom) {

    echo "l'attribut prenom => $prenom n'a pas été modifié\n";
  }
  elseif ($e_test->adresseMail == $adresseMail) {

    echo "l'attribut adresseMail => $adresseMail n'a pas été modifié\n";
  }
  elseif ($e_test->motDePasse == $motDePasse) {

    echo "l'attribut motDePasse => $motDePasse n'a pas été modifié\n";
  }
  elseif ($e_test->etat == $etat) {

    echo "l'attribut etat => $etat n'a pas été modifié\n";
  }
  elseif ($e_test->statut == $statut) {

    echo "l'attribut etat => $statut n'a pas été modifié\n";
  }
  else {

    echo "OK : les setteurs fonctionnent pour la classe Utilisateur\n";
  }

?>
