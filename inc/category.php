
<?php include_once("config.php") ?>
                            <!-- Cards, category -->

    <div class="site-section site-blocks-2">
      <div class="container">
        <div class="row">

<?php
  $sql_products = "SELECT * FROM category";

  $result_products = $connect->query($sql_products);

  if ($result_products->num_rows>0) {
    while ($row = $result_products->fetch_assoc()) {  
?>

          <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
            <a class="block-2-item" href="shop.php">
              <figure class="image">
                <img src="<?php echo $row["img_source"]; ?>" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase"><?php echo $row["collection"]; ?></span>
                <h3><?php echo $row["name"]; ?></h3>
              </div>
            </a>
          </div>
<?php
  }
}
?>

        </div>
      </div>
    </div>
                              <!-- Cards, category -->