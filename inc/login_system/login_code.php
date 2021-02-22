<?php

include_once '../config.php';
include_once 'functions.php';

if (isset($_POST['submit_login'])) {

	$email = $_POST['email_login'];
	$password = $_POST['password_login'];

	if (emptyInputLogin($email, $password) !== false) {
		header("location: ../../login.php?error=emptyinput");
		exit();
	}

	if (loginUser($connect, $email, $password)) {

	}else{
		header("location: ../../login.php");
		exit();
	}
}
