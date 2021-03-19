
<!-- Header a Navbar -->
<?php session_start();

include_once'config.php';
   
  //  Zmeni index.php na Home v title 
  $pagename = ucfirst(basename($_SERVER['SCRIPT_NAME'],'.php')); //--> path -> /index.php -> index

  if ($pagename == 'Index') {
    $pagename = 'Home';
  }

  //  Ak nieje prihlaseny uzivatel redirect na login
  if (empty($_SESSION['emailid'])) {
    if ($pagename == 'Profile') {
      header("Location: login.php");
    }
  }

  //  Ak nemas v kosiku veci tak redirect na cart
  if (empty($_SESSION['shopping cart']) && empty($_SESSION['emailid'])) {
    if ($pagename == 'Checkout') {
      header("Location: cart.php");
    }
    if ($pagename == 'Thankyou') {
      header("Location: cart.php");
    }
  }

  //  Ak nemas v kosiku ale si prihlaseny
  if (!empty($_SESSION['emailid'])){
    $sql = 'SELECT id,user_id FROM user_cart WHERE user_id = "'.$_SESSION['emailid'].'"';
    $result = $connect->query($sql);
    if ($result->num_rows==0) {
      if ($pagename == 'Checkout') {
        header("Location: cart.php");
      }
      if ($pagename == 'Thankyou') {
        header("Location: cart.php");
      }
    }
  }
?>

<head>
  <title><?php echo $pagename; ?> &mdash; školská práca</title>
  <?php include_once('inc/profile/profile_code.php'); ?>
</head>

    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center justify-content-between">

            <div class="col-6 mb-3 mb-md-0 col-md-6 text-center col-sm-6">
              <div class="site-logo text-left">
                <a href="index.php">bestshop</a>
              </div>
            </div>

            <div class="col-6 col-md-6 text-right col-sm-6 col-6">
              <div class="site-top-icons">
                <ul>

    <?php 
      if (isset($_SESSION['emailid'])) {
        echo '
        <li><img class="my-icon" src="'.$info['avatar'].'"></li>
        <li><a class="text-primary" href="profile.php">'.$_SESSION['emailname'].'</a></li>
        <li><a href="inc/login_system/logout.php">Log out</a></li>';
      }else{
        echo '<li><a href="sign_up.php" class="m-0">SingUp</a></li>';
        echo '<span class="mr-2 ml-2">|</span>';
        echo '<li><a href="login.php"> Login</a></li>';
      }
    ?>

                  <li>
                    <a href="cart.php" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count"> 
    <?php
    if (empty($_SESSION['emailid'])) {
      if(!empty($_SESSION["shopping cart"])) {
        $cart_count = count(array_keys($_SESSION["shopping cart"]));
        echo $cart_count;
      }else{
        echo 0;
      }
    } else if(!empty($_SESSION['emailid'])){
      $sql = 'SELECT user_id FROM user_cart WHERE user_id = "'.$_SESSION['emailid'].'"';

      $result = $connect->query($sql);
      if ($result->num_rows>0) {
        while ($row = $result->fetch_assoc()) {
          $a++;
        }
        echo $a;
      } else{
        echo 0;
      }
    }
    ?>
                      </span>
                    </a>
                  </li> 
                </ul>
              </div> 
            </div>

          </div>
        </div>
          <div class="text-center">
            <?php if (!empty($success_status)) {
              echo $success_status;
            } ?>
        </div>
      </div>

      <nav class="site-navigation text-right text-md-center text-sm-center text-center" role="navigation">
        <div class="container">
          <ul class="site-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php 
              if (isset($_SESSION['emailid'])) {
                echo '<li><a href="profile.php">Profile</a></li>';
              }
            ?>
          </ul>
        </div>
      </nav>
    </header>
                    <!-- Header a Navbar -->


<style type="text/css">

@media only screen and (max-width: 768px){
  .my-icon{
    max-width: 8%; 
    position: absolute; 
    right:85%; 
    top:2%;
  }
}
@media only screen and (min-width: 768px){
  .my-icon{
    max-width: 8%; 
    position: absolute; 
    right:73%; 
    top:0%;
  }
}
@media only screen and (min-width: 992px){
  .my-icon{
    max-width: 8%; 
    position: absolute; 
    right:55%; 
    top:-20%;
  }
}
@media only screen and (min-width: 1200px){
  .my-icon{
    max-width: 8%; 
    position: absolute; 
    right:46%; 
    top:-20%;
  }
}

</style>