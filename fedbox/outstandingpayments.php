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
    <div class="page-header">
        <h1>Outstanding Payments</h1>
    </div>
</div>
<div class="row">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th>#ID</th>
              <th>MealID/Name/Description</th>
              <th>Supplier / Address / Phone</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>UserID/Name</th>
              <th>Email</th>
              <th>Date</th>
              <th>Status</th>
                </tr>
            </thead>
        <tbody>
            <?php 
                $query = viewUnpaidOrders($con);
                $count = 0; 
                while ($order = $query -> fetch_array()) {
                    $mealid = $order["mealID"];
                    $userid = $order["userID"];

                    // get meal info from order
                    $meal_query = viewMealID($con, $mealid);
                    $meal = $meal_query -> fetch_array();
                    $supplierid = $meal["supplierID"];
    
                    // get user info from order 
                    $user_query = viewUserID($con, $userid);
                    $user = $user_query -> fetch_array();
                    
                    // get supplier info from order
                    $supplier_query = viewSupplierID($con, $supplierid);
                    $supplier = $supplier_query -> fetch_array();

                    $count +=1;
                    ?>
                    </tr>
                    <td><?php echo $order["orderID"];?></td>
                    <td><?php echo $meal["mealID"];?>- <?php echo $meal["mealname"];?> / <?php echo $meal["description"];?></td>
                    <td><?php echo $supplier["suppliername"];?>- <?php echo $supplier["address"];?> / <?php echo $supplier["phone"];?></td>
                    <td><?php echo $order["quantity"];?></td>
                    <td>$<?php echo $order["orderTotal"];?></td>
                    <td><?php echo $user["userID"];?>-<?php echo $user["firstname"];?> <?php echo $user["lastname"];?></td>
                    <td><?php echo $user["email"];?></td>
                    <td><?php echo $order["orderDate"];?></td>
                    <td><?php echo $order["orderStatus"];?></td>
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
require_once 'includes/footer.php';
?>
