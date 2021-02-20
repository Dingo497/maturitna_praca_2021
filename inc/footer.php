
<?php include_once('functions.php'); ?>


					<!-- Footer -->
    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-lg-3 mb-4 mb-lg-0">
            <div class="row">
              <div class="col-md-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4 text-center">Navigation</h3>
              </div>
              
                <ul class="list-unstyled text-center">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="about.php">About</a></li>
                  <li><a href="shop.php">Shop</a></li>
                  <li><a href="contact.php">Contact</a></li>
                </ul>
              </div>
            </div>
          </div>


          <div class="col-md-7 col-lg-5 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Promo</h3>
            <a href="shop.php" class="block-6">
              <img src="img/blog_1.jpg" alt="Image placeholder" class="img-fluid rounded mb-4" style="max-width: 300px;">
              <h3 class="font-weight-light  mb-0">Find your favorit things</h3>
            </a>
          </div>


          <div class="col-md-6 col-lg-4">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">Lokca 02951 Urbarska 649/4, Slovakia</li>
                <li class="phone"><a href="tel:**** *** ***">0999 999 999</a></li>
                <li class="email">mart-in@centrum.sk</li>
              </ul>
            </div>


                        <!-- Substribe email -->
            <div class="block-7">
              <form action="" method="post">
                <label for="email_subscribe" class="footer-heading">Subscribe</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" placeholder="Email" name="email_send">
                  <input type="submit" name="e-mail_sub" class="btn btn-sm btn-primary" value="Send">
                </div>
              </form>
            </div>
<?php 
  if (isset($_POST['e-mail_sub']) && $_POST['email_send']) {
    $email_sub = $_POST['email_send'];
                //control email
    if (validate_email($email_sub)) {
      mail_sender($email_sub);
      echo '<p class="text-info h5">Email subscribe was successful!</p>';
    }else{
      echo '<p class="text-danger h5">Error in e-mail validate!</p>';
    }
  }
?>
          </div>
        </div>


                      <!-- copywright -->
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made <i class="icon-heart" aria-hidden="true"></i> by <a href="" target="_blank" class="text-primary">Martin Banas</a>
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>
                 		 <!-- Footer -->

