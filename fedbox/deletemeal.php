<?php 

require_once 'includes/header.php';
require_once 'includes/db.inc.php';
require_once 'includes/resources.php';

if(isset($_GET['mealid'])){
    $mealid = htmlentities(strip_tags($_GET['mealid']));
    deleteMeal($con, $mealid);
    header("Location: viewmeal.php?success=deleted");
}
?>  