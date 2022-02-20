<?php

  session_start();
	$db=$_SESSION['db'];

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
				<title>PigeON</title>

	<link rel="stylesheet" type="text/css" href="postare.css">

	</head>
<body>

	<img src="logo1.png" class="logo" draggable="false">

<form action="post.php" method="post" enctype="multipart/form-data">

	<center>
	<div id="box">
	<div id="cerc"></div>
		<table class="nd">
					<tr>
						<td style="color:pink;">'.$row['nume'].' '.$row['prenume'].'</td>
					</tr>
		</table>
		<div id="postari">
			<input type="file" name="file"></input>
		</div>
		<br>

			<div id="descriere">
				<textarea name="descriere" rows="1" cols="70" placeholder="Aici descrierea postării.."></textarea>
			</div>
		<br>

	</center>

	<button id="post" type="submit" name="post" value="post">Postează</button>
</form>

</body>
</html>
';
}
}else{
	mysqli_error($conn);}

}
?>
