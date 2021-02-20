<?php
if (isset($_POST['remove_from_cart'])) {
	foreach ($_SESSION['shopping cart'] as $key => $value) {
		if ($_POST['id'] == $value['id']) {
			unset($_SESSION['shopping cart'][$key]);
		}
		if(empty($_SESSION["shopping cart"])){
      		unset($_SESSION["shopping cart"]);
      	}
      	
	}
}

?>