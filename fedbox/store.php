<?php 

require_once 'includes/header.php';
require_once 'includes/db.inc.php';
require_once 'includes/resources.php';

if(isset($_SESSION["isloggedin"])) { ?>
     <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <div class="album py-5 bg-light">
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <?php 
                $query = viewMeals($con);
                $count = 0;
                while ($a = $query -> fetch_array()) {
                    # code...
                    $count +=1;
                    ?>
                     <div class="col">
                           <div class="card shadow-sm">
                                  <img class="card-img-top" src="<?php echo $a["image"];?>" alt="Card image cap">
                              <div class="card-body">
                                 <h5 class="card-title"><?php echo $a["mealname"];?></h5>
                                 <p class="card-text"><?php echo $a["description"];?></p>
                                 <div class="d-flex justify-content-between align-items-center">
                                 <div class="group">
                                   <h3>$<?php echo $a["price"];?></h3>
                                   <p style="color: red;">Only <?php echo $a["quantity"];?> Pieces Available!</p>
                                 </div>
                                 <form action="order.php" method="POST">
                                 <small class="text-muted"><input type="hidden" name="userid" value="<?php  echo $_SESSION['sessionId'];?>"><input type="hidden" name="mealid" value="<?php echo $a["mealID"];?>"><input type="number" name="quantity" value="1" min="1" max="<?php echo $a["quantity"];?>"><button type="submit"class="btn btn-primary btn-sm">Buy Now</button></small>
                                 </form>

                                 </div>
                                
                              </div>
                           </div>
                           </div>
            <?php
                }
            ?>


    </div>
  </div>
</div>


<?php 
require_once 'includes/footer.php';
?>




<?php
} else {
   header("Location: login.php");
}


?>  