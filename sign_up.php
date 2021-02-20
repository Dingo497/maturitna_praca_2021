
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
    <form method="post">
      <div class="row">
        <div class="form-group col-6">
          <label class="col-form-label">First name</label>
          <input type="text" class="form-control" name="firstname">
        </div>
        <div class="form-group col-6">
          <label class="col-form-label">Last name</label>
          <input type="text" class="form-control" name="lastname">
        </div>
      </div>
      <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="At least one letter must be uppercase">
      </div>
      <div class="form-group form-check mx-5">
        <input type="checkbox" class="form-check-input" name="Check1">
        <label class="form-check-label">I confirm that I have read the Terms and Conditions and the Privacy Policy and agree to the terms and conditions (Required).</label>
      </div>
      <div class="form-group">
        <a class="text-primary h5" href="login.php" id="link_modal_to_login">Do you already have an account?</a>
      </div>
      <button type="submit" class="btn btn-secondary mr-2">Close</button>
      <button type="submit" name="submit_register" id="submit_register" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>



</body>
</html>
                    <!-- Banner owl carousel -->



                    <!-- Free shipping... -->
  <?php include_once('inc/cards_servises.php'); ?>
  

  <?php include_once('inc/category.php') ?>


  <?php include_once('inc/featured_products.php'); ?>


  <?php include_once('inc/footer.php'); ?>


  <?php include_once('inc/settings_includes_down.php'); ?>


  