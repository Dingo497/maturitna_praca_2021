<?php



function emptyInputSignup($name, $lname, $email, $password, $checkbox){
	$result; //na true or false
	if (empty($name) || empty($lname) || empty($email) || empty($password) || $checkbox == false) {
		$result = true;
	}else{
		$result = false;
	}
	return $result;
}



function invalidEmail($email){
	$result; 
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}else{
		$result = false;
	}
	return $result;
}



function emailExist($connect, $email){
	$sql = "SELECT * FROM user WHERE email = ?"; //sql injection
	$stmt = mysqli_stmt_init($connect); //vrati objekt roznych hodnot

	if (!mysqli_stmt_prepare($stmt, $sql)) { //priprava prikazu SQL
		header("location: ../../sign_up.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "s", $email); //validacia
	mysqli_stmt_execute($stmt); //vykonaj

	$resultData = mysqli_stmt_get_result($stmt); //vezmi status

	if ($row = mysqli_fetch_assoc($resultData)) { //vypise akoby
		return $row;
	}else{
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt); //koniec spojenia
}



function createUser($connect, $name, $lname, $email, $password){
	$sql = "INSERT INTO user (firstname, lastname, email, password, CreatedAt, UpdatedAt) VALUES (?, ?, ?, ?, now(), now())"; //sql injection
	$stmt = mysqli_stmt_init($connect); //vrati objekt roznych hodnot napoji sa na moju databazu akoby

	if (!mysqli_stmt_prepare($stmt, $sql)) { //priprava prikazu SQL (ak je fail v SQL)
		header("location: ../../sign_up.php?error=stmtfailed");
		exit();
	}

	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssss", $name, $lname, $email, $hashedPassword); //validacia nahodi parametre
	mysqli_stmt_execute($stmt); //vykonaj
	mysqli_stmt_close($stmt);

	header("location: ../../sign_up.php?error=none");
	exit();
	
}



//Login system

function emptyInputLogin($email, $password){
	$result;
	if (empty($email) || empty($password)) {
		$result = true;
	}else{
		$result = false;
	}
	return $result;	
}


function loginUser($connect, $email, $password){
	$ifEmailExists = emailExist($connect, $email);

	if ($ifEmailExists === false) {
		header("location: ../../login.php?error=wronglogin");
		exit();
	}

	$hashedPswFromDb = $ifEmailExists["password"];
	$checkPassword = password_verify($password, $hashedPswFromDb);//overi ci sa hash zhoduje s heslom co zadal

	if ($checkPassword === false) {
		header("location: ../../login.php?error=wronglogin");
		exit();
	}else if($checkPassword === true){
		session_start();
		$_SESSION["emailid"] = $ifEmailExists["id"];
		$_SESSION["emailname"] = $ifEmailExists["email"];
		header("location: ../../index.php");
		exit();
	}
}






function emptyInput($input){
	$result;
	if (empty($input) == false) {
		$result = true;
	}else{
		$result = false;
	}
	return $result;
}
