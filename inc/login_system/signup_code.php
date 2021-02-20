<?php

require_once '../config.php';
include_once 'functions.php';

if (isset($_POST['submit_register'])) {
	
	$name = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$checkbox = $_POST['Check1'];

//if je prazdny string
	if (emptyInputSignup($name, $lname, $email, $password, $checkbox) !== false) {
		header("location: ../../sign_up.php?error=emptyinput");
		exit(); //stopne tento script totalne
	}

//if je platne user id
	if (invalidUid($email) !== false) {
		header("location: ../../sign_up.php?error=invaliduid");
		exit();
	}

//if je dobry email
	if (invalidEmail($email) !== false) {
		header("location: ../../sign_up.php?error=invalidemail");
		exit();
	}

//if user uz existuje v databaze
	if (uidExists($connect, $email) !== false) { //mozno conn len
		header("location: ../../sign_up.php?error=usernametaken");
		exit(); //stopne tento script totalne
	}

	createUser($connect, $name, $email, $name, $lname, $password);

}else{
	header("location: ../../sign_up.php");
	exit();
}