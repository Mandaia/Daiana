<?php
session_start();
	$user=$_COOKIE['user'];
	$post=$_COOKIE['post'];
	
	$datab=$_SESSION['datab'];
	$id=$_SESSION['id'];
	$nume=$_SESSION['nume'];
	$prenume=$_SESSION['prenume'];
	
	$continut=$_POST['com'];
	$data=date('d m Y, H:m:s'); 
	
	$conn = mysqli_connect('localhost:3307', 'root', '', $datab);
	if(!$conn){
		echo'Eroare la accesarea informatiilor'.mysqli_error($conn);
	}else{
	$sql="INSERT INTO comentarii (id_post,id_user,continut,data,nume,prenume) VALUES ('$post','$id','$continut','$data','$nume', '$prenume')";
		if(mysqli_query($conn,$sql)){
			
			header('location: comentariu.php');
	
	
		}else{
			echo'Nu putem crea sesiunile'.mysqli_error($conn);
		}
	}
	
?>