<?php

	session_start();
	//connect tot the database

	$conn = mysqli_connect('localhost:3307', 'root', '', 'db');

	//the connection is succesfull
	if(!$conn){
		echo 'Nu se poate conecta la baza de date.'.mysqli_error($conn);
	}else{
	$nume=$_POST['nume'];
	$prenume=$_POST['prenume'];
	$dtNastere=$_POST['dtNastere'];
	$sex=$_POST['selectbox'];
	$email=$_POST['email'];
	$password=$_POST['password'];//same as password_hash $password=md5($_POST['password'])
	$locatie=$_POST['locatie'];

	for($i=0;$i<=strpos($email,'@');$i++){
		$b=$i;
	}
	$datb=substr($email,0,$b);

if(strpos($datb,'.')){
	$dbu=str_replace('.','_',$datb);
}elseif(strpos($datb,'-')){
	$dbu=str_replace('-','_',$datb);
}else{
		$dbu=substr($email,0,$b);
}

  //save user to database
  $query="INSERT INTO utilizatori (nume, prenume, dtNastere, sex, email, password, locatie, db) VALUES ('$nume', '$prenume', '$dtNastere', '$sex', '$email', '$password', '$locatie', '$dbu')";
	if (mysqli_query($conn, $query)){
		$crdb="CREATE DATABASE $dbu";
		if(mysqli_query($conn,$crdb)){
			$conn2 = mysqli_connect('localhost:3307', 'root', '', $dbu);

						if(!$conn2){
							echo"nu se poate accesa baza de date noua";
						}else{
							$about="CREATE TABLE about(nume TEXT, prenume TEXT, dtNastere TEXT, sex TEXT, email TEXT, password TEXT, locatie TEXT, db TEXT, profilepic TEXT)";
							$postari="CREATE TABLE postari(id_postare INT(11) AUTO_INCREMENT PRIMARY KEY, id_user TEXT, nume TEXT, prenume TEXT, folder TEXT, link TEXT, descriere TEXT, data TEXT, comentarii TEXT)";
							$notif="CREATE TABLE notificari(id INT(11) AUTO_INCREMENT PRIMARY KEY, id_user TEXT, id_postare TEXT)";
							$like="CREATE TABLE likes(id_user TEXT, id_postare TEXT)";
							$fav="CREATE TABLE favorite(id_postare TEXT, id_user TEXT, nume TEXT, prenume TEXT)";
							$comment="CREATE TABLE comentarii(id_com INT(11) AUTO_INCREMENT PRIMARY KEY, id_post TEXT, id_user TEXT, continut TEXT, data TEXT, nume TEXT, prenume TEXT, folder TEXT, link TEXT)";
							if(mysqli_query($conn2,$about) && mysqli_query($conn2,$postari) && mysqli_query($conn2,$fav) && mysqli_query($conn2,$like) &&mysqli_query($conn2,$notif) &&mysqli_query($conn2,$comment)){
							MKDIR("users/".$dbu);
							MKDIR("users/".$dbu.'/profilepic');
							$date=date('d m Y');


							$sql2="INSERT INTO about (nume, prenume, dtNastere, sex, email, password, locatie, db) VALUES ('$nume', '$prenume', '$dtNastere', '$sex', '$email', '$password', '$locatie', '$dbu')";
							if(mysqli_query($conn2,$sql2)){
							$_SESSION['nume']=$_POST['nume'];
							$_SESSION['email']=$_POST['email'];
							$_SESSION['password']=$_POST['password'];
							$_SESSION['db']=$dbu;

							header('location: index.php'); //trimite la index pt logare

							}else{
								echo"Eroare".mysqli_error($conn2);
							}
	}
						}
		}
	}
	}
 ?>
