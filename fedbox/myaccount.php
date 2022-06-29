<?php 
 
require_once 'includes/header.php';
require_once 'includes/db.inc.php';
require_once 'includes/resources.php';
if(isset($_SESSION["isloggedin"])) { 

?>


<div class="container">
<div class="row">
    <div class="page-header">
        <h1>My Orders</h1>
    </div>
</div>
<div class="row">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                 <th>OrderID</th>
                 <th>MealID</th>
                 <th>Quantity</th>
                 <th>Order Total</th>
                 <th>User ID</th>
                 <th>Order Date</th>
                 <th>Order Status</th>
                 <th>Action</th>
                </tr>
            </thead>
        <tbody>
            <?php
                $userid = $_SESSION['sessionId'];
                $query = viewUserOrder($con, $userid);
                $count = 0;

                while ($a = $query -> fetch_array()) {
                    # code...
                    $count +=1;
                    ?>
                    </tr>
                    <td><?php echo $a["orderID"];?></td>
                    <td><?php echo $a["mealID"];?></td>
                    <td><?php echo $a["quantity"];?></td>
                    <td>$<?php echo $a["orderTotal"];?></td>
                    <td><?php echo $a["userID"];?></td>
                    <td><?php echo $a["orderDate"];?></td>
                    <td><?php echo $a["orderStatus"];?></td>
                    <td><a href="receipt.php?orderid=<?php echo $a["orderID"];?>"><button type="button" class="btn btn-outline-warning btn-sm">View Receipt</button></a></td>

            <?php
                }
            ?>

            <tr>
        </tbody>
        </table>
    </div>
</div>
</div>
<?php
$userid = $_SESSION['sessionId'];
$query = viewUserID($con, $userid); 
$b = $query -> fetch_array();



?>
<div class="container">
<div class="row">
    <div class="page-header">
        <h1>Edit account</h1>
    </div>
</div>
<form action="includes/myaccount.inc.php" method="POST">
<div class="row">
<input type="hidden" name="userid" value="<?php echo $userid;?>">
<div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Firstname</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Product Name" name="firstname" value="<?php echo $b["firstname"];?>">
</div>
<div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Lastname</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Product Name" name="lastname" value="<?php echo $b["lastname"];?>" >
</div>
<div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="moamen@gmail.com" name="email" value="<?php echo $b["email"];?>">
</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Gender</label>
<select class="form-select" aria-label="Default select example" name="gender">
            <option selected><?php echo $b["gender"];?></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
</select>
</div>
<div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Address</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Address" name="address" value="<?php echo $b["address"];?>"> 
</div>

<button name="submit" type="submit" class="btn btn-primary mb-3">Update Info</button>
</div>
</form>
</div>

<?php require_once 'includes/footer.php';?>
<?php } else {header("Location: login.php");}?>  