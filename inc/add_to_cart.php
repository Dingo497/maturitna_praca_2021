<?php include_once('config.php'); ?>

<?php 
if (isset($_POST['add_to_cart'])) {
	$id = $_POST['add_to_cart'];

	$sql = "SELECT * FROM products WHERE id='$id'";
	$result = $connect->query($sql);

	$row = $result->fetch_assoc();
	$id_cart = $row['id'];
	$img_source_cart = $row['img_source'];
	$title_cart = $row['title'];
	$sum_cart = $row['sum'];
	$category_cart = $row['gender'];
	$category_cart .= " / ";
	$category_cart .= $row['size'];
	$category_cart .= " / ";
	$category_cart .= $row['color'];


	$cartArray = array(
		$id_cart=>array(
			'id'=>$id_cart,
			'title'=>$title_cart,
			'sum'=>$sum_cart,
			'quantity'=>1,
			'image'=>$img_source_cart,
			'category'=>$category_cart)
	);

		//	if neni prihlaseny pojde to cez session
	if (empty($_SESSION['emailid'])) {
		if (empty($_SESSION["shopping cart"])) {
			$_SESSION["shopping cart"] = $cartArray;
			header("location: ../../e-shop/shop.php?error=none");
			exit();

		}else{
			$_SESSION["shopping cart"] = array_merge($_SESSION["shopping cart"], $cartArray);
			header("location: ../../e-shop/shop.php?error=none");
			exit();
		}
	}

		// if je prihlaseny tak sa to hodi do databaze
	else if (!empty($_SESSION['emailid'])){
		foreach ($cartArray as $key => $value) {
			$image = $value['image'];
			$title = $value['title'];
			$sum = $value['sum'];
			$category = $value['category'];

			$sql = 'INSERT INTO user_cart VALUES(DEFAULT, "'.$_SESSION['emailid'].'","'.$image.'", "'.$title.'", "'.$sum.'", "'.$category.'");';

		}

		if ($connect->query($sql)) {
			header("location: ../../e-shop/shop.php?error=none");
			exit();
		}else{
			header("location: ../../e-shop/shop.php?error=sqlproblem");
			exit();
		}

	}
}
