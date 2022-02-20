<?php

  session_start();
	$db=$_SESSION['db'];
	$id=$_SESSION['id'];

	$conn = mysqli_connect('localhost:3307', 'root', '', $db);

  if(!$conn){
    echo 'Nu se poate conecta la baza de date.'.mysqli_error($conn);
  }else{
    $select="SELECT * FROM about";
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
				<title>Editare profil</title>

	<link rel="stylesheet" type="text/css" href="editareprf.css">

	</head>
<body>

	<img src="logo1.png" class="logo" draggable="false">

	<form action="editprofil.php" method="post" enctype="multipart/form-data">

	<table>
		<tr>
			<td><div id="pozaprf"></div></td>
			<td style="color:white"><input type="file" name="pozaprf"></input></td>
		</tr>
	</table>

	<table align=center>

		<tr>
			<td align=right style="color:white"><font size=4>Nume</font></td>
			<td><input type="text" name="nume" value="'.$row['nume'].'" size=30></td>
		</tr>
		<tr>
			<td align=right style="color:white"><font size=4>Prenume</font></td>
			<td><input type="text" name="prenume" value="'.$row['prenume'].'" size=30></td>
		</tr>

	<tr>
		<td align=right style="color:white"><font size=4>Data nașterii</font></td>
		<td><input type="text" name="dtNastere" value="'.$row['dtNastere'].'" size=30></td>
	</tr>

	<tr>
		<td align=right style="color:white"><font size=4>Sexul</font></td>
		<td>
			<font size=4 style="color:white">
				<select name="selectbox">
					<option selected>'.$row['sex'].'</option>
					<option name="masculin" value="masculin">Masculin</option>
					<option name="feminin" value="feminin">Feminin</option>
					<option name="divers" value="divers">Divers</option>
			</select>
			</font>
			</td>
	</tr>


	<tr>
		<td align=right><font size=4 style="color:white">Adresa de e-mail</font></td>
		<td><input type="text" name="email" value="'.$row['email'].'" size=30></td>
	</tr>

	<tr>
		<td align=right><font size=4 style="color:white">Parola</font></td>
		<td><input type="password" name="password" size=30></td>
	</tr>

	<tr>
		<td align=right><font size=4 style="color:white">Locația</font></td>
		<td><input type="text" name="locatie" value="'.$row['locatie'].'" size=30></td>
	</tr>

	</table>
	<br>
	<table align=center>
	<tr>
		<td><font size=4><b><button type="submit" name="salveaza" value="Salveaza modificarile">Salveaza modificarile</button></font></td>
	</tr>
	</table>
</form>

<div style="color:gray; position:fixed; margin-top:300px; margin-left:50px;"> PigeON © 2020 </div>

</body>
</html>
';
		}
	}
  }
  ?>
