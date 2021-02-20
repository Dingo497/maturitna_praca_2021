<!DOCTYPE html>
<html>
<head>
    <?php require_once('inc/settings_includes.php'); ?>
</head>
<body>

  <?php include_once('inc/header.php'); ?>
  <?php include_once('inc/checkout_order.php'); ?>


                    <!-- Form -->
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
        </div>
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Billing Details</h2>
            <div class="p-3 p-lg-5 border">


              <form method="post">
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="fname" class="text-black">First Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="fname" name="fname">
                </div>
                <div class="col-md-6">
                  <label for="lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="lname" name="lname">
                </div>
              </div>

              <div class="form-group row">
                      <div class="col-md-12">
                        <label for="diff_companyname" class="text-black">Company Name </label>
                        <input type="text" class="form-control" id="diff_companyname" name="diff_companyname">
                      </div>
                    </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="address" class="text-black">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Street address">
                </div>
              </div>

              <div class="form-group">
                <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="state_country" name="state_country">
                </div>
                <div class="col-md-6">
                  <label for="postal_zip" class="text-black">Zip <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="postal_zip" name="postal_zip">
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="email_address" name="email_address">
                </div>
                <div class="col-md-6">
                  <label for="phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                </div>
              </div>

              <div class="form-group">
                <label for="order_notes" class="text-black">Order Notes</label>
                <textarea name="order_notes" id="order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
              </div>

            </div>
          </div>
                        <!-- Form -->



                        <!-- Order -->
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Product</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
    <?php
    if (!empty($_SESSION["shopping cart"])) {
      foreach ($_SESSION["shopping cart"] as $key => $value) {
    ?>
                      <tr>
                        <td><?php echo $value["title"]; ?></td>
                        <td>$<?php echo $value["sum"]; ?></td>
                      </tr>
    <?php
     if (isset($total_price)) {
      $total_price = $total_price + $value['sum'];
     }else{
      $total_price = $value['sum'];
     }
    } } ?>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                        <td class="text-black font-weight-bold"><strong>
    <?php echo "$".$total_price; ?>
                        </strong></td>
                      </tr>
                    </tbody>
                  </table>
                              <!-- Order -->


                              <!-- Pay method -->
                  <div class="border p-3 mb-3">
                    <label class="mb-0 text-primary"><input type="checkbox"> Payment on delivery</label>
                  </div>
                              <!-- PayPal method -->
                    <div id="smart-button-container p-3 mb-5">
                      <div style="text-align: center;">
                        <div id="paypal-button-container"></div>
                      </div>
                    </div>
                  <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD" data-sdk-integration-source="button-factory"></script>
                  <script>
                    function initPayPalButton() {
                      paypal.Buttons({
                        style: {
                          shape: 'pill',
                          color: 'blue',
                          layout: 'horizontal',
                          label: 'paypal',
                          
                        },

                        createOrder: function(data, actions) {
                          return actions.order.create({
                            purchase_units: [{"amount":{"currency_code":"USD","value":1}}]
                          });
                        },

                        onApprove: function(data, actions) {
                          return actions.order.capture().then(function(details) {
                            alert('Transaction completed by ' + details.payer.name.given_name + '!');
                          });
                        },

                        onError: function(err) {
                          console.log(err);
                        }
                      }).render('#paypal-button-container');
                    }
                    initPayPalButton();
                  </script>
                            <!-- PayPal method -->
                  <div class="form-group">
                    <button type="submit" name="place_order" class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='thankyou.php'">Place Order</button>
                  </div>
                  </form>
<?php
  if (isset($status_order)) {
    echo $status_order;
  }
?>
                            <!-- Pay method -->

                </div>
              </div>
            </div>

          </div>
        </div>
      <!-- </form> -->
      </div>
    </div>

</body>
</html>

    <!-- Free shipping... -->
  <?php include_once('inc/cards_servises.php'); ?>
  

  <?php include_once('inc/category.php') ?>


  <?php include_once('inc/footer.php'); ?>


  <?php include_once('inc/settings_includes_down.php'); ?>