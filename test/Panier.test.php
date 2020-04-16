<?php

  require_once("../model/Panier.class.php");

  //variables de constructions (servent aux tests)
  $refPanier = 1;
  $intitule = 'Panier1';
  $prix = 10.2;
  $nombrePersonne = 1; //test de la valeur construite par défaut

  $p_test = new Panier($refPanier ,$intitule, $prix);

  //affichage instance
  var_dump($p_test);

  //test de la fonction magique get
  if($p_test->refPanier != $refPanier){

    echo "l'attribut refPanier => $refPanier n'a pas été récupérée\n";
  }
  elseif($p_test->intitule != $intitule) {

    echo "l'attribut intitule => $intitule n'a pas été récupérée\n";
  }
  elseif ($p_test->prix != $prix) {

    echo "l'attribut prix => $prix n'a pas été récupérée\n";
  }
  elseif ($p_test->nombrePersonne != $nombrePersonne) {

    echo "l'attribut nombrePersonne => $nombrePersonne n'a pas été récupérée\n";
  }
  else {

    echo "OK : les guetteurs fonctionnent pour la classe Panier\n";
  }


  //test de la fonction magique set

  //utilisation de set
  $p_test->refPanier = 2;
  $p_test->intitule = 'Panier2';
  $p_test->prix = 4.33;
  $p_test->nombrePersonne = 3;

  //affichage instance
  var_dump($p_test);

  //test de la fonction magique get
  if($p_test->refPanier == $refPanier){

    echo "l'attribut refPanier => $refPanier n'a pas été modifié\n";
  }
  elseif($p_test->intitule == $intitule) {

    echo "l'attribut intitule => $intitule n'a pas été modifié\n";
  }
  elseif ($p_test->prix == $prix) {

    echo "l'attribut prix => $prix n'a pas été modifié\n";
  }
  elseif ($p_test->nombrePersonne == $nombrePersonne) {

    echo "l'attribut nombrePersonne => $nombrePersonne n'a pas été modifié\n";
  }
  else {

    echo "OK : les setteurs fonctionnent pour la classe Panier\n";
  }



?>
