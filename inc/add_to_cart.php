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

if (empty($_SESSION["shopping cart"])) {
	$_SESSION["shopping cart"] = $cartArray;
	$status = "product is added in your cart";
	header("Refresh:0");

}else{
	$_SESSION["shopping cart"] = array_merge($_SESSION["shopping cart"], $cartArray);
	$status = "product is added in your cart";
	header("Refresh:0");
}
}
//unset($_SESSION["shopping cart"]);
?>
