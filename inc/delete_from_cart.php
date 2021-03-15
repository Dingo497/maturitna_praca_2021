<?php
if (isset($_POST['remove_from_cart'])) {
	foreach ($_SESSION['shopping cart'] as $key => $value) {
		if ($_POST['id'] == $value['id']) {
			unset($_SESSION['shopping cart'][$key]);
			header("Refresh:0");
		}
		if(empty($_SESSION["shopping cart"])){
      		unset($_SESSION["shopping cart"]);
      		header("Refresh:0");
      	}
      	
	}
}

?>