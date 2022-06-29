<?php require_once 'includes/header.php' ?>

<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
    <h4>Register to FedBox</h4>
       <!-- Form that send data through register.inc.php using a POST request  -->
      <form action="includes/register.inc.php" method="POST">
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Email address</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="moamen@gmail.com" name="email">
      </div>

    <div class="row mb-3">
    <div class="col">
    <input type="text" class="form-control" placeholder="Firstname" aria-label="Firstname" name="firstname">
    </div>
    <div class="col">
    <input type="text" class="form-control" placeholder="Lastname" aria-label="Lastname" name="lastname">
    </div>
  </div>

     <div class="mb-3">
     <label for="exampleFormControlInput1" class="form-label">Gender</label>
     <select class="form-select" aria-label="Default select example" name="gender">
            <option selected>Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
    </select>
    </div>
    <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Address</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Address" name="address">
      </div>
      <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" name="password">
      </div>
      <button name="submit" type="submit" class="btn btn-primary mb-3">Make Account</button>
      <p>Already have an account? <a href="login.php">Log in</a></p>
       </form>
    </div>
  </div>
</div>

<?php 
require_once 'includes/footer.php';
?>