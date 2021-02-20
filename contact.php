<!DOCTYPE html>
<html>
<head>
    <?php require_once('inc/settings_includes.php'); ?>
</head>
<body>

  <?php include_once('inc/header.php'); ?>
  <?php include_once('inc/functions.php'); ?>


                    <!-- Contact form -->
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="h3 mb-3 text-black">Get In Touch</h2>
          </div>
          <div class="col-12">

            <form action="" method="post">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="c_fname">
                  </div>
                  <div class="col-md-6">
                    <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_lname" name="c_lname">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_email" name="c_email" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_subject" class="text-black">Subject <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_subject" name="c_subject">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_message" class="text-black">Message <span class="text-danger">*</span></label>
                    <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" name="c_submit" class="btn btn-primary btn-lg btn-block" value="Send Message">
                  </div>
                </div>
              </div>

            </form>

          </div>
          </div>
        </div>
      </div>
    </div>

<?php
if (isset($_POST['c_submit'])) {
  if (validate_name($_POST['c_fname']) && validate_name($_POST['c_lname']) && validate_email($_POST['c_email']) && validate_name($_POST['c_subject']) && validate_name($_POST['c_message'])) {
    $status = '<p class="text-info h1 text-center">Form send!</p>';
  }else{
    $status = '<p class="text-danger h1 text-center">Form not send!</p>';
  }
  if ($status == '<p class="text-info h1 text-center">Form send!</p>') {
    mail_sender_contact($_POST['c_email'], $_POST['c_subject'], $_POST['c_message']);
    echo $status;
  }else{
    echo $status;
  }
}
?>

</body>
</html>
                    <!-- Contact form -->
  <?php include_once("inc/cards_servises.php") ?>


  <?php include_once("inc/category.php") ?>


  <?php include_once('inc/footer.php'); ?>


  <?php include_once('inc/settings_includes_down.php'); ?>
    