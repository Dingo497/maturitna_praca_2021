<?php

include_once'../config.php';
include_once'../login_system/functions.php';
session_start();

// name update
if (isset($_POST['comfirm_edit_fname'])) {
	$name = $_POST['edit_fname'];

	if (emptyInput($name)) {
		if ($clname = clearOfSpecialChars($name)) {
			$sql = $connect->prepare("UPDATE user SET firstname = ? WHERE id='".$_SESSION['emailid']."'");
			$sql->bind_param('s', $clname);
	
			if ($sql->execute()) {
				header("location: ../../profile.php?error=none");
				exit();
			}else{
				header("location: ../../profile.php?error=sqlproblem");
				exit();
			}		
		}
	}else{
		header("location: ../../profile.php?error=emptyinput");
		exit();
	}
} 



// lname update
else if (isset($_POST['comfirm_edit_lname'])){
	$lname = $_POST['edit_lname'];

	if (emptyInput($lname)) {
		if ($cllname = clearOfSpecialChars($lname)) {
		$sql = $connect->prepare("UPDATE user SET lastname = ? WHERE id='".$_SESSION['emailid']."'");
		$sql->bind_param('s', $cllname);
		
		if ($sql->execute()) {
			header("location: ../../profile.php?error=none");
			exit();
		}else{
			header("location: ../../profile.php?error=sqlproblem");
			exit();
		}
	}
	}else{
		header("location: ../../profile.php?error=emptyinput");
		exit();
	}
}



// email update
else if (isset($_POST['comfirm_edit_email'])){
	$email = $_POST['edit_email'];

	if (!invalidEmail($email) && !emailExist($connect, $email)) {
		$clemail = clearOfSpecialChars($email);
		$sql = $connect->prepare("UPDATE user SET email = ? WHERE id='".$_SESSION['emailid']."'");
		$sql->bind_param('s', $clemail);
	
		if ($sql->execute()) {
			header("location: ../../profile.php?error=none");
			exit();
			echo "najs";
		}else{
			echo "nevyslo to: ".mysqli_error($connect);
			header("location: ../../profile.php?error=sqlproblem");
			exit();
		}
	}else{
		header("location: ../../profile.php?error=mustemail");
			exit();
	}
}
