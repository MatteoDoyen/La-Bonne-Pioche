<?php
    $commencer = false;
    echo('[');
    foreach ($list as $prod)
    {
      if($commencer==true)
      {
        echo(',');
      }
      $produit->name=$prod->urlImg;
      $produit->quantite=$prod->quantiteU;
      $produit->unite=$prod->unite;
      $produit->fabricant=$prod->fabricant;

      //$myObj->name=$prod->libelle;
      $myJSON = json_encode($produit);

      echo $myJSON;
      $commencer = true;
    }
      echo(']');
?>
