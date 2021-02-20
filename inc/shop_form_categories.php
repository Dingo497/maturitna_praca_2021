                  
                  <!-- Form categories -->

<div class="col-md-3 order-1 mb-5 mb-md-0">
  <h3 class="mb-3 h5 text-uppercase text-black d-block">Filter products</h3>
  <hr>
  <h6 class="text-info">Select Gender</h6>
  <ul class="list-group">
    <?php $sql = "SELECT DISTINCT gender FROM products ORDER BY gender";
    $result = $connect->query($sql);
    while ($row = $result->fetch_assoc()) {
    ?>
    <li class="list-group-item">
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input product_check" value="<?php echo $row['gender']; ?>" id="gender"> <?php echo $row['gender']; ?>
        </label>
      </div>
    </li>
  <?php } ?>
  </ul>

  <h6 class="text-info mt-2">Select Size</h6>
  <ul class="list-group">
    <?php $sql = "SELECT DISTINCT size FROM products ORDER BY size";
    $result = $connect->query($sql);
    while ($row = $result->fetch_assoc()) {
    ?>
    <li class="list-group-item">
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input product_check" value="<?php echo $row['size']; ?>" id="size"> <?php echo $row['size']; ?>
        </label>
      </div>
    </li>
  <?php } ?>
  </ul>

  <h6 class="text-info mt-2">Select Color</h6>
  <ul class="list-group">
    <?php $sql = "SELECT DISTINCT color FROM products ORDER BY color";
    $result = $connect->query($sql);
    while ($row = $result->fetch_assoc()) {
    ?>
    <li class="list-group-item">
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input product_check" value="<?php echo $row['color']; ?>" id="color"> <?php echo $row['color']; ?>
        </label>
      </div>
    </li>
  <?php } ?>
  </ul>
</div>