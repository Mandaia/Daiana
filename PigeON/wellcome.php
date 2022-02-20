<?php

  session_start();
	$db=$_SESSION['db'];
	$id=$_SESSION['id'];

	$conn = mysqli_connect('localhost:3307', 'root', '', 'db');

  if(!$conn){
    echo 'Nu se poate conecta la baza de date.'.mysqli_error($conn);
  }else{
    $select="SELECT * FROM utilizatori WHERE id='$id' AND db='$db'";
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

		<link rel="stylesheet" type="text/css" href="wellcome.css">
		<link rel="shortcut icon" type="image/png" href="logo1.png">

	</head>
<body>

	<img src="logo1.png" class="logo" draggable="false">
	<form action="welco.php" method="post">

<h1 align="center" style="color:#ff0066; font-family: Eras Bold ITC; font-weight: bold; font-size: 50px; margin-top: -30px;">Be ON!</h1>

	<div id="linie">
		<div id="cerc">
			<img src="users/'.$row['db'].'/profilepic/'.$row['pozaprf'].'" id="pb" draggable="false">
		<div id="numeutil"><button type="submit" name="nume" value="nume">'.$row['nume'].' '.$row['prenume'].'</button></div>
	</div>
		<p align="left" style="margin-left:75px; margin-top:-50px;">
			<button type="submit" name="logout" style="color:white; border-radius: 10px; padding: 10px; margin-left: 1100px; margin-top:7px; font-family: consolas; border:none; width:130px; ">
			<img src="logout.png" style="position: absolute; margin-left: -25px; width: 17px;">
          <span>Ieșire</span>
        </button>
		</p>
		</form>

		</div>
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
				$rezu=mysqli_query($conn,$postari);
				$countu=mysqli_num_rows($rezu);
				echo $countu.' Postări';
				echo'</h3></td>
			</tr>
		</table>
	</div>';
		echo'<div id="postare" style="margin-top:80px;">
		<form action="wel-post.php" method="post">
			<button id="textpoze">Text</button>
			<button id="textpoze">Poze</button>
	</form>
	</div>';

		}
		}
  }
  mysqli_close($conn);
  $con1 = mysqli_connect('localhost:3307', 'root', '', 'db');

  if(!$con1){
    echo 'Nu se poate conecta la baza de date.'.mysqli_error($con1);
  }else{
    $select1="SELECT * FROM postari";
    $rez1=mysqli_query($con1,$select1);
    $count1=mysqli_num_rows($rez1);
    if($count1>0){
        while($row1=mysqli_fetch_assoc($rez1)){

	echo'

	<center>
	<div id="box">
		<form action="post.php">
			<div id="cercm">
			</div>
				<table class="nd">
							<tr>
								<td style="color:pink;">'.$row1['nume'].' '.$row1['prenume'].'</td>
							</tr>
							<tr>
								<td style="color:pink;">'.$row1['datapostarii'].'</td>
							</tr>
							</table>
		<div id="postari">
		<img src="users/'.$row1['folder'].'/'.$row1['link'].'" style="width:600px; height:300px;"></div>
		<div id="descriere">
			<p>'.$row1['descriere'].'</p>
		</div>
		</form>
	<br>
	<script>
	function o(a,b){
		document.cookie="user="+a+"; pach/";
		document.cookie="post="+b+"; pach/";
		window.open("comentariu.php","_top");
	}
	</script>

			<div id="butoane">
				<button style="border: none; background-color: transparent;"><img src="flame.png" id="icon" draggable=false></button>
				<button style="border: none; background-color: transparent; display:none;"><img src="flameclick.png" id="icon" draggable=false></button>
				<button onclick="o('.$row1['utilizator_id'].','.$row1['id'].')" style="border: none; background-color: transparent; margin-left: 10px;"><img src="blogging.png" id="icon" draggable=false></button>

			</center>';

	echo'



	<div style="color:gray; position:fixed; margin-top:10px; margin-left:30px;"> PigeON © 2020 </div>';

		}

	}
  }



echo'
</body>
</html>
';


?>
