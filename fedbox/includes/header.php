<?php 
  session_start();
  require_once "db.inc.php";
  // require_once "register.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <title>FedBox</title>
</head>
<body>
<div class="container">
    <header class="d-flex flex-wrap justify-content-md-between py-3 mb-4 border-bottom">
      <a href="#" class="navbar-brand d-flex col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
      <img src="https://cdn-icons-png.flaticon.com/512/198/198416.png" width="30" height="30" class="d-inline-block align-top" alt="">FedBox.com
      </a>
    

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a style="color: orange;" href="home.php" class="nav-link px-2 link-dark">Home</a></li>
        <li><a style="color: orange;" href="store.php" class="nav-link px-2 link-dark">Menu</a></li>
        <li><a style="color: orange;" href="myaccount.php" class="nav-link px-2 link-dark">My Account</a></li>
        <?php if(isset($_SESSION['role']) && ($_SESSION['role'] == 'admin')) { ?>
          <li class="nav-item dropdown">
        <a style="color: orange;" class="nav-link px-2 link-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add Meals & Suppliers
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
          <a  href="addmeal.php" class="nav-link px-2 link-dark">Add Meal</a>
          <a  href="addsupplier.php" class="nav-link px-2 link-dark">Add Supplier</a>
      </li>
          <li class="nav-item dropdown">
        <a  style="color: orange;"class="nav-link px-2 link-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Insights 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a  href="viewmeal.php" class="nav-link px-2 link-dark">View Meals</a>
        <a  href="vieworders.php" class="nav-link px-2 link-dark">View Orders</a>
        <a  href="outstandingpayments.php" class="nav-link px-2 link-dark">View Unpaid Orders</a>

      </li>


        <?php } ?>
      </ul>

      <div class="col-md-3 text-end">
      <?php if(isset($_SESSION['isloggedin'])) { ?>
                <a href="includes/logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
              <?php } else { ?>
                <a href="login.php"><button type="button" class="btn btn-primary me-2">Login</button></a>
                <a href="register.php"><button type="button" class="btn btn-primary">Sign-up</button></a>
            <?php } ?>
      </div>
    </header>
  </div>