<?php 

require_once 'includes/header.php';
require_once 'includes/db.inc.php';
require_once 'includes/resources.php';
?>
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
<section class="py-5 text-center container">
  <div class="row py-lg-5">
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4" style="color: orange;">FedBox</h1>
    <p class="lead">Order Now. Eat Within 15 minutes!</p>
    <p class="lead" style="color:green;">10% Discount on Orders Over 1000 TL!</p>

  </div>
</div>
  </div>
</section>

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
                                 <a style='color:black;' href="store.php"><h5 class="card-title"><?php echo $a["mealname"];?></h5></a>
                                 <p class="card-text"><?php echo $a["description"];?></p>
                                 <div class="d-flex justify-content-between align-items-center">
                                 <div class="group">
                                   <h3>$<?php echo $a["price"];?></h3>
                                   <p style="color: red;">Only <?php echo $a["quantity"];?> Pieces Available!</p>
                                 </div>
                                 <small class="text-muted">supplierID: <?php echo $a["supplierID"];?></small>
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