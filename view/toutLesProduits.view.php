<?php
    $commencer = false;
    echo('[');
    foreach ($list as $prod)
    {
      if($commencer==true)
      {
        echo(',');
      }
      $myObj->name=$prod->libelle;
      $myJSON = json_encode($myObj);

      echo $myJSON;
      $commencer = true;
    }
      echo(']');
?>
