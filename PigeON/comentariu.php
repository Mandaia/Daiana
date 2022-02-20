<?php

  session_start();
	$user=$_COOKIE['user'];
	$post=$_COOKIE['post'];

	$conn = mysqli_connect('localhost:3307', 'root', '', 'db');

  if(!$conn){
    echo 'Nu se poate conecta la baza de date.'.mysqli_error($conn);
  }else{
    $select="SELECT * FROM utilizatori WHERE id='$user'";
    $rez=mysqli_query($conn,$select);
    $count=mysqli_num_rows($rez);
    if($count>0){
        while($row=mysqli_fetch_assoc($rez)){
			$_SESSION['datab']=$row['db'];
		}
	}
  }
	mysqli_close($conn);
	
	echo'
	
	<html>

	<head>
		<style>
				body {
				background-image: url("wallpaper.jpg");
				background-repeat: repeat;
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

		<link rel="stylesheet" type="text/css" href="comentariu.css">
		<link rel="shortcut icon" type="image/png" href="logo1.png">

	</head>
<body>
	<img src="logo1.png" class="logo" draggable="false">
	<br><br>
	<script>
	function a(){
		document.getElementById("a").style.display="none";
		document.getElementById("b").style.display="block";
	}
		function b(){
		document.getElementById("a").style.display="block";
		document.getElementById("b").style.display="none";
	}
	</script>
	<div style="margin-left: 160px; margin-top: 120px;">
	<button style="border: none; background-color: transparent; margin-top: 90px; position:absolute; width:30px; height:30px; draggable=false"><img src="sort.png"></button><br>
	<button style="border:none; background-color:#f4f4f4; draggable="false"" onclick="a()">Ascendent</button><br><br>
	<button style="border:none; background-color:#f4f4f4; draggable="false"" onclick="b()">Descendent</button>
	</div>';
	
	$datab=$_SESSION['datab'];
	
	
	echo'<div id="a" style="display: block; margin-left: 400px;">';
	
	$con1 = mysqli_connect('localhost:3307', 'root', '', $datab);
	
	if(!$con1){
		echo 'Nu se poate conecta la baza de date.'.mysqli_error($con1);
	}else{
	$select1="SELECT * FROM comentarii WHERE id_user='$user' AND id_post='$post' ORDER BY data ASC";
    $rez1=mysqli_query($con1,$select1);
    $count1=mysqli_num_rows($rez1);
    if($count1>0){
        while($row1=mysqli_fetch_assoc($rez1)){
			echo '<div>
					<h2 style="color: white">'.$row1['nume'].' '.$row1['prenume'].'</h2>
					<p style="color:white">'.$row1['continut'].'</p>
			</div>';
		}
	}else{
		echo 'Nu există comentarii!';
	}
	}
	echo'</div>';
	
	echo'<div id="b" style="display: none">';
		
	$con2 = mysqli_connect('localhost:3307', 'root', '', $datab);
	if(!$con2){
		echo 'Nu se poate conecta la baza de date.'.mysqli_error($con2);
	}else{
	$select2="SELECT * FROM comentarii WHERE id_user='$user' AND id_post='$post' ORDER BY data DESC";
    $rez2=mysqli_query($con2,$select2);
    $count2=mysqli_num_rows($rez2);
    if($count2>0){
        while($row2=mysqli_fetch_assoc($rez2)){
			echo '<div>
					<h2 style="color: white">'.$row2['nume'].' '.$row2['prenume'].'</h2>
					<p style="color:white; margin-left:300px;">'.$row2['continut'].'</p>
			</div>';
		}
	}else{
		echo 'Nu există comentarii!';
	}
	}
	echo'</div>';
	
	echo'

	<form action="coment.php" method="post">
		<div><textarea id="com" name="com" rows="4" cols="50" placeholder="Comentează.." draggable="false"></textarea></div>
		<div><button type="submit" style="margin-left: 800px; margin-top: -50px; draggable="false">Comentează</button></div>
	</form>

</body>
</html>
';
?>