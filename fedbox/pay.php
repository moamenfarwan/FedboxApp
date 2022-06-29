<?php 

require_once 'includes/db.inc.php';
require_once 'includes/resources.php';

if(isset($_GET['orderid'])){
    $orderID = htmlentities(strip_tags($_GET['orderid']));
}
    updateOrder($con,$orderID);
    header("Location: receipt.php?orderid=$orderID");
?>  