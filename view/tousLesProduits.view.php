<?php
    $commencer = false;
    echo('[');
    foreach ($list as $prod)
    {
      if($commencer==true)
      {
        echo(',');
      }

      //reproduction du format JSON, j'ai des erreur si j'encode seulement ce que je récupère
      // c'est la solution la plus simple que j'ai trouver pour contourner ce problème
      $produit = new stdClass();
      $produit->url=$prod->urlImg;
      $produit->name=$prod->libelle;
      $produit->quantite=$prod->quantiteU;
      $produit->unite=$prod->unite;
      $produit->fabricant=$prod->fabricant;
      $produit->refProduit=$prod->refProduit;

      
      $myJSON = json_encode($produit);

      echo $myJSON;
      $commencer = true;
    }
      echo(']');
?>
