<?php
require_once 'includes/header.php';
require_once 'includes/db.inc.php';
require_once 'includes/resources.php';

// check if username is admin
if($_SESSION['role'] !== 'admin'){
    // isn't admin, redirect them to a different page
    header("Location: store.php");
}
?>

<div class="container">

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Only <strong>Admins</strong> have access!
</div>
  <div class="row">
    <div class="col-md-6 offset-md-3">
<h4>Add a New Meal</h4>

      <form action="includes/addmeal.inc.php" method="POST">


      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Meal Name</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Meal Name" name="mealname">
      </div>


      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Price</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Meal Price" name="mealprice">
      </div>

      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Description</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Description of Meal" name="mealdescription">
      </div>

      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Quantity</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="14" name="mealquantity">
      </div>
      <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Supplier</label>
      <select class="form-select" aria-label="Default select example" name="supplierID">
            <option selected>Supplier</option>
            <?php   $sql= "SELECT * FROM suppliers";
    $stmt= $con->query($sql);
    if($stmt->num_rows > 0){
        while($row= $stmt->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row["supplierID"];?>"><?php echo $row["suppliername"];?></option>
                        <?php
                       }
                   }
            ?>
    </select>
    </div>
    <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Picture URL</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Picture URL" name="image">
      </div>


      <button name="submit" type="submit" class="btn btn-primary mb-3">Add Meal</button>
       </form>
    </div>
  </div>
</div>

<?php 
require_once 'includes/footer.php';
?>