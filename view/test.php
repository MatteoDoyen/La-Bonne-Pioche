<!DOCTYPE html>
<?php
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['imgProduit']) AND $_FILES['imgProduit']['error'] == 0)
{
  // Testons si le fichier ne fait pas plus de 1 Mo
  if ($_FILES['imgProduit']['size'] <= 1000000)
  {
    // Testons si l'extension est autorisée
    $infosfichier = pathinfo($_FILES['imgProduit']['name']);
    $extension_upload = $infosfichier['extension'];
    $extensions_autorisees = array('jpg', 'jpeg','png');

    if (in_array($extension_upload, $extensions_autorisees))
    {
      // On peut valider le fichier et le stocker définitivement
      move_uploaded_file($_FILES['imgProduit']['tmp_name'], 'uploads/' . basename($_FILES['imgProduit']['name']));
      echo "L'envoi a bien été effectué !";
    }

  }
}
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  </body>
</html>
