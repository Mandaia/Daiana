<?php
  session_start();

  $conn = mysqli_connect('localhost:3307', 'root', '', 'db');
  $db=$_SESSION['db'];

  if(!$conn){
    echo'Nu putem accesa baza de date'.mysqli_error($conn);
    }else{
    $id=$_SESSION['id'];
    $pozaprf=$_FILES['pozaprf']['name'];
    $nume = $_POST['nume'];
    $prenume=$_POST['prenume'];
    $dtNastere=$_POST['dtNastere'];
    $sex=$_POST['selectbox'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $locatie=$_POST['locatie'];

    if(empty($pozaprf)){
        $update="UPDATE utilizatori SET nume='$nume',prenume='$prenume',dtNastere='$dtNastere',sex='$sex',email='$email',password='$password',locatie='$locatie' WHERE  id='$id'";

      if(mysqli_query($conn,$update)){
		  $dbu=$_SESSION['db'];
		  $con1 = mysqli_connect('localhost:3307', 'root', '', $dbu);
		  if(!$con1){
		  echo 'eroare';
	  }else{
		  $update="UPDATE about SET nume='$nume',prenume='$prenume',dtNastere='$dtNastere',sex='$sex',email='$email',password='$password',locatie='$locatie',db='$dbu' WHERE  id='$id'";

        header('location: wellcome.php');
	  }
	  }
    }elseif(!empty($pozaprf)){
      $target_dir = "users/".$db."/profilepic/";
      $target_file = $target_dir.basename($_FILES["pozaprf"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }

      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
      }else {

      if(move_uploaded_file($_FILES["pozaprf"]["tmp_name"], $target_file)) {
		  if(!$conn){
		  echo 'eroare'.$mysqli_error($conn);}
		  else{
        $update1="UPDATE utilizatori SET pozaprf='$pozaprf',nume='$nume',prenume='$prenume',dtNastere='$dtNastere',sex='$sex',email='$email',password='$password',locatie='$locatie' WHERE id='$id'";

      if(mysqli_query($conn,$update1)){
        header('location: wellcome.php');
      }else{
        echo'eroare la actualizare date'.mysqli_error($conn);
      }
	}
	  }
	}
	}
	}

	?>
