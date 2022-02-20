<?php

  session_start();

  $_SESSION['textpoze'] = $_GET['textpoze'];

  header('location:postare.php');
 ?>
