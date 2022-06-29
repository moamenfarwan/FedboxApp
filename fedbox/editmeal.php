<?php 

require_once 'includes/header.php';
require_once 'includes/db.inc.php';
require_once 'includes/resources.php';

// check if username is admin
if($_SESSION['role'] !== 'admin'){
    // isn't admin, redirect them to a different page
    header("Location: store.php");
}

if(isset($_GET['mealid'])){
    $mealid = htmlentities(strip_tags($_GET['mealid']));
}
    $query = viewMealID($con, $mealid);
    $a = $query -> fetch_array();
?>

<div class="container">
<div class="alert alert-info" role="alert">
  Only users with Admin Role can see this page!
</div>
  <div class="row">
    <div class="col-md-6 offset-md-3">
    <h4>Edit Meal</h4>
      <form action="includes/editmeal.inc.php" method="POST">

      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Meal ID</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Meal Name" name="mealid" value="<?php echo $a["mealID"];?>" readonly>
      </div>
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Meal Name</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Meal Name" name="mealname" value="<?php echo $a["mealname"];?>">
      </div>


      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Price</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Meal Price" name="mealprice" value="<?php echo $a["price"];?>">
      </div>

      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Description</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Description of meal" name="mealdescription" value="<?php echo $a["description"];?>">
      </div>

      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Quantity</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="14" name="mealquantity" value="<?php echo $a["quantity"];?>">
      </div>

      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Supplier ID</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="14" name="supplierID" value="<?php echo $a["supplierID"];?>">
      </div>
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Image</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="14" name="image" value="<?php echo $a["image"];?>">
      </div>
      
      <button name="submit" type="submit" class="btn btn-primary mb-3">Finish Edit</button>
       </form>
    </div>
  </div>
</div>


<?php 
require_once 'includes/footer.php';
?>