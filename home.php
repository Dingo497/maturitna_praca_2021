
<!DOCTYPE html>
<html>
<head>
    <?php require_once('inc/settings_includes.php'); ?>
</head>
<body>

  <?php include_once('inc/header.php'); ?>
  <?php include_once('inc/config.php'); ?>

                    <!-- Banner owl carousel -->
          <div class="site-blocks-cover" style="background-color:#a6f3ed;" data-aos="fade">
            <main id="main-site">
              <section id="banner-area">
                <div class="owl-carousel owl-theme">


<?php
  $sql_products = "SELECT * FROM products WHERE hot='1'";

  $result_products = $connect->query($sql_products);

  if ($result_products->num_rows>0) {
    while ($row = $result_products->fetch_assoc()) {  
?>
                  <div class="item">
                    <div class="container">
                      <div class="row justify-content-center align-items-md-center">
                        <div class="col-lg-6 col-md-6 col-sm-9 col-9 mr-lg-5">
                         <img src="<?php echo $row["img_source"]; ?>" style="max-width: 700px;">
                        </div>

                        <div class="col-lg-5 col-md-5 col-sm-12 col-9 ml-lg-3">
                          <h1 class="mb-2">Find your favorite things</h1>
                          <h3 class="mb-2 h2 text-primary"><?php echo $row["title"]; ?></h3>
                          <div class="intro-text">
                            <p class="mb-4 h6"><?php echo $row["description"]; ?></p>
                            <p>
                              <a href="shop.php" class="btn btn-sm btn-primary">Shop Now</a>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
<?php
  }
}
?> 
                </div>
              </section>     
            </main>
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


  