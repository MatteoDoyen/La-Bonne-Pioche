<?php

  require_once("../Utilisateur.class.php");


  //variables de constructions (servent aux tests)
  $refUtilisateur = 1;
  $nom = 'Fricaud-Lecorre';
  $prenom = 'Matteo';
  $adresseMail = 'fricaud-lecorre.matteo@thotmail.com';
  $motDePasse = 'Provence4';
  $etat = "actif";
  $numeroTelephone = "0602285492";

  $u_test = new Utilisateur($refUtilisateur ,$nom, $prenom,$adresseMail, $motDePasse, $etat, $numeroTelephone);

  //affichage instance
  $u_test->affiche();

  //test de la fonction magique get
  if($u_test->refUtilisateur != $refUtilisateur){

    echo "l'attribut refUtilisateur => $refUtilisateur n'a pas été récupérée\n";
  }
  elseif($u_test->nom != $nom) {

    echo "l'attribut nom => $nom n'a pas été récupérée\n";
  }
  elseif ($u_test->prenom != $prenom) {

    echo "l'attribut prenom => $prenom n'a pas été récupérée\n";
  }
  elseif ($u_test->adresseMail != $adresseMail) {

    echo "l'attribut adresseMail => $adresseMail n'a pas été récupérée\n";
  }
  elseif ($u_test->motDePasse != $motDePasse) {

    echo "l'attribut motDePasse => $motDePasse n'a pas été récupérée\n";
  }
  elseif ($u_test->etat != $etat) {

    echo "l'attribut etat => $etat n'a pas été récupérée\n";
  }
  elseif ($u_test->numeroTelephone != $numeroTelephone) {

    echo "l'attribut numeroTelephone => $numeroTelephone n'a pas été récupérée\n";
  }
  else {

    echo "OK : les guetteurs fonctionnent pour la classe Utilisateur\n";
  }


  //test de la fonction magique set

  //utilisation de set
  $u_test->refUtilisateur = 2;
  $u_test->nom = 'Lievre-Doyen';
  $u_test->prenom = 'Charles';
  $u_test->adresseMail = 'lievre-doyen.charles@thotmail.com';
  $u_test->motDePasse = 'huitre';
  $u_test->etat = 'desactive';
  $u_test->numeroTelephone = "0405662322";

  //affichage instance
  $u_test->affiche();

  //test de la fonction magique set
  if($u_test->refUtilisateur == $refUtilisateur){

    echo "l'attribut refUtilisateur => $refUtilisateur n'a pas été modifié\n";
  }
  elseif($u_test->nom == $nom) {

    echo "l'attribut nom => $nom n'a pas été modifié\n";
  }
  elseif ($u_test->prenom == $prenom) {

    echo "l'attribut prenom => $prenom n'a pas été modifié\n";
  }
  elseif ($u_test->adresseMail == $adresseMail) {

    echo "l'attribut adresseMail => $adresseMail n'a pas été modifié\n";
  }
  elseif ($u_test->motDePasse == $motDePasse) {

    echo "l'attribut motDePasse => $motDePasse n'a pas été modifié\n";
  }
  elseif ($u_test->etat == $etat) {

    echo "l'attribut etat => $etat n'a pas été modifié\n";
  }
  elseif ($u_test->numeroTelephone == $numeroTelephone) {

    echo "l'attribut numeroTelephone => $numeroTelephone n'a pas été modifié\n";
  }
  else {

    echo "OK : les setteurs fonctionnent pour la classe Utilisateur\n";
  }

  //test sur le filtre de l'attribut etat du setteur
  $u_test->etat = "salut";

  if( $u_test->etat != "enAttente" ) {

    echo "le filtre d'etat ne fonctionne pas\n";
  }
  else {

    echo "OK : le filtre d'etat fonctionne\n";
  }

  $u_test->affiche();

?>
