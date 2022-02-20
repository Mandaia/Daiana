<?php

session_start();

  $db=$_SESSION['db'];
  $id=$_SESSION['id'];

  $target_dir = "users/".$db."/";
  $target_file = $target_dir.basename($_FILES["file"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
	$conn = mysqli_connect('localhost:3307', 'root', '', $db);

	$file=$_FILES['file']['name'];
	$data=date('d m Y, H:m:s');
	$like='0';
	$comm='0';
	$descriere=$_POST['descriere'];
	$nume=$_SESSION['nume'];
	$prenume=$_SESSION['prenume'];
	//$pozaprf=$_SESSION['pozaprf'];

	if(!$conn){
		echo'Eroare la introducere date in db'.mysqli_error($conn);
	}else{
		$sql="INSERT INTO postari(id_user,nume,prenume,folder,link,descriere,data,comentarii) VALUES ('$id','$nume','$prenume', '$db','$file','$descriere','$data','$comm')";
		if(mysqli_query($conn,$sql)){
			$con1 = mysqli_connect('localhost:3307', 'root', '', 'db');
			if(!$con1){
		echo'Eroare la introducere date in db'.mysqli_error($con1);
			}else{
			$sql1="INSERT INTO postari(utilizator_id,nume,prenume,folder,datapostarii,descriere,link) VALUES ('$id','$nume','$prenume','$db','$data','$descriere', '$file')";
		    if(mysqli_query($con1,$sql1)){
			header('location: wellcome.php');
		}else{
			echo'eroare db'.mysqli_error($con1);
		}
		}
	mysqli_close($conn);
}
}
	}
}

?>
