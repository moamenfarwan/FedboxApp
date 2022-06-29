<?php require_once 'includes/header.php';
$errorbox = "";
if(isset($_GET['error'])){
  $error = htmlentities(strip_tags($_GET['error']));
  if ($error == "emptyfields") {
    $errorbox = '<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>All fields are required!</strong></div>';
  } elseif ($error == "nouser") {
    $errorbox = '<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>No User with this email!</strong></div>';
  } elseif ($error == "wrongpass") {
    $errorbox = '<div class="alert alert-warning alert-dismissible fade show" role="alert"> <strong>The password you enetered is wrong!</strong></div>';
  }
}
?>

<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <h4>Login to Fedbox</h4>
      <?php echo $errorbox; ?>
      <form action="includes/login.inc.php" method="POST">
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="moamen@gmail.com" name="email">
      </div>


      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" name="password">
      </div>


      <button name="submit" type="submit" class="btn btn-primary mb-3">Login</button>
      <p>Don't have an account? <a href="register.php">Make one here</a></p>
       </form>
    </div>
  </div>
</div>

<?php require_once 'includes/footer.php';

