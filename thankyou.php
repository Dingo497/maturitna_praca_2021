<!DOCTYPE html>
<html>
<head>
    <?php require_once('inc/settings_includes.php'); ?>
</head>
<body>

  <?php include_once('inc/header.php'); ?>
  <?php include_once 'inc/config.php'; ?>


                    <!-- Thank you -->
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Thank you!</h2>
            <p class="lead mb-5">Your order was successfully completed.</p>
            <p>
              <form method="post">
                <input type="submit" name="backtoshop" value="Back to shop" class="btn btn-sm btn-primary">
              </form>
            </p>
          </div>
        </div>
      </div>
    </div>

</body>
</html>
                    <!-- Thank you -->

<?php
if (!empty($_SESSION['shopping cart']) && empty($_SESSION['emailid'])) {
  if (isset($_POST['backtoshop'])) {
    session_destroy();
    header("location: index.php");
  }
}
else if (!empty($_SESSION['emailid'])){
  if (isset($_POST['backtoshop'])) {
    $sql = 'DELETE FROM user_cart WHERE user_id="'.$_SESSION['emailid'].'"';
    if ($connect->query($sql)) {
      header("location: index.php");
    }else{
      echo "sql: ".$sql;
    }
  }
}
?>



                    <!-- Free shipping... -->
  <?php include_once('inc/cards_servises.php'); ?>


  <?php include_once('inc/footer.php'); ?>


  <?php include_once('inc/settings_includes_down.php'); ?>