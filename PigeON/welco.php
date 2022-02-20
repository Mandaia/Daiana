<?php

  session_start();

  /*if(isset($_POST['cauta'])){
    $_SESSION['login']=1;

  header('Location: pagsearch.php');
}*/

  if(isset($_POST['nume'])){
    $_SESSION['login']=1;

  header('Location: profilulmeu.php');
}

if(isset($_POST['logout'])){
  session_start();
  session_unset();
  session_destroy();

header('Location: index.php');
}

 ?>
