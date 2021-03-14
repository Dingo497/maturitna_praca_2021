
<ul class="list-unstyled">
  <form method="post" action="inc/profile/profile_edit_data_code.php">
   <li><h4 class="hvr-underline-from-left text-primary user-data-fname"><?php echo $info['firstname'] ?></h4>
    <input class="user-data-textbox-fname" type="text" name="edit_fname" value="<?php echo $info['firstname'] ?>">
    <input type="submit" value="" name="comfirm_edit_fname" class="sub-edit-data1 btn">
    </li>

   <li><h4 class="text-primary hvr-underline-from-left user-data-lname"><?php echo $info['lastname'] ?></h4>
   <input class="user-data-textbox-lname" type="text" name="edit_lname" value="<?php echo $info['lastname'] ?>">
   <input type="submit" value="" name="comfirm_edit_lname" class="sub-edit-data2 btn"></li>

   <li><h4 class="text-primary hvr-underline-from-left user-data-email"><?php echo $info['email'] ?></h4>
   <input class="user-data-textbox-email" type="text" name="edit_email" value="<?php echo $info['email'] ?>">
   <input type="submit" value="" name="comfirm_edit_email" class="sub-edit-data3 btn"></li>

   <li><h4 class="text-primary hvr-underline-from-left"><?php echo $info['CreatedAt'] ?></h4></li></li>

   <li><h4 class="text-primary hvr-underline-from-left"><?php echo $info['UpdatedAt'] ?></h4></li></li>

  </form>
</ul>



<style type="text/css"> 
.user-data-textbox-fname {
  display: none;
  margin-left: 20px;
  max-width: 120px;
}
.user-data-textbox-lname {
  display: none;
  margin-left: 20px;
  max-width: 120px;
}
.user-data-textbox-email {
  display: none;
  margin-left: 20px;
  max-width: 200px;
}


.user-data-fname{
  cursor: pointer;
}
.user-data-lname{
  cursor: pointer;
}
.user-data-email{
  cursor: pointer;
}


.sub-edit-data1{
  background-image: url(img/check.png);
  border:none; 
  background-repeat:no-repeat;
  background-size:100% 100%;
  display: none;
  cursor: pointer;
  margin-left: 5px;
  height: 30px;
  width: 30px;
}
.sub-edit-data2{
  background-image: url(img/check.png);
  border:none; 
  background-repeat:no-repeat;
  background-size:100% 100%;
  display: none;
  cursor: pointer;
  margin-left: 5px;
  height: 30px;
  width: 30px;
}
.sub-edit-data3{
  background-image: url(img/check.png);
  border:none; 
  background-repeat:no-repeat;
  background-size:100% 100%;
  display: none;
  cursor: pointer;
  margin-left: 5px;
  height: 30px;
  width: 30px;
}

/* Underline From Left adnimation*/
.hvr-underline-from-left {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1pdx rgba(0, 0, 0, 0);
  position: relative;
  overflow: hidden;
}
.hvr-underline-from-left:before {
  content: "";
  position: absolute;
  z-index: -1;
  left: 0;
  right: 100%;
  bottom: 0;
  background: #28a745;
  height: 4px;
  -webkit-transition-property: right;
  transition-property: right;
  -webkit-transition-duration: 0.5s;
  transition-duration: 0.5s;
  -webkit-transition-timing-function: ease-out;
  transition-timing-function: ease-out;
}
.hvr-underline-from-left:hover:before, .hvr-underline-from-left:focus:before, .hvr-underline-from-left:active:before {
  right: 0;
}
</style>


<script type="text/javascript">
$(document).ready(function(){
  $(".user-data-fname").click(function(){
    $(".user-data-textbox-fname").slideToggle("medium", function(){});
    $(".sub-edit-data1").slideToggle("medium", function(){});
  });
});
$(document).ready(function(){
  $(".user-data-lname").click(function(){
    $(".user-data-textbox-lname").slideToggle("medium", function(){});
    $(".sub-edit-data2").slideToggle("medium", function(){});
  });
});
$(document).ready(function(){
  $(".user-data-email").click(function(){
    $(".user-data-textbox-email").slideToggle("medium", function(){});
    $(".sub-edit-data3").slideToggle("medium", function(){});
  });
});
</script>