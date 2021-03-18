<?php
	//	If neni prihlaseny
if (empty($_SESSION['emailid'])) {
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
	//	If je prihlaseny
}else if (!empty($_SESSION['emailid'])){
	if (isset($_POST['remove_from_cart'])) {
		$id_post = $_POST['id'];
		$sessionid = $_SESSION['emailid'];
		$sql = "DELETE FROM user_cart WHERE id = '$id_post' AND user_id = '$sessionid'";
		if ($connect->query($sql)) {
			header("location: ../../e-shop/cart.php?error=none");
			exit();
		}else {
			header("location: ../../e-shop/cart.php?error=sqlproblem");
			exit();
		}
	}
}

?>