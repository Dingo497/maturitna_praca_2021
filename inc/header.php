
<!-- Header a Navbar -->
<?php session_start(); ?>


  <?php 

    $pagename = ucfirst(basename($_SERVER['SCRIPT_NAME'],'.php')); //--> path -> /index.php -> index

    if ($pagename == 'Index') {
      $pagename = 'Home';
    }

  ?>

<head>
  <title><?php echo $pagename; ?> &mdash; školská práca</title>
</head>

    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center justify-content-between">

            <div class="col-6 mb-3 mb-md-0 col-md-6 text-center col-sm-6">
              <div class="site-logo text-left">
                <a href="index.php">e-shop</a>
              </div>
            </div>

            <div class="col-6 col-md-6 text-right col-sm-6 col-6">
              <div class="site-top-icons">
                <ul>

    <?php 
      if (isset($_SESSION['emailid'])) {
        echo '<li><a href="inc/login_system/logout.php">Log out</a></li>';
      }else{
        echo '<li><a href="sign_up.php">SingUp</a></li>';
      }
    ?>

                  <li>
                    <a href="cart.php" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count"> 
    <?php 
      if(!empty($_SESSION["shopping cart"])) {
        $cart_count = count(array_keys($_SESSION["shopping cart"]));
        echo $cart_count;
      }else{
        echo 0;
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
