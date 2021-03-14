
<!DOCTYPE html>
<html>
<head>
    <?php require_once('inc/settings_includes.php'); ?>
</head>
<body>

  <?php include_once('inc/header.php'); ?>
  <?php include_once('inc/profile/profile_code.php'); ?>


<div class="container">
  <h1 class="ml-5 text-primary"><u>My data:</u></h1>

<?php 
if (isset($_GET['error'])) {
  if ($_GET['error'] == 'none') {
    echo '<h2 class="text-center text-success">Your avatar was successfully edited</h2>';
  }
  else if($_GET['error'] == 'filenotuploaded'){
    echo '<h2 class="text-center text-danger">Something went wrong!</h2>';
  }
  else if($_GET['error'] == 'filenotimage'){
    echo '<h2 class="text-center text-danger">Your File is not an image!</h2>';
  }
  else if($_GET['error'] == 'filetoolarge'){
    echo '<h2 class="text-center text-danger">Your file is too large!</h2>';
  }
  else if($_GET['error'] == 'sqlproblem'){
    echo '<h2 class="text-center text-danger">Something went wrong!</h2>';
  }
  else if($_GET['error'] == 'mustemail'){
    echo '<h2 class="text-center text-danger">Problem in email validation!</h2>';
  }
  else if($_GET['error'] == 'emptyinput'){
    echo '<h2 class="text-center text-danger">Write something!</h2>';
  }
  else if($_GET['error'] == 'specialchars'){
    echo '<h2 class="text-center text-danger">You tried write special characters!</h2>';
  }
}
 ?>

  <div class="row text-left my-3 mx-5 rounded align-items-center" style="border: solid; border-color: #b8b8b8; border-width: 0.2px;">
    <div class="col-7 pl-5 my-3">
       <div class="row">
         <div class="col-4 text-left">
           <ul class="list-unstyled">
             <li><h4 class="text-dark">Name:</h4></li>
             <li><h4 class="text-dark">Last name:</h4></li>
             <li><h4 class="text-dark">Email:</h4></li>
             <li><h4 class="text-dark">Created at:</h4></li>
             <li><h4 class="text-dark">Updated at:</h4></li>
           </ul>
         </div>
         <div class="col-8 text-left">


  <?php include_once'inc/profile/profile_edit_data.php'; ?>


         </div>
       </div>
    </div>

    <div class="col-5">
      <?php if(is_null($info['avatar'])) : ?>
        <form class="row justify-content-center text-dark" action="inc/profile/upload_file.php" method="post" enctype="multipart/form-data">
          <h2 class="h4 text-primary">Please choose your avatar</h2>
          <input class="pl-5" type="file" name="fileToUpload" id="fileToUpload">
          <input class="mt-3 btn btn-primary" type="submit" name="submit_upload" value="Upload Imagine">
        </form>

      <?php else : ?>

        <div class="my-3 text-center">
          <img src="<?php echo $info['avatar'] ?>" style="max-width: 50%;">
            <form class=" text-dark" action="inc/profile/upload_file.php" method="post" enctype="multipart/form-data">
            <h2 class="h4 text-primary">Change your avatar</h2>
            <input class="pl-5" type="file" name="fileToUpload" id="fileToUpload">
            <input class="mt-1 btn btn-primary" type="submit" name="submit_upload" value="Upload Imagine">
          </form>
        </div>
      <?php endif ?>
    </div>
  </div>
</div>




</body>
</html>




                    <!-- Free shipping... -->
  <?php include_once('inc/cards_servises.php'); ?>
  

  <?php include_once('inc/category.php') ?>


  <?php include_once('inc/featured_products.php'); ?>


  <?php include_once('inc/footer.php'); ?>


  <?php include_once('inc/settings_includes_down.php'); ?>

