<?php

// if(isset($_GET['libelle']))
// {
//   echo "yes";
// }
// if(isset($_GET['bocaux']))
// {
//   echo "yes";
// }
// if(isset($_GET['coefficient']))
// {
//   echo "yes";
// }
// if(isset($_GET['prix']))
// {
//   echo "yes";
// }

if (isset($_POST['prod'])) {
  echo "yes";
}
foreach ($_POST['prod'] as $value) {
  echo $value;
  echo"<br>";
}

 ?>
