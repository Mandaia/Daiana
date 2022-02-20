<?php
	session_start();

	$post=$_COOKIE['post'];
	$user=$_COOKIE['user'];
	$my=$_SESSION['id'];

$conn = mysqli_connect('localhost:3307', 'root', '', $db);

	if(!$conn){
		echo'Eroare la accesarea informatiilor'.mysqli_error($conn);
	}else{
		$select="SELECT * FROM utilizatori";
		$rez=mysqli_query($conn,$select);
		$count=mysqli_num_rows($rez);
		if($count==1){
			while($row=mysqli_fetch_assoc($rez)){
				$_SESSION['users']=$row['dbu'];
			}
		}else{
			echo'Nu putem crea sesiunile'.mysqli_error($conn);
		}
	}
	mysqli_close($conn);
	$db=$_SESSION['users'];
	$con2 = mysqli_connect('localhost:3307', 'root', '', $db);
	if(!$con2){
		echo'Nu putem accesa postarea'.mysqli_error($con2);
	}else{
		$lk=$_SESSION['linkn'];
		$like="INSERT INTO likes(id_user, id_postare) VALUES('$my','$post')";
		if(mysqli_query($con2,$like)){
			$tip='like';
			$notif="INSERT INTO notificari(id_user,id_postare) VALUES('$user','$post')";
			if(mysqli_query($con2,$notif)){
			header('Location: notificari.php');
			}
		}else{
			echo'nu putem da like'.mysqli_error($con2);
		}
	}
?>
