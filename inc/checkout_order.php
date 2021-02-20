<?php 
include_once "functions.php";


if (isset($_POST['place_order'])) {
	if (validate_name_must($_POST['fname']) && validate_name_must($_POST['lname']) && validate_name_must($_POST['address']) && validate_name_must($_POST['state_country']) && validate_zip($_POST['postal_zip']) && validate_email($_POST['email_address']) && validate_phone($_POST['phone'])) {
		$status_order = '<p class="text-info h1 text-center">Order was successfully!</p>';
	}else{
		$status_order = '<p class="text-danger h1 text-center">Please check your answers!</p>';
	}
	 if ($status_order == '<p class="text-info h1 text-center">Order was successfully!</p>') {
    mail_sender_order($_POST['fname'], $_POST['lname'], $_POST['diff_companyname'], $_POST['address'], $_POST['state_country'], $_POST['postal_zip'], $_POST['email_address'], $_POST['phone'], $_POST['order_notes']);
  }

  if ($status_order == '<p class="text-info h1 text-center">Order was successfully!</p>') {
  		/* Redirect to a different page in the current directory that was requested */
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'thankyou.php';
	header("Location: http://$host$uri/$extra");
	exit;
  }
}

?>