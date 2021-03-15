<?php

include_once'../login_system/functions.php';
include_once'../config.php';
session_start();

if (isset($_POST['submit_log_pass'])) {
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$new_pass = $_POST['new_password'];

	// is empty validation
	if (empty($email) && empty($pass) && empty($new_pass)) {
		header("location: ../../profile.php?error=emptyinput");
		exit();
	}

	//	is input email is email
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("location: ../../profile.php?error=mustemail");
		exit();
	}

	//	if email is in database
	$ifEmailExists = emailExist($connect, $email);
	if ($ifEmailExists === false) {
		header("location: ../../profile.php?error=wronglogin");
		exit();
	}

	//	if je old pass == with new pass
	if ($pass == $new_pass) {
		header("location: ../../profile.php?error=samepassword");
		exit();
	}

	//	spravi escape html znakov
	$clpass = trim(htmlspecialchars($pass, ENT_QUOTES));
	$clnew_pass = trim(htmlspecialchars($new_pass, ENT_QUOTES));

	//	overenie ci zadal spravne heslo
	$hashedPswFromDb = $ifEmailExists["password"];
	$checkPassword = password_verify($clpass, $hashedPswFromDb);

	//	if je zle stare heslo s emailom
	if ($checkPassword === false) {
		header("location: ../../profile.php?error=wronglogin");
		exit();
	}else if ($checkPassword === true){
		$hashed_new_Password = password_hash($clnew_pass, PASSWORD_DEFAULT);

		$sql = $connect->prepare("UPDATE user SET password = ? WHERE id='".$_SESSION['emailid']."'");

		$sql->bind_param('s', $hashed_new_Password);

		if ($sql->execute()) {
			header("location: ../../profile.php?error=none");
			exit();
		}else{
			header("location: ../../profile.php?error=sqlproblem");
			exit();
		}	

	}
}