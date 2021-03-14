<?php
include_once('inc/config.php');

if (!empty($_SESSION["emailid"])) {
	$sql = 'SELECT * FROM user WHERE id='.$_SESSION["emailid"].'';
	$result = $connect->query($sql);	

	if ($result->num_rows>0) {
		$info = $result->fetch_assoc();
  }

}
