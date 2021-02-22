
<!DOCTYPE html>
<html>
<head>
    <?php require_once('inc/settings_includes.php'); ?>
</head>
<body>

  <?php include_once('inc/header.php'); ?>
  <?php include_once('inc/config.php'); ?>

                    
<div class="container">
  <div class="row justify-content-center text-center mt-3">
    <form method="post" action="inc/login_system/login_code.php">
      <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" name="email_login" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password_login">
      </div>
      <div class="form-group">
        <a class="text-primary h5" href="sign_up.php" name="link_modal2">Do you don't already have an account?</a>
      </div>
      <a type="submit" class="btn btn-secondary mr-2">Close</a>
      <button type="submit" name="submit_login" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

<?php 
if (isset($_GET['error'])) {
  if ($_GET['error'] == 'emptyinput') {
    echo "<p class='text-danger h2 text-center mt-3'>Fill in all fields!</p>";
  }
  else if($_GET['error'] == 'wronglogin'){
    echo "<p class='text-danger h2 text-center mt-3'>Incorrect login information!</p>";
  }
}
 ?>



</body>
</html>
                    <!-- Banner owl carousel -->



                    <!-- Free shipping... -->
  <?php include_once('inc/cards_servises.php'); ?>
  

  <?php include_once('inc/category.php') ?>


  <?php include_once('inc/featured_products.php'); ?>


  <?php include_once('inc/footer.php'); ?>


  <?php include_once('inc/settings_includes_down.php'); ?>


  