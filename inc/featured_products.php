                        
                              <!-- Featured Products -->

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">

<?php
  $sql_products = "SELECT * FROM products";

  $result_products = $connect->query($sql_products);

  if ($result_products->num_rows>0) {
    while ($row = $result_products->fetch_assoc()) {  
?>

              <div class="item">
                <div class="card text-center" style="width: 22rem;">
                  <img src="<?php echo $row["img_source"]; ?>" class="card-img-top">
                  <div class="card-body">
                   <h5 class="card-title"><?php echo $row["title"]; ?></h5>
                   <p class="card-text"><?php echo $row["description"]; ?></p>
                   <p class="text-primary">$<?php echo $row["sum"]; ?></p>
                   <a href="shop.php" class="btn btn-primary">SHOP NOW</a>
                  </div>
                </div>
              </div>
<?php
  }
}
?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
                                <!-- Featured Products -->