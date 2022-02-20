<?php

  session_start();
	$db=$_SESSION['db'];
	$id=$_SESSION['id'];

	$conn = mysqli_connect('localhost:3307', 'root', '', 'db');

  if(!$conn){
    echo 'Nu se poate conecta la baza de date.'.mysqli_error($conn);
  }else{
    $select="SELECT * FROM utilizatori WHERE id='$id'";
    $rez=mysqli_query($conn,$select);
    $count=mysqli_num_rows($rez);
    if($count>0){
        while($row=mysqli_fetch_assoc($rez)){

	echo'
<html>

	<head>
		<style>
				body {
				background-image: url("wallpaper.jpg");
				background-repeat: no-repeat;
				background-position: right top;
				}

				.logo {
				padding: 0px;
				margin: 0px;
				width: 90px;
				height: 75px;
				}
		</style>
				<title>Profilul meu</title>

	<link rel="stylesheet" type="text/css" href="profilulmeu.css">

	</head>
<body>

	<img src="logo1.png" class="logo" draggable="false">
	<form action="legeditareprf.php">

	border-radius: 30px;

	<div>
		<table>
			<tr>
				<td><div><img src="users/'.$row['db'].'/profilepic/'.$row['pozaprf'].'" id="pb" draggable="false" style="width: 120px; height: 120px; margin-top: 5%; margin-left: 150px; border-radius: 30px;"></div></td>
				<td><h2>'.$row['nume'].' '.$row['prenume'].'</h2></td>
				<button class="button" type="submit" name="editeaza">Editează</button>
			</tr>
		</table>

	</div>

	<div id="profil">
		<table>
			<tr>
				<td><img src="locatie.png" class="myp" draggable="false"></td>
				<td><h3>'.$row['locatie'].'</h3></td>
			</tr>
			<tr>
				<td><img src="birthday.png" class="myp" draggable="false"></td>
				<td><h3>'.$row['dtNastere'].'</h3></td>
			</tr>
			<tr>
				<td><img src="postari.png" class="myp" draggable="false"></td>
				<td><h3>';
				$postari="SELECT * FROM postari WHERE utilizator_id='$id'";
				$rez3=mysqli_query($conn,$postari);
				$count3=mysqli_num_rows($rez3);
				echo $count3.' Postări';
				echo'</h3></td>
			</tr>
		</table>
	</div>

</body>
</html>
';
}
}else{
	mysqli_error($conn);}

}
?>
