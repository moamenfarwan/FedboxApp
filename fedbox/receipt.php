<?php  

require_once 'includes/header.php';
require_once 'includes/db.inc.php';
require_once 'includes/resources.php';

if(isset($_GET['orderid'])){
    $orderid = htmlentities(strip_tags($_GET['orderid']));
}
    $order_query = viewOrderID($con, $orderid);
    $order = $order_query -> fetch_array();
    $mealid = $order["mealID"];
    $userid = $order["userID"];


    $meal_query = viewMealID($con, $mealid);
    $meal = $meal_query -> fetch_array();
    $supplierid = $meal["supplierID"];


    $user_query = viewUserID($con, $userid);
    $user = $user_query -> fetch_array();

    $supplier_query = viewSupplierID($con, $supplierid);
    $supplier = $supplier_query -> fetch_array();
?>

<div class="container">
<div class="alert" role="alert">
      <h5>Receipt for order No. <?php echo $order["orderID"];?></h5>
</div>
<div class="row">
<div class="col-md-6 offset-md-3">

<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Order ID</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $order["orderID"];?></td>
      <td><?php echo $order["orderDate"];?></td>
      <td><?php echo $order["orderStatus"];?></td>
    </tr>

  </tbody>
</table>
          <hr>
          <h4>Customer Info:</h4>
          <p>Customer ID: <?php echo $user["userID"];?></p>
          <p>Firstname: <?php echo $user["firstname"];?></p>
          <p>Lastname: <?php echo $user["lastname"];?></p>
          <p>Address: <?php echo $user["address"];?></p>
          <p>Email: <?php echo $user["email"];?></p>
          <hr>
          <h4>Supplier Info:</h4>
          <p>Supplier ID: <?php echo $supplier["supplierID"];?></p>
          <p>Name: <?php echo $supplier["suppliername"];?></p>
          <p>Address: <?php echo $supplier["address"];?></p>
          <p>Phone: <?php echo $supplier["phone"];?></p>
          <hr>
          <h4>Meal Info:</h4>
          <p>Meal ID: <?php echo $meal["mealID"];?></p>
          <p>Price: $ <?php echo $meal["price"];?></p>
          <p>Quantity: <?php echo $order["quantity"];?></p>
          <?php if ($order["orderDiscount"] == "true") { ?>
          <p style="color:green;">Order Over 1000 TL</p>
          <p style="color:red;">10% discount Applied</p>
          <p>Price before discount: $<?php echo $order["quantity"]*$meal["price"];?></p>
          <?php }?>
           <hr>
          <h4>Total: <?php echo $order["quantity"];?>pcs *  $<?php echo $meal["price"];?> = <b>$<?php echo $order["quantity"]*$meal["price"];?></b></h4>
          <?php if ($order["orderDiscount"] == "true") { ?>
            <h4>Total after discount: $<?php echo $order["orderTotal"];?></h4>
          <?php }?>
          <?php if ($order["orderStatus"] == "unpaid") { ?>
        <a href="pay.php?orderid=<?php echo $order["orderID"];?>"><button type="button" class="btn btn-success">Pay Now</button></a>
        <?php } ?>
      </div>
    </div>
    </div>
</div>


<?php 
require_once 'includes/footer.php';
?>