<?php

  session_start();

  $conn = mysqli_connect('localhost:3307', 'root', '', 'db');

  //if the login button is clicked
  if(!$conn){
    echo 'Nu se poate conecta la baza de date.'.mysqli_error($conn);
  }else{
  	$email=$_POST['email'];
    $password=$_POST['password'];
  	//$password=md5($_POST['password']);

    $sql="SELECT * FROM utilizatori WHERE email='$email' AND password='$password' ";
    $rezultat=mysqli_query($conn, $sql);

    $contor=mysqli_num_rows($rezultat);
    if($contor==1){
        while($row=mysqli_fetch_assoc($rezultat)){
          $_SESSION['id']=$row['id'];
          $_SESSION['nume']=$row['nume'];
          $_SESSION['prenume']=$row['prenume'];
          $_SESSION['profilepic']=$row['profilepic'];
          $_SESSION['db']=$row['db'];
        }
      header('location: wellcome.php'); //trimite la homepage
    }
  }
mysqli_close($conn);

 ?>
