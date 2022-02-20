<?php

  session_start();

  $_SESSION['editeaza'] = $_GET['editeaza'];

  header('location:editareprf.php');
 ?>
