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

	<link rel="stylesheet" type="text/css" href="pagpost.css">

	</head>
<body>

	<img src="logo1.png" class="logo" draggable="false">


	<center>
	<div id="box">
	<div id="cerc"></div>
		<table class="nd">
					<tr>
						<td style="color:pink;">'.$row['nume'].' '.$row['prenume'].'</td>
					</tr>
					<tr>
						<td style="color:pink;">Data postarii</td>
					</tr>
		</table>
		<div id="postari">
		</div>
		<br>

			<div id="descriere">
				<p>Aici descrierea postarii</p>
			</div>
		<br>

			<div id="butoane">
				<button style="border: none; background-color: transparent;"><img src="flame.png" id="icon" draggable=false></button>
				<button style="border: none; background-color: transparent; margin-left: 10px;"><img src="blogging.png" id="icon" draggable=false></button>
				<button style="border: none; background-color: transparent; float: right; margin-right: 50px;"><img src="bookmark.png" id="icon" draggable=false></button>
				<button style="border: none; background-color: transparent; float: right; margin-right: 10px;"><img src="sort.png" id="icon" draggable=false></button>

			</div>
			<hr>
		<table class="prfu">
		<div id="pozaut"></div>
					<tr>
						<td>Nume utilizator</td>
					</tr>
					<tr>
						<td>Comentariu</td>
					</tr>
		</table>

	</center>



</body>
</html>
';
}
}else{
	mysqli_error($conn);}

}
?>
