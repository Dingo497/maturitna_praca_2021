<!DOCTYPE html>
<html>
<head>
    <?php require_once('inc/settings_includes.php'); ?>
</head>
<body>

  <?php include_once('inc/header.php'); ?>
  <?php include_once('inc/delete_from_cart.php'); ?>

                <!-- Table of products -->
<div class="site-section">
  <div class="container">
    <div class="row mb-5">
      <form class="col-md-12" method="post">
        <div class="site-blocks-table">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="product-thumbnail">Image</th>
                <th class="product-name">Product</th>
                <th class="product-price">Price</th>
                <th class="product-price">Category</th>
                <th class="product-remove">Remove</th>
              </tr>
            </thead>
            <tbody>

<?php
if (isset($_GET['error'])) {
  if ($_GET['error'] == 'none') {
    echo '
    <tr>
      <h3 class="text-center h3 text-primary text-uppercase">Product was succussful removed from your shopping cart!</h3>
    </tr>';
  }
  if ($_GET['error'] == 'sqlproblem') {
    echo '
    <tr>
      <h3 class="text-center h3 text-danger text-uppercase">Something Wrong!</h3>
    </tr>';
  }
}
?>

  <?php
    //  AK nieje prihlaseny tento kosik
  if (empty($_SESSION['emailid'])) {
    if (!empty($_SESSION["shopping cart"])) {
      foreach ($_SESSION["shopping cart"] as $key => $value) {
  ?>          
              <tr>
                <td class="product-thumbnail">
                  <img src="<?php echo $value["image"]; ?>" alt="Image" class="img-fluid">
                </td>
                <td class="product-name"><?php echo $value["title"]; ?></td>
                <td>$<?php echo $value["sum"]; ?></td>
                <td><?php echo $value["category"]; ?></td>
                <td>
                  <form method='post' action=''>
                    <input type='hidden' name='id' value="<?php echo $value["id"] ?>">
                    <button type='submit' name="remove_from_cart" class='remove btn btn-primary btn-sm'>X</button>
                  </form>
                </td>
              </tr>
              <?php 
             if (isset($total_price)) {
              $total_price = $total_price + $value['sum'];
             }else{
              $total_price = $value['sum'];
             }
              ?>

  <?php  } } } 
    //  AK je prihlaseny tento kosik
  else if (!empty($_SESSION['emailid'])){ 
    $sql = 
    'SELECT * FROM user_cart
    WHERE user_id = "'.$_SESSION['emailid'].'"';

    $result = $connect->query($sql);
    if ($result->num_rows>0) {
      while ($row = $result->fetch_assoc()) {
    ?>
              <tr>
                <td class="product-thumbnail">
                  <img src="<?php echo $row["image"]; ?>" alt="Image" class="img-fluid">
                </td>
                <td class="product-name"><?php echo $row["title"]; ?></td>
                <td>$<?php echo $row["sum"]; ?></td>
                <td><?php echo $row["category"]; ?></td>
                <td>
                  <form method='post' action=''>
                    <input type='hidden' name='id' value="<?php echo $row["id"] ?>">
                    <button type='submit' name="remove_from_cart" class='remove btn btn-primary btn-sm'>X</button>
                  </form>
                </td>
              </tr>
              <?php 
             if (isset($total_price)) {
              $total_price = $total_price + $row['sum'];
             }else{
              $total_price = $row['sum'];
             }
 } }
  else{ ?>
                <tr>
                  <h3 class="text-center h1 text-danger text-uppercase">Your shopping cart is empty!</h3>
                </tr>
  <?php  } } ?>
    
            </tbody>
          </table>
        </div>
      </form>
    </div>
                  <!-- Table of products -->

                  
                  <!-- Coupons -->
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">
            <label class="text-black h4" for="coupon">Coupon</label>
            <p>Enter your coupon code if you have one.</p>
          </div>
          <div class="col-md-8 mb-3 mb-md-0">
            <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
          </div>
          <div class="col-md-4">
            <button class="btn btn-primary btn-sm">Apply Coupon</button>
          </div>
        </div>
      </div>
                      <!-- Coupons -->


                      <!-- Cart totals -->
      <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-6">
                <span class="text-black">Total</span>
              </div>
              <div class="col-md-6 text-right">
                <strong class="text-black">
    <?php
      if (!empty($_SESSION['shopping cart'])) {
        echo "$".$total_price;
      }
      if (!empty($_SESSION['emailid']) && !empty($total_price)) {
        echo "$".$total_price;
      }
    ?>
                </strong>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
    <?php
    if (empty($_SESSION['emailid'])) {
      if (empty($_SESSION['shopping cart'])) {
        echo '<form method="post">
                <button class="btn btn-primary btn-lg py-3 btn-block" name="to_do_checkout">Proceed To Checkout</button>
                </form>';
        if (isset($_POST['to_do_checkout'])) {
          echo "<p class='text-danger h5'>Your shopping cart is empty!</p>";
        }
      }else{
        echo '<a class="btn btn-primary text-white btn-lg py-3 btn-block" href="checkout.php">Proceed To Checkout</a>';
      }
    } else if (!empty($_SESSION['emailid'])){
      $sql = 'SELECT user_id FROM user_cart WHERE user_id = "'.$_SESSION['emailid'].'"';
      $result = $connect->query($sql);

      if ($result->num_rows>0) {
        echo '<a class="btn btn-primary text-white btn-lg py-3 btn-block" href="checkout.php">Proceed To Checkout</a>';
      }else{ 
        echo '<form method="post">
                <button class="btn btn-primary btn-lg py-3 btn-block" name="to_do_checkout">Proceed To Checkout</button>
                </form>';
        if (isset($_POST['to_do_checkout'])) {
          echo "<p class='text-danger h5'>Your shopping cart is empty!</p>";
        }
      }
    }
    ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
                        <!-- Cart totals -->



                        <!-- Free shipping... -->
  <?php include_once('inc/cards_servises.php'); ?>


  <?php include_once("inc/category.php") ?>


  <?php include_once('inc/footer.php'); ?>


  <?php include_once('inc/settings_includes_down.php'); ?>