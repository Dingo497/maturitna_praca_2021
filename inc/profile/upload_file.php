<?php

if (isset($_POST['submit_upload'])) {

	include_once'../config.php';
	session_start();

	$target_dir = $_SERVER['DOCUMENT_ROOT'] .'/e-shop/img/avatar/';
	$target_file = $target_dir.basename($_FILES['fileToUpload']['name']);
	$uploadOk = 1;


	/*kontrola ci je to img*/
	$check = getimagesize($_FILES['fileToUpload'] ['tmp_name']);
	if ($check == false) {
		$uploadOk = 0;
		header("location: ../../profile.php?error=filenotimage");
		exit();
	}


	/*kontrola velkosti suboru (v bajtoch cize 500kB)*/
	if ($_FILES['fileToUpload']['size'] > 500000) {
		$uploadOk = 0;
		header("location: ../../profile.php?error=filetoolarge");
		exit();
	}


	/*kontrola ci subor ma pripony viz nizsie*/
	$image_file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg" && $image_file_type != "gif") {
		/*echo "Sorry only JPG JPEG PNG and GIF files are allowed";*/
		$uploadOk = 0;
		header("location: ../../profile.php?error=filenotimage");
		exit();
	}




	$finally_target_dir = "img/avatar/".basename($_FILES['fileToUpload']['name']);
	$sql = "UPDATE user SET avatar='".$finally_target_dir."' WHERE id='".$_SESSION["emailid"]."'";

	/*kontrola ci je vsetko ok a premiestnenie suboru*/
	if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file) && $connect->query($sql) === TRUE) {

		header("location: ../../profile.php?error=none");
		exit();

	}else{
		header("location: ../../profile.php?error=filenotuploaded");
		exit();
	}
}
