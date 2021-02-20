

							<!-- Modal window SingUp -->
<div class="modal fade" id="SingUp_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-primary" id="exampleModalLabel">New account</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <p>Enter the following information to create an account.</p>


<?php
include_once "classes/user.php";

if (isset($_POST['submit_register'])) {
  if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password']) && isset($_POST['Check1'])) {

    if ($user = new user($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password'])) {

      if ($user->isEmpty()) {
        if ($user->insert_user('user', $user->get_f_name(), $user->get_l_name(), $user->get_email(), $user->get_password())) {
          
          $success_status = "<h1 class='text-success h1'>You have been registered!</h1>";

        }else{
          echo "<p class='text-danger h3'>Please check your answers!</p>";?>
        <script type="text/javascript">
          $(document).ready(function(){
            $("#SingUp_modal").modal("show");
          });
        </script>
        <?php  }
        
      }else{
        echo "<p class='text-danger h3'>Please check your answers!</p>";?>
        <script type="text/javascript">
          $(document).ready(function(){
            $("#SingUp_modal").modal("show");
          });
        </script>
     <?php }
    }
  }else{
    echo "<p class='text-danger h3'>Please check your answers!</p>";?>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#SingUp_modal").modal("show");
      });
    </script>
  <?php }
}
?>


                <!--Form register-->
            <form method="post">
            <div class="row">
          <div class="form-group col-6">
            <label class="col-form-label">First name</label>
            <input type="text" class="form-control" name="firstname">
          </div>
          <div class="form-group col-6">
            <label class="col-form-label">Last name</label>
            <input type="text" class="form-control" name="lastname">
          </div>
            </div>
          <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="At least one letter must be uppercase">
          </div>
          <div class="form-group form-check mx-5">
            <input type="checkbox" class="form-check-input" name="Check1">
            <label class="form-check-label">I confirm that I have read the Terms and Conditions and the Privacy Policy and agree to the terms and conditions(Required).</label>
          </div>
          <div class="form-group">
            <a class="text-primary h5" href="" data-toggle="modal" data-target="#Login_modal" id="link_modal_to_login">Do you already have an account?</a>
          </div>
          <button type="submit" class="btn btn-secondary mr-2">Close</button>
          <button type="submit" name="submit_register" id="submit_register" class="btn btn-primary">Submit</button>
        </form>
                  <!--Form register-->




        </div>
      </div>
    </div>
  </div>
							<!-- Modal window SingUp -->





							<!-- Modal window Login -->
<div class="modal fade" id="Login_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title text-primary" id="exampleModalLabel">Please login</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body text-center">
      <p>Enter the following information to login to the account.</p>



<?php

if (isset($_POST['submit_login'])) {
  if (!empty($_POST['email_login']) && !empty($_POST['password_login'])) {

  $success_status = "<h1 class='text-success h1'>You have been registered!</h1>";

  }else{
    echo "<p class='text-danger h3'>Please check your answers!</p>";?>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#Login_modal").modal("show");
      });
    </script>
    <?php
  }
}

?>


                    <!--Form-->
        <form method="post">
      <div class="form-group">
        <label>Email address</label>
        <input type="email" class="form-control" id="email_login" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" id="password_login">
      </div>
      <div class="form-group">
        <a class="text-primary h5" href="" data-toggle="modal" data-target="#SingUp_modal" id="link_modal2">Do you don't already have an account?</a>
      </div>
      <button type="submit" class="btn btn-secondary mr-2">Close</button>
      <button type="submit" id="submit_login" class="btn btn-primary">Submit</button>
    </form>
              <!--Form-->
    </div>
  </div>
</div>
</div>
							<!-- Modal window Login -->


<script>
  $(document).ready(function(){
  // Hide the Modal register
  $("#link_modal_to_login").click(function(){
    $("#SingUp_modal").modal("hide");
  });
});

  $(document).ready(function(){
  // Hide the Modal login
  $("#link_modal2").click(function(){
    $("#Login_modal").modal("hide");
  });
});
</script>