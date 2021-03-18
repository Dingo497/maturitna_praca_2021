<!DOCTYPE html>
<html>
<head>
    <?php require_once('inc/settings_includes.php'); ?>
</head>
<body>

  <?php include_once('inc/header.php'); ?>
  <?php include_once('inc/config.php'); ?>
  <?php include_once('inc/add_to_cart.php'); ?>

                    <!-- Shop all and products -->
<div class="site-section">
  <div class="container">

    <div class="row mb-5">
      <div class="col-md-9 order-2">

        <div class="row">
          <div class="col-md-12 mb-5">
            <div class="float-md-left mb-4"><h2 class="text-black h4" id="textChange">Shop All</h2>
            
<?php
if (isset($_GET['error'])) {
  if ($_GET['error'] == 'none') {
    echo '<h3 class="text-center text-primary text-uppercase">Your product was added to you cart!</h3>';
  }
  if ($_GET['error'] == 'sqlproblem') {
    echo '<h3 class="text-center text-danger text-uppercase">Something wrong!</h3>';
  }
}
?>

            </div>
          </div>
        </div>

        <div class="text-center">
          <img src="img/loader.gif" id="loader" width="100" style="display: none;">
        </div>

              

              <!-- extract from the database into products  -->
<div class="row mb-5" id="result">

<?php

$sql = "SELECT * FROM products";
$result = $connect->query($sql);

if ($result->num_rows>0) {
    while ($row_cat = $result->fetch_assoc()) {
 ?>
              <!-- Card bootstrap -->
<form class="col-sm-6 col-lg-4 mb-4" method="post">
  <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
    <div class="block-4 text-center border">
      <div class="card text-center" style="width: 16rem;">
        <img src="<?php echo $row_cat["img_source"]; ?>" class="card-img-top" alt="img">
        <div class="card-body">
          <h5 class="card-title bg-info rounded p-1 text-light"> <?php echo $row_cat["title"]; ?> </h5>
          <p class="card-text"> <?php echo $row_cat["description"]; ?> </p>
          <p>
            Gender : <?php echo $row_cat['gender']; ?> <br>
            Size : <?php echo $row_cat['size']; ?> <br>
            Color : <?php echo $row_cat['color']; ?>
          </p>
          <p class="text-primary"> Price: $<?php echo number_format($row_cat["sum"]); ?> </p>
          <input class="btn btn-primary" type="submit" value="Add to Cart">
          <input  type="hidden" name="add_to_cart" value="<?php echo $row_cat['id']; ?>">
          <input type='hidden' name='action' value="remove">
        </div>
      </div>
    </div>
  </div>
</form>

<?php      
  }
}
?>        
</div>
  </div>
                      <!-- Shop all and products -->

      <?php include_once("inc/shop_form_categories.php"); ?>
      
    </div>
  </div>
</div>

          <!-- On filter products -->
<script type="text/javascript">
  $(document).ready(function(){

    $(".product_check").click(function(){
      $("#loader").show();

      var action = 'data';
      var gender = get_filter_text('gender');
      var size = get_filter_text('size');
      var color = get_filter_text('color');

      $.ajax({
        url:'action.php',
        method:'POST',
        data:{action:action, gender:gender, size:size, color:color},
        success:function(response){
          $("#result").html(response);
          $("#loader").hide();
          $("#textChange").text("Filtered Products");

        }
      });

    });

    function get_filter_text(text_id){
      var filterData = [];
      $('#'+text_id+':checked').each(function(){
        filterData.push($(this).val());
      });
      return filterData;
    }

  });
</script>


                      <!-- Free shipping... -->
  <?php include_once('inc/cards_servises.php'); ?>


  <?php include_once("inc/category.php") ?>


  <?php include_once('inc/footer.php'); ?>


  <?php include_once('inc/settings_includes_down.php'); ?>

</body>
</html>