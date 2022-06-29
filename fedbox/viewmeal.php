<?php 

require_once 'includes/header.php';
require_once 'includes/db.inc.php';
require_once 'includes/resources.php';

// check if username is admin
if($_SESSION['role'] !== 'admin'){
    // isn't admin, redirect them to a different page
    header("Location: store.php");
}

$count = 0; 

?>

<div class="container">
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Only <strong>Admins</strong> have access!
</div>
<div class="row">
    <div class="page-header">
        <h1>View meals</h1>
    </div>
</div>
<div class="row">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                 <th>#ID</th>
                 <th>Name</th>
                 <th>Description</th>
                 <th>SupplierID</th>
                 <th>Price</th>
                 <th>Quantity</th>
                 <th>Action</th>
                </tr>
            </thead>
        <tbody>
            <?php 
                $query = viewMeals($con);
                while ($a = $query -> fetch_array()) {
                    # code...
                    $count +=1;
                    ?>
                    </tr>
                    <td><?php echo $count;?></td>
                    <td><?php echo $a["mealname"];?></td>
                    <td><?php echo $a["description"];?></td>
                    <td><?php echo $a["supplierID"];?></td>
                    <td><?php echo $a["price"];?></td>
                    <td><?php echo $a["quantity"];?></td>
                    <td><a href="deletemeal.php?mealid=<?php echo $a["mealID"];?>"><button type="button" class="btn btn-outline-danger btn-sm">Delete</button></a><a href="editmeal.php?mealid=<?php echo $a["mealID"];?>"><button type="button" class="btn btn-outline-warning btn-sm">Edit</button></a></td>

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
