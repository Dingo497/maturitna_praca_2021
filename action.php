<?php 

	include_once 'inc/config.php';

	if (isset($_POST['action'])) {
		$sql = "SELECT * FROM products WHERE gender !=''";

		if(isset($_POST['gender'])){
			$gender = implode("','", $_POST['gender']);
			$sql .= "AND gender IN('".$gender."')";
		}
		if(isset($_POST['size'])){
			$size = implode("','", $_POST['size']);
			$sql .= "AND size IN('".$size."')";
		}
		if(isset($_POST['color'])){
			$color = implode("','", $_POST['color']);
			$sql .= "AND color IN('".$color."')";
		}

		$result = $connect->query($sql);
		$output = '';

		if ($result->num_rows>0) {
			while ($row=$result->fetch_assoc()) {
				$output .= '

				<!-- Card bootstrap -->
<form class="col-sm-6 col-lg-4 mb-4" method="post">
  <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
    <div class="block-4 text-center border">
      <div class="card text-center" style="width: 16rem;">
        <img src="'.$row["img_source"].'" class="card-img-top" alt="img">
        <div class="card-body">
          <h5 class="card-title bg-info rounded p-1 text-light"> '.$row["title"].' </h5>
          <p class="card-text">'.$row["description"].' </p>
          <p>
            Gender : '.$row['gender'].' <br>
            Size : '.$row['size'].' <br>
            Color : '.$row['color'].'
          </p>
          <p class="text-primary"> Price: $'.number_format($row["sum"]).' </p>
          <input class="btn btn-primary" type="submit" value="Add to Cart">
          <input  type="hidden" name="add_to_cart" value="'.$row['id'].'">
          <input type="hidden" name="action" value="remove">
        </div>
      </div>
    </div>
  </div>
</form>';
			}
		}
		else{
			$output = "<h3> No Products Found! </h3>";
		}
		echo $output;
	}
?>